<style>
    .btn-danger {
        background-color: #ED1C24;
    }
    .btn-primary {
        background-color: #0073BD;
    }
    span {
        color: #fff;
    }
    .far{
        color: #000000;
    }
</style>
<div class="card card-primary">
    <?php
    foreach ($user as $u) {
    ?>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-3">
                <label>Username</label>
                <input value="<?= $u->username ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>Password</label>
                <div class="input-group">
                    <input value="<?= str_repeat("*", strlen($u->password)); ?>" class="form-control" maxlength="50" disabled>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label>nama</label>
                <input value="<?= $u->nama ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Akses</label>
                <input value="<?= $u->akses ?>" class="form-control" maxlength="50" disabled>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $u->username ?>`,`<?= $u->password ?>`,`<?= $u->nama ?>`,`<?= $u->akses ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i><span> Ubah</span> 
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $u->username ?>`)">
            <i class="fas fa-trash"></i><span> Hapus</span>
        </a>
    </div>
</div>
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="username">
                    <span id="modal-body-update-or-create">

                        <div class="form-group">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" maxlength="50" disabled>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-eye" id="togglePassword"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label>Akses</label>
                            <select name="akses" class="form-control">
                                <option value="" disabled selected hidden>akses</option>
                                <option value="Master">Master</option>
                                <option value="User_Satu">User Satu</option>
                                <option value="User_Dua">User Dua</option>
                            </select>
                        </div>
                    </span>
                    <span id="modal-body-delete">
                        Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block" id="modal-button">OK</button>
                    <button type="button" class="btn btn-block" data-dismiss="modal" id="batal" aria-d-none="true">Batal</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(function() {
        $("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "url": "<?= base_url('assets/plugins/datatables/i18n/id.json'); ?>"
            }
        });
        $('#Modal').on('shown.bs.modal', function() {
            $('[name="username"]').focus();
        });
        $('[name="form"]').validate({
            rules: {
                password: {
                    required: true
                },
                nama: {
                    required: true
                },
                akses: {
                    required: true
                },
                image: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    function ubah(username, password, nama, akses, image) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data User');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="username"]').val(username);
        $('[name="password"]').val(password);
        $('[name="nama"]').val(nama);
        $('[name="akses"]').val(akses);
        $('[name="image"]').val(image);
        document.form.action = '<?= base_url('Master/user_update_aksi'); ?>';
    }

    function hapus(username) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus User');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="username"]').val(username);
        $('#name-delete').html(username);
        document.form.action = '<?= base_url('Master/user_delete'); ?>';
    }
</script>
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