<?php

include '../../config.php';

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
    $role = $data["role"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($koneksi, "INSERT INTO admin (id_admin, nama, username, email, password, role) VALUES('', '$nama', '$username', '$email', '$password', '$role')");

    return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id'");
    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data["id_user"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
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
    $fotolama = $data["foto_lama"];

    // upload gambar
    if ($_FILES['foto']['error'] === 4) {
        $gambar = $fotolama;
    } else {
        unlink("img/$fotolama");
        $gambar = upload();
    }


    $query = "UPDATE user SET
				ttl='$ttl' , nohp='$tlp', alamat='$alamat', kelamin='$jk', kategori='$kat',
                jurusan='$jurusan', jabatan='$jabatan', thn_matan='$matan', thn_ppam='$ppam', taman_cinta='$taman',
                seragam='$seragam', foto='$gambar', quote='$quote', email='$email', password='$password', nama='$nama', 
                ortu='$ortu', tlp_ortu='$tlp_ortu', nama_asrama='$sub'
			  WHERE id_user = '$id'
			";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
