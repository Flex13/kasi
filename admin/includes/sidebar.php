


<div class="sidebar" data-color="orange" data-background-color="orange">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      KASI ADMIN
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php if ($page_title == 'Dashboard - Kasi Mall Online') {
                              echo "active";
                            } ?>">
        <a class="nav-link" href="index.php">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="nav-item <?php if ($page_title == 'Customer - Kasi Mall Online') {
                              echo "active";
                            } ?>">
        <a class="nav-link" href="customer.php?customer">
          <i class="material-icons">person</i>
          <p>Customer</p>
        </a>
      </li>

      <li class="nav-item <?php if ($page_title == 'Suppliers - Kasi Mall Online') {
                              echo "active";
                            } ?>">
        <a class="nav-link" href="supplier.php?suppliers">
          <i class="material-icons">storefront</i>
          <p>Suppliers</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page_title == 'Admin - Kasi Mall Online') {
                              echo "active";
                            } ?>">
        <a class="nav-link" href="admin.php?admin">
          <i class="material-icons">person</i>
          <p>Admin</p>
        </a>
      </li>

      <li class="nav-item <?php if ($page_title == 'Logout - Kasi Mall Online') {
                              echo "active";
                            } ?>">
        <a class="nav-link" href="logout.php">
          <i class="material-icons">power_settings_new</i>
          <p>Logout</p>
        </a>
      </li>


      <!-- your sidebar here -->
    </ul>
  </div>
</div>