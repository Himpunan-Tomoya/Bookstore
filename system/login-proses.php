<?php
$connection = mysqli_connect("localhost", "admin_bookstore", "admin", "db_bookstore");
if (mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$select = mysqli_query($connection, "SELECT * FROM tb_user WHERE USERNAME='$username' && PASSWORD='$password'");
$num = mysqli_num_rows($select);

if ($num == 0) {
    mysqli_close($connection);
?>
    <script>
        alert("Username atau Password Salah !");
        document.location = "../login.php";
    </script>
<?php
} else {
    mysqli_close($connection);
    while ($data = mysqli_fetch_array($select)) {
        $_SESSION["username"] = $data["username"];
        $_SESSION["nama"] = $data["nama"];
    }
    header("location:../index.php");
}
?>