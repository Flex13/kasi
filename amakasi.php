<?php
include("functions/main.php");
$page_title = 'Amakasi - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/locations.class.php');
?>


<body>
    <section class="section-content">
        <div class="container" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>

            <header class="section-heading">
                <h3 class="section-title text-center">Amakasi</h3>
            </header><!-- sect-heading -->
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?><?php echo successMessage(); ?>
            <div class="row">

                <?php while ($rs = $fetchKasi->fetch()) {
                    $id = $rs['location_id'];
                    $province = $rs['province'];
                    $name = $rs['name'];
                    $image1 = $rs['image3'];
                ?>
                    <div class="col-12">
                        <form class="" action="" method="post" enctype="multipart/form-data">
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('images/<?php if (isset($image1)) echo $image1 ?>');">
                                        </div>
                                        <div class="text-bottom">
                                        <input name="hidden_kasi_id" value="<?php if (isset($id )) echo $id ; ?>" type="hidden">
                                            <?php if (isset($_SESSION['id'])) : ?>
                                                <button type="submit" name="likeKasi" class="heart"><i class="far fa-heart product-heart"></i></button>
                                            <?php else : ?>
                                            <?php endif ?>
                                            <a style="color: white;" href="shops.php?kasi=<?php if (isset($name)) echo $name; ?>">
                                                <h5 class="title"> <?php if (isset($name)) echo $name; ?></h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                <?php } ?>

            </div>
        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <?php include('includes/appfooter.php'); ?>