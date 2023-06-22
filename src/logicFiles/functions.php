<?php
include __DIR__ . '/../../vendor/stefangabos/zebra_image/Zebra_Image.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../../vendor/autoload.php';

define('BASE_URL', 'http://localhost/shoeshopv2');

$conn = new mysqli('localhost', 'root', '', 'e-shop');

function get_image_thumb($json){
    $img = "img/marketplace/products/th08.jpg";

    if($json == null){
        return $img;
    }
    if(strlen($json) < 4 ){
        return $img;
    }
    $objects = json_decode($json);
    if(empty($objects)){
        return $img;
    }
    if(!isset($objects[0]->thumb)){
        return $img;
    }

    return $objects[0]->thumb;

}

function get_product_images($json){

    $img['src'] = "img/marketplace/products/th08.jpg";
    $img['thumb'] = "img/marketplace/products/th08.jpg";
    $photos[] = $img;

    if($json == null){
        return $photos;
    }
    if(strlen($json) < 4 ){
        return $photos;
    }
    $objects = json_decode($json);
    
    if(empty($objects)){
        return $photos;
    }

    return $objects;
}

function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        alert('success', 'Logged out Successfully!');
        header('Location: ../../index.php');
    } else {
        die();
    }
}

function protected_area()
{
    if (!isset($_SESSION['user'])) {
        alert('warning', 'Unauthorized Access! Login before you proceed!');
        header('Location: admin-login.php');
        die();
    }
}

function admin_protected_area()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 'admin') {
        header('Location: ../../../admin-login.php');
        alert('warning', 'Unauthorized Access! Login before you proceed!');
        die();
    }
}

function url($path = "/")
{
    return BASE_URL . $path;
}

function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}

function is_logged_in()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function login_user($email, $password)
{

    global $conn;
    $sql = ("SELECT * FROM users WHERE email = '{$email}' ");
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

function text_input($data)
{
    $name = (isset($data['name'])) ? $data['name'] : '';
    $attributes = (isset($data['attributes'])) ? $data['attributes'] : '';

    $value = "";
    $error = "";
    $errortext = "";
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['value'])) {
            if (isset($_SESSION['form']['value'])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['error'])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $errortext = "<div class='form-text text-danger'>{$error}</div>";
            }
        }
    }


    $label = (isset($data['label'])) ? $data['label'] : $name;
    $value = (isset($data['value'])) ? $data['value'] : $value;
    $error = (isset($data['error'])) ? $data['error'] : $error;

    return
        "<label class='form-label text-capitalize' for='{$name}'>{$label}</label>
    <input value='{$value}' class='form-control' name='{$name}' type='text' id='{$name}' placeholder='{$name}' '{$attributes}'>" . $errortext;
}

function select_input($data,$options)
{
    $name = (isset($data['name'])) ? $data['name'] : '';
    $attributes = (isset($data['attributes'])) ? $data['attributes'] : '';

    $value = "";
    $error = "";
    $errortext = "";
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['value'])) {
            if (isset($_SESSION['form']['value'])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['error'])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $errortext = "<div class='form-text text-danger'>{$error}</div>";
            }
        }
    }


    $label = (isset($data['label'])) ? $data['label'] : $name;
    $value = (isset($data['value'])) ? $data['value'] : $value;
    $error = (isset($data['error'])) ? $data['error'] : $error;

    $select_options = "";
    foreach ($options as $key => $value) {
        $selected = "";
        if ($key == $value){
            $selected = " selected ";
        }
        $select_options .= "<option value={$key}>{$value}</option>";
    }
    $select_tag = "<select class='form-control' name='{$name}' type='text' id='{$name}' placeholder='{$name}' '{$attributes}'>'{$select_options}'</select>";

    return
    "<label class='form-label text-capitalize' for='{$name}'>{$label}</label>".$select_tag.$errortext;
}

// Image compression
function create_thumb($source, $target)
{

    $image = new Zebra_Image();
    $image->auto_handle_exif_orientation = true;
    $image->source_path = $source;
    $image->target_path = $target;


    $image->preserve_aspect_ratio = true;
    $image->enlarge_smaller_images = true;
    $image->preserve_time = true;
    // $image->handle_exif_orientation_tag = true;

    // $img_size = getimagesize($image->source_path);
    $image->jpeg_quality = get_jpeg_quality(filesize($image->source_path));

    $width = 1000;
    $height = 1000;

    if (!$image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER)) {
        return $image->source_path;
    } else {
        return $image->target_path;
    }
}

function get_jpeg_quality($_size)
{

    $size = ($_size / 1000000);
    $qt = 50;
    if ($size > 5) {
        $qt = 20;
    } else if ($size > 4) {
        $qt = 23;
    } else if ($size > 2) {
        $qt = 25;
    } else if ($size > 1) {
        $qt = 27;
    } else if ($size > 0.8) {
        $qt = 50;
    } else if ($size > .5) {
        $qt = 80;
    } else {
        $qt = 90;
    }
    return $qt;
}

