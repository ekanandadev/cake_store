<?php include("../config/connection_database.php"); ?>

<div class="row">
    <a href="index.php?page=home" class="btn btn-<?php if (!isset($_GET['category_id'])) { echo "primary"; } else { echo "secondary"; } ?> mx-3 float-left">Semua</a>
    <?php
    $sql = "SELECT * FROM `categories` ";
    $query = mysqli_query($mysqli, $sql);
    while ($item = mysqli_fetch_array($query)) {
    ?>
        <a href="index.php?page=home&category_id=<?php echo $item['id']; ?>" class="btn btn-<?php if ($_GET['category_id'] == $item['id']) { echo "primary"; } else { echo "secondary"; } ?> mx-3 float-left"><?php echo $item['category_name']; ?></a>
    <?php
    }
    ?>
</div>

<div class="row mt-4">
    <?php
    if (isset($_GET['category_id'])) { 
        $category_id = $_GET['category_id'];
        $sql = "SELECT items.id, items.item_name, items.stock, items.price, items.thumbnail, categories.category_name
        FROM items
        INNER JOIN categories ON items.category_id = categories.id WHERE items.category_id = '$category_id'; ";
    } else {
        $sql = "SELECT items.id, items.item_name, items.stock, items.price, items.thumbnail, categories.category_name
        FROM items
        INNER JOIN categories ON items.category_id = categories.id; ";
    }
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