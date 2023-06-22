<?php
    require_once(__DIR__ . '/../../logicFiles/functions.php');
    admin_protected_area();
    require_once('./admin-header.php');

    $rows = db_select('categories');
    $categories = [];

    // $categories[0] = " ";
    foreach ($rows as $val) {
        $categories[$val['id']] = $val['name'];
    }

    $rows1 = db_select('colours');

    $colours = [];

    foreach ($rows1 as $val1) {
        $colours[$val1['ct_id']] = $val1['colour'];
    }

    $rows2 = db_select('sizes');
    $sizes = [];

    foreach ($rows2 as $val2) {
        $sizes[$val2['st_id']] = $val2['size'];
    }

    $rows3 = db_select('brands');
    $brands = [];

    foreach ($rows3 as $val3) {
        $brands[$val3['bb_id']] = $val3['b_name'];
    }

    $rows4 = db_select('general_shoe');
    $general_shoe = [];

    foreach ($rows4 as $val4) {
        $general_shoe[$val4['gst_id']] = $val4['product_name'];
    }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $_SESSION['form']['value'] = $_POST;
//     // header('Location: admin-categories-add.php');


//     $imgs = upload_images($_FILES);

//     // $imgs = [];
//     $data['brand_id'] = $_POST['bb_id'];
//     $data['product_name'] = $_POST['product_name'];
//     $data['description'] = $_POST['description'];
//     $data['category_id'] = $_POST['category_id'];
//     $data['image'] = json_encode($imgs);

//     // echo "<pre>";
//     // print_r($_POST);
//     // print_r($data);
//     // print_r($ss_data);
//     // die();

//     if (db_insert('general_shoe', $data)) {
//         // header('Location: admin-products-add.php');
//         alert('success', 'Product Added successfully!');
//         unset($_SESSION['form']);
//     } else {
//         alert('danger', "Failed to add product! Please try again");
//         // header('Location: admin-products-add.php');
//     }
// }
?>


<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
        <!-- Title-->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
            <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
        </div>
        <form action="../../logicFiles/admin/add-product-general.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3 pb-2">
                <?= select_input([
                    'name' => 'bb_id',
                    'label' => 'Brand Name'
                ], $brands) ?>
            </div>
            <div class="mb-3 pb-2">
                <?= text_input([
                    'name' => 'product_name',
                    'label' => 'Product Name'
                ]) ?>
            </div>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image 1</label>
                        <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= select_input([
                            'name' => 'category_id',
                            'label' => 'Category'
                        ], $categories) ?>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary d-block w-100 my-4 mx-auto" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Add General Details</button>
        </form>
        <form action="../../logicFiles/admin/add-product-specific.php" method="POST" enctype="multipart/form-data">

            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">

                        <?= text_input([
                            'name' => 'price',
                            'label' => 'Price'
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= select_input([
                            'name' => 'gst_id',
                            'label' => 'Product'
                        ], $general_shoe) ?>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= select_input([
                            'name' => 'ct_id',
                            'label' => 'Colour'
                        ], $colours) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= select_input([
                            'name' => 'st_id',
                            'label' => 'Size'
                        ], $sizes) ?>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">

                        <?= text_input([
                            'name' => 'stock',
                            'label' => 'Stock'
                        ]) ?>
                    </div>
                </div>
            </div>
            <!-- Image upload -->
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo1">Image 1</label>
                        <input class="form-control" name="photo1" type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo2">Image 2</label>
                        <input class="form-control" name="photo2" type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo3">Image 3</label>
                        <input class="form-control" name="photo3" type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo4">Image 4</label>
                        <input class="form-control" name="photo4" type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
            </div>


            <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Add Specific Details</button>
        </form>
    </div>

<?php
require_once('./admin-footer.php');
?>