<?php 
require_once __DIR__ . '/../core/database.php';

class Booking{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    //fetch all bookings
    public function all(){
        $sql = "SELECT * FROM bookings ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //create new booking
    public function create($name, $reg_details, $service_date, $service_time, $message){
        $sql = "INSERT INTO bookings (name, reg_details, service_date, service_time, message)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $reg_details, $service_date, $service_time, $message);
        return $stmt->execute();
    }

    //fin booking by ID
    public function find($id){
        $sql = "SELECT * FROM bookings WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //update booking table
    public function update($id, $name, $reg_details, $service_date, $service_time, $message){
        $sql = "UPDATE bookings
            SET name = ?, reg_details = ?, service_date = ?, service_time = ?, message = ?
            WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $reg_details, $service_date, $service_time, $message, $id);
        return $stmt->execute();
    }

    //delete booking
    public function delete($id) {
        $sql = "DELETE from bookings WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}