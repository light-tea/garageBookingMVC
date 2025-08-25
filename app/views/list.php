<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <title> All booking lists</title>
    <link rel="stylesheet" href="/gba/app/views/public/css/style.css">
</head>

<body>
    <!-- nav bar -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.php" style="text-decoration: none; color: inherit;"> Light Garage </a>
        </div>
        <ul class="nav-links">
            <li> <a href="index.php"> Book Now </a> </li>
            <li> <a href="list.php"> All Bookings </a></li>
            <li> <a href="#"> About Us </a></li>
        </ul> 
    </nav>

    <h1> All Current Booking List </h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Car Reg</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message </th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?php echo $booking['id']; ?> </td>
            <td><?php echo $booking['name']; ?> </td>
            <td><?php echo $booking['reg_details']; ?> </td>
            <td><?php echo $booking['service_date']; ?> </td>
            <td><?php echo $booking['service_time']; ?> </td>
            <td><?php echo $booking['message']; ?> </td>
            <td>
                <a href="index.php?controller=booking&action=edit&id=<?php echo $booking['id']; ?>"> Edit </a>
                <a href="index.php?controller=booking&action=delete&id=<?php echo $booking['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?')"> Delete</a> 
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr> <td colspan="7"> No bookings found </td></tr>
        <?php endif; ?>
    </table>

    <p> <a href="index.php"> Back to Home </a> </p>
</body>
</html>
