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


            <output>
                <div class="row">
                    <aside class="col-lg-12">
                        <div class="container section-heading">
                            <h1 class="section-title text-center">iTrolley <i class="fas fa-shopping-cart"></i></h1>
                        </div>
                        <div class="card mb-3">

                            <div class="table-responsive">

                                <table class="table table-borderless table-shopping-cart">
                                    <thead class="text-muted">
                                        <tr class="small text-uppercase">
                                            <th scope="col">Product</th>
                                            <th scope="col" width="120">Store</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right d-none d-md-block" width="200"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <figure class="itemside align-items-center">
                                                    <div class="aside"><img src="images/food.jpg" class="img-sm"></div>
                                                    <figcaption class="info">
                                                        <a href="#" class="title text-dark">Muncheezz Braai Pack</a>
                                                        <p class="text-muted small">Braai Meet</p>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td>
                                                <p class="m-0"><a href="shops.php">Muncheezz</a></p>
                                                <small class="text-muted"><a href="amakasi.php">Soweto</a></small>
                                            </td>
                                            <td>
                                                <p class="m-0">R80.00</p>
                                                <small class="text-muted"> R40 each </small>
                                            </td>
                                            <td class="text-right d-none d-md-block">
                                                <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="far fa-heart product-heart"></i></a>
                                                <a href="" class="btn btn-light"> Remove</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div> <!-- table-responsive.// -->

                            <div class="card-body border-top">
                                <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
                            </div> <!-- card-body.// -->

                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->
                    <aside class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Total price:</dt>
                                    <dd class="text-right">R80.00</dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Discount:</dt>
                                    <dd class="text-right text-danger">- R10.00</dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right text-dark b"><strong>R70.00</strong></dd>
                                </dl>
                                <hr>

                                <div class="container mb-5">
                                    <div class="row">
                                        <div class="d-none d-lg-block col"></div>
                                        <div class="d-none d-lg-block col"></div>
                                        <div class="col">
                                            <p class="checkout-text"><i class="fas fa-lock"></i> Sercure payment powered by</p>
                                            <img src="images/payfast.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="d-none d-lg-block col"></div>
                                        <div class="d-none d-lg-block col"></div>

                                        <div class="col">
                                            <a href="shops.php" class="btn btn-primary-cont"><i class="fa fa-chevron-left"></i> Shops</a>
                                        </div>
                                        <div class="col">
                                            <a href="checkout.php" class="btn btn-primary-checkout"> Checkout</a>
                                        </div>
                                    </div>
                                </div>



                            </div> <!-- card-body.// -->
                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </output>







        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>