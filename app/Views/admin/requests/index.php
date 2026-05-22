<?php $pageTitle = 'Client Requests'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Total: <?= $total ?> requests</p>
</div>

<div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-navy-700">
                <tr>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Client</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Phone</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Service</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Location</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Status</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Date</th>
                    <th class="text-right px-6 py-3 font-medium text-gray-500">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                <?php foreach ($data as $req): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-navy-700">
                    <td class="px-6 py-4">
                        <div class="font-medium"><?= htmlspecialchars($req['name']) ?></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($req['email'] ?? '') ?></div>
                    </td>
                    <td class="px-6 py-4"><?= htmlspecialchars($req['phone']) ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($req['service_needed'] ?? '-') ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($req['location'] ?? '-') ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded-full text-xs <?php
                            echo match($req['status']) {
                                'new' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                'contacted' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                'installation_scheduled' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                                'completed' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                default => 'bg-gray-100 text-gray-700',
                            };
                        ?>"><?= ucfirst(str_replace('_', ' ', $req['status'])) ?></span>
                    </td>
                    <td class="px-6 py-4 text-gray-500"><?= date('M d', strtotime($req['created_at'])) ?></td>
                    <td class="px-6 py-4 text-right">
                        <a href="/admin/requests/<?= $req['id'] ?>" class="text-blue-600 hover:text-blue-700">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($pages > 1): ?>
    <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 flex justify-center space-x-2">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a href="/admin/requests?page=<?= $i ?>" class="px-3 py-1 rounded text-sm <?= $i === $current ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-navy-700 hover:bg-gray-200' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
