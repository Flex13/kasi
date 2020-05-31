<?php
include("functions/main.php");
$page_title = 'Kasi Mall Online';
include('includes/appheader.php');
?>

<body  style="margin:0;">
    <section class="container-fluid section-content"  style="margin-bottom: 100px">
        <div class="container-fluid p-0">
            <?php include('includes/includes_main.php'); ?>
            <?php include('functions/classes/product_likes.class.php'); ?>

            

            <!--Main-->

            <div class="container section-heading">
                <h3 class="section-title text-center">Top Picks Of The Day</h3>
            </div>

            <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

            <!--Second Slider-->
            <div class="container-fluid p-0">
            <div class="site-slider-three">
                    <div class="row slider-three text-center">




<?php include('admin/slides/products/top_pics.php'); ?>


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

                    <?php
 //fetching all the categories from Database
 global $db;
 $sqlQuery1 = "SELECT * FROM kasi WHERE activated= :value";
 $stmt = $db->prepare($sqlQuery1);
 $stmt->execute(array(':value' => '1'));

 while ($rs = $stmt->fetch()) { 
    $locaition_id = $rs['location_id'];
    $kasi_province = $rs['province'];
    $kasi_name = $rs['name'];
    $image = $rs['image1'];
    $city = $rs['city'];
    $activated = $rs['activated'];
    $alt_name= $rs['alt_name'];
                    ?>


                        <div class="showcase" style="background-image: linear-gradient(rgba(248,249,250,0.1), rgba(248,249,250,0.1)), url('admin/uploads/amakasi/<?php if (isset($image)) echo $image; ?>'); ">

                        
                        <?php
 //fetching all the categories from Database
 global $db;
 $sqlQuery1 = "SELECT * FROM merchant WHERE activated= :value AND shop_kasi = :kasi";
 $stmt = $db->prepare($sqlQuery1);
 $stmt->execute(array(':value' => '1', ':kasi' => $kasi_name));

 while ($rs = $stmt->fetch()) { 
    $shop_image= $rs['m_image'];
                    ?>


                            <div class="container amakasi-padding">
                                <h3 class="section-title "><?php if (isset($kasi_name)) echo $kasi_name; ?> /  <?php if (isset($alt_name)) echo $alt_name; ?></h3>

                                <div class="row shop-images d-none d-md-flex">
                                    <div class="col ">
                                        <img src="admin/uploads/suppliers/<?php if (isset($shop_image)) echo $shop_image; ?>" alt="shop1" class="img-fluid">
                                    </div>
                                    <div class="col ">
                                        <img src="admin/uploads/suppliers/<?php if (isset($shop_image)) echo $shop_image; ?>" alt="shop1" class="img-fluid">
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

 <?php } ?>


                            <div class="container">
                                <div class="row showcase-button">
                                    <a href="shops.php?shops=<?php if (isset($kasi_name)) echo $kasi_name; ?>" class="btn btn-primary-cart ">
                                        <!-- btn btn-default Begin -->
                                        View all stores <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>




                        </div>

                    <?php  } ?>    

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



                    <?php include('admin/slides/categories/index_categories.php'); ?>



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