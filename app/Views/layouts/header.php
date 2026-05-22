<?php
$settings = $settings ?? [];
$siteName = $settings['site_name'] ?? 'IKO OPTIC LTD';
$metaTitle = $settings['meta_title'] ?? 'IKO OPTIC LTD - Fast Reliable Internet';
$metaDesc = $settings['meta_description'] ?? 'Fast, reliable fiber and wireless internet services across Kenya.';
?>
<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('dark') === 'true', mobileMenu: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? $metaTitle ?></title>
    <meta name="description" content="<?= $metaDesc ?>">
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description" content="<?= $metaDesc ?>">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <link rel="canonical" href="<?= $_SERVER['REQUEST_URI'] ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { 50:'#f0fdf4',100:'#dcfce7',200:'#bbf7d0',300:'#86efac',400:'#4ade80',500:'#16A34A',600:'#15803D',700:'#166534',800:'#14532d',900:'#052e16' },
                        accent: { 500:'#DC2626', 600:'#B91C1C' },
                        navy: { 800:'#1e293b', 900:'#0f172a' }
                    }
                }
            }
        }
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); }
        .dark .glass { background: rgba(0,0,0,0.2); }
        .gradient-primary { background: linear-gradient(135deg, #15803D 0%, #16A34A 100%); }
        .gradient-dark { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); }
        .animate-fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes fadeIn { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        .hover-lift { transition: transform 0.3s, box-shadow 0.3s; }
        .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-white dark:bg-navy-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

<!-- Navigation -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-2xl transition-all duration-300"
     x-data="{ scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 50"
     :class="scrolled ? 'bg-white/90 dark:bg-navy-900/90 backdrop-blur-xl shadow-lg shadow-black/5 border border-gray-200/50 dark:border-gray-700/50' : 'bg-white/5 backdrop-blur-md border border-white/10'">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-18">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="/assets/images/logo.png" alt="IKO OPTIC" class="h-12 w-auto">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Home</a>
                <a href="/services" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Services</a>
                <a href="/packages" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Packages</a>
                <a href="/coverage" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Coverage</a>
                <a href="/about" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">About</a>
                <a href="/blog" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Blog</a>
                <a href="/contact" class="text-sm font-medium hover:text-primary-400 transition-colors" :class="scrolled ? 'text-gray-700 dark:text-gray-200' : 'text-white/90'">Contact</a>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-3">
                <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="p-2 rounded-lg transition-colors" :class="scrolled ? 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-200' : 'hover:bg-white/10 text-white'">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>
                <a href="/contact" class="hidden sm:inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-xl transition-colors shadow-lg shadow-primary-600/20">
                    Get Connected
                </a>
                <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-2 rounded-lg transition-colors" :class="scrolled ? 'hover:bg-gray-100 dark:hover:bg-gray-800' : 'hover:bg-white/10 text-white'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" x-transition class="lg:hidden mt-2 bg-white dark:bg-navy-900 rounded-xl border border-gray-100 dark:border-gray-800 px-4 py-4 space-y-1 shadow-xl">
        <a href="/" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Home</a>
        <a href="/services" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Services</a>
        <a href="/packages" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Packages</a>
        <a href="/coverage" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Coverage</a>
        <a href="/about" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">About</a>
        <a href="/blog" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Blog</a>
        <a href="/contact" class="block py-2.5 px-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-sm font-medium">Contact</a>
        <a href="/contact" class="block py-2.5 px-3 bg-primary-600 text-white text-center rounded-lg text-sm font-medium mt-2">Get Connected</a>
    </div>
</nav>
