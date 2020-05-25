<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/view.class.php');
?>


<div class="col-md-12">
    <div class="card card-profile">
        <div class="card-avatar">
            <a href="javascript:;">
                <img class="img" src="../../images/shops.jpg">
            </a>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <thead class=" text-primary bold text-center">
                            <tr>
                                <th class="tg-baqh">
                                    Shop Location
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-baqh">
                                    <?php if (isset($shop_address)) echo $shop_address; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <?php if (isset($shop_kasi)) echo $shop_kasi; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <?php if (isset($shop_city)) echo $shop_city; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <?php if (isset($shop_province)) echo $shop_province; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <?php if (isset($shop_zip)) echo $shop_zip; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <thead class=" text-primary bold text-center">
                            <tr>
                                <th class="tg-baqh">
                                    Shop Details
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-baqh">

                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Shop Name: </span></div>
                                        <div class="col-8"><?php if (isset($shop_name)) echo $shop_name; ?></div>
                                    </div>

                                </td>

                            </tr>
                            <tr>
                                <td class="tg-baqh">

                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Services: </span></div>
                                        <div class="col-8"> <?php if (isset($shop_description)) echo $shop_description; ?></div>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">

                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Email: </span></div>
                                        <div class="col-8"><?php if (isset($shop_email)) echo $shop_email; ?></div>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Contact Details: </span></div>
                                        <div class="col-8"><?php if (isset($shop_cell)) echo $shop_cell; ?></div>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Active: </span></div>
                                        <div class="col-8"><?php if ($activated == '1') {
                                                                echo "Active";
                                                            } else {
                                                                echo "not-active";
                                                            }; ?></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <div class="row">
                                        <div class="col-4"><span class="profile-text">Date Joined: </span></div>
                                        <div class="col-8"><?php if (isset($shop_date_joined)) echo $shop_date_joined; ?></div>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="container">
                <div class="login-card mx-auto" style="max-width:450px;">

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-success btn-round btn-block" href="supplier.php?edit=<?php if (isset($shop_id)) echo $shop_id; ?>"><i class="material-icons">create</i> Edit Profile</a>
                            <a class="btn btn-warning btn-round btn-block" href="supplier.php?pass=<?php if (isset($shop_id)) echo $shop_id; ?>"><i class="material-icons">enhanced_encryption</i> Change Password</a>
                        </div>



                        <div class="col-md-6">
                            <a class="btn btn-info btn-round btn-block" href="supplier.php?v_products=<?php if (isset($shop_id)) echo $shop_id; ?>"><i class="material-icons">visibility</i> View Products</a>
                            <a class="btn btn-primary btn-round btn-block" href="supplier.php?add_products=<?php if (isset($shop_id)) echo $shop_id; ?>"><i class="material-icons">add_box</i> Add Products</a>
                        </div>
                    </div>

                    <?php
                    if ($activated == '1') : ?>
                        <button type="submit" name="registersupplier" class="btn btn-danger btn-block">Deactivate Account</button>
                    <?php else : ?>
                        <button type="submit" name="registersupplier" class="btn btn-success btn-block">Activate Account</button>
                    <?php endif ?>



                </div>
            </div>
        </div>
    </div>
</div>