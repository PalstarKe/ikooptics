<?php $pageTitle = 'Packages'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Manage internet packages</p>
    <a href="/admin/packages/create" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">+ Add Package</a>
</div>

<div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-navy-700">
                <tr>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Package</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Speed</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Price</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Category</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Status</th>
                    <th class="text-right px-6 py-3 font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                <?php foreach ($packages as $pkg): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-navy-700">
                    <td class="px-6 py-4 font-medium"><?= htmlspecialchars($pkg['name']) ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($pkg['speed']) ?></td>
                    <td class="px-6 py-4">KES <?= number_format($pkg['price']) ?></td>
                    <td class="px-6 py-4 capitalize"><?= htmlspecialchars($pkg['category'] ?? 'home') ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded-full text-xs <?= $pkg['status'] === 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-700' ?>"><?= ucfirst($pkg['status']) ?></span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="/admin/packages/<?= $pkg['id'] ?>/edit" class="text-blue-600 hover:text-blue-700">Edit</a>
                        <a href="/admin/packages/<?= $pkg['id'] ?>/delete" onclick="return confirm('Delete this package?')" class="text-red-600 hover:text-red-700">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
