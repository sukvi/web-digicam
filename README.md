d# 📷 Digicam Sales Web Application

Aplikasi web penjualan kamera digital (digicam) ini dibangun menggunakan PHP untuk backend dan CSS untuk styling. Aplikasi ini memungkinkan pengguna untuk melihat daftar kamera digital yang tersedia, melihat detail produk, dan melakukan login sebagai admin.

## 🚀 Fitur

- **📋 Daftar Produk**: Menampilkan daftar kamera digital yang tersedia dengan detail seperti nama, harga, dan gambar.
- **🔐 Login Admin**: Fitur login untuk admin agar dapat mengelola produk.

## 🛠️ Teknologi yang Digunakan

- **PHP**: Bahasa pemrograman server-side untuk menangani logika backend.
- **CSS**: Untuk styling dan tata letak halaman web.
- **HTML**: Untuk struktur dasar halaman web.
- **MySQL**: Database untuk menyimpan informasi produk dan transaksi.

## 📥 Instalasi

1. **Download XAMPP**:
   - Unduh dan instal XAMPP dari [situs resmi Apache Friends](https://www.apachefriends.org/index.html).

2. **Clone Repository**:
   ```bash
   git clone https://github.com/username/digicam-sales.git
   cd digicam-sales
Upload Database:

Download database dari Google Drive.

Buat database baru di MySQL melalui phpMyAdmin (biasanya di http://localhost/phpmyadmin).

Import file SQL (db_toko.sql) ke database yang baru dibuat.

Konfigurasi Koneksi Database:

Buka file config/database.php dan sesuaikan dengan detail database Anda:

php
Copy
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'digicam';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Masuk');
?>
Jalankan Aplikasi:

Letakkan folder proyek di direktori web server Anda (misalnya, htdocs untuk XAMPP).

Buka browser dan akses http://localhost/(sesuaikan).

🖼️ Screenshot
Homepage
Product Page
Login Page

🔑 Akun Admin
Username: sukvi

Password: 123

🤝 Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository dan buat pull request. Kami sangat menghargai kontribusi Anda!

📜 Lisensi
Proyek ini dilisensikan di bawah MIT License.

📞 Kontak
Jika Anda memiliki pertanyaan atau masukan, silakan hubungi:

Email: 📧 sukvihaccker@gmail.com

GitHub: 🐱 sukvi
