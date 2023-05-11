<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="home.php">ROENG RANG SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="cart.php">ตะกร้า</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">คำสั่งซื้อ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="goShop.php">โหมดร้านค้า</a>
        </li>
      </ul>
      <form class="d-flex m-1" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" width="80px" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['fname']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="uOrder.php">Order</a></li>
            <li><a class="dropdown-item" href="#">Disabled</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/roengrang/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>