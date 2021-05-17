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
        <a href="transaksi.php"><i class="fa fa-book pr-15"></i> Transaksi</a>
        <a href="laporan.php" class="active"><i class="fa fa-pencil pr-15"></i> Laporan</a>
    </div>
    <!-- Konten -->
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Sisa Stock</th>
                                        <th scope="col">Jumlah Terjual</th>
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
                                            5
                                        </td>
                                        <td>
                                            5
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                            <br><br>
                            <table>
                                    <tr>
                                        <th scope="col">Total Pemasukan</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            Rp 450.000,-
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="js/javascript.js"></script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/3e7c653e94.js" crossorigin="anonymous"></script>
</html>
