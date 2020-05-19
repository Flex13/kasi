<?php
include("functions/main.php");
$page_title = 'Forgot Password - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php include_once('functions/classes/forgot.class.php'); ?>

<?php

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>

<section class="container login-section">
    <?php include('includes/includes_main.php'); ?>

    <div class="card login-card mx-auto" style="max-width: 480px;">
        <div class="card-body">
            <div class="container section-heading">
                <h4 class="section-title text-center">Forgot Password</h4>
            </div>
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>
            <form class="" action="" method="post">
                <div class="form-group">
                    <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
                </div> <!-- form-group// -->
                <div class="form-group">
                    <input type="submit" name="Reset-link" class="btn btn-primary-login btn-block" value="Reset Password">
                </div> <!-- form-group// -->

                <div class="form-group">
                    <p class="text-center">New here? <a href="register.php" class="login-links">Sign up</a></p>
                </div> <!-- form-group// -->

            </form>
        </div> <!-- card-body.// -->
    </div>



</section>








<?php include('includes/appfooter.php'); ?>