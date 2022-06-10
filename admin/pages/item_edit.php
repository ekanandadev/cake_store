<?php include("../config/connection_database.php"); ?>

<?php
$sql = "SELECT * FROM items WHERE `id` = '$_GET[id]' ";
$query = mysqli_query($mysqli, $sql);
$item = mysqli_fetch_array($query);
?>

<?php
if (isset($_GET['status'])) {
?>
    <div class="alert alert-success text-white" role="alert">
        <?php echo $_GET['status'] ?>
    </div>
<?php
}
?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tambah Item</h6>
            </div>
            <div class="card-body">
                <form role="form" action="action/item.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $item['id'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Item</label>
                                <input class="form-control" type="text" name="item_name" value="<?php echo $item['item_name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                <select class="form-control" name="category_id">
                                    <option disabled selected> Pilih </option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $query = mysqli_query($mysqli, $sql);
                                    while ($category = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $item['category_id']) echo "selected"; ?>><?= $category['category_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Stok</label>
                                <input class="form-control" type="number" name="stock" value="<?php echo $item['stock'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input class="form-control" type="number" name="price" value="<?php echo $item['price'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Upload Foto : </label>
                                <input type="file" name="thumbnail" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-0" value="Update" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>