<?php 
require_once('./functions.php');
if (!isset($_SESSION['user'])) {
    alert('warning', 'Unauthorized Access! Login before you proceed!');
    header('Location: ../../login.php');
    die();
}
// require_once('src/components/header.php');

$user = $_SESSION['user'];
$user_id = $_SESSION['user']['id'];
$total = 0;
$time = time();
foreach ($_SESSION['cart'] as $key => $value) {
    $total += $value['price']*$value['quantity'];
}


db_insert('orders',
[
    'customer_id' => $user['id'],
    'order_status' => 1,
    'shipping' => json_encode($_SESSION['shipping']),
    'cart' => json_encode($_SESSION['cart']),
    'user' => json_encode($_SESSION['user']),
    'order_date' => $time,
    'total_price' => $total
    
]);
// echo "<pre>";
//     print_r($_SESSION['cart']);
//     die();

$sql = "SELECT ot_id, customer_id FROM orders WHERE customer_id = $user_id ORDER BY order_date DESC LIMIT 1 ";
$res = $conn->query($sql);
$order = $res->fetch_assoc();
$orderid = ((int)$order['ot_id']);
$userid = ((int)$order['customer_id']);
// echo "<pre>";
// print_r($item_id. "<br>");
// print_r($order);
// die();

foreach ($_SESSION['cart'] as $key => $value) {
    $item_id = ((int)$value['sst_id']);
    $quantity = ((int)$value['quantity']);

    db_insert('temp_quantity',
    [
        'order_id' => $orderid,
        'item_id' => $item_id,
        'item_quantity' => $quantity,
        'user_id' =>  $userid
        
    ]);
}


unset($_SESSION['cart']);
unset($_SESSION['shipping']);

header('Location: ../../checkout-complete.php');
