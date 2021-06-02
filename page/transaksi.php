<?php
include("system/connection.php");
?>
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <form class="search" action="" method="POST">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <?php if (isset($_POST['search'])) { ?>
                            <form action="" method="POST">
                                <button button type="submit" name="resetsearch" class="btn btn-danger">Reset</button>
                            </form>
                        <?php } ?>
                        <form action="" method="POST">
                            <?php if (isset($_POST['submitfilter'])) { ?>
                                <button type="submit" name="resetfilter" class="btn btn-danger float-end mx-1">Reset</button>
                            <?php } else { ?>
                                <button type="submit" name="submitfilter" class="btn btn-primary float-end mx-1">Filter</button>
                            <?php } ?>

                            <input type="number" name="numbervalue" placeholder="10" class="float-end">
                            <select name="sort" id="" class="float-end mx-1">
                                <option value=">">Lebih dari</option>
                                <option value="<">Kurang dari</option>
                            </select>
                            <select name="filtertype" id="filter" class="float-end mx-1">
                                <option value="Harga">Harga</option>
                                <option value="Stok">Stok</option>
                            </select>
                            <label class="float-end mx-2">Filter :</label>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = mysqli_query($connection, "SELECT * FROM tb_buku");
                                // update buku
                                if (isset($_POST['submitUpdateBuku'])) {
                                    $idbuku = $_POST['idbuku'];
                                    $hargabuku = $_POST['hargabuku'];
                                    $stokbuku = $_POST['stokbuku'];
                                    $apakahUpdateBerhasil = mysqli_query($connection, "CALL update_buku($idbuku, $hargabuku, $stokbuku)");
                                    if (!$apakahUpdateBerhasil) {
                                        echo "<script> alert('Error!');</script>";
                                    } else {
                                        echo "<script> document.location = window.location.href </script>";
                                    }
                                }
                                if (isset($_POST['submitdeletebuku'])){
                                    $idbuku = $_POST['idbuku'];
                                    mysqli_query($connection, "DELETE FROM tb_buku WHERE id_buku = $idbuku");
                                    echo "<script> document.location = window.location.href; </script>";
                                }
                                if (isset($_POST['search'])) {
                                    $search = $_POST['search'];
                                    $select = mysqli_query($connection, "SELECT * FROM tb_buku WHERE judul_buku LIKE '%$search%'");
                                }
                                if (isset($_POST['submitfilter'])) {
                                    if (!empty($_POST['numbervalue'])) {
                                        $number_value = $_POST['numbervalue'];
                                        $filtertype = $_POST['filtertype'];
                                        $sort = $_POST['sort'];
                                        echo "<h4>Results for $filtertype $sort $number_value :</h4>";
                                        $select = mysqli_query($connection, "SELECT * FROM tb_buku WHERE $filtertype $sort $number_value");
                                    } else {
                                        echo "<script> document.location = window.location.href; </script>";
                                    }
                                }
                                if (isset($_POST['submitorder'])) {
                                    $idbuku = $_POST['order_idbuku'];
                                    $namapembeli = $_POST['order_namapembeli'];
                                    $jumlahbeli = $_POST['order_jumlahbeli'];
                                    mysqli_query($connection, "CALL order_buku($idbuku, $jumlahbeli, '$namapembeli')");
                                    echo "<script> document.location = window.location.href; </script>";
                                }
                                $count_number=0;
                                while ($data = mysqli_fetch_array($select)) {
                                    $id_penerbit = $data["id_penerbit"];
                                    $penerbit = mysqli_query($connection, "SELECT NamaPenerbit('$id_penerbit')");
                                    $penerbit = mysqli_fetch_array($penerbit);
                                    $count_number++;
                                    echo "
                                        <tr role='row'>
                                            <td class='dtr-control' tabindex='0'>" . $count_number . "</td>
                                            <td>" . $data["judul_buku"] . "</td>
                                            <td>" . $data["pengarang"] . "</td>
                                            <td>" . $penerbit[0] . "</td>
                                            <td> Rp " . $data["harga"] . "</td>
                                            <td>" . $data["stok"] . "</td>
                                            <td>
                                                <button type='button' class='editprofile fa fa-edit' data-bs-toggle='modal' data-bs-target='#editbuku" . $data['id_buku'] . "'></button>
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#orderbuku" . $data['id_buku'] . "'>Order</button>
                                            </td>
                                        </tr>
                                    ";
                                ?>
                                    <!-- Pop up ORDER -->
                                    <div class="modal" id="orderbuku<?= $data['id_buku']; ?>" tabindex="-1" aria-labelledby="test12" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mymodallabel">Order Buku : <?= $data['judul_buku']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <input class="form-control" name="order_idbuku" type="number" value="<?= $data['id_buku'] ?>" aria-label="input example" hidden>
                                                        <label>Nama Pembeli</label>
                                                        <input type="text" name="order_namapembeli" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                                        <label>Jumlah Beli</label>
                                                        <input type="number" name="order_jumlahbeli" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="submitorder" class="btn btn-primary">Order</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- end of pop up order -->
                                    <!-- pop up EDIT -->
                                    <div class="modal" id="editbuku<?= $data['id_buku']; ?>" tabindex="-1" aria-labelledby="test12" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editbuku_label">Edit Buku : <?= $data['judul_buku'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <label>ID Buku</label>
                                                        <input name="idbuku" value="<?= $data['id_buku'] ?>" hidden>
                                                        <input class="form-control" type="number" value="<?= $data['id_buku'] ?>" disabled>
                                                        <label>Judul Buku</label>
                                                        <input class="form-control" type="text" placeholder="<?= $data['judul_buku'] ?>" disabled>
                                                        <label>Pengarang</label>
                                                        <input class="form-control" type="text" placeholder="<?= $data['pengarang'] ?>" disabled>
                                                        <label>Penerbit</label>
                                                        <input class="form-control" type="text" placeholder="<?= $penerbit[0] ?>" disabled>
                                                        <label>Harga</label>
                                                        <input class="form-control" name="hargabuku" type="number" value="<?= $data['harga'] ?>">
                                                        <label>Stock</label>
                                                        <input type="number" class="form-control input-stok" name="stokbuku" value="<?= $data['stok'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#hapusbuku<?= $data['id_buku']; ?>" class="btn btn-danger">Hapus Buku</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="submitUpdateBuku" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end of pop up EDIT -->
                                    <!-- pop up DELETE CONFIRMATION -->
                                    <div class="modal" id="hapusbuku<?= $data['id_buku']; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editbuku_label">Yakin Ingin Hapus Buku : <?= $data['judul_buku'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-footer">
                                                        <input type="number" name="idbuku" value="<?= $data['id_buku'] ?>" hidden>
                                                        <button type="submit" name="submitdeletebuku" class="btn btn-danger">Hapus Buku</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end of pop up DELETE CONFIRMATION -->
                                <?php } ?>
                                <!-- end of while -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
