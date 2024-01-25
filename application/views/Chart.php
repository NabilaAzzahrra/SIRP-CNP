<div class="row">
<!-- BAR CHART -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-cc">
            <h3 class="card-title">MOU Pertahun</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->
</div>

<div class="row">
<!-- DONUT CHART -->
<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Sumber MOU</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <canvas id="donutChart" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->
</div>

<div class="row">
<!-- Left col -->
<div class="col-md-6">
    <!-- MAP & BOX PANE -->
    <!--UV Visitors Report -->
    <div class="card card-warning">
        <div class="card-header border-transparent">
            <h3 class="card-title">Segera Followup</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Alamat</th>
                            <th>Tanggal Followup</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($segera as $d) {

                        if ($d->status == "Belum") {
                            $bg = "bg-secondary";
                        } elseif ($d->status == "Segera") {
                            $bg = "bg-warning";
                        } elseif ($d->status == "Belum" and $tgl . "+1 days") {
                            $bg = "bg-primary";
                        } elseif ($d->status == "Belum" and $tgl . "+14 days") {
                            $bg = "bg-warning";
                            $d->status == "Segera";
                        } elseif ($d->status == "Belum" and $tgl . "+29 days") {
                            $bg = "bg-danger";
                        } else {
                            $bg = "bg-success";
                        }
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $d->nama_perusahaan ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->tanggal_fu ?></td>
                                <td><span class="badge <?= $bg ?>"><?= $d->status ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="<?= base_url('Master/telleseling') ?>" target="_blank" class="btn btn-sm btn-info float-left">Lihat</a>
        </div>
        <!-- /.card-footer -->
    </div>

    <!-- /.card -->
    <!-- /.row -->

    <!-- TABLE: LATEST ORDERS -->
    <!-- /.card -->
</div>
<!-- /.col -->

<div class="col-md-6">
    <!-- MAP & BOX PANE -->
    <!--UV Visitors Report -->
    <div class="card card-info">
        <div class="card-header border-transparent">
            <h3 class="card-title">Segera Feedback</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Alamat</th>
                            <th>Tanggal Followup</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($segera as $d) {

                        if ($d->status == "Belum") {
                            $bg = "bg-secondary";
                        } elseif ($d->status == "Segera") {
                            $bg = "bg-warning";
                        } elseif ($d->status == "Belum" and $tgl . "+1 days") {
                            $bg = "bg-primary";
                        } elseif ($d->status == "Belum" and $tgl . "+14 days") {
                            $bg = "bg-warning";
                            $d->status == "Segera";
                        } elseif ($d->status == "Belum" and $tgl . "+29 days") {
                            $bg = "bg-danger";
                        } else {
                            $bg = "bg-success";
                        }
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $d->nama_perusahaan ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->tanggal_fu ?></td>
                                <td><span class="badge <?= $bg ?>"><?= $d->status ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="<?= base_url('Master/telleseling') ?>" target="_blank" class="btn btn-sm btn-info float-left">Lihat</a>
        </div>
        <!-- /.card-footer -->
    </div>

    <!-- /.card -->
    <!-- /.row -->

    <!-- TABLE: LATEST ORDERS -->
    <!-- /.card -->
</div>

<!-- /.col -->
</div>
