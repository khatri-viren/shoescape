<?php
require_once('../../logicFiles/functions.php');
admin_protected_area();


$imgs = upload_images($_FILES);

$data['general_shoe_id'] = $_POST['gst_id'];
$data['colour_id'] = $_POST['ct_id'];
$data['size_id'] = $_POST['st_id'];
$data['photos'] = json_encode($imgs);
$data['stock'] = $_POST['stock'];
$data['price'] = $_POST['price'];


// echo "<pre>";
// print_r($_POST);
// print_r($data);
// print_r($ss_data);
// die();

if (db_insert('specific_shoe', $data)) {
    alert('success', 'Product Added successfully!');
    header('Location: ../../components/admin/admin-products-add.php');
    unset($_SESSION['form']);
} else {
    alert('danger', "Failed to add product! Please try again");
    header('Location: ../../components/admin/admin-products-add.php');
}
