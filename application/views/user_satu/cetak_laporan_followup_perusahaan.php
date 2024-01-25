<!DOCTYPE html>


<body class="A4 landscape">
    <div class="sheet">
        <table class="text-center mt-10 mb-2" align="center">
            <td>
                <pre><img src="https://plb.ac.id/new/wp-content/uploads/2022/01/logo-Politeknik-LP3I.png" width="110px" height="110px"></pre>
            </td>
            <td class="text-center" align="center">
                <h1>C&P Politeknik LP3I Kampus Tasikmalaya</h1>
                <h4 class="text-center">Jalan Ir. H. Juanda KM. 2 No. 106, Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151 Telepon: (0265) 311766</h4>
            </td>
        </table>

        <hr noshade size=4 width="98%">

        <div style="width:100%" align="center">
            <h2>Laporan Feedback</h2>
        </div>
        <div>
            <table border="1" cellspacing="0" cellpadding="5" style="margin:auto">
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
                    $totaldata = "";
                    foreach ($telleseling as $t) {
                        $totaldata = count($telleseling);
                    ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t->nama_perusahaan ?></td>
                        <td><?= $t->bidang ?></td>
                        <td><?= $t->kota ?></td>
                        <td><?= $t->tanggal_fu ?></td>
                        <td><?= $t->hasil_fu ?></td>
                        <td><?= $t->melalui ?></td>
                        <td><?= $t->tanggal_feedback ?></td>
                        <td><?= $t->hasil_feedback ?></td>
                        <td><?= $t->feedback_melalui ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>
        </div>
        <table>
            <tr class="text-bold">
                <td class="text-center" align="center" colspan="11">TOTAL DATA</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= $totaldata ?></td>
            </tr>
        </table>
        <table align="right" width="30%"><br>
            <tr class="text-center" align="center">
                <td>Tasikmalaya, <?= date('d/m/Y'); ?></td>
            </tr>
            <tr class="text-center" align="center">
                <td><b>Kepala Bidang Kerjasama dan Penempatan</b></td>
            </tr>
            <tr>
                <td><br><br><br><br></td>
            </tr>
            <tr class="text-center" align="center">
                <td><b>Asep Dadan Suhendar, S.E., M.M. </b></td>
            </tr>
            <tr class="text-center" align="center">
                <td>NIK. 201526103</td>
            </tr>
        </table>

    </div>

</body>
<script>
    window.print();
</script>