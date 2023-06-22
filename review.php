<?php
require_once('src/logicFiles/functions.php');
if (!isset($_SESSION['user'])) {
    alert('warning', 'Unauthorized Access! Login before you proceed!');
    header('Location: login.php');
    die();
}
require_once('src/components/header.php');

$u = $_SESSION['user'];

if (isset($_POST['last_name'])) {
    $_SESSION['shipping']['first_name'] = $_POST['first_name'];
    $_SESSION['shipping']['last_name'] = $_POST['last_name'];
    $_SESSION['shipping']['phone_number'] = $_POST['phone_number'];
    $_SESSION['shipping']['address'] = $_POST['address'];
    $_SESSION['shipping']['payment_method'] = $_POST['payment_method'];
}

$s = $_SESSION['shipping'];

// echo "<pre>";
// print_r($_SESSION);
// die();
?>
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
                <a class="step-item active" href="checkout.php">
                    <div class="step-progress"><span class="step-count">2</span></div>
                    <div class="step-label"><i class="ci-user-circle"></i>Checkout</div>
                    <a class="step-item active current" href="review.php">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a>
            </div>
            <!-- Order details-->
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
            <!-- Item-->
            <?php
            foreach ($cart_items as $key => $item) {
            ?>
                <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
                    <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img src="<?= get_image_thumb($item['image']) ?>" width="160" alt="Product"></a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="product.php?id=<?= $item['gst_id'] ?>"><b><?= $item['b_name'] ?> </b><?= $item['product_name'] ?></a></h3>
                            <div class="fs-sm"><span class="text-muted me-2">Size:</span><?= $item['size'] ?></div>
                            <div class="fs-sm"><span class="text-muted me-2">Color:</span><?= $item['colour'] ?></div>
                            <div class="fs-lg text-accent pt-2">$<?= $item['price'] ?></div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
                        <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span><span>&nbsp;<?= $item['quantity'] ?></span></p>
                        <!-- <button class="btn btn-link px-0" type="button"><i class="ci-edit me-2"></i><span class="fs-sm">Edit</span></button> -->
                    </div>
                </div>
            <?php } ?>
            <!-- Client details-->
            <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="h6">Shipping to:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Client:&nbsp;</span><?= $s['first_name'] . ' ' . $s['last_name'] ?></li>
                            <li><span class="text-muted">Address:&nbsp;</span><?= $s['address'] ?></li>
                            <li><span class="text-muted">Phone:&nbsp;</span><?= $s['phone_number'] ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="h6">Payment method:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted"><?=  $s['payment_method'] ?>&nbsp;</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4">
                <div class="w-100 "><a class="btn btn-secondary d-block w-100" href="checkout-payment.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                
            </div>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <h2 class="h6 text-center mb-4">Order summary</h2>
                    
                    <h3 class="fw-normal text-center my-4">$<?= $cart_total ?></h3>
                    <!-- <form class="needs-validation" method="post" novalidate>
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Promo code" required>
                            <div class="invalid-feedback">Please provide promo code.</div>
                        </div>
                        <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                    </form> -->
                    <div class="w-100 ">
                    <a class="btn btn-primary d-block w-100" href="./src/logicFiles/submit-order.php"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i>
                    </a>
                </div>
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-payment.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
            </div>
            <div class="w-50 ps-2">
                    <a class="btn btn-primary d-block w-100" href="submit-order.php"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i>
                    </a>
                </div>
        </div>
    </div>
</div>



<?php
require_once('src/components/footer.php');
?>