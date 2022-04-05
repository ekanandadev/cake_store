<?php include("../config/connection_database.php"); ?>

<?php
$sql = "SELECT items.item_name, items.stock, items.price, categories.category_name
            FROM items
            INNER JOIN categories ON items.category_id = categories.id WHERE items.id = '$_GET[item_id]' ";
$query = mysqli_query($mysqli, $sql);
$item = mysqli_fetch_array($query);
?>

<div class="row mt-4">
    <div class="col-xl-4 col-md-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $item['item_name'] ?></h6>
            </div>
            <div class="card-body">
                <img class="card-img-top" src="https://images.unsplash.com/photo-1542550371427-311e1b0427cc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-md-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kue</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Kue</th>
                            <td>:</td>
                            <td><?php echo $item['item_name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Kategori</th>
                            <td>:</td>
                            <td><?php echo $item['category_name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Stok</th>
                            <td>:</td>
                            <td><?php echo $item['stock'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Harga</th>
                            <td>:</td>
                            <td><?php echo $item['price'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <form role="form" action="action/payment.php" method="POST">
                    <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="item_id" value="<?php echo $_GET['item_id']?>" >
                    <div class="d-flex justify-content-between">
                        <div class="input-group w-25">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="qty">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="qty" class="form-control input-number mx-2" value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="qty">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
                        <button type="submit" value="Save" name="save" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="text">Tambahkan Ke Keranjang</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>