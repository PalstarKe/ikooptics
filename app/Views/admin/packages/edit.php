<?php $pageTitle = 'Edit Package'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="max-w-2xl">
    <a href="/admin/packages" class="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block">← Back to Packages</a>

    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <form method="POST" action="/admin/packages/<?= $package['id'] ?>/update" class="space-y-4">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Package Name *</label>
                    <input type="text" name="name" required value="<?= htmlspecialchars($package['name']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Speed *</label>
                    <input type="text" name="speed" required value="<?= htmlspecialchars($package['speed']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Monthly Price (KES) *</label>
                    <input type="number" name="price" required step="0.01" value="<?= $package['price'] ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Installation Fee (KES)</label>
                    <input type="number" name="installation_fee" step="0.01" value="<?= $package['installation_fee'] ?? 0 ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Features (comma separated)</label>
                <textarea name="features" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm"><?= htmlspecialchars($package['features'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm"><?= htmlspecialchars($package['description'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                    <option value="active" <?= $package['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= $package['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Update Package</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
