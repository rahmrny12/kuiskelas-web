<div class="mx-4">
    <div class="col-md-7 d-flex justify-content-between">
        <h3 class="mx-2">Tambah Kuis Baru</h3>
        <div class="mx-2">
            <a href="<?= base_url('pengajar') ?>" class="btn btn-primary btn-icon-split">
                <span class="text">Buka daftar kuis</span>
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </a>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="mx-2 mt-3">
        <form action="<?= base_url('pengajar/tambah_kuis') ?>" method="post">
            <div class="form-group col-md-7">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
            </div>
            <div class="form-group col-md-7">
                <textarea class="form-control" name="deskripsi" rows="2" placeholder="Masukkan deskripsi"></textarea>
            </div>

            <div class="col-md-7 my-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="text">Tambah Kuis</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>

        </form>
    </div>
</div>