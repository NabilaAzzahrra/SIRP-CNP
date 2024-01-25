<style>
</style>

<?= $this->session->flashdata('pesan'); ?>
<div class="card card-outline card-primary">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
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
                        <td><a href="<?= base_url('') ?>user_satu/update_profile?username=<?= $u->username ?>"><?= $u->username ?></a></td>
                        <td><?= str_repeat("*", strlen($u->password)); ?></td>
                        <td><?= $u->nama ?></td>
                        <td><?= $u->akses ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>