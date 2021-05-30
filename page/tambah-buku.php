<?php
$select_tbpenerbit = mysqli_query($connection, "SELECT * FROM tb_penerbit");
if (isset($_POST['submitbuku'])) {
    $judul_buku = $_POST['judulbuku'];
    $nama_pengarang = $_POST['namapengarang'];
    $nama_penerbit = $_POST['selectpenerbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $cek_penerbit = mysqli_query($connection, "SELECT * FROM tb_penerbit WHERE nama_penerbit = '$nama_penerbit'");
    $count_penerbit = 0;
    foreach ($cek_penerbit as $data) {
        $count_penerbit++;
    }
    if (!empty($cek_penerbit)) {
        foreach ($cek_penerbit as $data) {
            $cek_penerbit = $data['id_penerbit'];
        }
        if ($count_penerbit == 1) {
            mysqli_query($connection, "CALL tambah_buku('$cek_penerbit', '$judul_buku', '$nama_pengarang', $harga, $stok)");
        } else {
            $id_penerbit = mysqli_query($connection, "SELECT id_penerbit FROM tb_penerbit ORDER BY id_penerbit DESC LIMIT 1");
            foreach ($id_penerbit as $data) {
                $id_penerbit = $data['id_penerbit'];
            }
            $id_penerbit = (int) filter_var($id_penerbit, FILTER_SANITIZE_NUMBER_INT);
            $id_penerbit++;
            $id_penerbit = strval("C" . $id_penerbit);
            mysqli_begin_transaction($connection);
            mysqli_query($connection, "INSERT INTO tb_penerbit VALUES('$id_penerbit', '$nama_penerbit')");
            mysqli_query($connection, "CALL tambah_buku('$id_penerbit', '$judul_buku', '$nama_pengarang', $harga, $stok)");
            if (mysqli_commit($connection)) {
                echo "<script> alert('Berhasil menambahkan buku dengan judul : " . $judul_buku . "');</script>";
            } else {
                mysqli_rollback($connection);
                echo "<script> alert('Gagal menambahkan buku!');</script>";
            }
        }
    }
}
?>
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Buku</h1>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <label>Judul Buku</label>
                            <input name="judulbuku" class="form-control" type="text" placeholder="Sampang adalah kampung halamanku">
                            <label>Pengarang</label>
                            <input name="namapengarang" class="form-control" type="text" placeholder="Rijal Racing">
                            <label>Penerbit</label>
                            <input name="selectpenerbit" list="listpenerbit" class="form-control" placeholder="Nama Penerbit" data-live-search="true">
                            <datalist id="listpenerbit">
                                <?php foreach ($select_tbpenerbit as $data) { ?>
                                    <option value="<?= $data['nama_penerbit'] ?>"><?= $data['nama_penerbit'] ?></option>
                                <?php } ?>
                            </datalist>
                            <label>Harga</label>
                            <input name="harga" class="form-control" type="text" placeholder="9000000">
                            <label>Stok</label>
                            <input name="stok" type="text" class="form-control">
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submitbuku" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>