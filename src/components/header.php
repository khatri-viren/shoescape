<?php
require_once(__DIR__ . '/../logicFiles/functions.php');
$cart_count = 0;
$cart_items = [];
$cart_total = 0;
$my_cart_counter = 0;
if (isset($_SESSION['cart'])) {
  if (is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array_reverse($_SESSION['cart']);
    foreach ($_SESSION['cart'] as $key => $item) {
 
      $cart_total += $item['price'] * $item['quantity'];    // multiply with $item['quantity'] to get total price
      $my_cart_counter++;
      if ($my_cart_counter > 5) {
        continue;
      }
      $cart_items[] = $item;
    }
 
    $cart_count = count($_SESSION['cart']);
  }

  // echo "<pre>";
  // print_r($_SERVER['REQUEST_URI']);
  // print_r($active);
  // die();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ShoeScape</title>
  <!-- Viewport-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon and Touch Icons-->
  <meta name="theme-color" content="#ffffff">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
  <link rel="stylesheet" href="vendor/tiny-slider/dist/tiny-slider.css">
  <script>
    document.onkeydown = function(evt) {
      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if (keyCode == 13) {
        //your function call here
        document.search_bar.submit();
      }
    }
  </script>

</head>
<!-- Body -->

<body class="handheld-toolbar-enabled">

  <main class="page-wrapper">

    <!-- Navbar 3 Level (Light)-->
    <header class="shadow-sm">

      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="<?= url(''); ?>">
              <img src="img/logofull-b.png" width="200" alt="ShoeScape">
            </a>
            <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="<?= url(''); ?>">
              <img src="img/logofull-b.png" width="74" alt="ShoeScape">
            </a>
            <div class="input-group d-none d-lg-flex mx-4">
              <form action="search.php" method="post" name="search_bar" class="w-100">
                <input class="form-control rounded-end pe-5" name="search" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
              </form>
            </div>

            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
              </a><a class="navbar-tool d-none d-lg-flex" href="wishlist.php"><span class="navbar-tool-tooltip">Wishlist</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
              </a>

              <?php if (is_logged_in()) { ?>
                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="orders.php">
                <?php } else { ?>
                  <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="login.php" data-bs-toggle="modal">
                  <?php }  ?>

                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                  <div class="navbar-tool-text ms-n3">
                    <?php if (is_logged_in()) { ?>
                      <small>Hello, <?= $_SESSION['user']['first_name'] ?> </small>
                    <?php } else { ?>
                      <small><a href="login.php">Hello, Sign in</a></small>
                    <?php } ?>
                    My Account
                  </div>
                  </a>
                  <div class="navbar-tool dropdown ms-3">
                    <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="cart.php"><span class="navbar-tool-label"><?= $cart_count ?></span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="cart.php"><small>My Cart</small>$<?= $cart_total ?></a>
                    <!-- Cart dropdown-->
                    <div class="dropdown-menu dropdown-menu-end">
                      <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                        <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">

                          <?php
                          foreach ($cart_items as $key => $item) {
                            // echo "<pre>";
                            // print_r($item);
                            // die();
                          ?>
                            <div class="widget-cart-item pb-2 border-bottom">
                              <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true"><a href="./src/logicFiles/cart-process-remove.php?id=<?= $item['sst_id'] ?>">&times;</a></span></button>
                              <div class="d-flex align-items-center"><a class="flex-shrink-0" href="product.php?id=<?= $item['gst_id'] ?>"><img src="<?= get_image_thumb($item['image']) ?>" width="64" alt="Product"></a>
                                <div class="ps-2">
                                  <h6 class="widget-product-title"><a href="product.php?id=<?= $item['gst_id'] ?>"><?= $item['product_name'] ?></a></h6>
                                  <div class="widget-product-meta"><span class="text-accent me-2">$<?= $item['price'] ?></span><span class="text-muted">x <?= $item['quantity'] ?></span></div>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                          <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent fs-base ms-1">$<?= $cart_total ?></span></div><a class="btn btn-outline-secondary btn-sm" href="cart.php">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                        </div><a class="btn btn-primary btn-sm d-block w-100" href="checkout.php"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Search for products">
              </div>
              <!-- Departments menu-->
              <!-- Primary menu-->
              <ul class="navbar-nav mx-auto">
                <li class="nav-item "><a class="nav-link" href="/shoeshopv2/">Home</a>
                </li>
                <li class="nav-item "><a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item "><a class="nav-link" href="#">Contact Us</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </header>

    <?php
    if (isset($_SESSION['alert'])) {
    ?>
      <div class="container mt-3">
        <div class="alert alert-<?= $_SESSION['alert']['type'] ?>">
          <?= $_SESSION['alert']['message'] ?>
        </div>
      </div>
    <?php unset($_SESSION['alert']);
    } ?>