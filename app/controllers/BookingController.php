<?php
require_once __DIR__ . '/../models/Booking.php';

class BookingController {
    private $bookingModel;

    public function __construct() {
        $this->bookingModel = new Booking();
    }

    // Handle new booking submission
    public function store($data) {
        $result = $this->bookingModel->create(
            $data['name'],            
            $data['reg_details'],    
            $data['service_date'], 
            $data['service_time'], 
            $data['message']
        );

        if ($result) {
            $_SESSION ['flash'] = ['type' => 'success', 'message' => 'Booking created successfully!'];            
            header("Location: index.php");
            exit;
        } else {
            $_SESSION ['flash'] = ['type' => 'error', 'message' => 'Failed to book!'];
            header("Location: index.php");
            exit;
        }
    }

    // Show all bookings
    public function index() {
        $bookings = $this->bookingModel->all();
        require __DIR__ . '/../views/list.php';
    }

    // Show edit form
    public function edit($id) {
        $booking = $this->bookingModel->find($id);
        require __DIR__ . '/../views/booking/edit.php';
    }

    // Update booking
    public function update($id, $data) {
        $result = $this->bookingModel->update(
            $id, 
            $data['name'], 
            $data['reg_details'], 
            $data['service_date'], 
            $data['service_time'], 
            $data['message']
        );

        if ($result) {
            $_SESSION ['flash'] = ['type' => 'success', 'message' => 'Booking update successful!'];
        } else {
            $_SESSION ['flash'] = ['type' => 'error', 'message' => 'Failed to update booking!'];
        }
        header("Location: index.php?controller=booking&action=index");
        exit;
    }

    // Delete booking
    public function delete($id) {
        $this->bookingModel->delete($id);
        $_SESSION['success_message'] = "Booking deleted!";
        header("Location: index.php?controller=booking&action=index");
        exit;
    }
}
