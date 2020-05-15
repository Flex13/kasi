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
                        <h3 class="section-title">Shopping Cart</h3>
                    </div>
                    <small>All items in same shop will be processed together in checkout page</small>
                    <p class="text-muted">You currently have <?php if (isset($countIP)) echo $countIP; ?> item(s) in your cart</p>
                    <div class="card">

                        <div class="table-responsive">

                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted thead-dark text-center">
                                    <tr class="small text-uppercase">
                                        <th>Product Name</th>
                                        <th>Shop Name</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        <th>Delete</th>
                                        <th>Process Item</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    while ($rs = $statementCheckCart->fetch()) {
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
                                        <tr>
                                            <td><?php if (isset($product_name)) echo $product_name; ?></td>
                                            <td><?php if (isset($shop_name)) echo $shop_name; ?></td>
                                            <td>R<?php if (isset($unit_price)) echo $unit_price; ?></td>
                                            <td>R<?php if (isset($total_price)) echo $total_price; ?></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php if (isset($product_id)) echo $product_id; ?>"></td>
                                            <td><a href="delivery.php?p_id=<?php if (isset($product_id)) echo $product_id; ?>" class="btn btn-primary-checkout btn-block">Checkout</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div> <!-- table-responsive.// -->


                    </div> <!-- card.// -->

                    <div class="box-footer">


                        <!-- box-footer Begin -->
                        <div class="pull-left btn-secondary-left my-3">
                            <!-- pull-left Begin -->
                            <a href="shops.php" class="btn btn-primary-cont btn-block">
                                <!-- btn btn-default Begin -->
                                <i class="fa fa-chevron-left"></i> Continue Shopping
                            </a><!-- btn btn-default Finish -->
                        </div><!-- pull-left Finish -->



                        <div class="pull-right my-3">
                            <!-- pull-right Begin -->
                            <button type="submit" name="updateCart" class="btn btn-primary-cart btn-block">
                                <!-- btn btn-default Begin -->
                                <i class="fas fa-sync"></i> Update Cart
                            </button><!-- btn btn-default Finish -->

                        </div><!-- pull-right Finish -->

                        <input type="hidden" name="token" value="<?php if (function_exists('_token'))  echo _token(); ?>">
                    </div><!-- box-footer Finish -->
                </form>
            </aside>







        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>