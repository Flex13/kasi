<?php 
include("functions/main.php");
$page_title = 'Register - Kasi Mall Online'; 
include('includes/appheader.php'); 
include('functions/classes/registerApp.class.php');

?>
<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
        </div>
    </div>

    <div class="card login-card">
        <article class="card-body">
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <h4 class="card-title text-center">Sign up</h4>
            </header>
            <form class="" action="" method="post">

                <div class="form-row">
                    <div class="col form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($name)) echo $name; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label class="form-label">Surname</label>
                        <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($surname)) echo $surname; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" />
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> <!-- form-group end.// -->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                </div>
                <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                <div class="form-group mt-3">
                    <input type="submit" name="register" class="btn btn-primary-login btn-block" value="Register">
                </div> <!-- form-group// -->

            </form>
            <hr>
            <p class="text-center">Have an account? <a href="login.php" class=" login-links">Log In</a></p>
        </article> <!-- card-body end .// -->
    </div>
    <section>

    <section>
    <nav class="container fixed-bottom header-nav logo-padding">
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
                                                } ?> " href="shops.php"><i class="fas fa-store-alt nav-icons"></i><br> diShopo </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'iTrolley - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cart.php"><i class="fas fa-shopping-cart nav-icons"></i><br> iTrolley (<?php if (isset($countIP)) echo $countIP; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-search nav-icons"></i><br> Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="cab/cab_index.php"><i class=" fas fa-car nav-icons"></i><br>iDelivery</a>
            </li>
        </ul>
    </nav>
</section>

        <?php include('includes/appfooter.php'); ?>