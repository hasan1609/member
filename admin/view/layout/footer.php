<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../index.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->


<!-- Page level custom scripts -->
<script src="../../js/demo/datatables-demo.js"></script>

<!-- upload sertif -->
<!-- <script src="../../js/script.js"></script> -->


<script>
    function text(x) {
        if (x == 0) {
            document.getElementById("kamar").style.display = "block";
            document.getElementById("asrama").style.display = "block";
        } else {
            document.getElementById("kamar").style.display = "none";
            document.getElementById("asrama").style.display = "none";
        }
        return;
    }
</script>

<!-- status mhasiswa -->
<script>
    function mhs(x) {
        if (x == 0) {
            document.getElementById("univ").style.display = "block";
            document.getElementById("fakultas").style.display = "block";
            document.getElementById("jurusan").style.display = "block";
            document.getElementById("smt").style.display = "block";
        } else {
            document.getElementById("univ").style.display = "none";
            document.getElementById("fakultas").style.display = "none";
            document.getElementById("jurusan").style.display = "none";
            document.getElementById("smt").style.display = "none";
        }
        return;
    }
</script>

<!-- Status Anggota -->
<script>
    function status(x) {
        if (x == 0) document.getElementById("departemen").style.display = "block";
        else document.getElementById("departemen").style.display = "none";
        return;
    }
</script>
<!-- sertif ppam -->
<script>
    function ppam(x) {
        if (x == 0) document.getElementById("foto_ppamku").style.display = "block";
        else document.getElementById("foto_ppamku").style.display = "none";
        return;
    }
</script>
<script>
    function taman(x) {
        if (x == 0) document.getElementById("foto_tamanku").style.display = "block";
        else document.getElementById("foto_tamanku").style.display = "none";
        return;
    }
</script>

<!-- preview gambar -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto").change(function() {
        readURL(this);
    });
</script>
<script>
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto_taman").change(function() {
        readURL2(this);
    });
</script>
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto_ppam").change(function() {
        readURL1(this);
    });
</script>

<!-- alert -->
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>

<!-- show pswd -->
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script>
    $('.modalPpam').on('click', function() {
        let id = $(this).data('id');

        $('.modal-body #id').val(id);
    })
</script>
<script>
    $('.modalTaman').on('click', function() {
        let id = $(this).data('id');

        $('.modal-body #id').val(id);
    })
</script>

</body>

</html>