<?php
require_once('../../logicFiles/functions.php');
    
    $data['b_name'] = $_POST['brand'];

    if (db_insert('brands', $data)) {
        header('Location: ../../components/admin/admin-add-newstuff.php');
        alert('success', 'Brand added successfully!');
        unset($_SESSION['form']);
    } else {
        header('Location: ../../components/admin/admin-add-newstuff.php');
        alert('danger', "Failed to add Brand! Please try again");
    }

// echo "<pre>";
// print_r($stocklog);
// die();
?>
