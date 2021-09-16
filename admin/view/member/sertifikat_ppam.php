<?php
include '../../config.php';

$id = $_POST['id'];
$sertifikat = "ya";
$gambar = $_FILES["foto_ppam"]["name"];
$size = $_FILES["foto_ppam"]["size"];
$ext = ['jpg', 'jpeg', 'png'];
$folder = $_FILES["foto_ppam"]["tmp_name"];
$ext_Gambar = explode('.', $gambar);
$ext_Gambar = strtolower(end($ext_Gambar));
$rename = uniqid();
$rename .= '.';
$rename .= $ext_Gambar;

if ($gambar != '') {
    if (in_array($ext_Gambar, $ext)) {
        if ($size < 5000000) {
            move_uploaded_file($folder, "../../img/ppam/" . $rename);
            $query = mysqli_query($koneksi, "UPDATE member SET sertifikat_ppam = '$sertifikat', foto_ppam='$rename' WHERE id_member='$id' ");
            if ($query) {
                echo '<script>document.location.href = "index.php"</script>';
            } else {
                echo "Data Gagal Ditambahkan";
            }
        } else {
            echo '<script>alert("Ukuran Gambar Terlalu Besar")</script>';
        }
    } else {
        echo '<script>alert("Tidak Sesuai Image File")</script>';
    }
}
