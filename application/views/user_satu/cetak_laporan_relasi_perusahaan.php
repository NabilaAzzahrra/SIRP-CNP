<!DOCTYPE html>
<html lang="id-ID">


<body class="m-md-5">
    <table class="text-center" align="center">
        <td>
            <pre><img src="https://plb.ac.id/new/wp-content/uploads/2022/01/logo-Politeknik-LP3I.png" width="110px" height="110px"></pre>
        </td>
        <td class="text-center" align="center">
            <h1>RE Politeknik LP3I Kampus Tasikmalaya</h1>
            <h4>Jalan Ir. H. Juanda KM. 2 No. 106, Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151 Telepon: (0265) 311766</h4>
        </td>
    </table>
    <hr noshade size=4 width="98%">
    <div class="text-center" align="center">
        <h3 class="text-bold">Laporan Relasi Perusahaan</h3>
    </div>
    <div class="">
        <table id="tabelku" border="1" class="table table-bordered" align="center" width="100%">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Relasi</th>
                    <th class="text-center">Bidang</th>
                    <th class="text-center">Type Perusahaan</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Fax</th>
                    <th class="text-center">Kode Pos</th>
                    <th class="text-center">Kontak Person</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">No Telepon</th>
                    <th class="text-center">Tingkat</th>
                    <th class="text-center">MOU</th>
                    <th class="text-center">Tanggal Mulai</th>
                    <th class="text-center">Tanggal Berakhir</th>
                    <th class="text-center">Sumber</th>
                    <th class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_perusahaan = "";
                foreach ($perusahaan as $d) {
                    $total_perusahaan = count($perusahaan);
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->nama_perusahaan ?></td>
                        <td><?= $d->bidang ?></td>
                        <td><?= $d->relasi ?></td>
                        <td><?= $d->type_perusahaan ?></td>
                        <td><?= $d->alamat ?></td>
                        <td><?= $d->kota ?></td>
                        <td><?= $d->email ?></td>
                        <td><?= $d->fax ?></td>
                        <td><?= $d->kode_pos ?></td>
                        <td><?= $d->kontak_person ?></td>
                        <td><?= $d->jabatan ?></td>
                        <td><?= $d->no_telp ?></td>
                        <td><?= $d->tingkat ?></td>
                        <td><?= $d->sudah_mou ?></td>
                        <td><?= $d->tanggal_mulai ?></td>
                        <td><?= $d->tanggal_berakhir ?></td>
                        <td><?= $d->sumber ?></td>
                        <td><?= $d->ket ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table><br>
        <table>
            <tr class="text-bold">
                <td class="text-center" align="center" colspan="11">TOTAL DATA</td>
                <td> : </td>
                <td class="text-center" align="center" colspan="10"><?= $total_perusahaan ?></td>
            </tr>
        </table>
    </div>
    <table class="right" align="right" width="30%"><br>
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
</body>
<script>
    window.print();
</script>

</html>