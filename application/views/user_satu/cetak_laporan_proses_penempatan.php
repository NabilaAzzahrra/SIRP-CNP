<!DOCTYPE html>
<style>

</style>

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

            <table class="idr">
                <?php

                foreach ($mhs as $d) {
                ?>
                    <tr>
                        <td style="height: 30px; padding-right:100px;">Nama</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->nama_mhs ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">NIM</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->nim ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">Prodi</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->prodi ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">IPK</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->ipk ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">Tahun Akademik</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->tahun_akademik ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">Tahun Lulus</td>
                        <td>:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">Status Penempatan</td>
                        <td>:</td>
                        <td></td>
                        <td id="sts"><?= $d->status_penempatan ?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;">Asal Sekolah</td>
                        <td>:</td>
                        <td></td>
                        <td><?= $d->asal_sekolah ?></td>
                    </tr>
                <?php
                }
                ?>

            </table><br>

        </div>
        <div>
            <table id="tabel_1" border="1" cellspacing="0" cellpadding="5" style="margin:auto;">
                <thead>
                    <tr>
                        <th class="text sm">No</th>
                        <th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">Tanggal Proses</th>
                        <th class="text-center">Posisi Jabatan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Keterangan</th>
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
                            <td><?= $d->nama_perusahaan ?></td>
                            <td><?= $d->tgl_hasil ?></td>
                            <td><?= $d->posisi_yang_dibutuhkan ?></td>
                            <td><?= $d->status ?></td>
                            <td><?= $d->ket ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>

            <table id="tabel_2" border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                <thead>
                    <tr>
                        <th class="text sm">No</th>
                        <th class="text-center a">Nama Usaha</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Omset</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $totalmahasiswa = "";
                    foreach ($usaha as $d) {
                        $totalmahasiswa = count($mahasiswa);
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d->nama_usaha ?></td>
                            <td><?= $d->alamat_usaha ?></td>
                            <td><?= $d->tanggal_mulai ?></td>
                            <td><?= $d->omset ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>

        </div>
        <table align="right" width="30%"><br>
            <tr class="text-center" align="center">
                <td>Tasikmalaya, <?= date('d F Y'); ?></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#sts").val(function() {
            var status_penempatan = $(this);
            if (status_penempatan.val() == 'Belum') {
                $("#krj").style.display='';
                $("#ush").style.display='';
                status_penempatan.val(Belum);
            } else if (status_penempatan.val() == 'Kerja') {
                $("#krj").style.display='';
                $("#ush").style.display='none';
            } else if (status_penempatan.val() == 'Bermasalah') {
                $("#krj").style.display='';
                $("#ush").style.display='none';
            } else if (status_penempatan.val() == 'Gugur') {
                $("#krj").style.display='';
                $("#ush").style.display='none';
            } else if (status_penempatan.val() == 'Berwirausaha') {
                $("#krj").style.display='none';
                $("#ush").style.display='';
            }
        });

    });
</script>
<script type="text/javascript">
    function nama_fungsi() {
        var chosenoption = document.getElementById("pilihan").options[document.getElementById("pilihan").selectedIndex]
        if (chosenoption.value == "1") {
            document.getElementById("tabel_1").style.display = '';
            document.getElementById("tabel_2").style.display = '';
        }
        else if (chosenoption.value == "2") {
            document.getElementById("tabel_1").style.display = '';
            document.getElementById("tabel_2").style.display = 'none';
        }
        else {
            document.getElementById("tabel_1").style.display = 'none';
            document.getElementById("tabel_2").style.display = '';
        }
    }
</script>