
<?php
$page_title = 'Dashboard - Kasi Mall Online';
include_once("functions/db.php");
include_once("functions/functions.php"); 
include('includes/header.php');
?>
<?php if (isset($_SESSION['a_email']) && isset($_SESSION['a_id']) && $_SESSION['user_type'] = 'admin') : ?>


<body>
  <div class="wrapper ">

    <?php include('includes/sidebar.php'); ?>




    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/nav.php'); ?>
      <!-- End Navbar -->


      <div class="content">
        <div class="container-fluid">
          <div class="mb-4 login-card mx-auto" style="max-width:550px;">
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>
          </div>
        </div>
      </div>


    </div>
  </div>



  <?php include('includes/footer.php'); ?>

  <?php else : ?>
    <?php
    $_SESSION["errorMessage"] =  "Please Sign in or Sign up.";
    echo "<script>window.open('login/index.php','_self')</script>";
    ?>
<?php endif ?>