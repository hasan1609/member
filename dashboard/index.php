<?php
session_start();
include '../admin/config.php';
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: ../login.php');
}
$query = mysqli_query($koneksi, "SELECT * FROM member WHERE email = '$_SESSION[email]'");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
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
                            <p class="card-text"></p>
                            <a href="../logout.php" class="btn btn-primary">Selesai</a>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>
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