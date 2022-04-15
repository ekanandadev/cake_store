<?php include("../config/connection_database.php"); ?>

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Item</label>
                                <input class="form-control" type="text" name="item_name">
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
                                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
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
                                <input class="form-control" type="number" name="stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input class="form-control" type="number" name="price">
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
                    <button type="submit" class="btn btn-primary btn-sm mb-0" value="Save" name="save">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>