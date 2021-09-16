<?php
include 'akses.php';
require 'proses.php';
$id = $_GET["id"];
$foto = $_GET["foto"];
$ppam = $_GET["ppam"];
$taman = $_GET["taman"];

if ($foto != '') {
    unlink("../../img/profil/$foto");
}
if ($taman != '') {
    unlink("../../img/taman/$taman");
}
if ($ppam != '') {
    unlink("../../img/ppam/$ppam");
}
if (hapus($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index.php';
        </script>
        ";
}
