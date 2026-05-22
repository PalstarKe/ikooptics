<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - IKO OPTIC LTD</title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: { 500:'#16A34A', 600:'#15803D', 700:'#166534' }, navy: { 800:'#1e293b', 900:'#0f172a' } } } } }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>* { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-navy-900 flex items-center justify-center p-4">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8">
            <div class="text-center mb-8">
                <img src="/assets/images/logo.png" alt="IKO OPTIC" class="h-16 w-auto mx-auto mb-4">
                <h1 class="text-2xl font-bold text-white">IKO OPTIC Admin</h1>
                <p class="text-gray-400 text-sm mt-1">Sign in to your dashboard</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
            <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm text-center">
                Invalid email or password. Please try again.
            </div>
            <?php endif; ?>

            <form method="POST" action="/admin/login" class="space-y-4">
                <input type="hidden" name="_token" value="<?= htmlspecialchars($csrf) ?>">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" required autofocus class="w-full px-4 py-3 rounded-lg bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition" placeholder="admin@ikooptic.co.ke">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition" placeholder="••••••••">
                </div>
                <button type="submit" class="w-full py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                    Sign In
                </button>
            </form>

            <p class="text-center text-xs text-gray-500 mt-6">Default: admin@ikooptic.co.ke / password</p>
        </div>
    </div>
</body>
</html>
