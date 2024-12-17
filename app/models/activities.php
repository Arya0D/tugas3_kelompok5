<?php
// app/models/User.php
require_once '../config/database.php';

class Activities {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllactivities() {
        $query = $this->db->query("SELECT * FROM activities");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM activities WHERE id_aktivitas = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_aktivitas, $deskripsi, $lokasi_aktivitas, $harga_aktivitas) {
        $query = $this->db->prepare("INSERT INTO activities (nama_aktivitas, deskripsi, lokasi_aktivitas, harga_aktivitas) VALUES (:nama_aktivitas, :deskripsi, :lokasi_aktivitas, :harga_aktivitas)");
        $query->bindParam(':nama_aktivitas', $nama_aktivitas);
        $query->bindParam(':deskripsi', $deskripsi);
        $query->bindParam(':lokasi_aktivitas', $lokasi_aktivitas);
        $query->bindParam(':harga_aktivitas', $harga_aktivitas);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE activities SET nama_aktivitas = :nama_aktivitas, deskripsi = :deskripsi, lokasi_aktivitas = :lokasi_aktivitas, harga_aktivitas = :harga_aktivitas  WHERE id_aktivitas = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_aktivitas', $data['nama_aktivitas']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':lokasi_aktivitas', $data['lokasi_aktivitas']);
        $stmt->bindParam(':harga_aktivitas', $data['harga_aktivitas']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM activities WHERE id_aktivitas = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
