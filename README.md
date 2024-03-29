<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Aplikasi Perpustakan

Aplikasi Perpustakan adalah sebuah sistem yang dirancang untuk mengelola data anggota perpustakaan dan mencatat kunjungan. Aplikasi ini dilengkapi dengan grafik visual yang memudahkan pemantauan aktivitas perpustakaan. Aplikasi ini cocok untuk perpustakaan dengan skala kecil, seperti sekolah di desa atau lingkungan sejenis.

**Fitur Utama:**

- Pengelolaan Data Anggota Perpustakaan.
- Pencatatan Kunjungan dengan Grafik Visual.
- Cocok untuk Perpustakaan Skala Kecil (Sekolah Desa dan Sejenisnya).
- Mudah untuk Berkontribusi dengan Penambahan Otentikasi (Authenticasi).

Aplikasi ini saat ini belum dilengkapi dengan sistem otentikasi (authenticasi) dan lebih cocok digunakan dalam lingkungan lokal. Bagi mereka yang ingin menambahkan sistem otentikasi, kami sangat menghargai kontribusi Anda.

## Cara Memulai

Berikut adalah langkah-langkah dasar untuk memulai menggunakan Aplikasi Perpustakan:

1. **Instalasi Dependencies**: Pastikan Anda memiliki PHP dan Composer terinstal. Kemudian, jalankan perintah berikut di terminal Anda untuk menginstal semua dependencies yang diperlukan:

    ```bash
    composer install
    ```

2. **Konfigurasi Lingkungan**: Salin file `.env.example` menjadi `.env` dan konfigurasikan variabel lingkungan yang sesuai seperti pengaturan database.

3. **Migrasi Database**: Jalankan migrasi untuk membuat tabel-tabel yang diperlukan dalam database:

    ```bash
    php artisan migrate
    ```

4. **Jalankan Aplikasi**: Jalankan aplikasi dengan perintah berikut:

    ```bash
    php artisan serve
    ```

5. **Akses Aplikasi**: Buka browser dan akses aplikasi melalui URL [http://localhost:8000](http://localhost:8000).

## Kontribusi

Kami menyambut kontribusi dari komunitas! Jika Anda ingin berkontribusi dengan menambahkan sistem otentikasi atau fitur lainnya, silakan kirimkan pull request. Panduan kontribusi dapat ditemukan dalam [dokumentasi kontribusi](CONTRIBUTING.md).

## Pedoman Berperilaku

Kami memegang prinsip bahwa komunitas Laravel harus ramah dan inklusif untuk semua orang. Kami mendorong semua anggota komunitas untuk mematuhi [Pedoman Berperilaku](CODE_OF_CONDUCT.md) kami.



## Lisensi

Aplikasi Perpustakan adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).

---

Terima kasih telah menggunakan Aplikasi Perpustakan!
