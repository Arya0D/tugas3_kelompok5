<?php
// routes.php

require_once 'app/controllers/UserController.php';
require_once 'app/controllers/AccommodationsController.php';
require_once 'app/controllers/ActivitiesController.php';
require_once 'app/controllers/ReservationController.php';
require_once 'app/controllers/Controllers.php';


$user_controller = new UserController();
$accommodations_controller = new AccommodationsController();
$activities_controller = new ActivitiesController();
$reservation_controller = new ReservationController();
$controller = new Controller();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/user/index') { //users
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
}elseif($url == '/activities/index'){
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
    $accommodations_controller->index();
}  elseif ($url == '/accommodations/create' && $requestMethod == 'GET') {
    $accommodations_controller->create();
} elseif ($url == '/accommodations/store' && $requestMethod == 'POST') {
    $accommodations_controller->store();
} elseif (preg_match('/\/accommodations\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommodations_controller->edit($id);
} elseif (preg_match('/\/accommodations\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $accommodations_controller->update($id, $_POST);
} elseif (preg_match('/\/accommodations\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $accommodations_controller->delete($id);
} elseif($url == '/reservation/index'){ //reservation
    $reservation_controller->index();
}  elseif ($url == '/reservation/create' && $requestMethod == 'GET') {
    $reservation_controller->create();
} elseif ($url == '/reservation/store' && $requestMethod == 'POST') {
    $reservation_controller->store();
} elseif (preg_match('/\/reservation\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $reservation_controller->edit($id);
} elseif (preg_match('/\/reservation\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $reservation_controller->update($id, $_POST);
} elseif (preg_match('/\/accommondations\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $reservation_controller->update($id, $_POST);
} elseif (preg_match('/\/resrvation\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $reservation_controller->delete($id);
}elseif($url == '/'){ //accommodations
    $controller->index();
} else {
    http_response_code(404);
    echo "404 Not Found";
}