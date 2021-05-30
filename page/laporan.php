<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-4 mx-auto">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Buku Terjual :</h5>
                                <span class="h2 font-weight-bold mb-0"><label id="periodBalance">
                                        <center>500</center>
                                    </label></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-chart-bar-32"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 mx-auto">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Stok buku tersedia</h5>
                                <span class="h2 font-weight-bold mb-0"><label id="balance">1000</label></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-chart-pie-35"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Jumlah Terjual</th>
                                        <th scope="col">Nama Pembeli</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $select_from_tbriwayat = mysqli_query($connection, "SELECT * FROM tb_riwayat INNER JOIN tb_buku ON tb_riwayat.id_buku = tb_buku.id_buku WHERE perubahan_stok>0 ORDER BY waktu DESC");
                                    foreach ($select_from_tbriwayat as $data){
                                ?>
                                    <tr>
                                        <td>
                                            <?= $data['waktu'] ?>
                                        </td>
                                        <td>
                                            <?= $data['judul_buku'] ?>
                                        </td>
                                        <td>
                                            <?= $data['perubahan_stok'] ?>
                                        </td>
                                        <td>
                                            <?= $data['nama_pembeli'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>