<?php
function calculateBill(float $pricePerPiece, float $quantity, float $discount): array
{
    $subtotal = $pricePerPiece * $quantity;
    $afterDiscount = $subtotal - $discount;
    $vat = $afterDiscount * 0.07;

    return [
        "subtotal" => $subtotal,
        "afterDiscount" => $afterDiscount,
        "vat" => $vat,
        "netTotal" => $afterDiscount + $vat,
    ];
}

function printBill(array $bill): void
{
    echo "ยอดก่อนลด = " . number_format($bill["subtotal"], 2, ".", "") . PHP_EOL;
    echo "ยอดหลังลด = " . number_format($bill["afterDiscount"], 2, ".", "") . PHP_EOL;
    echo "VAT 7% = " . number_format($bill["vat"], 2, ".", "") . PHP_EOL;
    echo "ยอดสุทธิ = " . number_format($bill["netTotal"], 2, ".", "") . PHP_EOL;
}

if (PHP_SAPI === "cli") {
    $values = [];

    for ($i = 0; $i < 3; $i++) {
        $line = fgets(STDIN);
        if ($line === false || !is_numeric(trim($line))) {
            fwrite(STDERR, "Expected three numeric input lines.\n");
            exit(1);
        }

        $values[] = (float) trim($line);
    }

    printBill(calculateBill($values[0], $values[1], $values[2]));
    exit;
}

$values = ["price" => "", "quantity" => "", "discount" => ""];
$error = null;
$bill = null;

