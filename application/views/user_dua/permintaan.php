<style>
    .fa-minus {
        color: #000000;
    }

    .fa-times {
        color: #000000;
    }

    .fa-plus {
        color: #fff;
    }

    .card-cc {
        background-color: #0073BD;
    }

    .card-title {
        color: #fff;
    }

    .fa-minus {
        color: #fff;
    }

    .fa-times {
        color: #fff;
    }

    .bg-cc {
        background-color: #0073BD;
    }

    .jdl {
        font-weight: bold;
    }

    .bg-dd {
        background-color: #ED1C24;
    }

    .btn-primary {
        background-color: #0073BD;
    }
     h6{
         color:#000000;
     }

    #load {
        width: 100%;
        height: 100%;
        position: fixed;
        text-indent: 100%;
        background: #e0e0e0 url('../assets/template/dist/img/images/loading.gif') no-repeat center;
        z-index: 1;
        opacity: 0.4;
        background-size: 8%;
    }
</style>
<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('User_dua/perusahaan') ?>"><i class="fas fa-building"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Perusahaan</span>
                <span class="info-box-number"><?= count($perusahaan); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('User_dua/telleseling') ?>"><i class="nav-icon fab fa-telegram-plane"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Follow Up</span>
                <span class="info-box-number"><?= count($followup); ?>/20</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('User_dua/permintaan') ?>"><i class="fas fa-business-time"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Permintaan</span>
                <span class="info-box-number"><?= count($permintaan); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"> <a href="<?= base_url('User_dua/mahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i></a></span>
            <div class="info-box-content">
                <span class="info-box-text">Mahasiswa</span>
                <span class="info-box-number"><?= count($mhs); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


</div>
<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('User_dua/permintaan_add') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Permintaan
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">



        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Kota</th>
                    <th>Posisi yang dibutuhkan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Waktu</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Account Executive</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            foreach ($ht_permintaan as $hd) {
                 if ($hd->oleh == $this->session->userdata('username')) {
            ?>
                
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>user_dua/permintaan_id?id_permintaan=<?= $hd->id_permintaan ?>"><?= $hd->nama_perusahaan ?></a></td>
                        <td><?= $hd->kota ?></td>
                        <td><?= $hd->posisi_yang_dibutuhkan ?></td>
                        <td><?= date('d/m/Y', strtotime($hd->waktu)) ?></td>
                        <td><?= date('H:i', strtotime($hd->waktu)) ?></td>
                        <td><?= $hd->jumlah ?></td>
                        <td><?= $hd->oleh ?></td>
                    </tr>
                 <?php
                    } else {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $hd->nama_perusahaan ?></td>
                        <td><?= $hd->kota ?></td>
                        <td><?= $hd->posisi_yang_dibutuhkan ?></td>
                        <td><?= date('d/m/Y', strtotime($hd->waktu)) ?></td>
                        <td><?= date('H:i', strtotime($hd->waktu)) ?></td>
                        <td><?= $hd->jumlah ?></td>
                        <td><?= $hd->oleh ?></td>
                    </tr>
            <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title"><h6>Hasil Sudah Terkonfirmasi</h6></div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Kota</th>
                    <th>Posisi yang dibutuhkan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Waktu</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Account Executive</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tot = 0;
                foreach ($permintaann as $hd) {
                     if ($hd->oleh == $this->session->userdata('username')) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>master/permintaan_id?id_permintaan=<?= $hd->id_permintaan ?>"><?= $hd->nama_perusahaan ?></a></td>
                        <td><?= $hd->kota ?></td>
                        <td><?= $hd->posisi_yang_dibutuhkan ?></td>
                        <td><?= date('d F Y', strtotime($hd->waktu)) ?></td>
                        <td><?= date('H:i', strtotime($hd->waktu)) ?></td>
                        <td><?= $hd->jumlah?></td>
                        <td><?= $hd->oleh ?></td>
                    </tr>
                    <?php
                    } else {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $hd->nama_perusahaan ?></td>
                        <td><?= $hd->kota ?></td>
                        <td><?= $hd->posisi_yang_dibutuhkan ?></td>
                        <td><?= date('d F Y', strtotime($hd->waktu)) ?></td>
                        <td><?= date('H:i', strtotime($hd->waktu)) ?></td>
                        <td><?= $hd->jumlah?></td>
                        <td><?= $hd->oleh ?></td>
                    </tr>
                <?php } ?>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>