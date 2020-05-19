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

<section class="container login-section" style="margin-bottom: 100px;">
    <?php include('includes/includes_main.php'); ?>


    <div class="card login-card mx-auto" style="max-width:700px;">
        <article class="card-body">
            <header class="mb-4">
                <div class="container section-heading">
                    <h4 class="section-title text-center">Register</h4>
                </div>
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            </header>

            <form class="" action="" method="post">
                <div class="form-row">
                    <div class="col form-group">
                        <label>First name</label>
                        <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($name)) echo $name; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label>Last name</label>
                        <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($surname)) echo $surname; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" />
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> <!-- form-group end.// -->
                <div class="form-group">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" checked="" type="radio" name="gender" value="Male">
                        <span class="custom-control-label"> Male </span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="gender" value="Female">
                        <span class="custom-control-label"> Female </span>
                    </label>
                </div> <!-- form-group end.// -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Province</label>
                        <select id="inputProvince" class="form-control">
                            <option> Choose...</option>
                            <option value="Gauteng">Gauteng</option>
                            <option value="Free State">Free State</option>
                            <option value="Kwa Zulu-Natal">Kwa Zulu-Natal</option>
                            <option value="Eastern Cape">Eastern Cape</option>
                            <option value="Limpopo">Limpopo</option>
                            <option value="Western Cape">Western Cape</option>
                            <option value="Mpumalanga">Mpumalanaga</option>
                            <option value="Northan Cape">Northan Cape</option>
                            <option value="North West">North West</option>
                        </select>
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row.// -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Create password</label>
                        <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Repeat password</label>
                        <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox"> <input type="checkbox" value="1" name="Terms" class="custom-control-input" checked="">
                        <div class="custom-control-label"> I am agree with <a href="#" class=" login-links">terms and contitions</a> </div>
                    </label>
                </div> <!-- form-group end.// -->
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-primary-login btn-block" value="Register">
                </div> <!-- form-group// -->

                <div class="form-group">
                    <p class="text-center">Have an account? <a href="login.php" class=" login-links">Log In</a></p>
                </div> <!-- form-group end.// -->


            </form>
        </article><!-- card-body.// -->
    </div>


</section>





<?php include('includes/appfooter.php'); ?>