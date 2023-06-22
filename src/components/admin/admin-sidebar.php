<?php
$products = fetch_products();
$sql = "SELECT COUNT(*) as product_count FROM general_shoe";
$count = $conn->query($sql);
$count = $count->fetch_assoc();

?>


<aside class="col-lg-4 pe-xl-5">
    <!-- Account menu toggler (hidden on screens larger 992px)-->
    <div class="d-block d-lg-none p-4"><a class="btn btn-outline-accent d-block" href="#account-menu" data-bs-toggle="collapse"><i class="ci-menu me-2"></i>Account menu</a></div>
    <!-- Actual menu-->
    <div class="h-100 border-end mb-2">
        <div class="d-lg-block collapse" id="account-menu">
            <div class="bg-secondary p-4">
                <h3 class="fs-sm mb-0 text-muted">Seller Dashboard</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="./admin-dashboard.php"><i class="ci-dollar opacity-60 me-2"></i>Sales</a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="./admin-products.php"><i class="ci-package opacity-60 me-2"></i>Products<span class="fs-sm text-muted ms-auto"><?= $count['product_count'] ?></span></a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="./admin-products-add.php"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Product</a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="./admin-categories.php"><i class="ci-package opacity-60 me-2"></i>Categories</a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="./admin-add-newstuff.php"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Stuff</a>
                </li>
                <li class="mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="../../../logout.php"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a>
                </li>
            </ul>
            <hr>
        </div>
    </div>
</aside>