<?php
include("functions/main.php");
$page_title = 'Saved Kasi - Kasi Mall Online';
include('includes/appheader.php');
?>

<body>
    <section class="section-content">
        <div class="container-fluid" style="margin-bottom: 100px;">
            <?php include('includes/includes_main.php'); ?>
            <?php include('functions/classes/saved_kasi.class.php'); ?>


            
            <header class="section-heading">
                <h3 class="section-title text-center">My Saved Kasi's</h3>
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
                                $kasi_id = $rs['kasi_id'];
                                $liked = $rs['liked'];
                                $user_id  = $rs['user_id'];
                                $kasi_province  = $rs['kasi_province'];
                                $kasi_city = $rs['kasi_city'];
                                $kasi_image  = $rs['kasi_image'];
                                $kasi_name  = $rs['kasi_name'];
                            ?>
                                <div class="col-12">
                                    <figure class="itemside mb-1">
                                        <div class="aside"><img src="images/<?php if (isset($kasi_image)) echo $kasi_image; ?>" class="border img-md"></div>
                                        <figcaption class="info">
                                            <a href="#" class="title"><?php if (isset($kasi_name)) echo $kasi_name; ?></a>
                                            <a href="#" class="title"><?php if (isset($kasi_province)) echo $kasi_province; ?></a>
                                            <a href="#" class="title"><?php if (isset($kasi_city)) echo $kasi_city; ?></a>
                                            <a href="shops.php?kasi=<?php if (isset($kasi_name)) echo $kasi_name; ?>" class="btn btn-primary btn-sm"> View </a>
                                            <a href="functions/classes/deletekasi.class.php?deletekasi=<?php if (isset($kasi_id)) echo $kasi_id; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Remove from Saved Locations"> <i class="fa fa-times"></i> </a>
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