<?php
include("functions/main.php");
$page_title = 'Payment - Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
        <?php include_once('functions/classes/payment.class.php'); ?>
        <?php if (isset($_SESSION['id'])) : ?>
            <?php include_once('functions/classes/payment.class.php'); ?>
            <div class="container" align="center">
                <div class="col-12 logo-padding">
                    <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
                </div>
            </div>

            <div class="section-heading">
                <h3 class="section-title">Payment Method</h3>
            </div>

            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>

            <section>
                <div class="row">
                    <div class="col-12">
                    <a href="order.php?payment=COD&mid=<?php if (isset($shop_id)) echo $shop_id; ?>"><article class="card card-body">
                            <figure class="text-center">
                                <span class="rounded-circle icon-md bg-primary"><i class="fas fa-wallet"></i></span>
                                <figcaption class="pt-4">
                                    <h5 class="title">Cash on Delivery</h5>
                                    <p>Pay when order arrives at your home</p>
                                </figcaption>
                            </figure> <!-- iconbox // -->
                        </article></a> <!-- panel-lg.// -->
                    </div>

                    <div class="col-12 mt-4">
                        <a href="bank.php?payment=bank&uid=<?php if (isset($encode_id)) echo $encode_id; ?>"><article class="card card-body">
                            <figure class="text-center">
                                <span class="rounded-circle icon-md bg-primary"><i class="fab fa-cc-mastercard"></i></span>
                                <figcaption class="pt-4">
                                    <h5 class="title">Direct Bank Transfer</h5>
                                    <p>Bank Online Payment</p>
                                </figcaption>
                            </figure> <!-- iconbox // -->
                        </article></a> <!-- panel-lg.// -->
                    </div>
                </div>
            </section>







        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>

    
<?php else : ?>
    <?php
                $_SESSION["errorMessage"] =  "Please Sign in or Sign up.";
                echo "<script>window.open('login.php','_self')</script>";
    ?>
<?php endif ?>