<!-- ============================================
     Tab 1: Dashboard
     Ringkasan sistem, statistik 26 responden,
     Top 3 laptop terbaik dari survei, chart visualisasi,
     dan CTA menuju Eksperimen Mandiri.
     ============================================ -->

<!-- ===== HERO WELCOME SECTION ===== -->
<section class="animate-fade-in mb-8">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary-600 via-violet-600 to-purple-700 p-8 lg:p-10 text-white shadow-2xl shadow-primary-500/20">
        <!-- Decorative shapes -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/4 blur-2xl"></div>
        <div class="absolute top-1/2 right-1/4 w-32 h-32 bg-cyan-400/10 rounded-full blur-xl"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-2 mb-3">
                <span class="px-3 py-1 rounded-full bg-white/15 text-xs font-semibold backdrop-blur-sm">
                    🎮 Sistem Pendukung Keputusan
                </span>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold mb-3 leading-tight">
                Selamat Datang di <br class="hidden sm:block"><span class="text-cyan-300">SPK ARAS</span> Laptop Gaming
            </h2>
            <p class="text-white/80 max-w-2xl text-sm lg:text-base leading-relaxed">
                Sistem Pendukung Keputusan Pemilihan Laptop Gaming menggunakan Metode 
                <span class="font-semibold text-white">Additive Ratio Assessment (ARAS)</span>. 
                Analisis berdasarkan data <span class="font-semibold text-cyan-300">26 responden</span> 
                atau buat eksperimen Anda sendiri.
            </p>
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="<?= base_url('/eksperimen') ?>" 
                   class="inline-flex items-center gap-2 px-6 py-2.5 bg-white text-primary-700 rounded-xl font-semibold text-sm hover:bg-cyan-50 transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082"/>
                    </svg>
                    Coba Eksperimen Mandiri
                </a>
                <a href="<?= base_url('/panduan') ?>" 
                   class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/15 text-white rounded-xl font-medium text-sm hover:bg-white/25 transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                    Pelajari Metode ARAS
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== STATISTICS CARDS ===== -->
<section class="animate-slide-up mb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php
        $stats = [
            ['value' => '26', 'label' => 'Total Responden', 'color' => 'from-blue-500 to-blue-600', 'shadow' => 'shadow-blue-500/20',
             'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>'],
            ['value' => '6', 'label' => 'Jumlah Kriteria', 'color' => 'from-emerald-500 to-emerald-600', 'shadow' => 'shadow-emerald-500/20',
             'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>'],
            ['value' => '5', 'label' => 'Alternatif Laptop', 'color' => 'from-violet-500 to-violet-600', 'shadow' => 'shadow-violet-500/20',
             'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>'],
            ['value' => 'ARAS', 'label' => 'Metode SPK', 'color' => 'from-amber-500 to-orange-500', 'shadow' => 'shadow-amber-500/20',
             'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z"/>'],
        ];
        foreach ($stats as $i => $stat): ?>
        <div class="group bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm hover:shadow-lg <?= $stat['shadow'] ?> transition-all duration-300 hover:-translate-y-1" style="animation-delay: <?= $i * 100 ?>ms">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br <?= $stat['color'] ?> flex items-center justify-center shadow-lg <?= $stat['shadow'] ?>">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><?= $stat['icon'] ?></svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-slate-800 dark:text-white"><?= $stat['value'] ?></p>
                    <p class="text-xs font-medium text-slate-500 dark:text-slate-400"><?= $stat['label'] ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== TOP 3 LAPTOP TERBAIK ===== -->
