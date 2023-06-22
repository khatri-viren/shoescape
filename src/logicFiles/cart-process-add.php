<?php 
require_once('./functions.php');


$id = $_POST['gst_id'];
$ctid = $_POST['colour_id'];
$stid = $_POST['st_id'];

// $pro = get_product($id);
global $conn;
$sql = "SELECT * FROM brands b, general_shoe g, specific_shoe s, sizes ss, colours c WHERE g.gst_id = $id AND c.ct_id = $ctid AND ss.st_id = $stid AND g.gst_id = s.general_shoe_id AND g.brand_id = b.bb_id";
$res = $conn->query($sql);
$pro = $res->fetch_assoc();


if ($pro == null){
    die("Product not found");
}

$pro['quantity'] = ((int)$_POST['quantity']);

$_SESSION['cart'][$id] = $pro;

alert('success', 'Product added to cart successfully!');
header('Location: ../../shop.php');

// echo "<pre>";
// print_r($pro);
// print_r($_POST);
// die();
