<?php
include("connection.php");
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$select = mysqli_query($connection, "SELECT * FROM tb_user WHERE USERNAME='$username' && PASSWORD='$password'");
$num = mysqli_num_rows($select);

if ($num == 0) {
?>
    <script>
        alert("Username atau Password Salah !");
        document.location = "../login.php";
    </script>
<?php
} else {
    while ($data = mysqli_fetch_array($select)) {
        $_SESSION["username"] = $data["USERNAME"];
        $_SESSION["nama"] = $data["NAMA"];
    }
    header("location:../index.php");
}
?>