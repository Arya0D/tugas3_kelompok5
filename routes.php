<?php
// routes.php

require_once 'app/controllers/UserController.php';

$controller = new UserController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/user/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $user_controller->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $user_controller->store();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $user_controller->edit($id);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $user_controller->update($id, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->delete($userId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}