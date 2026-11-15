# คำแนะนำสำหรับ Copilot

## โครงสร้างและการทำงาน

- Repository นี้รวบรวมแบบฝึกหัดเว็บ HTML, JavaScript และ PHP; `index.html` เป็นหน้าหลักและสารบัญที่เชื่อมไปยังแต่ละบทเรียน
- `Lesson1/` ถึง `Lesson3/` เป็นหน้า HTML แบบ standalone ส่วน `Lesson4/` และ `Lesson5/` เป็นตัวอย่าง PHP ที่ต้องประมวลผลผ่าน PHP runtime
- CSS และ JavaScript อยู่ภายในหน้า HTML; ตัวอย่าง PHP มี markup และ style ในแต่ละไฟล์ `.php`. ไม่มี framework, package manager หรือ asset pipeline

## Build, preview และ test

- ไม่มี build, lint หรือ automated test command ที่กำหนดไว้ใน repository
- เปิดดูหน้า HTML จาก root ด้วย `python3 -m http.server 8000` แล้วเข้า `http://localhost:8000/`
- เปิดหน้า PHP ด้วย `php -S localhost:8000` จาก root แล้วเข้า URL ของหน้า เช่น `http://localhost:8000/Lesson4/ex1.php`; อย่าใช้ Python static server เพื่อทดสอบ PHP
- สคริปต์ PHP แบบ CLI ที่อ่าน `STDIN` ให้รันผ่าน PHP CLI เช่น `php Lesson5/Task6.php < input.txt`; Task6 รองรับทั้ง CLI และฟอร์มบนเว็บ
- ตรวจ syntax ของไฟล์ PHP เดี่ยวด้วย `php -l Lesson4/ex1.php`; ตรวจหน้าเดียวโดยเปิด URL ของไฟล์นั้นแล้วทดสอบการโต้ตอบ ไม่มีชุดทดสอบอัตโนมัติ
- ใน VS Code ใช้ Playwright MCP ที่กำหนดใน `.vscode/mcp.json` สำหรับตรวจหน้าเว็บผ่านเบราว์เซอร์

## รูปแบบเฉพาะของ repository

- วางแบบฝึกหัดตามรูปแบบ `LessonN/exN.html` หรือ `.php` ตามเทคโนโลยีของบทเรียน; เมื่อต้องเพิ่มหรือย้ายหน้า ให้คงลิงก์ใน `index.html` และลิงก์กลับหน้าหลัก `../index.html` ให้ตรงกับตำแหน่งไฟล์จริง
- หน้าเว็บใช้ภาษาไทยเป็นหลัก พร้อม `lang="th"`, charset UTF-8 และ viewport สำหรับมือถือ
- แต่ละแบบฝึกหัดพึ่งพาตนเองได้ โดยเก็บ markup, CSS ใน `<style>` และ JavaScript ใน `<script>` ไว้ในไฟล์ของหน้านั้น
- รักษาธีมสีน้ำเงินที่ใช้ร่วมกัน โดยตัวแปร CSS ที่พบซ้ำคือ `--blue`/`--b`, `--dark`/`--d` และ `--text`/`--t`; หน้าต่าง ๆ มี responsive layout ผ่าน media queries
- แบบฝึกหัด JavaScript อ่านและแก้ไข DOM โดยตรงผ่าน element IDs และใช้ event listeners สำหรับการโต้ตอบ; คง ID ที่เชื่อมระหว่าง HTML กับ script ให้สอดคล้องกัน
- ในหน้า PHP ให้ escape ข้อความจากผู้ใช้ก่อนแสดงผล HTML ด้วย `htmlspecialchars(..., ENT_QUOTES, "UTF-8")`; หน้าแบบฟอร์ม PHP ประมวลผลข้อมูลใน request เดียวกัน
