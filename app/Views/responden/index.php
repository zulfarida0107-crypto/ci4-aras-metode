<!-- ============================================
     Tab 2: Data Responden
     Tabel identitas responden (nama, usia, status),
     bobot kriteria, penilaian laptop dengan
     toggle Label/Skor, filter & pencarian.
     ============================================ -->

<!-- ===== PAGE HEADER ===== -->
<section class="mb-6 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/25">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                    </svg>
                </span>
                Data Responden
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Data lengkap 26 responden dari kuesioner pemilihan laptop gaming</p>
        </div>
        <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
            26 Responden
        </span>
    </div>
</section>

<!-- ===== FILTER & SEARCH BAR ===== -->
<section class="mb-6">
    <div class="bg-white dark:bg-surface-800 rounded-2xl p-4 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
        <div class="flex flex-col sm:flex-row flex-wrap gap-3 items-end">
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Cari Nama</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    <input type="text" id="search-nama" placeholder="Ketik nama responden..." 
                           class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-surface-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all outline-none">
                </div>
            </div>
            <!-- Filter Status -->
            <div class="min-w-[150px]">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Status</label>
                <select id="filter-status" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-surface-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all outline-none">
                    <option value="">Semua</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Bekerja">Bekerja</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <!-- Filter Usia -->
            <div class="min-w-[150px]">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Rentang Usia</label>
                <select id="filter-usia" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-surface-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all outline-none">
                    <option value="">Semua</option>
                    <option value="18-21">18 – 21 tahun</option>
                    <option value="22-25">22 – 25 tahun</option>
                    <option value="26+">26+ tahun</option>
                </select>
            </div>
            <!-- Toggle Label/Skor -->
            <div class="min-w-[180px]">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Tampilan Penilaian</label>
                <div class="flex items-center gap-2 px-3 py-2 rounded-xl bg-slate-50 dark:bg-surface-700 border border-slate-200 dark:border-slate-600">
                    <span id="label-mode-text" class="text-xs font-semibold text-primary-600 dark:text-primary-400">Label</span>
                    <button id="toggle-label-skor" type="button" class="relative w-11 h-6 rounded-full bg-primary-500 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500/50">
                        <span id="toggle-knob" class="absolute left-0.5 top-0.5 w-5 h-5 rounded-full bg-white shadow-md transition-transform duration-300"></span>
                    </button>
                    <span id="skor-mode-text" class="text-xs font-medium text-slate-400">Skor</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== TABLE 1: IDENTITAS RESPONDEN ===== -->
<section class="mb-8">
    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
        📋 Identitas Responden
    </h3>
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabel-identitas">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-700/50 text-left">
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">No</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-20">Usia</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-32">Status</th>
                    </tr>
                </thead>
                <tbody id="tbody-identitas" class="divide-y divide-slate-100 dark:divide-slate-700/50">
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== TABLE 2: BOBOT KRITERIA ===== -->
<section class="mb-8">
    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
        ⚖️ Bobot Kriteria per Responden
        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-slate-100 dark:bg-surface-700 text-slate-500 dark:text-slate-400">Skala 1–3</span>
    </h3>
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabel-bobot">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-700/50 text-left">
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">No</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Harga</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Berat</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">RAM</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Storage</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Processor</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Baterai</th>
                    </tr>
                </thead>
                <tbody id="tbody-bobot" class="divide-y divide-slate-100 dark:divide-slate-700/50">
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== TABLE 3: PENILAIAN LAPTOP (LABEL VIEW) ===== -->
<section class="mb-8" id="section-penilaian-label">
    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
        💻 Penilaian Laptop oleh Responden
        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400" id="badge-view-mode">Mode: Label</span>
    </h3>
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabel-label">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-700/50 text-left">
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">No</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Harga</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Berat</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">RAM</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Storage</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Processor</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Baterai</th>
                    </tr>
                </thead>
                <tbody id="tbody-label" class="divide-y divide-slate-100 dark:divide-slate-700/50">
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== TABLE 3B: PENILAIAN LAPTOP (SKOR VIEW - Hidden) ===== -->
<section class="mb-8 hidden" id="section-penilaian-skor">
    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
        💻 Penilaian Laptop oleh Responden
        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400">Mode: Skor</span>
    </h3>
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabel-skor">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-700/50 text-left">
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">No</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Harga</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Berat</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">RAM</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Storage</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Processor</th>
                        <th class="px-4 py-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Baterai</th>
                    </tr>
                </thead>
                <tbody id="tbody-skor" class="divide-y divide-slate-100 dark:divide-slate-700/50">
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== SUMMARY STATISTICS ===== -->
<section class="mb-4">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm text-center">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Status Terbanyak</p>
            <p class="text-lg font-bold text-primary-600 dark:text-primary-400">Mahasiswa</p>
            <p class="text-xs text-slate-400">18 dari 26 responden (69%)</p>
        </div>
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm text-center">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Rata-rata Usia</p>
            <p class="text-lg font-bold text-emerald-600 dark:text-emerald-400">21.8 tahun</p>
            <p class="text-xs text-slate-400">Range: 18 – 29 tahun</p>
        </div>
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm text-center">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Kriteria Prioritas Tertinggi</p>
            <p class="text-lg font-bold text-violet-600 dark:text-violet-400">Processor</p>
            <p class="text-xs text-slate-400">Rata-rata bobot: 2.73</p>
        </div>
    </div>
