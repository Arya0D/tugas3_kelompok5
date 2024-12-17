<?php
// app/controllers/AccommodationsController.php
require_once '../app/models/Accommodations.php';

class AccommodationsController {
    private $accommodationsModel;

    public function __construct() {
        $this->accommodationsModel = new Accommodations();
    }

    public function index() {
        $accommodations = $this->accommodationsModel->getAllAccommodations();
        require_once '../app/views/accommodations/index.php';
    }

    public function create() {
        $activities=$this->accommodationsModel->getAllActivities();
        require_once '../app/views/accommodations/create.php';
    }

    public function store() {
        $nama_penginapan = $_POST['nama_penginapan'];
        $lokasi_penginapan = $_POST['lokasi_penginapan'];
        $fasilitas = $_POST['fasilitas'];
        $harga_penginapan = $_POST['harga_penginapan'];
        $id_aktivitas = $_POST['aktivitas'];
        $this->accommodationsModel->add($nama_penginapan, $lokasi_penginapan, $fasilitas, $harga_penginapan, $id_aktivitas);
        header('Location: /accommodations/index');
    }
    // Show the edit form with the accommodations data
    public function edit($id) {
        $accommodations = $this->accommodationsModel->find($id); // Assume find() gets accommodations by ID
        $activities=$this->accommodationsModel->getAllActivities();
        require_once __DIR__ . '/../views/accommodations/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->accommodationsModel->update($id, $data);
        if ($updated) {
            header("Location: /accommodations/index"); // Redirect to accommodations list
        } else {
            echo "Failed to update accommodations.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->accommodationsModel->delete($id);
        if ($deleted) {
            header("Location: /accommodations/index"); // Redirect to accommodations list
        } else {
            echo "Failed to delete accommodations.";
        }
    }
}
