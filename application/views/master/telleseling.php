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
<?= $this->session->flashdata('pesan'); ?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('Master/perusahaan') ?>"><i class="fas fa-building"></i></a></span>

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
            <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('Master/telleseling') ?>"><i class="nav-icon fab fa-telegram-plane"></i></a></span>

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
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('Master/permintaan') ?>"><i class="fas fa-business-time"></i></a></span>

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
            <span class="info-box-icon bg-cc elevation-1"> <a href="<?= base_url('Master/mahasiswa') ?>">
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
    <div class="card-header">
        <a href="<?= base_url('Master/telleseling_add') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Follow Up 
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="<?= base_url('Master/telleseling') ?>" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <select class="form-control" name="sts">
                        <option value="">Pilih Status</option>
                        <option value="all">--ALL--</option>
                        <option value="hariini">Follow up Hari Ini</option>
                        <option value="kurangdari">Baru Feedback</option>
                        <option value="lebihdari">Segera Feedback</option>
                        <option value="sudah">Sudah Feedback</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-default"><span><i class="fas fa-search"></i> Tampilkan</span></button>
                </div>
            </div>
        </form>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Perusahaan</th>
                    <th class="text-center">Bidang</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Followup</th>
                    <th class="text-center">Hasil Followup</th>
                    <th class="text-center">Melalui</th>
                    <th class="text-center">Jumlah Hari</th>
                     <th class="text-center">Account Executive</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($telleseling as $t) {

                    /* $bg = "";
                    if ($t->ts <= 3 && $t->oleh == NULL) {
                        $bg = "bg-warning";
                    } elseif ($t->ts >= 5 && $t->oleh == NULL) {
                        $bg = "bg-danger";
                    } elseif ($t->ts == "Sudah") {
                        $bg = "bg-success";
                    }

                    $fb = "";
                    if ($t->tf <= 3) {
                        $fb = "bg-warning";
                    } elseif ($t->tf >= 5 && $t->oleh == 1) {
                        $fb = "bg-danger";
                    } elseif ($t->tf == "Sudah") {
                        $fb = "bg-success";
                    } elseif($t->tf == "Belum Accept"){
                        $fb = "bg-secondary";
                    }*/
                    
                    $bg = "";
                    if ($t->jumlah_hari <= 30) {
                        $bg = "badge-warning";
                    }else if($t->jumlah_hari >= 30){
                        $bg = "badge-danger";
                    }

                    $day = "";
                    if ($t->tanggal_penanda_fu == null) {
                        $day = $t->jumlah_hari;
                    } else if($t->tanggal_penanda_fu != null) {
                        $day = $t->jumlah_hari_penanda_fu;
                    }

                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>master/telleseling_detail?id_perusahaan=<?= $t->id_perusahaan ?>"><?= $t->nama_perusahaan ?></a></td>
                        <td><?= $t->bidang ?></td>
                        <td><?= $t->alamat ?></td>
                        <td><?= date('d/m/Y', strtotime($t->tanggal_fu)); ?></td>
                        <td><?= $t->hasil_fu ?></td>
                        <td><?= $t->melalui ?></td>
                        <td class="text-center"><small class="badge <?= $bg ?>">+ <?= $day?> Hari</small></td>
                        <td><?= $t->oleh ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>