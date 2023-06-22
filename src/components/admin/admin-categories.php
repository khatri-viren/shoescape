<?php
require_once(__DIR__ . '/../../logicFiles/functions.php');
admin_protected_area();
require_once('./admin-header.php');
$categories = db_select('categories', ' 1 ORDER BY id DESC');

?>
<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
  <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
    <!-- Title-->
    <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
      <h2 class="h3 py-2 me-2 text-center text-sm-start">Your categories<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2"><?= sizeof($categories) ?></span></h2>
    </div>
    <!-- Product-->
    <?php
    foreach ($categories as $key => $value) {
    ?>
      <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="marketplace-single.html" style="width: 12.5rem;">
          <img class="rounded-3" src="../../../<?= get_image_thumb($value['photo']) ?>" alt="Product"></a>
        <div class="text-center text-sm-start">
          <h3 class="h6 product-title mb-2">
            <?= $value['name'] ?>
          </h3>
          <div class="d-inline-block text-muted fs-ms mb-2"><?= $value['description'] ?></div>
          <div class="d-flex justify-content-center justify-content-sm-start pt-3">
            <button class="btn bg-faded-accent btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Download"><i class="ci-download text-accent"></i></button>
            <button class="btn bg-faded-info btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit text-info"></i></button>
            <button class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i class="ci-trash text-danger"></i></button>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
<?php
require_once('./admin-footer.php');
?>