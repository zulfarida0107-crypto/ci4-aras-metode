<?php
/**
 * ============================================
 * LAYOUT: Footer (Global Component)
 * ============================================
 * Penutup layout global.
 * Berisi: disclaimer, info proyek, penutup tag HTML.
 * Menutup <main>, flex wrapper, <body>, <html>.
 * Memuat eksperimen.js jika halaman eksperimen.
 * 
 * Variable: $activeTab (string)
 * ============================================
 */
$activeTab = $activeTab ?? 'dashboard';
?>

    </div><!-- /.max-w-7xl (content container dari sidebar.php) -->
</main><!-- /main content wrapper dari sidebar.php -->
</div><!-- /#app-wrapper flex container dari header.php -->

<!-- ========== FOOTER ========== -->
<footer class="border-t border-slate-200 dark:border-slate-700/50 bg-white dark:bg-surface-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 dark:text-slate-400">
            <!-- Kiri: Info Proyek -->
            <div class="flex items-center gap-2">
                <div class="w-5 h-5 rounded-md bg-gradient-to-br from-primary-500 to-violet-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>
                    </svg>
                </div>
                <span>SPK ARAS Laptop Gaming &copy; <?= date('Y') ?> &mdash; Tugas Kelompok Sistem Pendukung Keputusan</span>
            </div>

            <!-- Kanan: Stack Teknologi -->
            <div class="flex items-center gap-3">
                <span class="hidden sm:inline text-slate-400 dark:text-slate-500">Dibangun dengan</span>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400">
                        Metode ARAS
                    </span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400">
                        CodeIgniter 4
                    </span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-cyan-100 dark:bg-cyan-900/30 text-cyan-700 dark:text-cyan-400">
                        Tailwind CSS
                    </span>
                </div>
            </div>
        </div>

        <!-- Disclaimer -->
        <div class="mt-3 pt-3 border-t border-slate-100 dark:border-slate-800 text-center">
            <p class="text-[10px] text-slate-400 dark:text-slate-500">
                Disclaimer: Sistem ini dibuat untuk keperluan akademis. Hasil perhitungan bersifat referensi dan tidak menjamin keputusan pembelian.
            </p>
        </div>
    </div>
</footer>

<!-- ========== CONDITIONAL SCRIPTS ========== -->
<?php if ($activeTab === 'eksperimen'): ?>
<script src="<?= base_url('assets/js/eksperimen.js') ?>"></script>
<?php endif; ?>

</body>
</html>
