<?php
// app/controllers/UserController.php
require_once '../app/models/Reservation.php';

class ReservationController {
    private $reservationModel;

    public function __construct() {
        $this->reservationModel = new Reservation();
    }

    public function index() {
        $reservation = $this->reservationModel->getAllReservation();
        $user = $this->reservationModel->getAlluser();
        require_once '../app/views/reservation/reservation.php';

    }

    public function create() {
        $accommadation = $this->reservationModel->getAllAccommodations();
        $user = $this->reservationModel->getAlluser();
        require_once '../app/views/reservation/create.php';
    }

    public function store() {
        $tanggal = $_POST['tanggal'];
        $penginapan = $_POST['penginapan'];
        $user=$_POST['user'];
        if($_POST['status_pembayaran'] === "true"){
            $status=1;
        }else{
            $status=0;
        }
        $this->reservationModel->add($tanggal, $status, $user, $penginapan);
        header('Location: /reservation/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $reservation = $this->reservationModel->find($id); // Assume find() gets user by ID
        $accommadation = $this->reservationModel->getAllAccommodations();
        $user = $this->reservationModel->getAlluser();
        require_once __DIR__ . '/../views/reservation/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->userModel->update($id, $data);
        if ($updated) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->userModel->delete($id);
        if ($deleted) {
            header("Location: /reservation/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
            
        }
    }
}
