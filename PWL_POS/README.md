## Praktikum 1 - pengaturan database
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum1.png)

## Praktikum 2.1 - Pembuatan file migrasi tanpa relasi
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum2.1.png)

## Praktikum 2.2 - Pembuatan file migrasi dengan relasi
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum2.2.png)

## Praktikum 3 – Membuat file seeder
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum3.1.png)
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum3.2.png)

## Praktikum 4 – Implementasi DB Façade
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum4.png)

## Praktikum 5 – Implementasi Query Builder
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum5.png)

## Praktikum 6 – Implementasi Eloquent ORM
![image alt](https://github.com/RizkiHadiono/PWL/blob/8bae6c233678f7606b27af3e2ec54cc994a5dcb1/PWL_POS/Praktikum6.png)

# Panduan Jawaban Penutup (Tugas)

- Fungsi APP_KEY: Digunakan untuk mengenkripsi data session dan cookie di Laravel agar aplikasi aman.

- Cara Generate APP_KEY: Menggunakan perintah terminal php artisan key:generate.

- File migrasi bawaan Laravel: Secara default ada 4 file (users, password_reset_tokens, failed_jobs, personal_access_tokens) yang digunakan untuk mengelola autentikasi dan job queue bawaan.

- Fungsi $table->timestamps(): Secara otomatis membuat dua kolom, yaitu created_at dan updated_at bertipe datetime.

- Tipe data $table->id(): Menghasilkan tipe data bigint unsigned yang auto-increment.

- Beda $table->id() vs $table->id('level_id'): $table->id() membuat kolom bernama id, sedangkan dengan parameter menjadikannya bernama level_id.

- Fungsi ->unique(): Memastikan data di kolom tersebut tidak boleh ada yang duplikat/sama (unik).

- Kenapa tipe datanya berbeda?: Karena di tabel referensi (m_level), $table->id() membuat kolom tipe bigint unsigned. Maka, Foreign Key di m_user (level_id) harus dibuat dengan tipe data yang persis sama, yaitu unsignedBigInteger agar bisa direlasikan.

- Fungsi Class Hash: Untuk mengenkripsi password dengan algoritma hashing bcrypt agar aman.

- Tanda tanya (?) di DB Facade: Digunakan sebagai parameter binding untuk mencegah serangan SQL Injection.

- Tujuan protected $table dan $primaryKey: Karena nama tabel/ID kita tidak menggunakan standar penamaan jamak bahasa Inggris bawaan Laravel (misal tabel users ber-id id), harus mendeklarasikan nama tabel (m_user) dan primary key (user_id) secara eksplisit di Model.

- Lebih mudah mana?: Biasanya Eloquent ORM adalah yang paling mudah karena kita bekerja dengan objek dan kode menjadi jauh lebih ringkas dan elegan, serta relasi antar tabel dikelola dengan mudah.

<br>
<br>
<br>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
