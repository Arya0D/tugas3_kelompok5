<?php
require_once '../config/database.php';
class Model{
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getTableRow($table){
        $query = $this->db->query("SELECT * FROM $table");
        return $query->rowCount();
    }

    public function getReservation(){
        $query = $this->db->query("SELECT * FROM reservations join users on reservations.id_user = users.id_user join accommodations on reservations.id_penginapan = accommodations.id_penginapan where status_pembayaran = 1 and tanggal_reservasi between    DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) -- Senin minggu ini
    AND DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY) order by tanggal_reservasi");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}