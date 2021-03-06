<?php

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>



<section class="header-main">
    <div class="container">
        <div class="row">
            

            <div class="col-5 logo-padding ">
                <a href="index.php" class="brand-wrap"><img class="logo img-fluid" src="images/kasi-logo.jpg"></a>
            </div>

            
            

            
            <div class="col-7 logo-padding">    
				<div class="d-flex justify-content-end nav-padding-top">
					<div class="widget-header sign-in">
						<small class="title text-muted">Welcome guest!</small>
						<div> 
                        <?php if (!isset($_SESSION['c_email']) || !isset($_SESSION['id'])) : ?>
							<a class=" text-dark top-nav" href="login.php">Sign in</a> 
                            <span class="dark-transp"> | </span>
							<a class="top-nav" href="m_reg.php"> Register</a>

                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link top-nav" href="mykasi.php"><?php if (isset($name)) echo $name; ?> <i class=" ml-2 header-icons fas fa-user"></i></a>
                        </li>
                    <?php endif ?>

						</div>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div>
           
        </div>

    </div> <!-- container.// -->
</section>




<section>
    <nav class="container-fluid fixed-bottom header-nav logo-padding">
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
                <a class="nav-link menu-icon" href="#"><i class=" fas fa-question-circle nav-icons"></i><br> Help</a>
            </li>
        </ul>
    </nav>
                                            </section>
    </header> <!-- section-header.// -->