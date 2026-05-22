<?php $pageTitle = 'Coverage Areas - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/coverage-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Coverage Areas</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">Check if IKO OPTIC is available in your area.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Coverage List -->
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold mb-6">Our Coverage Network</h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    <?php foreach ($areas as $area): ?>
                    <div class="p-5 rounded-xl border border-gray-100 dark:border-gray-800 hover:border-primary-200 dark:hover:border-primary-800 transition-all">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold"><?= htmlspecialchars($area['name']) ?></h3>
                            <span class="text-xs px-2 py-1 rounded-full <?= $area['status'] === 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' ?>">
                                <?= $area['status'] === 'active' ? 'Active' : 'Coming Soon' ?>
                            </span>
                        </div>
                        <div class="flex gap-2 mb-2">
                            <?php if ($area['fiber_available']): ?>
                            <span class="text-xs px-2 py-0.5 rounded bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400">Fiber</span>
                            <?php endif; ?>
                            <?php if ($area['wireless_available']): ?>
                            <span class="text-xs px-2 py-0.5 rounded bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400">Wireless</span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($area['estates'])): ?>
                        <p class="text-xs text-gray-500 dark:text-gray-400"><?= htmlspecialchars($area['estates']) ?></p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Coverage Checker Sidebar -->
            <div>
                <div class="sticky top-24 bg-gray-50 dark:bg-navy-800 rounded-2xl p-6" x-data="{ result: null, loading: false }">
                    <h3 class="text-lg font-bold mb-4">Check Your Area</h3>
                    <form @submit.prevent="
                        loading = true;
                        fetch('/coverage/check', { method: 'POST', headers: {'Content-Type':'application/x-www-form-urlencoded'}, body: new URLSearchParams(Object.fromEntries(new FormData($el))) })
                        .then(r => r.json()).then(d => { result = d; loading = false; })
                    ">
                        <div class="space-y-3">
                            <input type="text" name="area" required placeholder="Area / Town" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                            <input type="text" name="estate" required placeholder="Estate / Building" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                            <input type="tel" name="phone" required placeholder="Phone Number" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                            <button type="submit" :disabled="loading" class="w-full py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors text-sm">
                                <span x-text="loading ? 'Checking...' : 'Check Coverage'"></span>
                            </button>
                        </div>
                    </form>
                    <div x-show="result" x-transition class="mt-4 p-3 rounded-lg text-sm" :class="result?.covered ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400' : 'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400'">
                        <p x-show="result?.covered">✓ Coverage available! We'll contact you shortly.</p>
                        <p x-show="!result?.covered">⏳ Coming soon! We've noted your interest.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
