<?php include("../config/connection_database.php"); ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h6>Daftar Kue</h6>
                    <a href="index.php?page=item_add" class="btn btn-primary btn-sm mb-0">Tambah Kue</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kue</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT items.id, items.item_name, items.stock, items.price, categories.category_name
                            FROM items
                            INNER JOIN categories ON items.category_id = categories.id;";
                            $query = mysqli_query($mysqli, $sql);
                            while ($item = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $item['item_name'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $item['category_name'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $item['price'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $item['stock'] ?></p>
                                    </td>
                                    <td class="col-md-2 align-right">
                                        <a href="index.php?page=item_edit&id=<?php echo $item['id'] ?>" class="btn btn-success btn-sm mb-0 mx-1" name="delete">Ubah</button>
                                        <a href="action/item.php?action=delete&id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm mb-0 mx-1" name="delete">Hapus</button>
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