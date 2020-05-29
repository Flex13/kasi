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
        <a class="btn btn-danger pull-left" href="categories.php?categories">
              <i class="material-icons">arrow_back</i> Back
            </a>
    <div class="card card-profile login-card mx-auto" style="max-width:550px;">
        

        <div class="card-body">
        <h3 class="card-title"><b><?php if (isset($name)) echo $name; ?> <?php if (isset($surname)) echo $surname; ?></b></h3>
                  <h6 class="card-category text-gray"><?php if (isset($province)) echo $province; ?> -- <?php if (isset($city)) echo $city; ?> -- <?php if (isset($kasi)) echo $kasi; ?></h6>
                  
                  <p class="card-description">
                  <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Username: </span></div>
                    <div class="col-6"><?php if (isset($username)) echo $username; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Email: </span></div>
                    <div class="col-6"><?php if (isset($email)) echo $email; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Contact: </span></div>
                    <div class="col-6"><?php if (isset($contact)) echo $contact; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Registration Date: </span></div>
                    <div class="col-6"><?php if (isset($reg_date)) echo $reg_date; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Gender: </span></div>
                    <div class="col-6"><?php if (isset($gender)) echo $gender; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Address: </span></div>
                    <div class="col-6"><?php if (isset($street_address)) echo $street_address; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Activated: </span></div>
                    <div class="col-6">
                    <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i></div>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i></div>
                                    <?php endif ?>
                    
                    
                    </div>



                    
                  </p>
                </div>

            <div class="container">
                <div class="login-card mx-auto" style="max-width:450px;">

                    <div class="row pb-4">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-round btn-block" href="customer.php?edit=<?php if (isset($user_id)) echo $user_id; ?>"> Edit Profile</a>
                            <a class="btn btn-warning btn-round btn-block" href="customer.php?pass=<?php if (isset($user_id)) echo $user_id; ?>"> Change Password</a>
                        </div>



                        <div class="col-md-12">
                            <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($user_id)) echo $user_id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block"> <i class='material-icons'>public_off</i> Deactivate Account</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block"> <i class='material-icons'>public</i> Activate Account</button>
                                <?php endif ?>
                            </form>
                        </div>

                    </div>





                </div>
            </div>
        </div>
    </div>
</div>