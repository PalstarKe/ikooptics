<?php $pageTitle = 'Internet Packages - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/packages-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Internet Packages</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">Unlimited internet for every budget. All plans include unlimited data.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($packages as $i => $pkg): ?>
            <div class="relative bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 hover:border-primary-300 dark:hover:border-primary-600 transition-all hover-lift shadow-sm">
                <div class="mb-4">
                    <span class="text-xs font-medium px-2 py-1 rounded-full bg-primary-50 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 uppercase"><?= htmlspecialchars($pkg['category'] ?? 'home') ?></span>
                </div>
                <h3 class="font-bold text-lg mb-1"><?= htmlspecialchars($pkg['name']) ?></h3>
                <div class="flex items-baseline mb-1">
                    <span class="text-3xl font-bold text-primary-600">KES <?= number_format($pkg['price']) ?></span>
                    <span class="text-sm text-gray-500 ml-1">/mo</span>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                    <svg class="w-4 h-4 text-primary-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <?= htmlspecialchars($pkg['speed']) ?>
                </div>
                <ul class="space-y-2 mb-6">
                    <?php foreach (explode(',', $pkg['features'] ?? '') as $feature): ?>
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <svg class="w-4 h-4 text-primary-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <?= trim($feature) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="text-xs text-gray-500 mb-4">
                    Installation: <?= $pkg['installation_fee'] > 0 ? 'KES ' . number_format($pkg['installation_fee']) : '<span class="text-primary-600 font-medium">FREE</span>' ?>
                </div>
                <a href="/contact" class="block text-center py-3 rounded-lg font-medium text-sm bg-primary-600 text-white hover:bg-primary-700 transition-colors">
                    Subscribe Now
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
