<?php 
require_once('./functions.php');

$data['item_id'] = $_POST['gst_id'];
$data['name'] = $_POST['name'];
$data['email'] = $_POST['email'];
$data['rating'] = $_POST['rating'];
$data['review'] = $_POST['review'];
$data['time'] = time();

$url_addition = substr($_POST['url'], strpos($_POST['url'], "?") + 1);

if (db_insert('product_reviews', $data)) {
    if (preg_match('/product.php/i', $_POST["url"])){
        header("Location: ../../product.php?".$url_addition);
    } elseif (preg_match('/shop.php/i', $_POST["url"])) {
        header('Location: ../../shop.php');  
    }
    alert('success', 'Review submitted successfully!');
    unset($_SESSION['form']);
} else {
    if (preg_match('/product.php/i', $_POST["url"])){
        header('Location: ../../product.php?'.$url_addition);
    } elseif (preg_match('/shop.php/i', $_POST["url"])) {
        header('Location: ../../shop.php');  
    }
    alert('danger', "Failed to submit review! Please try again");
}


// echo "<pre>";
// print_r($data);
// die();