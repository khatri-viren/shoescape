<?php
require_once('src/logicFiles/functions.php');
if (!isset($_SESSION['user'])) {
    alert('warning', 'Unauthorized Access! Login before you proceed!');
    header('Location: login.php');
    die();
}
require_once('src/components/header.php');

$u = $_SESSION['user'];


// echo "<pre>";
// print_r($u);
// die();
?>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <section class="col-lg-8">
            <!-- Steps-->
            <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="cart.php">
                    <div class="step-progress"><span class="step-count">1</span></div>
                    <div class="step-label"><i class="ci-cart"></i>Cart</div>
                </a>
                <a class="step-item active current" href="checkout.php">
                    <div class="step-progress"><span class="step-count">2</span></div>
                    <div class="step-label"><i class="ci-user-circle"></i>Checkout</div>
                    <!-- </a><a class="step-item" href="checkout-shipping.html">
                    <div class="step-progress"><span class="step-count">3</span></div>
                    <div class="step-label"><i class="ci-package"></i>Shipping</div>
                </a><a class="step-item" href="checkout-payment.html">
                    <div class="step-progress"><span class="step-count">4</span></div>
                    <div class="step-label"><i class="ci-card"></i>Payment</div>
                </a> -->
                    <a class="step-item" href="review.php">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a>
            </div>
            <!-- Autor info-->
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                <div class="d-flex align-items-center">
                    <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><img class="rounded-circle" src="img/user.png" width="90" alt="Susan Gardner"></div>
                    <div class="ps-3">
                        <h3 class="fs-base mb-0"><?= $u['first_name'] . " " . $u['last_name'] ?></h3><span class="text-accent fs-sm"><?= $u['email'] ?></span>
                    </div>
                </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i class="ci-edit me-2"></i>Edit profile</a>
            </div>
            <!-- Shipping address-->
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
            <form action="review.php" method="post">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?php
                            echo text_input([
                                'name' => 'first_name',
                                'label' => 'First Name',
                                'value' => $u['first_name'],
                                'attributes' => 'required'
                            ])
                            ?>
                            <!-- <label class="form-label" for="checkout-fn">First Name</label>
                        <input class="form-control" type="text" id="checkout-fn"> -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?php
                            echo text_input([
                                'name' => 'last_name',
                                'label' => 'Last Name',
                                'value' => $u['last_name'],
                                'attributes' => 'required'
                            ])
                            ?>
                            <!-- <label class="form-label" for="checkout-ln">Last Name</label>
                        <input class="form-control" type="text" id="checkout-ln"> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?php
                            echo text_input([
                                'name' => 'phone_number',
                                'label' => 'Phone Number',
                                'value' => $u['phone_number'],
                                'attributes' => 'required'
                            ])
                            ?>
                            <!-- <label class="form-label" for="checkout-phone">Phone Number</label>
                        <input class="form-control" type="text" id="checkout-phone"> -->
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                    <div class="mb-3">
                    <?php
                    echo text_input([
                        'name' => 'address',
                        'label' => 'Address',
                        'value' => $u['address'],
                        'attributes' => 'required'
                    ])
                    ?>
                    </div>
                </div> -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        echo text_input([
                            'name' => 'address',
                            'label' => 'Address',
                            'value' => $u['address'],
                            'attributes' => 'required'
                        ])
                        ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <label for="select-input" class="form-label">Payment Method</label>
                        <select class="form-select" id="select-input" name="payment_method" required>
                            <option value="None Selected">Choose option...</option>
                            <option value="Credit/Debit Card" >Credit/Debit Card</option>
                            <option value="NetBanking" >NetBanking</option>
                            <option value="UPI" >UPI</option>
                            <option value="Cash on Delivery" >Cash on Delivery</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-city">Country</label>
                        <select class="form-select" id="checkout-city">
                            <option>Choose city</option>
                            <option>Amsterdam</option>
                            <option>Berlin</option>
                            <option>Geneve</option>
                            <option>New York</option>
                            <option>Paris</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-zip">ZIP Code</label>
                        <input class="form-control" type="text" id="checkout-zip">
                    </div>
                </div>
            </div> -->
                <!-- <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-address-1">Address</label>
                        <input class="form-control" type="text" id="checkout-address-1">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-address-2">Address 2</label>
                        <input class="form-control" type="text" id="checkout-address-2">
                    </div>
                </div>
            </div> -->
                <!-- <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked id="same-address">
                <label class="form-check-label" for="same-address">Same as shipping address</label>
            </div> -->
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2">
                        <button type="submit" class="btn btn-primary d-block w-100" href="review.php"><span class="d-none d-sm-inline">Proceed</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button>
                    </div>
                </div>
            </form>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>
                        <?php foreach ($cart_items as $key => $item) {
                        ?>
                            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="<?= get_image_thumb($item['image'])?>" width="64" alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="product.php?id=<?= $item['gst_id'] ?>"><b><?= $item['b_name'] ?> </b><?= $item['product_name'] ?>s</a></h6>
                                    <div class="widget-product-meta"><span class="text-accent me-2">$<?= $item['price'] ?></span><span class="text-muted">x <?= $item['quantity'] ?></span></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <ul class="list-unstyled fs-sm pb-2 border-bottom">
                        <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">$<?= $cart_total ?></li>
                        <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end">—</span></li>
                        <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">—</span></li>
                        <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>
                    </ul> -->

                    <h3 class="fw-normal text-center mt-4">Subtotal:</h3>
                    <h4 class="fw-normal text-center ">$<?= $cart_total ?></h4>
                    <!-- <form class="needs-validation" method="post" novalidate>
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Promo code" required>
                            <div class="invalid-feedback">Please provide promo code.</div>
                        </div>
                        <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                    </form> -->
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>





<?php
require_once('src/components/footer.php');
?>