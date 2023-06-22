<?php
require_once('src/logicFiles/functions.php');
protected_area();
require_once('src/components/header.php');

$user_id = $_SESSION['user']['id'];
$orders = db_select('orders', " customer_id = $user_id ORDER BY order_date DESC");
// echo "<pre>";
// print_r($orders);
// die();
?>
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">My orders</h1>
    </div>
  </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <!-- Sidebar-->
    <?php require_once('src/components/account-sidebar.php') ?>
    <!-- Content  -->
    <section class="col-lg-8">
      <!-- Toolbar-->
      <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
        <div class="d-flex align-items-center">
        </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="./src/logicFiles/logout.php"><i class="ci-sign-out me-2"></i>Sign out</a>
      </div>
      <!-- Orders list-->
      <div class="table-responsive fs-md mb-4">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>Order No:</th>
              <th>Date Submitted | Updated</th>
              <!-- <th>Status</th> -->
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $key => $value) {
              // $ordered_items = json_decode($value['cart']);
              // echo "<pre>";
              // print_r($orders);
              // die();
            ?>
              <tr>
                <!-- <a href="#" data-toggle="modal" data-target="order-details"> -->
                <td class="py-3"><a class="nav-link-style fw-medium" href="#order-details<?= $value['ot_id'] ?>" data-bs-toggle="modal"><?= $value['ot_id'] ?></a></td>
                <td class="py-3"><?= date("d-m-Y H:i:s", $value['order_date']) ?></td>
                <td class="py-3"><?= $value['total_price'] ?></td>
                <!-- </a> -->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>

<?php foreach ($orders as $key => $value) {
  $ordered_items = json_decode($value['cart']);
              // echo "<pre>";
              // print_r($value);
              // die();
            ?>
<!-- Order details Modal -->
<div class="modal fade" id="order-details<?= $value['ot_id'] ?>"  tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order No -  <?= $value['ot_id'] ?></h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-0">
        <!-- Item-->
        <?php foreach ($ordered_items as $key => $item) { 
            //  echo "<pre>";
            //   print_r($item);
            //   die();
          ?>
        <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
          <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="<?= get_image_thumb($item->image) ?>" alt="Product"></a>
            <div class="ps-sm-4 pt-2">
              <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?= $item->product_name ?></a></h3>
              <div class="fs-sm"><span class="text-muted me-2">Size:</span><?= $item->size ?></div>
              <div class="fs-sm"><span class="text-muted me-2">Color:</span><?= $item->colour ?></div>
              <div class="fs-lg text-accent pt-2">$<?= $item->price ?></div>
            </div>
          </div>
          <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
            <div class="text-muted mb-2">Quantity:</div><?= $item->quantity ?>
          </div>
          <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
            <div class="text-muted mb-2">Subtotal</div>$<?= $item->price * $item->quantity ?>
          </div>
        </div>
      </div>
      <?php } ?>
      <!-- Footer-->
      <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
        <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>$<?= $value['total_price'] ?></span></div>
      
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php
require_once('src/components/footer.php');
?>