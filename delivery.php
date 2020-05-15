<?php
include("functions/main.php");
$page_title = 'iDelivery - Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">

            <div class="container" align="center">
                <div class="col-12 logo-padding">
                    <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
                </div>
            </div>

            <?php include('functions/classes/delivery.class.php'); ?>
            <?php if (isset($_SESSION['id'])) : ?>

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <?php echo errorMessage(); ?><?php echo successMessage(); ?>

                <div class="section-heading">
                    <h3 class="section-title">Delivery Address</h3>
                </div>

                <section>
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
                            <div class="form-group col-12">
                                <label class="form-label">Country</label>
                                <select class="form-control" name="Country">
                                    <option value="">Please Select Country</option>
                                    <option value="South Africa">South Africa</option>
                                </select>
                            </div><!-- form-group end.// -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Province</label>
                                <select class="form-control" name="Province">
                                    <option value="">Please Select Province...</option>
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
                                </select>
                            </div><!-- form-group end.// -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Kasi</label>
                                <input type="text" name="Kasi" size="32" value="<?php if (isset($kasi)) echo $kasi; ?>" maxlength="100" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Street Address</label>
                                <input type="text" name="Address" value="<?php if (isset($address)) echo $address; ?>" maxlength="100" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Zip</label>
                                <input type="text" name="Zip" size="10" maxlength="60" value="<?php if (isset($zip)) echo $zip; ?>" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label class="form-label">Cell</label>
                                <input type="tel" name="Cell" size="10" maxlength="12" value="<?php if (isset($cell)) echo $cell; ?>" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Gender</label>
                                <select name="Gender" class="form-control">
                                    <option value="">Please Select Gender...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->


                        <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                        <input type="hidden" name="hidden_shop" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
                        <input type="hidden" name="hidden_user" value="<?php if (isset($user_id)) echo $user_id; ?>">
                        <input type="hidden" name="hidden_product" value="<?php if (isset($product_id)) echo $product_id; ?>">
                        <div class="form-group mt-3">
                            <input type="submit" name="updateshipping" class="btn btn-primary-login btn-block" value="Process Order">
                        </div> <!-- form-group// -->

                    </form>
                </section>








        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>

<?php else : ?>
    <?php
                $_SESSION["errorMessage"] =  "Please Sign in or Sign up.";
                echo "<script>window.open('login.php','_self')</script>";
    ?>
<?php endif ?>