<?php
require_once(__DIR__ . '/../../logicFiles/functions.php');
admin_protected_area();
require_once('./admin-header.php');
$time = time();

$sql = "SELECT SUM(total_price) as earnings FROM orders WHERE order_date > ($time - (24*60*60))";
$todaysum = $conn->query($sql);
$todaysum = $todaysum->fetch_assoc();

$sql = "SELECT COUNT(*) as orders FROM orders";
$orders = $conn->query($sql);
$orders = $orders->fetch_assoc();

$sql = "SELECT SUM(total_price) as earnings FROM orders";
$sum = $conn->query($sql);
$sum = $sum->fetch_assoc();

$stocklog = stock_log_fetch();
// echo "<pre>";
// print_r($_SESSION);
// die();

?>
<!-- Content-->
<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
        <h2 class="h3 py-2 text-center text-sm-start">Your sales / earnings</h2>
        <div class="row mx-n2 pt-2">
            <div class="col-md-4 col-sm-6 px-2 mb-4">
                <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Earnings Today</h3>
                    <p class="h2 mb-2">$<?= $todaysum['earnings'] ?></p>
                    <p class="fs-ms text-muted mb-0"><?= date("d-m-Y H:i:s", time()) ?></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 px-2 mb-4">
                <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Total Orders</h3>
                    <p class="h2 mb-2"><?= $orders['orders'] ?></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 px-2 mb-4">
                <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Lifetime earnings</h3>
                    <p class="h2 mb-2">$<?= $sum['earnings'] ?></p>
                </div>
            </div>
        </div>
        <div class="row mx-n2">
            <h3 class="h5 pb-2">Product Stock Log</h3>
            <div class="table-responsive">
                <table class="table table-layout-fixed fs-sm mb-0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Size</th>
                            <th>Colour</th>
                            <th>Available Stock</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stocklog as $key => $value) { ?>
                            <tr>
                                <td><?= $value['b_name'] . ' ' . $value['product_name'] ?></td>
                                <td><?= $value['size'] ?></td>
                                <td><?= $value['colour'] ?></td>
                                <td><?= $value['available_stock'] ?></td>
                                <td><?= $value['date_time'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
</section>

<?php
require_once('./admin-footer.php');
?>