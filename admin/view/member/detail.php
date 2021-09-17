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
$row = query("SELECT * FROM member WHERE id_member = '$_GET[id]'")[0];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Member</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
        </div>

        <div class="card-body">
            <a class="btn btn-primary" href="index.php">Back</a>
            <br><br>
            <div class="row">
                <div class="col-lg-2">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="../../img/profil/<?= $row['foto'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Foto Profil</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Nama
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['nama']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">No.Induk
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['no_induk']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Email
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= $row['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Tempat, Tgl Lahir
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['tempat']) ?>, <?= $row['ttl']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Tlp/No.Hp/Wa
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= $row['tlp']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Alamat
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['alamat']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Jenis Kelamin
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php if ($row['jk'] == "pr") {
                                        echo "<h3 class='h6 text-gray-900'>Perempuan</h3>";
                                    } else {
                                        echo "<h3 class='h6 text-gray-900'>Laki Laki</h3>";
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Status Pendidikan
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['status_p']); ?>
                                </td>
                            </tr>
                            <?php
                            if ($row['status_p'] == "mahasiswa") {
                                echo '
                            <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Nama Universita
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['univ']) . '
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Fakultas
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['fakultas']) . '
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Jurusan
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['jurusan']) . '
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Semester
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . $row['smt'] . '
                            </td>
                        </tr>
                            ';
                            }
                            ?>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Status Anggota
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= $row['status_anggota']; ?>
                                </td>
                            </tr>
                            <?php if ($row['status_anggota'] == "Pengurus") {
                                echo '
                            <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Departemen
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['departemen']) . '
                            </td>
                        </tr>';
                            }
                            ?>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Tahun Angkatan
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= $row['thn_angkatan']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Komisariat
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['komisariat']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="h6 text-gray-900">Kategori
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"> :
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3 class="h6 text-gray-900"><?= ucfirst($row['kategori']) ?>
                                </td>
                            </tr>
                            <?php if ($row['kategori'] == "pondok") {
                                echo '
                            <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Nama Asrama
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['asrama']) . '
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Nama Kamar
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900">' . ucfirst($row['kamar']) . '
                            </td>
                        </tr>';
                            } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4>Lampiran </h4>
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if ($row['sertifikat_ppam'] == "ya") {
                        echo '<div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="../../img/ppam/' . $row['foto_ppam'] . '" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sertifikat PPAM</h5>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                    if ($row['sertifikat_taman'] == "ya") {
                        echo '<div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="../../img/taman/' . $row['foto_taman'] . '" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sertifikat Taman Cinta</h5>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>