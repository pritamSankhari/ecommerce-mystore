<nav class="navbar admin-navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <!-- Brand -->
  <a class="navbar-brand" href="<?= site_url('admin') ?>">My Store</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#"><?= $_SESSION['admin']['id']?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('admin/show_orders') ?>">Orders</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('admin/add_product') ?>">Add Product</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('admin/add_category') ?>">Add Category</a>
    </li>
    
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Settings
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item bg-light" href="#">General Settings</a>
        <form class="dropdown-item bg-light" action="<?= site_url('admin/signout')?>" method="post">
          <!-- <button class="btn btn-dark">Sign out</button> -->
          <input type="submit" class="btn btn-dark" name="signout" value="Sign out">
        </form>
      </div>
    </li>
  </ul>
  <div class="search-bar">
    <form class="form-inline" action="/action_page.php">
      <input id="_search_input_admin" class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    </div>
</nav> 