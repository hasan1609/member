<?php
session_start();
include '../proses.php';
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: ../login.php');
}
$row = query("SELECT * FROM member WHERE email = '$_SESSION[email]'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Matan Home</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="#">Matan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <!-- Outer Row -->

        <div class="card mt-3">
            <div class="card-header">
                Data Diri Member
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4" style="text-align: center;">
                        <img class="card-img fa-align-center" src="../admin/img/profil/<?= $row['foto']; ?>" alt="" style="width: 50%;">
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table>
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
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-3">
                    <div class="card-header">
                        Sertifikat PPAM
                    </div>
                    <div class="card-body">
                        <?php if ($row['sertifikat_ppam'] == "ya") {
                            echo '<img class="card-img fa-align-center" src="../admin/img/ppam/' . $row['foto_ppam'] . '" alt="" style="width: 50%;">';
                        } else {
                            echo '<h6>Tidak Mempunyai Sertifikat PPAM</h6>
                            <a href="" id="editPpam" data-id="' . $row['id_member'] . '" class="btn btn-primary modalPpam" data-toggle="modal" data-target="#modalKu">Upload</a>';
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-3">
                    <div class="card-header">
                        Sertifikat Taman Cinta
                    </div>
                    <div class="card-body">
                        <?php if ($row['sertifikat_taman'] == "ya") {
                            echo '<img class="card-img fa-align-center" src="../admin/img/taman/' . $row['foto_taman'] . '" alt="" style="width: 50%;">';
                        } else {
                            echo
                            '<h6>Tidak Mempunyai Sertifikat Taman Cinta</h6>
                            <a href="" id="editTaman" data-id="' . $row['id_member'] . '" class="btn btn-primary modalTaman" data-toggle="modal" data-target="#modalKu">Upload</a>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalKu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="">Unggah Sertifikat</label>
                            <input type="file" class="form-control" placeholder="" id="foto_ppam" name="foto_ppam" />
                        </div>
                        <img id="preview3" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="tambah" id="tambah">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>


    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        });
    </script>

</body>

</html>