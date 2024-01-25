public function add_ktp_rusak()
	{
		$today = date('Ymd');
		$pengajuan = 'Pengajuan Kerusakan Kartu Tanda Penduduk';

		$data=array(
      	'nik'    			=>  $this->input->post('nik'),
      	'tgl_pengajuan'    	=>  $today,
      	'pengajuan'    		=>  $pengajuan,
      	'nama'    			=>  $this->input->post('nama')
    	);
    	$this->m->Save($data, 'pengajuan');
		$id_pengajuan = $this->db->insert_id();

		$data2=array(
      		'nik'    			=>  $this->input->post('nik'),
      		'id_pengajuan'    	=>  $id_pengajuan,
      		'tgl_pengajuan'    	=>  $today,
      		'pengajuan'    		=>  $pengajuan,
      		'nama'    			=>  $this->input->post('nama'),
      		'no_whatsapp'		=>  $this->input->post('no_whatsapp'),
      		'alamat'			=>  $this->input->post('alamat'),
      		'email'				=>  $this->input->post('email')
    	);
    	if(!empty($_FILES['ktp_rusak']['name']))
		{
			$path = 'assets/berkas/ktp_rusak';
			$name = 'ktp_rusak';
			$name_file = $this->input->post('nama').'-ktp_rusak';
			$upload = $this->_do_upload($path,$name,$name_file);
			$data['ktp_rusak'] = $upload;
		}
    	$this->m->Save($data2, 'ktp_rusak');
    	$this->session->set_flashdata('pesan', 'Data berhasil disimpan!!');
	    $this->session->set_flashdata('pesann', 'Anda bisa melakukan perubahan data selama status masih Belum diverifikasi');
    	redirect(base_url().'user/pengajuan_saya');
	}