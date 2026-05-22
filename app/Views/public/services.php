<?php $pageTitle = 'Services - IKO OPTIC LTD'; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/services-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Our Services</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">End-to-end internet and networking solutions for every need.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            <?php
            $services = [
                ['title' => 'Home Fiber Internet', 'desc' => 'Experience ultra-fast fiber optic internet delivered directly to your home. Stream, game, work, and learn without limits. Unlimited data on all plans with speeds up to 100Mbps.', 'features' => ['Unlimited Data', 'Free Router', 'Same-day Installation', '24/7 Support']],
                ['title' => 'Business Fiber', 'desc' => 'Dedicated fiber connectivity designed for businesses. Guaranteed speeds, SLA-backed uptime, and priority support to keep your operations running smoothly.', 'features' => ['Dedicated Bandwidth', 'SLA Guarantee', 'Static IP', 'Priority Support']],
                ['title' => 'Wireless Internet', 'desc' => 'High-speed wireless connectivity for areas where fiber hasn\'t reached yet. Reliable point-to-point and point-to-multipoint solutions.', 'features' => ['Quick Installation', 'Wide Coverage', 'Scalable Speeds', 'No Trenching Required']],
                ['title' => 'Dedicated Internet Access', 'desc' => 'Symmetric, uncontended bandwidth for enterprises requiring guaranteed performance. 1:1 contention ratio with full redundancy.', 'features' => ['1:1 Contention', 'Symmetric Speeds', '99.99% SLA', 'Redundant Links']],
                ['title' => 'CCTV & Security Solutions', 'desc' => 'Professional surveillance systems for homes and businesses. IP cameras, NVR systems, remote monitoring, and cloud storage solutions.', 'features' => ['IP Cameras', 'Remote Viewing', 'Cloud Storage', 'Motion Alerts']],
                ['title' => 'Structured Cabling', 'desc' => 'Professional network cabling infrastructure for offices, buildings, and campuses. Cat6/Cat6A, fiber optic backbone, and cable management.', 'features' => ['Cat6/Cat6A', 'Fiber Backbone', 'Cable Management', 'Testing & Certification']],
                ['title' => 'Network Installation', 'desc' => 'Complete network design, installation, and configuration. From small offices to enterprise campuses, we build networks that perform.', 'features' => ['Network Design', 'Switch & Router Setup', 'WiFi Deployment', 'Security Configuration']],
                ['title' => 'Enterprise Solutions', 'desc' => 'Custom connectivity solutions for large organizations. MPLS, SD-WAN, cloud connectivity, and managed network services.', 'features' => ['MPLS Networks', 'SD-WAN', 'Cloud Connect', 'Managed Services']],
            ];
            foreach ($services as $s): ?>
            <div class="p-8 rounded-2xl border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-all">
                <h3 class="text-xl font-bold mb-3"><?= $s['title'] ?></h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4"><?= $s['desc'] ?></p>
                <ul class="grid grid-cols-2 gap-2">
                    <?php foreach ($s['features'] as $f): ?>
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <svg class="w-4 h-4 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <?= $f ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="relative py-16 overflow-hidden text-center">
    <div class="absolute inset-0">
        <img src="/assets/images/cta-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-primary-700/85"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-4">Need a Custom Solution?</h2>
        <p class="text-green-100 mb-6">Our team can design a connectivity solution tailored to your specific requirements.</p>
        <a href="/contact" class="inline-flex px-8 py-3 bg-white text-primary-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">Contact Our Team</a>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
