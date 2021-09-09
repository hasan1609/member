<?php
session_start();
include '../../admin/config.php';
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$_SESSION[email]'");
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
    <link href="../../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <?php
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="card mt-3">
                <div class="card-header">
                    Data Diri Member
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" style="text-align: center;">
                            <img class="card-img fa-align-center" src="../../admin/view/member/img/<?= $data['foto']; ?>" alt="" style="width: 50%;">
                        </div>
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['ttl'] ?></td>
                                </tr>
                                <tr>
                                    <td>No.Hp/ Tlp</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['nohp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Orang Tua</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['ortu'] ?></td>
                                </tr>
                                <tr>
                                    <td>No.Hp/Tlp Orang Tua</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['tlp_ortu'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <?php
                                    if ($data['kelamin'] == 'pr') {
                                        echo '<td>Perempuan</td>';
                                    } else {
                                        echo '<td>Laki-Laki</td>';
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['jurusan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td></td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $data['jabatan'] ?></td>
                                </tr>
                            </table>
                            <p class="card-text"></p>
                            <a href="../logout.php" class="btn btn-primary">Selesai</a>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>


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