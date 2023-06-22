<?php
require_once('src/logicFiles/functions.php');
protected_area();
require_once('src/components/header.php');

$id = $_SESSION['user']['id'];

$products = fetch_wishlist_items($id);


// echo "<pre>";
// print_r($products);
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
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">My wishlist</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once('src/components/account-sidebar.php') ?>
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">List of items you added to wishlist:</h6><a class="btn btn-primary btn-sm" href="./src/logicFiles/logout.php"><i class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Wishlist-->
            <!-- Item-->
            <?php foreach ($products as $key => $value) { ?>
                
                <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="product.php?id=<?= $value['gst_id'] ?>" style="width: 10rem;"><img src="<?= get_image_thumb($value['image']) ?>" alt="Product"></a>
                    <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="product.php?id=<?= $value['gst_id'] ?>"><?= $value['product_name'] ?></a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Brand:</span><?= $value['b_name'] ?></div>
                        <div class="fs-lg text-accent pt-2">$<?= $value['price'] ?></div>
                    </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                    <form action="./src/logicFiles/wishlist-remove.php" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="gst_id" value="<?= $value['gst_id'] ?>">
                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Remove"></input>
                    </form>
                    </div>
            </div>
            
            <?php } ?>

        </section>
    </div>
</div>


<?php
require_once('src/components/footer.php');
?>