# Logika & Penjelasan ERD Sistem SPK ARAS

## 1. Simbol Notasi Wajib dalam Entity Relationship Diagram (ERD)
Sebelum membahas struktur ERD sistem ini, berikut adalah komponen wajib yang harus ada dalam pembuatan notasi ERD:
- **Entitas (Entity)**: Objek atau konsep penting di dalam sistem (biasanya digambarkan dengan bentuk persegi panjang).
- **Atribut (Field)**: Karakteristik atau data detail dari suatu entitas (biasanya digambarkan dengan bentuk elips/oval).
- **Relasi (Relation)**: Hubungan yang menghubungkan dua entitas atau lebih (biasanya digambarkan dengan bentuk belah ketupat).
- **Kardinalitas**: Batasan jumlah keterhubungan antar satu entitas dengan entitas lain. Terdiri dari: (1:1) (One-to-One), (1:M) (One-to-Many), (M:M) (Many-to-Many).
- **Garis**: Fungsi dari garis ini tidak hanya sebatas penghubung antar himpunan relasi dengan himpunan entitas, serta himpunan entitas dengan atributnya. Garis dapat mempermudah pengguna untuk melihat dan mengetahui alur sebuah ERD sehingga nampak jelas awal dan akhirnya.

---

## 2. Analisis Logika ERD Berdasarkan Komponen Sistem

Berdasarkan keseluruhan dokumen sistem (`spk_aras.sql`, `MetodeARAS.md`, `SurveiData.md`, dan `WorkflowSistem.md`), struktur logika ERD yang dibangun **sudah sangat benar dan sinkron**. Berikut adalah penjabaran logikanya berdasarkan prinsip-prinsip relasi basis data:

### A. Logika Pengumpulan Data Survei (Tab 2)
- **Kesesuaian Data Survei**: Pada `SurveiData.md`, terdapat aturan bahwa setiap **1 responden** (Entitas) menghasilkan tepat **1 set nilai kepentingan (bobot)** dan memilih **1 spesifikasi laptop**.
- **Kardinalitas (1:1)**: Struktur pada `spk_aras.sql` memecah entitas ini menjadi 3 tabel (`responden`, `bobot_kriteria`, dan `skor_laptop`) dengan kardinalitas **1 to 1 (1:1)**. Relasi (garis) ini sangat logis dan mencegah redundansi data, sesuai dengan standar *Normalisasi Database*.

### B. Logika Perhitungan ARAS Survei (Tab 3)
- **Alternatif (Matriks X)**: Menurut `MetodeARAS.md`, metode ARAS membutuhkan kumpulan "Alternatif". Ke-26 data di tabel entitas `skor_laptop` dirancang untuk ditarik sebagai alternatif. Atribut string (label) dan atribut numerik (skor) dipisah agar mempermudah komputasi.
- **Kriteria Cost & Benefit**: Atribut harga dan berat akan diperlakukan sebagai *Cost*, sementara atribut lainnya sebagai *Benefit*. Data numerik dari `bobot_kriteria` digunakan sebagai penentu bobot terstandardisasi.

### C. Logika Eksperimen Mandiri (Tab 4)
- **Entitas Stand-Alone**: Di `WorkflowSistem.md`, Tab 4 ditujukan untuk eksperimen pengguna di luar data survei. Oleh karena itu, entitas `eksperimen_hasil` digambarkan berdiri sendiri tanpa garis relasi kardinalitas langsung ke tabel `responden`.
- **Atribut JSON**: Penggunaan tipe data atribut `JSON` (`bobot_json`, `hasil_json`, `alternatives_json`) di dalam tabel `eksperimen_hasil` merupakan *Best Practice*. Ini mencegah sistem harus membuat entitas/tabel baru yang rumit hanya untuk menyimpan perhitungan matriks ARAS yang banyak (*X, A0, R, D, Si, Ki*).

### D. Logika Penggunaan View (`v_responden_lengkap`)
- Menggabungkan data dari relasi tiga entitas utama (`responden`, `bobot_kriteria`, `skor_laptop`) secara manual terus-menerus akan memberatkan sistem. Kehadiran entitas *Virtual* (View) ini membuat garis alur Backend ke Database menjadi sangat cepat dan sederhana.

**Kesimpulan Akhir:**  
Desain ERD dan basis data secara logika sudah sesuai dengan kaidah sistem relasional, dan mampu mendukung seluruh alur kerja (workflow) serta perumusan matematika ARAS tanpa ada pertentangan logika.
