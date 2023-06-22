<?php
require_once('src/components/header.php');
require_once('src/logicFiles/functions.php');

$query = $_POST['search'];

if (strlen($query) < 3 ) {
    alert('danger', 'Search too short!');
    unset($_POST);
    die();
} else if (strlen($query) >= 3 ){
    $query = htmlspecialchars($query);
    $query = $conn->real_escape_string($query);
    
    $sql = "SELECT b.b_name, g.product_name, g.image, s.price, g.gst_id, s.sst_id FROM brands b, general_shoe g, specific_shoe s WHERE g.gst_id = s.general_shoe_id AND g.brand_id = b.bb_id AND ( b.b_name LIKE '%$query%' ) OR ( g.product_name LIKE '%$query%' ) GROUP BY g.gst_id ";
    
    $res = $conn->query($sql);
    $products = [];
    while ($row = $res->fetch_assoc()){
        $products[] = $row;
    }
    if (empty($products)){
        alert('danger', 'No results');
        die();
    }

}


?>
<div class="container">
    
<div class="row pt-3 mx-n2">
                <!-- Product-->
                <?php foreach ($products as $key => $value) {
                    // echo "<pre>";
                    // print_r($value);
                    // die();

                ?>
                    <div class="col-md-2 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <a class="card-img-top d-block overflow-hidden" href="product.php?id=<?= $value['gst_id'] ?>">
                                <img src="<?= get_image_thumb($value['image']) ?>" alt="Product"></a>
                            <div class="card-body py-2">
                                <a class="product-meta d-block fs-xs pb-1" href="#"><?= $value['b_name'] ?></a>
                                <div class="d-flex justify-content-between">
                                    <h3 class="product-title fs-sm"><a href="product.php?id=<?= $value['gst_id'] ?>"><?= $value['product_name'] ?></a></h3>


                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price pt-3">
                                        <span class="text-accent">$<?= $value['price'] ?></span>
                                    </div>
                                
                                    <form action="wishlist-add.php" method="post" class="mb-2">
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


                </div>




<?php
require_once('src/components/footer.php');
?>