</section>

<!-- ===== JAVASCRIPT: DATA & INTERAKTIVITAS ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== DATA DEMO RESPONDEN =====
    const responden = [
        { nama: 'Ahmad Fauzan', usia: 20, status: 'Mahasiswa', bobot: [3,2,3,2,3,2], label: ['>25 juta','2-2.5 kg','16GB','1TB','i7/Ryzen 7','5-7 jam'], skor: [1,3,3,3,3,3] },
        { nama: 'Budi Santoso', usia: 22, status: 'Mahasiswa', bobot: [2,1,3,2,3,3], label: ['20-25 juta','2.5-3 kg','8GB','512GB','i5/Ryzen 5','3-5 jam'], skor: [2,2,2,2,2,2] },
        { nama: 'Citra Dewi', usia: 21, status: 'Mahasiswa', bobot: [3,3,2,2,3,1], label: ['15-20 juta','>3 kg','16GB','512GB','i7/Ryzen 7','5-7 jam'], skor: [3,1,3,2,3,3] },
        { nama: 'Dimas Pratama', usia: 23, status: 'Bekerja', bobot: [1,2,3,3,3,2], label: ['10-15 juta','1.5-2 kg','32GB','1TB','i9/Ryzen 9','7-9 jam'], skor: [4,4,4,3,4,4] },
        { nama: 'Eka Putri', usia: 19, status: 'Mahasiswa', bobot: [3,2,2,1,3,2], label: ['>25 juta','2-2.5 kg','8GB','512GB','i7/Ryzen 7','3-5 jam'], skor: [1,3,2,2,3,2] },
        { nama: 'Fajar Hidayat', usia: 24, status: 'Bekerja', bobot: [2,1,3,3,2,3], label: ['15-20 juta','2.5-3 kg','16GB','1TB','i5/Ryzen 5','7-9 jam'], skor: [3,2,3,3,2,4] },
        { nama: 'Gita Rahmawati', usia: 20, status: 'Mahasiswa', bobot: [2,3,2,2,3,1], label: ['20-25 juta','1.5-2 kg','16GB','512GB','i7/Ryzen 7','3-5 jam'], skor: [2,4,3,2,3,2] },
        { nama: 'Hendra Wijaya', usia: 21, status: 'Mahasiswa', bobot: [3,1,3,2,3,2], label: ['>25 juta','2-2.5 kg','32GB','1TB','i9/Ryzen 9','5-7 jam'], skor: [1,3,4,3,4,3] },
        { nama: 'Indah Sari', usia: 22, status: 'Mahasiswa', bobot: [2,2,2,3,2,3], label: ['15-20 juta','2-2.5 kg','8GB','1TB','i5/Ryzen 5','7-9 jam'], skor: [3,3,2,3,2,4] },
        { nama: 'Joko Susilo', usia: 26, status: 'Bekerja', bobot: [1,2,3,3,3,2], label: ['10-15 juta','1.5-2 kg','32GB','1.5TB','i9/Ryzen 9','5-7 jam'], skor: [4,4,4,4,4,3] },
        { nama: 'Kartika Ayu', usia: 19, status: 'Mahasiswa', bobot: [3,2,2,1,3,2], label: ['20-25 juta','2.5-3 kg','16GB','512GB','i7/Ryzen 7','3-5 jam'], skor: [2,2,3,2,3,2] },
        { nama: 'Lukman Hakim', usia: 21, status: 'Mahasiswa', bobot: [2,1,3,2,3,3], label: ['15-20 juta','2-2.5 kg','16GB','1TB','i7/Ryzen 7','7-9 jam'], skor: [3,3,3,3,3,4] },
        { nama: 'Maya Anggraini', usia: 20, status: 'Mahasiswa', bobot: [3,3,1,2,3,1], label: ['>25 juta','1.5-2 kg','8GB','512GB','i5/Ryzen 5','3-5 jam'], skor: [1,4,2,2,2,2] },
        { nama: 'Nur Fadilah', usia: 23, status: 'Mahasiswa', bobot: [2,2,3,3,2,2], label: ['20-25 juta','2-2.5 kg','16GB','1TB','i7/Ryzen 7','5-7 jam'], skor: [2,3,3,3,3,3] },
        { nama: 'Oscar Ramadhan', usia: 25, status: 'Bekerja', bobot: [1,1,3,3,3,3], label: ['10-15 juta','2.5-3 kg','32GB','1.5TB','i9/Ryzen 9','7-9 jam'], skor: [4,2,4,4,4,4] },
        { nama: 'Putri Wulandari', usia: 20, status: 'Mahasiswa', bobot: [3,2,2,2,3,2], label: ['15-20 juta','2-2.5 kg','16GB','512GB','i7/Ryzen 7','5-7 jam'], skor: [3,3,3,2,3,3] },
        { nama: 'Qori Ananda', usia: 21, status: 'Mahasiswa', bobot: [2,3,3,1,2,2], label: ['20-25 juta','1.5-2 kg','8GB','1TB','i5/Ryzen 5','5-7 jam'], skor: [2,4,2,3,2,3] },
        { nama: 'Reza Firmansyah', usia: 22, status: 'Mahasiswa', bobot: [3,1,3,2,3,1], label: ['>25 juta','2.5-3 kg','16GB','1TB','i7/Ryzen 7','3-5 jam'], skor: [1,2,3,3,3,2] },
        { nama: 'Sinta Maharani', usia: 27, status: 'Bekerja', bobot: [1,2,3,3,3,3], label: ['10-15 juta','2-2.5 kg','32GB','1.5TB','i9/Ryzen 9','>9 jam'], skor: [4,3,4,4,4,5] },
        { nama: 'Taufik Hidayat', usia: 20, status: 'Mahasiswa', bobot: [2,2,2,2,3,2], label: ['15-20 juta','2-2.5 kg','16GB','512GB','i7/Ryzen 7','5-7 jam'], skor: [3,3,3,2,3,3] },
        { nama: 'Umar Bakri', usia: 21, status: 'Mahasiswa', bobot: [3,1,3,2,3,2], label: ['20-25 juta','2.5-3 kg','16GB','1TB','i5/Ryzen 5','5-7 jam'], skor: [2,2,3,3,2,3] },
        { nama: 'Vera Oktaviani', usia: 19, status: 'Mahasiswa', bobot: [2,3,2,1,3,2], label: ['15-20 juta','1.5-2 kg','8GB','512GB','i7/Ryzen 7','3-5 jam'], skor: [3,4,2,2,3,2] },
        { nama: 'Wahyu Setiawan', usia: 24, status: 'Bekerja', bobot: [1,1,3,3,3,3], label: ['<10 juta','2-2.5 kg','32GB','2TB','i9/Ryzen 9','>9 jam'], skor: [5,3,4,5,4,5] },
        { nama: 'Xena Permata', usia: 20, status: 'Mahasiswa', bobot: [3,2,2,2,2,2], label: ['20-25 juta','2-2.5 kg','16GB','512GB','i5/Ryzen 5','5-7 jam'], skor: [2,3,3,2,2,3] },
        { nama: 'Yoga Pratama', usia: 29, status: 'Lainnya', bobot: [2,2,3,3,3,2], label: ['15-20 juta','2.5-3 kg','16GB','1TB','i7/Ryzen 7','5-7 jam'], skor: [3,2,3,3,3,3] },
        { nama: 'Zahra Safitri', usia: 18, status: 'Lainnya', bobot: [3,3,1,1,3,1], label: ['>25 juta','1.5-2 kg','8GB','256GB','i5/Ryzen 5','<3 jam'], skor: [1,4,2,1,2,1] },
    ];

    const statusColors = { 'Mahasiswa': 'bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-400', 'Bekerja': 'bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400', 'Lainnya': 'bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400' };
    const bobotColors = { 1: 'bg-red-100 dark:bg-red-900/40 text-red-700 dark:text-red-400', 2: 'bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400', 3: 'bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400' };
    const kriteria = ['Harga', 'Berat', 'RAM', 'Storage', 'Processor', 'Baterai'];

    // ===== RENDER FUNCTIONS =====
    function renderIdentitas(data) {
        const tbody = document.getElementById('tbody-identitas');
        tbody.innerHTML = data.map((r, i) => `
            <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors" data-nama="${r.nama.toLowerCase()}" data-status="${r.status}" data-usia="${r.usia}">
                <td class="px-4 py-3 text-slate-500 dark:text-slate-400 font-medium">${i + 1}</td>
                <td class="px-4 py-3 font-semibold text-slate-800 dark:text-white">${r.nama}</td>
                <td class="px-4 py-3 text-slate-600 dark:text-slate-300">${r.usia}</td>
                <td class="px-4 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold ${statusColors[r.status]}">${r.status}</span></td>
            </tr>
        `).join('');
    }

    function renderBobot(data) {
        const tbody = document.getElementById('tbody-bobot');
        tbody.innerHTML = data.map((r, i) => `
            <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                <td class="px-4 py-3 text-slate-500 dark:text-slate-400 font-medium">${i + 1}</td>
                <td class="px-4 py-3 font-semibold text-slate-800 dark:text-white">${r.nama}</td>
                ${r.bobot.map(b => `<td class="px-4 py-3 text-center"><span class="inline-flex w-8 h-8 items-center justify-center rounded-lg text-xs font-bold ${bobotColors[b]}">${b}</span></td>`).join('')}
            </tr>
        `).join('');
    }

    function renderLabel(data) {
        const tbody = document.getElementById('tbody-label');
        tbody.innerHTML = data.map((r, i) => `
            <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                <td class="px-4 py-3 text-slate-500 dark:text-slate-400 font-medium">${i + 1}</td>
                <td class="px-4 py-3 font-semibold text-slate-800 dark:text-white">${r.nama}</td>
                ${r.label.map(l => `<td class="px-4 py-3 text-xs text-slate-600 dark:text-slate-300">${l}</td>`).join('')}
            </tr>
        `).join('');
    }

    function renderSkor(data) {
        const tbody = document.getElementById('tbody-skor');
        const skorColors = { 1: 'bg-red-100 dark:bg-red-900/40 text-red-700 dark:text-red-400', 2: 'bg-orange-100 dark:bg-orange-900/40 text-orange-700 dark:text-orange-400', 3: 'bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400', 4: 'bg-lime-100 dark:bg-lime-900/40 text-lime-700 dark:text-lime-400', 5: 'bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400' };
        tbody.innerHTML = data.map((r, i) => `
            <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                <td class="px-4 py-3 text-slate-500 dark:text-slate-400 font-medium">${i + 1}</td>
                <td class="px-4 py-3 font-semibold text-slate-800 dark:text-white">${r.nama}</td>
                ${r.skor.map(s => `<td class="px-4 py-3 text-center"><span class="inline-flex w-8 h-8 items-center justify-center rounded-lg text-xs font-bold ${skorColors[s]}">${s}</span></td>`).join('')}
            </tr>
        `).join('');
    }

    // Initial render
    renderIdentitas(responden);
    renderBobot(responden);
    renderLabel(responden);
    renderSkor(responden);

    // ===== FILTER & SEARCH =====
    function filterData() {
        const search = document.getElementById('search-nama').value.toLowerCase();
        const status = document.getElementById('filter-status').value;
        const usia = document.getElementById('filter-usia').value;

        let filtered = responden.filter(r => {
            if (search && !r.nama.toLowerCase().includes(search)) return false;
            if (status && r.status !== status) return false;
            if (usia === '18-21' && (r.usia < 18 || r.usia > 21)) return false;
            if (usia === '22-25' && (r.usia < 22 || r.usia > 25)) return false;
            if (usia === '26+' && r.usia < 26) return false;
            return true;
        });

        renderIdentitas(filtered);
        renderBobot(filtered);
        renderLabel(filtered);
        renderSkor(filtered);
    }

    document.getElementById('search-nama').addEventListener('input', filterData);
    document.getElementById('filter-status').addEventListener('change', filterData);
    document.getElementById('filter-usia').addEventListener('change', filterData);

    // ===== TOGGLE LABEL/SKOR =====
    let showSkor = false;
    document.getElementById('toggle-label-skor').addEventListener('click', function() {
        showSkor = !showSkor;
        const knob = document.getElementById('toggle-knob');
        const labelSection = document.getElementById('section-penilaian-label');
        const skorSection = document.getElementById('section-penilaian-skor');
        const labelText = document.getElementById('label-mode-text');
        const skorText = document.getElementById('skor-mode-text');

        if (showSkor) {
            knob.style.transform = 'translateX(1.25rem)';
            labelSection.classList.add('hidden');
            skorSection.classList.remove('hidden');
            labelText.classList.remove('text-primary-600', 'dark:text-primary-400', 'font-semibold');
            labelText.classList.add('text-slate-400', 'font-medium');
            skorText.classList.remove('text-slate-400', 'font-medium');
            skorText.classList.add('text-emerald-600', 'dark:text-emerald-400', 'font-semibold');
        } else {
            knob.style.transform = 'translateX(0)';
            labelSection.classList.remove('hidden');
            skorSection.classList.add('hidden');
            skorText.classList.remove('text-emerald-600', 'dark:text-emerald-400', 'font-semibold');
            skorText.classList.add('text-slate-400', 'font-medium');
            labelText.classList.remove('text-slate-400', 'font-medium');
            labelText.classList.add('text-primary-600', 'dark:text-primary-400', 'font-semibold');
        }
    });
});
</script>
