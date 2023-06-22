<?php 
require_once('./functions.php');

$id = $_GET['id'];

if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $v) {    
        if($v['sst_id'] == $id){
            unset($_SESSION['cart'][$key]);  
        }
        
    }
}
alert('success', 'Product removed from cart successfully!');
header('Location: ../../shop.php');

// echo "<pre>";
// print_r($_SESSION['cart']);
// print_r($v['sst_id']);
// print_r($id);
// die();
