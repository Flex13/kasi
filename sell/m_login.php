<?php 
include("functions/main.php");
$page_title = 'Shop Login - Kasi Mall Online'; 
include('includes/appheader.php');
include('functions/classes/shoploginapp.class.php');
?>


<section class="container login-section" style="margin-bottom: 100px;">

  <div class="container" align="center">
    <div class="col-12 logo-padding">
      <a href="../index.php" class="brand-wrap"><img class="logo-login" src="images/shop.jpg"></a>
    </div>
  </div>

  <div class="card login-card">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    <?php echo errorMessage(); ?><?php echo successMessage(); ?>
    <div class="card-body">
      <h4 class="card-title text-center">Shop sign in</h4>

      <form class="" action="" method="post">
        <div class="form-group">
          <label>Shop Email</label>
          <input name="Email" class="form-control" placeholder="name@gmail.com" type="email">
        </div> <!-- form-group// -->
        <div class="form-group">
          <a class="float-right login-links" href="m_forgot_pass.php">Forgot</a>
          <label>Shop Password</label>
          <input name="Password" class="form-control" placeholder="******" type="password" type="password">
        <div class="form-group mt-3">
          <input type="submit" name="shoplogin" class="btn btn-primary-login btn-block" value="Login">
        </div> <!-- form-group// -->
      </form>
    </div> <!-- card-body.// -->

    <p class="text-center mt-4  ">Don't have shop account? <a href="m_register.php" class=" login-links">Shop sign up</a></p>
  </div>
</section>

<section>
    <nav class="container fixed-bottom header-nav logo-padding">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'diShopo - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../shops.php"><i class="fas fa-store-alt nav-icons"></i><br> diShopo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'iTrolley - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../cart.php"><i class="fas fa-shopping-cart nav-icons"></i><br> iTrolley</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-search nav-icons"></i><br> Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="../cab/cab_index.php"><i class=" fas fa-car nav-icons"></i><br>iDelivery</a>
            </li>
        </ul>
    </nav>
</section>


<?php include('includes/appfooter.php'); ?>