<?php
/**
 * ============================================
 * LAYOUT: Header (Global Component)
 * ============================================
 * File ini di-include di SEMUA halaman.
 * Berisi: DOCTYPE, <head>, meta tags, CDN links,
 * navbar atas (logo, navigasi tab, toggle dark/light mode).
 * 
 * Variable yang dibutuhkan:
 *   $activeTab — string nama tab aktif (dashboard|responden|aras|eksperimen|panduan)
 *   $pageTitle — judul halaman (opsional)
 * ============================================
 */
$activeTab = $activeTab ?? 'dashboard';
$pageTitle = $pageTitle ?? 'SPK ARAS Laptop Gaming';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Pendukung Keputusan Pemilihan Laptop Gaming menggunakan Metode ARAS (Additive Ratio Assessment)">
    <meta name="author" content="Kelompok SPK">
    <title><?= esc($pageTitle) ?> — SPK ARAS</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50:  '#eef2ff', 100: '#e0e7ff', 200: '#c7d2fe',
                            300: '#a5b4fc', 400: '#818cf8', 500: '#6366f1',
                            600: '#4f46e5', 700: '#4338ca', 800: '#3730a3', 900: '#312e81',
                        },
                        accent: {
                            400: '#22d3ee', 500: '#06b6d4', 600: '#0891b2',
                        },
                        surface: {
                            50:  '#f8fafc', 100: '#f1f5f9', 200: '#e2e8f0',
                            700: '#334155', 800: '#1e293b', 900: '#0f172a', 950: '#020617',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    }
                }
            }
        }
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Dark Mode Init (prevent flash) -->
    <script>
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="font-sans bg-surface-50 dark:bg-surface-950 text-slate-800 dark:text-slate-200 transition-colors duration-300 min-h-screen">

    <!-- ========== TOP NAVBAR ========== -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-white/70 dark:bg-surface-900/70 border-b border-slate-200/50 dark:border-slate-700/50 shadow-sm">
        <div class="max-w-[1920px] mx-auto px-4 lg:px-6">
            <div class="flex items-center justify-between h-16">

                <!-- Logo & App Name -->
                <a href="<?= base_url('/dashboard') ?>" class="flex items-center gap-3 group flex-shrink-0">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-500 to-violet-600 flex items-center justify-center shadow-lg shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-shadow">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>
                        </svg>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg font-bold bg-gradient-to-r from-primary-600 to-violet-600 dark:from-primary-400 dark:to-violet-400 bg-clip-text text-transparent">
                            SPK ARAS
                        </h1>
                        <p class="text-[10px] font-medium text-slate-500 dark:text-slate-400 -mt-0.5 tracking-wide">LAPTOP GAMING</p>
                    </div>
                </a>

                <!-- Desktop Navigation Tabs -->
                <nav class="hidden lg:flex items-center gap-1 bg-slate-100/80 dark:bg-surface-800/80 rounded-xl p-1">
                    <?php
                    $tabs = [
                        ['id' => 'dashboard',  'label' => 'Dashboard',        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>'],
                        ['id' => 'responden', 'label' => 'Data Responden',   'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>'],
                        ['id' => 'aras',       'label' => 'Hasil ARAS',       'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z"/>'],
                        ['id' => 'eksperimen', 'label' => 'Eksperimen',       'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>'],
                        ['id' => 'panduan',    'label' => 'Panduan',          'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>'],
                    ];
                    foreach ($tabs as $tab): 
                        $isActive = ($activeTab === $tab['id']);
                    ?>
                    <a href="<?= base_url('/' . $tab['id']) ?>" 
                       class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                              <?= $isActive 
                                  ? 'bg-white dark:bg-surface-700 text-primary-600 dark:text-primary-400 shadow-sm' 
                                  : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-surface-700/50' ?>">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><?= $tab['icon'] ?></svg>
                        <span><?= $tab['label'] ?></span>
                    </a>
                    <?php endforeach; ?>
                </nav>

                <!-- Right Side: Dark Mode Toggle + Mobile Menu -->
                <div class="flex items-center gap-3">
                    <!-- Dark Mode Toggle -->
                    <button id="btn-dark-toggle" type="button" 
                            class="relative w-14 h-7 rounded-full bg-slate-200 dark:bg-surface-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-primary-500/50"
                            aria-label="Toggle dark mode">
                        <span class="absolute left-1 top-1 w-5 h-5 rounded-full bg-white shadow-md transform transition-transform duration-300 dark:translate-x-7 flex items-center justify-center">
                            <!-- Sun icon (light mode) -->
                            <svg class="w-3 h-3 text-amber-500 dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                            <!-- Moon icon (dark mode) -->
                            <svg class="w-3 h-3 text-primary-400 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                        </span>
                    </button>

                    <!-- Mobile Hamburger -->
                    <button id="btn-mobile-menu" type="button" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-surface-800 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-nav" class="lg:hidden hidden border-t border-slate-200 dark:border-slate-700 bg-white/95 dark:bg-surface-900/95 backdrop-blur-xl">
            <nav class="px-4 py-3 space-y-1">
                <?php foreach ($tabs as $tab): 
                    $isActive = ($activeTab === $tab['id']);
                ?>
                <a href="<?= base_url('/' . $tab['id']) ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                          <?= $isActive 
                              ? 'bg-primary-50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400' 
                              : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-surface-800' ?>">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><?= $tab['icon'] ?></svg>
                    <?= $tab['label'] ?>
                </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </header>

    <!-- ========== MAIN LAYOUT WRAPPER ========== -->
    <div class="flex min-h-[calc(100vh-4rem)]" id="app-wrapper">

    <!-- Dark Mode Toggle Script -->
    <script>
        const btnDarkToggle = document.getElementById('btn-dark-toggle');
        btnDarkToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });

        // Mobile menu toggle
        const btnMobileMenu = document.getElementById('btn-mobile-menu');
        const mobileNav = document.getElementById('mobile-nav');
        btnMobileMenu.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    </script>
