<?php $pageTitle = 'Blog Posts'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Manage blog posts and news</p>
    <a href="/admin/blog/create" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">+ New Post</a>
</div>

<div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-navy-700">
                <tr>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Title</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Category</th>
                    <th class="text-center px-6 py-3 font-medium text-gray-500">Status</th>
                    <th class="text-left px-6 py-3 font-medium text-gray-500">Date</th>
                    <th class="text-right px-6 py-3 font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                <?php foreach ($posts as $post): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-navy-700">
                    <td class="px-6 py-4 font-medium max-w-xs truncate"><?= htmlspecialchars($post['title']) ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($post['category'] ?? '-') ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded-full text-xs <?= $post['status'] === 'published' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300' ?>"><?= ucfirst($post['status']) ?></span>
                    </td>
                    <td class="px-6 py-4 text-gray-500"><?= date('M d, Y', strtotime($post['created_at'])) ?></td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="/admin/blog/<?= $post['id'] ?>/edit" class="text-blue-600 hover:text-blue-700">Edit</a>
                        <a href="/admin/blog/<?= $post['id'] ?>/delete" onclick="return confirm('Delete this post?')" class="text-red-600 hover:text-red-700">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($posts)): ?>
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No blog posts yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
