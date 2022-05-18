<?php include("../config/connection_database.php"); ?>

<div class="row">
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
                                        <a href="index.php?page=transaction_detail&id=<?php echo $orders['id'] ?>" class="btn btn-sm btn-primary btn-icon-split">
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
        </div>
    </div>
</div>