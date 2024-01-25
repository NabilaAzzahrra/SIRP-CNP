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
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div style="width:100%" align="center">

                            <table class="idr">
                                <?php

                                foreach ($mhs as $d) {
                                ?>
                                    <tr>
                                        <td style="height: 30px; padding-right:100px;">Nama</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->nama_mhs ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">NIM</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->nim ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">Prodi</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->prodi ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">IPK</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->ipk ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">Tahun Akademik</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->tahun_akademik ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">Tahun Lulus</td>
                                        <td>:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">Status Penempatan</td>
                                        <td>:</td>
                                        <td></td>
                                        <td id="sts"><?= $d->status_penempatan ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">Asal Sekolah</td>
                                        <td>:</td>
                                        <td></td>
                                        <td><?= $d->asal_sekolah ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </table><br>

                        </div>

                        <table id="example6" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text sm">No</th>
                                    <th class="text-center">Nama Perusahaan</th>
                                    <th class="text-center">Tanggal Prose/Hasils</th>
                                    <th class="text-center">Posisi Jabatan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Hasil</th>
                                    <th class="text-center">Keterangan</th>
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
                                        <td><?= $d->tgl_hasil ?></td>
                                        <td><?= $d->posisi_yang_dibutuhkan ?></td>
                                        <td><?= $d->status ?></td>
                                         <td><?= $d->hasil ?></td>
                                        <td><?= $d->ket ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>


                        <table id="example7" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text sm">No</th>
                                    <th class="text-center a">Nama Usaha</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Tanggal Mulai</th>
                                    <th class="text-center">Omset</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $totalmahasiswa = "";
                                foreach ($usaha as $d) {
                                    $totalmahasiswa = count($mahasiswa);
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->nama_usaha ?></td>
                                        <td><?= $d->alamat_usaha ?></td>
                                        <td><?= $d->tanggal_mulai ?></td>
                                        <td><?= $d->omset ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="card-footer">
                        <?php
                        //print_r($mahasiswa);
                        foreach ($mahasiswa as $m) {
                        ?>
                        <?php } ?>
                        <a class="btn btn-success btn-sm" href="<?= base_url('') ?>User_dua/cetak_laporan_proses_penempatan_mahasiswa?nim=<?= $m->nim ?>" target="_blank">
                            <i class="fas fa-print"></i> Print
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>