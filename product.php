<?php
require_once('src/components/header.php');
require_once('src/logicFiles/functions.php');

$url = store_url();

$id = 0;

// echo "<pre>";
// print_r($_GET);
// die();
if (isset($_GET['id']) && isset($_GET['ctid'])) {
    $id = ((int)$_GET['id']);
    $ctid = ((int)$_GET['ctid']);
    if ($id < 1 || $ctid < 1) {
        die("Product not Found!");
    }
    $pro = get_product_wColour($id, $ctid);
    if ($pro == null) {
        die("Product not Found!");
    }
} else if (isset($_GET['id'])) {
    $id = ((int)$_GET['id']);
    if ($id < 1) {
        die("Product not Found!");
    }
    $pro = get_product($id);
    if ($pro == null) {
        die("Product not Found!");
    }
}

$_GET['ctid'] = $ctid = $pro['ct_id'];

$images = get_product_images($pro['photos']);

$products = fetch_products();
// $products = $products[0];

$sizes = get_product_sizes($id);

$colours = get_product_colours($id);

$reviews = fetch_reviews($id);




// print_r($colours);
// echo "<pre>";
// print_r($pro);
// die();
?>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?= BASE_URL ?>"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="<?= BASE_URL ?>/shop.php">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page"><?= $pro['product_name'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0"><b><?= $pro['b_name'] ?></b><?= " " . $pro['product_name']  ?></h1>
        </div>
    </div>
</div>
<div class="container">
    <!-- Gallery + details-->
    <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
        <div class="px-lg-3">
            <div class="row">
                <!-- Product gallery-->
                <div class="col-lg-7 pe-lg-0 pt-lg-4">
                    <div class="product-gallery">
                        <div class="product-gallery-preview order-sm-2">
                            <?php
                            $active_class = ' active ';
                            foreach ($images as $key => $img) {
                                // echo "<pre>";
                                // print_r($key);
                                // die();

                            ?>
                                <div class="product-gallery-preview-item <?= $active_class ?>" id="pro-<?= $key ?>"><img class="image-zoom" src="<?= $img->src ?>" data-zoom="<?= $img->src ?>" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                            <?php $active_class = '';
                            }  ?>
                        </div>
                        <!-- thumbnails -->
                        <div class="product-gallery-thumblist order-sm-1">
                            <?php
                            $active_class = ' active ';
                            foreach ($images as $key => $img) {

                            ?>
                                <a class="product-gallery-thumblist-item <?= $active_class ?>" href="#pro-<?= $key ?>">
                                    <img src="<?= $img->thumb ?>" alt="Product thumb">
                                </a>
                            <?php $active_class = '';
                            } ?>

                            <!-- <a class="product-gallery-thumblist-item video-item" href="../external.html?link=https://www.youtube.com/watch?v=1vrXpMLLK14">
                                <div class="product-gallery-thumblist-item-text"><i class="ci-video"></i>Video
                                </div> -->
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0">
                    <div class="product-details ms-auto pb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                                <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1"><?= sizeof($reviews) ?> Reviews</span>
                            </a>
                            <form action="./src/logicFiles/wishlist-add.php" method="post">
                                <input type="hidden" name="general_shoe_id" value="<?= $id ?>">
                                <input type="hidden" name="url" value="<?= $url ?>">
                                <button class="btn-wishlist" data-bs-toggle="tooltip" type="submit" title="Add to wishlist"><i class="ci-heart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="mb-3">
                            <span class="h3 fw-normal text-accent me-1">$<?= $pro['price'] ?></span>
                        </div>
                        <div class="mb-3">
                            <div class="widget">
                                <h6 class="widget-title">Colour:</h6>
                                <?php foreach ($colours as $key => $value) { ?>
                                    <a href="product.php?id=<?= $value['gst_id'] ?>&ctid=<?= $value['ct_id'] ?>" class="btn-tag me-2 mb-4"><?= $value['colour'] ?></a>
                                <?php } ?>
                            </div>
                            <form action="./src/logicFiles/cart-process-add.php" class="mb-grid-gutter" method="post">
                                <input type="hidden" name="colour_id" value="<?= $ctid ?>">
                                <input type="hidden" value="<?= $id ?>" name="gst_id">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label" for="product-size">Size:</label>
                                    <a class="nav-link-style fs-sm" href="#size-chart" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                                </div>
                                <select class="form-select" name="st_id" required id="product-size">
                                    <option value="">Select size</option>
                                    <?php
                                    foreach ($sizes as $key => $value) {
                                        // echo "<pre>";
                                        // print_r($key);
                                        // die(); 
                                    ?>
                                        <option value="<?= $value['st_id'] ?>"><?= $value['size'] ?></option>
                                    <?php } ?>
                                </select>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <select class="form-select me-3" name="quantity" style="width: 5rem;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                        </div>
                        </form>
                        <!-- Product panels-->

                        <!-- Sharing-->
                        <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product description section 1-->
    <div class="row align-items-center py-md-3">
        <div class="col-lg-5 col-md-6 offset-lg-1 order-md-2"><img class="d-block rounded-3" src="<?= $images['2']->src ?>" alt="Image"></div>
        <div class="col-lg-4 col-md-6 offset-lg-1 py-4 order-md-1">
            <h2 class="h3 mb-4 pb-2">High quality materials</h2>
            <p class="fs-sm text-muted pb-2"><?= $pro['description'] ?></p>
            <h6 class="fs-base mb-3">Washing instructions</h6>
            <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#wash" data-bs-toggle="tab" role="tab"><i class="ci-wash fs-xl"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#bleach" data-bs-toggle="tab" role="tab"><i class="ci-bleach fs-xl"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#hand-wash" data-bs-toggle="tab" role="tab"><i class="ci-hand-wash fs-xl"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#ironing" data-bs-toggle="tab" role="tab"><i class="ci-ironing fs-xl"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#dry-clean" data-bs-toggle="tab" role="tab"><i class="ci-dry-clean fs-xl"></i></a></li>
            </ul>
            <div class="tab-content text-muted fs-sm">
                <div class="tab-pane fade show active" id="wash" role="tabpanel">30° mild machine washing</div>
                <div class="tab-pane fade" id="bleach" role="tabpanel">Do not use any bleach</div>
                <div class="tab-pane fade" id="hand-wash" role="tabpanel">Hand wash normal (30°)</div>
                <div class="tab-pane fade" id="ironing" role="tabpanel">Low temperature ironing</div>
                <div class="tab-pane fade" id="dry-clean" role="tabpanel">Do not dry clean</div>
            </div>
        </div>
    </div>
    <!-- Product description section 2-->
    <div class="row align-items-center py-4 py-lg-5">
        <div class="col-lg-5 col-md-6 offset-lg-1"><img class="d-block rounded-3" src="<?= $images['3']->src ?>" alt="Map"></div>
        <div class="col-lg-4 col-md-6 offset-lg-1 py-4">
            <h2 class="h3 mb-4 pb-2">Where is it made?</h2>
            <h6 class="fs-base mb-3">Apparel Manufacturer, Ltd.</h6>
            <p class="fs-sm text-muted pb-2">​Sam Tower, 6 Road No 32, Dhaka 1875, Bangladesh</p>
            <div class="d-flex mb-2">
                <div class="me-4 pe-2 text-center">
                    <h4 class="h2 text-accent mb-1">3258</h4>
                    <p>Workers</p>
                </div>
                <div class="me-4 pe-2 text-center">
                    <h4 class="h2 text-accent mb-1">43%</h4>
                    <p>Female</p>
                </div>
                <div class="text-center">
                    <h4 class="h2 text-accent mb-1">57%</h4>
                    <p>Male</p>
                </div>
            </div>
            <h6 class="fs-base mb-3">Factory information</h6>
            <p class="fs-sm text-muted pb-md-2">​Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
    </div>
</div>
<!-- Reviews-->
<div class="border-top border-bottom my-lg-3 py-5">
    <div class="container pt-md-2" id="reviews">
        <div class="row">
            <!-- Reviews list-->
            <div class="col-md-7">
                <h4>Reviews:</h4>
                <hr class="mb-2">
                <!-- Review-->
                
                <?php if(empty($reviews)){
                        echo "<div class='d-flex'><div class='mx-auto my-5 align-self-center'><pre>No Reviews</div></div>";
                    }
                foreach ($reviews as $key => $value) { ?>
                
                <div class="product-review pb-4 mb-4 border-bottom">
                    <div class="d-flex mb-3">
                        <div class="d-flex align-items-center me-4 pe-2">
                            <div class="">
                                <h6 class="fs-sm mb-0"><?= $value['name'] ?></h6><span class="fs-ms text-muted"><?= date('d-m-Y H:i:s', $value['time']) ?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center me-4 pe-3">
                            <div class="star-rating">
                                <div class="fs-sm text-muted"><?= $value['rating'] ?>/5 <i class="star-rating-icon ci-star-filled active pb-1"></i>Stars</div>
                            </div>
                        </div>
                    </div>
                    <p class="fs-md mb-2"><?= $value['review'] ?></p>
                </div>
                <?php } ?>
                
            </div>
            <!-- Leave review form-->
            <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                    <h3 class="h4 pb-2">Write a review</h3>
                    <form class="needs-validation" method="post" action="./src/logicFiles/product-review-submit.php" novalidate>
                        <input type="hidden" name="gst_id" value="<?= $id ?>">
                        <input type="hidden" name="url" value="<?= $url ?>">


                        <div class="mb-3">
                            <label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" required id="review-name">
                            <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" required id="review-email">
                            <div class="invalid-feedback">Please provide valid email address!</div><small class="form-text text-muted">Authentication only - we won't spam you.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
                            <select class="form-select" name="rating" required id="review-rating">
                                <option value="">Choose rating</option>
                                <option value="5">5 stars</option>
                                <option value="4">4 stars</option>
                                <option value="3">3 stars</option>
                                <option value="2">2 stars</option>
                                <option value="1">1 star</option>
                            </select>
                            <div class="invalid-feedback">Please choose rating!</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="6" name="review" required id="review-text"></textarea>
                            <div class="invalid-feedback">Please write a review!</div>
                        </div>
                        
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product carousel (Style with)-->
<div class="container pt-3 mb-5">
    <h2 class="h3 text-center pb-4">Style with</h2>
    <div class="tns-carousel tns-controls-static tns-controls-outside">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
            <!-- Product-->
            <?php foreach ($products as $key => $value) {
                // echo "<pre>";
                // print_r($value);
                // die();

            ?>
                <div>
                    <div class="card product-card card-static">
                        <!-- <form action="wishlist-add.php" method="post">
                            <input type="hidden" name="<?= $id ?>">
                            <button class="btn-wishlist btn-sm" type="submit" title="Add to wishlist"><i class="ci-heart"></i>
                            </button>
                        </form> -->
                        <a class="card-img-top d-block overflow-hidden" href="product.php?id=<?= $value['gst_id'] ?>"><img src="<?= get_image_thumb($value['image']) ?>" alt="<?= $value['product_name'] ?>">
                        </a>
                        <div class="card-body py-2">
                            <a class="product-meta d-block fs-xs pb-1" href="#"><?= $value['b_name'] ?></a>
                            <h3 class="product-title fs-sm"><a href="product.php?id=<?= $value['gst_id'] ?>"><?= $value['product_name'] ?></a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$<?= $value['price'] ?></span></div>
                                <!-- <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>
</div>


<?php
require_once('src/components/footer.php');
?>