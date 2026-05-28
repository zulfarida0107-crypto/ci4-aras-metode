<!-- ============================================
     Tab 3: Hasil ARAS Survei
     Menampilkan hasil perhitungan ARAS statis
     berdasarkan data kuesioner.
     ============================================ -->

<section class="mb-6 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center shadow-lg shadow-indigo-500/25">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"/>
                    </svg>
                </span>
                Hasil ARAS Survei (Fix Data)
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 max-w-xl">
                Hasil perhitungan ranking laptop berdasarkan kuesioner dari 26 responden. Data ini bersifat statis (Mode Survei).
            </p>
        </div>
        <a href="<?= base_url('eksperimen') ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 dark:bg-surface-700 text-slate-700 dark:text-slate-300 text-sm font-bold shadow-sm hover:bg-slate-200 dark:hover:bg-surface-600 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Coba Eksperimen
        </a>
    </div>
</section>

<!-- Tabel Hasil Final -->
<section class="animate-slide-up" style="animation-delay: 100ms">
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700/50 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/10 dark:to-indigo-900/10">
            <h3 class="text-base font-bold text-slate-800 dark:text-white flex items-center gap-2">
                🏆 Ranking Final Laptop Gaming
            </h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 dark:bg-surface-700/50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-300 w-20 text-center">Rank</th>
                        <th class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-300">Alternatif Laptop</th>
                        <th class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-300 text-center">Nilai Utility (Ki)</th>
                        <th class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-300 w-1/3">Persentase vs Ideal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    <!-- Rank 1 -->
                    <tr class="bg-amber-50/50 dark:bg-amber-900/10 hover:bg-amber-50 dark:hover:bg-amber-900/20 transition-colors">
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-amber-400 to-yellow-500 text-white font-bold shadow-sm">1</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">ASUS ROG Strix G16</td>
                        <td class="px-6 py-4 text-center font-mono font-bold text-amber-600 dark:text-amber-400 text-lg">0.8942</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-full bg-slate-200 dark:bg-surface-700 rounded-full h-2">
                                    <div class="h-2 rounded-full bg-gradient-to-r from-amber-400 to-yellow-500" style="width: 89.42%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-400 w-10">89%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Rank 2 -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-slate-300 to-slate-400 text-white font-bold shadow-sm">2</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Lenovo Legion 5 Pro</td>
                        <td class="px-6 py-4 text-center font-mono font-bold text-primary-600 dark:text-primary-400 text-lg">0.8510</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-full bg-slate-200 dark:bg-surface-700 rounded-full h-2">
                                    <div class="h-2 rounded-full bg-gradient-to-r from-slate-400 to-slate-500" style="width: 85.10%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-400 w-10">85%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Rank 3 -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-amber-600 text-white font-bold shadow-sm">3</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Acer Nitro V 15</td>
                        <td class="px-6 py-4 text-center font-mono font-bold text-primary-600 dark:text-primary-400 text-lg">0.7834</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-full bg-slate-200 dark:bg-surface-700 rounded-full h-2">
                                    <div class="h-2 rounded-full bg-gradient-to-r from-orange-400 to-amber-600" style="width: 78.34%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-400 w-10">78%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Rank 4 -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-6 py-4 text-center text-slate-500 font-bold">4</td>
                        <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">HP Victus 15</td>
                        <td class="px-6 py-4 text-center font-mono text-slate-600 dark:text-slate-400">0.7102</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-full bg-slate-200 dark:bg-surface-700 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full bg-slate-400 dark:bg-slate-500" style="width: 71.02%"></div>
                                </div>
                                <span class="text-xs text-slate-500 w-10">71%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Rank 5 -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors">
                        <td class="px-6 py-4 text-center text-slate-500 font-bold">5</td>
                        <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">MSI Cyborg 15</td>
                        <td class="px-6 py-4 text-center font-mono text-slate-600 dark:text-slate-400">0.6550</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-full bg-slate-200 dark:bg-surface-700 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full bg-slate-400 dark:bg-slate-500" style="width: 65.50%"></div>
                                </div>
                                <span class="text-xs text-slate-500 w-10">65%</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Info Card -->
<section class="mt-6">
    <div class="bg-blue-50 dark:bg-blue-900/10 rounded-xl p-5 border border-blue-100 dark:border-blue-800/30 flex items-start gap-3">
        <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <h4 class="font-bold text-blue-800 dark:text-blue-300 text-sm">Informasi Data</h4>
            <p class="text-sm text-blue-700/80 dark:text-blue-400/80 mt-1">Data di atas merupakan perhitungan ARAS (Additive Ratio Assessment) secara final berdasarkan penggabungan matriks bobot kriteria dan matriks penilaian dari 26 kuesioner. Jika Anda ingin menyimulasikan bobot sesuai keinginan Anda sendiri, silakan gunakan fitur Eksperimen Mandiri.</p>
        </div>
    </div>
</section>
