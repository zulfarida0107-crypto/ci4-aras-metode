<!-- Mobile Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 bg-on-background/50 z-30 hidden lg:hidden transition-opacity opacity-0"></div>

<!-- SideNavBar / Table of Contents -->
<aside id="main-sidebar" class="fixed left-0 top-16 h-[calc(100vh-64px)] w-[240px] bg-white border-r border-outline-variant p-stack-md gap-stack-sm overflow-y-auto z-40 transform -translate-x-full lg:translate-x-0 flex flex-col transition-transform duration-300 ease-in-out">
<div class="px-4 py-4 mb-2 flex items-center gap-2 border-b border-outline-variant/30">
<div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-white text-xl">laptop_mac</span>
</div>
<span class="font-bold text-on-surface text-sm">SPK Laptop Gaming</span>
</div>
<nav class="flex flex-col gap-1">
<a class="px-4 py-3 flex items-center gap-3 rounded-lg <?= (isset($activeTab) && $activeTab == 'dashboard') ? 'bg-primary/10 text-primary border border-primary/20 font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' ?> transition-all duration-200" href="<?= base_url('dashboard') ?>">
<span class="material-symbols-outlined text-[20px]">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="px-4 py-3 flex items-center gap-3 rounded-lg <?= (isset($activeTab) && $activeTab == 'responden') ? 'bg-primary/10 text-primary border border-primary/20 font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' ?> transition-all duration-200" href="<?= base_url('responden') ?>">
<span class="material-symbols-outlined text-[20px]">groups</span>
<span class="font-label-md text-label-md">Data Responden</span>
</a>
<a class="px-4 py-3 flex items-center gap-3 rounded-lg <?= (isset($activeTab) && $activeTab == 'aras') ? 'bg-primary/10 text-primary border border-primary/20 font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' ?> transition-all duration-200" href="<?= base_url('aras') ?>">
<span class="material-symbols-outlined text-[20px]">bar_chart</span>
<span class="font-label-md text-label-md">Hasil ARAS Survei</span>
</a>
<a class="px-4 py-3 flex items-center gap-3 rounded-lg <?= (isset($activeTab) && $activeTab == 'eksperimen') ? 'bg-primary/10 text-primary border border-primary/20 font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' ?> transition-all duration-200" href="<?= base_url('eksperimen') ?>">
<span class="material-symbols-outlined text-[20px]">science</span>
<span class="font-label-md text-label-md">Eksperimen Mandiri</span>
</a>
<a class="px-4 py-3 flex items-center gap-3 rounded-lg <?= (isset($activeTab) && $activeTab == 'panduan') ? 'bg-primary/10 text-primary border border-primary/20 font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' ?> transition-all duration-200" href="<?= base_url('panduan') ?>">
<span class="material-symbols-outlined text-[20px]">menu_book</span>
<span class="font-label-md text-label-md">Panduan Metode</span>
</a>
</nav>


</aside>
