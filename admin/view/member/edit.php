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
$member = query("SELECT * FROM user WHERE id_user = '$id'")[0];

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
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $member['id_user']; ?>">
                        <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $member['foto']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="<?= $member['nama']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" value="<?= $member['email']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" placeholder="*****" id="password" name="password" required value="<?= $member['password'] ?>" />
                        </div>
                        <div class=" form-group">
                            <label for="ttl">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="" id="ttl" name="ttl" value="<?= $member['ttl']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="tlp">No HP/Tlp</label>
                            <input type="number" class="form-control" placeholder="08xxxxxx" id="tlp" name="tlp" value="<?= $member['nohp']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Orang Tua</label>
                            <input type="text" class="form-control" placeholder="" id="ortu" name="ortu" value="<?= $member['ortu']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="tlp_ortu">No HP/Tlp Orang Tua</label>
                            <input type="number" class="form-control" placeholder="08xxxxxxx" id="tlp_ortu" name="tlp_ortu" value="<?= $member['tlp_ortu']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" placeholder="Isikan Alamat Secara Detail" id="alamat" name="alamat"><?= $member['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="jk" id="jk" value="lk" <?php if ($member['kelamin'] == 'lk') echo 'checked' ?>>
                                    <span>Laki-Laki </span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="jk" id="jk" value="pr" <?php if ($member['kelamin'] == 'pr') echo 'checked' ?>>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="kategori" id="kategori" value="asrama" onclick="text(0)" <?php if ($member['kategori'] == 'asrama') echo 'checked' ?>>
                                    <span>Asrama</span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="kategori" id="kategori" value="kampung" onclick="text(1)" <?php if ($member['kategori'] == 'kampung') echo 'checked' ?>>
                                    <span>Kampung</span>
                                </label>
                            </div>
                            <?php
                            if ($member['kategori'] == 'asrama') {
                                echo "<textarea class='form-control' id='sub_kat' name='sub_kat'>" . $member['nama_asrama'] . "</textarea>";
                            } else {
                                echo "<input type='hidden' id='sub_kat' name='sub_kat' value='" . $member['nama_asrama'] . "'>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" placeholder="" id="jurusan" name="jurusan" value="<?= $member['jurusan']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" aria-label=".form-select-sm example" name="jabatan" required>
                                <option>---Pilih Jabatan---</option>
                                <option value="Ketua" <?php if ($member['jabatan'] == 'Ketua') echo 'selected' ?>>Ketua</option>
                                <option value="Wakil Ketua" <?php if ($member['jabatan'] == 'Wakil Ketua') echo 'selected' ?>>Wakil Ketua</option>
                                <option value="Sekertaris" <?php if ($member['jabatan'] == 'Sekertaris') echo 'selected' ?>>Sekertaris</option>
                                <option value="Bendahara" <?php if ($member['jabatan'] == 'Bendahara') echo 'selected' ?>>Bendahara</option>
                                <option value="Dept.Keilmuan" <?php if ($member['jabatan'] == 'Dep.Keilmuan') echo 'selected' ?>>Dept.Keiluam</option>
                                <option value="Dept.Kaderisasi" <?php if ($member['jabatan'] == 'Dept.Kaderisasi') echo 'selected' ?>>Dept.Kaderisasi</option>
                                <option value="Dept.Ekonomi Kreatif" <?php if ($member['jabatan'] == 'Dept.Ekonomi Kreatif') echo 'selected' ?>>Dept.Ekonomi Kreatif</option>
                                <option value="Minat Bakat" <?php if ($member['jabatan'] == 'Minat Bakat') echo 'selected' ?>>Minat Bakat</option>
                                <option value="Media IT" <?php if ($member['jabatan'] == 'Media IT') echo 'selected' ?>>Media IT</option>
                                <option value="Anggota" <?php if ($member['jabatan'] == 'Anggota') echo 'selected' ?>>Anggota</option>
                                <option value="other" <?php if ($member['jabatan'] == 'other') echo 'selected' ?>>Yang Lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="matan">Tahun Masuk Matan</label>
                            <input type="number" class="form-control" placeholder="" id="thn_matan" name="thn_matan" value="<?= $member['thn_matan']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="ppam">Angkatan PPAM</label>
                            <input type="number" class="form-control" placeholder="" id="ppam" name="ppam" value="<?= $member['thn_ppam']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="taman">Angkatan Taman Cinta</label>
                            <input type="number" class="form-control" placeholder="" id="taman" name="taman" value="<?= $member['taman_cinta']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Ukuran Seragam</label>
                            <select class="form-control" aria-label=".form-select-sm example" name="seragam" required>
                                <option>---Pilih Ukuran---</option>
                                <option value="s" <?php if ($member['seragam'] == 's') echo 'selected' ?>>S</option>
                                <option value="m" <?php if ($member['seragam'] == 'm') echo 'selected' ?>>M</option>
                                <option value="l" <?php if ($member['seragam'] == 'l') echo 'selected' ?>>L</option>
                                <option value="xl" <?php if ($member['seragam'] == 'xl') echo 'selected' ?>>XL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quote">Pilih Foto</label>
                            <input type="file" class="form-control" placeholder="" id="foto" name="foto" />
                        </div>
                        <img id="preview" src="img/<?= $member['foto']; ?>" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quote">Quotes Untuk Medsos</label>
                    <textarea class="form-control" placeholder="" id="quote" name="quote"><?= $member['quote'] ?></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Ubah</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>