<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= isset($pageTitle) ? $pageTitle : 'SPK ARAS Laptop Gaming' ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#004ac6",
                        "on-primary": "#ffffff",
                        "primary-container": "#2563eb",
                        "on-primary-container": "#eeefff",
                        "secondary": "#505f76",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#d0e1fb",
                        "on-secondary-container": "#54647a",
                        "tertiary": "#943700",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#bc4800",
                        "on-tertiary-container": "#ffede6",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-error-container": "#93000a",
                        "background": "#faf8ff",
                        "on-background": "#191b23",
                        "surface": "#faf8ff",
                        "on-surface": "#191b23",
                        "surface-variant": "#e1e2ed",
                        "on-surface-variant": "#434655",
                        "outline": "#737686",
                        "outline-variant": "#c3c6d7",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f3f3fe",
                        "surface-container": "#ededf9",
                        "surface-container-high": "#e7e7f3",
                        "surface-container-highest": "#e1e2ed",
                        "benefit": "#10B981",
                        "cost": "#F59E0B"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    fontFamily: {
                        "sans": ["Inter", "sans-serif"],
                        "mono-data": ["JetBrains Mono", "monospace"]
                    },
                    spacing: {
                        'header-h': '68px',
                        'footer-h': '52px',
                        'sidebar-w': '240px'
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .ki-progress-gradient {
            background: linear-gradient(90deg, #3B82F6 0%, #10B981 100%);
        }
        body {
            background-color: #faf8ff;
            color: #191b23;
        }
        .sidebar-active {
            background-color: #d0e1fb;
            color: #004ac6;
            border-right: 4px solid #004ac6;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Global Header -->
    <?= $this->include('layout/header') ?>

    <!-- Global Sidebar -->
    <?= $this->include('layout/sidebar') ?>

    <!-- Main Content Area -->
    <div class="flex-grow pt-[68px] pb-[52px] lg:ml-[240px] flex flex-col min-h-screen">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Global Footer -->
    <?= $this->include('layout/footer') ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar Mobile Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const sidebar = document.getElementById('main-sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (mobileMenuBtn && sidebar && overlay) {
                function toggleSidebar() {
                    const isClosed = sidebar.classList.contains('-translate-x-full');
                    if (isClosed) {
                        sidebar.classList.remove('-translate-x-full');
                        overlay.classList.remove('hidden');
                        // Small delay for transition
                        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
                    } else {
                        sidebar.classList.add('-translate-x-full');
                        overlay.classList.add('opacity-0');
                        setTimeout(() => overlay.classList.add('hidden'), 300);
                    }
                }

                mobileMenuBtn.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);
            }

            const bars = document.querySelectorAll('.ki-progress-gradient, .bg-benefit, .bg-cost, .bg-outline, .bg-outline-variant');
            bars.forEach(bar => {
                const finalWidth = bar.style.width;
                if (finalWidth) {
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.transition = 'width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1)';
                        bar.style.width = finalWidth;
                    }, 300);
                }
            });
        });
    </script>
</body>
</html>
