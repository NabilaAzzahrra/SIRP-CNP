<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form id="Modal" action="<?= base_url('User_dua/serapan_ket'); ?>" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Bidang</label>
                                <select name="bidang" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Bidang" required>
                                    <option value="">--PILIH--</option>
                                    <option value="all">--ALL--</option>
                                    <?php foreach ($bidang as $p) { ?>
                                        <option value="<?= $p->bidang ?>"><?= $p->bidang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Tahun" required>
                                    <option value="">--PILIH--</option>
                                    <option value="all">--ALL--</option>
                                    <?php foreach ($tahun as $t) { ?>
                                        <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
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