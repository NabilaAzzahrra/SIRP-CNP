<style>
    .btn-primary {
        background-color: #0073BD;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('Master/user_add') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Akses</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($user as $u) {
            ?>
                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>master/user_id?username=<?= $u->username ?>"><?= $u->username ?></a></td>
                        <td><?= str_repeat("*", strlen($u->password)); ?></td>
                        <td><?= $u->nama ?></td>
                        <td><?= $u->akses ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>