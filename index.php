<?php
require 'proses.php';
session_start();

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('Pendaftaran Berhasil! Harap Login ');
                document.location.href = 'login.php';
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
                                            <label for="tempat">Tempat Lahir</label>
                                            <input type="text" class="form-control" placeholder="Pasuruan" id="tempat" name="tempat" required />
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
                                            <label for="alamat">Alamat Lengkap</label>
                                            <textarea class="form-control" placeholder="Isikan Alamat Secara Detail" id="alamat" name="alamat"></textarea>
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
                                            <label for="quote">Status</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="status_p" id="status_p" value="mahasiswa" onclick="mhs(0)">
                                                    <span>Mahasiswa</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="status_p" id="status_p" value="bukan mahasiswa" onclick="mhs(1)">
                                                    <span>Bukan Mahasiswa</span>
                                                </label>
                                            </div>
                                            <div class="form-group" id="univ" style="display: none;">
                                                <label for="">Nama Universitas</label>
                                                <input type="text" class="form-control" placeholder="" name="univ" />
                                            </div>
                                            <div class="form-group" id="fakultas" style="display: none;">
                                                <label for="">Fakultas</label>
                                                <input type="text" class="form-control" placeholder="" name="fakultas" />
                                            </div>
                                            <div class="form-group" id="jurusan" style="display: none;">
                                                <label for="">Jurusan</label>
                                                <input type="text" class="form-control" placeholder="" name="jurusan" />
                                            </div>
                                            <div class="form-group" id="smt" style="display: none;">
                                                <label for="">Semester</label>
                                                <input type="text" class="form-control" placeholder="" name="smt" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Unggah Foto Profil Anda</label>
                                            <input type="file" class="form-control" placeholder="" id="foto" name="foto" required />
                                        </div>
                                        <img id="preview" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori">Status Anggota</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="status_anggota" id="status_anggota" value="Pengurus" onclick="status(0)">
                                                    <span>Pengurus</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="status_anggota" id="status_anggota" value="Anggota" onclick="status(1)">
                                                    <span>Anggota</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="status_anggota" id="status_anggota" value="Alumni" onclick="status(2)">
                                                    <span>Alumni</span>
                                                </label>
                                            </div>
                                            <div class="form-group" style="display: none;" id="departemen">
                                                <label for=" ">Departemen</label>
                                                <select class="form-control" aria-label=".form-select-sm example" name="departemen">
                                                    <option>---Pilih Departemen---</option>
                                                    <option value="Pengkaderan">Pengkaderan</option>
                                                    <option value="Kajian dan Litbang">Kajian dan Litbang</option>
                                                    <option value="Manajemen dan Pengembangan SDM">Manajemen dan Pengembangan SDM</option>
                                                    <option value="Cinta Tanah Air">Cinta Tanah Air</option>
                                                    <option value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                                                    <option value="Seni dan Budaya">Seni dan Budaya</option>
                                                    <option value="Ekonomi dan Entepreneurship">Ekonomi dan Entepreneurship</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tahun Angkatan</label>
                                            <input type="number" class="form-control" placeholder="" id="thn_angkatan" name="thn_angkatan" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="quote">Sertifikat PPAM</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="sertifikat_ppam" id="sertifikat_ppam" value="ya" onclick="ppam(0)">
                                                    <span>Ya</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="sertifikat_ppam" id="sertifikat_ppam" value="tidak" onclick="ppam(1)">
                                                    <span>Tidak</span>
                                                </label>
                                            </div>
                                            <div class="form-group" id="foto_ppamku" style="display: none;">
                                                <label for="">Upload Serifikat PPAM</label>
                                                <input type="file" class="form-control" placeholder="" name="foto_ppam" id="foto_ppam" />
                                                <img id="preview3" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="quote">Sertifikat Taman Cinta</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="sertifikat_taman" id="sertifikat_taman" value="ya" onclick="taman(0)">
                                                    <span>Ya</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="sertifikat_taman" id="sertifikat_taman" value="tidak" onclick="taman(1)">
                                                    <span>Tidak</span>
                                                </label>
                                            </div>
                                            <div class="form-group" id="foto_tamanku" style="display: none;">
                                                <label for="quote">Upload Serifikat Taman Cinta</label>
                                                <input type="file" class="form-control" placeholder="" name="foto_taman" id="foto_taman" />
                                                <img id="preview2" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="komisariat">Komisariat</label>
                                            <input type="text" class="form-control" placeholder="" id="komisariat" name="komisariat" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="quote">Kategori</label>
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="kategori" id="kategori" value="pondok" onclick="text(0)">
                                                    <span>Pondok</span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="kategori" id="kategori" value="kampung" onclick="text(1)">
                                                    <span>Kampung</span>
                                                </label>
                                            </div>
                                            <div class="form-group" id="asrama" style="display: none;">
                                                <label for="asrama">Nama Asrama</label>
                                                <input type="text" class="form-control" placeholder="" name="asrama" />
                                            </div>
                                            <div class="form-group" id="kamar" style="display: none;">
                                                <label for="asrama">Nama Kamar</label>
                                                <input type="text" class="form-control" placeholder="" name="kamar" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" name="daftar">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- radio button -->
    <script>
        function text(x) {
            if (x == 0) {
                document.getElementById("kamar").style.display = "block";
                document.getElementById("asrama").style.display = "block";
            } else {
                document.getElementById("kamar").style.display = "none";
                document.getElementById("asrama").style.display = "none";
            }
            return;
        }
    </script>

    <!-- status mhasiswa -->
    <script>
        function mhs(x) {
            if (x == 0) {
                document.getElementById("univ").style.display = "block";
                document.getElementById("fakultas").style.display = "block";
                document.getElementById("jurusan").style.display = "block";
                document.getElementById("smt").style.display = "block";
            } else {
                document.getElementById("univ").style.display = "none";
                document.getElementById("fakultas").style.display = "none";
                document.getElementById("jurusan").style.display = "none";
                document.getElementById("smt").style.display = "none";
            }
            return;
        }
    </script>

    <!-- Status Anggota -->
    <script>
        function status(x) {
            if (x == 0) document.getElementById("departemen").style.display = "block";
            else document.getElementById("departemen").style.display = "none";
            return;
        }
    </script>
    <!-- sertif ppam -->
    <script>
        function ppam(x) {
            if (x == 0) document.getElementById("foto_ppamku").style.display = "block";
            else document.getElementById("foto_ppamku").style.display = "none";
            return;
        }
    </script>
    <script>
        function taman(x) {
            if (x == 0) document.getElementById("foto_tamanku").style.display = "block";
            else document.getElementById("foto_tamanku").style.display = "none";
            return;
        }
    </script>

    <!-- preview gambar -->
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
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto_taman").change(function() {
            readURL2(this);
        });
    </script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto_ppam").change(function() {
            readURL1(this);
        });
    </script>

    <!-- alert -->
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        });
    </script>

    <!-- show pswd -->
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
</body>

</html>