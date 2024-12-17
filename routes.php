<?php
// routes.php

require_once 'app/controllers/UserController.php';
require_once 'app/controllers/AccomondationController.php';
require_once 'app/controllers/ActivitiesController.php';
require_once 'app/controllers/ReservationController.php';

$user_controller = new UserController();
$accomondation_controller = new AccomondationController();
$activities_controller = new ActivitiesController();
$reservation_controller = new ReservationController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/user/index' || $url == '/') { //users
    $user_controller->index();
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
    $id = $matches[1];
    $user_controller->delete($id);
} elseif($url == '/activites/index'){ //activites
    $activities_controller->index();
}  elseif ($url == '/activities/create' && $requestMethod == 'GET') {
    $activities_controller->create();
} elseif ($url == '/activities/store' && $requestMethod == 'POST') {
    $activities_controller->store();
} elseif (preg_match('/\/activities\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $activities_controller->edit($id);
} elseif (preg_match('/\/activities\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $activities_controller->update($id, $_POST);
} elseif (preg_match('/\/activities\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $activities_controller->delete($id);
} elseif($url == '/accommodations/index'){ //accommodations
    $accommondations_controller->index();
}  elseif ($url == '/accommodations/create' && $requestMethod == 'GET') {
    $accommondations_controller->create();
} elseif ($url == '/accommodations/store' && $requestMethod == 'POST') {
    $accommondations_controller->store();
} elseif (preg_match('/\/accommodations\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommondations_controller->edit($id);
} elseif (preg_match('/\/accommodations\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $accommondations_controller->update($id, $_POST);
} elseif (preg_match('/\/accommodations\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommondations_controller->delete($id);
} elseif($url == '/reservation/index'){ //reservation
    $accommondations_controller->index();
    $reservation_controller->index();
}  elseif ($url == '/reservation/create' && $requestMethod == 'GET') {
    $accommondations_controller->create();
    $reservation_controller->create();
} elseif ($url == '/reservation/store' && $requestMethod == 'POST') {
    $accommondations_controller->store();
    $reservation_controller->store();
} elseif (preg_match('/\/reservation\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommondations_controller->edit($id);
    $reservation_controller->edit($id);
} elseif (preg_match('/\/reservation\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $accommondations_controller->update($id, $_POST);
} elseif (preg_match('/\/accommondations\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $reservation_controller->update($id, $_POST);
} elseif (preg_match('/\/resrvation\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommondations_controller->delete($id);
    $reservation_controller->delete($id);
}else {
    http_response_code(404);
    echo "404 Not Found";
}