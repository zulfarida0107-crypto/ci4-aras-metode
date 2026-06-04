<!-- Global Sidebar (240px, fixed) -->
<aside class="fixed left-0 top-[68px] bottom-0 w-[240px] bg-white border-r border-outline-variant hidden lg:flex flex-col py-6 z-40">
<div class="px-6 mb-8"><div class="flex items-center gap-3">
    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-white">
        <span class="material-symbols-outlined text-xl">query_stats</span>
    </div>
    <h2 class="text-sm font-bold text-on-surface">SPK Laptop Gaming</h2>
</div></div>
<nav class="flex-grow">
<a class="flex items-center gap-3 px-6 py-3 text-sm <?= (isset($activeTab) && $activeTab == 'dashboard') ? 'font-semibold sidebar-active' : 'font-medium text-on-surface-variant hover:bg-surface-container-low transition-colors' ?>" href="<?= base_url('dashboard') ?>">
    <span class="material-symbols-outlined text-lg">grid_view</span> Dashboard
</a>
<a class="flex items-center gap-3 px-6 py-3 text-sm <?= (isset($activeTab) && $activeTab == 'responden') ? 'font-semibold sidebar-active' : 'font-medium text-on-surface-variant hover:bg-surface-container-low transition-colors' ?>" href="<?= base_url('responden') ?>">
    <span class="material-symbols-outlined text-lg">person_search</span> Data Responden
</a>
<a class="flex items-center gap-3 px-6 py-3 text-sm <?= (isset($activeTab) && $activeTab == 'aras') ? 'font-semibold sidebar-active' : 'font-medium text-on-surface-variant hover:bg-surface-container-low transition-colors' ?>" href="<?= base_url('aras') ?>">
    <span class="material-symbols-outlined text-lg">analytics</span> Hasil ARAS Survei
</a>
<a class="flex items-center gap-3 px-6 py-3 text-sm <?= (isset($activeTab) && $activeTab == 'eksperimen') ? 'font-semibold sidebar-active' : 'font-medium text-on-surface-variant hover:bg-surface-container-low transition-colors' ?>" href="<?= base_url('eksperimen') ?>">
    <span class="material-symbols-outlined text-lg">science</span> Eksperimen Mandiri
</a>
<a class="flex items-center gap-3 px-6 py-3 text-sm <?= (isset($activeTab) && $activeTab == 'panduan') ? 'font-semibold sidebar-active' : 'font-medium text-on-surface-variant hover:bg-surface-container-low transition-colors' ?>" href="<?= base_url('panduan') ?>">
    <span class="material-symbols-outlined text-lg">menu_book</span> Panduan Metode
</a>
</nav>
</aside>
