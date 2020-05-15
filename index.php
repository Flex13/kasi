<?php
include("functions/main.php");
$page_title = 'Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>

            <header class="section-heading">
                <h4 class="section-title">Top picks of the day</h4>
            </header><!-- sect-heading -->

            <section>
                <div id="jssor_1" class="topPicks">
                    <!-- Loading Screen -->
                    <!-- Start Pictures -->
                    <div data-u="slides" class="topPicks-images">
                        <div>
                            <img data-u="image" src="images/food.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/fashion.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/spinza2.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/food.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/foodmarket.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/products1.jpeg" />
                        </div>
                        <div>
                            <img data-u="image" src="images/Spinza.jpg" />

                        </div>
                    </div>

                </div>
            </section>




            <header class="section-heading">
                <h4 class="section-title">Amakasi </h4>
            </header><!-- sect-heading -->




            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card bg-dark">
                            <img src="images/alex2.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Alex</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/soweto3.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Soweto</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/vaal3.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Vaal</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/soweto4.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Soweto</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/shap.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Vaal</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/alex3.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Alex</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="card bg-dark">
                            <img src="images/vaal4.jpg" class="card-img opacity">
                            <div class="card-img-overlay text-white">
                                <div class="carousel-caption  d-md-block">
                                    <h4 class="card-title">Vaal</h4>
                                    <a href="shops.php" class="btn btn-primary-banner">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <header class="section-heading">
                <h4 class="section-title">Categories</h4>
            </header><!-- sect-heading -->

            <section>
                <div class="row">
                <div class="col-12">
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
                    </form>
                </div>

                <div class="col-12">
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
                    </form>
                </div>

                <div class="col-12">
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
                    </form>
                </div>
                </div>
                
            </section>

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


        </div> <!-- container .//  -->



    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>