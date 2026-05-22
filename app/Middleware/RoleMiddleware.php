<?php
namespace App\Middleware;

class RoleMiddleware
{
    private array $allowedRoles;

    public function __construct(array $roles = ['admin'])
    {
        $this->allowedRoles = $roles;
    }

    public function handle(): bool
    {
        if (!in_array($_SESSION['user_role'] ?? '', $this->allowedRoles)) {
            http_response_code(403);
            echo "Access Denied";
            exit;
        }
        return true;
    }
}
