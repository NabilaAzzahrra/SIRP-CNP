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

            <h2>Laporan Mahasiswa Sudah Bekerja</h2>
            <h4>Prodi : <?= $prodi ?></h4>
            <h4>Tahun Akademik : <?= $tahunakademik ?></h4>
            <h4>Status : <?= $status ?></h4>

        </div>
        <div>
            <table border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                <thead>
                    <tr>
                        <th class="text sm">No</th>
                        <th>NIM</th>
                        <th>Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Kelas</th>
                        <th>No HP</th>
                        <th>Perusahaan</th>
                        <th>Tanggal Mulai</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                        <th>Kota</th>
                        <th>Keterangan</th>
                        <th>Tahun Akademik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $totalmahasiswa = "";
                    foreach ($mahasiswa as $d) {
                        $totalmahasiswa = count($mahasiswa);
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d->nim ?></td>
                            <td><?= $d->nama_mhs ?></td>
                            <td><?= $d->prodi ?></td>
                            <td><?= $d->kelas ?></td>
                            <td><?= $d->no_hp ?></td>
                            <td><?= $d->nama_perusahaan ?></td>
                            <td><?= $d->tanggal_mulai ?></td>
                            <td><?= $d->posisi ?></td>
                            <td><?= $d->gaji ?></td>
                            <td><?= $d->kota ?></td>
                            <td><?= $d->ket ?></td>
                            <td><?= $d->tahun_akademik ?></td>
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
                <td class="text-center" align="center" colspan="10"><?= $totalmahasiswa ?></td>
            </tr>
        </table>
        <table align="right" width="30%"><br>
            <tr class="text-center" align="center">
                <td>Tasikmalaya, <?= date('d/m/Y'); ?></td>
            </tr>
            <tr class="text-center" align="center">
                <td><b>Kepala Kampus</b></td>
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