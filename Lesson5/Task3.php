<?php
$name = "สมชาย";
$age = 30;
$gpa = 3.75;
$active = true;
$note = null;

define("PI", 3.14159);

ob_start();
var_dump($age);
$ageDump = trim((string) ob_get_clean());
$message = "ชื่อ: $name อายุ: $age ปี";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data Types &amp; Constants | Task 3</title>
    <style>
        *{box-sizing:border-box}
        :root{color-scheme:light;--ink:#172554;--muted:#64748b;--blue:#315fce;--line:#e2e8f0}
        body{margin:0;min-height:100vh;padding:32px 18px 48px;color:var(--ink);font-family:Inter,"Segoe UI",Tahoma,sans-serif;background:radial-gradient(ellipse at 12% 0%,#dbeafe 0,transparent 36%),linear-gradient(145deg,#f8fafc,#eef2ff)}
        .shell{width:min(100%,1080px);margin:0 auto}
        .back,.back-bottom{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid #d9eaff;border-radius:20px;background:#ffffffed;color:#315f9e;text-decoration:none;font-size:14px;font-weight:700;box-shadow:0 12px 30px #5b8bc21f;transition:color .18s,border-color .18s}
        .back{margin-bottom:22px}
        .hero{position:relative;overflow:hidden;padding:clamp(26px,5vw,52px);border:1px solid #dbeafe;border-radius:28px;background:linear-gradient(120deg,#fff 8%,#eff6ff 100%);box-shadow:0 20px 55px #1e3a8a12}
        .eyebrow{display:inline-flex;gap:9px;align-items:center;color:var(--blue);font-size:12px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .eyebrow span{padding:5px 9px;border-radius:20px;background:#dbeafe}
        h1{max-width:680px;margin:17px 0 10px;font-size:clamp(34px,6vw,58px);letter-spacing:-.045em;line-height:1.04}
        .intro{max-width:650px;margin:0;color:var(--muted);font-size:16px;line-height:1.8}
        .grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:14px;margin-top:22px}
        .type-card,.output-card{min-width:0;padding:20px;border:1px solid var(--line);border-radius:20px;background:#ffffffed;box-shadow:0 12px 35px #0f172a0b}
        .type-card{display:flex;min-height:160px;flex-direction:column;justify-content:space-between}
        .type-icon{display:grid;width:38px;height:38px;place-items:center;border-radius:12px;background:#eff6ff;color:var(--blue);font-family:Consolas,monospace;font-size:14px;font-weight:800}
        .type-name{margin:18px 0 5px;color:#64748b;font-size:12px;font-weight:800;letter-spacing:.12em;text-transform:uppercase}
        .type-value{margin:0;overflow-wrap:anywhere;font-family:"SFMono-Regular",Consolas,monospace;font-size:16px;font-weight:750}
        .type-value small{display:block;margin-top:5px;color:#64748b;font-size:12px;font-weight:500}
        .output-card{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:16px}
        .output{padding:18px;border-radius:15px;background:#f8fafc}
        .output-label{margin:0 0 8px;color:#64748b;font-size:11px;font-weight:800;letter-spacing:.13em;text-transform:uppercase}
        .output-value{margin:0;color:#1e3a8a;font-family:"SFMono-Regular",Consolas,monospace;font-size:16px;font-weight:700;overflow-wrap:anywhere}
        .back-bottom{margin-top:24px}
        .back:hover,.back-bottom:hover{border-color:#93c5fd;color:var(--blue)}
        @media(max-width:900px){.grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
        @media(max-width:560px){body{padding:20px 12px 32px}.hero{padding:26px 22px}.grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.type-card{min-height:145px;padding:16px}.output-card{grid-template-columns:1fr;padding:14px}.output{padding:14px}}
    </style>
</head>
<body>
<main class="shell">
    <a class="back" href="../index.html">← กลับหน้าหลัก</a>
    <header class="hero">
        <div class="eyebrow"><span>Lesson 05</span> Task 03</div>
        <h1>PHP Data Types<br>&amp; Constants</h1>
        <p class="intro">สำรวจชนิดข้อมูลพื้นฐาน การแสดงค่าด้วย <code>var_dump()</code> และการกำหนดค่าคงที่ใน PHP</p>
    </header>

    <section class="grid" aria-label="ชนิดข้อมูล PHP">
        <article class="type-card">
            <span class="type-icon" aria-hidden="true">Aa</span>
            <div><p class="type-name">String</p><p class="type-value"><?= htmlspecialchars(gettype($name), ENT_QUOTES, "UTF-8") ?><small><?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?></small></p></div>
        </article>
        <article class="type-card">
            <span class="type-icon" aria-hidden="true">123</span>
            <div><p class="type-name">Integer</p><p class="type-value"><?= htmlspecialchars($ageDump, ENT_QUOTES, "UTF-8") ?><small>var_dump($age)</small></p></div>
        </article>
        <article class="type-card">
            <span class="type-icon" aria-hidden="true">3.7</span>
            <div><p class="type-name">Float</p><p class="type-value"><?= htmlspecialchars(gettype($gpa), ENT_QUOTES, "UTF-8") ?><small><?= $gpa ?></small></p></div>
        </article>
        <article class="type-card">
            <span class="type-icon" aria-hidden="true">✓</span>
            <div><p class="type-name">Boolean</p><p class="type-value"><?= htmlspecialchars(gettype($active), ENT_QUOTES, "UTF-8") ?><small><?= $active ? "true" : "false" ?></small></p></div>
        </article>
        <article class="type-card">
            <span class="type-icon" aria-hidden="true">∅</span>
            <div><p class="type-name">NULL</p><p class="type-value"><?= htmlspecialchars(gettype($note), ENT_QUOTES, "UTF-8") ?><small>null</small></p></div>
        </article>
    </section>

    <section class="output-card" aria-label="ตัวอย่างผลลัพธ์">
        <div class="output">
            <p class="output-label">String interpolation</p>
            <p class="output-value"><?= htmlspecialchars($message, ENT_QUOTES, "UTF-8") ?></p>
        </div>
        <div class="output">
            <p class="output-label">Constant · PI</p>
            <p class="output-value"><?= PI ?></p>
        </div>
    </section>
    <a class="back-bottom" href="../index.html">กลับไปยังหน้าหลัก</a>
</main>
</body>
</html>
