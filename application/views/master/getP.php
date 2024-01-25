<?php
if ($getP != null) {
    foreach ($getP as $g) {
?>
        <input type="text" class="form-control d-none" name="nama_perusahaan" value="<?= $g->nama_perusahaan ?>" readonly>
        <div class="row">
            <div id="al" class="form-group col-md-4">
                <label name="alamat">Alamat</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="alamat" value="<?= $g->alamat ?>" readonly>
                </div>
            </div>
            <div id="al" class="form-group col-md-3">
                <label name="kota">Kota</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="kota" value="<?= $g->kota ?>" readonly>
                </div>
            </div>
            <div id="bi" class="form-group col-md-2">
                <label name="bidang">Bidang</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="bidang" value="<?= $g->bidang ?>" readonly>
                </div>
            </div>
            <div id="ko" class="form-group col-md-3">
                <label name="kontak_person">Kontak Person</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="kontak_person" value="<?= $g->kontak_person ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="ja" class="form-group col-md-3">
                <label name="jabatan">Jabatan</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="jabatan" value="<?= $g->jabatan ?>" readonly>
                </div>
            </div>
            <div id="no" class="form-group col-md-3">
                <label name="no_telp">No HP/Telepon</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="no_telp" value="<?= $g->no_telp ?>" readonly>
                </div>
            </div>
            <div id="relasi" class="form-group col-md-3">
                <label name="relasi">Relasi</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="relasi" value="<?= $g->relasi ?>" readonly>
                </div>
            </div>
        </div>
    <?php }
} else { ?>
    <input type="text" class="form-control d-none" name="nama_perusahaan" value="" readonly>
    <div class="row">
        <div id="al" class="form-group col-md-4">
            <label name="alamat">Alamat</label>
            <div class="input-group">
                <input type="text" class="form-control" name="alamat" value="" readonly>
            </div>
        </div>
        <div id="bi" class="form-group col-md-2">
            <label name="bidang">Bidang</label>
            <div class="input-group">
                <input type="text" class="form-control" name="bidang" value="" readonly>
            </div>
        </div>
        <div id="ko" class="form-group col-md-3">
            <label name="kontak_person">Kontak Person</label>
            <div class="input-group">
                <input type="text" class="form-control" name="kontak_person" value="" readonly>
            </div>
        </div>
        <div id="ja" class="form-group col-md-3">
            <label name="jabatan">Jabatan</label>
            <div class="input-group">
                <input type="text" class="form-control" name="jabatan" value="" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="no" class="form-group col-md-3">
            <label name="no_telp">No HP/Telepon</label>
            <div class="input-group">
                <input type="text" class="form-control" name="no_telp" value="" readonly>
            </div>
        </div>
        <div id="relasi" class="form-group col-md-3">
            <label name="relasi">Relasi</label>
            <div class="input-group">
                <input type="text" class="form-control" name="relasi" value="" readonly>
            </div>
        </div>
    </div>
<?php } ?>