<?php
/**
 * ============================================
 * LAYOUT: Sidebar (Global Component)
 * ============================================
 * Sidebar navigasi vertikal kiri.
 * Berisi: menu semua tab dengan ikon, label, dan active state.
 * Di-include di semua halaman setelah header.php
 * 
 * Variable: $activeTab (string)
 * ============================================
 */
$activeTab = $activeTab ?? 'dashboard';

$sidebarItems = [
    ['id' => 'dashboard',  'label' => 'Dashboard',           'route' => '/dashboard',
     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>',
     'desc' => 'Ringkasan & Statistik'],
    ['id' => 'responden', 'label' => 'Data Responden',      'route' => '/responden',
     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>',
     'desc' => 'Identitas & Bobot'],
    ['id' => 'aras',       'label' => 'Hasil ARAS Survei',  'route' => '/aras',
     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z"/>',
     'desc' => '8 Tahap Perhitungan'],
    ['id' => 'eksperimen', 'label' => 'Eksperimen Mandiri', 'route' => '/eksperimen',
     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>',
     'desc' => 'Fitur Unggulan ⭐'],
    ['id' => 'panduan',    'label' => 'Panduan Metode',     'route' => '/panduan',
     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>',
     'desc' => 'Dokumentasi & FAQ'],
];
?>

<!-- ========== SIDEBAR ========== -->
<aside id="sidebar" class="hidden lg:flex flex-col w-64 flex-shrink-0 bg-white dark:bg-surface-900 border-r border-slate-200 dark:border-slate-700/50 transition-all duration-300">
    
    <!-- Sidebar Navigation -->
    <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
        <p class="px-3 mb-4 text-[11px] font-semibold uppercase tracking-widest text-slate-400 dark:text-slate-500">Menu Navigasi</p>
        
        <?php foreach ($sidebarItems as $item): 
            $isActive = ($activeTab === $item['id']);
        ?>
        <a href="<?= base_url($item['route']) ?>" 
           class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                  <?= $isActive 
                      ? 'bg-gradient-to-r from-primary-500 to-violet-600 text-white shadow-lg shadow-primary-500/25' 
                      : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-surface-800 hover:text-slate-900 dark:hover:text-white' ?>">
            <span class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-colors
                         <?= $isActive 
                             ? 'bg-white/20' 
                             : 'bg-slate-100 dark:bg-surface-800 group-hover:bg-primary-50 dark:group-hover:bg-primary-900/30' ?>">
                <svg class="w-5 h-5 <?= $isActive ? '' : 'text-slate-500 dark:text-slate-400 group-hover:text-primary-600 dark:group-hover:text-primary-400' ?>" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <?= $item['icon'] ?>
                </svg>
            </span>
            <div class="flex-1 min-w-0">
                <p class="truncate"><?= $item['label'] ?></p>
                <p class="text-[10px] truncate <?= $isActive ? 'text-white/70' : 'text-slate-400 dark:text-slate-500' ?>"><?= $item['desc'] ?></p>
            </div>
            <?php if ($item['id'] === 'eksperimen'): ?>
            <span class="flex-shrink-0 px-1.5 py-0.5 text-[9px] font-bold rounded-full <?= $isActive ? 'bg-white/20 text-white' : 'bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400' ?>">
                HOT
            </span>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>
    </nav>

    <!-- Sidebar Footer Info -->
    <div class="p-4 mx-3 mb-4 rounded-xl bg-gradient-to-br from-slate-50 to-slate-100 dark:from-surface-800 dark:to-surface-800 border border-slate-200 dark:border-slate-700">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-400 to-violet-500 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342"/>
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-700 dark:text-slate-300">Tugas Kelompok</p>
                <p class="text-[10px] text-slate-500 dark:text-slate-400">Sistem Pendukung Keputusan</p>
            </div>
        </div>
        <div class="flex items-center gap-1.5">
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-400">
                Metode ARAS
            </span>
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400">
                CI4
            </span>
        </div>
    </div>
</aside>

<!-- ========== MAIN CONTENT WRAPPER ========== -->
<main class="flex-1 min-w-0 overflow-x-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
