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
                    <?php if (isset($_GET['categories'])) : ?>
                        <header class="section-heading">
                            <h3 class="section-title text-center"> Shop Categories</h3>
                        </header><!-- sect-heading -->

                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                        <?php echo errorMessage(); ?><?php echo successMessage(); ?>

                        <div class="col-12 mb-5">
                            <?php include("categories/sidebar.php"); ?>
                        </div>
                    <?php else : ?>
                    <?php endif ?>

                    <div class="col-12">

                        <?php
                        if (isset($_GET['categories']))  {
                            include_once('functions/classes/categories.class.php');
                            include("categories/categories.php");
                    }
                        ?>

                        <?php
                        if (isset($_GET['addCategory'])) {
                            include_once('functions/classes/addCategory.class.php');
                            include("categories/add_category.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['editCategory'])) {
                            include_once('functions/classes/editCategory.class.php');
                            include("categories/editCategory.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['deleteCategory'])) {
                            include_once('functions/classes/deleteCategory.class.php');
                            include("categories/deleteCategory.php");
                        }
                        ?>

                    </div>



                    <!--   SIDEBAR   -->

                    <br>
                    <?php if (isset($_GET['categories'])) : ?>
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