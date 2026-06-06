# LaptopARAS - SPK Pemilihan Laptop Gaming

Aplikasi Sistem Pendukung Keputusan (SPK) berbasis **CodeIgniter 4** yang menerapkan metode **Additive Ratio Assessment (ARAS)** untuk membantu merekomendasikan pilihan laptop *gaming* terbaik secara objektif.

## Fitur Utama
1. **Eksperimen Mandiri Fleksibel**: Pengguna dapat memodifikasi jenis kriteria (menjadi *Benefit* atau *Cost*) secara dinamis sesuai kebutuhan, tanpa dikunci oleh sistem.
2. **Kalkulasi Real-Time Algoritma ARAS**: Sistem otomatis menghitung matriks keputusan (X), menentukan alternatif optimal (A0), matriks normalisasi (R), tingkat utilitas (Ki), hingga peringkat akhir seketika.
3. **Panduan Visual Terstruktur**: Tersedia rujukan panduan metode ARAS dalam 8 langkah yang divisualisasikan dengan desain modern untuk edukasi.
4. **Antarmuka Modern (Tailwind CSS)**: Menggunakan desain yang mulus, responsif, dan palet warna netral sehingga tidak membuat bias saat menilai bobot spesifikasi.

## Teknologi yang Digunakan
- **Backend Framework**: CodeIgniter 4 (PHP 8+)
- **Frontend / Styling**: Tailwind CSS
- **Logika Dinamis**: Vanilla JavaScript (ES6)
- **Metode SPK**: Additive Ratio Assessment (ARAS)

## Panduan Menjalankan Aplikasi
Untuk melihat langkah-langkah instalasi dan eksekusi aplikasi secara lokal di komputer Anda menggunakan **XAMPP**, silakan merujuk pada dokumen [`Running.md`](./Running.md) yang ada di folder *root* proyek ini.

## File Inti Sistem
- `app/Controllers/EksperimenController.php`: Jembatan pengelola *request* dari halaman web ke kalkulator metode.
- `app/Libraries/ArasLibraries.php`: Mesin (kalkulator) utama yang menampung rumus algoritma metode ARAS seutuhnya.
- `app/Views/eksperimen/index.php`: Tata letak antarmuka fitur Eksperimen Mandiri.

## Lisensi
Proyek ini bersifat *Open-Source* dan utamanya dirancang sebagai penelitian/pendidikan mengenai implementasi metode sistem pendukung keputusan tingkat lanjut.
