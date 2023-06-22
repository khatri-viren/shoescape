<?php
require_once('../../logicFiles/functions.php');
    $imgs = upload_images($_FILES);
    // $imgs = [];
    $data['name'] = $_POST['name'];
    $data['description'] = $_POST['description'];
    $data['photo'] = json_encode($imgs);
    $data['parent_id'] = $_POST['parent_id'];
    
    if (db_insert('categories', $data)) {
        header('Location: ../../components/admin/admin-add-newstuff.php');
        alert('success', 'Category created successfully!');
        unset($_SESSION['form']);
    } else {
        header('Location: ../../components/admin/admin-add-newstuff.php');
        alert('danger', "Failed to create category! Please try again");
    }


// echo "<pre>";
// print_r($stocklog);
// die();

?>
