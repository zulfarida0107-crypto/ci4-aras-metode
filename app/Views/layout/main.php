<!DOCTYPE html><html class="light" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?= esc($pageTitle ?? 'LaptopARAS') ?></title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .stepper-line {
            background: repeating-linear-gradient(to bottom, #cbd5e1 0px, #cbd5e1 4px, transparent 4px, transparent 8px);
        }
        
        html {
            scroll-behavior: smooth;
        }

        .active-nav {
            background-color: #d0e1fb !important;
            color: #004ac6 !important;
        }
        
        .active-nav span {
            color: #004ac6 !important;
        }

        /* Added for dashboard progress bars */
        .ki-progress-gradient {
            background: linear-gradient(90deg, #3B82F6 0%, #10B981 100%);
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#54647a",
                        "on-error": "#ffffff",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-background": "#191b23",
                        "on-secondary": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-dim": "#d9d9e5",
                        "on-tertiary-container": "#ffede6",
                        "on-tertiary": "#ffffff",
                        "outline": "#737686",
                        "on-tertiary-fixed-variant": "#7d2d00",
                        "tertiary-container": "#bc4800",
                        "tertiary-fixed": "#ffdbcd",
                        "secondary-fixed": "#d3e4fe",
                        "secondary-container": "#d0e1fb",
                        "surface-container-low": "#f3f3fe",
                        "on-primary-fixed-variant": "#003ea8",
                        "secondary": "#505f76",
                        "error-container": "#ffdad6",
                        "primary": "#004ac6",
                        "on-primary-fixed": "#00174b",
                        "surface-container": "#ededf9",
                        "tertiary": "#943700",
                        "surface-container-highest": "#e1e2ed",
                        "tertiary-fixed-dim": "#ffb596",
                        "surface-container-high": "#e7e7f3",
                        "inverse-primary": "#b4c5ff",
                        "on-secondary-fixed": "#0b1c30",
                        "surface-variant": "#e1e2ed",
                        "on-surface": "#191b23",
                        "surface-bright": "#faf8ff",
                        "on-primary-container": "#eeefff",
                        "on-primary": "#ffffff",
                        "background": "#faf8ff",
                        "outline-variant": "#c3c6d7",
                        "on-secondary-fixed-variant": "#38485d",
                        "secondary-fixed-dim": "#b7c8e1",
                        "error": "#ba1a1a",
                        "inverse-surface": "#2e3039",
                        "surface": "#faf8ff",
                        "on-tertiary-fixed": "#360f00",
                        "primary-container": "#2563eb",
                        "inverse-on-surface": "#f0f0fb",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#dbe1ff",
                        "on-surface-variant": "#434655",
                        "surface-tint": "#0053db",
                        "benefit": "#10B981",
                        "cost": "#F59E0B"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-sm": "8px",
                        "base": "8px",
                        "stack-md": "16px",
                        "stack-lg": "24px",
                        "gutter": "24px",
                        "container-padding-desktop": "32px",
                        "container-padding-mobile": "16px"
                    },
                    "fontFamily": {
                        "mono-data": ["JetBrains Mono"],
                        "label-md": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "title-lg": ["Inter"]
                    },
                    "fontSize": {
                        "mono-data": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "title-lg": ["20px", {"lineHeight": "28px", "fontWeight": "600"}]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">

    <!-- Global Header -->
    <?= $this->include('layout/header') ?>

    <div class="flex min-h-[calc(100vh-64px)]">
        <!-- Global Sidebar -->
        <?= $this->include('layout/sidebar') ?>

        <!-- Main Content Area -->
        <div class="flex-1 w-full lg:w-[calc(100%-240px)] lg:ml-[240px] transition-all duration-300">
            <?= $this->renderSection('content') ?>
        </div>
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

            // Dashboard progress bars
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

            // Intersection Observer for scroll-spy effect in sidebar (Panduan Metode)
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('aside a[href^="#"]');

            if (sections.length > 0 && navLinks.length > 0) {
                const observerOptions = {
                    root: null,
                    rootMargin: '-20% 0px -70% 0px',
                    threshold: 0
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const id = entry.target.getAttribute('id');
                            navLinks.forEach(link => {
                                if (link.getAttribute('href') === `#${id}`) {
                                    link.classList.add('active-nav');
                                    link.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
                                } else {
                                    link.classList.remove('active-nav');
                                    link.classList.add('text-on-surface-variant', 'hover:bg-surface-container-high');
                                }
                            });
                        }
                    });
                }, observerOptions);

                sections.forEach(section => observer.observe(section));

                // Smooth scroll with offset for sticky header
                navLinks.forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            const headerOffset = 80;
                            const elementPosition = targetElement.getBoundingClientRect().top;
                            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                            window.scrollTo({
                                top: offsetPosition,
                                behavior: "smooth"
                            });
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>
