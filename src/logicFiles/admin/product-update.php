<?php
require_once('../functions.php');
admin_protected_area();

// echo "<pre>";
// print_r($_POST);
// die();

// $id = $_GET['id'];
// $products = get_admin_products($id);

if (isset($_POST['price'])) {

    $price = $_POST['price'];
    $gst_id = $_POST['gst_id'];

    $sql = "UPDATE specific_shoe SET price = $price WHERE general_shoe_id = $gst_id";
} else if (isset($_POST['delete'])) {
    $sstid = $_POST['sst_id'];

    $pgst_sql = "SELECT general_shoe_id FROM specific_shoe WHERE sst_id = $sstid";
    $pgst_id = $conn->query($pgst_sql);
    $pgst_id = $pgst_id->fetch_column();


    $pcolour_sql = "SELECT c.colour from specific_shoe s, colours c where s.colour_id = c.ct_id and s.sst_id = $sstid";
    $pcolour = $conn->query($pcolour_sql);
    $pcolour = $pcolour->fetch_column();

    $psize_sql = "SELECT ss.size from specific_shoe s, sizes ss where s.size_id = ss.st_id and s.sst_id = $sstid";
    $psize = $conn->query($psize_sql);
    $psize = $psize->fetch_column();

    $pcolour = $conn->real_escape_string($pcolour);
    $sqlinsert_sql = "INSERT INTO deleted_log (gst_id, colour, size, date_time) VALUES ($pgst_id, '$pcolour', '$psize', NOW())";




    $sqlinsert = $conn->query($sqlinsert_sql);
    // $sqlinsert = $sqlinsert->fetch_column();

    $sql = "DELETE FROM specific_shoe WHERE sst_id = $sstid";
} else {
    $sstid = $_POST['sst_id'];
    $addstock = $_POST['addstock'];

    $sql = "UPDATE specific_shoe SET stock = stock+$addstock WHERE sst_id = $sstid";
}

$url_addition = substr($_POST['url'], strpos($_POST['url'], "?") + 1);



if ($conn->query($sql)) {
    if (preg_match('/admin-Sproduct.php/i', $_POST["url"])) {
        header("Location: ../../components/admin/admin-Sproduct.php?" . $url_addition);
        alert('success', 'Product details updated successfully!');
        unset($_SESSION['form']);
    } else {
        header("Location: ../../components/admin/admin-dashboard.php");
        alert('success', 'Product details updated successfully!');
    }
} else {
    if (preg_match('/admin-Sproduct.php/i', $_POST["url"])) {
        header('Location: ../../components/admin/admin-Sproduct.php?' . $url_addition);
        alert('danger', "Failed to update product details! Please try again");
    } else {
        header("Location: ../../components/admin/admin-dashboard.php");
        alert('danger', "Failed to update product details! Please try again");
    }
}
