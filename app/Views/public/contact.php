<?php $pageTitle = 'Contact Us - IKO OPTIC LTD'; $csrf = $_SESSION['csrf_token'] ?? ''; require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="/assets/images/contact-bg.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-navy-900/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Contact Us</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">Get in touch with our team. We're here to help you get connected.</p>
    </div>
</section>

<section class="py-20 bg-white dark:bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div x-data="{ submitted: false, loading: false }">
                <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
                <form x-show="!submitted" @submit.prevent="
                    loading = true;
                    fetch('/request', { method: 'POST', headers: {'Content-Type':'application/x-www-form-urlencoded'}, body: new URLSearchParams(Object.fromEntries(new FormData($el))) })
                    .then(r => r.json()).then(d => { if(d.success) submitted = true; loading = false; })
                " class="space-y-4">
                    <input type="hidden" name="_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? bin2hex(random_bytes(32))) ?>">
                    <?php if(empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Full Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Location</label>
                        <input type="text" name="location" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none" placeholder="Area, Estate">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Service Needed</label>
                        <select name="service_needed" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none">
                            <option value="">Select a service</option>
                            <option>Home Fiber Internet</option>
                            <option>Business Fiber</option>
                            <option>Wireless Internet</option>
                            <option>Dedicated Internet</option>
                            <option>CCTV Solutions</option>
                            <option>Network Installation</option>
                            <option>Enterprise Solutions</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Message</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-navy-800 focus:ring-2 focus:ring-primary-500 outline-none resize-none"></textarea>
                    </div>
                    <button type="submit" :disabled="loading" class="w-full py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors disabled:opacity-50">
                        <span x-text="loading ? 'Sending...' : 'Submit Request'"></span>
                    </button>
                </form>
                <div x-show="submitted" x-transition class="p-8 text-center bg-green-50 dark:bg-green-900/20 rounded-2xl">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-2">Request Submitted!</h3>
                    <p class="text-green-600 dark:text-green-500">Our team will contact you within 24 hours.</p>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold mb-6">Get In Touch</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 dark:bg-navy-800">
                            <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold">Phone</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">0724 177 790 / 0725 077 880 / 0723 276 013</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 dark:bg-navy-800">
                            <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">info@ikooptic.co.ke</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 dark:bg-navy-800">
                            <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold">Office</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nairobi, Kenya</p>
                            </div>
                        </div>
                        <a href="https://wa.me/254724177790?text=Hi%20IKO%20OPTIC%2C%20I%27d%20like%20to%20inquire%20about%20your%20internet%20services%20in%20my%20area." target="_blank" class="flex items-center space-x-4 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-green-500 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-green-700 dark:text-green-400">WhatsApp</h4>
                                <p class="text-sm text-green-600 dark:text-green-500">Chat with us instantly</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Map -->
                <div class="rounded-2xl overflow-hidden h-64">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.35853743783!2d36.68258!3d-1.3028618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi%2C%20Kenya!5e0!3m2!1sen!2s!4v1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
