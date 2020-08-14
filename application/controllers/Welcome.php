<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

	public function index()
	{
		if ($this->session->userdata('Login')) {
			$data['username'] = $this->session->userdata('username');
			$data['foto'] = $this->session->userdata('foto');
			$data['content'] = 'VBlank';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
	}


	// public function json_siswa()
	//     {
	//         $siswa=urldecode($this->uri->segment(3));
	//         $setting_ta = "tbl_siswa.tahun_ajaran = tbl_setting_ta.tahun_ajaran";
	//         /*$jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nisn', $siswa)->result();*/
	//         $jsondata = $this->MSudi->GetDataJoin('tbl_siswa','tbl_setting_ta', $setting_ta)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }


	// public function search()
	//     {
	//         $search=urldecode($this->uri->segment(3));
	//         $jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nis', $search)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }
	// public function search_tahun_ajaran()
	//     {
	//         $datapembayaran=urldecode($this->uri->segment(3));
	//         $jsondata = $this->MSudi->GetDataLike('tbl_setting_ta', 'tahun_ajaran', $datapembayaran)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }

	// public function json_login()
	//     {
	//     	$where = array(
	//     		'username'=>urldecode($this->uri->segment(3)),
	//     		'password'=>urldecode($this->uri->segment(4))
	//     	);
	//         /*$login=urldecode($this->uri->segment(3));*/
	//         /*$jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nisn', $siswa)->result();*/
	//         $jsondata = $this->MSudi->GetDataWhere('tbl_users',$where,$where)->num_rows();
	//         if ($jsondata==1){
	//         	$result= array(
	//         		[
	//         			'result'=> 'valid'
	//         		]
	//         	);
	//         }
	//         else{
	//         	$result = array(
	//         		[
	//         			'result'=>'invalid'
	//         		]
	//         	);
	//         }
	//         echo json_encode($result);
	/*   $data['json'] = json_encode($jsondata);
			
        $this->load->view('json',$data);*/
	// }
	// public function json_add_user()
	// 	{
	// 		 $add['username']=urldecode($this->uri->segment(3));
	//          $add['password']=urldecode($this->uri->segment(4));


	//     	$this->MSudi->AddData('tbl_users',$add);
	// 	}

	// 	public function DataMenu()
	// 	{
	// 			$data['username']=$this->session->userdata('username');
	// 			$data['foto']=$this->session->userdata('foto');
	// 			$data['content']='VBlank';
	// 			$this->load->view('welcome_message',$data);
	// 		}


	public function DataUser()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		if ($this->uri->segment(4) == 'view') {
			$kd_user = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_users', 'kd_user', $kd_user)->row();
			$data['detail']['kd_user'] = $tampil->kd_user;
			$data['detail']['username'] = $tampil->username;
			$data['detail']['password'] = $tampil->password;
			$data['detail']['acc_lvl'] = $tampil->acc_lvl;
			$data['detail']['foto'] = $tampil->foto;
			$data['content'] = 'VFormUpdateUser';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataUser'] = $this->MSudi->GetData('tbl_users');
			$data['content'] = 'VUser';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddUser()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddUser';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataUser()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		$add['kd_user'] = $this->input->post('kd_user');
		$add['username'] = $this->input->post('username');
		$add['password'] = $this->input->post('password');
		$add['acc_lvl'] = $this->input->post('acc_lvl');
		// $add['foto_user']= $this->input->post('foto_user');
		// $add['st_user']= $this->input->post('st_user');  

		$config['upload_path'] = '././upload';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('Welcome/VFormAddUser'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}
		$this->MSudi->AddData('tbl_users', $add);
		\redirect(site_url('Welcome/DataUser'));
	}

	public function UpdateDataUser()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_user = $this->input->post('kd_user');
		$update['username'] = $this->input->post('username');
		$update['password'] = $this->input->post('password');
		$update['acc_lvl'] = $this->input->post('acc_lvl');
		//$update['foto_user']= $this->input->post('foto_user');
		// $update['st_user']= $this->input->post('st_user');

		$config['upload_path'] = '././upload';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect(site_url('Welcome/VFormUpdateUser'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}

		$this->MSudi->UpdateData('tbl_users', 'kd_user', $kd_user, $update);
		redirect(site_url('Welcome/DataUser'));
	}


	public function DeleteDataUser()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		$kd_user = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_users', 'kd_user', $kd_user);
		redirect(site_url('Welcome/DataUser'));
	}


	// Data Produk
	public function DataProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_produk = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_produk', 'kd_produk', $kd_produk)->row();
			$data['kd_jenis'] = $this->MSudi->GetData('tbl_jenis_produk');
			$data['jenis_produk'] = $this->MSudi->GetData('tbl_jenis_produk');
			$data['detail']['kd_produk'] = $tampil->kd_produk;
			$data['detail']['kd_jenis_produk'] = $tampil->kd_jenis_produk;
			$data['detail']['nama_produk'] = $tampil->nama_produk;
			$data['detail']['foto'] = $tampil->foto;
			$data['detail']['keterangan'] = $tampil->keterangan;
			$data['content'] = 'VFormUpdateProduk';
		} else {
			$join = "tbl_jenis_produk.kd_jenis = tbl_produk.kd_jenis_produk";
			$data['DataProduk'] = $this->MSudi->GetDataJoin('tbl_produk', 'tbl_jenis_produk', $join)->result();
			$data['content'] = 'VProduk';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddProduk';
		$data['jenis_produk'] = $this->MSudi->GetData('tbl_jenis_produk');
		$data['kd_jenis'] = $this->MSudi->GetData('tbl_jenis_produk');

		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$add['kd_produk'] = $this->input->post('kd_produk');
		$add['kd_jenis_produk'] = $this->input->post('kd_jenis_produk');

		$add['nama_produk'] = $this->input->post('nama_produk');
		$add['foto'] = $this->input->post('foto');
		$add['keterangan'] = $this->input->post('keterangan');


		$config['upload_path'] = '././upload/produk';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('Welcome/VFormAddProduk'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}
		$this->MSudi->AddData('tbl_produk', $add);
		redirect(site_url('Welcome/DataProduk'));
	}
	public function UpdateDataProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_produk = $this->input->post('kd_produk');
		$update['kd_jenis_produk'] = $this->input->post('kd_jenis_produk');
		$update['nama_produk'] = $this->input->post('nama_produk');
		$update['keterangan'] = $this->input->post('keterangan');
		//$update['foto_user']= $this->input->post('foto_user');
		// $update['st_user']= $this->input->post('st_user');

		$config['upload_path'] = '././upload/produk';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect(site_url('Welcome/VFormUpdateUser'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}

		$this->MSudi->UpdateData('tbl_produk', 'kd_produk', $kd_produk, $update);
		redirect(site_url('Welcome/DataProduk'));
	}
	public function DeleteDataProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_produk = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_produk', 'kd_produk', $kd_produk);
		redirect(site_url('Welcome/DataProduk'));
	}

	public function DataSlide()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_slide = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_slide', 'kd_slide', $kd_slide)->row();
			$data['detail']['kd_slide'] = $tampil->kd_slide;
			$data['detail']['foto'] = $tampil->foto;
			$data['content'] = 'VFormUpdateSlide';
		} else {
			$data['DataSlide'] = $this->MSudi->GetData('tbl_slide');
			$data['content'] = 'VSlide';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddSlide()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddSlide';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataSlide()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$add['kd_slide'] = $this->input->post('kd_slide');
		$add['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/slide';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('Welcome/VFormAddSlide'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}
		$this->MSudi->AddData('tbl_Slide', $add);
		redirect(site_url('Welcome/DataSlide'));
	}
	public function UpdateDataSlide()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$kd_slide = $this->input->post('kd_slide');
		$update['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/slide';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect(site_url('Welcome/VFormUpdateUser'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}

		$this->MSudi->UpdateData('tbl_slide', 'kd_slide', $kd_slide, $update);
		redirect(site_url('Welcome/DataSlide'));
	}
	public function DeleteDataSlide()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_slide = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_slide', 'kd_slide', $kd_slide);
		redirect(site_url('Welcome/DataSlide'));
	}




	public function DataCostumer()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_costumer = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_costumer', 'kd_costumer', $kd_costumer)->row();
			$data['detail']['kd_costumer'] = $tampil->kd_costumer;
			$data['detail']['foto'] = $tampil->foto;
			$data['content'] = 'VFormUpdateCostumer';
		} else {
			$data['DataCostumer'] = $this->MSudi->GetData('tbl_costumer');
			$data['content'] = 'VCostumer';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddCostumer()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddCostumer';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataCostumer()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$add['kd_costumer'] = $this->input->post('kd_costumer');
		$add['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/costumer';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('Welcome/VFormAddProduk'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}
		$this->MSudi->AddData('tbl_costumer', $add);
		redirect(site_url('Welcome/DataCostumer'));
	}
	public function UpdateDataCostumer()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$kd_costumer = $this->input->post('kd_costumer');
		$update['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/costumer';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect(site_url('Welcome/VFormUpdateUser'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}

		$this->MSudi->UpdateData('tbl_costumer', 'kd_costumer', $kd_costumer, $update);
		redirect(site_url('Welcome/DataCostumer'));
	}
	public function DeleteDataCostumer()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_costumer = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_costumer', 'kd_costumer', $kd_costumer);
		redirect(site_url('Welcome/DataCostumer'));
	}




	public function DataPrincipal()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_principal = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_principal', 'kd_principal', $kd_principal)->row();
			$data['detail']['kd_principal'] = $tampil->kd_principal;
			$data['detail']['foto'] = $tampil->foto;
			$data['content'] = 'VFormUpdatePrincipal';
		} else {
			$data['DataPrincipal'] = $this->MSudi->GetData('tbl_principal');
			$data['content'] = 'VPrincipal';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddPrincipal()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddPrincipal';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataPrincipal()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$add['kd_principal'] = $this->input->post('kd_principal');
		$add['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/principal';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('Welcome/VFormAddPrincipal'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}
		$this->MSudi->AddData('tbl_principal', $add);
		redirect(site_url('Welcome/DataPrincipal'));
	}
	public function UpdateDataPrincipal()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$kd_principal = $this->input->post('kd_principal');
		$update['foto'] = $this->input->post('foto');

		$config['upload_path'] = '././upload/principal';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect(site_url('Welcome/VFormUpdateUser'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}

		$this->MSudi->UpdateData('tbl_principal', 'kd_principal', $kd_principal, $update);
		redirect(site_url('Welcome/DataPrincipal'));
	}
	public function DeleteDataPrincipal()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_principal = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_principal', 'kd_principal', $kd_principal);
		redirect(site_url('Welcome/DataPrincipal'));
	}




	public function DataJenisProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_jenis = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_jenis_produk', 'kd_jenis', $kd_jenis)->row();
			$data['kd_kategori'] = $this->MSudi->GetData('tbl_kategori');
			$data['nama_kategori'] = $this->MSudi->GetData('tbl_kategori');
			$data['detail']['kd_jenis'] = $tampil->kd_jenis;
			$data['detail']['jenis_produk'] = $tampil->jenis_produk;

			$data['content'] = 'VFormUpdateJenisProduk';
		} else {
			$join = "tbl_kategori.kd_kategori = tbl_jenis_produk.kd_jenis  ";
			$data['DataJenisProduk'] = $this->MSudi->GetDataJoin('tbl_jenis_produk', 'tbl_kategori', $join)->result();
			$data['content'] = 'VJenisProduk';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddJenisProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		$data['content'] = 'VFormAddJenisProduk';
		$data['kd_kategori'] = $this->MSudi->GetData('tbl_kategori');
		$data['nama_kategori'] = $this->MSudi->GetData('tbl_kategori');
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataJenisProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$add['kd_jenis'] = $this->input->post('kd_jenis');
		$add['jenis_produk'] = $this->input->post('jenis_produk');
		$add['kd_kategori'] = $this->input->post('kd_kategori');


		$this->MSudi->AddData('tbl_jenis_produk', $add);
		redirect(site_url('Welcome/DataJenisProduk'));
	}
	public function UpdateDataJenisProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$kd_jenis = $this->input->post('kd_jenis');
		$update['jenis_produk'] = $this->input->post('jenis_produk');
		$update['kd_kategori'] = $this->input->post('kd_kategori');

		$this->MSudi->UpdateData('tbl_jenis_produk', 'kd_jenis', $kd_jenis, $update);
		redirect(site_url('Welcome/DataJenisProduk'));
	}
	public function DeleteDataJenisProduk()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_jenis = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_jenis_produk', 'kd_jenis', $kd_jenis);
		redirect(site_url('Welcome/DataJenisProduk'));
	}




	public function DataKategori()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		if ($this->uri->segment(4) == 'view') {
			$kd_kategori = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_kategori', 'kd_kategori', $kd_kategori)->row();
			$data['detail']['kd_kategori'] = $tampil->kd_kategori;
			$data['detail']['nama_kategori'] = $tampil->nama_kategori;
			$data['content'] = 'VFormUpdateKategori';
		} else {
			$data['DataKategori'] = $this->MSudi->GetData('tbl_kategori');
			$data['content'] = 'VKategori';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddKategori()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$data['content'] = 'VFormAddKategori';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataKategori()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$add['kd_kategori'] = $this->input->post('kd_kategori');
		$add['nama_kategori'] = $this->input->post('nama_kategori');


		$this->MSudi->AddData('tbl_kategori', $add);
		redirect(site_url('Welcome/DataKategori'));
	}
	public function UpdateDataKategori()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');


		$kd_kategori = $this->input->post('kd_kategori');
		$update['nama_kategori'] = $this->input->post('nama_kategori');

		$this->MSudi->UpdateData('tbl_kategori', 'kd_kategori', $kd_kategori, $update);
		redirect(site_url('Welcome/DataKategori'));
	}
	public function DeleteDataKategori()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');

		$kd_kategori = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_kategori', 'kd_kategori', $kd_kategori);
		redirect(site_url('Welcome/DataKategori'));
	}




	public function Logout()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}
}
