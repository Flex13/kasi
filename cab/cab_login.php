<?php
include("functions/main.php");
$page_title = 'iDelivery - Login';
include('includes/appheader.php');
include('functions/classes/cab_login.class.php');
?>


<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="../index.php" class="brand-wrap"><img class="logo-login" src="images/a2b.jpg"></a>
        </div>
    </div>

    <div class="card login-card">
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        <?php echo errorMessage(); ?><?php echo successMessage(); ?>
        <div class="card-body">
            <h4 class="card-title text-center">Sign In</h4>

            <form class="" action="" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input name="Email" class="form-control" placeholder="Email Address" type="email">
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
                    <input type="submit" name="cab_login" class="btn btn-primary-login btn-block" value="Login">
                </div> <!-- form-group// -->
            </form>
        </div> <!-- card-body.// -->

        <p class="text-center mt-4  ">Don't have account? <a href="cab_register.php" class=" login-links">Cab Sign up</a></p>
    </div>
</section>

<section>
    <nav class="container fixed-bottom header-nav logo-padding">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cab_index.php"><i class=" fas fa-car nav-icons"></i><br>iRide</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../index.php"><i class=" fas fa-store-alt nav-icons"></i><br>eMall</a>
            </li>

            </li>

        </ul>
    </nav>
</section>


<?php include('includes/appfooter.php'); ?>