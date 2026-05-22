<?php $pageTitle = 'Media Library'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500"><?= count($media) ?> files</p>
    <form method="POST" action="/admin/media/upload" enctype="multipart/form-data" class="flex items-center space-x-2">
        <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">
        <input type="file" name="file" required accept="image/*,.pdf" class="text-sm border border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2">
        <button type="submit" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">Upload</button>
    </form>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
    <?php foreach ($media as $file): ?>
    <div class="group relative bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <?php if (in_array(pathinfo($file['name'], PATHINFO_EXTENSION), ['jpg','jpeg','png','gif','webp'])): ?>
        <img src="<?= htmlspecialchars($file['path']) ?>" alt="<?= htmlspecialchars($file['name']) ?>" class="w-full h-32 object-cover">
        <?php else: ?>
        <div class="w-full h-32 flex items-center justify-center bg-gray-50 dark:bg-navy-700">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <?php endif; ?>
        <div class="p-2">
            <p class="text-xs truncate"><?= htmlspecialchars($file['name']) ?></p>
            <p class="text-xs text-gray-500"><?= round($file['size'] / 1024) ?> KB</p>
        </div>
        <form method="POST" action="/admin/media/delete" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">
            <input type="hidden" name="file" value="<?= htmlspecialchars($file['name']) ?>">
            <button type="submit" onclick="return confirm('Delete?')" class="w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">✕</button>
        </form>
    </div>
    <?php endforeach; ?>
    <?php if (empty($media)): ?>
    <div class="col-span-full text-center py-12 text-gray-500">No media files uploaded yet.</div>
    <?php endif; ?>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
