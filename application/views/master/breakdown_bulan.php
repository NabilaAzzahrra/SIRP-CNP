<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form id="Modal" action="<?= base_url('Master/data_breakdown_bulan'); ?>" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select name="tahun_akademik" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Prodi" required>
                                    <option value="">--PILIH--</option>
                                    <option value="all">--ALL--</option>
                                    <?php foreach ($breakdown as $p) { ?>
                                        <option value="<?= $p->tahun_akademik ?>"><?= $p->tahun_akademik ?></option>
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