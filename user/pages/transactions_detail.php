<?php include("../config/connection_database.php"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
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
                    $sql = "SELECT * FROM carts WHERE `user_id` = '1' ";
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
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <form action="action/payment.php" method="POST" target="_blank">
            <button type="submit" value="Pay" name="pay" class="btn btn-sm btn-primary btn-icon-split float-right">
                <span class="text">Bayar</span>
            </button>
        </form>
    </div>
</div>