if (($_SERVER["REQUEST_METHOD"] ?? "GET") === "POST") {
    $valid = true;

    foreach ($values as $field => $value) {
        $rawValue = $_POST[$field] ?? null;
        if (!is_string($rawValue) || !is_numeric(trim($rawValue))) {
            $values[$field] = is_string($rawValue) ? trim($rawValue) : "";
            $valid = false;
            continue;
        }

        $values[$field] = trim($rawValue);
    }

    if ($valid) {
        $bill = calculateBill(
            (float) $values["price"],
            (float) $values["quantity"],
            (float) $values["discount"]
        );
    } else {
        $error = "กรุณากรอกตัวเลขให้ครบทั้ง 3 ช่อง";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Calculator | Task 6</title>
    <style>
        *{box-sizing:border-box}
        :root{color-scheme:light;--ink:#172554;--muted:#64748b;--blue:#315fce;--line:#e2e8f0}
        body{margin:0;min-height:100vh;padding:32px 18px 48px;color:var(--ink);font-family:Inter,"Segoe UI",Tahoma,sans-serif;background:radial-gradient(ellipse at 12% 0%,#dbeafe 0,transparent 36%),linear-gradient(145deg,#f8fafc,#eef2ff)}
        .shell{width:min(100%,760px);margin:0 auto}
        .back,.back-bottom{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid #d9eaff;border-radius:20px;background:#ffffffed;color:#315f9e;text-decoration:none;font-size:14px;font-weight:700;box-shadow:0 12px 30px #5b8bc21f;transition:color .18s,border-color .18s}
        .back{margin-bottom:22px}
        .back-bottom{margin-top:22px}
        .back:hover,.back-bottom:hover{border-color:#93c5fd;color:var(--blue)}
        .hero{padding:clamp(26px,5vw,46px);border:1px solid #dbeafe;border-radius:28px;background:linear-gradient(120deg,#fff 8%,#eff6ff 100%);box-shadow:0 20px 55px #1e3a8a12}
        .eyebrow{display:inline-flex;gap:9px;align-items:center;color:var(--blue);font-size:12px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .eyebrow span{padding:5px 9px;border-radius:20px;background:#dbeafe}
        h1{margin:17px 0 8px;font-size:clamp(34px,6vw,52px);letter-spacing:-.045em;line-height:1.04}
        .intro{margin:0;color:var(--muted);font-size:15px;line-height:1.8}
        .card{margin-top:20px;padding:clamp(22px,5vw,34px);border:1px solid var(--line);border-radius:24px;background:#ffffffed;box-shadow:0 12px 35px #0f172a0b}
        form{display:grid;gap:18px}
        .fields{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px}
        label{display:grid;gap:7px;color:#334155;font-size:13px;font-weight:700}
        input{width:100%;padding:12px 13px;border:1px solid #cbd5e1;border-radius:12px;background:#fff;color:var(--ink);font:inherit}
        input:focus{border-color:#60a5fa;outline:3px solid #dbeafe}
        button{padding:13px 18px;border:0;border-radius:13px;background:var(--blue);color:#fff;font:inherit;font-weight:750;cursor:pointer}
        button:hover{background:#2449a6}
        .error{margin:18px 0 0;padding:13px 15px;border:1px solid #fecdd3;border-radius:12px;background:#fff1f2;color:#9f1239}
        .results{display:grid;gap:10px;margin-top:22px}
        .result{display:flex;justify-content:space-between;gap:16px;padding:13px 15px;border:1px solid #edf2f7;border-radius:12px;background:#f8fafc}
        .result span{color:#64748b}
        .result strong{color:#1e3a8a;font-variant-numeric:tabular-nums}
        .result.net{border-color:#bfdbfe;background:#eff6ff;font-size:17px}
        .note{margin:16px 0 0;color:#64748b;font-size:12px;line-height:1.65}
        @media(max-width:600px){body{padding:20px 12px 32px}.hero{padding:26px 22px}.fields{grid-template-columns:1fr}.card{padding:20px}}
    </style>
</head>
<body>
<main class="shell">
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <header class="hero">
        <div class="eyebrow"><span>Lesson 05</span> Task 06</div>
        <h1>Bill Calculator</h1>
        <p class="intro">คำนวณยอดก่อนลด ยอดหลังลด และ VAT 7% ตามลำดับ โดยคิด VAT จากยอดหลังหักส่วนลด</p>
    </header>

    <section class="card" aria-label="คำนวณบิล">
        <form method="post">
            <div class="fields">
                <label for="price">ราคาต่อชิ้น
                    <input id="price" name="price" type="number" step="any" value="<?= htmlspecialchars($values["price"], ENT_QUOTES, "UTF-8") ?>" required>
                </label>
                <label for="quantity">จำนวนชิ้น
                    <input id="quantity" name="quantity" type="number" step="any" value="<?= htmlspecialchars($values["quantity"], ENT_QUOTES, "UTF-8") ?>" required>
                </label>
                <label for="discount">ส่วนลด (บาท)
                    <input id="discount" name="discount" type="number" step="any" value="<?= htmlspecialchars($values["discount"], ENT_QUOTES, "UTF-8") ?>" required>
                </label>
            </div>
            <button type="submit">คำนวณบิล</button>
        </form>

        <?php if ($error !== null): ?>
            <p class="error" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p>
        <?php elseif ($bill !== null): ?>
            <div class="results" aria-live="polite">
                <div class="result"><span>ยอดก่อนลด</span><strong><?= number_format($bill["subtotal"], 2, ".", "") ?></strong></div>
                <div class="result"><span>ยอดหลังลด</span><strong><?= number_format($bill["afterDiscount"], 2, ".", "") ?></strong></div>
                <div class="result"><span>VAT 7%</span><strong><?= number_format($bill["vat"], 2, ".", "") ?></strong></div>
                <div class="result net"><span>ยอดสุทธิ</span><strong><?= number_format($bill["netTotal"], 2, ".", "") ?></strong></div>
            </div>
        <?php endif; ?>
        <p class="note">ลำดับการคำนวณ: ราคา × จำนวน → หักส่วนลด → คิด VAT 7% → รวมยอดสุทธิ</p>
    </section>
    <a class="back-bottom" href="../index.html">กลับไปยังหน้าหลัก</a>
</main>
</body>
</html>
