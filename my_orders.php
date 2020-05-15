<?php
include("functions/main.php");
$page_title = 'iTrolley - Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>
            <?php include('functions/classes/cart.class.php'); ?>


            <aside class="col-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if (isset($result)) echo $result; ?>
                    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                    <div class="section-heading">
                        <h3 class="section-title">My Orders</h3>
                    </div>
                    
                    <div class="card">

                    


                    </div> <!-- card.// -->

                </form>
            </aside>







        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>