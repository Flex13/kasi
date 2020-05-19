<?php
include("functions/main.php");
$page_title = 'Register - Kasi Mall Online';
include('includes/appheader.php');
?>

<section class="container login-section">
    <?php include('includes/includes_main.php'); ?>


    <div class="card login-card mx-auto" style="max-width: 780px;">
        <div class="card-body">
            <h1 class="payment-heading">Your order has been placed! </h1>
            <p class="payment-text">You order has been successfully processed.</p>
            <p class="payment-text">You can view your order history by going to <a href="../mykasi.php" class="login-links">my account</a> page and clicking on <a href="../my_orders.php" class="login-links">my orders</a>.</p>
            <p class="payment-text">For enquiries please contact our <a href="../help.php" class="login-links">customer support team</a></p>
            <p class="payment-text">Thanks for shopping with us online!!</p>
        </div>
    </div>



</section>


<?php include('../includes/appfooter.php'); ?>