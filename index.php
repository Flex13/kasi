<?php
include("functions/main.php");
$page_title = 'Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="container-fluid section-content" style="margin-bottom: 100px;">
        <div class="container-fluid p-0">
            <?php include('includes/includes_main.php'); ?>

            <!--Main-->

            <div class="container section-heading">
                <h3 class="section-title text-center">Top Picks Of The Day</h3>
            </div>

            <!--Second Slider-->
            <div class="container-fluid p-0">
                <div class="site-slider-two px md-4">
                    <div class="row slider-two text-center">

                        <div class="col-md-4 kasi">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="images/food.jpg" class="img-fluid" alt="product1">
                                    <span class="topbar">
                                        <a href="#" class="float-right"><i class="far fa-heart product-heart"></i></a>
                                    </span>
                                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">Braai Pack</a>
                                    <a href="#" class="shop-name">Muncheez</a><br>
                                    <a href="#" class="kasi-name">Soweto</a>
                                    <div class="price mt-2">R80.00</div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div>


                        <div class="col-md-4 kasi">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="images/fashion.jpg" class="img-fluid" alt="product1">
                                    <span class="topbar">
                                        <a href="#" class="float-right"><i class="far fa-heart product-heart"></i></a>
                                    </span>
                                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">New Fashion trend</a>
                                    <a href="#" class="shop-name">PSA</a><br>
                                    <a href="#" class="kasi-name">Vaal</a>
                                    <div class="price mt-2">R150.00</div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div>

                        <div class="col-md-4 kasi">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="images/products1.jpeg" class="img-fluid" alt="product1">
                                    <span class="topbar">
                                        <a href="#" class="float-right"><i class="far fa-heart product-heart"></i></a>
                                    </span>
                                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">Donuts</a>
                                    <a href="#" class="shop-name">Muncheez</a><br>
                                    <a href="#" class="kasi-name">Soweto</a>
                                    <div class="price mt-2">R35.00</div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div>

                        <div class="col-md-2 kasi">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="images/Spinza.jpg" class="img-fluid" alt="product1">
                                    <span class="topbar">
                                        <a href="#" class="float-right"><i class="far fa-heart product-heart"></i></a>
                                    </span>
                                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">Artchar</a>
                                    <a href="#" class="shop-name">Muncheez</a><br>
                                    <a href="#" class="kasi-name">Soweto</a>
                                    <div class="price mt-2">R35.00</div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div>

                        <div class="col-md-4 kasi">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="images/spinza2.jpg" class="img-fluid" alt="product1">
                                    <span class="topbar">
                                        <a href="#" class="float-right"><i class="far fa-heart product-heart"></i></a>
                                    </span>
                                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">Drinks</a>
                                    <a href="#" class="shop-name">Muncheez</a><br>
                                    <a href="#" class="kasi-name">Soweto</a>
                                    <div class="price mt-2">R50.00</div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div>


                    </div>

                    <div class="slider-btn">
                        <span class="prev position-top"><i class="fas fa-chevron-left fa-2x text-secondary"></i></span>
                        <span class="next position-top right-0"><i class="fas fa-chevron-right fa-2x text-secondary"></i></span>
                    </div>
                </div>
            </div>
            <!--Second Slider End-->

            <div class="container section-heading">
                <h3 class="section-title text-center">Amakasi</h3>
            </div>


            <div class="container-fluid p-0">
                <div class="site-slider">
                    <div class="row slider-one">

                        <div class="showcase" style="background-image: linear-gradient(rgba(248,249,250,0.1), rgba(248,249,250,0.1)), url('images/alex-showcase.jpg'); ">
                            <div class="container amakasi-padding">
                                <h3 class="section-title ">Alex/Gomora</h3>
                                <div class="row shop-images d-none d-md-flex">
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="container amakasi-padding">
                                <div class="row shop2-images">
                                    <div class="col-6 d-none d-md-block">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="row ">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="row shop2-bottom-row">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row showcase-button">
                                    <a href="shops.php" class="btn btn-primary-cart ">
                                        <!-- btn btn-default Begin -->
                                        View all stores <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>




                        </div>

                        <div class="showcase" style="background-image: linear-gradient(rgba(248,249,250,0.1), rgba(248,249,250,0.1)), url('images/soweto3.jpg'); ">
                            <div class="container amakasi-padding">
                                <h3 class="section-title">Soweto</h3>
                                <div class="row shop-images d-none d-md-flex">
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="container amakasi-padding">
                                <div class="row shop2-images">
                                    <div class="col-6 d-none d-md-block">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="row ">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="row shop2-bottom-row">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row showcase-button">
                                    <a href="shops.php" class="btn btn-primary-cart ">
                                        <!-- btn btn-default Begin -->
                                        View all stores <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>



                            
                        </div>

                        <div class="showcase" style="background-image: linear-gradient(rgba(248,249,250,0.1), rgba(248,249,250,0.1)), url('images/vaal3.jpg'); ">
                            <div class="container amakasi-padding">
                                <h3 class="section-title">Vaal</h3>
                                <div class="row shop-images d-none d-md-flex">
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="container amakasi-padding">
                                <div class="row shop2-images">
                                    <div class="col-6 d-none d-md-block">
                                        <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="row ">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="row shop2-bottom-row">
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <img src="images/food.jpg" alt="shop1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row showcase-button">
                                    <a href="shops.php" class="btn btn-primary-cart ">
                                        <!-- btn btn-default Begin -->
                                        View all stores <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>



                            
                        </div>

                    </div>
                    <div class="slider-btn">
                        <span class="prev position-top"><i class="fas fa-chevron-left fa-2x text-secondary"></i></span>
                        <span class="next position-top right-0"><i class="fas fa-chevron-right fa-2x text-secondary"></i></span>
                    </div>
                </div>




            </div>

            <div class="container section-heading">
                <h3 class="section-title text-center">Categories</h3>
            </div>

            <!--Second Slider-->
            <div class="container-fluid">
                <div class="site-slider-three">
                    <div class="row slider-three text-center">

                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/food.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0"> Food</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/spinza2.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0">Drinks</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/fashion.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0">Clothing</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/food.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0"> Food</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/spinza2.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0">Drinks</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/fashion.jpg');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0">Clothing</h4>
                                            </a>
                                            <a href="shops.php" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>

                    <div class="slider-btn">
                        <span class="prev position-top"><i class="fas fa-chevron-left fa-2x text-secondary"></i></span>
                        <span class="next position-top right-0"><i class="fas fa-chevron-right fa-2x text-secondary"></i></span>
                    </div>
                </div>
            </div>
            <!--Second Slider End-->


            <section>
                <div style="width: 100%; background-color: white; padding: 10px 0px 10px 0px; text-align: center; box-sizing: border-box;">
                    <a style="display: flex; justify-content: center; flex-wrap: wrap; width:100%; text-decoration:none; text-align:center;" href="https://sacoronavirus.co.za/">
                        <div class="main-corona-banner" style="display: inline-block; background-color: white; flex-grow: 2;">
                            <img style="width: 294px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/main.png" alt="South African Government COVID-19 Portal" />
                        </div>
                        <div style="display: flex; flex-grow: 4; justify-content: center; flex-wrap: wrap;">
                            <div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
                                <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
                                    <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/tested.png" alt="South Africa COVID-19 Tested Numbers" />
                                </div>
                                <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
                                    <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/positive.png" alt="South Africa COVID-19 Positive Cases" />
                                </div>
                            </div>
                            <div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
                                <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
                                    <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/cured.png" alt="South Africa COVID-19 Recovered Numbers" />
                                </div>
                                <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
                                    <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/deaths.png" alt="South Africa COVID-19 Death Numbers" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <div style="text-align: center; background-color: white;">
                        <a style="font-family: arial; text-decoration: none; font-size: 11px; color: #878787;" href="https://embrace.co.za/sacoronavirus-link">Linking to sacoronavirus.co.za is now required. Find out more and get the banner.</a>
                    </div>
                </div>
            </section>
    </section>
    <?php include('includes/appfooter.php'); ?>