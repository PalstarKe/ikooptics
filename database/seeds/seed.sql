-- IKO OPTIC LTD Seed Data
USE ikooptic;

-- Default Admin User (password: admin123)
INSERT INTO users (name, email, password, role, created_at) VALUES
('Super Admin', 'admin@ikooptic.co.ke', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW()),
('Content Manager', 'content@ikooptic.co.ke', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'content_manager', NOW()),
('Support Staff', 'support@ikooptic.co.ke', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'support', NOW());

-- Coverage Areas
INSERT INTO coverage_areas (name, estates, fiber_available, wireless_available, status) VALUES
('Nairobi CBD', 'Westlands, Kilimani, Lavington, Kileleshwa, Upper Hill', 1, 1, 'active'),
('Kiambu', 'Thindigua, Ruaka, Two Rivers, Rosslyn, Runda', 1, 1, 'active'),
('Thika', 'Thika Town, Makongeni, Landless, Section 9', 1, 1, 'active'),
('Ruiru', 'Membley, Kimbo, Bypass, Eastern Bypass', 1, 1, 'active'),
('Juja', 'Juja Town, Kenyatta Road, Theta, Witeithie', 1, 1, 'active'),
('Syokimau', 'Syokimau, Mlolongo, Gateway Mall Area', 1, 0, 'active'),
('Rongai', 'Rongai Town, Rimpa, Nkoroi, Maasai Lodge', 0, 1, 'active'),
('Kitengela', 'Kitengela Town, Acacia, Milimani', 1, 1, 'coming_soon');

-- Service Packages
INSERT INTO service_packages (name, speed, price, features, installation_fee, category, status) VALUES
('Home Basic', '10 Mbps', 1500.00, 'Unlimited Data,Free Router,24/7 Support,1 Device Optimal', 3000.00, 'home', 'active'),
('Home Standard', '20 Mbps', 2500.00, 'Unlimited Data,Free Router,24/7 Support,5 Devices Optimal,Free Installation', 0.00, 'home', 'active'),
('Home Premium', '40 Mbps', 4000.00, 'Unlimited Data,Free Router,24/7 Priority Support,10 Devices Optimal,Free Installation,Static IP', 0.00, 'home', 'active'),
('Home Ultra', '100 Mbps', 7500.00, 'Unlimited Data,Premium Router,24/7 VIP Support,Unlimited Devices,Free Installation,Static IP,Gaming Optimized', 0.00, 'home', 'active'),
('Business Starter', '50 Mbps', 8000.00, 'Unlimited Data,Business Router,Dedicated Support,SLA 99.5%,Static IP', 5000.00, 'business', 'active'),
('Business Pro', '100 Mbps', 15000.00, 'Unlimited Data,Enterprise Router,Dedicated Account Manager,SLA 99.9%,Static IP Block,VPN Support', 0.00, 'business', 'active'),
('Enterprise', '1 Gbps', 50000.00, 'Dedicated Fiber,Enterprise Hardware,24/7 NOC Support,SLA 99.99%,IP Block,MPLS,Redundancy', 0.00, 'enterprise', 'active');

-- FAQs
INSERT INTO faqs (question, answer, sort_order, status) VALUES
('What areas do you cover?', 'We currently cover Nairobi, Kiambu, Thika, Ruiru, Juja, Syokimau, Rongai, and expanding to more areas. Use our coverage checker to confirm availability in your specific location.', 1, 'active'),
('How long does installation take?', 'Standard installation takes 24-48 hours after payment confirmation. For areas with existing infrastructure, same-day installation may be available.', 2, 'active'),
('What happens if my internet goes down?', 'Our 24/7 support team is always available. Most issues are resolved within 2 hours. Business and Enterprise clients have priority SLA guarantees.', 3, 'active'),
('Can I upgrade my package?', 'Yes! You can upgrade your package at any time through our support team or client portal. Upgrades are activated within 24 hours.', 4, 'active'),
('Do you offer static IP addresses?', 'Yes, static IP addresses are included in our Premium, Business, and Enterprise packages. They can also be added to other packages for a small monthly fee.', 5, 'active'),
('What payment methods do you accept?', 'We accept M-Pesa, bank transfers, credit/debit cards, and cheques for corporate clients.', 6, 'active');

-- Testimonials
INSERT INTO testimonials (name, role, content, rating, status) VALUES
('James Mwangi', 'Business Owner, Thika', 'IKO OPTIC has transformed our business operations. The fiber connection is incredibly fast and reliable. Their support team responds within minutes.', 5, 'active'),
('Sarah Wanjiku', 'Resident, Ruiru', 'Finally, reliable internet in our estate! Streaming, working from home, and online classes all work perfectly. Best ISP decision we ever made.', 5, 'active'),
('Peter Ochieng', 'IT Manager, Nairobi', 'We switched our entire office to IKO OPTIC and the difference is night and day. 99.9% uptime as promised. Highly recommended for businesses.', 5, 'active'),
('Grace Njeri', 'Freelancer, Juja', 'As a remote worker, reliable internet is everything. IKO OPTIC delivers consistent speeds even during peak hours. Love the unlimited data!', 4, 'active');

-- Settings
INSERT INTO settings (`key`, value, type, `group`) VALUES
('site_name', 'IKO OPTIC LTD', 'text', 'general'),
('site_tagline', 'Fast. Reliable. Unlimited Internet.', 'text', 'general'),
('site_description', 'Leading Internet Service Provider in Kenya offering Fiber, Wireless, and Enterprise connectivity solutions.', 'textarea', 'general'),
('site_phone', '+254 700 000 000', 'text', 'contact'),
('site_email', 'info@ikooptic.co.ke', 'text', 'contact'),
('site_address', 'Nairobi, Kenya', 'text', 'contact'),
('site_whatsapp', '+254700000000', 'text', 'contact'),
('about_mission', 'To provide fast, reliable, and affordable internet connectivity to homes and businesses across Kenya, bridging the digital divide.', 'textarea', 'about'),
('about_vision', 'To be the leading ISP in East Africa, connecting every home and business with world-class internet infrastructure.', 'textarea', 'about'),
('about_values', 'Reliability,Innovation,Customer First,Integrity,Excellence', 'text', 'about'),
('hero_title', 'Fast. Reliable. Unlimited Internet.', 'text', 'homepage'),
('hero_subtitle', 'Experience blazing-fast fiber and wireless internet connectivity for your home and business. Coverage expanding across Kenya.', 'textarea', 'homepage'),
('stats_uptime', '99.9', 'text', 'homepage'),
('stats_clients', '5000+', 'text', 'homepage'),
('stats_areas', '8+', 'text', 'homepage'),
('stats_support', '24/7', 'text', 'homepage'),
('footer_text', '© 2024 IKO OPTIC LTD. All rights reserved. Licensed ISP Provider.', 'text', 'footer'),
('social_facebook', 'https://facebook.com/ikooptic', 'text', 'social'),
('social_twitter', 'https://twitter.com/ikooptic', 'text', 'social'),
('social_instagram', 'https://instagram.com/ikooptic', 'text', 'social'),
('social_linkedin', 'https://linkedin.com/company/ikooptic', 'text', 'social'),
('meta_title', 'IKO OPTIC LTD - Fast Reliable Internet Service Provider Kenya', 'text', 'seo'),
('meta_description', 'IKO OPTIC LTD provides fast, reliable fiber and wireless internet services across Kenya. Home, Business & Enterprise solutions. Check coverage now!', 'textarea', 'seo');
