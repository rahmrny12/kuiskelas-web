<!-- Nested Row within Card Body -->
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-3">Halaman Registrasi</h1>
    </div>
    <?= $this->session->flashdata('message') ?>
    <form class="user" id="userForm" method="post" onsubmit="submitUser()">
        <span class="font-weight-bold ml-4">
            Registrasi sebagai :
        </span>
        <div class="form-group d-flex justify-content-start mt-2 ml-4">
            <div class="form-check mr-3">
                <input class="form-check-input" type="radio" name="roleOption" id="opsiSiswa" value="siswa" checked>
                <label class="form-check-label" for="opsiSiswa">
                    Siswa
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="roleOption" id="opsiPengajar" value="pengajar">
                <label class="form-check-label" for="opsiPengajar">
                    Pengajar
                </label>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="<?= set_value('name') ?>" id="name" name="name" placeholder="Masukkan nama lengkap...">
            <?php echo form_error('name', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <div id="inputKelas"></div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="<?= set_value('email') ?>" id="email" name="email" placeholder="Masukkan email...">
            <?php echo form_error('email', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata sandi">
            <?php echo form_error('password', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Konfirmasi kata sandi">
            <?php echo form_error('confirm_password', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block mt-4 w-50 mx-auto">
            <span class="font-weight-bold text-uppercase">Login</span>
        </button>
    </form>
    <div class="text-center mt-4">
        <a class="small" href="forgot-password.html">Lupa Password?</a>
    </div>
    <div class="text-center">
        <a href="<?= base_url('auth') ?>">Sudah punya akun?</a>
    </div>
</div>

<script>
    var roleOption = document.getElementsByName('roleOption');
    var userForm = document.getElementById('userForm');
    var inputKelas = document.getElementById('inputKelas');
    var checkedOption = 'siswa';


    window.addEventListener('load', function() {
        let registrationUrl = new URLSearchParams(location.search);
        let role = registrationUrl.get('role');
        if (role == 'siswa') {
            document.getElementById('opsiSiswa').checked = true;
            checkedOption = 'siswa';
            inputKelas.innerHTML =
                '<div class="form-group"><input type="text" class="form-control form-control-user" name="kelas" value="<?= set_value('kelas') ?>" id="kelas" kelas="kelas" placeholder="Masukkan kelas anda saat ini..."><?php echo form_error('kelas', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?></div>';
        } else {
            document.getElementById('opsiPengajar').checked = true;
            checkedOption = 'pengajar';
        }
    })


    roleOption.forEach(function(option) {
        option.addEventListener('click', function() {
            if (option.checked && option.value == 'siswa') {
                checkedOption = 'siswa';
                inputKelas.innerHTML =
                    '<div class="form-group"><input type="text" class="form-control form-control-user" name="kelas" value="<?= set_value('kelas') ?>" id="kelas" kelas="kelas" placeholder="Masukkan kelas anda saat ini..."><?php echo form_error('kelas', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?></div>'
            } else {
                checkedOption = 'pengajar';
                inputKelas.innerHTML = "";
            }
        })
    });

    function submitUser() {
        userForm.action = "<?= base_url('auth/registrasi?role=') ?>" + checkedOption;
    }
</script>