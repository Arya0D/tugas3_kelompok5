<?php
// app/controllers/UserController.php
require_once '../app/models/activities.php';

class ActivitiesController {
    private $userModel;

    public function __construct() {
        $this->activitiesModel = new Activities();
    }

    public function index() {
        $activities = $this->activitiesModel->getAllActivities();
        require_once '../app/views/activities/index.php';

    }

    public function create() {
        require_once '../app/views/activities/create.php';
    }

    public function store() {
        $nama_aktivitas = $_POST['nama_aktivitas'];
        $deskripsi = $_POST['deskripsi'];
        $lokasi_aktivitas = $_POST['lokasi_aktivitas'];
        $harga_aktivitas = $_POST['harga_aktivitas'];
        $this->activitiesModel->add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas);
        header('Location: /activities/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $activities = $this->activitiesModel->find($id); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/activities/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->activitiesModel->update($id, $data);
        if ($updated) {
            header("Location: /activities/index"); // Redirect to user list
        } else {
            echo "Failed to update activities.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->activitiesModel->delete($id);
        if ($deleted) {
            header("Location: /activities/index"); // Redirect to user list
        } else {
            echo "Failed to delete activities.";
        }
    }
}
