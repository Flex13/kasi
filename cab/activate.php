<?php
include("functions/main.php");
$page_title = 'Activate - A2B'; ?>
<?php include('includes/appheader.php');
include('functions/classes/activate.class.php');
?>
<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/a2b.jpg"></a>
        </div>
    </div>

    <div class="card login-card">

        <div class="card-body">
            <center>
                <form class="" action="" method="post">
                    <?php if (isset($result)) echo $result; ?>
                    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                </form>

            </center>

        </div> <!-- card-body.// -->
    </div>
</section>


<?php include('includes/appfooter.php'); ?>