<?php $pageTitle = 'About Us - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/about-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">About IKO OPTIC LTD</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">Connecting Kenya with world-class internet infrastructure since day one.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8"><?= $settings['about_mission'] ?? 'To provide fast, reliable, and affordable internet connectivity to homes and businesses across Kenya, bridging the digital divide.' ?></p>
                <h2 class="text-3xl font-bold mb-6">Our Vision</h2>
                <p class="text-gray-600 dark:text-gray-400"><?= $settings['about_vision'] ?? 'To be the leading ISP in East Africa, connecting every home and business with world-class internet infrastructure.' ?></p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <?php
                $values = explode(',', $settings['about_values'] ?? 'Reliability,Innovation,Customer First,Integrity,Excellence');
                $valueIcons = [
                    'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                    'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                    'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                ];
                foreach ($values as $i => $val): ?>
                <div class="p-6 rounded-2xl bg-gray-50 dark:bg-navy-800 text-center hover-lift">
                    <div class="w-12 h-12 rounded-xl gradient-primary flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $valueIcons[$i % count($valueIcons)] ?>"/></svg>
                    </div>
                    <div class="font-semibold text-sm"><?= trim($val) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-12">Why Choose IKO OPTIC?</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 bg-white dark:bg-navy-900 rounded-2xl hover-lift">
                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-bold mb-2">Lightning Fast</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Speeds up to 1Gbps with our fiber infrastructure.</p>
            </div>
            <div class="p-6 bg-white dark:bg-navy-900 rounded-2xl hover-lift">
                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold mb-2">99.9% Uptime</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Redundant infrastructure ensures maximum reliability.</p>
            </div>
            <div class="p-6 bg-white dark:bg-navy-900 rounded-2xl hover-lift">
                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="font-bold mb-2">24/7 Support</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Our dedicated team is always ready to help you.</p>
            </div>
        </div>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