<section class="mb-8">
    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
        🏆 Top 3 Laptop Gaming Terbaik
        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400">Hasil Survei</span>
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <?php
        $topLaptops = [
            ['rank' => 1, 'name' => 'ASUS ROG Strix G16', 'ki' => 0.9247, 'medal' => '🥇', 'color' => 'from-amber-400 to-yellow-500', 'border' => 'border-amber-300 dark:border-amber-600', 'shadow' => 'shadow-amber-500/20',
             'specs' => ['i7-13650HX', 'RTX 4060', '16GB DDR5', '512GB SSD']],
            ['rank' => 2, 'name' => 'Lenovo Legion 5 Pro', 'ki' => 0.8731, 'medal' => '🥈', 'color' => 'from-slate-300 to-slate-400', 'border' => 'border-slate-300 dark:border-slate-500', 'shadow' => 'shadow-slate-400/20',
             'specs' => ['Ryzen 7 7745HX', 'RTX 4070', '16GB DDR5', '1TB SSD']],
            ['rank' => 3, 'name' => 'Acer Nitro V 15', 'ki' => 0.8214, 'medal' => '🥉', 'color' => 'from-orange-400 to-amber-600', 'border' => 'border-orange-300 dark:border-orange-600', 'shadow' => 'shadow-orange-400/20',
             'specs' => ['i5-13420H', 'RTX 4050', '16GB DDR5', '512GB SSD']],
        ];
        foreach ($topLaptops as $laptop): ?>
        <div class="group relative bg-white dark:bg-surface-800 rounded-2xl border-2 <?= $laptop['border'] ?> p-6 shadow-sm hover:shadow-xl <?= $laptop['shadow'] ?> transition-all duration-300 hover:-translate-y-1 <?= $laptop['rank'] === 1 ? 'md:-translate-y-2 md:scale-105 md:z-10' : '' ?>">
            <!-- Rank Badge -->
            <div class="absolute -top-3 -left-2 flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-to-r <?= $laptop['color'] ?> text-white text-xs font-bold shadow-lg">
                <span class="text-base"><?= $laptop['medal'] ?></span>
                Peringkat #<?= $laptop['rank'] ?>
            </div>

            <!-- Laptop Icon -->
            <div class="flex justify-center mt-3 mb-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 dark:from-surface-700 dark:to-surface-600 flex items-center justify-center">
                    <svg class="w-8 h-8 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>
                    </svg>
                </div>
            </div>

            <!-- Laptop Name -->
            <h4 class="text-center text-lg font-bold text-slate-800 dark:text-white mb-2"><?= $laptop['name'] ?></h4>

            <!-- Ki Score -->
            <div class="text-center mb-3">
                <span class="text-3xl font-extrabold bg-gradient-to-r <?= $laptop['color'] ?> bg-clip-text text-transparent">
                    <?= number_format($laptop['ki'], 4) ?>
                </span>
                <p class="text-[10px] font-medium text-slate-500 dark:text-slate-400 mt-1">Nilai Ki (Utility)</p>
            </div>

            <!-- Progress Bar -->
            <div class="w-full bg-slate-100 dark:bg-surface-700 rounded-full h-2.5 mb-4">
                <div class="h-2.5 rounded-full bg-gradient-to-r <?= $laptop['color'] ?> transition-all duration-1000" style="width: <?= $laptop['ki'] * 100 ?>%"></div>
            </div>

            <!-- Specs Badges -->
            <div class="flex flex-wrap justify-center gap-1.5">
                <?php foreach ($laptop['specs'] as $spec): ?>
                <span class="px-2 py-0.5 text-[10px] font-medium rounded-full bg-slate-100 dark:bg-surface-700 text-slate-600 dark:text-slate-400"><?= $spec ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== CHARTS SECTION ===== -->
<section class="mb-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chart: Distribusi Status Responden -->
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <h4 class="text-base font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"/>
                    </svg>
                </span>
                Distribusi Status Responden
            </h4>
            <div class="relative" style="height: 280px;">
                <canvas id="chartStatusResponden"></canvas>
            </div>
        </div>

        <!-- Chart: Rata-rata Bobot Kriteria -->
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <h4 class="text-base font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-violet-100 dark:bg-violet-900/30 flex items-center justify-center">
                    <svg class="w-4 h-4 text-violet-600 dark:text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                    </svg>
                </span>
                Rata-rata Bobot Kriteria
            </h4>
            <div class="relative" style="height: 280px;">
                <canvas id="chartBobotKriteria"></canvas>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA: EKSPERIMEN MANDIRI ===== -->
