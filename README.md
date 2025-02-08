download aplikasi xammp
upload database ke dalam localhost xammp
database bisa di download di https://drive.google.com/drive/folders/1hJRIdqEOC7ZzuRQYdKgQbOR7OWf4iZkI?usp=drive_link
selain database di google drive,terdapat akun admin



# Digicam Sales Web Application

![Digicam Sales](screenshot.png)

Aplikasi web penjualan kamera digital (digicam) ini dibangun menggunakan PHP untuk backend dan CSS untuk styling. Aplikasi ini memungkinkan pengguna untuk melihat daftar kamera digital yang tersedia, menambahkan produk ke keranjang belanja, dan melakukan checkout.

## Fitur

- **Daftar Produk**: Menampilkan daftar kamera digital yang tersedia dengan detail seperti nama, harga, dan gambar.
- **Keranjang Belanja**: Pengguna dapat menambahkan produk ke keranjang belanja dan mengelola item yang ada di dalamnya.
- **Checkout**: Proses checkout sederhana untuk menyelesaikan pembelian.
- **Responsive Design**: Desain yang responsif untuk tampilan yang optimal di berbagai perangkat.

## Teknologi yang Digunakan

- **PHP**: Bahasa pemrograman server-side untuk menangani logika backend.
- **CSS**: Untuk styling dan tata letak halaman web.
- **HTML**: Untuk struktur dasar halaman web.
- **MySQL**: Database untuk menyimpan informasi produk dan transaksi.

Setup Database:

Buat database baru di MySQL.

Import file SQL yang ada di folder database/db_toko.sql ke database Anda.

Konfigurasi Koneksi Database:

Buka file config/database.php dan sesuaikan dengan detail database Anda:

php
<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'digicam';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Masuk');
    ?>
Jalankan Aplikasi:

Letakkan folder proyek di direktori web server Anda (misalnya, htdocs untuk XAMPP).

Buka browser dan akses http://localhost/digicam-sales.
Kontak
Jika Anda memiliki pertanyaan atau masukan, silakan hubungi:
Email: sukvihaccker@gmail.com
GitHub: sukvi
