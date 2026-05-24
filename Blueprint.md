# Blueprint Sistem SPK ARAS - Pemilihan Laptop Gaming

**Dokumen ini** menjelaskan secara lengkap dan jelas bagaimana sistem ini dibangun, mengapa dibuat seperti itu, dan siapa yang mengerjakan apa.

**Tujuan Blueprint ini:**
- Memberi gambaran besar kepada seluruh tim
- Menjadi acuan utama agar tidak ada yang salah paham
- Memudahkan pembagian tugas dan integrasi antar anggota

---

## 1. Gambaran Umum Sistem

**Nama Sistem:** SPK ARAS Laptop Gaming  
**Metode:** Additive Ratio Assessment (ARAS)  
**Jumlah Responden:** 26 orang  
**Tujuan Sistem:** Membantu user memilih laptop gaming terbaik berdasarkan preferensi mereka sendiri atau data survei.

**Ada 2 Mode Utama:**
- **Mode Survei** → Menggunakan data 26 responden (Tab 3)
- **Mode Eksperimen Mandiri** → User bisa bebas mengatur sendiri (Tab 4) ← Fitur unggulan

---

## 2. Struktur Tab (5 Halaman Utama)

| Tab | Nama Halaman                  | Tujuan Utama | Fitur Utama | File View Utama |
|-----|-------------------------------|--------------|-------------|-----------------|
| 1   | Dashboard                     | Halaman depan | Ringkasan, statistik, Top 3 | `dashboard/index.php` |
| 2   | Data Responden                | Referensi data | Tabel identitas, bobot, skor | `responden/index.php` |
| 3   | Hasil ARAS Survei             | Hasil tetap | 8 tahap perhitungan ARAS | `aras/index.php` |
| 4   | Eksperimen Mandiri            | **Fitur Utama** | Input bebas user + hitung ARAS | `eksperimen/index.php` |
| 5   | Panduan Metode                | Edukasi | Penjelasan ARAS & kuesioner | `panduan/index.php` |

---

## 3. Komponen Global (Digunakan di Semua Halaman)

- **Header** → Logo, nama aplikasi, tab navigasi, toggle tema
- **Sidebar** → Menu vertikal (Dashboard, Data Responden, dll)
- **Footer** → Disclaimer + info proyek

**File yang harus dikerjakan:**
- `app/Views/layout/header.php`
- `app/Views/layout/sidebar.php`
- `app/Views/layout/footer.php`

---

## 4. Teknologi yang Digunakan

- **Framework:** CodeIgniter 4 (PHP)
- **Database:** MySQL
- **Styling:** Tailwind CSS
- **JavaScript:** Vanilla JS + Chart.js + AJAX
- **Library ARAS:** Custom Library (`ArasCalculator.php`)

---

## 5. Pembagian Tugas (Ringkasan)

- **Person 1** → UI/UX + Frontend (View + JS)
- **Person 2** → ARAS Engine (Logika Matematika)
- **Person 3** → Database + Model
- **Person 4** → Controller + Integrasi

---

## 6. Alur Kerja Sistem (Sederhana)

1. User membuka aplikasi → Dashboard
2. User bisa lihat data survei (Tab 2 & 3)
3. User masuk ke **Eksperimen Mandiri** (Tab 4)
4. User atur bobot, tipe kriteria, dan tambah laptop
5. Klik "Hitung ARAS" → Sistem jalankan perhitungan
6. Hasil muncul + bisa dibandingkan dengan hasil survei

---

**Catatan Penting untuk Seluruh Tim:**
- Semua desain harus mengikuti blueprint ini.
- Tab 4 adalah fitur paling penting → diberi prioritas tertinggi.
- Selalu prioritaskan **kejelasan** dan **kemudahan penggunaan**.
- Dokumentasi dan komentar kode harus jelas agar mudah dipahami orang lain.

---

*Dokumen ini adalah acuan utama proyek. Jika ada perubahan, update dokumen ini terlebih dahulu.*