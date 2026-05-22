<?php $pageTitle = 'Edit User'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="max-w-lg">
    <a href="/admin/users" class="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block">← Back to Users</a>

    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <form method="POST" action="/admin/users/<?= $user['id'] ?>/update" class="space-y-4">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <div>
                <label class="block text-sm font-medium mb-1">Full Name *</label>
                <input type="text" name="name" required value="<?= htmlspecialchars($user['name']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email *</label>
                <input type="email" name="email" required value="<?= htmlspecialchars($user['email']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">New Password (leave blank to keep current)</label>
                <input type="password" name="password" minlength="6" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Role</label>
                <select name="role" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Super Admin</option>
                    <option value="content_manager" <?= $user['role'] === 'content_manager' ? 'selected' : '' ?>>Content Manager</option>
                    <option value="support" <?= $user['role'] === 'support' ? 'selected' : '' ?>>Support Team</option>
                </select>
            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Update User</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
