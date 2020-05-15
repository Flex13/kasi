<?php 
include("functions/main.php");
$page_title = 'Change Password - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/pass_update.class.php');

?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
        <?php include('includes/includes_main.php'); ?>
            <div class="card login-card">
                <div class="card-body">

                    <h4 class="card-title text-canter mb-4">Change Password</h4>

                    <form class="" action="" method="post" enctype="multipart/form-data">
                        <?php if (isset($result)) echo $result; ?>
                        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                        <?php echo errorMessage(); ?><?php echo successMessage(); ?>
                        

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Old Password</label>
                                <input type="password" name="Old-Password" size="20" maxlength="25" class="form-control" placeholder="Old Password" />
                            </div><!-- form-group end.// -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">New Password</label>
                                <input type="password" name="New-Password" size="20" maxlength="25" class="form-control" placeholder="New Password" />
                            </div><!-- form-group end.// -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="Confirm-Password" size="20" maxlength="20" class="form-control" placeholder="Confirm Password" />
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <input type="hidden" name="ip" value="<?php if (isset($ip_address)) echo  $ip_address; ?>">
                        <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>">
                        <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                        <input type="submit" name="updatePassword" class="btn btn-primary-login btn-block" value="Update">
                        <a href="mykasi.php" class="btn btn-primary-login btn-block">Back</a>
                    </form>
                </div> <!-- card-body.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>