
<?php 
include_once("functions/db.php");
include_once("functions/functions.php"); 
include('functions/classes/delete.class.php');
?>

<div class="row">
  <div class="col-md-12">
    <div class="mb-4 login-card mx-auto" style="max-width:550px;">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
    
    <div class="card login-card mx-auto" style="max-width:550px;">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Remove Admin</h4>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post">
            
          <input type="hidden" name="hidden_id" value="<?php if (isset($admin_id)) echo $admin_id; ?>"/>
            <button type="submit" name="yes" class="btn btn-primary btn-block">Deactivate Account</button>
            <a class="btn btn-danger btn-block" href="admin.php?admin">
                    <i class="material-icons">arrow_back</i> Back
                </a>
            <div class="clearfix"></div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>