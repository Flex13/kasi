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
        <a class="btn btn-danger pull-left" href="amakasi.php?amakasi">
              <i class="material-icons">arrow_back</i> Back
            </a>
    <div class="card card-profile login-card mx-auto" style="max-width:550px;">
    


    
        <div class="card-avatar">
            <a href="javascript:;">
                <img class="img" src="uploads/amakasi/<?php if (isset($image)) echo $image; ?>">
            </a>
        </div>

        <div class="card-body">
                  <h4 class="card-title"><?php if (isset($name)) echo $name; ?> <?php if (isset($surname)) echo $surname; ?></h4>
                  <p class="card-description">

                  <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Alternative Name: </span></div>
                    <div class="col-6"><?php if (isset($alt_name)) echo $alt_name; ?></div>
                    </div>

                  <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Province: </span></div>
                    <div class="col-6"><?php if (isset($province)) echo $province; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">City: </span></div>
                    <div class="col-6"><?php if (isset($city)) echo $city; ?></div>
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

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Registration Date: </span></div>
                    <div class="col-6"><?php if (isset($reg_date)) echo $reg_date; ?></div>
                    </div>
                  </p>
                </div>

            <div class="container">
                <div class="login-card mx-auto" style="max-width:450px;">

                    <div class="row pb-4">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-round btn-block" href="amakasi.php?edit=<?php if (isset($kasi_id)) echo $kasi_id; ?>"> Edit Profile</a>
                        </div>



                        <div class="col-md-12">
                            <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($kasi_id)) echo $kasi_id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block"><i class=" material-icons">public_off</i> Deactivate Kasi</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block"><i class=" material-icons">public</i> Activate Kasi</button>
                                <?php endif ?>
                            </form>
                        </div>

                    </div>





                </div>
            </div>
        </div>
    </div>
</div>