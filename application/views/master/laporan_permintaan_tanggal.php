<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?= base_url('Master/halaman_cetak_laporan_permintaan_tanggal'); ?>" target="_blank" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Dari</label>
                                <input name="dari" type="date" class="form-control" value="<?= $dari ?>">
                            </div>
                            <div class="form-group">
                                <label>Sampai</label>
                                <input name="sampai" type="date" class="form-control" value="<?= $sampai ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-block bg-gradient-warning" name="submit" value="excel"><i class="fas fa-print"></i></button>
                        <button type="submit" class="btn btn-sm btn-block bg-gradient-danger" name="submit" value="pdf"><i class="fas fa-print"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('assets/template'); ?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/select2/js/i18n/id.js"></script>

<script>
    $(function() {
        $('.select2').select2().val(null).trigger('change');
    });
</script>