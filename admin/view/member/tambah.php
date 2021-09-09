<?php
session_start();
$header = "member";
include 'akses.php';
require 'proses.php';
include '../layout/header.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
			</script>
		";
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tambah Data Member</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
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
                <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>