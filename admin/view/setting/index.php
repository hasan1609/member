<?php
session_start();
$header = "setting";
require 'proses.php';
include 'akses.php';
include '../layout/header.php';
$admin = query("SELECT * FROM admin");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Admin
                <a class="btn btn-sm btn-primary float-right" href="tambah.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah
                    Data
                    Admin</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" id="" name="" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Esername</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($admin as $data) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <?php
                                if ($data['role'] == 1) {
                                    echo '<td>Super Admin</td>';
                                } else {
                                    echo '<td>Admin</td>';
                                }
                                ?>

                                <td>
                                    <a href="edit.php?id=<?= $data['id_admin'] ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id=<?= $data['id_admin']; ?>&foto=<?= $data['foto']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
                                        <i class=" fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                        $no++;
                    endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Content Row -->
</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>