<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\TaskController;
use App\Controllers\AuthController;

$routes->get('/', [TaskController::class, 'index']);
$routes->get('tasks', [TaskController::class, 'allTasks']);
$routes->get('profile', [TaskController::class, 'profile']);
$routes->get('about', [TaskController::class, 'about']);

$routes->get('login', [AuthController::class, 'login']);
$routes->post('login', [AuthController::class, 'attemptLogin']);
$routes->get('logout', [AuthController::class, 'logout']);

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('tasks/new', [TaskController::class, 'new']);
    $routes->post('tasks/create', [TaskController::class, 'create']);
    $routes->get('tasks/edit/(:num)', [TaskController::class, 'edit/$1']);
    $routes->post('tasks/update/(:num)', [TaskController::class, 'update/$1']);
    $routes->get('tasks/delete/(:num)', [TaskController::class, 'delete/$1']);
});