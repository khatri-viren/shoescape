<?php
require_once('./functions.php');

$id = $_POST['id'];
$gst_id = $_POST['gst_id'];


wishlist_item_delete($id, $gst_id);

// echo "<pre>";
// print_r($_POST);
// die();