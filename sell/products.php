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




                <div class="col-12">
                    <?php if (isset($_GET['products'])) : ?>
                        <header class="section-heading">
                            <h3 class="section-title text-center"> Shop Products</h3>
                        </header><!-- sect-heading -->

                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                        <?php echo errorMessage(); ?><?php echo successMessage(); ?>

                        <div class="col-12 mb-5">
                            <?php include("products/sidebar.php"); ?>
                        </div>
                    <?php else : ?>
                    <?php endif ?>

                    <div class="col-12">

                        <?php
                        if (isset($_GET['products']))  {
                            include_once('functions/classes/products.class.php');
                            include("products/products.php");
                    }
                        ?>

                        <?php
                        if (isset($_GET['addProducts'])) {
                            include_once('functions/classes/addProducts.class.php');
                            include("products/addProducts.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['editProducts'])) {
                            include_once('functions/classes/editProducts.class.php');
                            include("products/editProducts.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['deleteProducts'])) {
                            include_once('functions/classes/deleteProducts.class.php');
                            include("products/deleteProducts.php");
                        }
                        ?>

                    </div>



                    <!--   SIDEBAR   -->

                    <br>
                    <?php if (isset($_GET['products'])) : ?>
                        <a class="btn btn-primary-logout btn-block" href="m_index.php"> <i class="fa fa-arrow-left"></i> <span class="text">Back</span> </a>
                    <?php else : ?>
                    <?php endif ?>
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