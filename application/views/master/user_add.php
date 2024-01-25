<style>
    .card-header{
        background-color: #0073BD;
    }
    .btn-primary{
        background-color: #0073BD;
    }
    .btn-danger{
        background-color: #ED1C24;
    }
    .far{
        color: #000;
    }
</style>
<div class="card card-primary">
    <div class="card-body">
        <form name="form" action="<?= base_url('Master/user_add_aksi') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" maxlength="50">
                    <?= form_error('username', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Password</label>
                    <div class="input-group">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" maxlength="50">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-eye" id="togglePassword"></i></span>
                        </div>
                    </div>
                    <?= form_error('password', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="50">
                    <?= form_error('nama', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Akses</label>
                    <select name="akses" class="form-control">
                        <option value="" disabled selected hidden>akses</option>
                        <option value="Master">Master</option>
                        <option value="User_Satu">User Satu</option>
                        <option value="User_Dua">User Dua</option>
                    </select>
                    <?= form_error('akses', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
