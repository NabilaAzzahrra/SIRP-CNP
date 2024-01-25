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
            <h2>Laporan Permintaan</h2>
            <h4><?= date('d/m/Y', strtotime($dari)); ?> s/d <?= date('d/m/Y', strtotime($sampai)); ?><br></h4>
        </div>
        <div>
            <table border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Perusahaan</th>
                        <th rowspan="2">Bidang</th>
                        <th rowspan="2">Kota</th>
                        <th rowspan="2">Relasi</th>
                        <th rowspan="2">PIC</th>
                        <th rowspan="2">No Telepon</th>
                        <th rowspan="2">Posisi yang dibutuhkan</th>
                        <th colspan="2">Kandidat</th>
                        <th rowspan="2">Hasil</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $nom = 1;
                    $totaldata = "";
                    $totalsbelum = 0;
                    $id_perusahaan = "";
                    foreach ($permintaan as $d) {
                        $totaldata = count($permintaan);
                        //$totalsbelum = count($permintaan);
                        if ($id_perusahaan == $d->id_perusahaan) {
                    ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?= $d->nama_mhs ?></td>
                            <td><?= $d->kelas ?></td>
                            <td><?= $d->hasil ?></td>
                            <td><?= $d->status ?></td>
                            <td><?= $d->ket_lain ?></td>
                        </tr>
                    <?php
                    }else{
                        $id_perusahaan = $d->id_perusahaan;
                    ?>
                    <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d->nama_perusahaan ?></td>
                            <td><?= $d->bidang ?></td>
                            <td><?= $d->kota ?></td>
                            <td><?= $d->relasi ?></td>
                            <td><?= $d->kontak_person ?></td>
                            <td><?= $d->no_telp ?></td>
                            <td><?= $d->posisi_yang_dibutuhkan ?></td>
                            <td><?= $d->nama_mhs ?></td>
                            <td><?= $d->kelas ?></td>
                            <td><?= $d->hasil ?></td>
                            <td><?= $d->status ?></td>
                            <td><?= $d->ket_lain ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>
        </div>
                <table>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">TOTAL PERUSAHAAN</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($pr) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">TOTAL MAHASISWA</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= $totaldata ?></td>
            </tr>
            <tr>
                <td>HASIL PROSES</td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">BELUM</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hbelum) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">CANCEL</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hcancel) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">DITERIMA KKI</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hkki) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">LOLOS TES</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hlolos) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">GAGAL TES</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hgagal) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">MENOLAK</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($hmenolak) ?></td>
            </tr>
            <tr class="text-bold">
                <td class="text-left" align="left" colspan="11">TIDAK DATANG TES</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= count($htdkdatang) ?></td>
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