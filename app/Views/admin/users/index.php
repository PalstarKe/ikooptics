<?php $pageTitle = 'Users'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Manage admin users and roles</p>
    <a href="/admin/users/create" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">+ Add User</a>
</div>

<div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-navy-700">
                <tr>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">User</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Email</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Role</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Created</th>
                    <th class="text-right px-6 py-3 font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                <?php foreach ($users as $user): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-navy-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-700 dark:text-primary-400 text-sm font-medium">
                                <?= strtoupper(substr($user['name'], 0, 1)) ?>
                            </div>
                            <span class="font-medium"><?= htmlspecialchars($user['name']) ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded-full text-xs <?php
                            echo match($user['role']) {
                                'admin' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                'content_manager' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                            };
                        ?>"><?= ucfirst(str_replace('_', ' ', $user['role'])) ?></span>
                    </td>
                    <td class="px-6 py-4 text-gray-500"><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="/admin/users/<?= $user['id'] ?>/edit" class="text-blue-600 hover:text-blue-700">Edit</a>
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                        <a href="/admin/users/<?= $user['id'] ?>/delete" onclick="return confirm('Delete this user?')" class="text-red-600 hover:text-red-700">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
