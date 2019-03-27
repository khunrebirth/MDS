# Management Dormitory System (MDS)
- ระบบจัดการหอพักขนาดเล็ก

## What's New
-

## What's included 
* [Laravel 5.8](https://laravel.com/docs/5.8)
* [Stisla Template](https://github.com/stisla/stisla)

## What's Required
* [Composer](https://getcomposer.org/)
* [Laravel](https://laravel.com/)
* Web Server Ex.[Xampp](https://www.apachefriends.org/index.html)

## Installation:
- ดาวน์โหลดหรือ Clone Project ลงในเครื่องของคุณ
- ติดตั้ง Composer ลงในโปรเจ็ค ผ่านคำสั่ง ``` composer install ``` (ต้องมี Composer ในเครื่องถึงใช้คำสั่งนี้ได้)
- สร้างไฟล์ .env (หรือก็อปปี้ไฟล์ .env.example แล้วเปลี่ยนชื่อเป็น .env ธรรมดา)
- ตั้งค่า Datebase ที่ไฟล์ .env
- ทำการ Generate key ผ่านคำสั่ง ```php artisan key:generate```
- สร้างฐานข้อมูลชื่่อ mds
- ทำการ Migrate Database (สร้างตารางต่าง ๆ) ผ่านคำสั่ง ```php artisan migrate:refresh --seed```
- สั่งรัน Serve ผ่านคำสั่ง ```php artisan serve```
- เข้าสู่หน้าเริ่มต้นผ่าน url http://127.0.0.1:8000
     
## Note:
-
