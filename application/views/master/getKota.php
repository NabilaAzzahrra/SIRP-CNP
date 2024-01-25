<?php
if ($getKota != null) {
    foreach ($getKota as $g) {
?>
        <input type="text" class="form-control d-none" name="nama_perusahaan" value="<?= $g->nama_perusahaan ?>" readonly>
        <div id="ko" class="form-group">
            <label name="kota">Kota</label>
            <div class="input-group">
                <input type="text" class="form-control" name="kota" value="<?= $g->kota ?>" readonly>
            </div>
        </div>
    <?php }
} else { ?>
    <input type="text" class="form-control d-none" name="nama_perusahaan" value="" readonly>
    <div id="ko" class="form-group ">
        <label name="kota">Kota</label>
        <div class="input-group">
            <input type="text" class="form-control" name="kota" value="" readonly>
        </div>
    </div>
<?php } ?>