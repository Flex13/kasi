<?php
include("functions/main.php");
$page_title = 'iTrolley - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/order.class.php');
?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">


            <div class="container" align="center">
                <div class="col-12 logo-padding">
                    <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
                </div>
            </div>

            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>


            <section>
                <div class="card">
                    <article class="card-body">
                        <header class="mb-4">
                            <h4 class="card-title">My Order</h4>
                        </header>


                        
                        <div class="row">

                            <?php
                            while ($rs = $statement->fetch()) {
                                $cart_id = $rs['cart_id'];
                                $shop_id = $rs['m_id'];
                                $product_id  = $rs['product_id'];
                                $quantity  = $rs['quantity'];
                                $unit_price  = $rs['unit_price'];
                                $total_price  = $rs['total_price'];
                                $product_image  = $rs['product_image'];
                                $shop_name  = $rs['shop_name'];
                                $product_name  = $rs['product_name'];
                            
                            ?>
                            <div class="col-md-6">
                                <figure class="itemside  mb-3">
                                    <div class="aside"><img src="sell/<?php if (isset($product_image)) echo $product_image; ?>" class="border img-xs"></div>
                                    <figcaption class="info">
                                        <p><?php if (isset($product_name)) echo $product_name; ?></p>
                                        <span><?php if (isset($quantity)) echo $quantity ; ?> x <?php if (isset($unit_price )) echo $unit_price; ?> = Total: <?php if (isset($total_price)) echo $total_price; ?> </span>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                        <?php }?>
                        </div> <!-- row.// -->
                    </article> <!-- card-body.// -->



                    <article class="card-body border-top">

                        <dl class="row">
                            <dt class="col-sm-10">Subtotal: <span class="float-right text-muted">2 items</span></dt>
                            <dd class="col-sm-2 text-right"><strong>$1,568</strong></dd>

                            <dt class="col-sm-10">Discount: <span class="float-right text-muted">10% offer</span></dt>
                            <dd class="col-sm-2 text-danger text-right"><strong>$29</strong></dd>

                            <dt class="col-sm-10">Delivery charge: <span class="float-right text-muted">Express delivery</span></dt>
                            <dd class="col-sm-2 text-right"><strong>$120</strong></dd>

                            <dt class="col-sm-10">Tax: <span class="float-right text-muted">5%</span></dt>
                            <dd class="col-sm-2 text-right text-success"><strong>$7</strong></dd>

                            <dt class="col-sm-10">Total:</dt>
                            <dd class="col-sm-2 text-right"><strong class="h5 text-dark">$1,650</strong></dd>
                        </dl>

                        <input type="submit" name="submitOrder" class="btn btn-primary-login btn-block" value="Submit Order">
                        <a href="shops.php" class="btn btn-primary-cont btn-block"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                    </article> <!-- card-body.// -->
                </div>
            </section>







        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>