<?php
require_once('src/logicFiles/functions.php');
protected_area();
require_once('src/components/header.php');

$userid = $_SESSION['user']['id'];
$user = db_select_single('users', " id = $userid");


// echo "<pre>";
// print_r($user);
// die();
?>

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Profile info</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar -->
        <?php require_once('src/components/account-sidebar.php') ?>

        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="logout.php"><i class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Profile form-->
            <form method="post" action="./src/logicFiles/profile-update.php">
                <div class="row gx-4 gy-3">
                    <div class="col-sm-6">
                        <?php
                        echo text_input([
                            'name' => 'first_name',
                            'label' => 'First Name',
                            'value' => $user['first_name'],
                        ])
                        ?>
                    </div>
                    <div class="col-sm-6">
                    <?php
                        echo text_input([
                            'name' => 'last_name',
                            'label' => 'Last Name',
                            'value' => $user['last_name'],
                        ])
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-email">Email Address</label>
                        <input class="form-control" type="email" id="account-email" value="<?= $user['email'] ?>" disabled>
                    </div>
                    <div class="col-sm-6">
                    <?php
                        echo text_input([
                            'name' => 'phone_number',
                            'label' => 'Phone Number',
                            'value' => $user['phone_number'],
                        ])
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-pass">New Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="password" placeholder="Enter new password">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="password-confirm">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                    <?php
                        echo text_input([
                            'name' => 'address',
                            'label' => 'Address',
                            'value' => $user['address']
                        ])
                        ?>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-center align-items-center">
                            <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<?php
require_once('src/components/footer.php');
?>