<?php 
include("functions/main.php");
$page_title = 'Activate - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); 
include('functions/classes/registerApp.class.php');

?>
<section class="container login-section" style="margin-bottom: 100px;">

<div class="container" align="center">
    <div class="col-12 logo-padding">
                    <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
                </div>
    </div>

    <div class="card login-card">
 
      <div class="card-body">

      <form class="" action="" method="post">
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
</form>
      </div> <!-- card-body.// -->
    </div>
</section>


<?php include('includes/appfooter.php'); ?>