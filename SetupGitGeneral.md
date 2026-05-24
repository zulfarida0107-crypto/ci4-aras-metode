# Setup Git untuk Tim SPK ARAS

**Tujuan dokumen ini:**  
Memberikan panduan yang jelas dan mudah dipahami agar semua anggota tim bisa berkolaborasi dengan rapi, aman, dan terhindar dari konflik kode.

## 1. Setup Awal 
1. Buat Repository di GitHub (Private)
2. Invite 3 anggota tim sebagai Collaborator
3. Clone repository ke komputer masing-masing:

```bash
git clone https://github.com/username/LaptopARAS.git   # proses "menyalin" project dari GitHub ke komputer lokal.
cd LaptopARAS
```

## 2. Aturan Branch (PENTING!)
**JANGAN PUSH LANGSUNG KE MAIN!**

Kita menggunakan strategi branch sebagai berikut:

- `main` → Branch utama (production) → hanya berisi kode yang sudah stabil dan siap.
- `develop` → Branch pengembangan → tempat penggabungan semua fitur.
- Setiap orang buat branch sendiri:

```bash
Kita pakai branch per orang + fitur utama:

- `main` → Hanya kode yang sudah siap dan di-review
- `person1-ui` → UI/UX + View + Frontend Semua Tab (Person 1)
- `person2-aras-engine` → Library ARAS & Logika perhitungan (Person 2)
- `person3-database` → Database + Model (Person 3)
- `person4-integration` → Controller + Integrasi keseluruhan (Person 4)
```

**Jangan menambahkan Branch baru, kita hanya pakai 5 branch di atas**
- Branch berfungsi seperti "ruang kerja pribadi" masing-masing.
- Mencegah kode yang belum selesai atau masih ada error merusak kode utama (main).
- Memudahkan kita melacak siapa yang sedang mengerjakan apa.
- Mengurangi konflik saat beberapa orang coding bersamaan.

## 3. Workflow Git Harian (Cara Kerja Sehari-hari)
# Langkah 1: Update kode terbaru
`git checkout develop`
`git pull origin develop`      # untuk mengambil perubahan terbaru dari teman, supaya kode selalu update

# Langkah 2: Pindah ke branch kamu
`git checkout person1-ui`           # branch untuk (Person 1)
`git checkout person2-aras-engine`  # branch untuk (Person 2)
`git checkout person3-database`     # branch untuk (Person 3)
`git checkout person4-integration`  # branch untuk (Person 4)

# Langkah 3: Kerja coding seperti biasa, sudah dijabarin ke file .md masing-masing

# Langkah 4: Simpan perubahan
`git add .`
`git commit -m "feat: tambah dynamic row di eksperimen"`   # contoh message commit, sesuaikan dengan perubahan yang dibuat yaa
`git push origin person1-ui`   #jangan lupa origin diikuti nama branch sesuai dengan yang digunakan

## 4. Pull Request (PR)
- Setelah selesai fitur → Buat Pull Request ke branch `develop`
- Tunggu review dari tim
- Setelah di-approve → Merge ke `develop`

Cara Kerja:
- Setelah fitur selesai, buat Pull Request dari branch kamu ke branch develop.
- Minta review dari minimal 1 anggota tim lainnya.
- Setelah disetujui → Merge ke develop.

Penjelasan & Kegunaan:
- `Pull Request` = "Permohonan untuk menggabungkan kode".
- Memberi kesempatan tim untuk review kode (menemukan kesalahan sebelum digabung).
- Meningkatkan kualitas kode dan saling belajar antar anggota.
- Mencegah bug masuk ke branch utama.

## 5. Aturan Commit Message
- `feat:` = fitur baru
- `fix:` = perbaikan bug
- `docs:` = dokumentasi
- `refactor:` = perbaikan kode
- `style:` = Perubahan tampilan / formatting

Contoh: 
`feat: tambah dynamic row di eksperimen`
`fix: perbaikan bug toggle label/skor di Tab 2`
`docs: update SetupGitGeneral.md`


