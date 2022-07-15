<div class="mx-5 mb-5">
    <div class="d-flex justify-content-between align-items-end">
        <h1>Daftar Soal</h1>
        <div class="mb-2">
            <a href="<?= base_url('pengajar') ?>" class="btn btn-primary btn-icon-split mr-1">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali Ke Daftar Kuis</span>
            </a>
            <a href="<?= base_url('pengajar/tambah_soal/' . $idkuis) ?>" class="btn btn-primary btn-icon-split">
                <span class="text">Tambah Soal</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Pertanyaan</th>
                    <th class="text-center">Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php if ($soal == null) : ?>
                <td colspan="4">
                    <h5><span class="d-flex justify-content-center my-3">Soal masih kosong.</span></h5>
                </td>
            <?php else : ?>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($soal as $data) : ?>
                        <tr class="bg-white">
                            <td class="text-center"><?= $no++ ?></td>
                            <td><span class="font-weight-bold"><?= $data['pertanyaan'] ?></span></td>
                            <td>
                                <div class="row d-flex justify-content-start mx-1">
                                    <h5 class="mx-1">
                                        <span class="badge <?= $data['jawaban_benar'] == 'a' ? 'badge-success font-weight-bold' : 'badge-secondary font-weight-normal' ?> p-3 text-wrap text-left">
                                            a. <?= $data['jawaban_a'] ?>
                                        </span>
                                    </h5>
                                    <h5 class="mx-1">
                                        <span class="badge <?= $data['jawaban_benar'] == 'b' ? 'badge-success font-weight-bold' : 'badge-secondary font-weight-normal' ?> p-3 text-wrap text-left">
                                            b. <?= $data['jawaban_b'] ?>
                                        </span>
                                    </h5>
                                    <h5 class="mx-1">
                                        <span class="badge <?= $data['jawaban_benar'] == 'c' ? 'badge-success font-weight-bold' : 'badge-secondary font-weight-normal' ?> p-3 text-wrap text-left">
                                            c. <?= $data['jawaban_c'] ?>
                                        </span>
                                    </h5>
                                    <h5 class="mx-1">
                                        <span class="badge <?= $data['jawaban_benar'] == 'd' ? 'badge-success font-weight-bold' : 'badge-secondary font-weight-normal' ?> p-3 text-wrap text-left">
                                            d. <?= $data['jawaban_d'] ?>
                                        </span>
                                    </h5>
                                </div>
                            </td>
                            <td class="col-md-2">
                                <a href="<?= base_url('pengajar/edit_soal/' . $idkuis . '/' . $data['id_soal']) ?>" class="btn btn-primary mb-2 d-flex justify-content-between btn-icon-split">
                                    <span class="text col">Edit Soal</span>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                                <!-- data-toggle="modal" data-target="#deleteSoalModal" -->
                                <a href="#" id="deleteSoalBtn" data-pertanyaan="<?= $data['pertanyaan'] ?>" data-idsoal="<?= $data['id_soal'] ?>" data-idkuis="<?= $idkuis ?>" class="btn btn-warning d-flex justify-content-between btn-icon-split">
                                    <span class="text col text-dark">Hapus Soal</span>
                                    <span class="icon text-black-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>