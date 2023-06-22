<?php
require_once('./functions.php');
protected_area();

$user_id = $_SESSION['user']['id'];

$data['general_product_id'] = $_POST['general_shoe_id'];
$data['user_id'] = $user_id;
$data['created_time'] = time();

$url_addition = substr($_POST['url'], strpos($_POST['url'], "?") + 1);

if (db_insert('wishlist', $data)) {
    if (preg_match('/product.php/i', $_POST["url"])){
        header("Location: ../../product.php?".$url_addition);
    } elseif (preg_match('/shop.php/i', $_POST["url"])) {
        header('Location: ../../shop.php');  
    }
    alert('success', 'Product Added to Wishlist successfully!');
    unset($_SESSION['form']);
} else {
    if (preg_match('/product.php/i', $_POST["url"])){
        header('Location: ../../product.php?'.$url_addition);
    } elseif (preg_match('/shop.php/i', $_POST["url"])) {
        header('Location: ../../shop.php');  
    }
    alert('danger', "Failed to add product to Wishlist! Please try again");
}
// print_r($data);
// echo "<pre>";
// print_r($url_addition);
// die();

