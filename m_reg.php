<?php
include("functions/main.php");
$page_title = 'Kasi Mall Online';
include('includes/appheader.php');
?>

<body class="reg-background">
    <section class="container-fluid">

    <div class="card login-card-reg mx-auto" style="max-width: 480px;">
            <div class="card-body py-0">
                <div class="container section-heading">
                    <h2 class="reg-title text-center">Registration </h2>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="register.php" class="login-links">
                            <div class="container shadow p-4">
                                <h5 class="text-center m-0"><i class="fas fa-user reg-icon mx-2"></i> Customer</h5>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="shop_register.php" class="login-links">
                            <div class="container shadow p-4">
                                <h5 class="text-center m-0"><i class="fas fa-store-alt reg-icon mx-2"></i> Supplier</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="container section-heading">
                    <a href="index.php">
                        <h6 class="reg-title text-center">Back to home</h6>
                    </a>
                </div>






            </div> <!-- card-body.// -->
        </div>



    </section>








    <?php include('includes/appfooter.php'); ?>