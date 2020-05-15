<?php
include("functions/main.php");
$page_title = 'iDelivery - A2B';
include('includes/appheader.php');
include('functions/classes/cab_index.class.php');
?>

<body>
    <?php if (isset($_SESSION['cab_email'])) : ?>

        <section>
            <nav class="navbar navbar-expand-lg navbar-main border-bottom">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav7" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav7">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="up_profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Mall</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cab_index.php">Ride</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div> <!-- collapse .// -->
                </div> <!-- container .// -->
            </nav>
        </section>
        <section>
            <nav class="container fixed-bottom header-nav logo-padding">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                            echo "active";
                                                        } ?> " href="cab_index.php"><i class=" fas fa-car nav-icons2"></i><br>iRide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                            echo "active";
                                                        } ?> " href="index.php"><i class="fas fa-store-alt nav-icons2"></i><br> eMall</a>
                    </li>

                </ul>
            </nav>
        </section>
        <section class="section-content">
            <div class="container-fluid p-0 m-0">

                <section class="container-fluid p-0">
                    <div class="align-items-start col-12 justify-content-md-center p-0">
                        <iframe width="100%" height="300px" src="https://maps.google.com/maps?width=700&amp;height=700&amp;hl=en&amp;q=<?php echo htmlentities($city); ?>, <?php echo htmlentities($province); ?>+(Title)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </section>

                <section>
                    <div class="card map-heading">
                        <div class="card-body d-flex map-heading-body"><br><br>
                            <header class="section-heading">
                                <h6 class="">Eat Local</h6>
                                <p>Get your order today</p>
                            </header><!-- sect-heading -->
                        </div>
                    </div>
                </section>

                <section>
                    <div class="card">
                        <article class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col form-group map-form-group">
                                        <h4>Where to??</h4>
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group map-form-group">
                                        <input type="text" class="form-control" placeholder="Where are you going?">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row end.// -->


                            </form>
                        </article> <!-- card-body end .// -->
                    </div>
                </section>



            </div> <!-- container .//  -->
        </section>
        <!-- ========================= SECTION CONTENT END// ========================= -->

        <?php include('includes/appfooter.php'); ?>

    <?php else : ?>
        <?php
        $_SESSION["errorMessage"] =  "To view iRides - Please Sign in or Sign up.";
        echo "<script>window.open('cab_login.php','_self')</script>";
        ?>
    <?php endif ?>