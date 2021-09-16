
<?php

$server = "localhost";  //definisi server lokal.
$user = "root";  //definisi user.
$pass = ""; //definisi password (menyesuaikan).
$db = "matan";  //definisi database yang telah dibuat tadi.
//mengkoneksikan server lokal.
$koneksi = mysqli_connect($server, $user, $pass, $db);
//memilih database.
if (mysqli_connect_errno()) {
    echo " Maaf koneksi Database gagal :" . mysqli_connect_error();
}

?>