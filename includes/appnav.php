<?php 

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>



<section class="header-main">
    <div class="container p-0">
        <div class="row">
            <div class="col-5 logo-padding">
                <a href="index.php" class="brand-wrap"><img class="logo" src="images/kasilogo.jpg"></a>
            </div>

            <div class="col-7 logo-padding ">
                <ul class="nav justify-content-end nav-padding-top">
                    <?php if (!isset($_SESSION['c_email'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="login.php">Sign in</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="mykasi.php">iAccount <i class=" ml-2 header-icons fas fa-user"></i></a>
                        </li>
                    <?php endif ?>
                </ul>


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
                                                } ?> " href="index.php"><i class=" fas fa-home nav-icons"></i><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Amakasi - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="amakasi.php"><i class=" fas fa-map-pin nav-icons"></i><br>Amakasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'diShopo - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="shops.php"><i class="fas fa-store-alt nav-icons"></i><br> diShopo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'iTrolley - Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cart.php"><i class="fas fa-shopping-cart nav-icons"></i><br> iTrolley (<?php if (isset($countIP)) echo $countIP; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-search nav-icons"></i><br> Search</a>
            </li>
        </ul>
    </nav>
</section>
</header> <!-- section-header.// -->