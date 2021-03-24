 <nav class="navbar public-user-navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <!-- Brand -->
  <a class="navbar-brand" href="<?= site_url('main') ?>">My Store</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#"><?= $_SESSION['user']['name']?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('user/my_orders') ?>">My Orders</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Settings
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item bg-light" href="#">Account Settings</a>
        <form class="dropdown-item" action="<?= site_url('user/signout')?>" method="post">
          <!-- <button class="btn btn-dark">Sign out</button> -->
          <input type="submit" class="btn btn-dark" name="signout" value="Sign out">
        </form>
      </div>
    </li>
  </ul>
  <div class="search-bar">
    <form class="form-inline" action="">
      <input id="_search_input" class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    </div>
</nav> 
