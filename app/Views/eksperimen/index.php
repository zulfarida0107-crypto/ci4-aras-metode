<!-- ============================================
     Tab 4: Eksperimen Mandiri — HALAMAN PALING PENTING
     Form input bobot kriteria (1–3), toggle Cost/Benefit,
     tambah/hapus alternatif laptop, tombol Hitung ARAS,
     area hasil ranking dengan progress bar Ki & chart.
     ============================================ -->

<!-- ===== PAGE HEADER ===== -->
<section class="mb-6 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center shadow-lg shadow-violet-500/25">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082"/>
                    </svg>
                </span>
                Eksperimen Mandiri
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 max-w-xl">
                Tentukan sendiri bobot dan kriteria Anda, masukkan spesifikasi laptop, dan lihat ranking ARAS!
            </p>
        </div>
        <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-gradient-to-r from-amber-400 to-orange-500 text-white text-sm font-bold shadow-lg shadow-amber-500/25 animate-pulse-slow">
            ⭐ Fitur Unggulan
        </span>
    </div>

    <!-- 3-Step Instruction -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-5">
        <div class="flex items-center gap-3 bg-white dark:bg-surface-800 rounded-xl p-3 border border-slate-200/60 dark:border-slate-700/50">
            <span class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 flex items-center justify-center text-sm font-bold flex-shrink-0">1</span>
            <p class="text-xs text-slate-600 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-white">Atur Bobot</span> — Tentukan prioritas setiap kriteria</p>
        </div>
        <div class="flex items-center gap-3 bg-white dark:bg-surface-800 rounded-xl p-3 border border-slate-200/60 dark:border-slate-700/50">
            <span class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-bold flex-shrink-0">2</span>
            <p class="text-xs text-slate-600 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-white">Tambah Laptop</span> — Masukkan spesifikasi laptop</p>
        </div>
        <div class="flex items-center gap-3 bg-white dark:bg-surface-800 rounded-xl p-3 border border-slate-200/60 dark:border-slate-700/50">
            <span class="w-8 h-8 rounded-full bg-violet-100 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 flex items-center justify-center text-sm font-bold flex-shrink-0">3</span>
            <p class="text-xs text-slate-600 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-white">Hitung ARAS</span> — Lihat ranking dan analisis</p>
        </div>
    </div>
</section>

<!-- ===== STEP 1: BOBOT KRITERIA ===== -->
<section class="mb-6">
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700/50 bg-gradient-to-r from-primary-50 to-violet-50 dark:from-primary-900/10 dark:to-violet-900/10">
            <h3 class="text-base font-bold text-slate-800 dark:text-white flex items-center gap-2">
                ⚙️ Langkah 1: Atur Bobot & Tipe Kriteria
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Geser slider untuk menentukan bobot (1 = kurang penting, 3 = sangat penting)</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="bobot-container">
                <?php
                $kriteria = [
                    ['id' => 'harga',     'label' => 'Harga',     'icon' => '💰', 'default_type' => 'cost',    'default_bobot' => 2],
                    ['id' => 'berat',     'label' => 'Berat',     'icon' => '⚖️', 'default_type' => 'cost',    'default_bobot' => 2],
                    ['id' => 'ram',       'label' => 'RAM',       'icon' => '🧠', 'default_type' => 'benefit', 'default_bobot' => 3],
                    ['id' => 'storage',   'label' => 'Storage',   'icon' => '💾', 'default_type' => 'benefit', 'default_bobot' => 2],
                    ['id' => 'processor', 'label' => 'Processor', 'icon' => '⚡', 'default_type' => 'benefit', 'default_bobot' => 3],
                    ['id' => 'baterai',   'label' => 'Baterai',   'icon' => '🔋', 'default_type' => 'benefit', 'default_bobot' => 2],
                ];
                foreach ($kriteria as $k): ?>
                <div class="bg-slate-50 dark:bg-surface-700/30 rounded-xl p-4 border border-slate-100 dark:border-slate-600/30">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <span class="text-lg"><?= $k['icon'] ?></span>
                            <span class="font-semibold text-sm text-slate-800 dark:text-white"><?= $k['label'] ?></span>
                        </div>
                        <!-- Cost/Benefit Toggle -->
                        <button type="button" 
                                class="tipe-toggle flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all duration-200 cursor-pointer
                                       <?= $k['default_type'] === 'cost' 
                                           ? 'bg-red-100 dark:bg-red-900/40 text-red-600 dark:text-red-400' 
                                           : 'bg-emerald-100 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400' ?>"
                                data-kriteria="<?= $k['id'] ?>"
                                data-tipe="<?= $k['default_type'] ?>"
                                id="tipe_<?= $k['id'] ?>">
                            <span class="tipe-icon"><?= $k['default_type'] === 'cost' ? '↓' : '↑' ?></span>
                            <span class="tipe-text"><?= $k['default_type'] === 'cost' ? 'Cost' : 'Benefit' ?></span>
                        </button>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="range" min="1" max="3" value="<?= $k['default_bobot'] ?>" 
                               class="bobot-slider flex-1 h-2 rounded-full appearance-none cursor-pointer accent-primary-500"
                               id="bobot_<?= $k['id'] ?>" 
                               name="bobot_<?= $k['id'] ?>">
                        <span class="bobot-value w-8 h-8 rounded-lg bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-400 flex items-center justify-center text-sm font-bold"
                              id="val_<?= $k['id'] ?>"><?= $k['default_bobot'] ?></span>
                    </div>
                    <div class="flex justify-between mt-1.5 text-[10px] text-slate-400">
                        <span>Kurang Penting</span>
                        <span>Cukup</span>
                        <span>Sangat Penting</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== STEP 2: INPUT ALTERNATIF LAPTOP ===== -->
