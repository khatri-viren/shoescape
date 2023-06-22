<?php
require_once('./functions.php');
protected_area();

$user = $_SESSION['user'];
$userid = $_SESSION['user']['id'];
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name =$conn->real_escape_string( $_POST['last_name']);
$address = $conn->real_escape_string($_POST['address']);
$phone_number = $_POST['phone_number'];

$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', address = '$address', phone_number = $phone_number WHERE id = $userid";

if($conn->query($sql)){
    alert('success', 'Profile updated successfully!');
    header('Location: ../../profile.php');
}else{
    // return false;
    alert('danger', "Failed to add product! Please try again");
    header('Location: ../../profile.php');
}

// echo "<pre>";
// print_r($_POST);
// die();
?>
