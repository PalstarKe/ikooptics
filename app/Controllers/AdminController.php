<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\{ClientRequest, Coverage, Package, Blog, User, ActivityLog, Notification};

class AdminController extends Controller
{
    public function dashboard(): void
    {
        $stats = [
            'requests' => (new ClientRequest())->count(),
            'new_requests' => (new ClientRequest())->countByStatus('new'),
            'coverage_areas' => (new Coverage())->count(),
            'packages' => (new Package())->count("status = 'active'"),
            'blog_posts' => (new Blog())->count(),
            'users' => (new User())->count(),
        ];
        $recentRequests = (new ClientRequest())->recent(5);
        $recentActivity = (new ActivityLog())->recent(10);
        $notifications = (new Notification())->unread($_SESSION['user_id']);

        $this->view('admin/dashboard', compact('stats', 'recentRequests', 'recentActivity', 'notifications'));
    }

    // Coverage Management
    public function coverage(): void
    {
        $areas = (new Coverage())->all();
        $this->view('admin/coverage/index', compact('areas'));
    }

    public function coverageCreate(): void
    {
        $csrf = $this->generateCsrf();
        $this->view('admin/coverage/create', compact('csrf'));
    }

    public function coverageStore(): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/coverage');

        (new Coverage())->create([
            'name' => htmlspecialchars($_POST['name']),
            'estates' => htmlspecialchars($_POST['estates'] ?? ''),
            'fiber_available' => isset($_POST['fiber_available']) ? 1 : 0,
            'wireless_available' => isset($_POST['wireless_available']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'active',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        (new ActivityLog())->log($_SESSION['user_id'], 'coverage_create', "Added coverage: {$_POST['name']}");
        $this->redirect('/admin/coverage');
    }

    public function coverageEdit(string $id): void
    {
        $area = (new Coverage())->find((int)$id);
        $csrf = $this->generateCsrf();
        $this->view('admin/coverage/edit', compact('area', 'csrf'));
    }

    public function coverageUpdate(string $id): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/coverage');

        (new Coverage())->update((int)$id, [
            'name' => htmlspecialchars($_POST['name']),
            'estates' => htmlspecialchars($_POST['estates'] ?? ''),
            'fiber_available' => isset($_POST['fiber_available']) ? 1 : 0,
            'wireless_available' => isset($_POST['wireless_available']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'active',
        ]);

        (new ActivityLog())->log($_SESSION['user_id'], 'coverage_update', "Updated coverage ID: {$id}");
        $this->redirect('/admin/coverage');
    }

    public function coverageDelete(string $id): void
    {
        (new Coverage())->delete((int)$id);
        (new ActivityLog())->log($_SESSION['user_id'], 'coverage_delete', "Deleted coverage ID: {$id}");
        $this->redirect('/admin/coverage');
    }

    // Package Management
    public function packages(): void
    {
        $packages = (new Package())->all();
        $this->view('admin/packages/index', compact('packages'));
    }

    public function packageCreate(): void
    {
        $csrf = $this->generateCsrf();
        $this->view('admin/packages/create', compact('csrf'));
    }

    public function packageStore(): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/packages');

        (new Package())->create([
            'name' => htmlspecialchars($_POST['name']),
            'speed' => htmlspecialchars($_POST['speed']),
            'price' => (float)$_POST['price'],
            'features' => htmlspecialchars($_POST['features'] ?? ''),
            'installation_fee' => (float)($_POST['installation_fee'] ?? 0),
            'description' => htmlspecialchars($_POST['description'] ?? ''),
            'status' => $_POST['status'] ?? 'active',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->redirect('/admin/packages');
    }

    public function packageEdit(string $id): void
    {
        $package = (new Package())->find((int)$id);
        $csrf = $this->generateCsrf();
        $this->view('admin/packages/edit', compact('package', 'csrf'));
    }

    public function packageUpdate(string $id): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/packages');

        (new Package())->update((int)$id, [
            'name' => htmlspecialchars($_POST['name']),
            'speed' => htmlspecialchars($_POST['speed']),
            'price' => (float)$_POST['price'],
            'features' => htmlspecialchars($_POST['features'] ?? ''),
            'installation_fee' => (float)($_POST['installation_fee'] ?? 0),
            'description' => htmlspecialchars($_POST['description'] ?? ''),
            'status' => $_POST['status'] ?? 'active',
        ]);

        $this->redirect('/admin/packages');
    }

    public function packageDelete(string $id): void
    {
        (new Package())->delete((int)$id);
        $this->redirect('/admin/packages');
    }

    // Client Requests
    public function requests(): void
    {
        $page = (int)($_GET['page'] ?? 1);
        $result = (new ClientRequest())->paginate($page);
        $this->view('admin/requests/index', $result);
    }

    public function requestView(string $id): void
    {
        $request = (new ClientRequest())->find((int)$id);
        $csrf = $this->generateCsrf();
        $this->view('admin/requests/view', compact('request', 'csrf'));
    }

    public function requestUpdate(string $id): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/requests');

        (new ClientRequest())->update((int)$id, [
            'status' => $_POST['status'],
            'assigned_to' => (int)($_POST['assigned_to'] ?? 0),
            'notes' => htmlspecialchars($_POST['notes'] ?? ''),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        (new ActivityLog())->log($_SESSION['user_id'], 'request_update', "Updated request ID: {$id}");
        $this->redirect('/admin/requests/' . $id);
    }

    // Blog Management
    public function blog(): void
    {
        $posts = (new Blog())->all();
        $this->view('admin/blog/index', compact('posts'));
    }

    public function blogCreate(): void
    {
        $csrf = $this->generateCsrf();
        $this->view('admin/blog/create', compact('csrf'));
    }

    public function blogStore(): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/blog');

        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $image = $this->uploadFile($_FILES['image']);
        }

        (new Blog())->create([
            'title' => htmlspecialchars($_POST['title']),
            'slug' => $this->slugify($_POST['title']),
            'content' => $_POST['content'],
            'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''),
            'image' => $image,
            'category' => htmlspecialchars($_POST['category'] ?? ''),
            'meta_title' => htmlspecialchars($_POST['meta_title'] ?? ''),
            'meta_description' => htmlspecialchars($_POST['meta_description'] ?? ''),
            'status' => $_POST['status'] ?? 'draft',
            'author_id' => $_SESSION['user_id'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->redirect('/admin/blog');
    }

    public function blogEdit(string $id): void
    {
        $post = (new Blog())->find((int)$id);
        $csrf = $this->generateCsrf();
        $this->view('admin/blog/edit', compact('post', 'csrf'));
    }

    public function blogUpdate(string $id): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/blog');

        $data = [
            'title' => htmlspecialchars($_POST['title']),
            'slug' => $this->slugify($_POST['title']),
            'content' => $_POST['content'],
            'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''),
            'category' => htmlspecialchars($_POST['category'] ?? ''),
            'meta_title' => htmlspecialchars($_POST['meta_title'] ?? ''),
            'meta_description' => htmlspecialchars($_POST['meta_description'] ?? ''),
            'status' => $_POST['status'] ?? 'draft',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($_FILES['image']['name'])) {
            $data['image'] = $this->uploadFile($_FILES['image']);
        }

        (new Blog())->update((int)$id, $data);
        $this->redirect('/admin/blog');
    }

    public function blogDelete(string $id): void
    {
        (new Blog())->delete((int)$id);
        $this->redirect('/admin/blog');
    }

    // Users Management
    public function users(): void
    {
        $users = (new User())->all();
        $this->view('admin/users/index', compact('users'));
    }

    public function userCreate(): void
    {
        $csrf = $this->generateCsrf();
        $this->view('admin/users/create', compact('csrf'));
    }

    public function userStore(): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/users');

        (new User())->create([
            'name' => htmlspecialchars($_POST['name']),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'role' => $_POST['role'] ?? 'support',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->redirect('/admin/users');
    }

    public function userEdit(string $id): void
    {
        $user = (new User())->find((int)$id);
        $csrf = $this->generateCsrf();
        $this->view('admin/users/edit', compact('user', 'csrf'));
    }

    public function userUpdate(string $id): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/users');

        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'role' => $_POST['role'] ?? 'support',
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        (new User())->update((int)$id, $data);
        $this->redirect('/admin/users');
    }

    public function userDelete(string $id): void
    {
        (new User())->delete((int)$id);
        $this->redirect('/admin/users');
    }

    // Settings
    public function settings(): void
    {
        $settings = (new \App\Models\Setting())->all('id ASC');
        $csrf = $this->generateCsrf();
        $this->view('admin/settings', compact('settings', 'csrf'));
    }

    public function settingsUpdate(): void
    {
        if (!$this->validateCsrf()) $this->redirect('/admin/settings');

        $settingModel = new \App\Models\Setting();
        foreach ($_POST['settings'] ?? [] as $key => $value) {
            $settingModel->set($key, $value);
        }

        $this->redirect('/admin/settings');
    }

    // Media
    public function media(): void
    {
        $files = glob(BASE_PATH . '/public/assets/uploads/*');
        $media = array_map(fn($f) => [
            'name' => basename($f),
            'path' => '/assets/uploads/' . basename($f),
            'size' => filesize($f),
            'date' => date('Y-m-d', filemtime($f)),
        ], $files);
        $csrf = $this->generateCsrf();
        $this->view('admin/media', compact('media', 'csrf'));
    }

    public function mediaUpload(): void
    {
        if (!empty($_FILES['file']['name'])) {
            $this->uploadFile($_FILES['file']);
        }
        $this->redirect('/admin/media');
    }

    public function mediaDelete(): void
    {
        $file = BASE_PATH . '/public/assets/uploads/' . basename($_POST['file'] ?? '');
        if (file_exists($file)) unlink($file);
        $this->redirect('/admin/media');
    }

    private function uploadFile(array $file): string
    {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf'];
        if (!in_array($ext, $allowed)) return '';

        $filename = uniqid() . '.' . $ext;
        $dest = BASE_PATH . '/public/assets/uploads/' . $filename;
        move_uploaded_file($file['tmp_name'], $dest);
        return '/assets/uploads/' . $filename;
    }

    private function slugify(string $text): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
    }
}
