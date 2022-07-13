<?php include("../config/connection_database.php"); ?>

<?php
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $sqlOrder = "SELECT * FROM orders WHERE order_date BETWEEN '$_GET[start_date]' AND '$_GET[end_date]' ";
    $queryOrder = mysqli_query($mysqli, $sqlOrder);
    $order = mysqli_num_rows($queryOrder);

    $sqlTotalQuantity = "SELECT SUM(order_details.qty) AS total_quantity FROM order_details INNER JOIN orders ON order_details.order_id = orders.id WHERE orders.order_date BETWEEN '$_GET[start_date]' AND '$_GET[end_date]'";
    $queryTotalQuantity = mysqli_query($mysqli, $sqlTotalQuantity);
    $totalQuantity = mysqli_fetch_array($queryTotalQuantity);

    $sqlOmset = "SELECT SUM(order_details.total_price) AS omset FROM order_details INNER JOIN orders ON order_details.order_id = orders.id WHERE orders.order_date BETWEEN '$_GET[start_date]' AND '$_GET[end_date]'";
    $queryOmset = mysqli_query($mysqli, $sqlOmset);
    $totalOmset = mysqli_fetch_array($queryOmset);
} else {
    $sqlOrder = "SELECT * FROM orders WHERE order_date";
    $queryOrder = mysqli_query($mysqli, $sqlOrder);
    $order = mysqli_num_rows($queryOrder);

    $sqlTotalQuantity = "SELECT SUM(qty) AS total_quantity FROM order_details";
    $queryTotalQuantity = mysqli_query($mysqli, $sqlTotalQuantity);
    $totalQuantity = mysqli_fetch_array($queryTotalQuantity);

    $sqlOmset = "SELECT SUM(total_price) AS omset FROM order_details";
    $queryOmset = mysqli_query($mysqli, $sqlOmset);
    $totalOmset = mysqli_fetch_array($queryOmset);
}
?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Cari Berdasarkan Tanggal</h6>
            </div>
            <div class="card-body">
                <form role="form" action="index.php" method="GET">
                    <input class="form-control" type="hidden" name="page" value="report">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Awal</label>
                                <input class="form-control" type="date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="end_date">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-0">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Produk yang Terjual</p>
                            <h5 class="font-weight-bolder">
                                <?php echo $totalQuantity['total_quantity']; ?> Pcs
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
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Omset</p>
                            <h5 class="font-weight-bolder">
                                Rp.<?php echo $totalOmset['omset']; ?>
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
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
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
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel Pesanan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Kue</th>
                                <th>Total</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
                                $sql = "SELECT * FROM order_details INNER JOIN orders ON order_details.order_id = orders.id WHERE orders.order_date BETWEEN '$_GET[start_date]' AND '$_GET[end_date]' ";
                                $query = mysqli_query($mysqli, $sql);
                            } else {
                                $sql = "SELECT * FROM order_details ";
                                $query = mysqli_query($mysqli, $sql);
                            }
                            while ($orders = mysqli_fetch_array($query)) {
                                $sqlItem = "SELECT * FROM items WHERE id = '$orders[item_id]' ";
                                $queryItem = mysqli_query($mysqli, $sqlItem);
                                $item = mysqli_fetch_array($queryItem);
                                $sqlOrder = "SELECT * FROM orders WHERE id = '$orders[order_id]' ";
                                $queryOrder = mysqli_query($mysqli, $sqlOrder);
                                $order = mysqli_fetch_array($queryOrder);
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $order['order_date'] ?></td>
                                    <td><?php echo $item['item_name'] ?></td>
                                    <td><?php echo $orders['qty'] ?></td>
                                    <td><?php echo $orders['item_price'] ?></td>
                                    <td><?php echo $orders['total_price'] ?></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>