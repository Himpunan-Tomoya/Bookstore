<?php

$connection = mysqli_connect("localhost", "kasir_bookstore", "kasir", "db_bookstore");
if (mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}
