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
    <div class="card card-profile login-card mx-auto" style="max-width:550px;">



    
        <div class="card-avatar">
            <a href="javascript:;">
                <img class="img" src="uploads/categories/<?php if (isset($image)) echo $image; ?>">
            </a>
        </div>

        <div class="card-body">
                  <h4 class="card-title"><?php if (isset($name)) echo $name; ?></h4>
                  <p class="card-description">

                  <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Sub Category Name: </span></div>
                    <div class="col-6"><?php if (isset($sub)) echo $sub; ?></div>
                    </div>

                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Added by: </span></div>
                    <div class="col-6"><?php if (isset($added_by)) echo $added_by; ?></div>
                    </div>


                    <div class="row py-1">
                    <div class="col-6"><span class="profile-text">Activated: </span></div>
                    <div class="col-6"><?php if ($activated == '1') { echo "Active"; } else { echo "not-active"; }; ?></div>
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
                            <a class="btn btn-primary btn-round btn-block" href="categories.php?edit=<?php if (isset($cat_id)) echo $cat_id; ?>"><i class="material-icons">create</i> Edit Category</a>
                        </div>



                        <div class="col-md-12">
                            <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($cat_id)) echo $cat_id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block">Deactivate Account</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block">Activate Account</button>
                                <?php endif ?>
                            </form>
                        </div>

                    </div>





                </div>
            </div>
        </div>
    </div>
</div>