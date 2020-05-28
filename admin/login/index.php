<?php
include("functions/main.php");
$page_title = 'Login - Admin';
include('includes/header.php');
include('functions/classes/loginadmin.class.php');
?>



<section class="container login-section mt-5"  >


  <div class="card login-card mx-auto" style="max-width: 480px;">
    <div class="card-body">
      <div class="container section-heading">
        <h4 class="section-title text-center">Admin</h4>
      </div>
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
      <?php echo errorMessage(); ?><?php echo successMessage(); ?>
      <form class="" action="" method="post">

        <div class="form-group">
          <input type="email" name="Email" size="30" maxlength="60" class="form-control" placeholder="Enter your email" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="on" />
        </div> <!-- form-group// -->
        <div class="form-group">
          <input name="Password" class="form-control" placeholder="Password" type="password" type="password">
        </div> <!-- form-group// -->

        <div class="form-group">
          <input type="submit" name="login" class="btn btn-primary-login btn-block" value="Login">
        </div> <!-- form-group// -->

      </form>
    </div> <!-- card-body.// -->
  </div>

</section>

<?php include('includes/footer.php'); ?>