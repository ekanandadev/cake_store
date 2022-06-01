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
                <h6>Tambah Pengguna</h6>
            </div>
            <div class="card-body">
                <form role="form" action="action/user.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Pengguna</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" name="username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input class="form-control" type="text" name="password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-0" value="Save" name="save">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>