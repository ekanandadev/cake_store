<?php include("../config/connection_database.php"); ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h6>Daftar User</h6>
                    <a href="index.php?page=item_add" class="btn btn-primary btn-sm mb-0">Tambah User</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `users`";
                            $query = mysqli_query($mysqli, $sql);
                            while ($user = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $user['name'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $user['username'] ?></p>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>