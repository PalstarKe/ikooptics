<?php

use App\Controllers\{HomeController, AuthController, AdminController};

/** @var \App\Core\Router $router */

// Public Routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);
$router->get('/services', [HomeController::class, 'services']);
$router->get('/packages', [HomeController::class, 'packages']);
$router->get('/coverage', [HomeController::class, 'coverage']);
$router->post('/coverage/check', [HomeController::class, 'checkCoverage']);
$router->get('/contact', [HomeController::class, 'contact']);
$router->post('/request', [HomeController::class, 'submitRequest']);
$router->get('/blog', [HomeController::class, 'blog']);
$router->get('/blog/{slug}', [HomeController::class, 'blogPost']);

// Auth Routes
$router->get('/admin/login', [AuthController::class, 'loginForm']);
$router->post('/admin/login', [AuthController::class, 'login']);
$router->get('/admin/logout', [AuthController::class, 'logout']);

// Admin Routes
$router->get('/admin', [AdminController::class, 'dashboard'], ['AuthMiddleware']);
$router->get('/admin/coverage', [AdminController::class, 'coverage'], ['AuthMiddleware']);
$router->get('/admin/coverage/create', [AdminController::class, 'coverageCreate'], ['AuthMiddleware']);
$router->post('/admin/coverage/store', [AdminController::class, 'coverageStore'], ['AuthMiddleware']);
$router->get('/admin/coverage/{id}/edit', [AdminController::class, 'coverageEdit'], ['AuthMiddleware']);
$router->post('/admin/coverage/{id}/update', [AdminController::class, 'coverageUpdate'], ['AuthMiddleware']);
$router->get('/admin/coverage/{id}/delete', [AdminController::class, 'coverageDelete'], ['AuthMiddleware']);

$router->get('/admin/packages', [AdminController::class, 'packages'], ['AuthMiddleware']);
$router->get('/admin/packages/create', [AdminController::class, 'packageCreate'], ['AuthMiddleware']);
$router->post('/admin/packages/store', [AdminController::class, 'packageStore'], ['AuthMiddleware']);
$router->get('/admin/packages/{id}/edit', [AdminController::class, 'packageEdit'], ['AuthMiddleware']);
$router->post('/admin/packages/{id}/update', [AdminController::class, 'packageUpdate'], ['AuthMiddleware']);
$router->get('/admin/packages/{id}/delete', [AdminController::class, 'packageDelete'], ['AuthMiddleware']);

$router->get('/admin/requests', [AdminController::class, 'requests'], ['AuthMiddleware']);
$router->get('/admin/requests/{id}', [AdminController::class, 'requestView'], ['AuthMiddleware']);
$router->post('/admin/requests/{id}/update', [AdminController::class, 'requestUpdate'], ['AuthMiddleware']);

$router->get('/admin/blog', [AdminController::class, 'blog'], ['AuthMiddleware']);
$router->get('/admin/blog/create', [AdminController::class, 'blogCreate'], ['AuthMiddleware']);
$router->post('/admin/blog/store', [AdminController::class, 'blogStore'], ['AuthMiddleware']);
$router->get('/admin/blog/{id}/edit', [AdminController::class, 'blogEdit'], ['AuthMiddleware']);
$router->post('/admin/blog/{id}/update', [AdminController::class, 'blogUpdate'], ['AuthMiddleware']);
$router->get('/admin/blog/{id}/delete', [AdminController::class, 'blogDelete'], ['AuthMiddleware']);

$router->get('/admin/users', [AdminController::class, 'users'], ['AuthMiddleware']);
$router->get('/admin/users/create', [AdminController::class, 'userCreate'], ['AuthMiddleware']);
$router->post('/admin/users/store', [AdminController::class, 'userStore'], ['AuthMiddleware']);
$router->get('/admin/users/{id}/edit', [AdminController::class, 'userEdit'], ['AuthMiddleware']);
$router->post('/admin/users/{id}/update', [AdminController::class, 'userUpdate'], ['AuthMiddleware']);
$router->get('/admin/users/{id}/delete', [AdminController::class, 'userDelete'], ['AuthMiddleware']);

$router->get('/admin/settings', [AdminController::class, 'settings'], ['AuthMiddleware']);
$router->post('/admin/settings', [AdminController::class, 'settingsUpdate'], ['AuthMiddleware']);

$router->get('/admin/media', [AdminController::class, 'media'], ['AuthMiddleware']);
$router->post('/admin/media/upload', [AdminController::class, 'mediaUpload'], ['AuthMiddleware']);
$router->post('/admin/media/delete', [AdminController::class, 'mediaDelete'], ['AuthMiddleware']);