<section class="mb-8">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-600 via-violet-600 to-purple-600 p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
            <div class="flex-1">
                <h3 class="text-2xl font-extrabold mb-2">🧪 Coba Eksperimen Mandiri</h3>
                <p class="text-white/80 text-sm max-w-xl">
                    Tentukan sendiri bobot dan kriteria Anda, masukkan spesifikasi laptop, lalu lihat laptop gaming mana yang paling sesuai dengan kebutuhan Anda!
                </p>
            </div>
            <a href="<?= base_url('/eksperimen') ?>" 
               class="flex-shrink-0 inline-flex items-center gap-2 px-8 py-3.5 bg-white text-primary-700 rounded-xl font-bold text-sm hover:bg-cyan-50 transition-all duration-200 shadow-xl hover:shadow-2xl hover:scale-105">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
                Mulai Eksperimen
            </a>
        </div>
    </div>
</section>

<!-- ===== QUICK INFO CARDS ===== -->
<section class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-800 dark:text-white text-sm mb-1.5">6 Kriteria Penilaian</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Harga, Berat, RAM, Storage, Processor, dan Baterai — masing-masing dengan tipe Cost atau Benefit.</p>
        </div>

        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-800 dark:text-white text-sm mb-1.5">2 Mode Perhitungan</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Mode Survei menggunakan data 26 responden, Mode Eksperimen memberi kebebasan penuh kepada pengguna.</p>
        </div>

        <div class="bg-white dark:bg-surface-800 rounded-2xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-violet-100 dark:bg-violet-900/30 flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-violet-600 dark:text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-800 dark:text-white text-sm mb-1.5">8 Tahap ARAS</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Dari pembentukan matriks keputusan, normalisasi, pembobotan, hingga penentuan ranking akhir.</p>
        </div>
    </div>
</section>

<!-- ===== CHART.JS SCRIPTS ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Deteksi dark mode untuk warna teks
    const isDark = document.documentElement.classList.contains('dark');
    const textColor = isDark ? '#94a3b8' : '#64748b';
    const gridColor = isDark ? 'rgba(148,163,184,0.1)' : 'rgba(0,0,0,0.06)';

    // Chart 1: Distribusi Status Responden (Doughnut)
    const ctxStatus = document.getElementById('chartStatusResponden');
    if (ctxStatus) {
        new Chart(ctxStatus, {
            type: 'doughnut',
            data: {
                labels: ['Mahasiswa', 'Bekerja', 'Lainnya'],
                datasets: [{
                    data: [18, 6, 2],
                    backgroundColor: [
                        'rgba(99, 102, 241, 0.85)',
                        'rgba(16, 185, 129, 0.85)',
                        'rgba(245, 158, 11, 0.85)'
                    ],
                    borderColor: isDark ? '#1e293b' : '#ffffff',
                    borderWidth: 3,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: textColor, padding: 16, usePointStyle: true, pointStyleWidth: 10, font: { size: 12, family: 'Inter' } }
                    }
                }
            }
        });
    }

    // Chart 2: Rata-rata Bobot Kriteria (Bar)
    const ctxBobot = document.getElementById('chartBobotKriteria');
    if (ctxBobot) {
        new Chart(ctxBobot, {
            type: 'bar',
            data: {
                labels: ['Harga', 'Berat', 'RAM', 'Storage', 'Processor', 'Baterai'],
                datasets: [{
                    label: 'Rata-rata Bobot',
                    data: [2.35, 1.88, 2.62, 2.27, 2.73, 2.04],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(6, 182, 212, 0.8)',
                        'rgba(99, 102, 241, 0.8)',
                        'rgba(168, 85, 247, 0.8)'
                    ],
                    borderRadius: 8,
                    borderSkipped: false,
                    barPercentage: 0.6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 3,
                        ticks: { color: textColor, stepSize: 1, font: { size: 11, family: 'Inter' } },
                        grid: { color: gridColor }
                    },
                    x: {
                        ticks: { color: textColor, font: { size: 11, family: 'Inter' } },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
});
</script>
