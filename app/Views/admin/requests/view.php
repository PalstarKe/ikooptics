<?php $pageTitle = 'Request #' . $request['id']; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<a href="/admin/requests" class="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block">← Back to Requests</a>

<div class="grid lg:grid-cols-3 gap-6">
    <!-- Request Details -->
    <div class="lg:col-span-2 bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <h2 class="font-semibold mb-4">Client Information</h2>
        <div class="grid sm:grid-cols-2 gap-4 text-sm">
            <div><span class="text-gray-500">Name:</span> <span class="font-medium ml-2"><?= htmlspecialchars($request['name']) ?></span></div>
            <div><span class="text-gray-500">Phone:</span> <span class="font-medium ml-2"><?= htmlspecialchars($request['phone']) ?></span></div>
            <div><span class="text-gray-500">Email:</span> <span class="font-medium ml-2"><?= htmlspecialchars($request['email'] ?? '-') ?></span></div>
            <div><span class="text-gray-500">Location:</span> <span class="font-medium ml-2"><?= htmlspecialchars($request['location'] ?? '-') ?></span></div>
            <div><span class="text-gray-500">Service:</span> <span class="font-medium ml-2"><?= htmlspecialchars($request['service_needed'] ?? '-') ?></span></div>
            <div><span class="text-gray-500">Date:</span> <span class="font-medium ml-2"><?= date('M d, Y H:i', strtotime($request['created_at'])) ?></span></div>
        </div>
        <?php if (!empty($request['message'])): ?>
        <div class="mt-4 p-4 bg-gray-50 dark:bg-navy-700 rounded-lg">
            <p class="text-sm text-gray-500 mb-1">Message:</p>
            <p class="text-sm"><?= nl2br(htmlspecialchars($request['message'])) ?></p>
        </div>
        <?php endif; ?>
        <?php if (!empty($request['notes'])): ?>
        <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/10 rounded-lg">
            <p class="text-sm text-gray-500 mb-1">Internal Notes:</p>
            <p class="text-sm"><?= nl2br(htmlspecialchars($request['notes'])) ?></p>
        </div>
        <?php endif; ?>
    </div>

    <!-- Update Status -->
    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700 p-6">
        <h2 class="font-semibold mb-4">Update Status</h2>
        <form method="POST" action="/admin/requests/<?= $request['id'] ?>/update" class="space-y-4">
            <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">

            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
                    <option value="new" <?= $request['status'] === 'new' ? 'selected' : '' ?>>New</option>
                    <option value="contacted" <?= $request['status'] === 'contacted' ? 'selected' : '' ?>>Contacted</option>
                    <option value="installation_scheduled" <?= $request['status'] === 'installation_scheduled' ? 'selected' : '' ?>>Installation Scheduled</option>
                    <option value="completed" <?= $request['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="cancelled" <?= $request['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Assign To (User ID)</label>
                <input type="number" name="assigned_to" value="<?= $request['assigned_to'] ?? '' ?>" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Notes</label>
                <textarea name="notes" rows="4" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 text-sm"><?= htmlspecialchars($request['notes'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition-colors">Update Request</button>
        </form>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
