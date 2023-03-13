<div class="mx-4">
    <?= $this->session->flashdata('message') ?>
    <h3><?= $kuis['judul'] ?></h3>
    <form action="<?= base_url('siswa/nilai/' . $id_kuis) ?>" method="post">
        <?php $no = 1; ?>
        <?php foreach ($soal as $data) : ?>
            <div class="d-flex align-items-start my-4">
                <h5><span class="badge badge-primary mr-2 px-3 py-2 mt-1"><?= $no . '. ' ?></span></h5>
                <div class="col">
                    <h5 class="font-weight-bold"><?= ucfirst($data['pertanyaan']) ?></h5>
                    <!-- <?= 'pertanyaan' . $no . 'jawaban_a' ?> -->
                    <div class="form-check">
                        <input name="<?= 'jawaban_pertanyaan_' . $no ?>" value="a" class="form-check-input" type="radio" style="transform: scale(1.4);">
                        <label class="ml-2">
                            <h5>A. <?= ucfirst($data['jawaban_a']) ?></h5>
                        </label>
                    </div>
                    <!-- <?= 'pertanyaan' . $no . 'jawaban_b' ?> -->
                    <div class="form-check">
                        <input name="<?= 'jawaban_pertanyaan_' . $no ?>" value="b" class="form-check-input" type="radio" style="transform: scale(1.4);">
                        <label class="ml-2">
                            <h5>B. <?= ucfirst($data['jawaban_b']) ?></h5>
                        </label>
                    </div>
                    <!-- <?= 'pertanyaan' . $no . 'jawaban_c' ?> -->
                    <div class="form-check">
                        <input name="<?= 'jawaban_pertanyaan_' . $no ?>" value="c" class="form-check-input" type="radio" style="transform: scale(1.4);">
                        <label class="ml-2">
                            <h5>C. <?= ucfirst($data['jawaban_c']) ?></h5>
                        </label>
                    </div>
                    <!-- <?= 'pertanyaan' . $no . 'jawaban_d' ?> -->
                    <div class="form-check">
                        <input name="<?= 'jawaban_pertanyaan_' . $no ?>" value="d" class="form-check-input" type="radio" style="transform: scale(1.4);">
                        <label class="ml-2">
                            <h5>D. <?= ucfirst($data['jawaban_d']) ?></h5>
                        </label>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>
        <div class="col my-5 d-flex justify-content-center">
            <a href='#' data-toggle="modal" data-target="#kirimSoalModal" class="btn btn-primary btn-icon-split w-25">
                <span class="text col">Selesai</span>
                <span class="icon text-white-50 ml-1">
                    <i class="fas fa-paper-plane"></i>
                </span>
            </a>
        </div>

        <div class="modal fade" id="kirimSoalModal" tabindex="-1" role="dialog" aria-labelledby="kirimSoalModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kirim Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="kirimSoalModalBody">
                        Dengan menekan tombol <strong>kirim</strong>, maka tugas akan dinilai oleh sistem dan dikirimkan kepada pengajar.
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>