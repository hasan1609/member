<?php
session_start();
include 'akses.php';
$header = "member";
include 'proses.php';
include '../layout/header.php';
$member = query("SELECT * FROM member");
if (isset($_POST["tambah"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (ubahPpam($_POST) > 0) {
        echo "
			<script>
				alert('Sertifikat berhasil ditambahkan!');
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
if (isset($_POST["tambahtaman"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (ubahTaman($_POST) > 0) {
        echo "
			<script>
				alert('Sertifikat berhasil ditambahkan!');
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
                            <th>Status Pendidikan</th>
                            <th>Status Anggota</th>
                            <th>PPAM</th>
                            <th>Taman Cinta</th>
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
                                <td><?= $data['tlp'] ?></td>
                                <td><?= $data['status_p'] ?></td>
                                <td><?= $data['status_anggota'] ?></td>
                                <?php if ($data['sertifikat_ppam'] == "ya") {
                                    echo "<td><i class='fas fa-check-square text-center'></i></td>";
                                } else {
                                    echo '<td><a id="editPpam" href="" data-id="' . $data['id_member'] . '" class="btn btn-primary modalPpam" data-toggle="modal" data-target="#modalKu">Upload</a></td>';
                                }
                                if ($data['sertifikat_taman'] == "ya") {
                                    echo "<td><i class='fas fa-check-square'></i></td>";
                                } else {
                                    echo '<td><a href="" id="editTaman" data-id="' . $data['id_member'] . '" class="btn btn-primary modalTaman" data-toggle="modal" data-target="#modaltaman">Upload</a></td>';
                                }
                                ?>
                                <td>
                                    <a href="detail.php?id=<?= $data['id_member'] ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class=" fas fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $data['id_member'] ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id=<?= $data['id_member']; ?>&foto=<?= $data['foto']; ?>&ppam=<?= $data['foto_ppam']; ?>&taman=<?= $data['foto_taman']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
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
<div class="modal fade" id="modalKu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Upload Sertifikat PPAM</h5>
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

<div class="modal fade" id="modaltaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Sertifikat Taman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="">Unggah Sertifikat</label>
                        <input type="file" class="form-control" placeholder="" id="foto_taman" name="foto_taman" />
                    </div>
                    <img id="preview2" src="#" style="width: 100px; margin: 10px;" alt="Gambar Anda"><br>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="tambahtaman" id="tambahtaman">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>