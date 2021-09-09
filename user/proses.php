<?php

include '../admin/config.php';

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $ttl = htmlspecialchars($data["ttl"]);
    $tlp = htmlspecialchars($data["tlp"]);
    $ortu = htmlspecialchars($data["ortu"]);
    $tlp_ortu = htmlspecialchars($data["tlp_ortu"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jk = $data["jk"];
    $kat = $data["kategori"];
    $jurusan = htmlspecialchars($data["jurusan"]);
    $jabatan = $data["jabatan"];
    $matan = htmlspecialchars($data["thn_matan"]);
    $ppam = htmlspecialchars($data["ppam"]);
    $taman = htmlspecialchars($data["taman"]);
    $seragam = $data["seragam"];
    $quote = htmlspecialchars($data["quote"]);
    $sub = htmlspecialchars($data["sub_kat"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
        return false;
    }

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($sub != '') {
        $query = "INSERT INTO user VALUES
    ('','$ttl', '$tlp', '$alamat', '$jk', '$kat', '$jurusan', '$jabatan', '$matan', '$ppam', '$taman', '$seragam', '$gambar', '$quote', '$email', '$password', '$nama','$ortu','$tlp_ortu', '$sub')";
    } else {
        $query = "INSERT INTO user VALUES
    ('','$ttl', '$tlp', '$alamat', '$jk', '$kat', '$jurusan', '$jabatan', '$matan', '$ppam', '$taman', '$seragam', '$gambar', '$quote', '$email', '$password', '$nama','$ortu','$tlp_ortu', '$alamat')";
    }
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $nama_file = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp = $_FILES['foto']['tmp_name'];

    // cek gambar
    if ($error === 4) {
        echo "<script>alert('Harap Masukkan Foto')</script>";
        return false;
    }

    //extensi 
    $ext = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
    $extGambar = explode('.', $nama_file);
    $extGambar = strtolower(end($extGambar));
    if (!in_array($extGambar, $ext)) {
        echo "<script>alert('Extensi Gambar Hanya boleh JPG, JPEG dan PNG')</script>";
        return false;
    }
    if ($ukuran > 5000000) {
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 5MB')</script>";
        return false;
    }

    // proses
    $rename = uniqid();
    $rename .= '.';
    $rename .= $extGambar;
    move_uploaded_file($tmp, '../admin/view/member/img/' . $rename);
    return $rename;
}
