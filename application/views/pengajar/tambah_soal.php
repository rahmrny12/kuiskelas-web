<div class="mx-4">
    <h3 class="mx-4">Tambah Soal</h3>
    <?= $this->session->flashdata('message') ?>
    <div class="my-3 mx-2">
        <?php echo form_error('pertanyaan', '<div class="alert alert-warning">', '</div>'); ?>
        <form action="<?= base_url('pengajar/tambah_soal/' . $idkuis) ?>" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-3">1.</span>
                </div>
                <textarea class="form-control" spellcheck="false" name="pertanyaan1" rows="1" placeholder="Masukkan pertanyaan"></textarea>
            </div>
            <div class="row mt-4">
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">a.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban1" id="pertanyaan1_jawaban1" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">b.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban2" id="pertanyaan1_jawaban2" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">c.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban3" id="pertanyaan1_jawaban3" placeholder="Masukkan jawaban">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text px-4">d.</span>
                    </div>
                    <input type="text" class="form-control" name="pertanyaan1_jawaban4" id="pertanyaan1_jawaban4" placeholder="Masukkan jawaban">
                </div>
            </div>
            <select class="custom-select" name="jawaban_benar" id="jawaban_benar">
                <option selected>Jawaban benar</option>
                <option value="a"></option>
                <option value="b"></option>
                <option value="c"></option>
                <option value="d"></option>
            </select>
            <div class="col my-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Tambah Kuis</button>
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

    var option_a = jawaban_benar.options[1];
    var option_b = jawaban_benar.options[2];
    var option_c = jawaban_benar.options[3];
    var option_d = jawaban_benar.options[4];
    
    jawaban_benar.addEventListener("click", event => {
        option_a.innerHTML = 'a. ' + jawaban_a.value;
        option_b.innerHTML = 'b. ' + jawaban_b.value;
        option_c.innerHTML = 'c. ' + jawaban_c.value;
        option_d.innerHTML = 'd. ' + jawaban_d.value;
    })
</script>