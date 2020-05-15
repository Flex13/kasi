<?php
include("functions/main.php");
$page_title = 'Shop Profile - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/shopAccount.class.php');

?>
<section class="container login-section" style="margin-bottom: 100px;">
    <?php include('includes/includes_main.php'); ?>

    <div class="card login-card">
        <article class="card-body">
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <h4 class="card-title text-center">Update Shop Profile</h4>
            </header>
            <form class="" action="" method="post">

                <div class="form-group">
                    <label class="form-label">Shop Name</label>
                    <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($shop_name)) echo $shop_name; ?>" class="form-control" />
                </div> <!-- form-group end.// -->

                <div class="form-group">
                    <label class="form-label">About Shop</label>
                    <textarea class="form-control" name="Description" cols="5" rows="15"><?php if (isset($shop_description)) echo $shop_description; ?></textarea>
                </div> <!-- form-group end.// -->

                <div class="form-row">
                    <div class="col form-group">
                        <label class="form-label">Province</label>
                        <select class="form-control" name="Province">
                            <option value="<?php if (isset($shop_province)) echo $shop_province; ?>"><?php if (isset($shop_province)) echo $shop_province; ?></option>
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
                    <div class="col form-group">
                        <label class="form-label">Kasi</label>
                        <input type="text" name="Kasi" size="32" maxlength="60" value="<?php if (isset($shop_kasi)) echo $shop_kasi; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-group">
                    <label class="form-label">Street Name</label>
                    <input type="text" name="Street-Name" size="32" maxlength="60" value="<?php if (isset($shop_street_name)) echo $shop_street_name; ?>" class="form-control" />
                </div> <!-- form-group end.// -->

                <div class="form-row">
                    <div class="col form-group">
                        <label class="form-label">Zip</label>
                        <input type="text" name="Zip" size="32" maxlength="60" value="<?php if (isset($shop_zip)) echo $shop_zip; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label class="form-label">Contact Details</label>
                        <input type="tel" name="Cell" size="32" maxlength="60" value="<?php if (isset($shop_cell)) echo $shop_cell; ?>" class="form-control" />
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="Email" size="32" value="<?php if (isset($shop_email)) echo $shop_email; ?>" maxlength="60" class="form-control" />
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> <!-- form-group end.// -->


                <div class="form-group">
                    <label class="form-label">Your Shop Picture</label>
                    <input type="file" class="form-height-custom" name="image"><br>
                </div> <!-- form-group end.// -->




                <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
                <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                <div class="form-group mt-3">
                    <input type="submit" name="updateshop" class="btn btn-primary-login btn-block" value="Update Shop Profile">
                </div> <!-- form-group// -->


            </form>
            <a class="btn btn-primary-logout btn-block" href="m_index.php"> <i class="fa fa-arrow-left"></i> <span class="text">Back</span> </a>
        </article> <!-- card-body end .// -->
    </div>
    <section>

        <section>
            <nav class="container fixed-bottom header-nav logo-padding">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                            echo "active";
                                                        } ?> " href="../index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-icon <?php if ($page_title == 'Amakasi - Kasi Mall Online') {
                                                            echo "active";
                                                        } ?> " href="../amakasi.php"><i class=" fas fa-map-pin nav-icons"></i><br>Amakasi</a>
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
                </ul>
            </nav>
        </section>

        <?php include('includes/appfooter.php'); ?>