<section class="mb-6">
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700/50 bg-gradient-to-r from-emerald-50 to-cyan-50 dark:from-emerald-900/10 dark:to-cyan-900/10">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-white flex items-center gap-2">
                        💻 Langkah 2: Masukkan Alternatif Laptop
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Masukkan nama dan skor setiap kriteria (1 = terburuk, 5 = terbaik)</p>
                </div>
                <span class="text-xs font-semibold text-slate-500 dark:text-slate-400" id="alt-count">2 alternatif</span>
            </div>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-sm" id="tabel-alternatif">
                <thead>
                    <tr class="text-left">
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">No</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider min-w-[180px]">Nama Laptop</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">Harga</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">Berat</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">RAM</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">Storage</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">Processor</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center w-16">Baterai</th>
                        <th class="px-3 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-16">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody-alternatif" class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    <!-- Row 1 (pre-filled) -->
                    <tr class="alt-row hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-3 py-2 text-slate-500 dark:text-slate-400 font-medium alt-no">1</td>
                        <td class="px-3 py-2"><input type="text" value="ASUS ROG Strix G16" class="alt-nama w-full px-3 py-1.5 text-sm rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" placeholder="Nama laptop..."></td>
                        <td class="px-3 py-2"><input type="number" value="2" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="harga"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="berat"></td>
                        <td class="px-3 py-2"><input type="number" value="4" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="ram"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="storage"></td>
                        <td class="px-3 py-2"><input type="number" value="4" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="processor"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="baterai"></td>
                        <td class="px-3 py-2"><button type="button" class="btn-hapus p-1.5 rounded-lg text-red-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-all" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button></td>
                    </tr>
                    <!-- Row 2 (pre-filled) -->
                    <tr class="alt-row hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-3 py-2 text-slate-500 dark:text-slate-400 font-medium alt-no">2</td>
                        <td class="px-3 py-2"><input type="text" value="Lenovo Legion 5 Pro" class="alt-nama w-full px-3 py-1.5 text-sm rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" placeholder="Nama laptop..."></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="harga"></td>
                        <td class="px-3 py-2"><input type="number" value="2" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="berat"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="ram"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="storage"></td>
                        <td class="px-3 py-2"><input type="number" value="4" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="processor"></td>
                        <td class="px-3 py-2"><input type="number" value="3" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="baterai"></td>
                        <td class="px-3 py-2"><button type="button" class="btn-hapus p-1.5 rounded-lg text-red-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-all" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 pb-5">
            <button type="button" id="btn-tambah-laptop" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 rounded-xl text-sm font-semibold hover:bg-emerald-100 dark:hover:bg-emerald-900/40 transition-all border border-emerald-200 dark:border-emerald-800">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                Tambah Laptop
            </button>
        </div>
    </div>
