# Tugas Orang Keempat

**Role:** Frontend Developer + Sistem Integrasi

**Penjelasan Role (Mudah Dipahami):**  
Kamu adalah "penghubung" antar semua bagian. Kamu menghubungkan desain (Person 1), logika ARAS (Person 2), dan database (Person 3) agar menjadi satu aplikasi yang utuh.

**Tujuan Tugas Ini:**  
Memastikan semua bagian sistem bisa saling terhubung dan berjalan lancar.

**Tugas Utama & File yang Harus Dikerjakan:**

**File Utama:**
- `app/Config/Routes.php` → Pengaturan alamat URL
- `app/Controllers/` → Semua file Controller: (sudah dibuat tinggal diisi)
  - `DashboardController.php`
  - `RespondenController.php`
  - `ArasController.php`
  - `EksperimenController.php` ← Paling penting
  - `PanduanController.php`

**Detail Pekerjaan:**
- Membuat routing untuk semua tab
- Menghubungkan Model, Library ARAS, dan View
- Membuat logika di Controller (terutama Tab 4)
- Mengatur AJAX untuk fitur Eksperimen Mandiri
- Memastikan semua halaman bisa diakses tanpa error

**Kegunaan:**
- Menjadi "perekat" sistem agar semua bagian bisa bekerja sama
- Ketika user klik "Hitung ARAS", sistem benar-benar berjalan

**Output yang Diharapkan:**
- Semua Controller berfungsi dengan baik
- Sistem terintegrasi secara keseluruhan
- Aplikasi bisa dijalankan dari awal sampai akhir

**Kolaborasi:** Bekerja erat dengan Person 1 (UI), Person 2 (ARAS), dan Person 3 (Database).