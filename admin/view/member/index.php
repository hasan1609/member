<?php
session_start();
include 'akses.php';
$header = "member";
include 'proses.php';
include '../layout/header.php';
$member = query("SELECT * FROM user");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Member
                <a class="btn btn-sm btn-primary float-right" href="tambah.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah
                    Data
                    Member</a>
                <a class="btn btn-sm btn-info float-right mr-3" href="cetak.php" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" id="dataTable" name="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tlp</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($member as $data) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nohp'] ?></td>
                                <td><?= $data['jurusan'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['jabatan'] ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $data['id_user'] ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class=" fas fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $data['id_user'] ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id=<?= $data['id_user']; ?>&foto=<?= $data['foto']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
                                        <i class=" fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Content Row -->
</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>