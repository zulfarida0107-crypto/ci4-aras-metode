<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?= isset($pageTitle) ? $pageTitle : 'SPK ARAS Laptop Gaming' ?></title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
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
<body class="min-h-screen">
<!-- Global Header (68px, fixed) -->
<header class="fixed top-0 left-0 right-0 z-50 h-[68px] bg-white border-b border-outline-variant px-8 flex items-center justify-between">
<div class="flex items-center gap-10">
<span class="text-xl font-extrabold text-primary tracking-tight">SPK ARAS Laptop Gaming</span>
</div>
<div class="flex items-center gap-5">
<button class="text-on-surface-variant hover:text-primary transition-colors flex items-center">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="text-on-surface-variant hover:text-primary transition-colors flex items-center">
<span class="material-symbols-outlined">contrast</span>
</button>
<div class="w-9 h-9 rounded-full bg-surface-container border border-outline-variant overflow-hidden cursor-pointer">
<img alt="Avatar" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCbcEh24CgCBVKkD_rZ_YgecULsHqffcKL2135ZfL2ny8fARY8sa9dnvOAl8yeCRRAlyqcNnplZWafMDK_l7ZwoeOHwAOJRzBGEum4xfy2BQcGe3dMpyy_Z8KHy_gYYLTLFrqPySZYI6YuFnjv5uIObCKquN80jlWi9-ws5oiCoH823Ck_EaqsyBPNlBf4bv69mXchcrQqOUSM-izXUTxWiPFKVl99ErzUjfEl5itvPLc0s2t17kq4V2KnwWakp4j_Y0lrUyd83BSI">
</div>
</div>
</header>
