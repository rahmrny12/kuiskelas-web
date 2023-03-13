<div class="ml-4 mr-2">
    <div class="d-lg-flex align-items-center justify-content-between mb-3">
        <h3 class="font-weight-bold">Hai, <span class="text-primary"><?= $penilaian['nama'] ?></span></h3>
        <div class="badge badge-info px-3 pt-2">
            <h6 class="text-light">Dikerjakan pada <strong><?= $tanggal ?></strong></h6>
            <h6 class="float-right float-md-left text-light">Pukul <strong><?= $waktu ?></strong></h6>
        </div>
    </div>
    <h5><strong>Kuis yang dikerjakan</strong> : <?= $penilaian['judul'] ?></h5>
    <h5><strong>Nilai yang diperoleh</strong> : <?= $penilaian['nilai_kuis'] ?></h5>
    <div class="d-md-flex my-4">
        <h5 class="mr-3">
            <strong>Jawaban yang benar</strong> :
            <span class="text-success"><?= $penilaian['jawaban_benar'] ?></span>
        </h5>
        <h5>
            <strong>Jawaban yang salah</strong> :
            <span class="text-danger"><?= $penilaian['jawaban_salah'] ?></span>
        </h5>
    </div>
</div>