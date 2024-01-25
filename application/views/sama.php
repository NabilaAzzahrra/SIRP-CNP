<span id="modal-body-add">
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
            <input type="date" name="tanggal_feedback" class="form-control" placeholder="Tanggal Feedback" maxlength="50">
            <?= form_error('tanggal_feedback', '<div class="test-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group col-md-8">
            <label>Hasil Feedback</label>
            <input type="text" name="hasil_feedback" class="form-control" placeholder="Hasil Feedback" maxlength="50">
            <?= form_error('hasil_feedback', '<div class="test-small text-danger">', '</div>'); ?>
        </div>
    </div>
</span>