<?php 
include("functions/main.php");
$page_title = 'iDelivery Register - A2B'; 
include('includes/appheader.php'); 
include('functions/classes/cab_register.class.php');

?>
<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/a2b.jpg"></a>
        </div>
    </div>

    <div class="card login-card">
        <article class="card-body">
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <h4 class="card-title text-center">Sign Up</h4>
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
                    <input type="submit" name="cab_register" class="btn btn-primary-login btn-block" value="Register">
                </div> <!-- form-group// -->

            </form>
            <hr>
            <p class="text-center">Have an account? <a href="cab_login.php" class=" login-links">Log In</a></p>
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