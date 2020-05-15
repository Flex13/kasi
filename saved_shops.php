<?php
include("functions/main.php");
$page_title = 'Wishlist - Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container-fluid" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>
            <?php include('functions/classes/wishlist.class.php'); ?>


            
            <header class="section-heading">
                <h3 class="section-title text-center">My Wishlist</h3>
            </header><!-- sect-heading -->
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>

 <!-- =========================  COMPONENT WISHLIST ========================= -->
 <article class="card">
                    <div class="card-body">

                        <div class="row">
                            <?php
                            while ($rs = $statement->fetch()) {
                                $shop_id = $rs['shop_id'];
                                $product_id = $rs['product_id'];
                                $product_name  = $rs['product_name'];
                                $product_price  = $rs['product_price'];
                                $product_description  = $rs['product_description'];
                                $product_image  = $rs['product_image'];
                                $shop_name  = $rs['shop_name'];
                            ?>
                                <div class="col-12">
                                    <figure class="itemside mb-4">
                                        <div class="aside"><img src="sell/<?php if (isset($product_image)) echo $product_image; ?>" class="border img-md"></div>
                                        <figcaption class="info">
                                            <a href="#" class="title"><?php if (isset($product_name)) echo $product_name; ?></a>
                                            <a href="#" class="title"><?php if (isset($product_description)) echo $product_description; ?></a>
                                            <p class="price">R<?php if (isset($product_price)) echo $product_price; ?></p>
                                            <p class="price mb-2"><?php if (isset($shop_name)) echo $shop_name; ?></p>
                                            <a href="functions/classes/addtocartwishlist.class.php?product_id=<?php if (isset($product_id)) echo $product_id; ?>" class="btn btn-primary btn-sm"> Add to cart </a>
                                            <a href="functions/classes/deletewishlist.class.php?deletewishlist=<?php if (isset($product_id)) echo $product_id; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Remove from wishlist"> <i class="fa fa-times"></i> </a>
                                        </figcaption>
                                    </figure>
                                </div> <!-- col.// -->
                            <?php     } ?>
                        </div> <!-- row .//  -->

                    </div> <!-- card-body.// -->
                </article>
                <!-- =========================  COMPONENT WISHLIST END.// ========================= -->



               
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>