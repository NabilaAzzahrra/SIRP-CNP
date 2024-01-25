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
            <h2>Laporan Penerima Lulusan</h2>
        </div>
        <div>
            <table border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Perusahaan</th>
                        <th rowspan="2">Wilayah</th>
                        <th rowspan="2">Tingkat</th>
                        <?php for ($i = $_GET['dari']; $i <= $_GET['sampai']; $i++) {
                        ?>
                            <th colspan="2"><?= $i ?></th>
                        <?php } ?>
                        <th rowspan="2">Jumlah Magang</th>
                        <th rowspan="2">Jumlah Kerja</th>
                    </tr>
                    <tr>
                        <?php for ($i = $_GET['dari']; $i <= $_GET['sampai']; $i++) {
                        ?>
                            <th>Magang</th>
                            <th>Kerja</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $nom = 1;
                    $totaldata = "";
                    $totalsbelum = 0;
                    foreach ($penerimaan as $d) {
                        $jumlah = 0;
                        for ($i = $_GET['dari']; $i <= $_GET['sampai']; $i++) {
                            $this->db->select('count(case when status = "KKI" then 1 end) as magang, count(case when status = "Kerja" then 1 end) as kerja');
                            $this->db->join('ht_permintaan', 'ht_permintaan.id_permintaan = dt_permintaan.id_permintaan');
                            $this->db->group_by('id_perusahaan');
                            $select = $this->db->get_where('dt_permintaan', array('id_perusahaan' => $d->id_perusahaan, 'tahun_akademik' => $i))->result();
                            $jumlah+=count($select);
                        }
                        if ($jumlah==0) {
                            continue;
                        }
                        $totaldata = count($penerimaan);
                        //$select = $this->db->select('count(case when status = "KKI" then 1 when status = "OJT" then 1 end) as magang, count(case when status = "Kerja" then 1 end) as kerja');
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d->nama_perusahaan ?></td>
                            <td><?= $d->kota ?></td>
                            <td><?= $d->tingkat ?></td>
                            <?php
                            $jml_magang = 0;
                            $jml_kerja = 0;
                            for ($i = $_GET['dari']; $i <= $_GET['sampai']; $i++) {
                                $this->db->select('count(case when status = "KKI" then 1 end) as magang, count(case when status = "Kerja" then 1 end) as kerja');
                                $this->db->join('ht_permintaan', 'ht_permintaan.id_permintaan = dt_permintaan.id_permintaan');
                                $this->db->group_by('id_perusahaan');
                                $select = $this->db->get_where('dt_permintaan', array('id_perusahaan' => $d->id_perusahaan, 'tahun_akademik' => $i))->result();
                                if (count($select) == 0) {
                                    echo '<td>0</td>';
                                    echo '<td>0</td>';
                                }
                                foreach ($select as $s) {
                                    $jml_magang += $s->magang;
                                    $jml_kerja += $s->kerja;
                                     ?>
                                    <td><?= $s->magang ?></td>
                                    <td><?= $s->kerja ?></td>
                            <?php }
                            } ?>
                            <td><?=$jml_magang?></td>
                            <td><?=$jml_kerja?></td>
                        </tr>
                    <?php
                    } 
                    ?>
                </tbody>
            </table><br>
        </div>
        <table align="right" width="30%"><br>
            <tr class="text-center" align="center">
                <td>Tasikmalaya, <?= date('d/m/Y'); ?></td>
            </tr>
            <tr class="text-center" align="center">
                <td><b>Kepala Bidang C&P</b></td>
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
    //window.print();
</script>