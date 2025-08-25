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
        <?php if (isset($_SESSION['flash'])){ ?>
         <div class="alert <?php echo $_SESSION['flash']['type']; ?>"> 
                <?php echo $_SESSION['flash']['message']; ?>
        </div>
        <?php unset($_SESSION['flash']);
        } ?>

        <!--hero section -->
        <section class="hero">
            <h1> Book your Garage System </h1>
            <p> You can book your garage services in a few clicks </p>

            <form method="POST" action="index.php?controller=booking&action=store" class="booking-form">
            <input type="text" name="name" placeholder="Enter your full name" required>
            <input type="text" name="reg_details" placeholder="Enter your car registratio details" required>
            <input type="date" name="service_date" required>
            <input type="time" name="service_time" required>
            <input type="text" name="message" placeholder="Enter full vehicle problem" required>
            <button type="submit"> Book Now </button>     
            </form>
            <p> <a href="index.php?controller=booking&action=index"> View All Current Bookings </a></p>

        </section>

        <!--second page--> 
        <section class="how-it-works">
            <h2> How it works</h2>
            <div class="grid-container">
                <div class="card"> 
                    <h2> 1. Enter your full name </h2>
                    <p> Input your name </p>
                </div>
                    <div class="card"> 
                    <h2> 2. Select date and time </h2>
                    <p> Select your desired available date and time</p>
                </div>
                    <div class="card"> 
                    <h2> 3. Enter your message </h2>
                    <p> Enter a message to complement your booking </p>
                </div>
            </div>
        </section>

        <?php if (!empty($success_message)) : ?>
            <p class="success-message"><?= $success_message ?></p>
        <?php endif; ?>

        <?php if (!empty($error_message)) : ?>
            <p class="error-message"><?= $error_message ?></p>
        <?php endif; ?>
    </section>
        <!--footer-->
        <footer>
            <p> &copy; <?=date("Y"); ?> All right reserved! </p>
        </footer>
    </body>
</html>