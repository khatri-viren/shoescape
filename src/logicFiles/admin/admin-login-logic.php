<?php 

require_once('../../logicFiles/functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);

function admin_login_user($email, $password)
{

    global $conn;
    $sql = ("SELECT * FROM users WHERE email = '{$email}' AND user_type = 'admin'");
    $res = $conn->query($sql);

    if ($res->num_rows < 1) {
        return false;
    }

    $row = $res->fetch_assoc();
    if (!password_verify($password, $row['password'])) {
        return false;
    }

    $_SESSION['user'] = $row;
    return true;
}

if(admin_login_user($email, $password)){
    alert('success', "Login Successful!");
    header('Location: ../../components/admin/admin-dashboard.php');
} else {
    alert('danger', 'Invalid username or password!');
    header('Location: ../../../admin-login.php');
}
