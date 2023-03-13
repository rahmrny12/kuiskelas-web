<div class="mx-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Kuis</h1>
        <div>
            <a href="<?= base_url('pengajar/tambah_kuis') ?>" class="btn btn-primary btn-icon-split">
                <span class="text">Tambah Kuis Baru</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <th>No.</th>
                <th class="col-3">Judul</th>
                <th class="col-7">Deskripsi</th>
                <th class="col-2">Aksi</th>
            </thead>
            <tbody class="bg-white">
                <?php if ($kuis == null) : ?>
                    <td colspan="4">
                        <h5><span class="d-flex justify-content-center my-3">Belum ada kuis yang ditambahkan.</span></h5>
                    </td>
                <?php else : ?>
                    <?php $no = 1 ?>
                    <?php foreach ($kuis as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['judul'] ?></td>
                            <td><?= $data['deskripsi'] ?></td>
                            <td>
                                <a href="<?= base_url('pengajar/daftar_soal/' . $data['id_kuisioner']) ?>" class="btn btn-success d-flex justify-content-between btn-icon-split mb-1">
                                    <span class="text col">Lihat Soal</span>
                                    <span class="icon text-white-50 ml-1">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('pengajar/edit_kuis/' . $data['id_kuisioner']) ?>" class="btn btn-info d-flex justify-content-between btn-icon-split">
                                    <span class="text col">Edit</span>
                                    <span class="icon text-white-50 ml-1">
                                        <i class="fas fa-edit"></i>
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