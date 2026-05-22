<?php $pageTitle = 'Dashboard'; require BASE_PATH . '/app/Views/layouts/admin.php'; ?>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white dark:bg-navy-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Requests</p>
                <p class="text-2xl font-bold mt-1"><?= $stats['requests'] ?></p>
                <p class="text-xs text-primary-600 mt-1"><?= $stats['new_requests'] ?> new</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-primary-50 dark:bg-primary-900/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-navy-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Coverage Areas</p>
                <p class="text-2xl font-bold mt-1"><?= $stats['coverage_areas'] ?></p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-navy-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Active Packages</p>
                <p class="text-2xl font-bold mt-1"><?= $stats['packages'] ?></p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-navy-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Blog Posts</p>
                <p class="text-2xl font-bold mt-1"><?= $stats['blog_posts'] ?></p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7"/></svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Requests & Activity -->
<div class="grid lg:grid-cols-2 gap-6">
    <!-- Recent Requests -->
    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between p-6 border-b border-gray-100 dark:border-gray-700">
            <h2 class="font-semibold">Recent Requests</h2>
            <a href="/admin/requests" class="text-sm text-primary-600 hover:text-primary-700">View All</a>
        </div>
        <div class="divide-y divide-gray-50 dark:divide-gray-700">
            <?php foreach ($recentRequests as $req): ?>
            <div class="p-4 hover:bg-gray-50 dark:hover:bg-navy-700 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-sm"><?= htmlspecialchars($req['name']) ?></p>
                        <p class="text-xs text-gray-500"><?= htmlspecialchars($req['service_needed'] ?? 'General') ?> • <?= htmlspecialchars($req['location'] ?? '') ?></p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full <?php
                        echo match($req['status']) {
                            'new' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                            'contacted' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                            'installation_scheduled' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                            'completed' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    ?>"><?= ucfirst(str_replace('_', ' ', $req['status'])) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($recentRequests)): ?>
            <div class="p-6 text-center text-gray-500 text-sm">No requests yet.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white dark:bg-navy-800 rounded-xl border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h2 class="font-semibold">Recent Activity</h2>
        </div>
        <div class="divide-y divide-gray-50 dark:divide-gray-700 max-h-96 overflow-y-auto">
            <?php foreach ($recentActivity as $log): ?>
            <div class="p-4">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-gray-100 dark:bg-navy-700 flex items-center justify-center text-xs font-medium">
                        <?= strtoupper(substr($log['user_name'] ?? '?', 0, 1)) ?>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium"><?= htmlspecialchars($log['user_name'] ?? 'System') ?></span> <?= htmlspecialchars($log['action']) ?></p>
                        <p class="text-xs text-gray-500"><?= date('M d, H:i', strtotime($log['created_at'])) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($recentActivity)): ?>
            <div class="p-6 text-center text-gray-500 text-sm">No activity yet.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
