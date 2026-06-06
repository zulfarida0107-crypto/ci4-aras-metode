# Panduan Instalasi dan Menjalankan LaptopARAS

Proyek ini adalah Sistem Pendukung Keputusan (SPK) untuk Pemilihan Laptop Gaming dengan metode ARAS (Additive Ratio Assessment), dibangun menggunakan framework **CodeIgniter 4**. 

Ikuti panduan ringkas berikut untuk menjalankan aplikasi di komputer lokal Anda, khususnya jika Anda menggunakan lingkungan **XAMPP**.

---

## 1. Persyaratan Sistem
- **XAMPP** versi terbaru (dengan versi **PHP minimal 8.1**).
- **Composer** (Opsional, untuk *update* dependensi jika dibutuhkan, namun biasanya CodeIgniter 4 sudah dapat berjalan tanpa perlu *install* ulang).
- Ekstensi PHP yang wajib aktif di XAMPP: `intl`, `mbstring`, `curl`, dan `json` (mayoritas sudah menyala *default* pada XAMPP versi baru).

## 2. Kriteria Penggunaan XAMPP yang Krusial
Agar aplikasi berjalan lancar, perhatikan port XAMPP berikut:
1. **Apache (Web Server)**: Secara standar menggunakan **Port 80** dan **443** (SSL). Jika bentrok dengan aplikasi lain (misal: Skype atau VMWare), Anda harus menggantinya di file `httpd.conf` (misalnya menjadi 8080).
2. **MySQL (Database)**: Secara standar menggunakan **Port 3306**.
   
> **Penting:** Pastikan Anda menekan tombol **Start** pada baris Apache dan MySQL di XAMPP Control Panel sebelum menjalankan aplikasi. Indikator nama "Apache" dan "MySQL" harus berwarna hijau.

---

## 3. Langkah Konfigurasi & Menjalankan

### Tahap 1: Persiapan Database (Opsional jika Anda tidak memakai DB sementara)
Jika Anda menggunakan fitur *database* (misalnya untuk halaman Responden atau menyimpan histori), ikuti langkah ini:
1. Buka browser dan ketik: `http://localhost/phpmyadmin`
2. Buat database baru dengan nama, misalnya: `ci4_aras_metode`
3. Pada folder proyek ini, salin file `env` menjadi `.env`.
4. Buka file `.env`, hilangkan tanda pagar (`#`) pada baris *database*, dan atur agar sesuai:
   ```env
   database.default.hostname = localhost
   database.default.database = ci4_aras_metode
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   database.default.port     = 3306
   ```
   *(Catatan: Username standar XAMPP adalah `root` dan passwordnya dikosongkan).*

### Tahap 2: Menjalankan Aplikasi
Ada dua cara umum untuk mengakses proyek CodeIgniter 4 ini:

#### Cara A: Menggunakan Spark Built-in Server (Sangat Direkomendasikan)
Cara ini paling aman dan rapi karena tidak menampilkan awalan `/public` di URL.
1. Buka Terminal / CMD / PowerShell.
2. Arahkan *directory* ke dalam folder proyek ini (contoh: `cd C:\xampp\htdocs\ci4-aras-metode`).
3. Ketik perintah berikut:
   ```console
   php spark serve
   ```
4. Buka browser Anda dan akses: **http://localhost:8080**

#### Cara B: Mengakses Langsung dari Folder XAMPP
Jika Anda sudah meletakkan folder ini tepat di dalam `C:\xampp\htdocs\`, Anda bisa memanggilnya langsung melalui browser tanpa `spark`:
1. Buka browser dan ketik alamat berikut:
   **http://localhost/ci4-aras-metode/public/**
2. *(Catatan: URL ini sedikit panjang karena harus merujuk ke folder `/public` demi alasan keamanan CodeIgniter).*

---

## 4. Penjelasan Singkat Fitur Utama
- **Dashboard (`/`)**: Menampilkan beranda dengan ringkasan sistem.
- **Eksperimen Mandiri (`/eksperimen`)**: Halaman inti kalkulator SPK. Pengguna dapat mengubah angka spesifikasi, menyesuaikan atribut sebagai *Benefit* atau *Cost*, lalu mengeklik "Hitung ARAS" untuk menampilkan Tabel Matriks, Normalisasi, Utilitas, hingga *Ranking* akhir secara *real-time*.
- **Panduan Metode (`/panduan`)**: Menjelaskan konsep ARAS secara visual dari Langkah 1 hingga Langkah 8.
