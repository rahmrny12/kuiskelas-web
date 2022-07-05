<div class="mx-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Kuis</h1>
        <!-- <div>
            <a href="<?= base_url('pengajar/tambah_kuis') ?>" class="btn btn-primary btn-icon-split">
                <span class="text">Tambah Kuis Baru</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
        </div> -->
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <th>No.</th>
                <th class="col-3">Judul</th>
                <th class="col-7">Deskripsi</th>
                <th class="col-2">Aksi</th>
            </thead>
            <?php $no = 1 ?>
            <?php foreach ($kuis as $data) : ?>
                <tbody class="bg-white">
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td>
                        <a href="#" id="kerjakanSoalBtn" data-toggle="modal" data-target="#kerjakanSoalModal" data-idkuis="<?= $data['id_kuisioner'] ?>" data-judulkuis="<?= $data['judul'] ?>" class="btn btn-primary d-flex justify-content-between btn-icon-split mb-1">
                            <span class="text col">Kerjakan</span>
                            <span class="icon text-white-50 ml-1">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    </td>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="modal fade" id="kerjakanSoalModal" tabindex="-1" role="dialog" aria-labelledby="kerjakanSoalModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mulai Kerjakan Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="kerjakanSoalModalBody">
                Anda akan mengerjakan kuis berikut : 
                <pre></pre>
                Dengan menekan tombol <strong>mulai</strong>, maka Anda akan mulai mengerjakan kuis dengan soal-soal yang telah disertakan.
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-success">Kerjakan</a>
            </div>
        </div>
    </div>
</div>

<script>
    var modalBody = document.getElementById('kerjakanSoalModalBody').getElementsByTagName('pre')[0];
    var confirmKerjakanBtn = $('#kerjakanSoalModal .btn-success');

    $(document).on("click", "#kerjakanSoalBtn", function() {
        var judulkuis = $(this).data('judulkuis');
        var id_kuis = $(this).data('idkuis');
        modalBody.innerHTML = '<strong>' + judulkuis + '</strong>';
        confirmKerjakanBtn.attr('href', '<?= base_url('siswa/kerjakan_kuis/') ?>' + id_kuis);
    })
</script>