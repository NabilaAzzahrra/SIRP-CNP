<style>
    .card-header {
        background-color: #0073BD;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    .btn-danger {
        background-color: #ED1C24;
    }
</style>
<div class="card card-primary">
    <div class="card-body">
        <form name="form" action="<?= base_url('Master/fb') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <select name="id_perusahaan" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Perusahaan" onchange="return getPerusahaan()">
                    <option value="">--PILIH--</option>
                    <?php foreach ($perusahaan as $p) { ?>
                        <option value="<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></option>
                    <?php } ?>
                </select>
                <?= form_error('nama_perusahaan', '<div class="test-small text-danger">', '</div>'); ?>
            </div>
            <span id="data-perusahaan"></span>
            <div class="form-group">
                <label>Melalui</label>
                <select name="melalui" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Via">
                    <option value="">--PILIH--</option>
                    <option value="Email">Email</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Kunjungan">Kunjungan</option>
                </select>
                <?= form_error('melalui', '<div class="test-small text-danger">', '</div>'); ?>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Tanggal Feedback</label>
                    <input type="date" name="tanggal_fu" class="form-control" placeholder="Tanggal Feedback" maxlength="50">
                    <?= form_error('tanggal_fu', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-8">
                    <label>Hasil Feedback</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="hasil_feedback" class="form-control" placeholder="Hasil Feedback" maxlength="50">
                    <?= form_error('hasil_feedback', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" onclick="return sembunyikan()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#bk").hide();
        $("#bi").hide();
        $("#status").change(function() {
            var _this = $(this);
            if (_this.val() == 'Bekerja') {
                $("#bk").show();
                $("#bi").hide();
            } else if (_this.val() == 'Berwirausaha') {
                $("#bi").show();
                $("#bk").hide();
            } else {
                $("#bk").hide();
                $("#bi").hide();
            }
        });

    });
</script>
<script>
    function getKota() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-kota').load("getKota?id_perusahaan=" + id, function() {
            //$('[name="kota"]').val(kota)
        });
    }

    function sembunyikan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-kota').load("getKota?id_perusahaan=" + id, function() {
            $('[name="kota"]').addClass('d-none');
        });
    }

    function getPerusahaan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-perusahaan').load("getPerusahaan?id_perusahaan=" + id, function() {
            $('[name="alamat"]').val(alamat)
            $('[name="bidang"]').val(bidang)
            $('[name="kontak_person"]').val(kontak_person)
            $('[name="jabatan"]').val(jabatan)
            $('[name="no_telp"]').val(no_telp)
        });
    }

</script>