<?php include("../config/connection_database.php"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM orders WHERE `user_id` = '1' ";
                    $query = mysqli_query($mysqli, $sql);
                    while ($orders = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $orders['order_date'] ?></td>
                            <td><?php echo $orders['total_price'] ?></td>
                            <td><?php echo $orders['status'] ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="text">Lihat Detail</span>
                                </a>
                            </td>
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