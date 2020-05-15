<?php 
include("functions/main.php");
$page_title = 'Publish Account - Kasi Mall Online'; 
include('includes/appheader.php');
include('functions/classes/activateShop.class.php');

?>

<body>
    <section class="section-content">
        <div class="container" style="margin-top: 30px;">
        <?php include('includes/includes_main.php'); ?>

            <div class="card login-card">
                <div class="card-body">
                    <form class="" action="" method="post" enctype="multipart/form-data">
                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                        <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                        <h4 class="card-title mb-4">Publish Shop?</h4>
                        <input type="hidden" name="ip" value="<?php if (isset($ip_address)) echo  $ip_address; ?>">
                        <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
                        <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                        <input type="submit" name="yes" class="btn btn-primary-login btn-block" value="Yes, Publish Account">
                        <input type="submit" name="no" class="btn btn-danger btn-block" value="No, Don't Publish Account">
                    </form>
                </div> <!-- card-body.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>