</section>

<!-- ===== ACTION BUTTON: HITUNG ARAS ===== -->
<section class="mb-8">
    <div class="text-center">
        <button type="button" id="btn-hitung-aras"
                class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-primary-600 to-violet-600 text-white rounded-2xl font-bold text-base shadow-2xl shadow-primary-500/30 hover:shadow-primary-500/50 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-primary-500/30">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
            </svg>
            🔄 Hitung ARAS
        </button>
        <p class="text-xs text-slate-400 dark:text-slate-500 mt-2">Klik untuk menjalankan perhitungan Additive Ratio Assessment</p>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="hidden mt-4">
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-primary-50 dark:bg-primary-900/20 rounded-xl">
                <svg class="animate-spin w-5 h-5 text-primary-600" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-sm font-medium text-primary-700 dark:text-primary-400">Menghitung...</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== HASIL / RESULTS SECTION (Hidden by default) ===== -->
<section id="hasil-container" class="hidden">
    <!-- Results Header -->
    <div class="mb-6 flex items-center gap-3">
        <h3 class="text-xl font-extrabold text-slate-800 dark:text-white">📊 Hasil Ranking ARAS</h3>
        <span class="px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-semibold">Selesai</span>
    </div>

    <!-- Ranking Cards -->
    <div id="ranking-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!-- Populated by JavaScript -->
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Horizontal Bar Chart -->
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <h4 class="text-sm font-bold text-slate-800 dark:text-white mb-4">📈 Perbandingan Nilai Ki</h4>
            <div style="height: 300px;"><canvas id="chart-ranking"></canvas></div>
        </div>
        <!-- Radar Chart -->
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <h4 class="text-sm font-bold text-slate-800 dark:text-white mb-4">🕸️ Perbandingan Radar Kriteria</h4>
            <div style="height: 300px;"><canvas id="chart-radar"></canvas></div>
        </div>
    </div>

    <!-- Detail Perhitungan (Collapsible) -->
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden mb-6">
        <button type="button" id="btn-toggle-detail" 
                class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
            <span class="text-sm font-bold text-slate-800 dark:text-white flex items-center gap-2">
                🔍 Lihat Detail Perhitungan
            </span>
            <svg id="detail-chevron" class="w-5 h-5 text-slate-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
        </button>
        <div id="detail-tabel" class="hidden px-6 pb-6">
            <!-- Populated by JavaScript -->
        </div>
    </div>
</section>

<!-- ===== TIPS SECTION ===== -->
<section class="mb-4">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-primary-50 to-violet-50 dark:from-primary-900/10 dark:to-violet-900/10 rounded-xl p-4 border border-primary-100 dark:border-primary-800/30">
            <p class="text-xs font-bold text-primary-700 dark:text-primary-400 mb-1">💡 Bobot 1–3</p>
            <p class="text-[11px] text-slate-600 dark:text-slate-400">1 = Kurang penting, 2 = Cukup penting, 3 = Sangat penting bagi Anda</p>
        </div>
        <div class="bg-gradient-to-br from-emerald-50 to-cyan-50 dark:from-emerald-900/10 dark:to-cyan-900/10 rounded-xl p-4 border border-emerald-100 dark:border-emerald-800/30">
            <p class="text-xs font-bold text-emerald-700 dark:text-emerald-400 mb-1">↕️ Cost vs Benefit</p>
            <p class="text-[11px] text-slate-600 dark:text-slate-400">Cost: semakin rendah semakin baik (harga, berat). Benefit: semakin tinggi semakin baik.</p>
        </div>
        <div class="bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-900/10 dark:to-orange-900/10 rounded-xl p-4 border border-amber-100 dark:border-amber-800/30">
            <p class="text-xs font-bold text-amber-700 dark:text-amber-400 mb-1">📊 Skor 1–5</p>
            <p class="text-[11px] text-slate-600 dark:text-slate-400">Gunakan skala 1 (terburuk) hingga 5 (terbaik) sesuai tabel konversi di Panduan.</p>
        </div>
    </div>
</section>

<!-- Toast Notification Container -->
<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-2"></div>
