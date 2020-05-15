<?php 
include("functions/main.php");
$page_title = 'Forgot Password - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php include_once('functions/classes/forgot.class.php'); ?>


<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
        </div>
    </div>

    <div class="card login-card">
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        <div class="card-body">
            <h4 class="card-title text-center">Forgot Password</h4>

            <form class="" action="" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
                </div> <!-- form-group// -->
                <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                <div class="form-group mt-3">
                    <input type="submit" name="Reset-link" class="btn btn-primary-login btn-block" value="Reset Password">
                </div> <!-- form-group// -->
            </form>
            <p class="text-center">New here? <a href="register.php" class="login-links">Sign up</a></p>
        </div> <!-- card-body.// -->
    </div>
</section>


<?php include('includes/appfooter.php'); ?>