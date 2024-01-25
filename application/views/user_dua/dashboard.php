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

<div id="load">Loading...</div>

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

<div class="card">
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Perusahaan</th>
                    <th class="text-center">Bidang</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">PIC</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Account Executive</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Jumlah Hari</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $no = 1;
                foreach ($telleseling as $p) {
                    /*$fb = "";
                    if ($p->tf <= 3) {
                        $fb = "bg-warning";
                    } elseif ($p->tf >= 5) {
                        $fb = "bg-danger";
                    } elseif ($p->tf == "Sudah") {
                        $fb = "bg-success";
                    } elseif ($p->tf == "Belum Accept") {
                        $fb = "bg-secondary";
                    }*/
                    $bg = "";
                    if ($p->jumlah_hari <= 30) {
                        $bg = "badge-warning";
                    } else if ($p->jumlah_hari >= 30) {
                        $bg = "badge-danger";
                    }

                    $day = "";
                    if ($p->tanggal_penanda_fu == null) {
                        $day = $p->jumlah_hari;
                    } else if ($p->tanggal_penanda_fu != null) {
                        $day = $p->jumlah_hari_penanda_fu;
                    }

                     if ($p->oleh == $this->session->userdata('username')) {


                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>user_dua/telleseling_detail?id_perusahaan=<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></a></td>
                        <td><?= $p->bidang ?></td>
                        <td><?= $p->kota ?></td>
                        <td><?= $p->kontak_person ?></td>
                        <td><?= $p->no_telp ?></td>
                        <td><?= $p->oleh ?></td>
                        <td><?= $p->hasil_fu ?></td>
                        <td class="text-center"><small class="badge <?= $bg ?>">+ <?= $day ?> Hari</small></td>
                    </tr>
                    <?php } else {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_perusahaan ?></td>
                        <td><?= $p->bidang ?></td>
                        <td><?= $p->kota ?></td>
                        <td><?= $p->kontak_person ?></td>
                        <td><?= $p->no_telp ?></td>
                        <td><?= $p->oleh ?></td>
                        <td><?= $p->hasil_fu ?></td>
                        <td class="text-center"><small class="badge <?= $bg ?>">+ <?= $day ?> Hari</small></td>
                    </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#load").fadeOut(1000);
    });
</script>




<!--/. container-fluid -->