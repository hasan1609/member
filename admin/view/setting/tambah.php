<?php
session_start();
$header = "member";
include '../layout/header.php';
require 'proses.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'index.php';
			  </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="*****" id="password" name="password" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Password Password</label>
                        <input type="password" class="form-control" placeholder="*****" id="password2" name="password2" required />
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Role</label>
                        <select class="form-control" aria-label=".form-select-sm example" name="role" required>
                            <option>---Pilih Role---</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>