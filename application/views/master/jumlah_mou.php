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
            <h2>Laporan MOU</h2>
        </div>
        <div>
            <table border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">Bidang</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Kota</th>
                        <th class="text-center">Kontak Person</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">No Telepon</th>
                        <th class="text-center">Tingkat</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Tanggal Berakhir</th>
                        <th class="text-center">Pengurus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $totaldata = "";
                    foreach ($perusahaan as $d) {
                        $totaldata = count($perusahaan);
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d->nama_perusahaan ?></td>
                            <td><?= $d->bidang ?></td>
                            <td><?= $d->alamat ?></td>
                            <td><?= $d->kota ?></td>
                            <td><?= $d->kontak_person ?></td>
                            <td><?= $d->jabatan ?></td>
                            <td><?= $d->no_telp ?></td>
                            <td><?= $d->tingkat ?></td>
                            <td><?= $d->tanggal_mulai ?></td>
                            <td><?= $d->tanggal_berakhir ?></td>
                            <td><?= $d->nama ?></td>
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
                <td>Mengetahui</td>
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