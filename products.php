<?php
include("functions/main.php");
$page_title = 'Products - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>
            <?php include_once('functions/classes/products.class.php'); ?>

            <header class="section-heading">
                <h3 class="section-title text-center">Our Products</h3>
            </header><!-- sect-heading -->
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>
            <div class="row">
                <?php
                while ($rs = $statement->fetch()) {
                    $shop_id = $rs['m_id'];
                    $product_id = $rs['product_id'];
                    $category  = $rs['cat_name'];
                    $product_name  = $rs['product_name'];
                    $product_price  = $rs['product_price'];
                    $product_description  = $rs['product_description'];
                    $product_image  = $rs['product1'];
                ?>
                    <div class="col-12">
                    <form class="" action="" method="post" enctype="multipart/form-data">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="sell/<?php if (isset($product_image)) echo $product_image; ?>">
                                </div>
                                <figcaption class="info-wrap border-top">
                                <input name="hidden_product_id" value="<?php if (isset($product_id)) echo $product_id; ?>" type="hidden">

                                <?php if(isset($_SESSION['id'])) :?>
                                    <button type="submit" name="likeProduct" class="heart float-right" ><i class="far fa-heart product-heart"></i></button>
                                    <?php else : ?>
                                        <?php endif?>
                                
                                    <a href="#" class="title"><?php if (isset($product_name)) echo $product_name; ?></a>
                                    <p class="merchant-description"><?php if (isset($product_description)) echo $product_description; ?></p>
                                    <div class="price mt-2">R<?php if (isset($product_price)) echo $product_price; ?></div> <!-- price-wrap.// -->
                                </figcaption>
                                <a href="functions/classes/addtocart.class.php?product_id=<?php if (isset($product_id)) echo $product_id; ?>" class="btn btn-sm btn-outline-primary btn-product float-right">Add to cart <i class="fa fa-shopping-cart "></i></a>
                            </figure> <!-- card // -->
                        </form>
                    </div>
                <?php     } ?>
            </div>

        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>