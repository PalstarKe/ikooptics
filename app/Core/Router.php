<?php
namespace App\Core;

class Router
{
    private array $routes = [];
    private array $middleware = [];

    public function get(string $path, array $action, array $middleware = []): void
    {
        $this->addRoute('GET', $path, $action, $middleware);
    }

    public function post(string $path, array $action, array $middleware = []): void
    {
        $this->addRoute('POST', $path, $action, $middleware);
    }

    private function addRoute(string $method, string $path, array $action, array $middleware): void
    {
        $this->routes[] = compact('method', 'path', 'action', 'middleware');
    }

    public function dispatch(string $uri, string $method): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route['path']);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {
                // Run middleware
                foreach ($route['middleware'] as $mw) {
                    $middlewareClass = "App\\Middleware\\{$mw}";
                    if (class_exists($middlewareClass)) {
                        $instance = new $middlewareClass();
                        if (!$instance->handle()) return;
                    }
                }

                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                [$controller, $method] = $route['action'];
                $instance = new $controller();
                call_user_func_array([$instance, $method], $params);
                return;
            }
        }

        http_response_code(404);
        require BASE_PATH . '/app/Views/public/404.php';
    }
}
