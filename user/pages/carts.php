<?php
include("../config/connection_database.php");
$is_pre_order = false;
?>

<form action="action/order.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Keranjang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kue</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_price = 0;
                        $sql = "SELECT * FROM carts WHERE `user_id` = '$_SESSION[user_id]' ";
                        $query = mysqli_query($mysqli, $sql);
                        while ($cart = mysqli_fetch_array($query)) {
                            $sqlItem = "SELECT items.id, items.item_name, items.stock, items.price, categories.category_name
                        FROM items
                        INNER JOIN categories ON items.category_id = categories.id WHERE items.id = '$cart[item_id]' ";
                            $queryItem = mysqli_query($mysqli, $sqlItem);
                            $item = mysqli_fetch_array($queryItem);
                            if ($cart['qty'] > $item['stock']) {
                                $is_pre_order = true;
                            }
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $item['item_name'] ?></td>
                                <td><?php echo $item['category_name'] ?></td>
                                <td><?php echo $item['stock'] ?></td>
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
            <br>
            <h5>Detail Konsumen</h5>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" class="form-control form-control-user" placeholder="Nama Pemesan..." name="customer_name">
                    </div>
                    <div class="form-group">
                        <label>No Handphone</label>
                        <input type="text" class="form-control form-control-user" placeholder="No Handphone..." name="customer_phone">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control form-control-user" placeholder="Alamat..." name="customer_address">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pesanan (Jika Pesanan Lebih Besar Daripada Stok Maka Harus Menggunakan Pre Order)</label>
                        <select class="form-control" name="order_type" id="order_type">
                            <?php if ($is_pre_order == false) { ?>
                                <option selected>Jenis Pesanan</option>
                                <option value="direct_order">Non Pre Order</option>
                            <?php } ?>
                            <option value="pre_order">Pre Order</option>
                        </select>
                    </div>
                    <div class="form-group" id="po_date">
                        <label>Tanggal Pre Order</label>
                        <input type="date" class="form-control form-control-user" name="po_date">
                    </div>
                    <div class="form-group" id="po_time">
                        <label>Jam Pre Order</label>
                        <input type="text" id="timepicker-24-hr" name="po_time" class="timepicker-24-hr form-control form-control-user">                    
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="total_price" value="<?php echo $total_price ?>">
            <button type="submit" value="Order" name="order" class="btn btn-sm btn-primary btn-icon-split float-right">
                <span class="text">Order</span>
            </button>
        </div>
    </div>
</form>