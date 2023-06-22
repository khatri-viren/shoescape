<?php
require_once (__DIR__ . '/../../logicFiles/functions.php');
admin_protected_area();
require_once ('./admin-header.php');


$rows = db_select('categories', 'parent_id = 0');
$categories = [];

$categories[0] = "No Parent";
foreach ($rows as $val) {
    $categories[$val['id']] = $val['name'];
}

?>
<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
        <form class="mb-3" method="post" action="./src/logicFiles/admin/add-brand.php">
            <label for="brand">    
            <h5>Add New Brand</h5>
            </label>
            <div class="row ">
                <div class="col-sm-6 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="text" name="brand" id="brand">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="input-group">
                        <button class="btn btn-primary  d-block" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Add</button>
                    </div>
                </div>
            </div>
            <hr>
        </form>
        <form class="my-3" method="post" action="./src/logicFiles/admin/add-size.php">
            <label for="size">    
            <h5>Add New Size</h5>
            </label>
            <div class="row ">
                <div class="col-sm-6 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="text" name="size" id="size">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="input-group">
                        <button class="btn btn-primary  d-block " type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Add</button>
                    </div>
                </div>
            </div>
            <hr>
        </form>
        <form action="./src/logicFiles/admin/add-category.php" method="POST" enctype="multipart/form-data" class="my-3">
            <h5>Add New Category</h5>
                    <div class="mb-3 pb-2">
                        <?= text_input([
                            'name' => 'name',
                            'label' => 'Category Name'
                        ]) ?>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= select_input([
                                    'name' => 'parent_id',
                                    'label' => 'Parent Category'
                                ], $categories) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">Category Image</label>
                                <input class="form-control" name="photo" type="file" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Add Category</button>
                </form>
    </div>
    <?php
    if (isset($_SESSION['alert'])) {
    ?>
      <div class="container mt-3">
        <div class="alert alert-<?= $_SESSION['alert']['type'] ?>">
          <?= $_SESSION['alert']['message'] ?>
        </div>
      </div>
    <?php unset($_SESSION['alert']);
    } ?>
</section>

<?php

require_once('./admin-footer.php');

?>