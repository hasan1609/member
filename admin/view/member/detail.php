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
$row = query("SELECT * FROM user WHERE id_user = '$_GET[id]'")[0];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Memebr</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
        </div>

        <div class="card-body">
            <a class="btn btn-primary" href="index.php">Back</a>
            <br><br>
            <div class="row">
                <div class="col-lg-3">
                    <img src="img/<?= $row['foto']; ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-lg-9">
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
                                <h3 class="h6 text-gray-900"><?= $row['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tgl Lahir
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['ttl']; ?>
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
                                <?php if ($row['kelamin'] == "pr") {
                                    echo "<h3 class='h6 text-gray-900'>Perempuan</h3>";
                                } else {
                                    echo "<h3 class='h6 text-gray-900'>Laki Laki</h3>";
                                }
                                ?>
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
                                <h3 class="h6 text-gray-900"><?= $row['alamat']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tlp/No.Hp
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['nohp']; ?>
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
                                <h3 class="h6 text-gray-900">Jabatan
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['jabatan']; ?>
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
                                <h3 class="h6 text-gray-900"><?= $row['jurusan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tahun Matan
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['thn_matan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tahun PPAM
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['thn_ppam']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tahun Taman Cinta
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['taman_cinta']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Ukuran Seragam
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['seragam']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Quote
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['quote']; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>