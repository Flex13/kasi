<?php $page_title = 'Customer - Kasi Mall Online'; ?>
<?php
include('includes/header.php');
?>
<?php if (isset($_SESSION['a_email']) && isset($_SESSION['a_id']) && $_SESSION['user_type'] = 'admin') : ?>


    <body>
        <div class="wrapper ">

            <?php include('includes/sidebar.php'); ?>




            <div class="main-panel">
                <!-- Navbar -->
                <?php include('includes/nav.php'); ?>
                <!-- End Navbar -->


                <div class="content">
                    <div class="container-fluid">
                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


                        <?php
                        if (isset($_GET['customer'])) {
                            include("customer/main.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['add'])) {
                            include("customer/add.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['view'])) {
                            include("customer/view.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['edit'])) {
                            include("customer/edit.php");
                        }
                        ?>

                        <?php
                        if (isset($_GET['pass'])) {
                            include("customer/pass.php");
                        }
                        ?>
                    </div>
                </div>


            </div>
        </div>



        <?php include('includes/footer.php'); ?>

    <?php else : ?>
        <?php
        $_SESSION["errorMessage"] =  "Please Sign in or Sign up.";
        echo "<script>window.open('login/index.php','_self')</script>";
        ?>
    <?php endif ?>