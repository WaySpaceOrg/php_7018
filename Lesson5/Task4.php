<?php
$a = 10;
$b = 3;
$sum = $a + $b;
$remainder = $a % $b;
$power = $a ** $b;

$email = trim(strtolower("  Hello@Email.COM  "));

$text = "Hello World";
$length = strlen($text);
$substring = substr($text, 0, 5);
$replaced = str_replace("World", "PHP", $text);
$position = strpos($text, "World");

$price = 1234567.891;
$area = 23.1;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Operations &amp; Formatting | Task 4</title>
    <style>
        *{box-sizing:border-box}
        :root{color-scheme:light;--ink:#172554;--muted:#64748b;--blue:#315fce;--line:#e2e8f0}
        body{margin:0;min-height:100vh;padding:32px 18px 48px;color:var(--ink);font-family:Inter,"Segoe UI",Tahoma,sans-serif;background:radial-gradient(ellipse at 12% 0%,#dbeafe 0,transparent 36%),linear-gradient(145deg,#f8fafc,#eef2ff)}
        .shell{width:min(100%,1080px);margin:0 auto}
        .back,.back-bottom{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid #d9eaff;border-radius:20px;background:#ffffffed;color:#315f9e;text-decoration:none;font-size:14px;font-weight:700;box-shadow:0 12px 30px #5b8bc21f;transition:color .18s,border-color .18s}
        .back{margin-bottom:22px}
        .back:hover,.back-bottom:hover{border-color:#93c5fd;color:var(--blue)}
        .hero{position:relative;overflow:hidden;padding:clamp(26px,5vw,52px);border:1px solid #dbeafe;border-radius:28px;background:linear-gradient(120deg,#fff 8%,#eff6ff 100%);box-shadow:0 20px 55px #1e3a8a12}
        .eyebrow{display:inline-flex;gap:9px;align-items:center;color:var(--blue);font-size:12px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .eyebrow span{padding:5px 9px;border-radius:20px;background:#dbeafe}
        h1{max-width:680px;margin:17px 0 10px;font-size:clamp(34px,6vw,58px);letter-spacing:-.045em;line-height:1.04}
        .intro{max-width:650px;margin:0;color:var(--muted);font-size:16px;line-height:1.8}
        .symbol{position:absolute;right:7%;top:50%;display:grid;width:112px;height:112px;place-items:center;border:1px solid #bfdbfe;border-radius:28px;background:#dbeafea8;color:#315fce;font-size:64px;font-weight:800;transform:translateY(-50%) rotate(8deg)}
        .grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:22px}
        .card{min-width:0;padding:24px;border:1px solid #e2e8f0;border-radius:22px;background:#ffffffed;box-shadow:0 12px 35px #0f172a0b}
        .card.wide{grid-column:span 2}
        .card-head{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:20px}
        .kicker{margin:0 0 6px;color:#64748b;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}
        h2{margin:0;font-size:19px;letter-spacing:-.02em}
        .icon{display:grid;width:38px;height:38px;flex:none;place-items:center;border-radius:12px;background:#eff6ff;color:var(--blue);font-size:18px;font-weight:800}
        .rows{display:grid;gap:11px}
        .row{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:12px 14px;border:1px solid #edf2f7;border-radius:13px;background:#f8fafc}
        .label{color:#64748b;font-size:13px}
        code,.value{font-family:"SFMono-Regular",Consolas,monospace}
        .value{color:#1e3a8a;font-size:14px;font-weight:750;text-align:right;overflow-wrap:anywhere}
        .note{margin:15px 0 0;color:#64748b;font-size:12px;line-height:1.65}
        .back-bottom{margin-top:24px}
        @media(max-width:800px){.symbol{right:5%;width:82px;height:82px;font-size:46px}.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.card.wide{grid-column:span 2}}
        @media(max-width:560px){body{padding:20px 12px 32px}.hero{padding:26px 22px}.symbol{display:none}.grid{grid-template-columns:1fr;gap:12px}.card,.card.wide{grid-column:auto;padding:20px}.row{align-items:flex-start}.value{max-width:58%}}
    </style>
</head>
<body>
<main class="shell">
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <header class="hero">
        <div class="eyebrow"><span>Lesson 05</span> Task 04</div>
        <h1>PHP Operations<br>&amp; Formatting</h1>
        <p class="intro">ทดลองคำนวณ จัดการข้อความ และจัดรูปแบบตัวเลขด้วย PHP พร้อมดูผลลัพธ์แยกเป็นหมวดหมู่</p>
        <div class="symbol" aria-hidden="true">∑</div>
    </header>

    <section class="grid" aria-label="ผลลัพธ์ตัวอย่าง PHP">
        <article class="card">
            <div class="card-head">
                <div><p class="kicker">01 · Math</p><h2>ตัวดำเนินการ</h2></div>
                <span class="icon" aria-hidden="true">±</span>
            </div>
            <div class="rows">
                <div class="row"><span class="label">10 + 3</span><code class="value"><?= $sum ?></code></div>
                <div class="row"><span class="label">10 % 3 · เศษ</span><code class="value"><?= $remainder ?></code></div>
                <div class="row"><span class="label">10 ** 3 · ยกกำลัง</span><code class="value"><?= $power ?></code></div>
            </div>
        </article>

        <article class="card">
            <div class="card-head">
                <div><p class="kicker">02 · Strings</p><h2>ฟังก์ชันข้อความ</h2></div>
                <span class="icon" aria-hidden="true">Aa</span>
            </div>
            <div class="rows">
                <div class="row"><span class="label">Clean email</span><code class="value"><?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?></code></div>
                <div class="row"><span class="label">Length</span><code class="value"><?= $length ?></code></div>
                <div class="row"><span class="label">Substring</span><code class="value"><?= htmlspecialchars($substring, ENT_QUOTES, "UTF-8") ?></code></div>
                <div class="row"><span class="label">Replace</span><code class="value"><?= htmlspecialchars($replaced, ENT_QUOTES, "UTF-8") ?></code></div>
                <div class="row"><span class="label">Position of “World”</span><code class="value"><?= $position ?></code></div>
            </div>
            <p class="note"><code>strpos()</code> คืนตำแหน่งเริ่มต้นแบบนับจากศูนย์</p>
        </article>

        <article class="card wide">
            <div class="card-head">
                <div><p class="kicker">03 · Number format</p><h2>รูปแบบตัวเลขสำหรับแสดงผล</h2></div>
                <span class="icon" aria-hidden="true">#</span>
            </div>
            <div class="rows">
                <div class="row"><span class="label">Rounded to integer</span><code class="value"><?= number_format($price) ?></code></div>
                <div class="row"><span class="label">Two decimal places</span><code class="value"><?= number_format($price, 2) ?></code></div>
                <div class="row"><span class="label">Raw area</span><code class="value"><?= $area ?></code></div>
                <div class="row"><span class="label">Area · fixed decimals</span><code class="value"><?= number_format($area, 2) ?></code></div>
            </div>
            <p class="note"><code>number_format()</code> ช่วยจัดหลักพันและกำหนดจำนวนตำแหน่งทศนิยมให้คงที่ เช่น 23.10</p>
        </article>
    </section>
    <a class="back-bottom" href="../index.html">กลับไปยังหน้าหลัก</a>
</main>
</body>
</html>
