<?php
namespace App\Middleware;

class AuthMiddleware
{
    public function handle(): bool
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: /admin/login');
            exit;
        }
        return true;
    }
}
