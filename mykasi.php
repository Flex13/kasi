<?php 
include("functions/main.php");
$page_title = 'My Kasi - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php if (isset($_SESSION['c_email'])) : ?>
<?php include('functions/classes/mykasi.class.php'); ?>
<body>

<section class="container login-section" style="margin-bottom: 50px;">
<?php include('includes/includes_main.php'); ?>

<div class="card login-card mx-auto" style="max-width: 480px;">
<div class="card-body">

<header class="section-heading">
                <h3 class="section-title text-center">iAccount</h3>
            </header><!-- sect-heading -->

            <!--   SIDEBAR   -->
        <ul class="list-group">
                    <a class="list-group-item mykasi-group-item" href="wishlist.php"><i class="fas fa-heart acoount-heart mr-2 header-icons"></i> Product Wishlist</a>
                    <a class="list-group-item mykasi-group-item" href="saved_locations.php"><i class="fas fa-map-pin account-pin  mr-2 header-icons"></i> Saved Locations</a>
                    <a class="list-group-item mykasi-group-item" href="my_orders.php"><i class="fa fa-list mr-2 account-orders header-icons"></i> My Orders</a>
                    <a class="list-group-item mykasi-group-item" href="profile.php?edit=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-user-edit account-edit-user mr-2 header-icons"></i> Edit Account Details</a>
                    <a class="list-group-item mykasi-group-item" href="change_pass.php?pass=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fas fa-key mr-2 header-icons"></i> Change Password</a>
                    <a class="list-group-item mykasi-group-item" href="delete_acc.php?del=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-trash account-trash mr-2 header-icons"></i> Deactivate Account</a>
                </ul>
                <br>
                <a class="btn btn-primary-logout btn-block" href="logout.php"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                <!--   SIDEBAR .//END   -->


</div>

</div>

</section>



    <?php include('includes/appfooter.php'); ?>

    <?php else : ?>
    <?php
    $_SESSION["errorMessage"] =  "To view My Kasi - Please Sign in or Sign up.";
    echo "<script>window.open('login.php','_self')</script>";
    ?>
<?php endif ?>