function upload_images($files)
{

    if ($files == null || empty($files)) {
        return [];
    }
    $uploaded_images = array();

    echo "<pre>";
    foreach ($files as $file) {

        if (
            isset($file['name']) &&
            isset($file['type']) &&
            isset($file['tmp_name']) &&
            isset($file['error']) &&
            isset($file['size'])
        ) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

            $file_name = time() . '-' . rand(1000, 100000) . '.' . $ext;
            $destination = 'uploads/' . $file_name;
            $thumb_destination = 'uploads/thumb_' . $file_name;

            $res = move_uploaded_file($file['tmp_name'], $destination);
            if (!$res) {
                continue;
            }
            $thumb_destination = create_thumb($destination,$thumb_destination);
            $img['src'] = $destination;
            $img['thumb'] = $thumb_destination;
            $uploaded_images[] = $img;
        }
    }

    return $uploaded_images;
}

function db_insert($table_name, $data){
    global $conn;
    $sql = "INSERT INTO $table_name ";

    $column_names = "(";
    $column_values = "(";

    $is_first = true;
    foreach ($data as $key => $value) {
        if($is_first){
            $is_first = false;
        }else{
            $column_names .= ",";
            $column_values .= ",";
        }
        $column_names .= $key;

        $gettype = gettype($value);
        if($gettype == 'string'){
            $value = $conn->real_escape_string($value);
            $column_values .= "'$value'";
            

        }else{
            $value = $conn->real_escape_string($value);
            $column_values .= $value;
        }
    }

    $column_names .= ")";
    $column_values .= ")";

    $sql .= $column_names." VALUES ".$column_values;
    // echo "<pre>";
    //     print_r($sql);
    //     die();
    if($conn->query($sql)){
        return true;
    }else{
        echo "<pre>";
        print_r($conn);
        die();

        return false;
    }
}

function db_select($table, $condition = null){
    $sql = "SELECT * FROM $table";
    if($condition != null){
        $sql .= " WHERE $condition";
    }
    global $conn;
    // echo "<pre>";
    // print_r($sql);
    // die();
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;

}

function product_ui_1($value){
    
    $thumb = get_image_thumb($value['photos']);
    $str = <<<EOF
    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i>
                </button>
                <a class="card-img-top d-block overflow-hidden" href="product.php?id={$value['id']}"><img src="{$thumb}" alt="Product">
                </a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="javascript:;"><b>{$value['brand_name']}</a>
                    <h3 class="product-title fs-sm"><a href="product.php?id={$value['id']}">{$value['product_name']}</a></h3>
                    <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$ {$value['price']}</span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body card-body-hidden">
                    <div class="text-center pb-2">
                        <div class="form-check form-option form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="size1" id="s-75">
                            <label class="form-option-label" for="s-75">7.5</label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="size1" id="s-80" checked>
                            <label class="form-option-label" for="s-80">8</label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="size1" id="s-85">
                            <label class="form-option-label" for="s-85">8.5</label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="size1" id="s-90">
                            <label class="form-option-label" for="s-90">9</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                    <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                </div>
            </div>
            <hr class="d-sm-none">
        </div>

    EOF;

    return $str;
}

function get_product($id){
    $sql = "SELECT * FROM brands b, specific_shoe ss, general_shoe g, sizes s, colours c WHERE g.gst_id = $id AND g.gst_id = ss.general_shoe_id AND g.brand_id = b.bb_id AND ss.colour_id = c.ct_id AND ss.size_id = s.st_id GROUP BY g.gst_id";
    global $conn;
    $res = $conn->query($sql);
    // while ($row = $res->fetch_assoc()){
    //     $rows[] = $row;
    // }
    // return $rows;
    return $res->fetch_assoc();
    
}

function get_product_wColour($id, $ctid){
    $sql = "SELECT * FROM brands b, specific_shoe ss, general_shoe g, sizes s, colours c WHERE g.gst_id = $id AND ss.colour_id = $ctid AND g.gst_id = ss.general_shoe_id AND g.brand_id = b.bb_id AND ss.colour_id = c.ct_id AND ss.size_id = s.st_id GROUP BY g.gst_id";
    global $conn;
    $res = $conn->query($sql);
    // while ($row = $res->fetch_assoc()){
    //     $rows[] = $row;
    // }
    // return $rows;
    return $res->fetch_assoc();
    
}

function get_product_sizes($id){
    $sql = "SELECT s.st_id, s.size FROM specific_shoe ss, general_shoe g, sizes s, colours c WHERE g.gst_id = $id AND g.gst_id = ss.general_shoe_id  AND ss.colour_id = c.ct_id AND ss.size_id = s.st_id ";
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
    // return $res->fetch_assoc();
    
}

function get_product_colours($id){
    $sql = "SELECT g.gst_id, c.ct_id, c.colour FROM specific_shoe ss, general_shoe g, colours c WHERE g.gst_id = $id AND g.gst_id = ss.general_shoe_id  AND ss.colour_id = c.ct_id";
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
    // return $res->fetch_assoc();
    
}

