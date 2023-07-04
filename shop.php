<?php
require_once('src/components/header.php');
require_once('src/logicFiles/functions.php');

$sizes = get_filtering_sizes();
$brands = get_brands();
$colours = get_colours();

$url = store_url();

$url_addition = substr($url, strpos($url, "?") + 1);

if ($url_addition == 'sort=lowhighprice') {
    $products = fetch_products(null, ' s.price ', null);
} else if ($url_addition == 'sort=highlowprice') {
    $products = fetch_products(null, ' s.price DESC ', null);
} else if ($url_addition == 'sort=azorder') {
    $products = fetch_products(null, ' b.b_name, g.product_name ', null);
} else if ($url_addition == 'sort=zaorder') {
    $products = fetch_products(null, ' b.b_name, g.product_name DESC ', null);
} else {
    $products = fetch_products();
}

// $pro = $products[0];
// echo "<pre>";
// print_r($url_addition);
// die();

?>
<!-- Page Title (Shop Alt)-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Shop grid left sidebar</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4">
            <!-- Sidebar-->
            <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 22rem;">
                <div class="offcanvas-header align-items-center shadow-sm">
                    <h2 class="h5 mb-0">Filters</h2>
                    <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                    <!-- Categories-->
                    <div class="widget widget-categories mb-4 pb-4 border-bottom">
                        <h3 class="widget-title">Categories</h3>
                        <div class="accordion mt-n1" id="shop-categories">
                            <!-- Shoes-->

                            <!-- Price range-->
                            <!-- Filter by Brand-->
                            <div class="widget widget-filter mb-4 pb-4 border-bottom">
                                <h3 class="widget-title">Brand</h3>
                                <div class="input-group input-group-sm mb-2">
                                    <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                                </div>
                                <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <?php foreach ($brands as $key => $value) { ?>

                                        <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" id="<?= $value['bb_id'] ?>" onclick="this.form.submit()">
                                                <label class="form-check-label widget-filter-item-text" for="<?= $value['bb_id'] ?>"><?= $value['b_name'] ?></label>
                                            </div>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>

                            <!-- Filter by Size-->
                            <div class="widget widget-filter mb-4 pb-4 border-bottom">
                                <h3 class="widget-title">Size</h3>
                                <div class="input-group input-group-sm mb-2">
                                    <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                                </div>
                                <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <?php foreach ($sizes as $key => $value) { ?>
                                        <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="<?= $value['st_id'] ?>">
                                                <label class="form-check-label widget-filter-item-text" for="<?= $value['st_id'] ?>"><?= $value['size'] ?></label>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <!-- Filter by Color-->
                            <div class="widget widget-filter mb-4 pb-4">
                                <h3 class="widget-title">Colour</h3>
                                <div class="input-group input-group-sm mb-2">
                                    <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                                </div>
                                <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <?php foreach ($colours as $key => $value) { ?>
                                        <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="<?= $value['ct_id'] ?>">
                                                <label class="form-check-label widget-filter-item-text" for="<?= $value['ct_id'] ?>"><?= $value['colour'] ?></label>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                <div class="d-flex flex-wrap">
                    <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                        <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sort by:</label>
                        <select class="form-select" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" >
                            <option value="shop.php">Popularity</option>
                            <option value="shop.php?sort=lowhighprice">Low - High Price</option>
                            <option value="shop.php?sort=highlowprice">High - Low Price</option>
                            <option value="shop.php?sort=azorder">A - Z Order</option>
                            <option value="shop.php?sort=zaorder">Z - A Order</option>
                        </select>
                    </div>
                </div>

            </div>
            <!-- Products grid-->
            <div class="row mx-n2">
                <!-- Product-->
                <?php foreach ($products as $key => $value) {
                    // echo "<pre>";
                    // print_r($value);
                    // die();

                ?>
                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <a class="card-img-top d-block overflow-hidden" href="product.php?id=<?= $value['gst_id'] ?>">
                                <img src="<?= get_image_thumb($value['photos']) ?>" alt="Product"></a>
                            <div class="card-body py-2">
                                <a class="product-meta d-block fs-xs pb-1" href="#"><?= $value['b_name'] ?></a>
                                <div class="d-flex justify-content-between">
                                    <h3 class="product-title fs-sm"><a href="product.php?id=<?= $value['gst_id'] ?>"><?= $value['product_name'] ?></a></h3>


                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price pt-3">
                                        <span class="text-accent">$<?= $value['price'] ?></span>
                                    </div>
                                    <!-- <div class="star-rating">
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star"></i>
                                    </div> -->
                                    <form action="./src/logicFiles/wishlist-add.php" method="post" class="mb-2">
                                        <input type="hidden" name="general_shoe_id" value="<?= $value['gst_id'] ?>">
                                        <input type="hidden" name="url" value="<?= $url ?>">
                                        <button class="btn-wishlist" data-bs-toggle="tooltip" type="submit" title="Add to wishlist"><i class="ci-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            </form>

                        </div>
                        <hr class="d-sm-none">
                    </div>

                <?php } ?>
                <!-- Banner-->
                <div class="py-sm-2">
                    <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                            <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                            <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
                        </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
                    </div>
                </div>
                <!-- Pagination-->
                <!-- <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav> -->
        </section>
    </div>
</div>

<?php
require_once('src/components/footer.php');
?>