<?php
include("functions/main.php");
$page_title = 'My Kasi - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php if (isset($_SESSION['m_email']) && $_SESSION['usertype'] == 'merchant') : ?>
    <?php include('functions/classes/mykasi.class.php'); ?>

    <body>
        <section class="section-content">
            <div class="container" style="margin-bottom: 100px;">
                <?php include('includes/includes_main.php'); ?>

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <?php echo errorMessage(); ?><?php echo successMessage(); ?>


                <div class="col-12">
                    <header class="section-heading">
                        <h3 class="section-title text-center"> Shop Account</h3>
                    </header><!-- sect-heading -->
                    <!--   SIDEBAR   -->
                    <ul class="list-group">
                        <a class="list-group-item mykasi-group-item" href="m_profile.php?mid=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fas fa-store-alt mr-2 header-icons"></i> Shop Profile</a>
                        <a class="list-group-item mykasi-group-item" href="category.php?categories=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fas fa-list mr-2 header-icons"></i>Categories</a>
                        <a class="list-group-item mykasi-group-item" href="products.php?products=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fas fa-list mr-2 header-icons"></i>Products</a>
                        <a class="list-group-item mykasi-group-item" href="my_orders.php"><i class="fa fa-list mr-2 header-icons"></i> My Orders</a>
                        <a class="list-group-item mykasi-group-item" href="sell/m_register.php"><i class="fa fas fa-user mr-2 header-icons"></i>My Customers</a>
                        <a class="list-group-item mykasi-group-item" href="publish_acc.php?mid=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-upload mr-2 header-icons"></i> Publish Shop</a>
                        <a class="list-group-item mykasi-group-item" href="delete_acc.php?mid=<?php if (isset($encode_id)) echo $encode_id; ?>"><i class="fa fa-trash mr-2 header-icons"></i> Delete Account</a>
                    </ul>
                    <br>
                    <a class="btn btn-primary-logout btn-block" href="logout.php"> <i class="fa fa-power-off"></i> <span class="text">Log out Merchant</span> </a>
                    <!--   SIDEBAR .//END   -->
                </div>

            </div> <!-- container .//  -->
        </section>
        <!-- ========================= SECTION CONTENT END// ========================= -->

        <?php include('includes/appfooter.php'); ?>

    <?php else : ?>
        <?php
        $_SESSION["errorMessage"] =  "To view Shop Account - Please Sign in or Sign up.";
        echo "<script>window.open('m_login.php','_self')</script>";
        ?>
    <?php endif ?>