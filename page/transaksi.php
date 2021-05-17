<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <form class="search" action="action.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Pengarang</th>
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
                                        Rp 90.000
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <button type="button" class="editprofile fa fa-edit" data-toggle="modal" data-target="#mymodal"></button>
                                        <button>Beli</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>