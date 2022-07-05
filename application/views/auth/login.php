<!-- Nested Row within Card Body -->
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-3">Halaman Login</h1>
    </div>
    <?= $this->session->flashdata('message') ?>
    <form class="user" method="post" action="<?= base_url('auth') ?>">
        <div class="form-group">
            <input type="text" class="form-control form-control-user"  value="<?= set_value('email') ?>" id="email" name="email" placeholder="Masukkan email...">
            <?php echo form_error('email', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata sandi">
            <?php echo form_error('password', '<div class="mx-4 mt-1 text-danger">', '</div>'); ?>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block mt-4 w-50 mx-auto">
            <span class="font-weight-bold text-uppercase">Login</span>
        </button>
    </form>
    <div class="text-center mt-4">
        <a class="small" href="forgot-password.html">Lupa Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="register.html">Buat akun baru!</a>
    </div>
</div>