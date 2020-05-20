<?php
include("functions/main.php");
$page_title = 'Activate - Kasi Mall Online'; ?>
<?php include('includes/appheader.php');
include('functions/classes/registerApp.class.php');

?>
<section class="container login-section" style="margin-bottom: 50px;">
  <?php include('includes/includes_main.php'); ?>

  <div class="card login-card mx-auto" style="max-width: 480px;">
    <div class="card-body">
      <form class="" action="" method="post">
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
      </form>
    </div>
  </div>

</section>


<?php include('includes/appfooter.php'); ?>