<?php
require_once "../app/models/Models.php";
class Controller{
    private $model;

    public function __construct() {
        $this->model = new Model();
    }
    public function index() {
        $reservation=$this->model->getReservation();
        require_once '../app/views/dashboard.php';
    }
}