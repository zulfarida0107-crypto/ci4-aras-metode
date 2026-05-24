# Workflow Sistem SPK ARAS

**Tujuan dokumen ini:**  
Memberikan gambaran yang jelas tentang **bagaimana sistem ini bekerja** dari sudut pandang pengguna (User) dan dari sudut pandang teknis (Backend). Dokumen ini dibuat agar semua anggota tim bisa memahami alur keseluruhan sistem.

---

## Alur Penggunaan Sistem (User Journey)

### 1. User Masuk Aplikasi
→ **Halaman Dashboard (Tab 1)**

**Penjelasan:**  
Ini adalah halaman pertama yang dilihat user ketika membuka aplikasi.  
**Kegunaan:**  
- Memberi ringkasan singkat tentang sistem  
- Menampilkan statistik responden (26 orang)  
- Menampilkan Top 3 laptop terbaik dari hasil survei  
- Memberikan tombol cepat untuk langsung ke "Eksperimen Mandiri"

---

### 2. Melihat Data Referensi
→ **Data Responden (Tab 2)**

**Penjelasan:**  
User dapat melihat semua data mentah yang berasal dari kuesioner Google Form.  
**Kegunaan:**  
- Melihat identitas responden (nama, usia, status)  
- Melihat bobot kriteria yang diberikan responden (Bagian 2)  
- Melihat penilaian laptop responden (Bagian 3) dengan toggle antara Label dan Skor  
- Filter dan pencarian data agar mudah dicari

---

### 3. Melihat Hasil Survei
→ **Hasil ARAS Survei (Tab 3)**

**Penjelasan:**  
Menampilkan hasil perhitungan ARAS berdasarkan data 26 responden.  
**Kegunaan:**  
- Menampilkan secara transparan 8 tahap perhitungan ARAS  
- User bisa melihat bagaimana sistem menghitung dari awal sampai ranking akhir  
- Memberikan hasil ranking laptop berdasarkan opini responden

---

### 4. Melakukan Eksperimen Mandiri (Fitur Utama)
→ **Eksperimen Mandiri (Tab 4)**

**Penjelasan:**  
Fitur paling interaktif. User bisa "bereksperimen" dengan sistem sesuai keinginan sendiri.  
**Kegunaan:**
- User mengatur bobot kriteria sendiri (1-3)
- User menentukan sendiri kriteria mana yang bertipe Cost atau Benefit
- User memasukkan beberapa alternatif laptop (nama + spesifikasi)
- Klik tombol "Hitung ARAS"
- Langsung melihat hasil ranking, progress bar Ki, dan insight

**Kenapa penting?**  
Fitur ini membuat sistem tidak kaku hanya berdasarkan data survei, tapi bisa digunakan untuk eksperimen pribadi.

---

### 5. Referensi & Edukasi
→ **Panduan Metode (Tab 5)**

**Penjelasan:**  
Halaman dokumentasi bawaan sistem.  
**Kegunaan:**
- Penjelasan apa itu metode ARAS
- Hubungan antara kuesioner dengan tahapan ARAS
- Tabel konversi skor lengkap
- Glosarium istilah dan FAQ

---

## Alur Teknis (Backend / Cara Kerja di Balik Layar)

1. **User melakukan input** (terutama di Tab 4)  
2. **Frontend** mengirim data ke **Controller** melalui AJAX  
3. **Controller** memanggil **Library ArasCalculator**  
4. **Library** menjalankan 8 tahap perhitungan ARAS  
5. **Hasil perhitungan** dikembalikan dalam bentuk JSON  
6. **Frontend** menampilkan hasil secara visual (ranking, progress bar, insight)  
7. (Opsional) Hasil eksperimen disimpan ke tabel `eksperimen_hasil`

---

**Catatan Penting:**

- Alur paling kompleks ada di **Tab 4 (Eksperimen Mandiri)** karena melibatkan input dinamis dan perhitungan real-time.
- Semua tab menggunakan layout yang sama (Header + Sidebar + Content + Footer) agar tampilan konsisten.
- Data survei bersifat **referensi**, sedangkan Tab 4 bersifat **fleksibel** sesuai keinginan user.

---

