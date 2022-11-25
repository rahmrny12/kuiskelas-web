</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kuis Kelas 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<div class="col d-flex justify-content-between">
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <hr>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-down"></i>
    </a>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda ingin Logout/Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah Anda menekan tombol logout, maka Anda akan keluar dari akun Anda. Dan diminta untuk login ulang.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/sweetalert/dist/') ?>sweetalert2.all.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sb-admin-2/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?= base_url('assets/sb-admin-2/') ?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url('assets/sb-admin-2/') ?>js/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?= base_url('assets/sb-admin-2/') ?>js/demo/chart-pie-demo.js"></script> -->

<script>
    $(".navbar-nav .nav-item").each(function() {
        var navItem = $(this);
        var href = navItem.find("a").attr("href");
        href = href.substring(href.lastIndexOf('/'))
        var currentLocation = location.pathname;
        currentLocation = currentLocation.substring(currentLocation.lastIndexOf('/'));

        if (href == currentLocation) {
            navItem.addClass("active");
        }
    });
</script>

<template id="custom-alert">
    <swal-button type="confirm" color="#0D6EFD">Konfirmasi</swal-button>
    <swal-button type="cancel">Batal</swal-button>
    <swal-param name="showCancelButton" value="true" />
    <swal-param name="allowEnterKey" value="false" />
</template>

<script>
    $(document).ready(function() {
        $("#confirmKuis").click(function() {
            var judul = $("#judul").val();
            var deskripsi = $("#deskripsi").val();

            Swal.fire({
                template: '#custom-alert',
                title: 'Konfirmasi Kuis',
                html: '<h5><span class="font-weight-bold">Judul : </span>' + judul + '<br><span class="font-weight-bold">Deskripsi : </span>' + deskripsi + '</h5>',
                icon: 'info',
                position: 'top',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.kuisForm.submit();
                }
            })
        });

        $(document).on("click", "#deleteSoalBtn", function() {
            var id_soal = $(this).data('idsoal');
            var id_kuis = $(this).data('idkuis');
            var pertanyaan = $(this).data('pertanyaan');

            Swal.fire({
                template: '#custom-alert',
                title: 'Yakin ingin menghapus soal?',
                html: '<h5>Pertanyaan berikut akan dihapus : <pre><br>' + pertanyaan + '</pre></h5>',
                icon: 'warning',
                position: 'top',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace('<?= base_url('pengajar/hapus_soal/') ?>' + id_kuis + '/' + id_soal);
                    // confirmDeleteBtn.attr('href', '<?= base_url('pengajar/hapus_soal/') ?>' + id_kuis + '/' + id_soal);
                }
            })
        });
    })
</script>

</body>

</html>