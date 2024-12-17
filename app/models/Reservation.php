<?php
// app/models/User.php
require_once '../config/database.php';

class Reservation {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllReservation() {
        $query = $this->db->query("SELECT * FROM reservations join users on reservations.id_user = users.id_user join accommodations on reservations.id_penginapan = accommodations.id_penginapan");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUser() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAccommodations() {
        $query = $this->db->query("SELECT * FROM accommodations");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM reservations WHERE id_reservasi = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($tanggal, $status_pembayaran, $user,$penginapan) {
        $query = $this->db->prepare("INSERT INTO reservations (tanggal_reservasi, status_pembayaran, id_user, id_penginapan) VALUES (:tanggal, :status, :user,:penginapan)");
        $query->bindParam(':tanggal', $tanggal);
        $query->bindParam(':status', $status_pembayaran);
        $query->bindParam(':user', $user);
        $query->bindParam(':penginapan', $penginapan);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE users SET tanggal = :tanggal_reservasi, status_pembayaran = :status_pembayaran, id_user = :user, id_penginapan=:penginapan WHERE id_reservasi = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':status_pembayaran', $data['status_pembayaran']);
        $stmt->bindParam(':user', $data['user']);
        $stmt->bindParam(':penginapan', $data['penginapan']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM users WHERE id_reservasi = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
