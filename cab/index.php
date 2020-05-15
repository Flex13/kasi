<?php
include("functions/main.php");
$page_title = 'iDelivery - A2B';
include('includes/appheader.php');
include('functions/classes/cab_login.class.php');
?>


<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="../index.php" class="brand-wrap"><img class="logo-login" src="images/a2b.jpg"></a>
        </div>
    </div>

   
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
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cab_index.php"><i class=" fas fa-car nav-icons"></i><br>iRide</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="../index.php"><i class=" fas fa-store-alt nav-icons"></i><br>eMall</a>
            </li>

            </li>
            <li class="nav-item">
                <a class="nav-link menu-icon <?php if ($page_title == 'Kasi Mall Online') {
                                                    echo "active";
                                                } ?> " href="cab_login.php"><i class=" fas fa-sign-in-alt nav-icons"></i><br>Login</a>
            </li>

        </ul>
    </nav>
</section>


<?php include('includes/appfooter.php'); ?>