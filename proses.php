<?php

include 'admin/config.php';

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

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data["email"]);;
    $tempat = htmlspecialchars($data['tempat']);
    $ttl = htmlspecialchars($data['ttl']);
    $tlp = htmlspecialchars($data['tlp']);
    $alamat = htmlentities($data['alamat']);
    $jk = htmlspecialchars($data['jk']);

    $status_p = htmlspecialchars($data['status_p']);

    $status_anggota = htmlspecialchars($data['status_anggota']);

    $thn_angkatan = htmlspecialchars($data['thn_angkatan']);
    $sertifikat_ppam = htmlspecialchars($data['sertifikat_ppam']);
    $sertifikat_taman = htmlspecialchars($data['sertifikat_taman']);
    $komisariat = htmlspecialchars($data['komisariat']);
    $kategori = htmlspecialchars($data['kategori']);

    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT email FROM member WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
        return false;
    };

    if ($status_p == "mahasiswa") {
        $univ = htmlspecialchars($data['univ']);
        $fakultas = htmlspecialchars($data['fakultas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $smt = htmlspecialchars($data['smt']);
    } else {
        $univ = '';
        $fakultas = '';
        $jurusan = '';
        $smt = '';
    };
    if ($status_anggota == "Pengurus") {
        $departemen = htmlspecialchars($data['departemen']);
    } else {
        $departemen = '';
    };
    if ($sertifikat_ppam == "ya") {
        $foto_ppam = uploadPpam();
    } else {
        $foto_ppam = '';
    }
    if ($sertifikat_taman == "ya") {
        $foto_taman = uploadTaman();
    } else {
        $foto_taman = '';
    }
    if ($kategori == "pondok") {
        $asrama = htmlspecialchars($data['asrama']);
        $kamar = htmlspecialchars($data['kamar']);
    } else {
        $asrama = '';
        $kamar = '';
    }

    // upload gambar
    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO member(id_member, nama, email, password, tempat, ttl, tlp, alamat, jk, status_p, univ, fakultas, jurusan, smt, foto, status_anggota, departemen, thn_angkatan, sertifikat_ppam, foto_ppam, sertifikat_taman, foto_taman, komisariat, kategori, asrama, kamar)
    VALUES('','$nama', '$email', '$password', '$tempat' ,'$ttl', '$tlp', '$alamat', '$jk', '$status_p', '$univ', '$fakultas', '$jurusan', '$smt', '$foto', '$status_anggota', '$departemen', '$thn_angkatan','$sertifikat_ppam','$foto_ppam', '$sertifikat_taman', '$foto_taman', '$komisariat', '$kategori','$asrama', '$kamar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function uploadFoto()
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
    move_uploaded_file($tmp, 'admin/img/profil/' . $rename);
    return $rename;
}
function uploadPpam()
{
    $nama_file = $_FILES['foto_ppam']['name'];
    $ukuran = $_FILES['foto_ppam']['size'];
    $error = $_FILES['foto_ppam']['error'];
    $tmp = $_FILES['foto_ppam']['tmp_name'];

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
    move_uploaded_file($tmp, 'admin/img/ppam/' . $rename);
    return $rename;
}
function uploadTaman()
{
    $nama_file = $_FILES['foto_taman']['name'];
    $ukuran = $_FILES['foto_taman']['size'];
    $error = $_FILES['foto_taman']['error'];
    $tmp = $_FILES['foto_taman']['tmp_name'];

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
    move_uploaded_file($tmp, 'admin/img/taman/' . $rename);
    return $rename;
}
