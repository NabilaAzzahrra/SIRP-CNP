<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                //$jml = 0;
                                foreach ($mahasiswa as $m) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $m->prodi ?></td>
                                        <td class="text-center"><?= $m->jml ?></td>
                                        <td class="text-center"><?= $m->tahun ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>