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
                document.location.href = 'tambah.php';
			</script>
		";
    }
}
?>
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
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Tambah</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
</div>
<?php include '../layout/footer.php' ?>

<!-- preview gambar -->