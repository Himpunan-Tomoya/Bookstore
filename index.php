<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}
include("system/connection.php");
// function for active sidebar list
function getpage($pattern, $subject)
{
    $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
    return (bool) preg_match("/^{$pattern}$/i", $subject);
}
function activeList($list){
    $pagenow = $_GET['page'];
    if(getpage($pagenow, $list)){
        echo "active";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidenav">
        <div class="sidenav-header horizontal-center">
            <i class="fa fa-bars pr-10"></i> Menu
        </div>
        <a href="index.php?page=transaksi" class="<?= activeList('transaksi') ?>"><i class="fa fa-book pr-15"></i> Transaksi</a>
        <a href="index.php?page=laporan" class="<?= activeList('laporan') ?>"><i class="fa fa-pencil pr-15"></i> Laporan</a>
        <a href="index.php?page=tambah-buku" class="<?= activeList('tambah-buku') ?>"><i class="fa fa-plus pr-15"></i> Tambah Buku lah</a>
        <a href="logout.php" class="fixed-bottom my-4"><i class="fa fa-sign-out-alt pr-15"></i>Log out</a>
    </div>
    <!-- Konten -->
    <?php
    if (!isset($_GET["page"])) {
        include("page/home.php");
    } else {
        include("page/" . $_GET["page"] . ".php");
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="js/javascript.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/3e7c653e94.js" crossorigin="anonymous"></script>

</html>