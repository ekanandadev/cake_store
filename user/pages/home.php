<?php include("../config/connection_database.php"); ?>

<div class="row mt-4">
    <?php
    $sql = "SELECT items.id, items.item_name, items.stock, items.price, items.thumbnail, categories.category_name
            FROM items
            INNER JOIN categories ON items.category_id = categories.id;";
    $query = mysqli_query($mysqli, $sql);
    while ($item = mysqli_fetch_array($query)) {
    ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $item['item_name'] ?></h6>
                </div>
                <div class="card-body">
                    <img class="card-img-top" src="http://localhost/toko_kue/admin/action/thumbnail/<?php echo $item['thumbnail']; ?>">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <?php echo $item['price'] ?>
                        <a href="index.php?page=item_detail&item_id=<?php echo $item['id']; ?>" class="btn btn-primary btn-icon-split">
                            <span class="text">Lihat Detail</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>