<?php

$connection = mysqli_connect("localhost", "root", "", "db_bookstore");
if (mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}
