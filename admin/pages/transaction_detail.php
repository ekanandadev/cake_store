<?php include("../config/connection_database.php"); ?>

<?php
$sql = "SELECT * FROM orders WHERE id = '$_GET[id]' ";
$query = mysqli_query($mysqli, $sql);
$item = mysqli_fetch_array($query);

$sqlSum = "SELECT SUM(total_price) AS total_price FROM order_details";
$querySum = mysqli_query($mysqli, $sqlSum);
$total = mysqli_fetch_array($querySum);

$sqlReview = "SELECT * FROM reviews WHERE order_id = '$_GET[id]' ";
$queryReview = mysqli_query($mysqli, $sqlReview);
$review = mysqli_fetch_array($queryReview);
?>

<div class="row mt-4">
    <div class="col-xl-5 col-md-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kue</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID Pesanan</th>
                            <td>:</td>
                            <td><?php echo "PESANAN#" . $item['id'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Pesanan</th>
                            <td>:</td>
                            <td><?php echo $item['order_date'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Pemesan</th>
                            <td>:</td>
                            <td><?php echo $item['customer_name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td>:</td>
                            <td><?php echo $item['total_price'] ?></td>
                        </tr>
                        <?php if ($item['type'] == "pre_order") { ?>
                        <tr>
                            <th scope="row">Tanggal Pre Order</th>
                            <td>:</td>
                            <td><?php echo $item['po_date'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Jam Pre Order</th>
                            <td>:</td>
                            <td><?php echo $item['po_time'] ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th scope="row">Status</th>
                            <td>:</td>
                            <td><?php echo $item['status'] ?></td>
                        </tr>
                        <?php if ($item['status'] == "completed")  { ?>
                            <tr>
                                <th scope="row">Review Pelanggan</th>
                                <td>:</td>
                                <td><?php echo $review['description'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?php if ($item['status'] != "completed")  { ?>
                <form action="action/finish_order.php" method="POST" target="_blank">
                    <input type="hidden" name="order_id" value="<?php echo $item['id'] ?>">
                    <button type="submit" value="Finish" name="finish" class="btn btn-sm btn-primary btn-icon-split float-right">
                        <span class="text">Selesaikan Pesanan</span>
                    </button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-md-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kue</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kue</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_price = 0;
                            $sql = "SELECT * FROM order_details WHERE `order_id` = '$item[id]' ";
                            $query = mysqli_query($mysqli, $sql);
                            while ($cart = mysqli_fetch_array($query)) {
                                $sqlItem = "SELECT items.id, items.item_name, items.stock, items.price, categories.category_name
                        FROM items
                        INNER JOIN categories ON items.category_id = categories.id WHERE items.id = '$cart[item_id]' ";
                                $queryItem = mysqli_query($mysqli, $sqlItem);
                                $item = mysqli_fetch_array($queryItem);
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $item['item_name'] ?></td>
                                    <td><?php echo $item['category_name'] ?></td>
                                    <td><?php echo $cart['qty'] ?></td>
                                    <td><?php echo $item['price'] ?></td>
                                    <td><?php echo $item['price'] * $cart['qty'] ?></td>
                                </tr>
                            <?php
                                $total_price = $total_price + ($item['price'] * $cart['qty']);
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