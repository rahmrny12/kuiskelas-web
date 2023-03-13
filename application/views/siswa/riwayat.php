<div class="mx-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mx-3">Riwayat Penilaian</h1>
        <div>
            <a href="<?= base_url('pengajar/tambah_kuis') ?>" class="btn btn-primary btn-icon-split">
                <span class="text">Buka Daftar Kuis</span>
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <th>No.</th>
                <th>Judul Kuis</th>
                <th class="text-center">Nilai</th>
                <th>Aksi</th>
            </thead>
            <tbody class="bg-white">
                <?php if ($riwayat == null) : ?>
                    <td colspan="4">
                        <h5><span class="d-flex justify-content-center my-3">Belum ada kuis yang ditambahkan.</span></h5>
                    </td>
                <?php else : ?>
                    <?php $no = 1 ?>
                    <?php foreach ($riwayat as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="col-11"><?= $data['judul'] ?></td>
                            <td class="col text-center"><?= $data['nilai_kuis'] ?></td>
                            <td class="">
                                <a href="<?= base_url('siswa/detail_nilai/' . $data['id_penilaian']) ?>" class="btn btn-primary d-flex justify-content-between btn-icon-split mb-1 col">
                                    <span class="text col">Detail</span>
                                    <span class="icon text-white-50 ml-1">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>