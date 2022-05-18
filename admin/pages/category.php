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
                <h6>Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <form role="form" action="action/category.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                <input class="form-control" type="text" name="category_name">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-0" value="Save" name="save">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel Kategori</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM categories";
                            $query = mysqli_query($mysqli, $sql);
                            while ($category = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 px-3"><?php echo $category['category_name'] ?></p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="action/category.php?action=delete&id=<?php echo $category['id'] ?>" class="btn btn-danger btn-sm mb-0" value="Save" name="save">Hapus</button>
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