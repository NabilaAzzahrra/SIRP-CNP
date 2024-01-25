<?php
if ($getKelas != null) {
    foreach ($getKelas as $g) {
?>
        <input type="text" class="form-control d-none" name="kelas" value="<?= $g->kelas ?>" readonly>
        <div class="form-group">
            <label name="prodi">Prodi</label>
            <div class="input-group">
                <input type="text" class="form-control" name="prodi" value="<?= $g->prodi ?>" readonly>
            </div>
        </div>
    <?php }
} else { ?>
    <input type="text" class="form-control d-none" name="kelas" value="" readonly>
    <div class="form-group">
        <label name="prodi">Prodi</label>
        <div class="input-group">
            <input type="text" class="form-control" name="prodi" value="" readonly>
        </div>
    </div>
<?php } ?>