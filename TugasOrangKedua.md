# Tugas Orang Kedua

**Role:** ARAS Engine Specialist (Ahli Logika Perhitungan)

**Penjelasan Role (Mudah Dipahami):**  
Kamu adalah orang yang membuat "otak" aplikasi ini. Kamu menulis logika matematika metode ARAS supaya perhitungannya benar.

**Tujuan Tugas Ini:**  
Memastikan semua perhitungan ARAS (8 tahap) akurat sesuai rumus di dokumen Word.

**Tugas Utama & File yang Harus Dikerjakan:**

**File Utama:**
- `app/Libraries/ArasCalculator.php` ← **File paling krusial di seluruh proyek**

**Detail Pekerjaan:**
- Membuat fungsi lengkap 8 tahap ARAS:
  1. Matriks Keputusan (X)
  2. Alternatif Optimal (A0)
  3. Normalisasi Matriks (R)
  4. Matriks Terbobot (D)
  5. Nilai Si
  6. Nilai S0
  7. Nilai Ki
  8. Ranking Final
- Membuat fungsi konversi (misalnya: ">25 juta" → skor 1)
- Membuat perhitungan untuk 2 mode:
  - Mode Survei (menggunakan data 26 responden)
  - Mode Eksperimen Mandiri (menggunakan input user)

**Kegunaan:**
- Ini adalah inti dari seluruh sistem. Kalau perhitungan salah, semua hasil akan salah.
- Library ini akan dipakai oleh Tab 3 dan Tab 4.

**Output yang Diharapkan:**
- File `ArasCalculator.php` yang bersih, mudah dibaca, dan hasil perhitungannya benar 100%
- Bisa diuji terpisah (unit test)

**Kolaborasi:** Bekerja sama dengan Person 4 agar library ini bisa dipanggil dari Controller.