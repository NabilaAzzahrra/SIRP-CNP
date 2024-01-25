<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Bidang</th>
                    <th>Kota</th>
                    <th>Tanggal Follow Up</th>
                    <th>Follow Up</th>
                    <th>Follow Up Melalui</th>
                    <th>Tanggal Feedback</th>
                    <th>Hasil Feedback</th>
                    <th>Feedback Melalui</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($telleseling as $t) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>user_satu/telleseling_id?id_telleseling=<?= $t->id_telleseling ?>"><?= $t->nama_perusahaan ?></a></td>
                        <td><?= $t->bidang ?></td>
                        <td><?= $t->kota ?></td>
                        <td><?= $t->tanggal_fu ?></td>
                        <td><?= $t->hasil_fu ?></td>
                        <td><?= $t->melalui ?></td>
                        <td><?= $t->tanggal_feedback ?></td>
                        <td><?= $t->hasil_feedback ?></td>
                        <td><?= $t->feedback_melalui ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#hari").hide();
        $("#juga").hide();
        $("#isinya").change(function() {
            var _this = $(this);
            if (_this.val() == 'Sudah') {
                $("#hari").hide();
                $("#juga").hide();
            } else {
                $("#hari").show();
                $("#juga").show();
            }
        });

    });
</script>