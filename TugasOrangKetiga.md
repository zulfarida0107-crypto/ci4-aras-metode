# Tugas Orang Ketiga

**Role:** Database & Backend Data Specialist

**Penjelasan Role (Mudah Dipahami):**  
Kamu bertanggung jawab mengatur "tempat penyimpanan data" aplikasi ini.

**Tujuan Tugas Ini:**  
Agar semua data (26 responden, bobot, skor laptop) tersimpan dengan rapi dan mudah diambil oleh sistem.

**Tugas Utama & File yang Harus Dikerjakan:**

**File Utama:**
- `database/spk_aras.sql` → Struktur database
- `app/Models/RespondenModel.php`

**Detail Pekerjaan:**
- Membuat tabel database sesuai kuesioner (responden, bobot, skor laptop)
- Import data dari file Excel ke dalam database
- Membuat Model CI4 untuk mengambil dan mengolah data
- Membuat fungsi-fungsi seperti: ambil semua responden, hitung rata-rata bobot, dll

**Kegunaan:**
- Data tersimpan secara aman dan terstruktur
- Memudahkan Controller mengambil data untuk ditampilkan di Tab 2 dan Tab 3

**Output yang Diharapkan:**
- File `database/spk_aras.sql` (sudah dibuat, tinggal diimpor ke database)
- Semua data 26 responden sudah masuk ke database
- Model yang rapi dan efisien

**Kolaborasi:** Memberikan data yang bersih ke Person 2 dan Person 4.