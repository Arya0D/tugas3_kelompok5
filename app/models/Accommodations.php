<?php
// app/models/Accommodation.php
require_once '../config/database.php';

class Accommodations {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllAccommodations() {
        $query = $this->db->query("SELECT * FROM accommodations join activities on accommodations.id_aktivitas = activities.id_aktivitas");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllActivities() {
        $query = $this->db->query("SELECT * FROM activities");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM accommodations  join activities on accommodations.id_aktivitas = activities.id_aktivitas WHERE id_penginapan = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_penginapan, $lokasi_penginapan, $fasilitas, $harga_penginapan, $id_aktivitas) {
        $query = $this->db->prepare("INSERT INTO accommodations (nama_penginapan, lokasi_penginapan, fasilitas, harga_penginapan, id_aktivitas) VALUES (:nama_penginapan, :lokasi_penginapan, :fasilitas, :harga_penginapan, :id_aktivitas)" );
        $query->bindParam(':nama_penginapan', $nama_penginapan);
        $query->bindParam(':lokasi_penginapan', $lokasi_penginapan);
        $query->bindParam(':fasilitas', $fasilitas);
        $query->bindParam(':harga_penginapan', $harga_penginapan);
        $query->bindParam(':id_aktivitas', $id_aktivitas);
        
        return $query->execute();
    }

    // Update Accommodation data by ID
    public function update($id, $data) {
        $query = "UPDATE accommodations SET nama_penginapan = :nama_penginapan, lokasi_penginapan = :lokasi_penginapan, fasilitas = :fasilitas, harga_penginapan = :harga_penginapan, id_aktivitas = :id_aktivitas WHERE id_penginapan = :id_penginapan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_penginapan', $data['nama_penginapan']);
        $stmt->bindParam(':lokasi_penginapan', $data['lokasi_penginapan']);
        $stmt->bindParam(':fasilitas', $data['fasilitas']);
        $stmt->bindParam(':harga_penginapan', $data['harga_penginapan']);
        $stmt->bindParam(':id_aktivitas', $data['aktivitas']);
        $stmt->bindParam(':id_penginapan', $id);
        return $stmt->execute();
    }

    // Delete Accommodation by ID
    public function delete($id) {
        $query = "DELETE FROM accommodations WHERE id_penginapan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}