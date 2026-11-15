<?php
$item = "ลาเต้";
$price = 45;
$qty = 3;
$total = $price * $qty;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latte Order &amp; Tip | Task 5</title>
    <style>
        *{box-sizing:border-box}
        :root{color-scheme:light;--ink:#172554;--muted:#64748b;--blue:#315fce;--line:#e2e8f0}
        body{margin:0;min-height:100vh;padding:32px 18px 48px;color:var(--ink);font-family:Inter,"Segoe UI",Tahoma,sans-serif;background:radial-gradient(ellipse at 12% 0%,#dbeafe 0,transparent 36%),linear-gradient(145deg,#f8fafc,#eef2ff)}
        .shell{width:min(100%,760px);margin:0 auto}
        .back,.back-bottom{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid #d9eaff;border-radius:20px;background:#ffffffed;color:#315f9e;text-decoration:none;font-size:14px;font-weight:700;box-shadow:0 12px 30px #5b8bc21f;transition:color .18s,border-color .18s}
        .back{margin-bottom:22px}
        .back:hover,.back-bottom:hover{border-color:#93c5fd;color:var(--blue)}
        .hero{position:relative;overflow:hidden;padding:clamp(26px,5vw,46px);border:1px solid #dbeafe;border-radius:28px;background:linear-gradient(120deg,#fff 8%,#eff6ff 100%);box-shadow:0 20px 55px #1e3a8a12}
        .eyebrow{display:inline-flex;gap:9px;align-items:center;color:var(--blue);font-size:12px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .eyebrow span{padding:5px 9px;border-radius:20px;background:#dbeafe}
        h1{margin:17px 0 8px;font-size:clamp(34px,6vw,52px);letter-spacing:-.045em;line-height:1.04}
        .intro{margin:0;color:var(--muted);font-size:15px;line-height:1.8}
        .order-card{margin-top:20px;padding:clamp(22px,5vw,36px);border:1px solid var(--line);border-radius:24px;background:#ffffffed;box-shadow:0 12px 35px #0f172a0b}
        .product{display:flex;align-items:center;gap:16px;padding-bottom:24px;border-bottom:1px solid var(--line)}
        .cup{display:grid;width:62px;height:62px;flex:none;place-items:center;border-radius:19px;background:#eff6ff;font-size:30px}
        .product-label{margin:0 0 5px;color:#64748b;font-size:11px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .product-name{margin:0;font-size:23px;font-weight:750}
        .product-meta{margin:4px 0 0;color:var(--muted);font-size:14px}
        .summary{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:21px 0}
        .summary-label{color:var(--muted);font-size:14px}
        .total{color:#1e3a8a;font-size:26px;font-weight:800;letter-spacing:-.03em}
        .tip-button{width:100%;padding:14px 18px;border:0;border-radius:14px;background:#315fce;color:white;font:inherit;font-weight:750;cursor:pointer;transition:background .18s,transform .18s}
        .tip-button:hover{background:#2449a6;transform:translateY(-1px)}
        .tip-button:focus-visible{outline:3px solid #93c5fd;outline-offset:3px}
        .tip-result{min-height:54px;margin:14px 0 0;padding:14px;border:1px solid #bfdbfe;border-radius:14px;background:#eff6ff;color:#1e3a8a;font-size:16px;font-weight:750;text-align:center}
        .note{margin:18px 0 0;color:#64748b;font-size:12px;line-height:1.65;text-align:center}
        .back-bottom{margin-top:22px}
        @media(max-width:560px){body{padding:20px 12px 32px}.hero{padding:26px 22px}.order-card{padding:20px}.total{font-size:22px}}
    </style>
</head>
<body>
<main class="shell">
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <header class="hero">
        <div class="eyebrow"><span>Lesson 05</span> Task 05</div>
        <h1>Latte order</h1>
        <p class="intro">PHP คำนวณยอดรวมบนเซิร์ฟเวอร์ แล้ว JavaScript เพิ่มทิปให้ทันทีในเบราว์เซอร์</p>
    </header>

    <section class="order-card" aria-label="สรุปรายการสั่งซื้อ">
        <div class="product">
            <div class="cup" aria-hidden="true">☕</div>
            <div>
                <p class="product-label">Your order</p>
                <h2 class="product-name"><?= htmlspecialchars($item, ENT_QUOTES, "UTF-8") ?></h2>
                <p class="product-meta"><?= $qty ?> แก้ว · <?= number_format($price) ?> บาท / แก้ว</p>
            </div>
        </div>
        <div class="summary">
            <span class="summary-label">ยอดรวม</span>
            <strong class="total"><?= number_format($total) ?> บาท</strong>
        </div>
        <button class="tip-button" id="tip" type="button">เพิ่มทิป 10% · Add 10% tip</button>
        <p class="tip-result" id="grand" aria-live="polite">กดปุ่มเพื่อคำนวณยอดรวมพร้อมทิป</p>
        <p class="note">ยอดสินค้า <?= number_format($total) ?> บาท · ทิป 10% คำนวณในเบราว์เซอร์ด้วย JavaScript</p>
    </section>
    <a class="back-bottom" href="../index.html">กลับไปยังหน้าหลัก</a>
</main>

<script>
    const total = <?= $total ?>;

    document.getElementById("tip").addEventListener("click", function () {
        document.getElementById("grand").textContent = "รวมทิป " + (total * 1.1).toFixed(2) + " บาท";
    });
</script>
</body>
</html>
