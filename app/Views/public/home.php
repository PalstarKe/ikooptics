<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="/assets/images/hero-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-navy-900/95 via-navy-900/80 to-navy-900/60"></div>
    </div>
    <!-- Animated overlay elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Content -->
            <div class="animate-fade-in">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary-500/20 text-primary-400 border border-primary-500/30 mb-6">
                    <span class="w-2 h-2 bg-primary-400 rounded-full mr-2 animate-pulse"></span>
                    Now Expanding Coverage Across Kenya
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    <?= $settings['hero_title'] ?? 'Fast. Reliable. Unlimited Internet.' ?>
                </h1>
                <p class="text-lg text-gray-300 mb-8 max-w-lg">
                    <?= $settings['hero_subtitle'] ?? 'Experience blazing-fast fiber and wireless internet connectivity for your home and business. Coverage expanding across Kenya.' ?>
                </p>
                <div class="flex flex-wrap gap-4 mb-10">
                    <a href="/coverage" class="px-7 py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl transition-all hover:scale-105 shadow-lg shadow-primary-600/30">
                        Check Coverage
                    </a>
                    <a href="/contact" class="px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 transition-all backdrop-blur-sm">
                        Get Connected
                    </a>
                    <a href="/contact" class="px-7 py-3.5 text-primary-400 hover:text-primary-300 font-semibold transition-colors flex items-center">
                        Contact Sales
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <!-- Mini stats row -->
                <div class="flex items-center gap-6 text-sm">
                    <div class="flex items-center gap-2 text-gray-400">
                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                        <span><strong class="text-white">99.9%</strong> Uptime</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                        <span><strong class="text-white">1Gbps</strong> Max Speed</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                        <span><strong class="text-white">24/7</strong> Support</span>
                    </div>
                </div>
            </div>

            <!-- Right: Animated Network Illustration -->
            <div class="hidden lg:flex items-center justify-center animate-fade-in">
                <div class="relative w-full max-w-lg">
                    <!-- Outer glow ring -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-80 h-80 rounded-full border border-primary-500/20 animate-[spin_20s_linear_infinite]"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-96 h-96 rounded-full border border-primary-500/10 animate-[spin_30s_linear_infinite_reverse]"></div>
                    </div>

                    <!-- Central SVG illustration -->
                    <svg viewBox="0 0 400 400" class="w-full h-auto relative z-10" xmlns="http://www.w3.org/2000/svg">
                        <!-- Network nodes and connections -->
                        <defs>
                            <radialGradient id="nodeGlow" cx="50%" cy="50%" r="50%">
                                <stop offset="0%" stop-color="#16A34A" stop-opacity="0.6"/>
                                <stop offset="100%" stop-color="#16A34A" stop-opacity="0"/>
                            </radialGradient>
                            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#16A34A" stop-opacity="0.1"/>
                                <stop offset="50%" stop-color="#16A34A" stop-opacity="0.8"/>
                                <stop offset="100%" stop-color="#16A34A" stop-opacity="0.1"/>
                            </linearGradient>
                        </defs>

                        <!-- Connection lines -->
                        <g stroke="url(#lineGrad)" stroke-width="1.5" fill="none" opacity="0.6">
                            <line x1="200" y1="200" x2="100" y2="80"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="3s" repeatCount="indefinite"/></line>
                            <line x1="200" y1="200" x2="320" y2="90"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="3.5s" repeatCount="indefinite"/></line>
                            <line x1="200" y1="200" x2="80" y2="250"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="2.8s" repeatCount="indefinite"/></line>
                            <line x1="200" y1="200" x2="330" y2="270"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="4s" repeatCount="indefinite"/></line>
                            <line x1="200" y1="200" x2="150" y2="340"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="3.2s" repeatCount="indefinite"/></line>
                            <line x1="200" y1="200" x2="280" y2="350"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="2.5s" repeatCount="indefinite"/></line>
                            <!-- Secondary connections -->
                            <line x1="100" y1="80" x2="320" y2="90" stroke-dasharray="4 4"><animate attributeName="opacity" values="0.2;0.5;0.2" dur="5s" repeatCount="indefinite"/></line>
                            <line x1="80" y1="250" x2="150" y2="340" stroke-dasharray="4 4"><animate attributeName="opacity" values="0.2;0.5;0.2" dur="4.5s" repeatCount="indefinite"/></line>
                            <line x1="330" y1="270" x2="280" y2="350" stroke-dasharray="4 4"><animate attributeName="opacity" values="0.2;0.5;0.2" dur="5.5s" repeatCount="indefinite"/></line>
                        </g>

                        <!-- Data packets traveling along lines -->
                        <circle r="3" fill="#4ade80">
                            <animateMotion dur="2s" repeatCount="indefinite" path="M200,200 L100,80"/>
                        </circle>
                        <circle r="3" fill="#4ade80">
                            <animateMotion dur="2.5s" repeatCount="indefinite" path="M200,200 L320,90"/>
                        </circle>
                        <circle r="3" fill="#4ade80">
                            <animateMotion dur="1.8s" repeatCount="indefinite" path="M200,200 L330,270"/>
                        </circle>
                        <circle r="2" fill="#86efac">
                            <animateMotion dur="3s" repeatCount="indefinite" path="M200,200 L150,340"/>
                        </circle>
                        <circle r="2" fill="#86efac">
                            <animateMotion dur="2.2s" repeatCount="indefinite" path="M200,200 L80,250"/>
                        </circle>

                        <!-- Central hub (router/server) -->
                        <circle cx="200" cy="200" r="30" fill="url(#nodeGlow)"/>
                        <circle cx="200" cy="200" r="18" fill="#0f172a" stroke="#16A34A" stroke-width="2.5">
                            <animate attributeName="r" values="18;20;18" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <!-- Router icon inside -->
                        <g transform="translate(188, 188)" fill="none" stroke="#4ade80" stroke-width="1.5">
                            <rect x="2" y="6" width="20" height="12" rx="2"/>
                            <line x1="6" y1="18" x2="6" y2="22"/>
                            <line x1="18" y1="18" x2="18" y2="22"/>
                            <circle cx="7" cy="12" r="1.5" fill="#4ade80"/>
                            <circle cx="12" cy="12" r="1.5" fill="#4ade80"/>
                            <circle cx="17" cy="12" r="1.5" fill="#4ade80"/>
                            <path d="M8 3 L12 0 L16 3" stroke-linecap="round"/>
                            <path d="M6 5 L12 1 L18 5" stroke-linecap="round" opacity="0.5"/>
                        </g>

                        <!-- Outer nodes (homes/buildings) -->
                        <!-- Node 1: Home -->
                        <circle cx="100" cy="80" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(92, 72)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <path d="M8 1 L1 7 L1 15 L15 15 L15 7 Z"/>
                            <rect x="6" y="10" width="4" height="5"/>
                        </g>

                        <!-- Node 2: Office -->
                        <circle cx="320" cy="90" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(312, 82)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <rect x="1" y="3" width="14" height="12" rx="1"/>
                            <line x1="5" y1="6" x2="11" y2="6"/>
                            <line x1="5" y1="9" x2="11" y2="9"/>
                            <line x1="5" y1="12" x2="9" y2="12"/>
                        </g>

                        <!-- Node 3: Tower -->
                        <circle cx="80" cy="250" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(72, 241)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <line x1="8" y1="2" x2="8" y2="16"/>
                            <line x1="4" y1="16" x2="12" y2="16"/>
                            <path d="M5 5 C5 3 8 1 8 1 C8 1 11 3 11 5"/>
                            <path d="M3 7 C3 4 8 0 8 0 C8 0 13 4 13 7" opacity="0.5"/>
                        </g>

                        <!-- Node 4: Server -->
                        <circle cx="330" cy="270" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(322, 262)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <rect x="2" y="1" width="12" height="5" rx="1"/>
                            <rect x="2" y="7" width="12" height="5" rx="1"/>
                            <rect x="2" y="13" width="12" height="5" rx="1"/>
                            <circle cx="12" cy="3.5" r="1" fill="#4ade80"/>
                            <circle cx="12" cy="9.5" r="1" fill="#4ade80"/>
                            <circle cx="12" cy="15.5" r="1" fill="#4ade80"/>
                        </g>

                        <!-- Node 5: Camera -->
                        <circle cx="150" cy="340" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(142, 332)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <rect x="1" y="5" width="12" height="8" rx="1"/>
                            <path d="M13 7 L16 5 L16 15 L13 13"/>
                        </g>

                        <!-- Node 6: Globe -->
                        <circle cx="280" cy="350" r="12" fill="#0f172a" stroke="#16A34A" stroke-width="1.5"/>
                        <g transform="translate(272, 342)" fill="none" stroke="#4ade80" stroke-width="1.2">
                            <circle cx="8" cy="8" r="7"/>
                            <ellipse cx="8" cy="8" rx="3" ry="7"/>
                            <line x1="1" y1="8" x2="15" y2="8"/>
                        </g>

                        <!-- Pulse rings on central node -->
                        <circle cx="200" cy="200" r="30" fill="none" stroke="#16A34A" stroke-width="0.5" opacity="0">
                            <animate attributeName="r" values="30;60" dur="2s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values="0.6;0" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="200" cy="200" r="30" fill="none" stroke="#16A34A" stroke-width="0.5" opacity="0">
                            <animate attributeName="r" values="30;60" dur="2s" begin="1s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values="0.6;0" dur="2s" begin="1s" repeatCount="indefinite"/>
                        </circle>
                    </svg>

                    <!-- Floating labels -->
                    <div class="absolute top-8 left-4 glass rounded-lg px-3 py-1.5 text-xs text-green-400 font-medium animate-bounce" style="animation-duration:3s">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full inline-block mr-1.5"></span>Fiber Connected
                    </div>
                    <div class="absolute top-12 right-2 glass rounded-lg px-3 py-1.5 text-xs text-blue-400 font-medium animate-bounce" style="animation-duration:3.5s;animation-delay:0.5s">
                        <span class="w-1.5 h-1.5 bg-blue-400 rounded-full inline-block mr-1.5"></span>Enterprise Link
                    </div>
                    <div class="absolute bottom-16 left-8 glass rounded-lg px-3 py-1.5 text-xs text-purple-400 font-medium animate-bounce" style="animation-duration:4s;animation-delay:1s">
                        <span class="w-1.5 h-1.5 bg-purple-400 rounded-full inline-block mr-1.5"></span>Wireless Active
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-gray-50 dark:bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-3xl sm:text-4xl font-bold text-primary-600"><?= $settings['stats_uptime'] ?? '99.9' ?>%</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Network Uptime</div>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl font-bold text-primary-600"><?= $settings['stats_clients'] ?? '5000+' ?></div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Active Clients</div>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl font-bold text-primary-600"><?= $settings['stats_areas'] ?? '8+' ?></div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Coverage Areas</div>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl font-bold text-primary-600"><?= $settings['stats_support'] ?? '24/7' ?></div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Support Available</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Our Services</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Comprehensive internet and networking solutions for homes, businesses, and enterprises.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $services = [
                ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'title' => 'Home Fiber Internet', 'desc' => 'Blazing fast fiber to your doorstep with unlimited data.'],
                ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'title' => 'Business Fiber', 'desc' => 'Dedicated business connectivity with SLA guarantees.'],
                ['icon' => 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.858 15.355-5.858 21.213 0', 'title' => 'Wireless Internet', 'desc' => 'High-speed wireless for areas without fiber coverage.'],
                ['icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z', 'title' => 'Dedicated Internet', 'desc' => 'Symmetric dedicated links for enterprise needs.'],
                ['icon' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z', 'title' => 'CCTV Solutions', 'desc' => 'Professional surveillance and security camera systems.'],
                ['icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4', 'title' => 'Structured Cabling', 'desc' => 'Professional network cabling and infrastructure.'],
                ['icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2', 'title' => 'Network Installation', 'desc' => 'Complete network setup and configuration services.'],
                ['icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9', 'title' => 'Enterprise Solutions', 'desc' => 'Custom connectivity solutions for large organizations.'],
            ];
            foreach ($services as $service): ?>
            <div class="group p-6 rounded-2xl border border-gray-100 dark:border-gray-800 hover:border-primary-200 dark:hover:border-primary-800 hover:shadow-xl transition-all duration-300 hover-lift">
                <div class="w-12 h-12 rounded-xl gradient-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $service['icon'] ?>"/></svg>
                </div>
                <h3 class="font-semibold mb-2"><?= $service['title'] ?></h3>
                <p class="text-sm text-gray-500 dark:text-gray-400"><?= $service['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="py-20 bg-gray-50 dark:bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Internet Packages</h2>
            <p class="text-gray-500 dark:text-gray-400">Choose the perfect plan for your needs. All packages include unlimited data.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($packages, 0, 4) as $i => $pkg): ?>
            <div class="relative bg-white dark:bg-navy-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 hover:border-primary-300 dark:hover:border-primary-700 transition-all hover-lift <?= $i === 2 ? 'ring-2 ring-primary-500' : '' ?>">
                <?php if ($i === 2): ?><span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-primary-600 text-white text-xs font-medium rounded-full">Popular</span><?php endif; ?>
                <h3 class="font-bold text-lg mb-1"><?= htmlspecialchars($pkg['name']) ?></h3>
                <div class="text-primary-600 font-bold text-3xl mb-1">KES <?= number_format($pkg['price']) ?></div>
                <div class="text-sm text-gray-500 mb-4">/month</div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">⚡ <?= htmlspecialchars($pkg['speed']) ?></div>
                <ul class="space-y-2 mb-6">
                    <?php foreach (explode(',', $pkg['features'] ?? '') as $feature): ?>
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <svg class="w-4 h-4 text-primary-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <?= trim($feature) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($pkg['installation_fee'] > 0): ?>
                <p class="text-xs text-gray-500 mb-4">Installation: KES <?= number_format($pkg['installation_fee']) ?></p>
                <?php else: ?>
                <p class="text-xs text-primary-600 font-medium mb-4">✓ Free Installation</p>
                <?php endif; ?>
                <a href="/contact" class="block text-center py-2.5 rounded-lg font-medium text-sm <?= $i === 2 ? 'bg-primary-600 text-white hover:bg-primary-700' : 'border border-primary-600 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20' ?> transition-colors">
                    Get Started
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-8">
            <a href="/packages" class="text-primary-600 hover:text-primary-700 font-medium">View All Packages →</a>
        </div>
    </div>
</section>

<!-- Coverage Section -->
<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Coverage Areas</h2>
                <p class="text-gray-500 dark:text-gray-400 mb-8">We're rapidly expanding our network across Kenya. Check if your area is covered.</p>
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <?php foreach ($coverageAreas as $area): ?>
                    <div class="flex items-center space-x-2 p-3 rounded-lg bg-gray-50 dark:bg-navy-800">
                        <span class="w-2 h-2 rounded-full <?= $area['status'] === 'active' ? 'bg-green-500' : 'bg-yellow-500' ?>"></span>
                        <span class="text-sm font-medium"><?= htmlspecialchars($area['name']) ?></span>
                        <?php if ($area['fiber_available']): ?><span class="text-xs bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 px-1.5 py-0.5 rounded">Fiber</span><?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="/coverage" class="inline-flex items-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                    Check Your Coverage
                </a>
            </div>
            <!-- Coverage Checker -->
            <div class="bg-gray-50 dark:bg-navy-800 rounded-2xl p-8" x-data="{ result: null, loading: false }">
                <h3 class="text-xl font-bold mb-6">Check Coverage</h3>
                <form @submit.prevent="
                    loading = true;
                    fetch('/coverage/check', { method: 'POST', headers: {'Content-Type':'application/x-www-form-urlencoded'}, body: new URLSearchParams(Object.fromEntries(new FormData($el))) })
                    .then(r => r.json()).then(d => { result = d; loading = false; })
                ">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Area / Town</label>
                            <input type="text" name="area" required class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition" placeholder="e.g. Ruiru, Thika">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Estate / Building</label>
                            <input type="text" name="estate" required class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition" placeholder="e.g. Membley Estate">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-900 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition" placeholder="0700 000 000">
                        </div>
                        <button type="submit" :disabled="loading" class="w-full py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors disabled:opacity-50">
                            <span x-show="!loading">Check Availability</span>
                            <span x-show="loading">Checking...</span>
                        </button>
                    </div>
                </form>
                <div x-show="result" x-transition class="mt-4 p-4 rounded-lg" :class="result?.covered ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400' : 'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400'">
                    <p x-show="result?.covered" class="font-medium">✓ Great news! We have coverage in your area. Our team will contact you shortly.</p>
                    <p x-show="!result?.covered" class="font-medium">⏳ Your area is coming soon! We've noted your interest and will notify you when available.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-gray-50 dark:bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">What Our Clients Say</h2>
            <p class="text-gray-500 dark:text-gray-400">Trusted by thousands of homes and businesses across Kenya.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($testimonials as $t): ?>
            <div class="bg-white dark:bg-navy-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 hover-lift">
                <div class="flex text-yellow-400 mb-3">
                    <?php for ($i = 0; $i < ($t['rating'] ?? 5); $i++): ?>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <?php endfor; ?>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">"<?= htmlspecialchars($t['content']) ?>"</p>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full gradient-primary flex items-center justify-center text-white font-bold text-sm">
                        <?= strtoupper(substr($t['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <div class="text-sm font-semibold"><?= htmlspecialchars($t['name']) ?></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($t['role'] ?? '') ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Frequently Asked Questions</h2>
        </div>
        <div class="space-y-4" x-data="{ open: null }">
            <?php foreach ($faqs as $i => $faq): ?>
            <div class="border border-gray-100 dark:border-gray-800 rounded-xl overflow-hidden">
                <button @click="open = open === <?= $i ?> ? null : <?= $i ?>" class="w-full flex justify-between items-center p-5 text-left font-medium hover:bg-gray-50 dark:hover:bg-navy-800 transition-colors">
                    <span><?= htmlspecialchars($faq['question']) ?></span>
                    <svg class="w-5 h-5 transition-transform" :class="{ 'rotate-180': open === <?= $i ?> }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === <?= $i ?>" x-collapse class="px-5 pb-5 text-sm text-gray-600 dark:text-gray-400">
                    <?= htmlspecialchars($faq['answer']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/cta-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-primary-700/85"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Ready to Get Connected?</h2>
        <p class="text-green-100 mb-8 text-lg">Join thousands of satisfied customers enjoying fast, reliable internet.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/contact" class="px-8 py-3 bg-white text-primary-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                Get Started Today
            </a>
            <a href="https://wa.me/254724177790?text=Hi%20IKO%20OPTIC%2C%20I%27m%20interested%20in%20your%20internet%20packages.%20Please%20share%20more%20details." target="_blank" class="px-8 py-3 bg-white/10 text-white font-semibold rounded-lg border border-white/30 hover:bg-white/20 transition-colors">
                WhatsApp Us
            </a>
        </div>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
