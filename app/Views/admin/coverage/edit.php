<?php $pageTitle = 'Edit Coverage Area'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="max-w-2xl">
    <a href="/admin/coverage" class="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block">← Back to Coverage</a>

    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <form method="POST" action="/admin/coverage/<?= $area['id'] ?>/update" class="space-y-4">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <div>
                <label class="block text-sm font-medium mb-1">Area Name *</label>
                <input type="text" name="name" required value="<?= htmlspecialchars($area['name']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Estates (comma separated)</label>
                <textarea name="estates" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm"><?= htmlspecialchars($area['estates'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center space-x-2 p-3 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer">
                    <input type="checkbox" name="fiber_available" value="1" <?= $area['fiber_available'] ? 'checked' : '' ?> class="rounded text-primary-600">
                    <span class="text-sm">Fiber Available</span>
                </label>
                <label class="flex items-center space-x-2 p-3 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer">
                    <input type="checkbox" name="wireless_available" value="1" <?= $area['wireless_available'] ? 'checked' : '' ?> class="rounded text-primary-600">
                    <span class="text-sm">Wireless Available</span>
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                    <option value="active" <?= $area['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="coming_soon" <?= $area['status'] === 'coming_soon' ? 'selected' : '' ?>>Coming Soon</option>
                    <option value="inactive" <?= $area['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Update Coverage Area</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
