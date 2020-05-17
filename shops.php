<?php
include("functions/main.php");
$page_title = 'diShopo - Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php include_once('functions/classes/shops.class.php'); ?>

<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>
            <div class="container section-heading">
                <h1 class="section-title text-center">diShopo <i class="fas fa-store-alt"></i></h1>
            </div>

            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>

            <div class="row">

                <?php
                while ($rs = $result->fetch()) {
                    $id = $rs['m_id'];
                    $shopname = $rs['m_shop_name'];
                    $province = $rs['m_province'];
                    $description = $rs['m_description'];
                    $city = $rs['m_city'];
                    $image = $rs['m_image'];

                ?>
                    <div class="col-12">

                        <div class="card login-card">
                            <div class="card-body">
                                <!-- ============================ COMPONENT BANNER 1 ================================= -->
                                <div class="card-banner" style="height:300px; background-image: url('sell/<?php if (isset($image)) echo $image; ?>');">
                                    <article class="card-body caption">
                                        <div class="shop-text-box">

                                            <h5 class="card-title"><?php if (isset($shopname)) echo $shopname; ?></h5>
                                            <p><?php if (isset($description)) echo $description; ?></p>
                                            <a href="products.php?mid=<?php if (isset($id)) echo $id; ?>" class="btn btn-warning shop-button"><i class="fa fas fa-store-alt mr-2"></i> Enter Shop</a><br>
                                            <input name="hidden_shop_id" value="<?php if (isset($id)) echo $id; ?>" type="hidden">
                                        </div>
                                    </article>
                                </div>
                                <!-- ======================= COMPONENT BANNER 1  END .// ============================ -->
                            </div>
                        </div>

                    </div>

                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>