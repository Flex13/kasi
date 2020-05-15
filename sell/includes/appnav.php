<section class="header-main">
    <div class="container p-0">
        <div class="row">
            <div class="col-12 logo-padding">
                <center><a href="../index.php" class="brand-wrap"><img class="logo" src="images/kasilogo.jpg"></a></center>
            </div>

        </div>

    </div> <!-- container.// -->
</section>


<section>
    <nav class="container fixed-bottom header-nav logo-padding">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Amakasi - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../amakasi.php"><i class=" fas fa-map-pin nav-icons"></i><br>Amakasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'diShopo - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../shops.php"><i class="fas fa-store-alt nav-icons"></i><br> diShopo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'iTrolley - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../cart.php"><i class="fas fa-shopping-cart nav-icons"></i><br> iTrolley</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-search nav-icons"></i><br> Search</a>
            </li>
        </ul>
    </nav>
</section>
</header> <!-- section-header.// -->