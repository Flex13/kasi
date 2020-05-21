<?php
include("functions/main.php");
$page_title = 'Edit Account - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/account.class.php');
?>

<body>

    <section class="container login-section" style="margin-bottom: 50px;">
        <?php include('includes/includes_main.php'); ?>

        <div class="card login-card mx-auto" style="max-width: 550px;">
            <div class="card-body">

                <header class="section-heading">
                    <h3 class="section-title text-center">Update Account Details</h3>
                </header><!-- sect-heading -->

                <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php if (isset($result)) echo $result; ?>
                    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                    <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="Username" size="32" maxlength="60" value="<?php if (isset($username)) echo $username; ?>" class="form-control" placeholder="Username" />
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" placeholder="Email Address" />
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="form-label">Street Address</label>
                            <input type="text" name="Address" value="<?php if (isset($address)) echo $address; ?>" maxlength="100" class="form-control" placeholder="Street Address" />
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="form-label">City</label>
                            <input type="text" name="City" size="32" value="<?php if (isset($city)) echo $city; ?>" maxlength="60" class="form-control" placeholder="City">
                        </div><!-- form-group end.// -->
                    </div>

                    <div class="form-row">
                    <div class="form-group col-12">
                            <label class="form-label">Kasi</label>
                            <select id="inputCity" name="Kasi" class="form-control">
                                <option value="<?php if (isset($kasi)) echo $kasi; ?>"><?php if (isset($kasi)) echo $kasi; ?></option>
                                <option value="Vaal">Vaal</option>
                                <option value="Soweto">Soweto</option>
                                <option value="Alex">Alex</option>
                            </select>
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->



                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="form-label">Province</label>
                            <select class="form-control" name="Province">
                                <option value="<?php if (isset($province)) echo $province; ?>"><?php if (isset($province)) echo $province; ?></option>
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
                            <label class="form-label">Country</label>
                            <select class="form-control" name="Country">
                                <option value="<?php if (isset($country)) echo $country; ?>"><?php if (isset($country)) echo $country; ?></option>
                                <option value="South Africa">South Africa</option>
                            </select>
                        </div><!-- form-group end.// -->
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Zip</label>
                            <input type="text" name="Zip" size="10" maxlength="60" value="<?php if (isset($zip)) echo $zip; ?>" class="form-control" placeholder="Zip Code" />
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label class="form-label">Contact Details</label>
                            <input type="tel" name="Cell" size="10" maxlength="12" value="<?php if (isset($contact)) echo $contact; ?>" class="form-control" placeholder="Contact Details" />
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->

                    <input type="hidden" name="ip" value="<?php if (isset($ip_address)) echo  $ip_address; ?>">
                    <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                    <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                    <input type="submit" name="update" class="btn btn-primary-login btn-block" value="Update">
                    <a href="mykasi.php" class="btn btn-primary-login btn-block">Back</a>
                </form>


            </div>
        </div>
    </section>

    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>