<div class="mx-4">
    <h3 class="mx-4">Edit Soal</h3>
    <?= $this->session->flashdata('message') ?>
    <div class="my-3 mx-2">
        <form action="<?= base_url('pengajar/edit_soal/' . $idkuis . '/' . $soal['id_soal']) ?>" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-3">1.</span>
                </div>
                <textarea class="form-control" spellcheck="false" name="pertanyaan1" rows="1" placeholder="Masukkan pertanyaan"><?= $soal['pertanyaan'] ?></textarea>
            </div>
            <div class="row mt-4">
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">a.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban1" value="<?= $soal['jawaban_a'] ?>" id="pertanyaan1_jawaban1" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">b.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban2" value="<?= $soal['jawaban_b'] ?>" id="pertanyaan1_jawaban2" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">c.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban3" value="<?= $soal['jawaban_c'] ?>" id="pertanyaan1_jawaban3" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">d.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban4" value="<?= $soal['jawaban_d'] ?>" id="pertanyaan1_jawaban4" placeholder="Masukkan jawaban">
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
    var jawaban_a = document.getElementById('pertanyaan1_jawaban1');
    var jawaban_b = document.getElementById('pertanyaan1_jawaban2');
    var jawaban_c = document.getElementById('pertanyaan1_jawaban3');
    var jawaban_d = document.getElementById('pertanyaan1_jawaban4');
    var jawaban_benar = document.getElementById('jawaban_benar');

    var option_a = jawaban_benar.options[0];
    var option_b = jawaban_benar.options[1];
    var option_c = jawaban_benar.options[2];
    var option_d = jawaban_benar.options[3];

    option_a.innerHTML = 'a. ' + jawaban_a.value;
    option_b.innerHTML = 'b. ' + jawaban_b.value;
    option_c.innerHTML = 'c. ' + jawaban_c.value;
    option_d.innerHTML = 'd. ' + jawaban_d.value;

    jawaban_a.addEventListener('keyup', event => {
        option_a.innerHTML = 'a. ' + jawaban_a.value;
    })
    jawaban_b.addEventListener('keyup', event => {
        option_b.innerHTML = 'b. ' + jawaban_b.value;
    })
    jawaban_c.addEventListener('keyup', event => {
        option_c.innerHTML = 'c. ' + jawaban_c.value;
    })
    jawaban_d.addEventListener('keyup', event => {
        option_d.innerHTML = 'd. ' + jawaban_d.value;
    })
</script>