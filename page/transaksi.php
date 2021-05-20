<?php
include("system/connection.php");
?>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <form class="search" action="action.php">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <button class="float-end">Filter</button>
                                <input type="text" placeholder="10" class="float-end">
                                <select name="" id="" class="float-end">
                                    <option value="">Lebih dari</option>
                                    <option value="">Kurang dari</option>
                                </select>
                                <select name="filter" id="filter" class="float-end">
                                    <option value="">Filter</option>
                                    <option value="Harga" <?php //if ($filter=="Harga"){ echo "selected"; } 
                                                            ?>>Harga</option>
                                    <option value="Stok" <?php //if ($filter=="Stok"){ echo "selected"; } 
                                                            ?>>Stok</option>
                                </select>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            1
                                        </th>
                                        <td>
                                            Laskar Pelangi
                                        </td>
                                        <td>
                                            Andrea Hinata
                                        </td>
                                        <td>
                                            Rijal Studio
                                        </td>
                                        <td>
                                            Rp 90.000
                                        </td>
                                        <td>
                                            10
                                        </td>
                                        <td>
                                            <button href="edit.php" type="button" id="test12" class="editprofile fa fa-edit"></button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mymodal">Order</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $select = mysqli_query($connection, "SELECT * FROM tb_buku");
                                    $data = mysqli_query($connection, "SELECT * FROM tb_buku");
                                    while ($data = mysqli_fetch_array($select)) {
                                        $id_penerbit = $data["id_penerbit"];
                                        $penerbit = mysqli_query($connection, "SELECT nama_penerbit FROM tb_penerbit WHERE id_penerbit = '$id_penerbit'");
                                        $penerbit = mysqli_fetch_assoc($penerbit);
                                        echo "
                                            <tr role='row'>
                                                <td class='dtr-control' tabindex='0'>" . $data["id_buku"] . "</td>
                                                <td>" . $data["judul_buku"] . "</td>
                                                <td>" . $data["pengarang"] . "</td>
                                                <td>" . $penerbit["nama_penerbit"] . "</td>
                                                <td> Rp " . $data["harga"] . "</td>
                                                <td>" . $data["stok"] . "</td>
                                                <td>
                                            <button type='button' id='test12' class='editprofile fa fa-edit'></button>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#mymodal'>Order</button>
                                        </td>
                                            </tr>
                                            ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up -->
    <div class="modal" id="mymodal" tabindex="-1" aria-labelledby="test12" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mymodallabel">Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>ID Buku</label>
                    <input class="form-control" type="text" placeholder="KN001" aria-label="Disabled input example" disabled>
                    <label>Admin</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    <label>Nama Pembeli</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Order</button>
                </div>
            </div>
        </div>
    </div>