function get_brands(){
    $sql = "SELECT b.bb_id, b_name FROM brands b ORDER BY b_name ASC";
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function get_filtering_sizes(){
    $sql = "SELECT s.st_id, s.size FROM sizes s ORDER BY s.size";
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function get_colours(){
    $sql = "SELECT c.ct_id, c.colour FROM colours c ORDER BY c.colour ASC";
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}


function fake_products_generator(){
    $names = [
        "Lorem ipsum dolor sit amet.",
        "Lorem, ipsum dolor.",
        "Lorem ipsum dolor sit ",
        "Lorem,  sit amet consectetur "
    ];

    $photos = [];
    // for ($i=1; $i < 21; $i++) { 
        
    // }

    $categories = [1,2];

    for ($i=0; $i < 20; $i++) { 
        shuffle($names);
        shuffle($photos);
        shuffle($categories);
        $pic['thumb'] = 'uploads/'.$i.'.jpg';
        $pic['src'] = 'uploads/'.$i.'.jpg';
        $photos[] = $pic;
        $pro['brand_name'] = 'Sample';
        $pro['product_name'] = $names[1];
        $pro['buying_price'] = rand(100, 4000);
        $pro['price'] = rand(1000, 8000);
        $pro['description'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt nihil numquam nisi eos, eius earum est et perferendis quia debitis.";
        $pro['photos'] = json_encode($photos);
        $pro['category_id'] = $categories[0];
        $pro['size'] = rand(5,11);
        db_insert('products', $pro);
        $photos = [];
    }

    // die(("generating...."));
}

function fetch_products($wherecondition = null, $orderbycondition = ' g.gst_id DESC ' , $limitcondition = null){
    global $conn;
    $sql = "SELECT * FROM brands b, general_shoe g, specific_shoe s WHERE g.gst_id = s.general_shoe_id AND g.brand_id = b.bb_id $wherecondition GROUP BY g.gst_id ORDER BY $orderbycondition $limitcondition";
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function store_url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    return $url;  
}

function fetch_wishlist_items($id){
    global $conn;
    $sql = "SELECT g.gst_id, b.b_name, g.product_name, g.image, s.price FROM wishlist w, brands b, general_shoe g, specific_shoe s WHERE w.user_id = $id AND w.general_product_id = g.gst_id AND g.gst_id = s.general_shoe_id AND g.brand_id = b.bb_id GROUP BY g.gst_id ORDER BY g.gst_id DESC";
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function wishlist_item_delete($id, $gst_id){
    global $conn;
    $sql = "DELETE FROM wishlist WHERE user_id = $id AND general_product_id = $gst_id";
    
    if ($conn->query($sql)) {
        header('Location: ../../wishlist.php');  
        alert('success', 'Product removed from Wishlist successfully!');
        unset($_SESSION['form']);
    } else {
        header('Location: ../../wishlist.php');  
        alert('danger', "Failed to remove product! Please try again");
    }


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function db_select_single($table, $condition = null){
    $sql = "SELECT * FROM $table";
    if($condition != null){
        $sql .= " WHERE $condition";
    }
    global $conn;
    // echo "<pre>";
    // print_r($sql);
    // die();
    $res = $conn->query($sql);
    return $res->fetch_assoc();

}

function stock_log_fetch(){
    global $conn;
    $sql = "SELECT * FROM stock_log sl, specific_shoe ss, general_shoe g, brands b, colours c, sizes s WHERE sl.item_id = ss.sst_id AND ss.general_shoe_id = g.gst_id AND g.brand_id = b.bb_id AND ss.size_id = s.st_id AND ss.colour_id = c.ct_id ORDER BY sl.sl_id DESC LIMIT 8";
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function get_sales_singleproduct($id){
    $sql = "SELECT COUNT(sl_id) as sales FROM stock_log sl, specific_shoe ss, general_shoe g WHERE ss.sst_id = $id AND sl.item_id = ss.sst_id AND ss.general_shoe_id = g.gst_id GROUP BY g.gst_id"; 
    global $conn;
    // echo "<pre>";
    // print_r($sql);
    // die();
    $res = $conn->query($sql);
    return $res->fetch_column();
}

function fetch_reviews($id){
    global $conn;
    $sql = "SELECT * FROM product_reviews WHERE item_id = $id ORDER BY prt_id DESC";
    // echo "<pre>";
    // print_r($sql);
    // die();
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}  

function get_admin_products($id){
    $sql = "SELECT * FROM brands b, specific_shoe ss, general_shoe g, sizes s, colours c WHERE g.gst_id = $id AND g.gst_id = ss.general_shoe_id AND g.brand_id = b.bb_id AND ss.colour_id = c.ct_id AND ss.size_id = s.st_id GROUP BY s.size, c.colour";
    global $conn;
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
    // return $res->fetch_assoc();
}