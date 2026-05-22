<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\{User, ActivityLog};

class AuthController extends Controller
{
    public function loginForm(): void
    {
        if (!empty($_SESSION['user_id'])) {
            $this->redirect('/admin');
        }
        $csrf = $this->generateCsrf();
        $this->view('auth/login', compact('csrf'));
    }

    public function login(): void
    {
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/login?error=invalid_token');
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        $user = (new User())->authenticate($email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_email'] = $user['email'];

            (new ActivityLog())->log($user['id'], 'login', 'User logged in');
            $this->redirect('/admin');
        } else {
            $this->redirect('/admin/login?error=invalid_credentials');
        }
    }

    public function logout(): void
    {
        if (!empty($_SESSION['user_id'])) {
            (new ActivityLog())->log($_SESSION['user_id'], 'logout', 'User logged out');
        }
        session_destroy();
        $this->redirect('/admin/login');
    }
}
