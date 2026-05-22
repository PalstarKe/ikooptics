<?php $pageTitle = 'Edit Blog Post'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="max-w-3xl">
    <a href="/admin/blog" class="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block">← Back to Blog</a>

    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <form method="POST" action="/admin/blog/<?= $post['id'] ?>/update" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($post['title']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Excerpt</label>
                <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm"><?= htmlspecialchars($post['excerpt'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Content *</label>
                <textarea name="content" rows="12" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 outline-none text-sm font-mono"><?= htmlspecialchars($post['content'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <input type="text" name="category" value="<?= htmlspecialchars($post['category'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Featured Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-700 text-sm">
                    <?php if (!empty($post['image'])): ?>
                    <p class="text-xs text-gray-500 mt-1">Current: <?= basename($post['image']) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" value="<?= htmlspecialchars($post['meta_title'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                        <option value="draft" <?= $post['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="published" <?= $post['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Meta Description (SEO)</label>
                <textarea name="meta_description" rows="2" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm"><?= htmlspecialchars($post['meta_description'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Update Post</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
