<?php include("../config/connection_database.php"); ?>

<?php
$sqlUser = "SELECT * FROM users WHERE `role` = 'user' ";
$queryUser = mysqli_query($mysqli, $sqlUser);
$user = mysqli_num_rows($queryUser);

$sqlOrder = "SELECT * FROM orders ";
$queryOrder = mysqli_query($mysqli, $sqlOrder);
$order = mysqli_num_rows($queryOrder);

$sqlCategory = "SELECT * FROM categories ";
$queryCategory = mysqli_query($mysqli, $sqlCategory);
$category = mysqli_num_rows($queryCategory);

$sqlItem = "SELECT * FROM items ";
$queryItem = mysqli_query($mysqli, $sqlItem);
$item = mysqli_num_rows($queryItem);
?>

<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pengguna</p>
                            <h5 class="font-weight-bolder">
                                <?php echo $user; ?> Pengguna
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pesanan</p>
                            <h5 class="font-weight-bolder">
                                <?php echo $order; ?> Pesanan
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Kategori</p>
                            <h5 class="font-weight-bolder">
                                <?php echo $category; ?> Kategori
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Kue</p>
                            <h5 class="font-weight-bolder">
                                <?php echo $item; ?> Kue
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>