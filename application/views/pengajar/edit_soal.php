<div class="mx-4">
    <div class="d-flex justify-content-between align-items-end mx-3">
        <h3>Edit Soal</h3>
        <div class="mb-2">
            <a href="<?= base_url('pengajar/daftar_soal/' . $idkuis) ?>" class="btn btn-primary btn-icon-split mr-1">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali Ke Daftar Soal</span>
            </a>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="mb-3 mx-2">
        <form action="<?= base_url('pengajar/edit_soal/' . $idkuis . '/' . $soal['id_soal']) ?>" method="post" autocomplete="false">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-3">1.</span>
                </div>
                <textarea class="form-control" spellcheck="false" name="pertanyaan" rows="1" placeholder="Masukkan pertanyaan"><?= $soal['pertanyaan'] ?></textarea>
            </div>
            <?php echo form_error('pertanyaan', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
            <div class="row mt-4">
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">a.</span>
                        </div>
                        <input type="text" class="form-control" name="jawaban_a" value="<?= $soal['jawaban_a'] ?>" id="jawaban_a" placeholder="Masukkan jawaban">
                    </div>
                    <?php echo form_error('jawaban_a', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">b.</span>
                        </div>
                        <input type="text" class="form-control" name="jawaban_b" value="<?= $soal['jawaban_b'] ?>" id="jawaban_b" placeholder="Masukkan jawaban">
                    </div>
                    <?php echo form_error('jawaban_b', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">c.</span>
                        </div>
                        <input type="text" class="form-control" name="jawaban_c" value="<?= $soal['jawaban_c'] ?>" id="jawaban_c" placeholder="Masukkan jawaban">
                    </div>
                    <?php echo form_error('jawaban_c', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">d.</span>
                        </div>
                        <input type="text" class="form-control" name="jawaban_d" value="<?= $soal['jawaban_d'] ?>" id="jawaban_d" placeholder="Masukkan jawaban">
                    </div>
                    <?php echo form_error('jawaban_d', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
            </div>
            <select class="custom-select" name="jawaban_benar" id="jawaban_benar">
                <option <?= $soal['jawaban_benar'] == 'a' ? 'selected' : '' ?> value="a"></option>
                <option <?= $soal['jawaban_benar'] == 'b' ? 'selected' : '' ?> value="b"></option>
                <option <?= $soal['jawaban_benar'] == 'c' ? 'selected' : '' ?> value="c"></option>
                <option <?= $soal['jawaban_benar'] == 'd' ? 'selected' : '' ?> value="d"></option>
            </select>
            <div class="col my-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit Soal</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('document').ready(function() {
        var jawaban_a = document.getElementById('jawaban_a');
        var jawaban_b = document.getElementById('jawaban_b');
        var jawaban_c = document.getElementById('jawaban_c');
        var jawaban_d = document.getElementById('jawaban_d');
        var jawaban_benar = document.getElementById('jawaban_benar');

        var option_1 = jawaban_benar.options[0];
        var option_2 = jawaban_benar.options[1];
        var option_3 = jawaban_benar.options[2];
        var option_4 = jawaban_benar.options[3];

        option_1.innerHTML = 'a. ' + jawaban_a.value;
        option_2.innerHTML = 'b. ' + jawaban_b.value;
        option_3.innerHTML = 'c. ' + jawaban_c.value;
        option_4.innerHTML = 'd. ' + jawaban_d.value;

        jawaban_a.addEventListener('keyup', (_) => {
            option_1.innerHTML = 'a. ' + jawaban_a.value;
        })
        jawaban_b.addEventListener('keyup', (_) => {
            option_2.innerHTML = 'b. ' + jawaban_b.value;
        })
        jawaban_c.addEventListener('keyup', (_) => {
            option_3.innerHTML = 'c. ' + jawaban_c.value;
        })
        jawaban_d.addEventListener('keyup', (_) => {
            option_4.innerHTML = 'd. ' + jawaban_d.value;
        })
    })
</script>