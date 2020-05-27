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
<section>
    <nav class="container-fluid fixed-bottom header-nav logo-padding">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Amakasi - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="amakasi.php"><i class=" fas fa-map-pin nav-icons"></i><br>Amakasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'diShopo - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="shops.php"><i class="fas fa-store-alt nav-icons"></i><br> diShopo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'iTrolley - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cart.php"><i class="fas fa-shopping-cart nav-icons"></i><br> iTrolley (<?php if (isset($countIP)) echo $countIP; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-question-circle nav-icons"></i><br> Help</a>
            </li>
        </ul>
    </nav>
                                            </section>

<section class="container login-section" style="margin-bottom: 50px; padding-top: 50px;">


  <div class="card login-card mx-auto" style="max-width: 480px;">
    <div class="card-body">
      <div class="container section-heading">
        <h4 class="section-title text-center">Sign in</h4>
      </div>
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
      <?php echo errorMessage(); ?><?php echo successMessage(); ?>
      <form class="" action="" method="post">

        <div class="form-group">
          <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
        </div> <!-- form-group// -->
        <div class="form-group">
          <input name="Password" class="form-control" placeholder="Password" type="password" type="password">
        </div> <!-- form-group// -->

        <div class="form-group">
          <a href="forgot_pass.php" class="float-right login-links">Forgot password?</a>
          <label class="float-left custom-control custom-checkbox"> <input value="yes" name="remember" type="checkbox" class="custom-control-input" checked="">
            <div class="custom-control-label"> Remember </div>
          </label>
        </div> <!-- form-group form-check .// -->
        <div class="form-group">
          <input type="submit" name="login" class="btn btn-primary-login btn-block" value="Login">
        </div> <!-- form-group// -->

        <div class="form-group">
          <p class="text-center mt-4  ">Don't have account? <a href="m_reg.php" class=" login-links">Sign up</a></p>
        </div> <!-- form-group// -->






      </form>
    </div> <!-- card-body.// -->
  </div>



</section>








<?php include('includes/appfooter.php'); ?>