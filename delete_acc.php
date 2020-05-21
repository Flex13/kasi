<?php
include("functions/main.php");
$page_title = 'Delete Account - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/deleteAcc.class.php');

?>

<body>

    <section class="container login-section" style="margin-bottom: 50px;">
        <?php include('includes/includes_main.php'); ?>

        <div class="card login-card mx-auto" style="max-width: 480px;">
            <div class="card-body">

                <header class="section-heading">
                    <h3 class="section-title text-center">Deactivate Account?</h3>
                </header><!-- sect-heading -->

                <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php if (isset($result)) echo $result; ?>
                    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                    <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                    <input type="hidden" name="ip" value="<?php if (isset($ip_address)) echo  $ip_address; ?>">
                    <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                    <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                    <input type="submit" name="yes" class="btn btn-primary-logout btn-block" value="Yes, Deactivate Account">
                    <a href="mykasi.php" class="btn btn-primary-login btn-block">Back</a>
                    <div class="form-group my-5">
                        <a class="btn btn-primary-danger btn-block" href="logout.php"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                    </div>
                </form>




            </div>
        </div>
    </section>

    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>