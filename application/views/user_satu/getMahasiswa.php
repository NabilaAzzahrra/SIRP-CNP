<?php
if ($getMahasiswa != null) {
    foreach ($getMahasiswa as $gm) {
?>
        <input type="text" class="form-control d-none" name="nama_mhs" value="<?= $gm->nama_mhs ?>" readonly>
        <div class="row">
            <div id="nim" class="form-group col-md-2">
                <label>NIM</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="nim" value="<?= $gm->nim ?>" readonly>
                </div>
            </div>
            <div id="kel" class="form-group col-md-2">
                <label>Kelas</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="kelas" value="<?= $gm->kelas ?>" readonly>
                </div>
            </div>
            <div id="kel" class="form-group col-md-3">
                <label>Prodi</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="prodi" value="<?= $gm->prodi ?>" readonly>
                </div>
            </div>
            <div id="as" class="form-group col-md-4">
                <label>Asal Sekolah</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="asal_sekolah" value="<?= $gm->asal_sekolah ?>" readonly>
                </div>
            </div>
            <div id="as" class="form-group col-md-4">
                <label>Tahun Akademik</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="tahun_akademik" value="<?= $gm->tahun_akademik ?>" readonly>
                </div>
            </div>
        </div>
    <?php }
} else { ?>
    <input type="text" class="form-control d-none" name="nama_mhs" value="" readonly>
    <div class="row">
        <div id="nim" class="form-group col-md-2">
            <label>NIM</label>
            <div class="input-group">
                <input type="number" class="form-control" name="nim" value=" " readonly>
            </div>
        </div>
        <div id="kel" class="form-group col-md-2">
            <label>Kelas</label>
            <div class="input-group">
                <input type="text" class="form-control" name="kelas" value=" " readonly>
            </div>
        </div>
        <div id="kel" class="form-group col-md-3">
            <label>Prodi</label>
            <div class="input-group">
                <input type="text" class="form-control" name="prodi" value=" " readonly>
            </div>
        </div>
        <div id="as" class="form-group col-md-4">
            <label>Asal Sekolah</label>
            <div class="input-group">
                <input type="text" class="form-control" name="asal_sekolah" value=" " readonly>
            </div>
        </div>
        <div id="as" class="form-group col-md-4">
                <label>Tahun Akademik</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="tahun_akademik" value="" readonly>
                </div>
            </div>
    <?php } ?>