<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form id="Modal" action="<?= base_url('User_dua/cetak_laporan_permintaan_perusahaan'); ?>" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Perusahaan</label>
                                <select name="id_perusahaan" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Perusahaan" required>
                                    <option value="all">--ALL--</option>
                                    <?php foreach ($perusahaan as $p) { ?>
                                        <option value="<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></option>
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