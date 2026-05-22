<?php $pageTitle = htmlspecialchars($post['title']) . ' - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="pt-32 pb-12 gradient-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="/blog" class="text-primary-400 hover:text-primary-300 text-sm mb-4 inline-block">← Back to Blog</a>
        <h1 class="text-3xl sm:text-4xl font-bold text-white mb-4"><?= htmlspecialchars($post['title']) ?></h1>
        <div class="flex items-center space-x-4 text-gray-400 text-sm">
            <span><?= date('F d, Y', strtotime($post['created_at'])) ?></span>
            <?php if (!empty($post['category'])): ?>
            <span class="px-2 py-1 rounded-full bg-primary-500/20 text-primary-400"><?= htmlspecialchars($post['category']) ?></span>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-12 bg-white dark:bg-navy-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($post['image'])): ?>
        <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-64 sm:h-96 object-cover rounded-2xl mb-8">
        <?php endif; ?>
        <article class="prose prose-lg dark:prose-invert max-w-none">
            <?= $post['content'] ?>
        </article>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
