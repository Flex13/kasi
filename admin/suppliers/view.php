<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/view.class.php');
?>


<div class="col-md-12">
<div class="mb-4 login-card mx-auto" style="max-width:550px;">
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>
        <a class="btn btn-danger pull-left" href="supplier.php?suppliers">
              <i class="material-icons">arrow_back</i> Back
            </a>
    <div class="card card-profile">

        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <thead class=" text-primary bold text-center">
                            <tr>
                                <th class="tg-baqh">
                                    <b>Shop Location</b>
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
                                    <b>Shop Details</b>
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
                                        <div class="col-8">
                                        <?php if ($activated == '1') :?>
                                            <i class=' text-success material-icons'>public</i></div>
                                            <?php else : ?>
                                                <i class='text-danger material-icons'>public_off</i></div>
                                        <?php endif ?>
                                                            </div>
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
                            <a class="btn btn-success btn-round btn-block" href="supplier.php?edit=<?php if (isset($shop_id)) echo $shop_id; ?>"> Edit Profile</a>
                            <a class="btn btn-warning btn-round btn-block" href="supplier.php?pass=<?php if (isset($shop_id)) echo $shop_id; ?>"> Change Password</a>
                        </div>



                        <div class="col-md-6">
                            <a class="btn btn-info btn-round btn-block" href="supplier.php?v_products=<?php if (isset($shop_id)) echo $shop_id; ?>"> View Products</a>
                            <a class="btn btn-primary btn-round btn-block" href="supplier.php?add_products=<?php if (isset($shop_id)) echo $shop_id; ?>"> Add Products</a>
                            
                        </div>
                        
                    </div>
                    <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block"> <i class='material-icons'> public_off</i> Deactivate Account</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block"><i class=' material-icons'>public</i> Activate Account</button>
                                <?php endif ?>
                            </form>




                </div>
            </div>
        </div>
    </div>
</div>