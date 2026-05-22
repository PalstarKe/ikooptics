<?php $pageTitle = 'Settings'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="max-w-3xl">
    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <form method="POST" action="/admin/settings" class="space-y-6">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <h2 class="font-semibold text-lg border-b border-gray-100 dark:border-gray-700 pb-3">General Settings</h2>

            <?php
            $grouped = [];
            foreach ($settings as $s) {
                $grouped[$s['group'] ?? 'general'][] = $s;
            }
            foreach ($grouped as $group => $items):
            ?>
            <div class="space-y-4">
                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider"><?= ucfirst($group) ?></h3>
                <?php foreach ($items as $item): ?>
                <div>
                    <label class="block text-sm font-medium mb-1"><?= ucwords(str_replace('_', ' ', str_replace($group . '_', '', $item['key']))) ?></label>
                    <?php if (($item['type'] ?? 'text') === 'textarea' || ($item['type'] ?? 'text') === 'html'): ?>
                    <textarea name="settings[<?= htmlspecialchars($item['key']) ?>]" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm"><?= htmlspecialchars($item['value'] ?? '') ?></textarea>
                    <?php else: ?>
                    <input type="text" name="settings[<?= htmlspecialchars($item['key']) ?>]" value="<?= htmlspecialchars($item['value'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Save Settings</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
