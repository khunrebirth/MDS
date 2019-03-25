# Management Dormitory System (MDS) ระบบจัดการหอพักขนาดเล็ก
-

## What's New
-

## What's included 
* [Laravel 5.8](https://laravel.com/docs/5.8)
* [Stisla Template](https://github.com/stisla/stisla)

## What's Required
* Composer(https://getcomposer.org/)
* Laravel(https://laravel.com/)
* Web Server Ex.Xampp(https://www.apachefriends.org/index.html)

## Installation:
- 1. ดาวน์โหลดหรือ Clone Project ลงในเครื่องของคุณ
- 2. ทำการติดตั้ง Composer ลงในโปรเจ็ค ผ่านคำสั่ง ``` composer install ``` (ต้องมี Composer ในเครื่องถึงใช้คำสั่งนี้ได้)
- 3. สร้างไฟล์ .env (หรือก็อปปี้ไฟล์ .env.example แล้วเปลี่ยนชื่อเป็น .env ธรรมดา)
- 4. ตั้งค่า Datebase ที่ไฟล์ .env
- 5. ทำการ Generate key ผ่านคำสั่ง ```php artisan key:generate```
- 6. สร้างฐานข้อชื่่อ mds
- 7. ทำการ Migrate Database (สร้างตารางต่าง ๆ) ผ่านคำสั่ง ```php artisan migrate:refresh --seed```
- 8. สั่งรัน Serve ผ่านคำสั่ง ```php artisan serve```
- 9. เข้าสู่หน้าเริ่มต้นผ่าน url http://127.0.0.1:8000
     
## Note:
-
