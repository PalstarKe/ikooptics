<?php $pageTitle = 'Blog - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/blog-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Blog & News</h1>
        <p class="text-gray-300">Latest updates, tips, and news from IKO OPTIC.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (empty($posts)): ?>
        <div class="text-center py-16">
            <p class="text-gray-500 dark:text-gray-400">No blog posts yet. Check back soon!</p>
        </div>
        <?php else: ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
            <article class="rounded-2xl border border-gray-100 dark:border-gray-800 overflow-hidden hover-lift transition-all">
                <?php if (!empty($post['image'])): ?>
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-48 object-cover">
                <?php else: ?>
                <div class="w-full h-48 gradient-primary flex items-center justify-center">
                    <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <?php endif; ?>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <?php if (!empty($post['category'])): ?>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-primary-50 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400"><?= htmlspecialchars($post['category']) ?></span>
                        <?php endif; ?>
                        <span class="text-xs text-gray-500"><?= date('M d, Y', strtotime($post['created_at'])) ?></span>
                    </div>
                    <h2 class="font-bold text-lg mb-2 line-clamp-2"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-3 mb-4"><?= htmlspecialchars($post['excerpt'] ?? '') ?></p>
                    <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Read More →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
