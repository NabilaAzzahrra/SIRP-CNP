<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
    }

    form {
        margin-bottom: 5px;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <form action="<?= base_url('user_satu/cetak_laporan_mahasiswa') ?>" method="GET">
                            <div class="row">
                                <div class="col-md-2">
                                    <select class="form-control" id="ta" name="sts">
                                        <option value="">Pilih Status</option>
                                        <option value="all">--All--</option>
                                        <option value="KKI">KKI</option>
                                        <option value="kerja">Kerja</option>
                                        <option value="bermasalah">Bermasalah</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="pr" name="prodi">
                                        <option value="">Pilih Prodi</option>
                                        <option value="all">--ALL--</option>
                                        <?php foreach ($prodi as $pr) { ?>
                                            <option value="<?= $pr->prodi ?>"><?= $pr->prodi ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="pr" name="thn">
                                        <option value="">Pilih Tahun Akademik</option>
                                        <option value="all">--ALL--</option>
                                        <?php foreach ($tahun_akademik as $ta) { ?>
                                            <option value="<?= $ta->tahun_akademik ?>"><?= $ta->tahun_akademik ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-default"><span><i class="fas fa-search"></i> Tampilkan</span></button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div style="width:100%" align="center">

                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text sm">No</th>
                                    <th>Perusahaan</th>
                                    <th>Kota</th>
                                    <th>Tingkat</th>
                                    <th>NIM</th>
                                    <th>Mahasiswa</th>
                                    <th>Prodi</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $totalmahasiswa = "";
                                foreach ($mahasiswa as $d) {
                                    $totalmahasiswa = count($mahasiswa);
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->nama_perusahaan ?></td>
                                        <td><?= $d->kota ?></td>
                                        <td><?= $d->tingkat ?></td>
                                        <td><?= $d->nim ?></td>
                                        <td><?= $d->nama_mhs ?></td>
                                        <td><?= $d->prodi ?></td>
                                        <td><?= $d->kelas ?></td>
                                        <td><?= $d->status ?></td>
                                        <td><?= $d->tgl_hasil ?></td>
                                        <td><?= $d->tahun_akademik ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>