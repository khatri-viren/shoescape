<?php 

require_once('./functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);
        
if(login_user($email, $password)){
    alert('success', "Login Successful!");
    header('Location: ../../orders.php');
    die();
} else {
    alert('danger', 'Invalid username or password!');
    header('Location: ../../login.php');
    die();
}