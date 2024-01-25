<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models');
        if (!$this->session->userdata('status_login')) {
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status_login');
        $this->session->set_flashdata('logout', TRUE);
        redirect('Auth');
    }

    public function sidebar()
    {
        $data = array(
            'laporan_status_mahasiswa' => "",
            'laporan_status_mahasiswa_dot' => "",
            'laporan_p_tanggal' => "",
            'laporan_p_tanggal_dot' => "",
            'laporan_permintaan_perusahaan' => "",
            'laporan_permintaan_perusahaan_dot' => "",
            'laporan_relasi_perusahaan' => "",
            'laporan_relasi_perusahaan_dot' => "",
            'laporan_followup_perusahaan' => "",
            'laporan_followup_perusahaan_dot' => "",
            'akumulasi' => "",
            'akumulasi_dot' => "",
            'fu' => "",
            'fu_dot' => "",
            'pilih_perusahaan' => "",
            'pilih_perusahaan_dot' => "",
            'presentase_penempatan' => "",
            'presentase_penempatan_dot' => "",
            'breakdown_bulan' => "",
            'breakdown_bulan_dot' => "",
            'breakdown' => "",
            'breakdown_dot' => "",
            'belum_kerja' => "",
            'belum_kerja_dot' => "",
            'pilih_grafik' => "",
            'pilih_grafik_dot' => "",
            'pilih_target' => "",
            'pilih_target_dot' => "",
            'serapan' => "",
            'serapan_dot' => "",
            'usrr' => "",
            'usrr_dot' => "",
            'master_prodi' => "",
            'master_prodi_dot' => "",
            'kelas' => "",
            'kelas_dot' => "",
            'prodi' => "",
            'prodi_dot' => "",
            'mou' => "",
            'mou_dot' => "",
            'pilih_permintaan' => "",
            'pilih_permintaan_dot' => "",
            'pilih_followup' => "",
            'pilih_followup_dot' => "",
            'pilih_rekapitulasi' => "",
            'pilih_rekapitulasi_dot' => "",
            'pilih_serapan' => "",
            'pilih_serapan_dot' => "",
            'laporan_followup' => "",
            'laporan_followup_dot' => "",
            'laporan_feedback' => "",
            'laporan_feedback_dot' => "",

            'dashboard' => "close",
            'dashboard_status' => "",
            'mahasiswa' => "close",
            'mahasiswa_status' => "",
            'master' => "close",
            'master_status' => "",
            'user' => "close",
            'user_status' => "",
            'rekap' => "close",
            'rekap_status' => "",
            'perusahaan' => "close",
            'perusahaan_status' => "",
            'telleseling' => "close",
            'telleseling_status' => "",
            'permintaan' => "close",
            'permintaan_status' => "",
        );

        $this->session->set_userdata($data);
    }


    public function index()
    {
        $this->sidebar();
        $data = array(
            'dashboard' => "open",
            'dashboard_status' => " active",
        );
        $this->session->set_userdata($data);

        /* $GetFeedback = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_accept) as Total_Feedback FROM telleseling');

        foreach ($GetFeedback->result() as $f) {
            if ($f->Total_Feedback == NULL && $f->feedback == NULL && $f->tanggal_accept == NULL && $f->oleh == NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  'Belum Accept' WHERE id_telleseling = '" . $f->id_telleseling . "'");
                $this->db->query("UPDATE telleseling SET tf = 'Belum Accept' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->Total_Feedback <= 3 && $f->oleh !=  NULL && $f->feedback_oleh == NULL && $f->tanggal_accept != NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  '+ $f->Total_Feedback hari' WHERE id_telleseling = '" . $f->id_telleseling . "'");
                $this->db->query("UPDATE telleseling SET tf = '$f->Total_Feedback' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->Total_Feedback >= 5 && $f->oleh !=  NULL && $f->feedback_oleh == NULL && $f->tanggal_accept != NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  '+ $f->Total_Feedback hari' WHERE id_telleseling = '" . $f->id_telleseling . "'");
                $this->db->query("UPDATE telleseling SET tf = '$f->Total_Feedback' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->feedback_oleh != NULL) {
                $this->db->query("UPDATE telleseling SET feedback = 'Sudah' WHERE id_telleseling = '" . $f->id_telleseling . "'");
                $this->db->query("UPDATE telleseling SET tf = 'Sudah' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            }
        }*/

        $GetData = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_fu) as Total_Hari FROM telleseling');

        foreach ($GetData->result() as $p) {
            $this->db->query("UPDATE telleseling SET jumlah_hari =  '$p->Total_Hari' WHERE id_telleseling = '" . $p->id_telleseling . "'");
        }

        $GetTanda = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_penanda_fu) as Total_Hari FROM telleseling');

        foreach ($GetTanda->result() as $p) {
            $this->db->query("UPDATE telleseling SET jumlah_hari_penanda_fu =  '$p->Total_Hari' WHERE id_telleseling = '" . $p->id_telleseling . "'");
        }

        $data['title'] = 'Dashboard';

        $select = $this->db->select('*');
        $select = $this->db->where('relasi = ', 'baru');
        $data['baru'] = $this->Models->Get_All('perusahaan', $select);

        /*$select = $this->db->select('*');
        $select = $this->db->where('status = ', 'Belum');
        $data['belumk'] = $this->Models->Get_All('mahasiswa', $select);
        $select = $this->db->where('status = ', 'Bekerja');
        $data['bekerja'] = $this->Models->Get_All('mahasiswa', $select);
        $select = $this->db->where('status = ', 'Bermasalah');
        $data['bermasalah'] = $this->Models->Get_All('mahasiswa', $select);
        $select = $this->db->where('status = ', 'Gugur');
        $data['gugur'] = $this->Models->Get_All('mahasiswa', $select);
        $select = $this->db->where('status = ', 'berwirausaha');
        $data['berwirausaha'] = $this->Models->Get_All('mahasiswa', $select);*/

        // $select = $this->db->where('status = ', 'Belum');
        $data['belum'] = $this->Models->Get_All('telleseling', $select);
        //$select = $this->db->where('status = ', 'Segera');
        $data['segera'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->select('*');
        $lama = $this->db->where('relasi = ', 'lama');
        $data['lama'] = $this->Models->Get_All('perusahaan', $select, $lama);

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        //$data['ht_permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        //----FOLLOW UP----//
        // $data['followup'] = $this->Models->Get_All('telleseling', $select);

        //----BATAS WAKTU FOLLOW UP----//
        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->select('*');
        // $select = $this->db->where('feedback_oleh = ', NULL);
        $data['feedback'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->select('*');
        //$select = $this->db->where('feedback_oleh != ', NULL);
        $data['list_fb'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        //INI DASHBOARD AWAL//
        $select = $this->db->select('*');
        $select = $this->db->where('tanggal_penanda_fu = ', NULL);
        $select = $this->db->order_by('tanggal_fu', 'DESC');
        $select = $this->db->group_by('id_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);

        /*$select = $this->db->select('*, telleseling.id_telleseling as id_telleseling');
        $select = $this->db->outerjoin('perusahaan', 'telleseling.id_perusahaan = perusahaan.id_perusahaan');
        $select = $this->db->order_by('tanggal_fu', 'DESC');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        //$data['kelas'] = $this->Models->Get_All('kelas', $select);*/

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        /*$select = $this->db->select('*');
        $select = $this->db->join('telleseling', 'telleseling.id_perusahaan=perusahaan.id_perusahaan');
        $select = $this->db->where('telleseling.tanggal_accept = ', NULL);
        $select = $this->db->where('telleseling.tanggal_feedback = ', NULL);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);*/

        //----BAR CHART----//
        $select = $this->db->select('*');
        $select = $this->db->where('sudah_mou = ', 'Sudah');
        $select = $this->db->where('tanggal_mulai <= ', '2021-12-31');
        $data['sudah_mou'] = $this->Models->Get_All('perusahaan', $select);

        //----BAR CHART----//
        $selectt = $this->db->select('*');
        $selectt = $this->db->where('sudah_mou = ', 'Sudah');
        $selectt = $this->db->where('tanggal_mulai > ', '2021-12-31');
        $data['sudah_mou_juga'] = $this->Models->Get_All('perusahaan', $selectt);

        //----DONUT CHART----//
        $sumber = $this->db->select('*');
        $sumber = $this->db->where('sumber = ', 'Medsos');
        $data['medsos'] = $this->Models->Get_All('perusahaan', $sumber);
        $sumber = $this->db->where('sumber = ', 'Dosen');
        $data['dosen'] = $this->Models->Get_All('perusahaan', $sumber);
        $sumber = $this->db->where('sumber = ', 'Alumni');
        $data['alumni'] = $this->Models->Get_All('perusahaan', $sumber);
        $sumber = $this->db->where('sumber = ', 'Mahasiswa');
        $data['mahasiswa'] = $this->Models->Get_All('perusahaan', $sumber);
        $sumber = $this->db->where('sumber = ', 'Lainnya');
        $data['lainnya'] = $this->Models->Get_All('perusahaan', $sumber);

        $mou = $this->db->select('*');
        $mou = $this->db->where('sudah_mou = ', 'Sudah');
        $data['mou'] = $this->Models->Get_All('perusahaan', $mou);
        $mou = $this->db->where('sudah_mou = ', 'Belum');
        $data['blm_mou'] = $this->Models->Get_All('perusahaan', $mou);
        $mou = $this->db->where('type_perusahaan = ', 'PT');
        $data['pt'] = $this->Models->Get_All('perusahaan', $mou);
        $mou = $this->db->where('type_perusahaan = ', 'CV');
        $data['cv'] = $this->Models->Get_All('perusahaan', $mou);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dashboard');
        $this->load->view('templates/footer');
        //$this->load->view('templates/script');
    }

    public function export_hu()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->Models->Get_All('ht_permintaan');
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nis);
            $sheet->setCellValue('C' . $numrow, $data->nama);
            $sheet->setCellValue('D' . $numrow, $data->jenis_kelamin);
            $sheet->setCellValue('E' . $numrow, $data->alamat);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Siswa");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $sheet->setCellValue('A1', "DATA PERMINTAAN");
        $sheet->mergeCells('A1:N1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "Perusahaan");
        $sheet->setCellValue('C3', "Bidang");
        $sheet->setCellValue('D3', "Kota");
        $sheet->setCellValue('E3', "Relasi");
        $sheet->setCellValue('F3', "PIC");
        $sheet->setCellValue('G3', "No Telepon");
        $sheet->setCellValue('H3', "Posisi yang dibutuhkan");
        $sheet->setCellValue('I3', "No");
        $sheet->setCellValue('J3', "Mahasiswa");
        $sheet->setCellValue('K3', "Kelas");
        $sheet->setCellValue('L3', "Hasil");
        $sheet->setCellValue('M3', "Status");
        $sheet->setCellValue('N3', "Keterangan");

        $sheet->getStyle('A3:N3')->applyFromArray($style_col);

        $permintaan = $this->db->get('ht_permintaan'); // Ganti dengan model dan metode yang sesuai

        $no = 1;
        $numrow = 4;
        foreach ($permintaan as $d) {
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $d->nama_perusahaan);
            $sheet->setCellValue('C' . $numrow, $d->bidang);
            $sheet->setCellValue('D' . $numrow, $d->kota);
            $sheet->setCellValue('E' . $numrow, $d->relasi);
            $sheet->setCellValue('F' . $numrow, $d->kontak_person);
            $sheet->setCellValue('G' . $numrow, $d->no_telp);
            $sheet->setCellValue('H' . $numrow, $d->posisi_yang_dibutuhkan);
            $sheet->setCellValue('I' . $numrow, $no);
            $sheet->setCellValue('J' . $numrow, $d->nama_mhs);
            $sheet->setCellValue('K' . $numrow, $d->kelas);
            $sheet->setCellValue('L' . $numrow, $d->hasil);
            $sheet->setCellValue('M' . $numrow, $d->status);
            $sheet->setCellValue('N' . $numrow, $d->ket_lain);

            $sheet->getStyle('A' . $numrow . ':N' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Siswa");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Permintaan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function telleseling_detail()
    {
        $data['title'] = 'Detail Follow Up';
        $data['id'] = $_GET['id_perusahaan'];

        $select = $this->db->where('telleseling.id_perusahaan ', $data['id']);
        //$select = $this->db->order_by('tanggal_fu', 'DESC');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->where('telleseling.id_perusahaan ', $data['id']);
        $select = $this->db->order_by('tanggal_fu', 'DESC');
        $data['daftar'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        /*$select = $this->db->select('*, telleseling.id_telleseling as id_telleseling');
        $select = $this->db->join('perusahaan', 'telleseling.id_perusahaan = perusahaan.id_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);*/

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/telleseling_detail', $data);
        $this->load->view('templates/footer');
    }


    public function mahasiswa()
    {

        $thn = "all";
        $prodi = "all";

        if (isset($_GET['thn'])) {
            $thn = $_GET['thn'];
        }
        if (isset($_GET['prodi'])) {
            $prodi = $_GET['prodi'];
        }

        $this->sidebar();
        $data = array(
            'mahasiswa' => "open",
            'mahasiswa_status' => " active",
        );
        $this->session->set_userdata($data);

        $Getnull = $this->db->query('SELECT * FROM mahasiswa ORDER BY nim;');
        /*foreach ($Getnull->result() as $p) {
            if ($p->ipk2 == 0.00 && $p->ipk3 == 0.00 && $p->ipk4 == 0.00 && $p->ipk5 == 0.00 && $p->ipk6 == 0.00) {
                $totipk = $p->ipk1;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->ipk3 == 0.00 && $p->ipk4 == 0.00 && $p->ipk5 == 0.00 && $p->ipk6 == 0.00) {
                $totipk = ($p->ipk1 + $p->ipk2) / 2;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->ipk4 == 0.00 && $p->ipk5 == 0.00 && $p->ipk6 == 0.00) {
                $totipk = ($p->ipk1 + $p->ipk2 + $p->ipk3) / 3;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->ipk5 == 0.00 && $p->ipk6 == 0.00) {
                $totipk = ($p->ipk1 + $p->ipk2 + $p->ipk3 + $p->ipk4) / 4;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->ipk6 == 0.00) {
                $totipk = ($p->ipk1 + $p->ipk2 + $p->ipk3 + $p->ipk4 + $p->ipk5) / 5;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->ipk1 != 0.00 && $p->ipk2 != 0.00 && $p->ipk3 != 0.00 && $p->ipk4 != 0.00 && $p->ipk5 != 0.00 && $p->ipk6 != 0.00) {
                $totipk = ($p->ipk1 + $p->ipk2 + $p->ipk3 + $p->ipk4 + $p->ipk5 + $p->ipk6) / 6;
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            }
        }*/

        foreach ($Getnull->result() as $p) {
            if ($p->prodi == 'MANAJEMEN INFORMATIKA' && $p->kelas == 'MI20A') {
                $totipk = 1;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'ADMINISTRASI BISNIS' && $p->kelas == 'AB13A') {
                $totipk = 2;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'ADMINISTRASI BISNIS' && $p->kelas == 'AB13B') {
                $totipk = 3;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'ADMINISTRASI BISNIS' && $p->kelas == 'AB13C') {
                $totipk = 4;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'ADMINISTRASI BISNIS' && $p->kelas == 'AB13D') {
                $totipk = 5;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'KOMPUTER AKUNTANSI' && $p->kelas == 'AK17A') {
                $totipk = 6;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'KOMPUTER AKUNTANSI' && $p->kelas == 'AK17B') {
                $totipk = 7;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN INFORMATIKA' && $p->kelas == 'MI19A') {
                $totipk = 8;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN INFORMATIKA' && $p->kelas == 'MI19B') {
                $totipk = 9;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'TEKNIK OTOMOTIF' && $p->kelas == 'TO19A') {
                $totipk = 10;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'TEKNIK OTOMOTIF' && $p->kelas == 'TO19B') {
                $totipk = 11;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'TEKNIK OTOMOTIF' && $p->kelas == 'TO20A') {
                $totipk = 12;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'TEKNIK OTOMOTIF' && $p->kelas == 'TO20B') {
                $totipk = 13;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN PEMASARAN' && $p->kelas == 'MP01RM') {
                $totipk = 14;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN PEMASARAN' && $p->kelas == 'MP01BDM') {
                $totipk = 15;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN PEMASARAN' && $p->kelas == 'MP01ADM') {
                $totipk = 16;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN KEUANGAN DAN PERBANKAN' && $p->kelas == 'MKP01P') {
                $totipk = 17;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN KEUANGAN DAN PERBANKAN' && $p->kelas == 'MKP01K') {
                $totipk = 18;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            } else if ($p->prodi == 'MANAJEMEN INFORMATIKA' && $p->kelas == 'MI20B') {
                $totipk = 1;
                $this->db->query("UPDATE mahasiswa SET id_kelas = '" . $totipk . "' WHERE nim = '" . $p->nim . "'");
            }
        }

        $data['title'] = 'Mahasiswa';
        $id_perusahaan = $this->input->post('id_perusahaan');

        //=======ATASNYA========//

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //=======================//

        //----FILTER----//
        $where = array(
            'tahun_akademik' => $thn,
            'prodi' => $prodi,
        );
        $wheree = array(
            'prodi' => $prodi,
        );
        $pilihthn = array(
            'tahun_akademik' => $thn,
        );
        if ($thn == "all" && $prodi == "all") {
            $select = $this->db->select('*');
            $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);
        } elseif ($thn == "all" && $prodi != "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($wheree, 'mahasiswa');
        } elseif ($thn != "all" && $prodi == "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($pilihthn, 'mahasiswa');
        } else {
            $data['mahasiswa'] = $this->Models->Get_Where($where, 'mahasiswa');
        }
        //--------------//

        // $select = $this->db->where('tahun_akademik6');
        $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('mahasiswa')->result();

        $data['prodi'] = $this->db->group_by('prodi')->get('mahasiswa')->result();

        //$data['mhs'] = $this->db->get('mahasiswa')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function getdata()
    {
        if (!empty($_POST['tahun_akademik'])) {
            $this->db->where('tahun_akademik', $_POST['tahun_akademik']);
        }
        if (!empty($_POST['prodi'])) {
            $this->db->where('prodi', $_POST['prodi']);
        }

        $result = $this->db->get('mahasiswa')->result();

        $data = array();
        $i = 0;
        foreach ($result as $val) {
            $data[] = array(
                $i,
                $val->nim,
                $val->nama_mhs,
                $val->prodi,
                $val->kelas,
                $val->asal_sekolah,
                $val->status,
                $val->tahun_akademik,
            );
            $i++;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    //halaman add
    public function mahasiswa_add()
    {


        $data['title'] = 'Tambah Mahasiswa';

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $select = $this->db->select('*, mahasiswa.nim as nim');
        $select = $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);
        $data['kelas'] = $this->Models->Get_All('kelas', $select);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/mahasiswa_add');
        $this->load->view('templates/footer_mhs');
    }

    //eksekusi
    /*public function mahasiswa_add_aksi()
    {
        $this->_rules();

        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->mahasiswa_add();
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'no_hp' => $this->input->post('no_hp'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ipk' => $this->input->post('ipk'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
            );

            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('nim', $this->input->post('nim'));
            $cek = $this->db->get();
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata('exist', true);
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>NIM telah tersedia, silahkan ganti dengan yang lain</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            } else {
                $this->Models->insert_data($data, 'mahasiswa');
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            }

            redirect('master/mahasiswa');
        }
    }*/

    public function mahasiswa_add_aksi()
    {
        $this->_rules();

        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        /*$Getipk = $this->db->query('SELECT (ipk1+ipk2+ipk3+ipk4+ipk5+ipk6)/6 AS akumulasi_ipk FROM mahasiswa ORDER BY nim;');
        foreach ($Getipk->result() as $p) {
                $this->db->query("UPDATE mahasiswa SET ipk = '" . $Getipk . "' WHERE nim = '" . $p->nim . "'");
        }*/
        /*$Getipk = $this->db->query('SELECT (ipk1+ipk2+ipk3+ipk4+ipk5+ipk6)/6 AS akumulasi_ipk FROM mahasiswa ORDER BY nim;');

        foreach ($GetP->result() as $p) {
            if ($p->Total_Hari > 365) {
                $this->db->query("UPDATE perusahaan SET relasi = 'Lama' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'"); langsung kesini
            } else {
                $this->db->query("UPDATE perusahaan SET relasi = 'Baru' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
            }
        }*/
        if ($this->form_validation->run() == FALSE) {
            $this->mahasiswa_add();
        } else {
            $data = array(
                'nim'                   => $this->input->post('nim'),
                'nama_mhs'              => $this->input->post('nama_mhs'),
                'id_kelas'              => $this->input->post('id_kelas'),
                'prodi'                 => $this->input->post('prodi'),
                'kelas'                 => $this->input->post('kelas'),
                'status_keuangan'       => $this->input->post('status_keuangan'),
                'ipk'                   => $this->input->post('ipk'),
                'status_sidang'         => $this->input->post('status_sidang'),
                'pa'                    => $this->input->post('pa'),
                'request_penempatan'    => $this->input->post('request_penempatan'),
                'jk'                    => $this->input->post('jk'),
                'tempat_lahir'          => $this->input->post('tempat_lahir'),
                'usia'                  => $this->input->post('usia'),
                'dusun'                 => $this->input->post('dusun'),
                'desa'                  => $this->input->post('desa'),
                'kecamatan'             => $this->input->post('kecamatan'),
                'kotkab'                  => $this->input->post('kotkab'),
                'no_hp'                 => $this->input->post('no_hp'),
                'nama_ortu'             => $this->input->post('nama_ortu'),
                'pekerjaan'             => $this->input->post('pekerjaan'),
                'no_hp_ortu'            => $this->input->post('no_hp_ortu'),
                'uk1'                   => $this->input->post('uk1'),
                'uk2'                   => $this->input->post('uk2'),
                'uk3'                   => $this->input->post('uk3'),
                'uk4'                   => $this->input->post('uk4'),
                'asal_sekolah'          => $this->input->post('asal_sekolah'),
                'jurusan'               => $this->input->post('jurusan'),
                'status_penempatan'     => $this->input->post('status_penempatan'),
                'status_detail'         => $this->input->post('status_detail'),
                'ket_penempatan'        => $this->input->post('ket_penempatan'),
                'ket_detail'            => $this->input->post('ket_detail'),
                'tahun_akademik'        => $this->input->post('tahun_akademik'),
                'tahun_lulus'           => $this->input->post('tahun_lulus'),
                'gaji'                  => $this->input->post('gaji'),
                /*'ipk1'                => $this->input->post('ipk1'),
                'ipk2'                  => $this->input->post('ipk2'),
                'ipk3'                  => $this->input->post('ipk3'),
                'ipk4'                  => $this->input->post('ipk4'),
                'ipk5'                  => $this->input->post('ipk5'),
                'ipk6'                  => $this->input->post('ipk6'),
                'ket_mhs'               => $this->input->post('ket_mhs'),*/
            );

            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('nim', $this->input->post('nim'));
            $cek = $this->db->get();
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata('exist', true);
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>NIM telah tersedia, silahkan ganti dengan yang lain</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            } else {
                $this->Models->insert_data($data, 'mahasiswa');
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            }

            redirect('master/mahasiswa');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('kelas', 'Kelas', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('no_hp', 'No HP', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    //halaman detail
    public function mahasiswa_id()
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['nim'] = $_GET['nim'];

        $select = $this->db->join('dt_permintaan', 'mahasiswa.nim=dt_permintaan.nim', 'left');
        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan', 'left');
        $select = $this->db->where('mahasiswa.nim ', $data['nim']);
        $select = $this->db->order_by('ht_permintaan.id_permintaan ', 'DESC');
        $select = $this->db->limit('1');
        $select = $this->db->select('mahasiswa.*, ht_permintaan.*, dt_permintaan.status, dt_permintaan.ket_lain, dt_permintaan.tgl_hasil');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);

        $select = $this->db->select('*');
        $data['kelas'] = $this->Models->Get_All('kelas', $select);

        if (count($data['mahasiswa']) == 0) {
            redirect(base_url('Not_Found'));
        }

        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $select = $this->db->where('nim = ', $data['nim']);
        $data['history'] = $this->Models->Get_All('dt_permintaan', $select);

        // $select = $this->db->join('mahasiswa', 'usaha.nim=mahasiswa.nim');
        $select = $this->db->where('nim = ', $data['nim']);
        $data['usaha'] = $this->Models->Get_All('usaha', $select);


        //print_r($data['mahasiswa']);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/mahasiswa_id', $data);
        $this->load->view('templates/footer_mhs');
    }

    //halaman update
    public function mahasiswa_update()
    {
        $data['title'] = 'Ubah Mahasiswa';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/mahasiswa_update');
        $this->load->view('templates/footer');
    }

    /*public function mahasiswa_update_aksi()
    {
        $where = array(
            'nim' => $this->input->post('nim'),
        );

        if ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'CNP',
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'Sendiri',
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'CNP',
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'Sendiri',
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Gugur' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Gugur',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Gugur' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Gugur',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Bermasalah' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Bermasalah',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Bermasalah' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Bermasalah',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Berwirausaha' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Berwirausaha',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == 'Berwirausaha' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Berwirausaha',
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        } elseif ($this->input->post('status_penempatan') == NULL and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
            );
        }

        /*if ($this->input->post('ket_penempatan') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'CNP',
            );
        } else if ($this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'Sendiri',
            );
        } elseif ($this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
            );
        } elseif ($this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
            );
        }*/

    /*$this->Models->Update($where, $data, 'mahasiswa');
        
        $where = array(
            'nim' => $this->input->post('nim'),
        );

        $data = array(
            'nama_mhs' => $this->input->post('nama_mhs'),
            'prodi' => $this->input->post('prodi'),
            'kelas' => $this->input->post('kelas'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
        );
        $this->Models->Update($where, $data, 'dt_permintaan');
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/mahasiswa');
    }*/

    public function mahasiswa_update_aksi()
    {
        $where = array(
            'nim' => $this->input->post('nim'),
        );

        if ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => 'CNP',
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => 'Sendiri',
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Magang' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'CNP') {
            $data = array(

                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => 'CNP',
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/

            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => 'Sendiri',
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Kerja' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Kerja',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/

            );
        } elseif ($this->input->post('status_penempatan') == 'Gugur' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Gugur',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Gugur' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Gugur',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/

            );
        } elseif ($this->input->post('status_penempatan') == 'Bermasalah' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Bermasalah',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/

            );
        } elseif ($this->input->post('status_penempatan') == 'Bermasalah' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Bermasalah',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Berwirausaha' and $this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Berwirausaha',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Berwirausaha' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => 'Berwirausaha',
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == NULL and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        } elseif ($this->input->post('status_penempatan') == 'Belum' and $this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'id_kelas' => $this->input->post('id_kelas'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'status_keuangan' => $this->input->post('status_keuangan'),
                'ipk' => $this->input->post('ipk'),
                'status_sidang' => $this->input->post('status_sidang'),
                'pa' => $this->input->post('pa'),
                'request_penempatan' => $this->input->post('request_penempatan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'usia' => $this->input->post('usia'),
                'dusun' => $this->input->post('dusun'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kotkab' => $this->input->post('kotkab'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp_ortu' => $this->input->post('no_hp_ortu'),
                'uk1' => $this->input->post('uk1'),
                'uk2' => $this->input->post('uk2'),
                'uk3' => $this->input->post('uk3'),
                'uk4' => $this->input->post('uk4'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'status_detail' => $this->input->post('status_detail'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ket_detail' => $this->input->post('ket_detail'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'gaji' => $this->input->post('gaji'),
                /*'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),*/
            );
        }

        /*if ($this->input->post('ket_penempatan') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'CNP',
            );
        } else if ($this->input->post('ket_penempatan') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => 'Sendiri',
            );
        } elseif ($this->input->post('ket_penempatan') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
            );
        } elseif ($this->input->post('ket_penempatan') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status_penempatan' => $this->input->post('status_penempatan'),
                'no_hp' => $this->input->post('no_hp'),
                'gaji' => $this->input->post('gaji'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'ket_penempatan' => $this->input->post('ket_penempatan'),
                'ipk' => $this->input->post('ipk'),
                'ipk1' => $this->input->post('ipk1'),
                'ipk2' => $this->input->post('ipk2'),
                'ipk3' => $this->input->post('ipk3'),
                'ipk4' => $this->input->post('ipk4'),
                'ipk5' => $this->input->post('ipk5'),
                'ipk6' => $this->input->post('ipk6'),
                'ket_mhs' => $this->input->post('ket_mhs'),
                'ket_detail' => $this->input->post('ket_detail'),
            );
        }*/

        $this->Models->Update($where, $data, 'mahasiswa');
        $where = array(
            'nim' => $this->input->post('nim'),
        );

        $data = array(
            'nama_mhs' => $this->input->post('nama_mhs'),
            'prodi' => $this->input->post('prodi'),
            'kelas' => $this->input->post('kelas'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
        );
        $this->Models->Update($where, $data, 'dt_permintaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/mahasiswa');
    }



    public function mahasiswa_delete()
    {
        $where = array(
            'nim' => $this->input->post('nim'),
        );
        $this->Models->delete($where, 'mahasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/mahasiswa');
    }

    //---USAHA---//
    public function usaha()
    {
        $data['title'] = 'Usaha';
        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        //=======ATASNYA========//

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //=======================//

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/usaha', $data);
        $this->load->view('templates/footer');
    }

    public function usaha_add()
    {


        $data['title'] = 'Tambah Usaha';

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $select = $this->db->select('*, mahasiswa.nim as nim');
        //$select = $this->db->join('perusahaan', 'mahasiswa.id_perusahaan = perusahaan.id_perusahaan');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);
        //$data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/usaha_add');
        $this->load->view('templates/footer');
    }

    public function usaha_add_aksi()
    {
        $this->_rules_usaha();

        if ($this->form_validation->run() == FALSE) {
            $this->usaha_add();
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama_mhs' => $this->input->post('nama_mhs'),
                'nama_usaha' => $this->input->post('nama_usaha'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'omset' => $this->input->post('omset'),
            );

            $this->Models->insert_data($data, 'usaha');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');

            redirect('master/usaha');
        }
    }

    public function _rules_usaha()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('nama_usaha', 'Usaha', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('alamat_usaha', 'Alamat', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('omset', 'Omset', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    //halaman detail
    public function usaha_id()
    {
        $data['title'] = 'Detail Usaha';
        $data['id_usaha'] = $_GET['id_usaha'];

        $select = $this->db->join('mahasiswa', 'usaha.nim = mahasiswa.nim');
        $select = $this->db->where('usaha.id_usaha ', $data['id_usaha']);
        $select = $this->db->order_by('usaha.id_usaha ', 'DESC');
        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);
        //print_r($data['mahasiswa'] );

        if (count($data['usaha']) == 0) {
            redirect(base_url('Not_Found'));
        }

        //print_r($data['mahasiswa']);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/usaha_id', $data);
        $this->load->view('templates/footer');
    }

    public function usaha_update_aksi()
    {
        $where = array(
            'id_usaha' => $this->input->post('id_usaha'),
        );

        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mhs' => $this->input->post('nama_mhs'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'omset' => $this->input->post('omset'),
        );
        $this->Models->Update($where, $data, 'usaha');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/usaha');
    }

    public function usaha_delete()
    {
        $where = array(
            'id_usaha' => $this->input->post('id_usaha'),
        );
        $this->Models->delete($where, 'usaha');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/usaha');
    }


    public function user()
    {
        $this->sidebar();
        $data = array(
            'master' => "open",
            'master_status' => " active",
            'usrr' => " active",
            'usrr_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'User';
        $data['user'] = $this->Models->get_data('user')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/user');
        $this->load->view('templates/footer');
    }

    public function user_id()
    {
        $data['title'] = 'Detail User';
        $data['username'] = $_GET['username'];

        $select = $this->db->where('user.username ', $data['username']);
        $data['user'] = $this->Models->Get_All('user', $select);

        if (count($data['user']) == 0) {
            redirect(base_url('Not_Found'));
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/user_id');
        $this->load->view('templates/footer');
    }

    public function user_update_aksi()
    {
        $where = array(
            'username' => $this->input->post('username'),
        );
        $data = array(
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'akses' => $this->input->post('akses'),
        );
        $this->Models->Update($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/user');
    }

    public function user_delete()
    {
        $username = $this->input->post('username');
        if ($username == 'admin') {
            $this->session->set_flashdata('cannot', TRUE);
        } else {
            $where = array(
                'username' => $username
            );
            $this->Models->delete($where, 'user');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/user');
    }

    //halaman add
    public function user_add()
    {
        $data['title'] = 'Tambah User';

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/user_add');
        $this->load->view('templates/footer');
    }

    //eksekusi
    public function user_add_aksi()
    {
        $this->_rules_user();

        if ($this->form_validation->run() == FALSE) {
            $this->user_add();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama' => $this->input->post('nama'),
                'akses' => $this->input->post('akses'),
            );

            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $this->input->post('username'));
            $cek = $this->db->get();
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata('exist', true);
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username telah tersedia, silahkan ganti dengan yang lain</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            } else {
                $this->Models->insert_data($data, 'user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            }

            redirect('master/user');
        }
    }

    public function _rules_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('akses', 'Akses', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    public function verifikasi_perusahaan()
    {

        $this->sidebar();
        $data = array(
            'perusahaan' => "open",
            'perusahaan_status' => " active",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Verifikasi Non-Aktif Perusahaan';

        /*$GetP = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_mulai) as Total_Hari FROM perusahaan');

        foreach ($GetP->result() as $p) {
            if ($p->Total_Hari > 365) {
                $this->db->query("UPDATE perusahaan SET relasi = 'Lama' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
            } else {
                $this->db->query("UPDATE perusahaan SET relasi = 'Baru' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
            }
        }*/

        /*$GetP = $this->db->query('select* FROM perusahaan');

        foreach ($GetP->result() as $p) {
                $this->db->query("UPDATE perusahaan SET status = NULL WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
        }*/

        $select = $this->db->select('*');
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/verifikasi_perusahaan');
        $this->load->view('templates/footer');
    }

    public function verifikasi_nonaktif()
    {
        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );
        $data = array(
            'status' =>  NULL
        );
        $this->Models->update($where, $data, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Telah ter Verifikasi Non Aktif</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/perusahaan');
    }

    public function aktifkan()
    {
        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );
        $data = array(
            'status' =>  'Aktif'
        );
        $this->Models->update($where, $data, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Telah ter Verifikasi Non Aktif</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/perusahaan');
    }

    public function non_aktifkan()
    {
        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );
        $data = array(
            'status' =>  NULL
        );
        $this->Models->update($where, $data, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Telah di Non Aktif</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/perusahaan');
    }


    public function perusahaan()
    {

        $bidang = "all";
        $wilayah = "all";
        $relasi = "all";

        if (isset($_GET['bidang'])) {
            $bidang = $_GET['bidang'];
        }
        if (isset($_GET['wilayah'])) {
            $wilayah = $_GET['wilayah'];
        }
        if (isset($_GET['relasi'])) {
            $relasi = $_GET['relasi'];
        }

        $this->sidebar();
        $data = array(
            'perusahaan' => "open",
            'perusahaan_status' => " active",
        );
        $this->session->set_userdata($data);


        $GetUser = $this->db->query('SELECT id_perusahaan, nama_perusahaan,nama FROM perusahaan');

        foreach ($GetUser->result() as $u) {
            $this->db->query("UPDATE ht_permintaan SET oleh =  '$u->nama' WHERE id_perusahaan = '" . $u->id_perusahaan . "'");
        }


        /*$GetP = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_mulai) as Total_Hari FROM perusahaan');

        foreach ($GetP->result() as $p) {
            if ($p->Total_Hari > 365) {
                $this->db->query("UPDATE perusahaan SET relasi = 'Lama' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
            } else {
                $this->db->query("UPDATE perusahaan SET relasi = 'Baru' WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
            }
        }*/

        /*$GetP = $this->db->query('select* FROM perusahaan');

        foreach ($GetP->result() as $p) {
                $this->db->query("UPDATE perusahaan SET status = NULL WHERE id_Perusahaan = '" . $p->id_perusahaan . "'");
        }*/

        $data['title'] = 'Perusahaan';
        $data['perusahaan'] = $this->Models->get_data('perusahaan')->result();

        //=======ATASNYA========//

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //=======================//

        $where = array(
            'bidang' => $bidang,
            'kota' => $wilayah,
            'relasi' => $relasi
        );
        $b = array(
            'bidang' => $bidang,
        );
        $w = array(
            'kota' => $wilayah,
        );
        $r = array(
            'relasi' => $relasi
        );
        if ($bidang == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        } elseif ($bidang == "all" && $wilayah == "all" && $relasi == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        } elseif ($bidang != "all" && $wilayah == "all" && $relasi == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_Where($b, 'perusahaan');
        } elseif ($bidang == "all" && $wilayah != "all" && $relasi == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_Where($w, 'perusahaan');
        } elseif ($bidang == "all" && $wilayah == "all" && $relasi != "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_Where($r, 'perusahaan');
        } elseif ($bidang != "all" && $wilayah != "all" && $relasi != "all") {
            $select = $this->db->order_by('id_perusahaan', 'DESC');
            $data['perusahaan'] = $this->Models->Get_Where($where, $select, 'perusahaan');
        }

        $data['bidang'] = $this->db->group_by('bidang')->get('perusahaan')->result();
        $data['type_perusahaan'] = $this->db->group_by('type_perusahaan')->get('perusahaan')->result();
        $data['kota'] = $this->db->group_by('kota')->get('perusahaan')->result();
        $data['relasi'] = $this->db->group_by('relasi')->get('perusahaan')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/perusahaan');
        $this->load->view('templates/footer');
    }

    public function perusahaan_id()
    {
        $data['title'] = 'Detail Perusahaan';
        $data['id'] = $_GET['id_perusahaan'];

        $select = $this->db->where('perusahaan.id_perusahaan ', $data['id']);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        $select = $this->db->select('*');
        $data['user'] = $this->Models->Get_All('user', $select);


        /* $select = $this->db->where('status = ', 'Sudah');
        $select = $this->db->where('id_perusahaan = ', $data['id']);
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);*/

        $select = $this->db->where('penanda_fu = ', 1);
        $select = $this->db->where('id_perusahaan = ', $data['id']);
        $data['sudah_telleseling'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->where('penanda_fu = ', NULL);
        $select = $this->db->where('id_perusahaan = ', $data['id']);
        $data['belum_telleseling'] = $this->Models->Get_All('telleseling', $select);

        /*$select = $this->db->where('tanggal_feedback = ', NULL);
        $select = $this->db->where('id_perusahaan = ', $data['id']);
        $data['belum_feedback'] = $this->Models->Get_All('telleseling', $select);*/

        if (count($data['perusahaan']) == 0) {
            redirect(base_url('Not_Found'));
        }


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/perusahaan_id');
        $this->load->view('templates/footer');
    }

    public function _do_upload($path, $name, $name_file)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = $name_file; //round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($name)) //upload and validate
        {
            $data['inputerror'][] = $name;
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }


    public function perusahaan_add()
    {
        $data['title'] = 'Tambah Perusahaan';

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/perusahaan_add');
        $this->load->view('templates/footer');
    }

    public function perusahaan_add_aksi()
    {
        $this->_rules_perusahaan();

        if ($this->form_validation->run() == FALSE) {
            $this->perusahaan_add();
        } else {
            $select =  $this->db->select('count(*) as jml, nama');
            $select =  $this->db->group_by('nama');
            $data['perusahaan'] =   $this->Models->Get_All('perusahaan', $select);
            $username = "";
            $jml = 0;
            foreach ($data['perusahaan'] as $p) {
                if ($jml == 0 and $p->nama != NULL) {
                    $username = $p->nama;
                    $jml = $p->jml;
                }
                if ($jml > $p->jml and $p->nama != NULL) {
                    $username = $p->nama;
                    $jml = $p->jml;
                }
            }
            $data = array(
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'bidang' => $this->input->post('bidang'),
                'type_perusahaan' => $this->input->post('type_perusahaan'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'email' => $this->input->post('email'),
                'fax' => $this->input->post('fax'),
                'kode_pos' => $this->input->post('kode_pos'),
                'tingkat' => $this->input->post('tingkat'),
                'kontak_person' => $this->input->post('kontak_person'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
                'sudah_mou' => $this->input->post('sudah_mou'),
                'sumber' => $this->input->post('sumber'),
                'ket' => $this->input->post('ket'),
                'nama' => $username,
                'relasi' => $this->input->post('relasi'),
                //'status' => 'Aktif',
            );

            $this->Models->insert_data($data, 'perusahaan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('master/perusahaan');
        }
    }

    public function _rules_perusahaan()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('bidang', 'Bidang', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('kontak_person', 'Kontak Person', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('no_telp', 'No HP/Telepon', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('sudah_mou', 'MOU', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    /*public function perusahaan_update_aksi()
    {
        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );
        $data = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'bidang' => $this->input->post('bidang'),
            'type_perusahaan' => $this->input->post('type_perusahaan'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'email' => $this->input->post('email'),
            'fax' => $this->input->post('fax'),
            'kode_pos' => $this->input->post('kode_pos'),
            'tingkat' => $this->input->post('tingkat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telp' => $this->input->post('no_telp'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
            'sudah_mou' => $this->input->post('sudah_mou'),
            'sumber' => $this->input->post('sumber'),
            'ket' => $this->input->post('ket'),
            'nama' => $this->session->userdata('username'),
            'relasi' => $this->input->post('relasi'),
        );

        $this->Models->Update($where, $data, 'perusahaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/perusahaan');
    }*/

    public function perusahaan_update_aksi()
    {
        $data1 = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'bidang' => $this->input->post('bidang'),
            'type_perusahaan' => $this->input->post('type_perusahaan'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'email' => $this->input->post('email'),
            'fax' => $this->input->post('fax'),
            'kode_pos' => $this->input->post('kode_pos'),
            'tingkat' => $this->input->post('tingkat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telp' => $this->input->post('no_telp'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
            'sudah_mou' => $this->input->post('sudah_mou'),
            'sumber' => $this->input->post('sumber'),
            'ket' => $this->input->post('ket'),
            'nama' => $this->input->post('nama'),
            'relasi' => $this->input->post('relasi'),
        );

        $data2 = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'bidang' => $this->input->post('bidang'),
            'kota' => $this->input->post('kota'),
            'relasi' => $this->input->post('relasi'),
            'alamat' => $this->input->post('alamat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'jabatan' => $this->input->post('jabatan'),
            'oleh' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
        );

        $data3 = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'bidang' => $this->input->post('bidang'),
            'relasi' => $this->input->post('relasi'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'kontak_person' => $this->input->post('kontak_person'),
            'oleh' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
        );

        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );

        $this->Models->Update($where, $data1, 'perusahaan');
        $this->Models->Update($where, $data2, 'telleseling');
        $this->Models->Update($where, $data3, 'ht_permintaan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

        redirect('master/perusahaan');
    }

    public function perusahaan_delete()
    {
        $where = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
        );
        $this->Models->delete($where, 'perusahaan');
        $this->Models->delete($where, 'telleseling');
        $this->Models->delete($where, 'ht_permintaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/perusahaan');
    }

    public function telleseling()
    {
        $this->sidebar();
        $data = array(
            'telleseling' => "open",
            'telleseling_status' => " active",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Follow Up';

        $GetData = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_fu) as Total_Hari FROM telleseling');

        foreach ($GetData->result() as $p) {
            $this->db->query("UPDATE telleseling SET jumlah_hari =  '$p->Total_Hari' WHERE id_telleseling = '" . $p->id_telleseling . "'");
        }

        $GetTanda = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_penanda_fu) as Total_Hari FROM telleseling');

        foreach ($GetTanda->result() as $p) {
            $this->db->query("UPDATE telleseling SET jumlah_hari_penanda_fu =  '$p->Total_Hari' WHERE id_telleseling = '" . $p->id_telleseling . "'");
        }

        $date = date('Y-m-d');
        $select = $this->db->select('*');
        $select = $this->db->where('tanggal_penanda_fu=', NULL);
        $select = $this->db->where('jumlah = ', $date);
        $select = $this->db->order_by('tanggal_fu', 'DESC');
        $select = $this->db->group_by('id_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);

        $date = date('Y-m-d');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        //=======ATASNYA========//

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //=======================//

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/telleseling');
        $this->load->view('templates/footer');
    }

    public function list_feedback()
    {

        $this->sidebar();
        $data = array();
        $this->session->set_userdata($data);


        $data['title'] = 'List Feedback';

        $select = $this->db->select('*');
        $select = $this->db->where('tanggal_feedback !=', NULL);
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);


        //$GetData = $this->db->query('select*,  FROM telleseling WHERE status IN (Belum,Segera)');


        $select = $this->db->select('*');
        //$select = $this->db->where('status = ', 'Belum');
        //$select = $this->db->join('perusahaan', 'telleseling.id_perusahaan = perusahaan.id_perusahaan');
        // $data['telleseling'] = $this->Models->get_data('telleseling')->result();

        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        // $data['telleseling'] = $this->Models->Get_All('telleseling', $select);

        $data['status'] = $this->db->group_by('status')->get('telleseling')->result();

        /*$sudah = $this->db->where('status = ', 'Sudah');
        if ($sudah) {
            $this->Models->hide('perusahaan', $select);
        }else{

        }*/

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/list_feedback');
        $this->load->view('templates/footer');
    }

    public function telleseling_add()
    {
        $data['title'] = 'Tambah Follow Up';

        $select = $this->db->select('*, telleseling.id_telleseling as id_telleseling');
        $select = $this->db->join('perusahaan', 'telleseling.id_perusahaan = perusahaan.id_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        $select = $this->db->select('*');
        //$select = $this->db->where('bukti_followup =', NULL);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/telleseling_add', $data);
        $this->load->view('templates/footer');
    }

    public function telleseling_add_aksi()
    {
        $this->_rules_telleseling();

        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        $this->db->select('*');
        $this->db->from('telleseling');
        $this->db->where('id_perusahaan', $this->input->post('id_perusahaan'));
        $this->db->where('tanggal_penanda_fu =', NULL);
        $cek = $this->db->get();
        if ($cek->num_rows() > 0) {

            //===UBAH TANGGAL PENANDA===//
            $where = array(
                //'id_telleseling' => $this->input->post('id_telleseling'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
            );
            $data = array(
                'penanda_fu' => 1,
                'tanggal_penanda_fu' => date('Y-m-d'),
            );
            $this->Models->Update($where, $data, 'telleseling');
            //=============================//

            //===UBAH BUKTI FOLLOWUP DI PERUSAHAAN===//
            $data = array(
                'bukti_followup' => 'SUDAH',
            );
            $this->Models->Update($where, $data, 'perusahaan');
            //=============================// 

            $data = array(
                'id_telleseling' => $this->input->post('id_telleseling'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'nama_perusahaan' => $namaperusahaan,
                'bidang' => $this->input->post('bidang'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kontak_person' => $this->input->post('kontak_person'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'tanggal_fu' => $this->input->post('tanggal_fu'),
                'hasil_fu' => $this->input->post('hasil_fu'),
                'relasi' => $this->input->post('relasi'),
                'melalui' => $this->input->post('melalui'),
                'oleh' => $this->session->userdata('nama'),
                // 'status' => 'Sudah',
                'jumlah' => date("Y-m-d"),
                //'tanggal_feedback' => NULL,
            );
            $this->Models->insert_data($data, 'telleseling');

            //===UBAH JUMLAH HARI PENANDA===//
            $GetFeedback = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_penanda_fu) as Total_Penanda FROM telleseling');

            foreach ($GetFeedback->result() as $p) {
                $this->db->query("UPDATE telleseling SET jumlah_hari_penanda_fu =  '$p->Total_Penanda' WHERE id_telleseling = '" . $p->id_telleseling . "'");
            }
            //=============================//

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('master/telleseling');
        } else {
            $data = array(
                'id_telleseling' => $this->input->post('id_telleseling'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'nama_perusahaan' => $namaperusahaan,
                'bidang' => $this->input->post('bidang'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kontak_person' => $this->input->post('kontak_person'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'tanggal_fu' => $this->input->post('tanggal_fu'),
                'hasil_fu' => $this->input->post('hasil_fu'),
                'relasi' => $this->input->post('relasi'),
                'melalui' => $this->input->post('melalui'),
                'oleh' => $this->session->userdata('username'),
                'jumlah' => date("Y-m-d"),
                // 'status' => 'Sudah',
                //'tanggal_accept' => date("Y-m-d"),
                //'tanggal_feedback' => NULL,
            );

            $this->Models->insert_data($data, 'telleseling');

            //===UBAH BUKTI FOLLOWUP DI PERUSAHAAN===//
            $data = array(
                'bukti_followup' => 'SUDAH',
            );
            $this->Models->Update($where, $data, 'perusahaan');
            //=============================//   
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        }
        redirect('master/telleseling');
    }

    public function accept()
    {
        /* $GetFeedback = $this->db->query('select*,DATEDIFF(CURRENT_DATE(), tanggal_accept) as Total_Feedback FROM telleseling');

        foreach ($GetFeedback->result() as $f) {
            if ($f->Total_Feedback == NULL && $f->feedback == NULL && $f->tanggal_accept == NULL && $f->oleh == NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  'Belum Accept' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->Total_Feedback <= 3 && $f->feedback == NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  '+ $f->Total_Feedback hari' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->Total_Feedback >= 5 && $f->feedback == NULL) {
                $this->db->query("UPDATE telleseling SET feedback =  '+ $f->Total_Feedback hari' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            } else if ($f->feedback == 'Sudah') {
                $this->db->query("UPDATE telleseling SET feedback = 'Sudah' WHERE id_telleseling = '" . $f->id_telleseling . "'");
            }
        }*/

        $where = array(
            'id_telleseling' => $this->input->post('id_telleseling'),
        );
        $data = array(
            'oleh' => $this->session->userdata('username'),
            'status' => 'Sudah',
            'tanggal_accept' => date("Y-m-d"),
            'tanggal_feedback' => NULL,
        );
        $this->Models->Update($where, $data, 'telleseling');
        redirect('Master/telleseling');
    }

    public function feedback_add()
    {
        $data['title'] = 'Tambah Follow Up';
        //$select = $this->db->select('*, telleseling.id_telleseling as id_telleseling');
        //$select = $this->db->join('perusahaan', 'telleseling.id_perusahaan = perusahaan.id_perusahaan');
        // $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/feedback_add', $data);
        $this->load->view('templates/footer');
    }


    /* public function fb()
    {
        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        $data = array(
            'id_telleseling'                =>  $this->input->post('id_telleseling'),
            'id_perusahaan' => $this->input->post('id_perusahaan'),
            'nama_perusahaan' => $namaperusahaan,
            'bidang' => $this->input->post('bidang'),
            'alamat' => $this->input->post('alamat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telp' => $this->input->post('no_telp'),
            'tanggal_feedback' => $this->input->post('tanggal_feedback'),
            'hasil_feedback' => $this->input->post('hasil_feedback'),
            'melalui' => $this->input->post('melalui'),
            'oleh'                =>  $this->session->userdata('username'),
        );
        $this->Models->insert_data($data, 'feedback');

        $where = array(
            'id_telleseling' => $this->input->post('id_telleseling'),
        );
        $data = array(
            'feedback' => 'F',
        );
        $this->Models->Update($where, $data, 'telleseling');


        $this->session->set_flashdata('pesan', 'Anda berhasil Memberi Feedback!!');
        redirect('Master/telleseling');
    }*/

    public function fb()
    {
        $where = array(
            'id_telleseling' => $this->input->post('id_telleseling'),
        );
        $data = array(
            'tanggal_feedback' => date("Y-m-d"),
            'feedback_melalui' => $this->input->post('feedback_melalui'),
            'hasil_feedback' => $this->input->post('hasil_feedback'),
            'feedback_oleh' => $this->session->userdata('username'),
            'feedback' => 'Sudah',
            'tf' => 'Sudah'
        );
        $this->Models->Update($where, $data, 'telleseling');
        redirect('Master/telleseling');
    }

    //SiRP get Perusahaan
    public function getPerusahaan()
    {
        $where = array(
            'id_perusahaan' => $this->input->get('id_perusahaan')
        );
        $data['getPerusahaan'] = $this->Models->Get_Where($where, 'perusahaan');
        $this->load->view('master/getPerusahaan', $data);
    }

    public function getP()
    {
        $where = array(
            'id_perusahaan' => $this->input->get('id_perusahaan')
        );
        $data['getP'] = $this->Models->Get_Where($where, 'perusahaan');
        $this->load->view('master/getP', $data);
    }



    public function _rules_telleseling()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('melalui', 'Follow Up Melalui', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('hasil_fu', 'Hasil Followup', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    public function telleseling_id()
    {
        $data['title'] = 'Detail Follow Up';
        $data['id'] = $_GET['id_telleseling'];

        $select = $this->db->where('telleseling.id_telleseling ', $data['id']);
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        if (count($data['telleseling']) == 0) {
            redirect(base_url('Not_Found'));
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/telleseling_id', $data);
        $this->load->view('templates/footer');
    }

    public function telleseling_update_aksi()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        $where = array(
            'id_telleseling' => $this->input->post('id_telleseling'),
        );
        $data = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
            'nama_perusahaan' => $namaperusahaan,
            'bidang' => $this->input->post('bidang'),
            'kota' => $this->input->post('kota'),
            'relasi' => $this->input->post('relasi'),
            'alamat' => $this->input->post('alamat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telp' => $this->input->post('no_telp'),
            'tanggal_fu' => $this->input->post('tanggal_fu'),
            'hasil_fu' => $this->input->post('hasil_fu'),
            'melalui' => $this->input->post('melalui'),
            'oleh' => $this->session->userdata('nama'),
        );
        $this->Models->Update($where, $data, 'telleseling');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/telleseling');
    }

    public function telleseling_delete()
    {
        $where = array(
            'id_telleseling' => $this->input->post('id_telleseling'),
        );
        $this->Models->delete($where, 'telleseling');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/telleseling');
    }

    //SiRP get Mahasiswa
    public function getMahasiswa()
    {
        $where = array(
            'nim' => $this->input->get('nim')
        );
        $data['getMahasiswa'] = $this->Models->Get_Where($where, 'mahasiswa');
        $this->load->view('master/getMahasiswa', $data);
    }

    //SiRP get Mahasiswa
    public function getKota()
    {
        $where = array(
            'id_perusahaan' => $this->input->get('id_perusahaan')
        );
        $data['getKota'] = $this->Models->Get_Where($where, 'perusahaan');
        $this->load->view('master/getKota', $data);
    }

    public function getKelas()
    {
        $where = array(
            'id_kelas' => $this->input->get('id_kelas')
        );
        $data['getKelas'] = $this->Models->Get_Where($where, 'kelas');
        $this->load->view('master/getKelas', $data);
    }


    public function permintaan()
    {

        $this->sidebar();
        $data = array(
            'permintaan' => "open",
            'permintaan_status' => " active",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Permintaan';
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['ht_permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('vw_permintaan.waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil !=', 'Belum');
        $data['permintaann'] = $this->Models->Get_All('vw_permintaan', $select);

        //=======ATASNYA========//

        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'vw_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->order_by('waktu', 'DESC');
        $select = $this->db->group_by('vw_permintaan.id_permintaan');
        $select = $this->db->where('dt_permintaan.hasil =', 'Belum');
        $data['permintaan'] = $this->Models->Get_All('vw_permintaan', $select);

        $date = date('Y-m-d');
        // $sekarang = date('');
        $select = $this->db->select('*');
        $select = $this->db->where('jumlah = ', $date);
        $data['followup'] = $this->Models->Get_All('telleseling', $select);

        $mhs = $this->db->select('*');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $mhs);

        $select = $this->db->select('*');
        $data['usaha'] = $this->Models->Get_All('usaha', $select);

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //=======================//

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/permintaan');
        $this->load->view('templates/footer');
    }

    public function permintaan_add()
    {
        $data['title'] = 'Tambah Permintaan';
        $select = $this->db->select('*, ht_permintaan.id_permintaan as id_permintaan');
        $select = $this->db->join('perusahaan', 'ht_permintaan.id_perusahaan = perusahaan.id_perusahaan');
        $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        // $select = $this->db->join('mahasiswa', 'ht_permintaan.id_mahasiswa = mahasiswa.id_mahasiswa');
        $data['ht_permintaan'] = $this->Models->get_data('ht_permintaan')->result();
        $data['perusahaan'] = $this->Models->get_data('perusahaan')->result();
        $data['dt_permintaan'] = $this->Models->get_data('dt_permintaan')->result();;
        //$data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);
        $select = $this->db->select('*');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/permintaan_add', $data);
        $this->load->view('templates/footer');
    }

    function ShowCart()
    {
        $output = '';
        $no = 1;
        $jml_mhs = 0;
        foreach ($this->cart->contents() as $items) {
            $jml_mhs += $items['qty'];
            $output .= '
					<tr>
						<td class="text-center">' . $no++ . '.</td>
						<td>' . $items['name'] . '</td>
                        <td>' . $items['prodi'] . '</td>
                        <td>' . $items['kelas'] . '</td>
                        <td>' . $items['asal_sekolah'] . '</td>
                        <td>' . $items['tahun_akademik'] . '</td>
						<td class="text-center">
							<button type="button" class="btn btn-sm btn-danger cancel-cart" onclick="return batalan(`' . $items['rowid'] . '`)">
								<i class="fa fa-times"></i>
							</button>
						</td>
					</tr>
					';
        }
        $output .= '
				<tr>
					<th colspan="3" class="text-center text-bold">Total Mahasiswa</th>
					<th colspan="3" class="text-center text-bold"><input type="hidden" value="' . number_format($jml_mhs) . '" name="jml_mhs"><span class="float-right">' . number_format($jml_mhs) . '</span></td>
				</tr>
		';
        echo $output;
    }

    function AddCart($id, $qty)
    {
        $where = array(
            'nim' => $id
        );
        $getMahasiswa = $this->Models->Get_Where($where, 'mahasiswa');
        foreach ($getMahasiswa as $m) {
            $data = array(
                'id'            => $m->nim,
                'name'            => $m->nama_mhs,
                'prodi' => $m->prodi,
                'kelas' => $m->kelas,
                'asal_sekolah' => $m->asal_sekolah,
                'tahun_akademik' => $m->tahun_akademik,
                'qty'             => $qty,
                'price' => 500000,
            );
        }
        $this->cart->insert($data);
        $this->ShowCart();
    }

    function DeleteCart($row_id)
    {
        $data = array(
            'rowid' => $row_id,
            'qty' => 0,
        );
        $this->cart->update($data);
        $this->ShowCart();
    }

    public function _rules_permintaan()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
        $this->form_validation->set_rules('posisi_yang_dibutuhkan', 'Posisi yang Dibutuhkan', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }


    /* public function SavePermintaan()
    {

        if (count($this->cart->contents()) < 1) {
            $this->session->set_flashdata('emptycart', true);
            redirect('Master/permintaan');
        } else {
            $this->_rules_permintaan();

            $id = date('YmdHis');
            $id_perusahaan = $this->input->post('id_perusahaan');
            $where = array(
                'id_perusahaan' => $id_perusahaan,
            );
            $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
            foreach ($dapat_perusahaan as $dp) {
                foreach ($dapat_perusahaan as $items) {
                    $namaperusahaan = $items->nama_perusahaan;
                }
                $total_mhs = $this->input->post('jml_mhs');
                $data = array(
                    'id_permintaan' => $id,
                    'id_perusahaan' => $id_perusahaan,
                    'nama_perusahaan' => $namaperusahaan,
                    'bidang' => $dp->bidang,
                    'relasi' => $dp->relasi,
                    'alamat' => $dp->alamat,
                    'kota' => $dp->kota,
                    'kontak_person' => $dp->kontak_person,
                    'no_telp' => $dp->no_telp,
                    'posisi_yang_dibutuhkan' => $this->input->post('posisi_yang_dibutuhkan'),
                    'jml_mhs' => $total_mhs,
                    'oleh' => $this->session->userdata('username'),
                );
                $this->Models->Save($data, 'ht_permintaan');
            }
            foreach ($this->cart->contents() as $items) {
                $data = array(
                    'id_permintaan' => $id,
                    'nim' => $items['id'],
                    'nama_mhs' => $items['name'],
                    'kelas' => $items['kelas'],
                    'prodi' => $items['prodi'],
                    'asal_sekolah' => $items['asal_sekolah'],
                    'qty' => $items['qty'],
                );
                $this->Models->Save($data, 'dt_permintaan');
            }
            $this->cart->destroy();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Master/permintaan');
        }
    }*/

    public function SavePermintaan()
    {
        if ($this->input->post('jml_mhs') == NULL) {
            $id = date('YmdHis');
            $id_perusahaan = $this->input->post('id_perusahaan');
            $where = array(
                'id_perusahaan' => $id_perusahaan,
            );
            $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
            foreach ($dapat_perusahaan as $dp) {
                foreach ($dapat_perusahaan as $items) {
                    $namaperusahaan = $items->nama_perusahaan;
                }
                $total_mhs = $this->input->post('jml_mhs');
                $data = array(
                    'id_permintaan' => $id,
                    'id_perusahaan' => $id_perusahaan,
                    'nama_perusahaan' => $namaperusahaan,
                    'bidang' => $dp->bidang,
                    'relasi' => $dp->relasi,
                    'alamat' => $dp->alamat,
                    'kota' => $dp->kota,
                    'kontak_person' => $dp->kontak_person,
                    'no_telp' => $dp->no_telp,
                    'posisi_yang_dibutuhkan' => $this->input->post('posisi_yang_dibutuhkan'),
                    'kualifikasi' => $this->input->post('kualifikasi'),
                    'jml_mhs' => $total_mhs,
                    'oleh' => $dp->nama,
                    'waktu' => $this->input->post('waktu'),
                );
                $this->Models->Save($data, 'ht_permintaan');
            }

            $data = array(
                'id_permintaan' => $id,
            );
            $this->Models->Save($data, 'dt_permintaan');

            // $this->cart->destroy();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('Master/permintaan');
            //}
        } else {
            if (count($this->cart->contents()) < 1) {
                $this->session->set_flashdata('emptycart', true);
                redirect('Master/permintaan');
            } else {
                // $this->_rules_permintaan();
                $id = date('YmdHis');
                $id_perusahaan = $this->input->post('id_perusahaan');
                $where = array(
                    'id_perusahaan' => $id_perusahaan,
                );
                $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
                foreach ($dapat_perusahaan as $dp) {
                    foreach ($dapat_perusahaan as $items) {
                        $namaperusahaan = $items->nama_perusahaan;
                    }
                    $total_mhs = $this->input->post('jml_mhs');
                    $data = array(
                        'id_permintaan' => $id,
                        'id_perusahaan' => $id_perusahaan,
                        'nama_perusahaan' => $namaperusahaan,
                        'bidang' => $dp->bidang,
                        'relasi' => $dp->relasi,
                        'alamat' => $dp->alamat,
                        'kota' => $dp->kota,
                        'kontak_person' => $dp->kontak_person,
                        'waktu' => $dp->waktu,
                        'no_telp' => $dp->no_telp,
                        'posisi_yang_dibutuhkan' => $this->input->post('posisi_yang_dibutuhkan'),
                        'kualifikasi' => $this->input->post('kualifikasi'),
                        'jml_mhs' => $total_mhs,
                        'oleh' => $dp->nama,
                        'waktu' => $this->input->post('waktu'),
                    );
                    $this->Models->Save($data, 'ht_permintaan');
                }
                foreach ($this->cart->contents() as $items) {
                    $data = array(
                        'id_permintaan' => $id,
                        'nim' => $items['id'],
                        'nama_mhs' => $items['name'],
                        'kelas' => $items['kelas'],
                        'prodi' => $items['prodi'],
                        'asal_sekolah' => $items['asal_sekolah'],
                        'tahun_akademik' => $items['tahun_akademik'],
                        'qty' => $items['qty'],
                    );
                    $this->Models->Save($data, 'dt_permintaan');
                }
                $this->cart->destroy();
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('Master/permintaan');
            }
        }
    }


    public function permintaan_id()
    {
        $data['title'] = 'Detail Permintaan';
        $data['id'] = $_GET['id_permintaan'];



        $select = $this->db->where('ht_permintaan.id_permintaan ', $data['id']);
        $select = $this->db->select('*, ht_permintaan.id_permintaan as id_permintaan');
        $select = $this->db->join('perusahaan', 'ht_permintaan.id_perusahaan = perusahaan.id_perusahaan');
        $data['ht_permintaan'] = $this->Models->Get_All('ht_permintaan', $select);

        $data['id'] = $_GET['id_permintaan'];
        $select = $this->db->where('dt_permintaan.id_permintaan ', $data['id']);
        $data['dt'] = $this->Models->Get_All('dt_permintaan', $select);
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        if (count($data['ht_permintaan']) == 0) {
            redirect(base_url('Not_Found'));
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/permintaan_id', $data);
        $this->load->view('templates/footer');
    }

    public function permintaan_delete()
    {
        $where = array(
            'id_permintaan' => $this->input->post('id_permintaan'),
        );
        $this->Models->delete($where, 'ht_permintaan');
        $this->Models->delete($where, 'dt_permintaan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/permintaan');
    }

    public function dt_delete()
    {
        $where = array(
            'id_permintaan' => $this->input->post('id_permintaan'),
            'nim' => $this->input->post('nim'),
        );
        //$this->Models->delete($where, 'ht_permintaan');
        $this->Models->delete($where, 'dt_permintaan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/permintaan');
    }

    public function update_dt()
    {

        $data['title'] = 'Detail Permintaan Mahasiswa';

        $where = array(
            "id_permintaan" => $_GET['id_permintaan'],
            "nim" => $_GET['nim'],
        );

        $data['dt_permintaan'] = $this->db->get_where('dt_permintaan', $where)->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/update_dt', $data);
        $this->load->view('templates/footer');
    }

    public function dt_update_aksi()
    {
        $where = array(
            'id_permintaan' => $this->input->post('id_permintaan'),
            'nim' => $this->input->post('nim'),
        );

        if ($this->input->post('ket') == 'CNP') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
                'hasil' => $this->input->post('hasil'),
                'ket' => $this->input->post('ket'),
                'tgl_hasil' => $this->input->post('tgl_hasil'),
                'ket_lain' => 'CNP',
            );
        } elseif ($this->input->post('ket') == 'Sendiri') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
                'hasil' => $this->input->post('hasil'),
                'ket' => $this->input->post('ket'),
                'tgl_hasil' => $this->input->post('tgl_hasil'),
                'ket_lain' => 'Sendiri',
            );
        } elseif ($this->input->post('ket') == 'Lainnya') {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
                'hasil' => $this->input->post('hasil'),
                'ket' => $this->input->post('ket'),
                'tgl_hasil' => $this->input->post('tgl_hasil'),
                'ket_lain' => $this->input->post('ket_lain'),
            );
        } elseif ($this->input->post('ket') == NULL) {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'prodi' => $this->input->post('prodi'),
                'kelas' => $this->input->post('kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
                'hasil' => $this->input->post('hasil'),
                'ket' => $this->input->post('ket'),
                'tgl_hasil' => $this->input->post('tgl_hasil'),
                'ket_lain' => $this->input->post('ket_lain'),
            );
        }

        $this->Models->Update($where, $data, 'dt_permintaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/permintaan');
    }

    public function tentang()
    {
        $this->sidebar();
        $data = array();
        $this->session->set_userdata($data);

        $data['title'] = 'Tentang';

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/tentang');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $this->sidebar();
        $data = array();
        $this->session->set_userdata($data);

        $data['title'] = 'Profile';

        $select = $this->db->select('*');
        $data['username'] = $this->Models->Get_All('user', $select);
        $where = $this->db->where('akses = "Master"');

        $select = $this->db->select('*');
        $data['user'] = $this->Models->Get_All('user', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/profile', $data, $where);
        $this->load->view('templates/footer');
    }

    public function update_profile()
    {
        $data['title'] = 'Update Profile';
        $data['username'] = $_GET['username'];

        $select = $this->db->where('user.username ', $data['username']);
        $data['user'] = $this->Models->Get_All('user', $select);

        if (count($data['user']) == 0) {
            redirect(base_url('Not_Found'));
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/update_profile');
        $this->load->view('templates/footer');
    }

    public function profile_update_aksi()
    {
        $where = array(
            'username' => $this->input->post('username'),
        );
        $data = array(
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'akses' => $this->input->post('akses'),
        );
        $this->Models->Update($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/profile');
    }

    public function dokumen_det()
    {
        $this->sidebar();
        $data = array();
        $this->session->set_userdata($data);

        $data['title'] = 'Dokumen Detail';

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dokumen_det');
        $this->load->view('templates/footer');
    }

    public function laporan_status_mahasiswa()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_status_mahasiswa' => " active",
            'laporan_status_mahasiswa_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Status Mahasiswa';

        $select = $this->db->select('*');
        $data['prodi'] = $this->db->group_by('prodi')->get('mahasiswa')->result();
        $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('mahasiswa')->result();
        $data['status'] = $this->db->group_by('status')->get('mahasiswa')->result();


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_status_mahasiswa');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_status_mahasiswa()
    {
        $select = $this->db->select('*');
        $select = $this->db->select('prodi');
        $select = $this->db->select('tahun_akademik');
        $select = $this->db->select('status');

        //$select = $this->db->where('status = ', 'Bekerja');
        $select = $this->db->where('status', $_GET['status']);

        $select = $this->db->where('prodi', $_GET['prodi']);
        $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);


        $data['prodi'] = "";
        foreach ($data['mahasiswa'] as $d) {
            $data['prodi'] = $d->prodi;
        }
        $data['tahunakademik'] = "";
        foreach ($data['mahasiswa'] as $d) {
            $data['tahunakademik'] = $d->tahun_akademik;
        }
        $data['status'] = "";
        foreach ($data['mahasiswa'] as $d) {
            $data['status'] = $d->status;
        }

        $this->load->view('master/cetak_laporan_status_mahasiswa', $data);
    }

    public function laporan_relasi_perusahaan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_relasi_perusahaan' => " active",
            'laporan_relasi_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Relasi Perusahaan';

        $select = $this->db->select('*');
        $data['relasi'] = $this->db->group_by('relasi')->get('perusahaan')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_relasi_perusahaan');
        $this->load->view('templates/footer');
    }

    public function halaman_laporan_relasi_perusahaan()
    {
        $rel = $_GET['relasi'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_relasi_perusahaan' => " active",
            'laporan_relasi_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Relasi Perusahaan';

        if ($rel == "all") {
            $select = $this->db->select('*');
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('relasi', $_GET['relasi']);
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/halaman_laporan_relasi_perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_relasi_perusahaan()
    {
        $rel = $_GET['relasi'];

        if ($rel == "all") {
            $select = $this->db->select('*');
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('relasi', $_GET['relasi']);
            $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        }

        $this->load->view('master/cetak_laporan_relasi_perusahaan', $data);
    }

    public function akumulasi()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'akumulasi' => " active",
            'akumulasi_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Rekapitulasi Penempatan';



        $select = $this->db->select('*');
        $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_akumulasi')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/akumulasi');
        $this->load->view('templates/footer');
    }

    public function rekapitulasi_penempatan()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'akumulasi' => " active",
            'akumulasi_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Rekapitulasi Penempatan';

        if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');

            $select = $this->db->group_by('prodi');
            $select = $this->db->group_by('tahun_akademik');

            $data['mahasiswa'] = $this->Models->Get_All('vw_akumulasi_keatas', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/rekapitulasi_penempatan_keatas', $data);
            $this->load->view('templates/footer');
        } elseif ($tahun_akademik == 2019) {
            $where = array(
                'tahun_akademik' => $tahun_akademik,
            );

            $data['mahasiswa'] = $this->Models->Get_Where($where, 'vw_akumulasi');

            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');

            $select = $this->db->where('tahun_akademik =', 2019);
            $select = $this->db->group_by('prodi');
            //$select =  $this->db->query('SELECT prodi, COUNT(nim) FROM mahasiswa WHERE tahun_akademik = 2021  GROUP BY prodi;');

            $data['mahasiswa'] = $this->Models->Get_All('vw_akumulasi', $select);
            //$data['jml'] = $this->Models->Get_All('vw_jumlah', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/rekapitulasi_penempatan', $data);
            $this->load->view('templates/footer');
        } elseif ($tahun_akademik != 2019) {
            $where = array(
                'tahun_akademik' => $tahun_akademik,
            );

            $data['mahasiswa'] = $this->Models->Get_Where($where, 'vw_akumulasi_keatas');

            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');

            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->group_by('prodi');
            //$select =  $this->db->query('SELECT prodi, COUNT(nim) FROM mahasiswa WHERE tahun_akademik = 2021  GROUP BY prodi;');

            $data['mahasiswa'] = $this->Models->Get_All('vw_akumulasi_keatas', $select);
            //$data['jml'] = $this->Models->Get_All('vw_jumlah', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/rekapitulasi_penempatan_keatas', $data);
            $this->load->view('templates/footer');
        }
    }

    public function mou()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'mou' => " active",
            'mou_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Jumlah MOU';

        $data['dari'] = date('Y-m-d');
        $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/mou');
        $this->load->view('templates/footer');
    }

    public function jumlah_mou()
    {
        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        //$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
        $select = $this->db->where('perusahaan.tanggal_mulai >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('perusahaan.tanggal_mulai <= "' . $sampai . '"');
        $select = $this->db->where('sudah_mou', 'Sudah');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');
        $this->load->view('master/jumlah_mou', $data);
    }

    public function laporan_followup()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_followup' => " active",
            'laporan_followup_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Follow Up';

        $data['dari'] = date('Y-m-d');
        $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_followup');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_followup()
    {
        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        $select = $this->db->order_by('id_perusahaan', 'ASC');
        //$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
        $select = $this->db->where('telleseling.tanggal_fu >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('telleseling.tanggal_fu <= "' . $sampai . '"');
        //$select = $this->db->where('sudah_mou', 'Sudah');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');
        $this->load->view('master/cetak_laporan_followup', $data);
    }

    public function laporan_feedback()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_feedback' => " active",
            'laporan_feedback_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Feedback';

        $data['dari'] = date('Y-m-d');
        $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_feedback');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_feedback()
    {
        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        //$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
        $select = $this->db->where('telleseling.tanggal_feedback >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('telleseling.tanggal_feedback <= "' . $sampai . '"');
        //$select = $this->db->where('sudah_mou', 'Sudah');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');
        $this->load->view('master/cetak_laporan_feedback', $data);
    }

    public function laporan_permintaan_tanggal()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_p_tanggal' => " active",
            'laporan_p_tanggal_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Permintaan Per-Tanggal';

        $data['dari'] = date('Y-m-d');
        $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_permintaan_tanggal');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_permintaan_tanggal()
    {
        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
        $select = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');

        //$select = $this->db->where('id_owner', '1');
        $data['permintaan'] = $this->Models->Get_All('ht_permintaan', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');

        $pr = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
        $pr = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $pr = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $pr = $this->db->group_by('id_perusahaan');
        $data['pr'] = $this->Models->Get_All('ht_permintaan', $pr);

        //----COUNT DATA----//
        $pi = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $pi = $this->db->group_by('id_perusahaan ');
        $pi = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $pi = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $data['prshn'] = $this->Models->Get_All('dt_permintaan', $pi);

        $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hblm = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hblm = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hblm = $this->db->where('hasil = ', 'Belum');
        $data['hbelum'] = $this->Models->Get_All('dt_permintaan', $hblm);

        $hcancel = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hcancel = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hcancel = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hcancel = $this->db->where('hasil = ', 'Cancel');
        $data['hcancel'] = $this->Models->Get_All('dt_permintaan', $hcancel);

        $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hkki = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hkki = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hkki = $this->db->where('hasil = ', 'Diterima KKI');
        $data['hkki'] = $this->Models->Get_All('dt_permintaan', $hkki);

        $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hlolos = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hlolos = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hlolos = $this->db->where('hasil = ', 'Lolos Test');
        $data['hlolos'] = $this->Models->Get_All('dt_permintaan', $hlolos);

        $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hlolos = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hlolos = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hgagal = $this->db->where('hasil = ', 'Gagal Test');
        $data['hgagal'] = $this->Models->Get_All('dt_permintaan', $hgagal);

        $hmenolak = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hmenolak = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hmenolak = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hmenolak = $this->db->where('hasil = ', 'Menolak');
        $data['hmenolak'] = $this->Models->Get_All('dt_permintaan', $hmenolak);

        $htdkdatang = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $htdkdatang = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $htdkdatang = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $htdkdatang = $this->db->where('hasil = ', 'Tidak Datang Test');
        $data['htdkdatang'] = $this->Models->Get_All('dt_permintaan', $htdkdatang);

        $this->load->view('master/cetak_laporan_permintaan_tanggal', $data);
    }

    public function exportExcel()
    {
        // Load PHPExcel library
        $this->load->library('excel');

        // Create a new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Add data to the Excel file
        $objPHPExcel->setActiveSheetIndex(0);
        // ... (kode untuk mengisi data Excel)

        $data = $this->your_model->getData(); // Ganti ini dengan model dan metode yang sesuai

        $row = 2;
        foreach ($data as $item) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $item['column1']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $item['column2']);
            // ... (tambahkan kolom lain sesuai kebutuhan)
            $row++;
        }

        // Set borders for all cells
        $borderStyle = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:B' . ($row - 1))->applyFromArray($borderStyle);

        // Set the header row bold
        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);

        // Set the content type and the file name
        $filename = 'exported_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the file to PHPExcel_IOFactory
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        // Clear PHPExcel Object
        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
    }

    public function halaman_cetak_laporan_permintaan_tanggal()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_permintaan_perusahaan' => " active",
            'laporan_permintaan_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Permintaan Perusahaan';

        $buttonValue = $this->input->post('submit');

        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
        $select = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');

        //$select = $this->db->where('id_owner', '1');
        $data['permintaan'] = $this->Models->Get_All('ht_permintaan', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');

        $pr = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
        $pr = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $pr = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $pr = $this->db->group_by('id_perusahaan');
        $data['pr'] = $this->Models->Get_All('ht_permintaan', $pr);

        //----COUNT DATA----//
        $pi = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $pi = $this->db->group_by('id_perusahaan ');
        $pi = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $pi = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $data['prshn'] = $this->Models->Get_All('dt_permintaan', $pi);

        $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hblm = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hblm = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hblm = $this->db->where('hasil = ', 'Belum');
        $data['hbelum'] = $this->Models->Get_All('dt_permintaan', $hblm);

        $hcancel = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hcancel = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hcancel = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hcancel = $this->db->where('hasil = ', 'Cancel');
        $data['hcancel'] = $this->Models->Get_All('dt_permintaan', $hcancel);

        $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hkki = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hkki = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hkki = $this->db->where('hasil = ', 'Diterima KKI');
        $data['hkki'] = $this->Models->Get_All('dt_permintaan', $hkki);

        $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hlolos = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hlolos = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hlolos = $this->db->where('hasil = ', 'Lolos Test');
        $data['hlolos'] = $this->Models->Get_All('dt_permintaan', $hlolos);

        $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hlolos = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hlolos = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hgagal = $this->db->where('hasil = ', 'Gagal Test');
        $data['hgagal'] = $this->Models->Get_All('dt_permintaan', $hgagal);

        $hmenolak = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $hmenolak = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $hmenolak = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $hmenolak = $this->db->where('hasil = ', 'Menolak');
        $data['hmenolak'] = $this->Models->Get_All('dt_permintaan', $hmenolak);

        $htdkdatang = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
        $htdkdatang = $this->db->where('ht_permintaan.waktu >= "' . $this->input->get('dari') . '"');
        $htdkdatang = $this->db->where('ht_permintaan.waktu <= "' . $sampai . '"');
        $htdkdatang = $this->db->where('hasil = ', 'Tidak Datang Test');
        $data['htdkdatang'] = $this->Models->Get_All('dt_permintaan', $htdkdatang);



        // $this->load->view('master/cetak_laporan_permintaan_tanggal', $data);
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('master/halaman_cetak_laporan_permintaan_tanggal');
        // $this->load->view('templates/footer');

        if ($buttonValue == 'pdf') {
            $this->load->view('master/cetak_laporan_permintaan_tanggal', $data);
        } elseif ($buttonValue == 'excel') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/halaman_cetak_laporan_permintaan_tanggal');
            $this->load->view('templates/footer');
        }
    }

    public function laporan_permintaan_perusahaan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_permintaan_perusahaan' => " active",
            'laporan_permintaan_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Permintaan Perusahaan';

        $select = $this->db->select('*');
        $data['perusahaan'] = $this->db->group_by('nama_perusahaan')->get('ht_permintaan')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_permintaan_perusahaan');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_permintaan_perusahaan()
    {

        $perusahaan = $_GET['id_perusahaan'];

        if ($perusahaan == "all") {
            $select = $this->db->select('*');
            $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
            $data['permintaan'] = $this->Models->Get_All('ht_permintaan', $select);

            //----COUNT DATA----//
            $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hblm = $this->db->where('hasil = ', 'Belum');
            //$hblm = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['per'] = $this->Models->Get_All('dt_permintaan', $hblm);

            $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hblm = $this->db->where('hasil = ', 'Belum');
            //$hblm = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['hbelum'] = $this->Models->Get_All('dt_permintaan', $hblm);

            $hcancel = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            //$hcancel = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hcancel = $this->db->where('hasil = ', 'Cancel');
            $data['hcancel'] = $this->Models->Get_All('dt_permintaan', $hcancel);

            $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            //$hkki = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hkki = $this->db->where('hasil = ', 'Diterima KKI');
            $data['hkki'] = $this->Models->Get_All('dt_permintaan', $hkki);

            $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            //$hlolos = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hlolos = $this->db->where('hasil = ', 'Lolos Test');
            $data['hlolos'] = $this->Models->Get_All('dt_permintaan', $hlolos);

            $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            //$hkki = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hgagal = $this->db->where('hasil = ', 'Gagal Test');
            $data['hgagal'] = $this->Models->Get_All('dt_permintaan', $hgagal);

            $hmenolak = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hmenolak = $this->db->where('hasil = ', 'Menolak');
            //$hmenolak = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['hmenolak'] = $this->Models->Get_All('dt_permintaan', $hmenolak);

            $htdkdatang = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            //$htdkdatang = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $htdkdatang = $this->db->where('hasil = ', 'Tidak Datang Test');
            $data['htdkdatang'] = $this->Models->Get_All('dt_permintaan', $htdkdatang);
        } else {
            $select = $this->db->select('*');
            $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
            $select = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['permintaan'] = $this->Models->Get_All('ht_permintaan', $select);


            //----COUNT DATA----//
            $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hblm = $this->db->where('hasil = ', 'Belum');
            $hblm = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['per'] = $this->Models->Get_All('dt_permintaan', $hblm);

            $hblm = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hblm = $this->db->where('hasil = ', 'Belum');
            $hblm = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['hbelum'] = $this->Models->Get_All('dt_permintaan', $hblm);

            $hcancel = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hcancel = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hcancel = $this->db->where('hasil = ', 'Cancel');
            $data['hcancel'] = $this->Models->Get_All('dt_permintaan', $hcancel);

            $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hkki = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hkki = $this->db->where('hasil = ', 'Diterima KKI');
            $data['hkki'] = $this->Models->Get_All('dt_permintaan', $hkki);

            $hlolos = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hlolos = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hlolos = $this->db->where('hasil = ', 'Lolos Test');
            $data['hlolos'] = $this->Models->Get_All('dt_permintaan', $hlolos);

            $hkki = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hkki = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $hgagal = $this->db->where('hasil = ', 'Gagal Test');
            $data['hgagal'] = $this->Models->Get_All('dt_permintaan', $hgagal);

            $hmenolak = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $hmenolak = $this->db->where('hasil = ', 'Menolak');
            $hmenolak = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $data['hmenolak'] = $this->Models->Get_All('dt_permintaan', $hmenolak);

            $htdkdatang = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan');
            $htdkdatang = $this->db->where('ht_permintaan.id_perusahaan = "' . $_GET['id_perusahaan'] . '"');
            $htdkdatang = $this->db->where('hasil = ', 'Tidak Datang Test');
            $data['htdkdatang'] = $this->Models->Get_All('dt_permintaan', $htdkdatang);



            /*$data['relasi'] = "";
            foreach ($data['perusahaan'] as $d) {
                $data['relasi'] = $d->relasi;
            }*/
        }
        $this->load->view('master/cetak_laporan_permintaan_perusahaan', $data);
    }

    public function cetak_laporan_proses_penempatan_mahasiswa()
    {

        //---KERJA---//
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'mahasiswa.nim=dt_permintaan.nim', 'left');
        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan', 'left');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);

        $select = $this->db->order_by('ht_permintaan.id_permintaan ', 'DESC');
        $select = $this->db->select('mahasiswa.*, ht_permintaan.*, dt_permintaan.status, dt_permintaan.ket, dt_permintaan.tgl_hasil');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);

        //---MAHASISWA---//
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'mahasiswa.nim=dt_permintaan.nim', 'left');
        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan', 'left');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);



        $select = $this->db->order_by('ht_permintaan.id_permintaan ', 'DESC');
        $select = $this->db->limit('1');
        $select = $this->db->select('mahasiswa.*, ht_permintaan.*, dt_permintaan.status, dt_permintaan.ket, dt_permintaan.tgl_hasil');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $select);

        //---USAHA---//
        $select = $this->db->select('*');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);
        $data['usaha'] = $this->Models->Get_All('mahasiswa', $select);


        $this->load->view('master/cetak_laporan_proses_penempatan', $data);
    }

    public function claporan_proses_penempatan_mahasiswa()
    {

        $data['title'] = 'Data Proses Laporan History Mahasiswa';

        //---KERJA---//
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'mahasiswa.nim=dt_permintaan.nim', 'left');
        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan', 'left');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);

        $select = $this->db->order_by('ht_permintaan.id_permintaan ', 'DESC');
        $select = $this->db->select('mahasiswa.*, ht_permintaan.*, dt_permintaan.status, dt_permintaan.ket, dt_permintaan.tgl_hasil');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);

        //---MAHASISWA---//
        $select = $this->db->select('*');
        $select = $this->db->join('dt_permintaan', 'mahasiswa.nim=dt_permintaan.nim', 'left');
        $select = $this->db->join('ht_permintaan', 'dt_permintaan.id_permintaan=ht_permintaan.id_permintaan', 'left');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);



        $select = $this->db->order_by('ht_permintaan.id_permintaan ', 'DESC');
        $select = $this->db->limit('1');
        $select = $this->db->select('mahasiswa.*, ht_permintaan.*, dt_permintaan.status, dt_permintaan.ket, dt_permintaan.tgl_hasil');
        $data['mhs'] = $this->Models->Get_All('mahasiswa', $select);

        //---USAHA---//
        $select = $this->db->select('*');
        $select = $this->db->join('usaha', 'mahasiswa.nim=usaha.nim', 'left');
        $select = $this->db->where('mahasiswa.nim ', $_GET['nim']);
        $data['usaha'] = $this->Models->Get_All('mahasiswa', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/claporan_proses_penempatan_mahasiswa', $data);
        $this->load->view('templates/footer');
    }


    public function laporan_followup_perusahaan()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'laporan_followup_perusahaan' => " active",
            'laporan_followup_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Feedback Perushaaan';



        $select = $this->db->select('*');
        $select = $this->db->group_by('nama_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_followup_perusahaan');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_followup_perusahaan()
    {
        $perusahaan = $_GET['id_telleseling'];

        if ($perusahaan == "all") {
            $select = $this->db->select('*');
            $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('id_perusahaan', $_GET['id_telleseling']);
            $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        }

        $this->load->view('master/cetak_laporan_followup_perusahaan', $data);
    }

    /*public function pilih_grafik()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_grafik' => " active",
            'pilih_grafik_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Grafik';



        $select = $this->db->select('*');
        $data['tahun'] = $this->db->group_by('tahun')->get('vw_permintaan_grafik')->result();



        //-----BEL NOTIFIKASI-----//
       /* $select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);
        $select = $this->db->where('feedback_oleh = ', NULL);
        $data['segera'] = $this->Models->Get_All('telleseling', $select);*/
    //-----------------------//


    /*$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_grafik');
        $this->load->view('templates/footer');*/
    // }


    /*public function grafik()
    {
        $tahun = $_GET['tahun'];

        $data['title'] = 'Grafik';

        if ($tahun == "all") {


            //===PERMINTAAN===//
            $jan = $this->db->select('bulan');
            $jan = $this->db->where('bulan = ', '01');
            $data['januari'] = $this->Models->Get_All('vw_permintaan_grafik', $jan);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $data['februari'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $data['maret'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $data['april'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $data['mei'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $data['juni'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $data['juli'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $data['agustus'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $data['september'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $data['oktober'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $nov = $this->db->select('bulan');
            $nov = $this->db->where('bulan = ', '11');
            $data['november'] = $this->Models->Get_All('vw_permintaan_grafik', $nov);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $data['desember'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            //===LOLOS===//
            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '01');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jan'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['feb'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['mar'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['apr'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['me'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jun'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jul'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['agu'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['sep'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['okt'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '11');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['nov'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['des'] = $this->Models->Get_All('vw_lolos_grafik', $select);
        } else {
            //===PERMINTAAN===//
            $jan = $this->db->select('bulan');
            $jan = $this->db->where('bulan = ', '01');
            $jan = $this->db->where('tahun', $_GET['tahun']);
            $data['januari'] = $this->Models->Get_All('vw_permintaan_grafik', $jan);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['februari'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['maret'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['april'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['mei'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['juni'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['juli'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['agustus'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['september'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['oktober'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            $nov = $this->db->select('bulan');
            $nov = $this->db->where('bulan = ', '11');
            $nov = $this->db->where('tahun', $_GET['tahun']);
            $data['november'] = $this->Models->Get_All('vw_permintaan_grafik', $nov);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $data['desember'] = $this->Models->Get_All('vw_permintaan_grafik', $select);

            //===LOLOS===//
            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '01');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jan'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['feb'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['mar'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['apr'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['me'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jun'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['jul'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['agu'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['sep'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['okt'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '11');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['nov'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['des'] = $this->Models->Get_All('vw_lolos_grafik', $select);
        }

        //-----BEL NOTIFIKASI-----//
       /* $select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);
        $select = $this->db->where('feedback_oleh = ', NULL);
        $data['segera'] = $this->Models->Get_All('telleseling', $select);*/
    //-----------------------//

    /*$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/grafik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script');
    }*/

    public function serapan()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'serapan' => " active",
            'serapan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Serapan';



        $select = $this->db->select('*');
        $data['tahun'] = $this->db->group_by('tahun')->get('vw_serapan_bidang')->result();
        $data['bidang'] = $this->db->group_by('bidang')->get('vw_serapan_bidang')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/serapan');
        $this->load->view('templates/footer');
    }

    public function serapan_ket()
    {
        //$prodi = $_GET['prodi'];
        $tahun = $_GET['tahun'];
        $bidang = $_GET['bidang'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'akumulasi' => " active",
            'akumulasi_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Serapan';

        if ($bidang == "all" && $tahun == "all") {

            $select = $this->db->select('*');
            $select = $this->db->group_by('bidang');
            $select = $this->db->order_by('jumlah', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_bidang', $select);
        } else if ($bidang == "all" && $tahun == $_GET['tahun']) {

            $select = $this->db->select('*');
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->group_by('bidang');
            $select = $this->db->order_by('jumlah', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_bidang', $select);
        } else if ($bidang == $_GET['bidang'] && $tahun == "all") {

            $select = $this->db->select('*');
            $select = $this->db->where('bidang', $_GET['bidang']);
            $select = $this->db->group_by('bidang');
            $select = $this->db->order_by('jumlah', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_bidang', $select);
        } else {

            $select = $this->db->select('*');
            $select = $this->db->where('bidang', $_GET['bidang']);
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->group_by('bidang');
            $select = $this->db->order_by('jumlah', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_bidang', $select);
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/serapan_ket', $data);
        $this->load->view('templates/footer');
    }

    public function prodi()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'prodi' => " active",
            'prodi_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Serapan';



        $select = $this->db->select('*');
        $data['prodi'] = $this->db->group_by('prodi')->get('vw_serapan_jml')->result();
        $data['tahun'] = $this->db->group_by('tahun')->get('vw_serapan_jml')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/prodi');
        $this->load->view('templates/footer');
    }

    public function serapan_prodi()
    {
        $prodi = $_GET['prodi'];
        $tahun = $_GET['tahun'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'prodi' => " active",
            'prodi_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Serapan';

        if ($prodi == "all" && $tahun == "all") {
            $select = $this->db->select('*');

            $select = $this->db->order_by('jml', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_mhs_jml', $select);
        } else if ($prodi == "all" && $tahun == $_GET['tahun']) {
            $select = $this->db->select('*');

            //$select = $this->db->where('prodi', $_GET['prodi']);
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->order_by('jml', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_mhs_jml', $select);
        } else if ($prodi == $_GET['prodi'] && $tahun == "all") {
            $select = $this->db->select('*');

            $select = $this->db->where('prodi', $_GET['prodi']);
            // $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->order_by('jml', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_mhs_jml', $select);
        } else {


            $select = $this->db->select('*');

            $select = $this->db->where('prodi', $_GET['prodi']);
            $select = $this->db->where('tahun', $_GET['tahun']);
            $select = $this->db->order_by('jml', 'DESC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_serapan_mhs_jml', $select);
        }

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/serapan_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kandidat()
    {

        $data['title'] = 'Detail Permintaan Mahasiswa';

        $select = $this->db->select('*, ht_permintaan.id_permintaan as id_permintaan');
        $select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan = dt_permintaan.id_permintaan');
        $select = $this->db->group_by('ht_permintaan.id_permintaan');
        $select = $this->db->where('ht_permintaan.id_permintaan', $_GET['id_permintaan']);
        $data['ht_permintaan'] = $this->Models->get_data('ht_permintaan')->result();
        $data['dt_permintaan'] = $this->Models->get_data('dt_permintaan')->result();;
        $select = $this->db->select('*');
        $data['mahasiswa'] = $this->Models->Get_All('mahasiswa', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/tambah_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function _rules_kandidat()
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required', array(
            'required' => '%s wajib diisi !!'
        ));
    }

    public function SaveKandidat()
    {
        if (count($this->cart->contents()) < 1) {
            $this->session->set_flashdata('emptycart', true);
            redirect('Master/permintaan');
        } else {
            $this->_rules_kandidat();

            //$id = $_GET['id_permintaan'];
            foreach ($this->cart->contents() as $items) {
                $data = array(
                    'id_permintaan' => $_GET['id_permintaan'],
                    'nim' => $items['id'],
                    'nama_mhs' => $items['name'],
                    'kelas' => $items['kelas'],
                    'prodi' => $items['prodi'],
                    'asal_sekolah' => $items['asal_sekolah'],
                    'tahun_akademik' => $items['tahun_akademik'],
                    'qty' => $items['qty'],
                );
                $this->Models->Save($data, 'dt_permintaan');
            }
            $where = array(
                'id_permintaan' => $_GET['id_permintaan'],
                'nim' => 'Hapus',
            );
            $this->Models->delete($where, 'dt_permintaan');

            $this->cart->destroy();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Master/permintaan');
        }
    }

    public function master_prodi()
    {
        $this->sidebar();
        $data = array(
            'master' => "open",
            'master_status' => " active",
            'prodi' => " active",
            'prodi_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Prodi';
        $data['prodi'] = $this->Models->get_data('prodi')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/master_prodi');
        $this->load->view('templates/footer');
    }

    public function prodi_add()
    {
        $data = array(
            'id_prodi' => $this->input->post('id_prodi'),
            'prodi' => $this->input->post('prodi')
        );
        $this->Models->Save($data, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/master_prodi');
    }

    public function prodi_update()
    {
        $where = array(
            'id_prodi' => $this->input->post('id_prodi'),
        );
        $data = array(
            'prodi' => $this->input->post('prodi')
        );
        $this->Models->Update($where, $data, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/master_prodi');
    }

    public function prodi_delete()
    {
        $where = array(
            'id_prodi' => $this->input->post('id_prodi')
        );
        $this->Models->delete($where, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/master_prodi');
    }

    public function kelas()
    {
        $this->sidebar();
        $data = array(
            'master' => "open",
            'master_status' => " active",
            'kelas' => " active",
            'kelas_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Kelas';
        //$data['kelas'] = $this->Models->get_data('prodi')->result();

        $select = $this->db->select('*');
        $data['kelas'] = $this->Models->Get_All('kelas', $select);

        $select = $this->db->select('*');
        $data['prodi'] = $this->Models->Get_All('prodi', $select);




        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/kelas');
        $this->load->view('templates/footer');
    }

    public function kelas_add()
    {
        $id_prodi = $this->input->post('id_prodi');
        $where = array(
            'id_prodi' => $id_prodi,
        );
        $dapat_prodi = $this->Models->Get_Where($where, 'prodi');
        foreach ($dapat_prodi as $items) {
            $nama_prodi = $items->prodi;
        }

        $data = array(
            'id_kelas' => $this->input->post('id_kelas'),
            'id_prodi' => $this->input->post('id_prodi'),
            'prodi' => $nama_prodi,
            'kelas' => $this->input->post('kelas')
        );
        $this->Models->Save($data, 'kelas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/kelas');
    }

    public function kelas_update()
    {
        $id_prodi = $this->input->post('id_prodi');

        $where = array(
            'id_prodi' => $id_prodi,
        );
        $dapat_prodi = $this->Models->Get_Where($where, 'prodi');
        foreach ($dapat_prodi as $items) {
            $prodi = $items->prodi;
        }


        $where = array(
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $data = array(
            'id_prodi' => $this->input->post('id_prodi'),
            'prodi' => $prodi,
            'kelas' => $this->input->post('kelas')
        );
        $this->Models->Update($where, $data, 'kelas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/kelas');
    }

    public function kelas_delete()
    {
        $where = array(
            'id_kelas' => $this->input->post('id_kelas')
        );
        $this->Models->delete($where, 'kelas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/kelas');
    }

    public function laporan_fu_perusahaan()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'fu' => " active",
            'fu_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Follow up Perushaaan';



        $select = $this->db->select('*');
        $select = $this->db->group_by('nama_perusahaan');
        $data['telleseling'] = $this->Models->Get_All('telleseling', $select);



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/laporan_fu_perusahaan');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_fu_perusahaan()
    {
        $perusahaan = $_GET['id_telleseling'];

        if ($perusahaan == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'ASC');
            $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('id_perusahaan', $_GET['id_telleseling']);
            $data['telleseling'] = $this->Models->Get_All('telleseling', $select);
        }

        $this->load->view('master/cetak_laporan_fu_perusahaan', $data);
    }

    public function belum_kerja()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'belum_kerja' => " active",
            'belum_kerja_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Rekapitulasi Belum Kerja';



        $select = $this->db->select('*');
        $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_blm_kerja_akumulasi')->result();



        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/belum_kerja');
        $this->load->view('templates/footer');
    }

    public function rekapitulasi_belum_kerja()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'belum_kerja' => " active",
            'belum_kerja_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Rekapitulasi Belum Kerja';

        if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');

            $select = $this->db->group_by('prodi');
            $select = $this->db->group_by('tahun_akademik');

            $data['mahasiswa'] = $this->Models->Get_All('vw_blm_kerja_akumulasi', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/rekapitulasi_belum_kerja', $data);
            $this->load->view('templates/footer');
        } else {
            $where = array(
                'tahun_akademik' => $tahun_akademik,
            );

            $data['mahasiswa'] = $this->Models->Get_Where($where, 'vw_blm_kerja_akumulasi');

            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->group_by('prodi');
            $data['mahasiswa'] = $this->Models->Get_All('vw_blm_kerja_akumulasi', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/rekapitulasi_belum_kerja', $data);
            $this->load->view('templates/footer');
        }
    }

    public function breakdown()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'breakdown' => " active",
            'breakdown_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Breakdown';
        $data['breakdown'] = $this->Models->get_data('breakdown')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/breakdown');
        $this->load->view('templates/footer');
    }

    public function breakdown_add()
    {
        $data = array(
            'id_breakdown' => $this->input->post('id_breakdown'),
            'triwulan_1' => $this->input->post('triwulan_1'),
            'akumulasi_target_1' => $this->input->post('akumulasi_target_1'),
            'realisasi_1' => $this->input->post('realisasi_1'),
            'triwulan_2' => $this->input->post('triwulan_2'),
            'akumulasi_target_2' => $this->input->post('akumulasi_target_2'),
            'realisasi_2' => $this->input->post('realisasi_2'),
            'triwulan_3' => $this->input->post('triwulan_3'),
            'akumulasi_target_3' => $this->input->post('akumulasi_target_3'),
            'realisasi_3' => $this->input->post('realisasi_3'),
            'triwulan_4' => $this->input->post('triwulan_4'),
            'akumulasi_target_4' => $this->input->post('akumulasi_target_4'),
            'realisasi_4' => $this->input->post('realisasi_4'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
        );
        $this->Models->Save($data, 'breakdown');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/breakdown');
    }

    public function breakdown_id()
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['id_breakdown'] = $_GET['id_breakdown'];

        $data['title'] = 'Breakdown';
        $select = $this->db->select('*');
        $select = $this->db->where('id_breakdown = ', $data['id_breakdown']);
        $data['breakdown'] = $this->Models->Get_All('breakdown', $select);

        if (count($data['breakdown']) == 0) {
            redirect(base_url('Not_Found'));
        }


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/breakdown_id', $data);
        $this->load->view('templates/footer');
    }


    public function breakdown_update()
    {
        $where = array(
            'id_breakdown' => $this->input->post('id_breakdown'),
        );
        $data = array(
            'triwulan_1' => $this->input->post('triwulan_1'),
            'akumulasi_target_1' => $this->input->post('akumulasi_target_1'),
            'realisasi_1' => $this->input->post('realisasi_1'),
            'triwulan_2' => $this->input->post('triwulan_2'),
            'akumulasi_target_2' => $this->input->post('akumulasi_target_2'),
            'realisasi_2' => $this->input->post('realisasi_2'),
            'triwulan_3' => $this->input->post('triwulan_3'),
            'akumulasi_target_3' => $this->input->post('akumulasi_target_3'),
            'realisasi_3' => $this->input->post('realisasi_3'),
            'triwulan_4' => $this->input->post('triwulan_4'),
            'akumulasi_target_4' => $this->input->post('akumulasi_target_4'),
            'realisasi_4' => $this->input->post('realisasi_4'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
        );
        $this->Models->Update($where, $data, 'breakdown');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/breakdown');
    }

    public function breakdown_delete()
    {
        $where = array(
            'id_breakdown' => $this->input->post('id_breakdown')
        );
        $this->Models->delete($where, 'breakdown');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/breakdown');
    }

    public function breakdown_bulan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'breakdown_bulan' => " active",
            'breakdown_bulan_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Breakdown';
        $data['breakdown'] = $this->Models->get_data('breakdown')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/breakdown_bulan');
        $this->load->view('templates/footer');
    }

    public function data_breakdown_bulan()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'breakdown_bulan' => " active",
            'breakdown_bulan_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Breakdown Bulan';

        if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');
            //$select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $data['breakdown'] = $this->Models->Get_All('breakdown', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm10'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '11');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm11'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm12'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '01');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm01'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm02'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm03'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm04'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm05'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm06'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm07'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm08'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm09'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/data_breakdown_bulan', $data);
            $this->load->view('templates/footer');
        } else {
            $where = array(
                'tahun_akademik' => $tahun_akademik,
            );

            $data['breakdown'] = $this->Models->Get_Where($where, 'breakdown');

            $select = $this->db->select('*');
            $select = $this->db->select('tahun_akademik');
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $data['breakdown'] = $this->Models->Get_All('breakdown', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '10');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm10'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '11');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm11'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '12');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm12'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '01');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm01'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '02');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm02'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '03');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm03'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '04');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm04'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '05');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm05'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '06');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm06'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '07');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm07'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '08');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm08'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            $select = $this->db->select('bulan');
            $select = $this->db->where('bulan = ', '09');
            $select = $this->db->where('hasil =', "Lolos Test");
            $data['rm09'] = $this->Models->Get_All('vw_lolos_grafik', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/data_breakdown_bulan', $data);
            $this->load->view('templates/footer');
        }
    }

    public function presentase_penempatan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'presentase_penempatan' => " active",
            'presentase_penempatan_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Presentase Penempatan';
        //$select = $this->db->group_by('tahun_akademik');
        $data['presentase'] = $this->Models->get_data('vw_presentase_penempatan')->result();

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/presentase_penempatan');
        $this->load->view('templates/footer');
    }

    public function presentase_penempatan_data()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'presentase_penempatan' => " active",
            'presentase_penempatan_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Presentase Penempatan';

        if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $data['mahasiswa'] = $this->Models->Get_All('vw_akumulasi_keatas', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            //$select = $this->db->order_by('kki', 'DESC');
            //$select = $this->db->limit('1');
            //$select = $this->db->group_by('kki');
            $data['mahasiswa'] = $this->Models->Get_All('vw_akumulasi_keatas', $select);
            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        }

        /*if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $data['mahasiswa'] = $this->Models->Get_All('vw_presentase_penempatan', $select);

            //-----BEL NOTIFIKASI-----//
            $select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);
            //$select = $this->db->where('feedback_oleh = ', NULL);
            $data['segera'] = $this->Models->Get_All('telleseling', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $data['mahasiswa'] = $this->Models->Get_All('vw_presentase_penempatan', $select);
            //-----BEL NOTIFIKASI-----//
            $select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);
            //$select = $this->db->where('feedback_oleh = ', NULL);
            $data['segera'] = $this->Models->Get_All('telleseling', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        }*/
    }



    /*public function presentase_penempatan_data()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'presentase_penempatan' => " active",
            'presentase_penempatan_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Presentase Penempatan';

        if ($tahun_akademik == "all") {
            $select = $this->db->select('*');
            $data['mahasiswa'] = $this->Models->Get_All('vw_presentase_penempatan', $select);

            //-----BEL NOTIFIKASI-----//
           /* $select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);
            $select = $this->db->where('feedback_oleh = ', NULL);
            $data['segera'] = $this->Models->Get_All('telleseling', $select);*/
    //-----------------------//


    /* $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        } else {
            $select = $this->db->select('*');
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $data['mahasiswa'] = $this->Models->Get_All('vw_presentase_penempatan', $select);
            //-----BEL NOTIFIKASI-----//
           /* $select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);
            $select = $this->db->where('feedback_oleh = ', NULL);
            $data['segera'] = $this->Models->Get_All('telleseling', $select);*/
    //-----------------------//


    /*$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/presentase_penempatan_data', $data);
            $this->load->view('templates/footer');
        }
    }*/

    public function pilih_target()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_target' => " active",
            'pilih_target_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Target';
        //$data['breakdown'] = $this->Models->get_data('breakdown')->result();h

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_target');
        $this->load->view('templates/footer');
    }

    public function pilihan()
    {
        $pilih = "";

        if (isset($_GET['pilih'])) {
            $pilih = $_GET['pilih'];
        }

        $where = array(
            'pilih' => $pilih
        );
        if ($pilih == "triwulan") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_target' => " active",
                'pilih_target_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Target Triwulan';
            $data['breakdown'] = $this->Models->get_data('target')->result();

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/target_triwulan');
            $this->load->view('templates/footer');
        } else {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_target' => " active",
                'pilih_target_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Target Per Bulan';
            $data['breakdown'] = $this->Models->get_data('target')->result();

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/target_bulan');
            $this->load->view('templates/footer');
        }
    }

    public function pilih_permintaan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_permintaan' => " active",
            'pilih_permintaan_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Permintaan';
        //$data['breakdown'] = $this->Models->get_data('breakdown')->result();h

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_permintaan');
        $this->load->view('templates/footer');
    }


    public function pilihan_permintaan()
    {
        $pilih = "";

        if (isset($_GET['pilih'])) {
            $pilih = $_GET['pilih'];
        }

        $where = array(
            'pilih' => $pilih
        );
        if ($pilih == "tanggal") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_permintaan' => " active",
                'pilih_permintaan_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Permintaan Per-Tanggal';

            $data['dari'] = date('Y-m-d');
            $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));
            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/laporan_permintaan_tanggal');
            $this->load->view('templates/footer');
        } else {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_permintaan' => " active",
                'pilih_permintaan_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Permintaan Perusahaan';

            $select = $this->db->select('*');
            $data['perusahaan'] = $this->db->group_by('nama_perusahaan')->get('ht_permintaan')->result();

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/laporan_permintaan_perusahaan');
            $this->load->view('templates/footer');
        }
    }

    public function pilih_followup()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_followup' => " active",
            'pilih_followup_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Follow Up';
        //$data['breakdown'] = $this->Models->get_data('breakdown')->result();h

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_followup');
        $this->load->view('templates/footer');
    }


    public function pilihan_followup()
    {
        $pilih = "";

        if (isset($_GET['pilih'])) {
            $pilih = $_GET['pilih'];
        }

        $where = array(
            'pilih' => $pilih
        );
        if ($pilih == "tanggal") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_followup' => " active",
                'pilih_followup_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Follow Up Per-Tanggal';

            $data['dari'] = date('Y-m-d');
            $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));
            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/laporan_followup');
            $this->load->view('templates/footer');
        } else {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_followup' => " active",
                'pilih_followup_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Follow Up Perusahaan';

            $select = $this->db->select('*');
            $data['perusahaan'] = $this->db->group_by('nama_perusahaan')->get('ht_permintaan')->result();

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/laporan_fu_perusahaan');
            $this->load->view('templates/footer');
        }
    }

    public function pilih_rekapitulasi()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_rekapitulasi' => " active",
            'pilih_rekapitulasi_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Rekapitulasi';
        //$data['breakdown'] = $this->Models->get_data('breakdown')->result();h

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_rekapitulasi');
        $this->load->view('templates/footer');
    }


    public function pilihan_rekapitulasi()
    {
        $pilih = "";

        if (isset($_GET['pilih'])) {
            $pilih = $_GET['pilih'];
        }

        $where = array(
            'pilih' => $pilih
        );
        if ($pilih == "penempatan") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_rekapitulasi' => " active",
                'pilih_rekapitulasi_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Rekapitulasi Penempatan';



            $select = $this->db->select('*');
            $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_akumulasi')->result();



            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/akumulasi');
            $this->load->view('templates/footer');
        } else if ($pilih == "belum_kerja") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_rekapitulasi' => " active",
                'pilih_rekapitulasi_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Rekapitulasi Belum Kerja';



            $select = $this->db->select('*');
            $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_blm_kerja_akumulasi')->result();



            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/belum_kerja');
            $this->load->view('templates/footer');
        } else if ($pilih == "mahasiswa") {
            $sts = "all";
            $thn = "all";
            $prodi = "all";

            if (isset($_GET['sts'])) {
                $sts = $_GET['sts'];
            }
            if (isset($_GET['prodi'])) {
                $prodi = $_GET['prodi'];
            }
            if (isset($_GET['thn'])) {
                $thn = $_GET['thn'];
            }
            $where = array(
                'status' => $sts,
                'prodi' => $prodi,
                'tahun_akademik' => $thn,
            );
            $wheree = array(
                'prodi' => $prodi,
            );
            $pilihsts = array(
                'status' => $sts,
            );
            $pilihthn = array(
                'tahun_akademik' => $thn,
            );
            $sp = array(
                'status' => $sts,
                'prodi' => $prodi,
                //'tahun_akademik' => $thn,
            );
            $st = array(
                'status' => $sts,
                //'prodi' => $prodi,
                'tahun_akademik' => $thn,
            );
            $pt = array(
                //'status' => $sts,
                'prodi' => $prodi,
                'tahun_akademik' => $thn,
            );
            //--------------//

            // $select = $this->db->where('tahun_akademik6');

            //$data['mhs'] = $this->db->get('mahasiswa')->result()

            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_mahasiswa' => " active",
                'pilih_mahasiswa_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Mahasiswa';

            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'ASC');
            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            if ($sts == "all" && $prodi == "all" && $thn == "all") {
                $select = $this->db->select('*');
                $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);
            } elseif ($sts != "all" && $prodi == "all" && $thn == "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($pilihsts, 'vw_mahasiswa');
            } elseif ($sts == "all" && $prodi != "all" && $thn == "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($wheree, 'vw_mahasiswa');
            } elseif ($sts == "all" && $prodi == "all" && $thn != "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($pilihthn, 'vw_mahasiswa');
            } elseif ($sts != "all" && $prodi != "all" && $thn == "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($sp, 'vw_mahasiswa');
            } elseif ($sts != "all" && $prodi == "all" && $thn != "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($st, 'vw_mahasiswa');
            } elseif ($sts == "all" && $prodi != "all" && $thn != "all") {
                $data['mahasiswa'] = $this->Models->Get_Where($pt, 'vw_mahasiswa');
            } else {
                $data['mahasiswa'] = $this->Models->Get_Where($where, 'vw_mahasiswa');
            }

            //===FILTER===//

            $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_mahasiswa')->result();
            $data['prodi'] = $this->db->group_by('prodi')->get('vw_mahasiswa')->result();


            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa');
            $this->load->view('templates/footer');
        } else if ($pilih == "penerima_lulusan") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_rekapitulasi' => " active",
                'pilih_rekapitulasi_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Laporan Penerima Lulusan';

            //$select = $this->db->select('*');
            //$data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('dt_permintaan')->result();


            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/laporan_penerima_lulusan');
            $this->load->view('templates/footer');
        }
    }

    public function cetak_laporan_penerima_lulusan()
    {
        /*$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $select = $this->db->select('*');
        //$select = $this->db->join('dt_permintaan', 'ht_permintaan.id_permintaan=dt_permintaan.id_permintaan');
        $select = $this->db->where('vw_penerima_lulusan.tgl_hasil >= "' . $this->input->get('dari') . '"');
        $select = $this->db->where('vw_penerima_lulusan.tgl_hasil <= "' . $sampai . '"');
        $select = $this->db->group_by('id_perusahaan');
        $data['penerimaan'] = $this->Models->Get_All('vw_penerima_lulusan', $select);
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');

        $hblm = $this->db->join('vw_kki_penerima_lulusan', 'vw_kki_penerima_lulusan.id_perusahaan=vw_penerima_lulusan.id_perusahaan');
        $kki = $this->db->where('vw_penerima_lulusan.tgl_hasil >= "' . $this->input->get('dari') . '"');
        $kki = $this->db->where('vw_penerima_lulusan.tgl_hasil <= "' . $sampai . '"');
        $kki = $this->db->where('vw_penerima_lulusan.status = ', 'KKI');*/
        // $select = $this->db->group_by('vw_penerima_lulusan.id_perusahaan');
        $select = $this->db->select('*');
        $data['penerimaan'] = $this->Models->Get_All('perusahaan', $select);

        $this->load->view('master/cetak_laporan_penerima_lulusan', $data);
    }


    public function cetak_laporan_mahasiswa()
    {
        $sts = "all";
        $thn = "all";
        $prodi = "all";

        if (isset($_GET['sts'])) {
            $sts = $_GET['sts'];
        }
        if (isset($_GET['prodi'])) {
            $prodi = $_GET['prodi'];
        }
        if (isset($_GET['thn'])) {
            $thn = $_GET['thn'];
        }
        $where = array(
            'status' => $sts,
            'prodi' => $prodi,
            'tahun_akademik' => $thn,
        );
        $wheree = array(
            'prodi' => $prodi,
        );
        $pilihsts = array(
            'status' => $sts,
        );
        $pilihthn = array(
            'tahun_akademik' => $thn,
        );
        $sp = array(
            'status' => $sts,
            'prodi' => $prodi,
            //'tahun_akademik' => $thn,
        );
        $st = array(
            'status' => $sts,
            //'prodi' => $prodi,
            'tahun_akademik' => $thn,
        );
        $pt = array(
            //'status' => $sts,
            'prodi' => $prodi,
            'tahun_akademik' => $thn,
        );
        //--------------//

        // $select = $this->db->where('tahun_akademik6');

        //$data['mhs'] = $this->db->get('mahasiswa')->result()

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_mahasiswa' => " active",
            'pilih_mahasiswa_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Laporan Mahasiswa';

        $select = $this->db->select('*');
        $select = $this->db->order_by('id_perusahaan', 'ASC');
        $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

        if ($sts == "all" && $prodi == "all" && $thn == "all") {
            $select = $this->db->select('*');
            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);
        } elseif ($sts != "all" && $prodi == "all" && $thn == "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($pilihsts, 'vw_mahasiswa');
        } elseif ($sts == "all" && $prodi != "all" && $thn == "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($wheree, 'vw_mahasiswa');
        } elseif ($sts == "all" && $prodi == "all" && $thn != "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($pilihthn, 'vw_mahasiswa');
        } elseif ($sts != "all" && $prodi != "all" && $thn == "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($sp, 'vw_mahasiswa');
        } elseif ($sts != "all" && $prodi == "all" && $thn != "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($st, 'vw_mahasiswa');
        } elseif ($sts == "all" && $prodi != "all" && $thn != "all") {
            $data['mahasiswa'] = $this->Models->Get_Where($pt, 'vw_mahasiswa');
        } else {
            $data['mahasiswa'] = $this->Models->Get_Where($where, 'vw_mahasiswa');
        }

        //===FILTER===//

        $data['tahun_akademik'] = $this->db->group_by('tahun_akademik')->get('vw_mahasiswa')->result();
        $data['prodi'] = $this->db->group_by('prodi')->get('vw_mahasiswa')->result();


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/cetak_laporan_mahasiswa');
        $this->load->view('templates/footer');
    }


    public function pilihan_mahasiswa()
    {
        $status = $_GET['status'];
        $prodi = $_GET['prodi'];
        $tahun_akademik = $_GET['tahun_akademik'];

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_mahasiswa' => " active",
            'pilih_mahasiswa_dot' => "dot-",
        );
        $this->session->set_userdata($data);
        $data['title'] = 'Rekapitulasi Status Mahasiswa';

        if ($status == "all" && $prodi == "all" && $tahun_akademik == "all") {
            $select = $this->db->select('*');
            $select = $this->db->order_by('id_perusahaan', 'ASC');
            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == "all" && $prodi == $_GET['prodi'] && $tahun_akademik == $_GET['tahun_akademik']) {
            $where = array(
                'prodi' => $prodi,
                'tahun_akademik' => $tahun_akademik,
            );

            $select = $this->db->select('*');

            $select = $this->db->where('prodi', $_GET['prodi']);
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == $_GET['status'] && $prodi == "all" && $tahun_akademik == $_GET['tahun_akademik']) {
            $where = array(
                'status' => $status,
                'tahun_akademik' => $tahun_akademik,
            );

            $select = $this->db->select('*');

            $select = $this->db->where('status', $_GET['status']);
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
             $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == $_GET['status'] && $prodi == $_GET['prodi'] && $tahun_akademik == "all") {
            $where = array(
                'prodi' => $prodi,
                'status' => $status,
            );

            $select = $this->db->select('*');

            $select = $this->db->where('prodi', $_GET['prodi']);
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == "all" && $prodi == $_GET['prodi'] && $tahun_akademik == "all") {
            $where = array(
                'prodi' => $prodi,
                //'tahun_akademik' => $tahun_akademik,
            );

            $select = $this->db->select('*');

            $select = $this->db->where('prodi', $_GET['prodi']);
            //$select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == $_GET['status'] && $prodi == "all" && $tahun_akademik == "all") {
            $where = array(
                'status' => $status,
                //'tahun_akademik' => $tahun_akademik,
            );

            $select = $this->db->select('*');

            $select = $this->db->where('status', $_GET['status']);
            //$select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else if ($status == "all" && $prodi == "all" && $tahun_akademik == $_GET['prodi']) {
            $where = array(
                //'prodi' => $prodi,
                'tahun_akademik' => $tahun_akademik,
            );

            $select = $this->db->select('*');

            //$select = $this->db->where('status', $_GET['status']);
            $select = $this->db->where('tahun_akademik', $_GET['tahun_akademik']);
            $select = $this->db->order_by('id_perusahaan', 'ASC');

            $data['mahasiswa'] = $this->Models->Get_All('vw_mahasiswa', $select);

            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
            $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/cetak_laporan_mahasiswa', $data);
            $this->load->view('templates/footer');
        }
    }


    public function pilih_serapan()
    {
        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_serapan' => " active",
            'pilih_serapan_dot' => "dot-",

        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Serapan';
        //$data['breakdown'] = $this->Models->get_data('breakdown')->result();h

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_serapan');
        $this->load->view('templates/footer');
    }


    public function pilihan_serapan()
    {
        $pilih = "";

        if (isset($_GET['pilih'])) {
            $pilih = $_GET['pilih'];
        }

        $where = array(
            'pilih' => $pilih
        );
        if ($pilih == "bidang") {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_serapan' => " active",
                'pilih_serapan_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Serapan';



            $select = $this->db->select('*');
            $data['tahun'] = $this->db->group_by('tahun')->get('vw_serapan_bidang')->result();
            $data['bidang'] = $this->db->group_by('bidang')->get('vw_serapan_bidang')->result();



            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/serapan');
            $this->load->view('templates/footer');
        } else {
            $this->sidebar();
            $data = array(
                'rekap' => "open",
                'rekap_status' => " active",
                'pilih_serapan' => " active",
                'pilih_serapan_dot' => "dot-",

            );
            $this->session->set_userdata($data);

            $data['title'] = 'Serapan';



            $select = $this->db->select('*');
            $data['prodi'] = $this->db->group_by('prodi')->get('vw_serapan_jml')->result();
            $data['tahun'] = $this->db->group_by('tahun')->get('vw_serapan_jml')->result();



            //-----BEL NOTIFIKASI-----//
            /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
            $select = $this->db->where('status = ', 'Non Aktif');
            $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
            //-----------------------//


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/prodi');
            $this->load->view('templates/footer');
        }
    }


    public function target_add()
    {
        $data = array(
            'id_target' => $this->input->post('id_target'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'minggu1' => $this->input->post('minggu1'),
            'minggu2' => $this->input->post('minggu2'),
            'minggu3' => $this->input->post('minggu3'),
            'minggu4' => $this->input->post('minggu4'),
            'minggu5' => $this->input->post('minggu5'),
            'minggu6' => $this->input->post('minggu6'),
            'minggu7' => $this->input->post('minggu7'),
            'minggu8' => $this->input->post('minggu8'),
            'minggu9' => $this->input->post('minggu9'),
            'minggu10' => $this->input->post('minggu10'),
            'minggu11' => $this->input->post('minggu11'),
            'minggu12' => $this->input->post('minggu12'),
        );
        $this->Models->Save($data, 'target');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/pilihan');
    }

    public function target_bulan_id()
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['id_target'] = $_GET['id_target'];

        $data['title'] = 'Target Per Bulan';
        $select = $this->db->select('*');
        $select = $this->db->where('id_target = ', $data['id_target']);
        $data['breakdown'] = $this->Models->Get_All('target', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '10');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm10'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '11');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm11'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '12');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm12'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '01');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm01'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '02');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm02'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '03');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm03'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '04');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm04'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '05');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm05'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '06');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm06'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '07');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm07'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '08');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm08'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '09');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm09'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        if (count($data['breakdown']) == 0) {
            redirect(base_url('Not_Found'));
        }


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/target_id', $data);
        $this->load->view('templates/footer');
    }

    public function target_update()
    {
        $where = array(
            'id_target' => $this->input->post('id_target'),
        );
        $data = array(
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'minggu1' => $this->input->post('minggu1'),
            'minggu2' => $this->input->post('minggu2'),
            'minggu3' => $this->input->post('minggu3'),
            'minggu4' => $this->input->post('minggu4'),
            'minggu5' => $this->input->post('minggu5'),
            'minggu6' => $this->input->post('minggu6'),
            'minggu7' => $this->input->post('minggu7'),
            'minggu8' => $this->input->post('minggu8'),
            'minggu9' => $this->input->post('minggu9'),
            'minggu10' => $this->input->post('minggu10'),
            'minggu11' => $this->input->post('minggu11'),
            'minggu12' => $this->input->post('minggu12'),
        );
        $this->Models->Update($where, $data, 'target');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/pilihan');
    }

    public function target_delete()
    {
        $where = array(
            'id_target' => $this->input->post('id_target')
        );
        $this->Models->delete($where, 'target');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('master/pilihan');
    }

    public function target_triwulan_id()
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['id_target'] = $_GET['id_target'];

        $data['title'] = 'Target Triwulan';
        $select = $this->db->select('*');
        $select = $this->db->where('id_target = ', $data['id_target']);
        $data['breakdown'] = $this->Models->Get_All('target', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '10');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm10'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '11');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm11'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '12');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm12'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '01');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm01'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '02');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm02'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '03');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm03'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '04');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm04'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '05');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm05'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '06');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm06'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '07');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm07'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '08');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm08'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '09');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['rm09'] = $this->Models->Get_All('vw_lolos_grafik', $select);

        if (count($data['breakdown']) == 0) {
            redirect(base_url('Not_Found'));
        }


        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/target_triwulan_id', $data);
        $this->load->view('templates/footer');
    }

    public function pilih_grafik()
    {


        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_grafik' => " active",
            'pilih_grafik_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Pilih Grafik';

        $data['dari'] = date('Y-m-d');
        $data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_grafik');
        $this->load->view('templates/footer');
    }

    public function grafik()
    {
        //$tahun = $_GET['tahun'];
        $sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
        $data['dari'] = $this->input->get('dari');
        $data['sampai'] = $this->input->get('sampai');

        /*$this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_grafik' => " active",
            'pilih_grafik_dot' => "dot-",
        );
        $this->session->set_userdata($data);*/

        $data['title'] = 'Grafik Permintaan Perusahaan';

        //if ($tahun == "all") {
        // } else {
        //===PERMINTAAN===//
        $jan = $this->db->select('bulan');
        $jan = $this->db->where('bulan = ', '01');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['januari'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $jan);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '02');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['februari'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '03');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['maret'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '04');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['april'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '05');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['mei'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '06');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['juni'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '07');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['juli'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '08');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['agustus'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '09');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['september'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '10');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['oktober'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        $nov = $this->db->select('bulan');
        $nov = $this->db->where('bulan = ', '11');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['november'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $nov);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '12');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['desember'] = $this->Models->Get_All('vw_permintaan_grafik_tahun', $select);

        //===LOLOS===//
        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '01');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['jan'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '02');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['feb'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '03');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['mar'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '04');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['apr'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '05');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['me'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '06');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['jun'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '07');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['jul'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '08');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['agu'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '09');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['sep'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '10');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['okt'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '11');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['nov'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '12');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $select = $this->db->where('hasil =', "Lolos Test");
        $data['des'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);
        // }

        //===KANDIDAT===//
        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '01');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['j'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '02');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['f'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '03');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['m'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '04');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['a'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '05');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['mee'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '06');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['juu'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '07');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['jull'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '08');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['ag'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '09');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['se'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '10');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['ok'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '11');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['no'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        $select = $this->db->select('bulan');
        $select = $this->db->where('bulan = ', '12');
        $jan = $this->db->where('tahun >="' . $this->input->get('dari') . '"');
        $jan = $this->db->where('tahun <="' . $sampai . '"');
        $data['de'] = $this->Models->Get_All('vw_lolos_grafik_tahun', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/grafik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script');
    }

    public function permintaan_update_aksi()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $where = array(
            'id_perusahaan' => $id_perusahaan,
        );
        $dapat_perusahaan = $this->Models->Get_Where($where, 'perusahaan');
        foreach ($dapat_perusahaan as $items) {
            $namaperusahaan = $items->nama_perusahaan;
        }

        $where = array(
            'id_permintaan' => $this->input->post('id_permintaan'),
        );
        $data = array(
            'id_perusahaan' => $this->input->post('id_perusahaan'),
            'nama_perusahaan' => $namaperusahaan,
            'bidang' => $this->input->post('bidang'),
            'kota' => $this->input->post('kota'),
            'relasi' => $this->input->post('relasi'),
            'alamat' => $this->input->post('alamat'),
            'kontak_person' => $this->input->post('kontak_person'),
            'no_telp' => $this->input->post('no_telp'),
            //'tanggal_fu' => $this->input->post('tanggal_fu'),
            'posisi_yang_dibutuhkan' => $this->input->post('posisi_yang_dibutuhkan'),
            'kualifikasi' => $this->input->post('kualifikasi'),
            //'nama' => $this->input->post('nama'),
        );
        $this->Models->Update($where, $data, 'ht_permintaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Master/permintaan');
    }

    public function pilih_perusahaan()
    {

        $this->sidebar();
        $data = array(
            'rekap' => "open",
            'rekap_status' => " active",
            'pilih_perusahaan' => " active",
            'pilih_perusahaan_dot' => "dot-",
        );
        $this->session->set_userdata($data);

        $data['title'] = 'Rekap Perusahaan';
        $data['perusahaan'] = $this->Models->get_data('perusahaan')->result();

        $select = $this->db->select('*');
        $select = $this->db->order_by('id_perusahaan', 'DESC');
        $data['perusahaan'] = $this->Models->Get_All('perusahaan', $select);

        //-----BEL NOTIFIKASI-----//
        /*$select = $this->db->where('oleh = ', NULL);
        $data['belum'] = $this->Models->Get_All('telleseling', $select);*/
        $select = $this->db->where('status = ', 'Non Aktif');
        $data['nonaktif'] = $this->Models->Get_All('perusahaan', $select);
        //-----------------------//

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pilih_perusahaan');
        $this->load->view('templates/footer');
    }
}
