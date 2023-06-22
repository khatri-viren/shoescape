<?php
require_once(__DIR__ . '/../../logicFiles/functions.php');
admin_protected_area();
require_once('./admin-header.php');

$url = store_url();

$id = $_GET['id'];
$products = get_admin_products($id);

// echo "<pre>";
// print_r($products);
// die();

?>

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
            <h2 class="h3 py-2 me-2 text-center text-sm-start"><?= $products[0]['b_name'] . ' ' . $products[0]['product_name'] ?></h2>
        </div>
        <form action="../../logicFiles/admin/product-stock-update.php" method="post">
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="url" value="<?= $url ?>">
                        <input type="hidden" name="gst_id" value="<?= $products[0]['gst_id'] ?>">
                        <label class="form-label text-capitalize" for="price">Price</label>
                        <input class="form-control" type="number" name="price" id="price" value="<?= $products[0]['price'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="submit"></label>
                        <button class="btn btn-primary w-100 mt-1" type="submit" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>


        <!-- Title-->
        <?php foreach ($products as $key => $value) { ?>

            <hr>
            <form action="../../logicFiles/admin/product-update.php" method="post">
                <input type="hidden" name="url" value="<?= $url ?>">
                <input type="hidden" name="sst_id" value="<?= $value['sst_id'] ?>">

                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-capitalize" for="pcolour">Colour</label>
                            <input class="form-control" type="text" name="colour" id="pcolour" value="<?= $value['colour'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-capitalize" for="psize">Size</label>
                            <input class="form-control" type="text" name="size" id="psize" value="<?= $value['size'] ?>" readonly>
                        </div>
                    </div>
                    <!-- Product Delete -->
                    <div class="col-md-4">
                        <form action="../../logicFiles/admin/product-update.php" method="post">

                            <div class="form-group">
                                <input type="hidden" name="delete" value="delete">
                                <button class="btn bg-faded-danger w-100 mt-4" data-bs-toggle="tooltip" type="submit" value="delete" title="Delete" name="delete"><i class="ci-trash text-danger"></i> Delete Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            <form action="../../logicFiles/admin/product-update.php" method="post">
            <input type="hidden" name="url" value="<?= $url ?>">
                <input type="hidden" name="sst_id" value="<?= $value['sst_id'] ?>">
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-capitalize" for="pstock">Available Stock</label>
                            <input class="form-control" type="text" name="stock" id="pstock" value="<?= $value['stock'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-capitalize" for="paddstock">Add Stock</label>
                            <input class="form-control" type="number" name="addstock" id="paddstock" min="0" step="1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="submit"></label>
                            <button class="btn btn-primary w-100 mt-1" type="submit" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

</div>
</section>




<?php

require_once('./admin-footer.php');

?>