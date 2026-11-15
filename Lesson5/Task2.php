<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงผลด้วย PHP | Lesson 4</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;min-height:100vh;padding:24px 16px;color:#40516f;font-family:Tahoma,sans-serif;background:linear-gradient(135deg,#edf7ff,#dceeff 55%,#f7fbff);line-height:1.7}
        main{width:min(100%,760px);margin:0 auto}
        .back,.card{background:#ffffffed;border:1px solid #d9eaff;border-radius:20px;box-shadow:0 12px 30px #5b8bc21f}
        .back{display:inline-block;margin-bottom:16px;padding:8px 14px;color:#315f9e;text-decoration:none;font-weight:bold}
        .card{padding:24px}
        h1,h2{color:#315f9e}
        pre{overflow:auto;padding:16px;border-radius:12px;background:#f1f7ff;color:#315f9e}
        @media(max-width:600px){body{padding:16px 11px}.card{padding:18px}}
    </style>
</head>
<body>
<main>
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <article class="card">
        <h1>Lesson 4 · แสดงผลด้วย PHP</h1>
        <p>เริ่มต้นใช้แท็ก PHP และคำสั่ง <code>echo</code> เพื่อแสดงข้อความ จากนั้นนำตัวแปรมาต่อข้อความด้วยจุด (<code>.</code>)</p>
        <pre><code>&lt;?php
echo "สวัสดีโลก!";
$name = "ชมภูมิ";
echo "สวัสดี " . $name . "!";
?&gt;
&lt;p&gt;ชื่อของฉันคือ &lt;?= $name ?&gt;&lt;/p&gt;</code></pre>
        <h2>ผลลัพธ์</h2>
        <?php
        echo "สวัสดีโลก!";
        echo "<h2>ยินดีต้อนรับ</h2>";
        $name = "ชมภูมิ";
        echo "สวัสดี " . $name . "!";
        ?>
        <p>ชื่อของฉันคือ <?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?></p>
    </article>
</main>
</body>
</html>
