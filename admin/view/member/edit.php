<?php
session_start();
$header = "member";
include 'akses.php';
require 'proses.php';
include '../layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error. No ID Selected!");
}
$member = query("SELECT * FROM member WHERE id_member = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
<script>
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
</script>
";
    } else {
        echo "
<script>
    alert('data gagal diubah!');
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
            <h4 class="m-0 font-weight-bold text-primary">Edit Data Member</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_member" id="id_member" value="<?= $member['id_member'] ?>">
                <input type="hidden" name="password" id="password" value="<?= $member['password'] ?>">
                <input type="hidden" name="no_induk" id="no_induk" value="<?= $member['no_induk'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="<?= $member['nama'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" readonly value="<?= $member['email'] ?>" />
                        </div>
                        <div class=" form-group">
                            <label for="tempat">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Pasuruan" id="tempat" name="tempat" value="<?= $member['tempat'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="" id="ttl" name="ttl" value="<?= $member['ttl'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="tlp">No HP/Tlp</label>
                            <input type="number" class="form-control" placeholder="08xxxxxx" id="tlp" name="tlp" value="<?= $member['tlp'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control" placeholder="Isikan Alamat Secara Detail" id="alamat" name="alamat"><?= $member['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="jk" id="jk" value="lk" <?php if ($member['jk'] == 'lk') echo 'checked' ?>>
                                    <span>Laki-Laki </span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="jk" id="jk" value="pr" <?php if ($member['jk'] == 'pr') echo 'checked' ?>>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quote">Status</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="status_p" id="status_p" value="mahasiswa" onclick="mhs(0)" <?php if ($member['status_p'] == 'mahasiswa') echo 'checked' ?>>
                                    <span>Mahasiswa</span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="status_p" id="status_p" value="bukan mahasiswa" onclick="mhs(1)" <?php if ($member['status_p'] == 'bukan mahasiswa') echo 'checked' ?>>
                                    <span>Bukan Mahasiswa</span>
                                </label>
                            </div>
                            <?php if ($member['status_p'] == 'mahasiswa') { ?>
                                <div class="form-group" id="univ">
                                    <label for="">Nama Universitas</label>
                                    <input type="text" class="form-control" placeholder="" name="univ" value="<?= $member['univ'] ?>" />
                                </div>
                                <div class="form-group" id="fakultas">
                                    <label for="">Fakultas</label>
                                    <input type="text" class="form-control" placeholder="" name="fakultas" value="<?= $member['fakultas'] ?>" />
                                </div>
                                <div class="form-group" id="jurusan">
                                    <label for="">Jurusan</label>
                                    <input type="text" class="form-control" placeholder="" name="jurusan" value="<?= $member['jurusan'] ?>" />
                                </div>
                                <div class="form-group" id="smt">
                                    <label for="">Semester</label>
                                    <input type="text" class="form-control" placeholder="" name="smt" value="<?= $member['smt'] ?>" />
                                </div>
                            <?php } else { ?>
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
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="">Unggah Foto Profil Anda</label>
                            <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $member['foto']; ?>">
                            <input type="file" class="form-control" placeholder="" id="foto" name="foto" />
                            <small id="" class="form-text text-muted"><i> Max Foto 5MB</i></small>
                        </div>
                        <img id="preview" src="../../img/profil/<?= $member['foto'] ?>" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Status Anggota</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="status_anggota" id="status_anggota" value="Pengurus" onclick="status(0)" <?php if ($member['status_anggota'] == 'Pengurus') echo 'checked' ?>>
                                    <span>Pengurus</span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="status_anggota" id="status_anggota" value="Anggota" onclick="status(1)" <?php if ($member['status_anggota'] == 'Anggota') echo 'checked' ?>>
                                    <span>Anggota</span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="status_anggota" id="status_anggota" value="Alumni" onclick="status(2)" <?php if ($member['status_anggota'] == 'Alumni') echo 'checked' ?>>
                                    <span>Alumni</span>
                                </label>
                            </div>
                            <?php if ($member['status_anggota'] == "Pengurus") { ?>
                                <div class="form-group" id="departemen">
                                    <label for=" ">Departemen</label>
                                    <select class="form-control" aria-label=".form-select-sm example" name="departemen">
                                        <option>---Pilih Departemen---</option>
                                        <option value="Pengkaderan" <?php if ($member['departemen'] == 'Pengkaderan') echo 'selected' ?>>Pengkaderan</option>
                                        <option value="Kajian dan Litbang" <?php if ($member['departemen'] == 'Kajian dan Litbang') echo 'selected' ?>>Kajian dan Litbang</option>
                                        <option value="Manajemen dan Pengembangan SDM" <?php if ($member['departemen'] == 'Manajemen dan Pengembangan SDM') echo 'selected' ?>>Manajemen dan Pengembangan SDM</option>
                                        <option value="Cinta Tanah Air" <?php if ($member['departemen'] == 'Cinta Tanah Air') echo 'selected' ?>>Cinta Tanah Air</option>
                                        <option value="Komunikasi dan Informasi" <?php if ($member['departemen'] == 'Komunikasi dan Informasi') echo 'selected' ?>>Komunikasi dan Informasi</option>
                                        <option value="Seni dan Budaya" <?php if ($member['departemen'] == 'Seni dan Budaya') echo 'selected' ?>>Seni dan Budaya</option>
                                        <option value="Ekonomi dan Entepreneurship" <?php if ($member['departemen'] == 'Ekonomi dan Entepreneurship') echo 'selected' ?>>Ekonomi dan Entepreneurship</option>
                                    </select>
                                </div>
                            <?php } else { ?>
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
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Angkatan</label>
                            <input type="number" class="form-control" placeholder="" id="thn_angkatan" name="thn_angkatan" value="<?= $member['thn_angkatan'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="komisariat">Komisariat</label>
                            <input type="text" class="form-control" placeholder="" id="komisariat" name="komisariat" value="<?= $member['komisariat'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="quote">Kategori</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="kategori" id="kategori" value="pondok" onclick="text(0)" <?php if ($member['kategori'] == 'pondok') echo 'checked' ?>>
                                    <span>Pondok</span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="kategori" id="kategori" value="kampung" onclick="text(1)" <?php if ($member['kategori'] == 'kampung') echo 'checked' ?>>
                                    <span>Kampung</span>
                                </label>
                            </div>
                            <?php if ($member['kategori'] == "pondok") { ?>
                                <div class="form-group" id="asrama">
                                    <label for="asrama">Nama Asrama</label>
                                    <input type="text" class="form-control" placeholder="" name="asrama" value="<?= $member['asrama'] ?>" />
                                </div>
                                <div class="form-group" id="kamar">
                                    <label for="asrama">Nama Kamar</label>
                                    <input type="text" class="form-control" placeholder="" name="kamar" value="<?= $member['kamar'] ?>" />
                                </div>
                            <?php } else { ?>
                                <div class="form-group" id="asrama" style="display: none;">
                                    <label for="asrama">Nama Asrama</label>
                                    <input type="text" class="form-control" placeholder="" name="asrama" />
                                </div>
                                <div class="form-group" id="kamar" style="display: none;">
                                    <label for="asrama">Nama Kamar</label>
                                    <input type="text" class="form-control" placeholder="" name="kamar" />
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="">Sertifikat PPAM</label>
                                <input type="hidden" name="sertifikat_ppam" id="sertifikat_ppam" value="<?= $member['sertifikat_ppam']; ?>">
                                <input type="hidden" name="foto_ppam" id="foto_ppam" value="<?= $member['foto_ppam']; ?>">
                            </div>
                            <img id="preview3" src="../../img/ppam/<?= $member['foto_ppam'] ?>" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                            <div class="form-group">
                                <label for="">Sertifikat Taman Cinta</label>
                                <input type="hidden" name="sertifikat_taman" id="sertifikat_taman" value="<?= $member['sertifikat_taman']; ?>">
                                <input type="hidden" name="foto_taman" id="foto_taman" value="<?= $member['foto_taman']; ?>">
                            </div>
                            <img id="preview2" src="../../img/taman/<?= $member['foto_taman'] ?>" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Ubah</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>