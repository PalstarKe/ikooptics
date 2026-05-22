<?php $pageTitle = 'Coverage Areas'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Manage your network coverage areas</p>
    <a href="/admin/coverage/create" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">+ Add Area</a>
</div>

<div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-navy-700">
                <tr>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Name</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Estates</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Fiber</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Wireless</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Status</th>
                    <th class="text-right px-6 py-3 font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                <?php foreach ($areas as $area): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-navy-700">
                    <td class="px-6 py-4 font-medium"><?= htmlspecialchars($area['name']) ?></td>
                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate"><?= htmlspecialchars($area['estates'] ?? '-') ?></td>
                    <td class="px-6 py-4 text-center"><?= $area['fiber_available'] ? '<span class="text-green-500">✓</span>' : '<span class="text-gray-300">✗</span>' ?></td>
                    <td class="px-6 py-4 text-center"><?= $area['wireless_available'] ? '<span class="text-green-500">✓</span>' : '<span class="text-gray-300">✗</span>' ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded-full text-xs <?= $area['status'] === 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-700' ?>"><?= ucfirst($area['status']) ?></span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="/admin/coverage/<?= $area['id'] ?>/edit" class="text-blue-600 hover:text-blue-700">Edit</a>
                        <a href="/admin/coverage/<?= $area['id'] ?>/delete" onclick="return confirm('Delete this area?')" class="text-red-600 hover:text-red-700">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
