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

    $nama = htmlspecialchars($data['nama']);
    $date = date('y');
    $qq = mysqli_query($koneksi, "SELECT max(no_induk) as maxkode FROM member");
    $result = mysqli_fetch_array($qq);
    $maxkode = $result['maxkode'];

    $no = (int) substr($maxkode, -1);
    $g = (int) substr($thn_angkatan, -2);
    $no++;
    $jadi = $date . $g . sprintf("%04s", $no);


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

    $query = "INSERT INTO member(id_member, no_induk, nama, email, password, tempat, ttl, tlp, alamat, jk, status_p, univ, fakultas, jurusan, smt, foto, status_anggota, departemen, thn_angkatan, sertifikat_ppam, foto_ppam, sertifikat_taman, foto_taman, komisariat, kategori, asrama, kamar)
    VALUES('', '$jadi','$nama', '$email', '$password', '$tempat' ,'$ttl', '$tlp', '$alamat', '$jk', '$status_p', '$univ', '$fakultas', '$jurusan', '$smt', '$foto', '$status_anggota', '$departemen', '$thn_angkatan','$sertifikat_ppam','$foto_ppam', '$sertifikat_taman', '$foto_taman', '$komisariat', '$kategori','$asrama', '$kamar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM member WHERE id_member = '$id'");
    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data["id_member"];
    $no_induk = $data['no_induk'];
    $password = htmlspecialchars($data["password"]);
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
    $fotolama = $data["foto_lama"];
    $foto_ppam = $data["foto_ppam"];
    $foto_taman = $data["foto_taman"];
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
    if ($kategori == "pondok") {
        $asrama = htmlspecialchars($data['asrama']);
        $kamar = htmlspecialchars($data['kamar']);
    } else {
        $asrama = '';
        $kamar = '';
    }

    // upload gambar
    if ($_FILES['foto']['error'] === 4) {
        $gambar = $fotolama;
    } else {
        unlink("../../img/profil/$fotolama");
        $gambar = uploadFoto();
    }

    $query = "UPDATE member SET
				id_member='$id',no_induk='$no_induk', nama='$nama', email='$email', password='$password', tempat='$tempat', ttl='$ttl', tlp='$tlp', alamat='$alamat', jk='$jk', status_p='$status_p', univ='$univ', fakultas='$fakultas', jurusan='$jurusan', smt='$smt', foto='$gambar', status_anggota='$status_anggota', departemen='$departemen', thn_angkatan='$thn_angkatan', sertifikat_ppam='$sertifikat_ppam', foto_ppam='$foto_ppam', sertifikat_taman='$sertifikat_taman', foto_taman='$foto_taman', komisariat='$komisariat', kategori='$kategori', asrama='$asrama', kamar='$kamar'
			  WHERE id_member = '$id'
			";

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
    move_uploaded_file($tmp, '../../img/profil/' . $rename);
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
    move_uploaded_file($tmp, '../../img/ppam/' . $rename);
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
    move_uploaded_file($tmp, '../../img/taman/' . $rename);
    return $rename;
}

function ubahPpam($data)
{
    global $koneksi;

    $id = $data["id"];
    $sertifikat = "ya";
    $foto = uploadPpam();
    if (!$foto) {
        return false;
    }
    $query = "UPDATE member SET sertifikat_ppam = '$sertifikat', foto_ppam='$foto' WHERE id_member='$id' ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahTaman($data)
{
    global $koneksi;

    $id = $data["id"];
    $sertifikat = "ya";
    $foto = uploadTaman();
    if (!$foto) {
        return false;
    }
    $query = "UPDATE member SET sertifikat_taman = '$sertifikat', foto_taman='$foto' WHERE id_member='$id' ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
