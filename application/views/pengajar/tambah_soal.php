<div class="mx-4">
    <div class="d-flex justify-content-between align-items-end mx-3">
        <h3>Tambah Soal</h3>
        <div class="mb-2">
            <a href="<?= base_url('pengajar/daftar_soal/' . $idkuis) ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali Ke Daftar Soal</span>
            </a>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="mb-3 mx-2">
        <?php echo form_error('pertanyaan', '<div class="alert alert-warning">', '</div>'); ?>
        <form action="<?= base_url('pengajar/tambah_soal/' . $idkuis) ?>" method="post" autocomplete="false">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-3">1.</span>
                </div>
                <textarea class="form-control" spellcheck="false" name="pertanyaan_1" rows="1" placeholder="Masukkan pertanyaan"><?= set_value('pertanyaan_1') ?></textarea>
            </div>
            <?php echo form_error('pertanyaan_1', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
            <div class="row mt-4">
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">a.</span>
                        </div>
                        <input type="text" class="form-control" name="pertanyaan_1_jawaban_a" placeholder="Masukkan jawaban" value="<?= set_value('pertanyaan_1_jawaban_a') ?>" id="pertanyaan_1_jawaban_a">
                    </div>
                    <?php echo form_error('pertanyaan_1_jawaban_a', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">b.</span>
                        </div>
                        <input type="text" class="form-control" name="pertanyaan_1_jawaban_b" placeholder="Masukkan jawaban" value="<?= set_value('pertanyaan_1_jawaban_b') ?>" id="pertanyaan_1_jawaban_b">
                    </div>
                    <?php echo form_error('pertanyaan_1_jawaban_b', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">c.</span>
                        </div>
                        <input type="text" class="form-control" name="pertanyaan_1_jawaban_c" placeholder="Masukkan jawaban" value="<?= set_value('pertanyaan_1_jawaban_c') ?>" id="pertanyaan_1_jawaban_c">
                    </div>
                    <?php echo form_error('pertanyaan_1_jawaban_c', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4">d.</span>
                        </div>
                        <input type="text" class="form-control" name="pertanyaan_1_jawaban_d" placeholder="Masukkan jawaban" value="<?= set_value('pertanyaan_1_jawaban_d') ?>" id="pertanyaan_1_jawaban_d">
                    </div>
                    <?php echo form_error('pertanyaan_1_jawaban_d', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
                </div>
            </div>
            <select class="custom-select" name="pertanyaan_1_jawaban_benar" id="jawaban_benar">
                <option selected>Jawaban benar</option>
                <option <?= (set_value('pertanyaan_1_jawaban_benar') == 'a') ? 'selected' : '' ?> value="a"></option>
                <option <?= (set_value('pertanyaan_1_jawaban_benar') == 'b') ? 'selected' : '' ?> value="b"></option>
                <option <?= (set_value('pertanyaan_1_jawaban_benar') == 'c') ? 'selected' : '' ?> value="c"></option>
                <option <?= (set_value('pertanyaan_1_jawaban_benar') == 'd') ? 'selected' : '' ?> value="d"></option>
            </select>
            <?php echo form_error('pertanyaan_1_jawaban_benar', '<div class="mx-2 mt-1 text-danger">', '</div>'); ?>
            <div class="col my-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Tambah Kuis</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('document').ready(function() {
        var jawaban_a = document.getElementById('pertanyaan_1_jawaban_a');
        var jawaban_b = document.getElementById('pertanyaan_1_jawaban_b');
        var jawaban_c = document.getElementById('pertanyaan_1_jawaban_c');
        var jawaban_d = document.getElementById('pertanyaan_1_jawaban_d');
        var jawaban_benar = document.getElementById('jawaban_benar');

        var option_1 = jawaban_benar.options[1];
        var option_2 = jawaban_benar.options[2];
        var option_3 = jawaban_benar.options[3];
        var option_4 = jawaban_benar.options[4];

        option_1.innerHTML = 'a. ' + '<?= set_value('pertanyaan_1_jawaban_a') ?>';
        option_2.innerHTML = 'b. ' + '<?= set_value('pertanyaan_1_jawaban_b') ?>';
        option_3.innerHTML = 'c. ' + '<?= set_value('pertanyaan_1_jawaban_c') ?>';
        option_4.innerHTML = 'd. ' + '<?= set_value('pertanyaan_1_jawaban_d') ?>';

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