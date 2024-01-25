<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form id="Modal" action="<?= base_url('User_dua/cetak_laporan_status_mahasiswa'); ?>" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Prodi</label>
                                <select name="prodi" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Prodi" required>
                                    <option value="">--PILIH--</option>
                                    <?php foreach ($prodi as $p) { ?>
                                        <option value="<?= $p->prodi ?>"><?= $p->prodi ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Status" required>
                                    <option value="">--PILIH--</option>
                                    <?php foreach ($status as $s) { ?>
                                        <option value="<?= $s->status ?>"><?= $s->status ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select name="tahun_akademik" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Tahun Akademik" required>
                                    <option value="">--PILIH--</option>
                                    <?php foreach ($tahun_akademik as $t) { ?>
                                        <option value="<?= $t->tahun_akademik ?>"><?= $t->tahun_akademik ?></option>
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