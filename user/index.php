<?php
require 'proses.php';
session_start();

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        $_SESSION['email'] = $_POST['email'];
        echo "
			<script>
				alert('Pendaftaran Berhasil!');
                document.location.href = 'dashboard/index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Pendaftaran Gagal!');
                document.location.href = 'index.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <a href="login.php" class="btn btn-light">Login</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="register-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" placeholder="*****" id="password" name="password" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" onclick="myFunction()">
                                                <label class="form-check-label" for="gridCheck">
                                                    Lihat Password
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Tanggal Lahir</label>
                                            <input type="date" class="form-control" placeholder="" id="ttl" name="ttl" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="tlp">No HP/Tlp</label>
                                            <input type="number" class="form-control" placeholder="08xxxxxx" id="tlp" name="tlp" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_ortu">Nama Orang Tua</label>
                                            <input type="text" class="form-control" placeholder="" id="ortu" name="ortu" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="tlp_ortu">No HP/Tlp Orang Tua</label>
                                            <input type="number" class="form-control" placeholder="08xxxxxxx" id="tlp_ortu" name="tlp_ortu" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" placeholder="Isikan Alamat Secara Detail" id="alamat" name="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="jk" id="jk" value="lk">
                                                    <span>Laki-Laki </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="jk" id="jk" value="pr">
                                                    <span>Perempuan</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="kategori" id="kategori" value="asrama" onclick="text(0)">
                                                    <span>Asrama</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="kategori" id="kategori" value="kampung" onclick="text(1)">
                                                    <span>Kampung</span>
                                                </label>
                                            </div>
                                            <textarea class="form-control" placeholder="" id="sub_kat" name="sub_kat" style="display: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan</label>
                                            <input type="text" class="form-control" placeholder="" id="jurusan" name="jurusan" />
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <select class="form-control" aria-label=".form-select-sm example" name="jabatan" required>
                                                <option>---Pilih Jabatan---</option>
                                                <option value="Ketua">Ketua</option>
                                                <option value="Wakil Ketua">Wakil Ketua</option>
                                                <option value="Sekertaris">Sekertaris</option>
                                                <option value="Bendahara">Bendahara</option>
                                                <option value="Dept.Keilmuan">Dept.Keiluam</option>
                                                <option value="Dept.Kaderisasi">Dept.Kaderisasi</option>
                                                <option value="Dept.Ekonomi Kreatif">Dept.Ekonomi Kreatif</option>
                                                <option value="Minat Bakat">Minat Bakat</option>
                                                <option value="Media IT">Media IT</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="other">Yang Lain</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="matan">Tahun Masuk Matan</label>
                                            <input type="number" class="form-control" placeholder="" id="thn_matan" name="thn_matan" />
                                        </div>
                                        <div class="form-group">
                                            <label for="ppam">Angkatan PPAM</label>
                                            <input type="number" class="form-control" placeholder="" id="ppam" name="ppam" />
                                        </div>
                                        <div class="form-group">
                                            <label for="taman">Angkatan Taman Cinta</label>
                                            <input type="number" class="form-control" placeholder="" id="taman" name="taman" />
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Ukuran Seragam</label>
                                            <select class="form-control" aria-label=".form-select-sm example" name="seragam" required>
                                                <option>---Pilih Ukuran---</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="quote">Pilih Foto</label>
                                            <input type="file" class="form-control" placeholder="" id="foto" name="foto" />
                                        </div>
                                        <img id="preview" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quote">Quotes Untuk Medsos</label>
                                    <textarea class="form-control" placeholder="" id="quote" name="quote"></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit" name="daftar">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script src="../admin/vendor/jquery/jquery.min.js"></script>
<script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- radio button -->
<script>
    function text(x) {
        if (x == 0) document.getElementById("sub_kat").style.display = "block";
        else document.getElementById("sub_kat").style.display = "none";
        return;
    }
</script>

<!-- view Image -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto").change(function() {
        readURL(this);
    });
</script>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>