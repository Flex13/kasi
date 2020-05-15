<?php
include("functions/main.php");
 $page_title = 'Edit Account - A2B'; 
 include('includes/appheader.php'); 
include('functions/classes/account.class.php');
?>

<body>

    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
        
            <div class="card login-card">
                <div class="card-body">

                    <h4 class="card-title text-canter mb-4">Profile</h4>

                    <form class="" action="" method="post" enctype="multipart/form-data">
                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                        <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                        <div class="form-row">
                            <div class="col form-group">
                                <label class="form-label">Username</label>
                                <input type="text" name="Username" size="32" maxlength="60" value="<?php if(isset($username)) echo $username; ?>" class="form-control" placeholder="Username" />
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label class="form-label">Gender</label>
                                <select name="Gender" class="form-control">
                                    <option value="<?php if (isset($gender)) echo $gender; ?>"><?php if (isset($gender)) echo $gender; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

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
                                <label class="form-label">Kasi</label>
                                <input type="text" name="City" size="32" value="<?php if (isset($city)) echo $city; ?>" maxlength="100" class="form-control" placeholder="" />
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
                                <input type="text" name="Zip" size="10" maxlength="60" value="<?php if(isset($zip)) echo $zip; ?>" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label class="form-label">Cell</label>
                                <input type="tel" name="Cell" size="10" maxlength="12" value="<?php if(isset($contact)) echo $contact; ?>" class="form-control" placeholder="" />
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <input type="hidden" name="ip" value="<?php if (isset($ip_address)) echo  $ip_address; ?>">
                        <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                        <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                        <input type="submit" name="update" class="btn btn-primary-login btn-block" value="Update">
                    </form>
                </div> <!-- card-body.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>