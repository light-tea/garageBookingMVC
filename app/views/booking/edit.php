<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title> Welcome to Light Garage Booking System </title>
        <link rel="stylesheet" href="/gba/app/views/public/css/style.css">

    </head>

    <body>
        <!-- nav bar -->
         <nav class="navbar">
            <div class="logo"> <a href="index.php" style="text-decoration: none; color: inherit;"> Light Garage </a> </div>
            <ul class="nav-links">
                <li> <a href="index.php"> Book Now </a> </li>
                <li> <a href="index.php?controller=booking&action=index"> All Bookings </a></li>
                <li> <a href="#"> About Us </a></li>
            </ul> 
         </nav>
        <h1> Welcome to Light Booking System </h1>

        <section>
            <h2> Edit Booking</h2>
            <?php if($booking): ?>
                <form action="index.php?controller=booking&action=update" method="POST">
                    <input type="hidden" name="id" value="<?php echo $booking ['id']; ?>">

                    <label for="name"> Name: </label> <br>
                    <input type="text" id="name" name="name"  value="<?php echo  htmlspecialchars($booking['name']); ?>" required> <br><br> 
                    
                    <label for="reg_number"> Car Registration Details: </label> <br>
                    <input type="text" id="reg_details" name="reg_details" value="<?php echo htmlspecialchars($booking['reg_details']); ?>" required> <br><br>
                
                    <label for="service_date"> Service Date: </label> <br>
                    <input type="date" id="service_date" name="service_date" value="<?php echo htmlspecialchars($booking['service_date']); ?>" required> <br><br>

                    <label for="service_time"> Service Time: </label> <br>
                    <input type="time" id="service_time" name="service_time" value="<?php echo htmlspecialchars($booking['service_time']); ?>" required> <br> <br>

                    <label for="message"> Message: </label> <br>
                    <input type="text" id="message" name="message" value="<?php echo htmlspecialchars($booking['message']); ?>" required> <br> <br> 
                    <button type="submit">Save Changes</button>
                </form>
                <?php else: ?>
                    <p>Booking not found</p>
                    <?php endif; ?>
        </section>