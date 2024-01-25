<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?= base_url('User_dua/cetak_laporan_penerima_lulusan'); ?>" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select class="form-control" name="dari">
                                    <option value="">Dari</option>
                                    <option value="all">--ALL--</option>
                                    <?php for($i = date('Y'); $i>=2019; $i--) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select class="form-control" name="sampai">
                                    <option value="">Sampai</option>
                                    <option value="all">--ALL--</option>
                                    <?php for($i = date('Y'); $i>=2019; $i--) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer col-md-1">
                            <button type="submit" class="btn btn-sm btn-block bg-gradient-warning"><i class="fas fa-print"></i></button>
                        </div>
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