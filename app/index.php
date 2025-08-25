<?php 
// root router
require_once __DIR__ . '/core/database.php';
require_once __DIR__ . '/models/Booking.php';
require_once __DIR__ . '/controllers/BookingController.php';

session_start();

$controllerName = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Handles homepage
if ($controllerName === 'home') {
    require __DIR__ . '/views/index.php';
    exit;
}

// Handle booking controller
if ($controllerName === 'booking') {
    $ctrl = new BookingController();

    switch ($action) {
        case 'index':
            $ctrl->index();
            break;

        case 'create':
            $ctrl->create();
            break;

        case 'store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ctrl->store($_POST);
            } else {
                header("Location: index.php");
                exit;
            }
            break;

        case 'edit':
            if (isset($_GET['id'])) {
                $ctrl->edit($_GET['id']);
            } else {
                header("Location: index.php?controller=booking&action=index");
            }
            break;

        case 'update':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $ctrl->update($_POST['id'], $_POST);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $ctrl->delete($_GET['id']);
            } else {
                header("Location: index.php?controller=booking&action=index");
            }
            break;

        default:
            echo "404 - Action not found.";
            break;
    }
} else {
    echo "404 - Controller not found.";
}
