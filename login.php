<?php
include("functions/main.php");
$page_title = 'Register - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/registerApp.class.php');
?>

<?php

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>

<section class="container login-section">
  <?php include('includes/includes_main.php'); ?>

  <div class="card login-card mx-auto" style="max-width: 380px;">
    <div class="card-body">
      <div class="container section-heading">
        <h4 class="section-title text-center">Sign in</h4>
      </div>
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
      <?php echo errorMessage(); ?><?php echo successMessage(); ?>
      <form>

        <div class="form-group">
        <input name="Email" class="form-control" placeholder="Email" type="email">
        </div> <!-- form-group// -->
        <div class="form-group">
        <input name="Password" class="form-control" placeholder="Password" type="password" type="password">
        </div> <!-- form-group// -->

        <div class="form-group">
          <a href="forgot_pass.php" class="float-right login-links">Forgot password?</a>
          <label class="float-left custom-control custom-checkbox"> <input value="yes" name="remember" type="checkbox"  class="custom-control-input" checked="">
            <div class="custom-control-label"> Remember </div>
          </label>
        </div> <!-- form-group form-check .// -->
        <div class="form-group">
          <input type="submit" name="login" class="btn btn-primary-login btn-block" value="Login">
        </div> <!-- form-group// -->

        <div class="form-group">
          <p class="text-center mt-4  ">Don't have account? <a href="register.php" class=" login-links">Sign up</a></p>
        </div> <!-- form-group// -->






      </form>
    </div> <!-- card-body.// -->
  </div>



</section>








<?php include('includes/appfooter.php'); ?>