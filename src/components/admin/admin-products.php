<?php
require_once(__DIR__ . '/../../logicFiles/functions.php');
admin_protected_area();
require_once('./admin-header.php');


$sales = 0;
$products = fetch_products();
$sql = "SELECT COUNT(*) as product_count FROM general_shoe";
$count = $conn->query($sql);
$count = $count->fetch_assoc();

// echo "<pre>";
// print_r($count['product_count']);
// die();

?>

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
  <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
    <!-- Title-->
    <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
      <h2 class="h3 py-2 me-2 text-center text-sm-start">Your products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2"><?= $count['product_count'] ?></span></h2>
    </div>
    
    <!-- Product-->
    <?php 
            foreach ($products as $key => $value) {
              $sales = get_sales_singleproduct($value['sst_id']);
            //   echo "<pre>";
            // print_r($sales);
            // die();
          ?>
          <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="admin-Sproduct.php?id=<?= $value['gst_id'] ?>" style="width: 12.5rem;">
          <img class="rounded-3" src="../../../<?= get_image_thumb($value['image'])?>" alt="Product"></a>
            <div class="text-center text-sm-start">
              <h3 class="h6 product-title mb-2">
                <a href="admin-Sproduct.php?id=<?= $value['gst_id'] ?>"><b><?= $value['b_name'] ?></b> <?= $value['product_name'] ?></a>
              </h3>
              <div class="d-inline-block text-accent">$<?= $value['price'] ?>
            </div>
              <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Sales: <span class="fw-medium"><?= $sales ?></span>
            </div>
              <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Earnings: <span class="fw-medium">$<?= $sales * $value['price'] ?></span>
            </div>
              <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                <button class="btn bg-faded-info btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Edit" onclick="location.href = 'admin-Sproduct.php?id=<?= $value['gst_id'] ?>'"><i class="ci-edit text-info mb-0"></i>  Edit Product</button>
              </div>
            </div>
          </div>
          <?php } ?>
        
    
  </div>
</section>

<?php

require_once('./admin-footer.php');

?>