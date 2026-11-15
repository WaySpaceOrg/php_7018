<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวแปรและการคำนวณ | Lesson 4</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;min-height:100vh;padding:24px 16px;color:#40516f;font-family:Tahoma,sans-serif;background:linear-gradient(135deg,#edf7ff,#dceeff 55%,#f7fbff);line-height:1.7}
        main{width:min(100%,760px);margin:0 auto}
        .back,.card{background:#ffffffed;border:1px solid #d9eaff;border-radius:20px;box-shadow:0 12px 30px #5b8bc21f}
        .back{display:inline-block;margin-bottom:16px;padding:8px 14px;color:#315f9e;text-decoration:none;font-weight:bold}
        .card{padding:24px}
        h1,h2{color:#315f9e}
        pre,.result{overflow:auto;padding:16px;border-radius:12px;background:#f1f7ff;color:#315f9e}
        @media(max-width:600px){body{padding:16px 11px}.card{padding:18px}}
    </style>
</head>
<body>
<main>
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <article class="card">
        <h1>Lesson 4 · ตัวแปรและการคำนวณ</h1>
        <p>ตัวแปร PHP ขึ้นต้นด้วย <code>$</code> และใช้เครื่องหมายคณิตศาสตร์คำนวณค่าได้</p>
        <pre><code>$price = 45;
$quantity = 3;
$total = $price * $quantity;
echo "รวม " . $total . " บาท";</code></pre>
        <?php
        $price = 45;
        $quantity = 3;
        $total = $price * $quantity;
        ?>
        <div class="result">
            <p>ราคาต่อชิ้น: <?= $price ?> บาท</p>
            <p>จำนวน: <?= $quantity ?> ชิ้น</p>
            <strong>รวม <?= $total ?> บาท</strong>
        </div>
    </article>
</main>
</body>
</html>
