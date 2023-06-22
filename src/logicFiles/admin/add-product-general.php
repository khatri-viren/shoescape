<?php
require_once('../../logicFiles/functions.php');
admin_protected_area();


$imgs = upload_images($_FILES);

// $imgs = [];
$data['brand_id'] = $_POST['bb_id'];
$data['product_name'] = $_POST['product_name'];
$data['description'] = $_POST['description'];
$data['category_id'] = $_POST['category_id'];
$data['image'] = json_encode($imgs);

// echo "<pre>";
// print_r($_POST);
// print_r($data);
// print_r($ss_data);
// die();

if (db_insert('general_shoe', $data)) {
    header('Location: ../../components/admin/admin-products-add.php');
    alert('success', 'Product Added successfully!');
    unset($_SESSION['form']);
} else {
    header('Location: ../../components/admin/admin-products-add.php');
    alert('danger', "Failed to add product! Please try again");
}
