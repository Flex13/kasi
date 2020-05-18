<?php
include("functions/main.php");
$page_title = 'Login - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/loginapp.class.php');
?>
<?php 

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>

<section class="container login-section" style="margin-bottom: 100px;">

  <div class="container" align="center">
    <div class="col-12 logo-padding">
      <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
    </div>
  </div>

  <div class="card login-card">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <?php echo errorMessage(); ?><?php echo successMessage(); ?>
    <div class="card-body">
      <h4 class="card-title text-center">Sign in</h4>

      <form class="" action="" method="post">
        <div class="form-group">
          <label>Email</label>
          <input name="Email" class="form-control" placeholder="name@gmail.com" type="email">
        </div> <!-- form-group// -->
        <div class="form-group">
          <a class="float-right login-links" href="forgot_pass.php">Forgot</a>
          <label>Password</label>
          <input name="Password" class="form-control" placeholder="******" type="password" type="password">
        </div> <!-- form-group// -->
        <div class="form-group">
          <label class="custom-control custom-checkbox"> <input value="yes" name="remember" type="checkbox" class="custom-control-input">
            <div class="custom-control-label"> Remember </div>
          </label>
        </div> <!-- form-group form-check .// -->

        <div class="form-group mt-3">
          <input type="submit" name="login" class="btn btn-primary-login btn-block" value="Login">
        </div> <!-- form-group// -->
      </form>
    </div> <!-- card-body.// -->

    <p class="text-center mt-4  ">Don't have account? <a href="register.php" class=" login-links">Sign up</a></p>
  </div>
</section>




<?php include('includes/appfooter.php'); ?>