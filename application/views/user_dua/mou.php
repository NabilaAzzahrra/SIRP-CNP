<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?= base_url('User_dua/jumlah_mou'); ?>" target="_blank">
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