<?php 

require_once('./functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);

// echo "<pre>";
// print_r($_POST);
// die();


if($password != $password_1 ){
    alert('danger', 'Passwords do not match');
    header('Location: login.php');
    die();
}

$sql = ("SELECT * FROM users WHERE email = '{$email}' ");
$res = $conn->query($sql);

if($res->num_rows > 0 ){
    alert('danger', "User with same email already exist");
    header('Location: login.php');
    die();
}

$password = password_hash($password, PASSWORD_DEFAULT);
$created = time();

$sql = "INSERT INTO users (
    first_name,
    last_name,
    phone_number,
    password,
    email,
    user_type,
    created
) VALUES (
    '{$first_name}',
    '{$last_name}',
    '{$phone_number}',
    '{$password}',
    '{$email}',
    'customer',
    '{$created}'
)";

if($conn->query($sql)){
    login_user($email, $password);
    alert('success', "Account created Successfully!");
    header('Location: ../../login.php');
}else{
    alert('danger', "Failed to create account");
    header('Location: ../../login.php');
}
