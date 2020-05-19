<?php
include("functions/main.php");
$page_title = 'Register - Kasi Mall Online';
include('includes/appheader.php');
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


    <div class="card login-card mx-auto" style="max-width:550px; border: 1px solid red;">
        <article class="card-body">
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            </header>

            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <form id="regiration_form" novalidate action="" method="post">
                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 1: Create your account</h4>
                    </div>



                    <div class="form-group">
                        <label class="form-label" for="email">Username</label>
                        <input type="text" class="form-control" id="username" name="Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" placeholder="Email Address" />
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Create password</label>
                        <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Repeat password</label>
                        <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div>
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>
                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 2: Shop Details</h4>
                    </div>


                    <div class="form-group">
                        <label class="form-label">Shop Name</label>
                        <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($shop_name)) echo $shop_name; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">About Shop</label>
                        <textarea class="form-control" name="Description" cols="5" rows="15"><?php if (isset($shop_description)) echo $shop_description; ?></textarea>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 3: Conatct Information</h4>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contact Details</label>
                        <input type="tel" name="Cell" size="10" value="<?php if (isset($cell)) echo $cell; ?>" maxlength="12" class="form-control" oninput="this.className = ''">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="Address" size="32" value="<?php if (isset($address)) echo $address; ?>" maxlength="60" class="form-control" oninput="this.className = ''">
                    </div> <!-- form-group end.// -->



                    <div class="form-group ">
                        <label class="form-label">Kasi</label>
                        <select id="inputCity" name="Kasi" class="form-control">
                            <option> Choose...</option>
                            <option value="Vaal">Vaal</option>
                            <option value="Soweto">Soweto</option>
                            <option value="Alex">Alex</option>
                        </select>
                    </div> <!-- form-group end.// -->


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Province</label>
                            <select id="inputProvince" name="Province" class="form-control">
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

                        <div class="form-group col-md-6">
                            <label class="form-label">Zip</label>
                            <input type="text" name="Zip" size="10" value="<?php if (isset($zip)) echo $zip; ?>" maxlength="10" class="form-control" oninput="this.className = ''">
                        </div>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />


                </fieldset>

                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 4: Shop Logo</h4>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Shop Picture</label>
                        <input type="file" class="form-height-custom" name="image"><br>
                    </div>



                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="submit" name="register" class="btn btn-primary-login btn-block" value="Register">
                </fieldset>
            </form>





        </article><!-- card-body.// -->
    </div>


</section>

<?php include('includes/appfooter.php'); ?>