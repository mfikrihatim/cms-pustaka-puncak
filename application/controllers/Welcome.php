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
			$data['nama'] = $this->session->userdata('nama');
			$data['foto_profile'] = $this->session->userdata('foto_profile');
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
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		if ($this->uri->segment(4) == 'view') {
			$id_user = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_user', 'id_user', $id_user)->row();
			$data['detail']['id_user'] = $tampil->id_user;
			$data['detail']['email_user'] = $tampil->email_user;
			$data['detail']['nama'] = $tampil->nama;
			$data['detail']['password'] = $tampil->password;
			$data['detail']['tlp_user'] = $tampil->tlp_user;
			$data['detail']['kode_verifikasi'] = $tampil->kode_verifikasi;
			$data['detail']['tgl_verifikasi'] = $tampil->tgl_verifikasi;
			$data['detail']['foto_profile'] = $tampil->foto_profile;
			$data['detail']['alamat'] = $tampil->alamat;
			$data['detail']['tmp_lahir'] = $tampil->tmp_lahir;
			$data['detail']['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['detail']['id_tipe'] = $tampil->id_tipe;
			$data['detail']['id_number'] = $tampil->id_number;
			$data['detail']['kode_referral'] = $tampil->kode_referral;
			$data['detail']['points'] = $tampil->points;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['detail']['username'] = $tampil->username;
			
			$data['content'] = 'VFormUpdateUser';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataUser'] = $this->MSudi->GetDataWhere1('tbl_user', 'is_active', 1, 'id_user','asc')->result();
			$data['content'] = 'VUser';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddUser()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddUser';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataUser()
	{
		
		$data['nama'] = $this->session->userdata('nama');

		$data['foto_profile'] = $this->session->userdata('foto_profile');
		// $add['id_user'] = $this->input->post('id_user');
		$add['email_user'] = $this->input->post('email_user');
		$add['nama'] = $this->input->post('nama');
		$add['password'] = $this->input->post('password');
		$add['tlp_user'] = NULL;
		$add['kode_verifikasi'] = NULL;
		$add['tgl_verifikasi'] = NULL;
		$add['alamat'] = NULL;
		$add['tmp_lahir'] = NULL;
		$add['jenis_kelamin'] = NULL;
		$add['id_tipe'] = NULL;
		$add['id_number'] = NULL;
		$add['kode_referral'] = NULL;
		$add['points'] = NULL;
		$add['created_by'] = $data['nama'] ;
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = NULL;
		$add['updated_date'] = NULL;
		$add['deleted_by'] = NULL;
		$add['deleted_date'] = NULL;
		$add['is_active'] = $this->input->post('is_active');
		$add['username'] = $this->input->post('email_user');
		
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_profile'] = isset($imagePath) ? strval($imagePath) : '#';
		$this->MSudi->AddData('tbl_user', $add);
		redirect(site_url('Welcome/DataUser'));
	}

	public function UpdateDataUser()
	{	
		$data['nama'] = $this->session->userdata('nama');

		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_user = $this->input->post('id_user');
		// $update['id_user'] = $this->input->post('id_user');
		$update['email_user'] = $this->input->post('email_user');
		$update['nama'] = $this->input->post('nama');
		$update['password'] = $this->input->post('password');
		$update['tlp_user'] = NULL;
		$update['kode_verifikasi'] = NULL;
		$update['tgl_verifikasi'] = NULL;
		$update['alamat'] = NULL;
		$update['tmp_lahir'] = NULL;
		$update['jenis_kelamin'] = NULL;
		$update['id_tipe'] = NULL;
		$update['id_number'] = NULL;
		$update['kode_referral'] = NULL;
		$update['points'] = NULL;
		$update['updated_by'] =$data['nama'] ;
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		$update['username'] = $this->input->post('email_user');
		
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_profile'] = isset($imagePath) ? strval($imagePath) : '#';
		$this->MSudi->UpdateData('tbl_user', 'id_user', $id_user, $update);
		redirect(site_url('Welcome/DataUser'));
	}



	public function DeleteDataUser()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_user = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] =$data['nama'] ;
		$update['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_user', 'id_user', $id_user, $update);
		redirect(site_url('Welcome/DataUser'));
	}


	// Data Produk
	public function DataPromo()
	{
		$data['nama'] = $this->session->userdata('nama');

		$data['foto_profile'] = $this->session->userdata('foto_profile');

		if ($this->uri->segment(4) == 'view') {
			$id_promo = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_promo', 'id_promo', $id_promo)->row();
			$data['detail']['id_promo'] = $tampil->id_promo;
			$data['detail']['kode_promo'] = $tampil->kode_promo;
			$data['detail']['nama_promo'] = $tampil->nama_promo;
			$data['detail']['desc_promo'] = $tampil->desc_promo;
			$data['detail']['promo_value'] = $tampil->promo_value;
			$data['detail']['tipe_promo'] = $tampil->tipe_promo;
			$data['detail']['foto_promo'] = $tampil->foto_promo;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdatePromo';
		} else {
			$data['DataPromo'] = $this->MSudi->GetDataWhere1('tbl_promo', 'is_active', 1, 'id_promo','asc')->result();
			$data['content'] = 'VPromo';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddPromo()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddPromo';
	

		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataPromo()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['kode_promo'] = $this->input->post('kode_promo');
		$add['nama_promo'] = $this->input->post('nama_promo');
		$add['desc_promo'] = $this->input->post('desc_promo');
		$add['promo_value'] = $this->input->post('promo_value');
		$add['tipe_promo'] = $this->input->post('tipe_promo');


		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_promo'] = isset($imagePath) ? strval($imagePath) : '#';
		$add['is_active'] = $this->input->post('is_active');
		$this->MSudi->AddData('tbl_promo', $add);
		redirect(site_url('Welcome/DataPromo'));
	}
	public function UpdateDataPromo()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		
		$id_promo = $this->input->post('id_promo');
		$update['kode_promo'] = $this->input->post('kode_promo');
		$update['nama_promo'] = $this->input->post('nama_promo');
		$update['desc_promo'] = $this->input->post('desc_promo');
		$update['promo_value']= $this->input->post('promo_value');
		$update['tipe_promo']= $this->input->post('tipe_promo');

		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_promo'] = isset($imagePath) ? strval($imagePath) : '#';

		$this->MSudi->UpdateData('tbl_promo', 'id_promo', $id_promo, $update);
		redirect(site_url('Welcome/DataPromo'));
	}
	public function DeleteDataPromo()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_promo = $this->uri->segment('3');
		$update['is_active'] = 0; 
		$this->MSudi->UpdateData('tbl_promo', 'id_promo', $id_promo, $update);
		redirect(site_url('Welcome/DataPromo'));
	}

	public function DataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		if ($this->uri->segment(4) == 'view') {
			$id_customer = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_customer', 'id_customer', $id_customer)->row();
			$data['detail']['id_customer'] = $tampil->id_customer;
			$data['detail']['email_customer'] = $tampil->email_customer;
			$data['detail']['nama'] = $tampil->nama;
			$data['detail']['password'] = $tampil->password;
			$data['detail']['tlp_customer'] = $tampil->tlp_customer;
			$data['detail']['kode_verifikasi'] = $tampil->kode_verifikasi;
			$data['detail']['tgl_verifikasi'] = $tampil->tgl_verifikasi;
			$data['detail']['foto_profile'] = $tampil->foto_profile;
			$data['detail']['alamat'] = $tampil->alamat;
			$data['detail']['tmp_lahir'] = $tampil->tmp_lahir;
			$data['detail']['tgl_lahir'] = $tampil->tgl_lahir;
			$data['detail']['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['detail']['id_tipe'] = $tampil->id_tipe;
			$data['detail']['id_customer'] = $tampil->id_customer;
			$data['detail']['id_number'] = $tampil->id_number;
			$data['detail']['kode_referral'] = $tampil->kode_referral;
			$data['detail']['points'] = $tampil->points;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['detail']['username'] = $tampil->username;
			$data['content'] = 'VFormUpdateCustomer';
		} else {
			$data['DataCustomer'] = $this->MSudi->GetDataWhere('tbl_customer', 'is_active', 1)->result();
			$data['content'] = 'VCustomer';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddCustomer';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		// $add['id_customer'] = $this->input->post('id_customer');
		$add['email_customer'] = $this->input->post('email_customer');
		$add['nama'] = $this->input->post('nama');
		$add['password'] = $this->input->post('password');
		$add['tlp_customer'] = $this->input->post('tlp_customer');
		$add['kode_verifikasi'] = null;
		$add['tgl_verifikasi'] = null;
		
		// $config['upload_path'] = '././upload/Customer';
		// $config['allowed_types'] = 'gif|jpg|png|JPG';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	redirect(site_url('Welcome/VFormAddCustomer'));
		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$add['foto_profile'] = implode($this->upload->data());
		// }
		$add['alamat'] = null;
		$add['tmp_lahir'] = null;
		$add['tgl_lahir'] = null;
		$add['jenis_kelamin'] = null;
		$add['id_tipe'] = null;
		$add['id_number'] = null;
		$add['kode_referral'] = null;
		$add['points'] = null;
		$add['created_by'] = $data['nama'] ;
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = $this->input->post('is_active');
		$add['username'] = $this->input->post('email_customer');;


		$add1['username'] = $this->input->post('email_customer');
		$add1['password'] = $this->input->post('password');
		$add1['first_name'] = $this->input->post('email_customer');
		$add1['last_name'] = $this->input->post('email_customer');
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_profile'] = isset($imagePath) ? strval($imagePath) : '#';
		$this->MSudi->AddData1('tbl_customer','oauth_users', $add,$add1);
		redirect(site_url('Welcome/DataCustomer'));


	}
	
	public function UpdateDataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_customer = $this->input->post('id_customer');
		// $update['foto'] = $this->input->post('foto');

		// $config['upload_path'] = '././upload/slide';
		// $config['allowed_types'] = 'gif|jpg|png|JPG';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	//redirect(site_url('Welcome/VFormUpdateUser'));

		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$update['foto'] = implode($this->upload->data());
		// }
		$update['email_customer'] = $this->input->post('email_customer');
		$update['nama'] = $this->input->post('nama');
		$update['password'] = $this->input->post('password');
		$update['tlp_customer'] = $this->input->post('tlp_customer');
		$update['kode_verifikasi'] = null;
		$update['tgl_verifikasi'] = null;
		$update['alamat'] = null;
		$update['tmp_lahir'] = null;
		$update['tgl_lahir'] = null;
		$update['jenis_kelamin'] = null;
		$update['id_tipe'] = null;
		$update['id_number'] = null;
		$update['kode_referral'] = null;
		$update['points'] = null;
		
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		$update['username'] = $this->input->post('email_customer');

		$update1['username'] = $this->input->post('email_customer');
		$update1['password'] = $this->input->post('password');
		$update1['first_name'] = $this->input->post('email_customer');
		$update1['last_name'] = $this->input->post('email_customer');
		
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_profile'] = isset($imagePath) ? strval($imagePath) : '#';

		$this->MSudi->UpdateData('tbl_customer', 'id_customer', $id_customer, $update);
		$this->MSudi->UpdateData('oauth_users', 'username', $update1['username'], $update1);
		redirect(site_url('Welcome/DataCustomer'));
	}
	public function DeleteDataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_customer = $this->uri->segment('3');
		$update1['is_active'] = 0;
		$update1['deleted_by'] =$data['nama'] ;
		$update1['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_customer', 'id_customer', $id_customer, $update1);
		redirect(site_url('Welcome/DataCustomer'));
	}



	public function UploadBlob($blobName,$realPath,$file_name) {
    
		$accesskey = "JUUFK+nG5Gew1o00iZOM7zKWz9gjG8j11BeuFScbyn++N5vG81qxCQLMQs2oGFfn/1YQOh+j9kt6O07HFmLP2g==";
		$storageAccount = 'pustakapuncakstorage';
		// $filetoUpload = realpath('./' . $blobName);
		$filetoUpload = $_FILES[$file_name]['tmp_name'];
		$containerName = 'pustaka-puncak';
		// $blobName = 'image.jpg';
		$media_type =  $_FILES[$file_name]['type'];
		// if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
		//     $unique_file = uniqid() . '.jpeg';
		// }elseif($media_type == 'video/mp4'){
		//     $unique_file = uniqid() . '.mp4';
		// }
	   
		$destinationURL = "https://$storageAccount.blob.core.windows.net/$containerName/$blobName";
	
		$currentDate = gmdate("D, d M Y H:i:s T", time());
		$handle = fopen($filetoUpload, "r");
		$fileLen = filesize($filetoUpload);
	
		$headerResource = "x-ms-blob-cache-control:max-age=3600\nx-ms-blob-type:BlockBlob\nx-ms-date:$currentDate\nx-ms-version:2015-12-11";
		$urlResource = "/$storageAccount/$containerName/$blobName";
	
		
	
	if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
		$arraysign = array();
		$arraysign[] = 'PUT';               /*HTTP Verb*/  
		$arraysign[] = '';                  /*Content-Encoding*/  
		$arraysign[] = '';                  /*Content-Language*/  
		$arraysign[] = $fileLen;            /*Content-Length (include value when zero)*/  
		$arraysign[] = '';                  /*Content-MD5*/  
		$arraysign[] = 'image/png';         /*Content-Type*/  
		$arraysign[] = '';                  /*Date*/  
		$arraysign[] = '';                  /*If-Modified-Since */  
		$arraysign[] = '';                  /*If-Match*/  
		$arraysign[] = '';                  /*If-None-Match*/  
		$arraysign[] = '';                  /*If-Unmodified-Since*/  
		$arraysign[] = '';                  /*Range*/  
		$arraysign[] = $headerResource;     /*CanonicalizedHeaders*/
		$arraysign[] = $urlResource;        /*CanonicalizedResource*/
	
		$str2sign = implode("\n", $arraysign);
	
		$sig = base64_encode(hash_hmac('sha256', urldecode(utf8_encode($str2sign)), base64_decode($accesskey), true));  
		$authHeader = "SharedKey $storageAccount:$sig";
	
		$headers = [
			'Authorization: ' . $authHeader,
			'x-ms-blob-cache-control: max-age=3600',
			'x-ms-blob-type: BlockBlob',
			'x-ms-date: ' . $currentDate,
			'x-ms-version: 2015-12-11',
			'Content-Type: image/png',
			'Content-Length: ' . $fileLen
		];
	
		$ch = curl_init($destinationURL);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_INFILE, $handle); 
		curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
		curl_setopt($ch, CURLOPT_UPLOAD, true); 
		$result = curl_exec($ch);
	
		echo ('Result<br/>');
		print_r($result);
	
		echo ('Error<br/>');
		print_r(curl_error($ch));
	
		curl_close($ch);
	
	}elseif($media_type == 'video/mp4'){
			$arraysign = array();
			$arraysign[] = 'PUT';               /*HTTP Verb*/  
			$arraysign[] = '';                  /*Content-Encoding*/  
			$arraysign[] = '';                  /*Content-Language*/  
			$arraysign[] = $fileLen;            /*Content-Length (include value when zero)*/  
			$arraysign[] = '';                  /*Content-MD5*/  
			$arraysign[] = 'video/mp4';         /*Content-Type*/  
			$arraysign[] = '';                  /*Date*/  
			$arraysign[] = '';                  /*If-Modified-Since */  
			$arraysign[] = '';                  /*If-Match*/  
			$arraysign[] = '';                  /*If-None-Match*/  
			$arraysign[] = '';                  /*If-Unmodified-Since*/  
			$arraysign[] = '';                  /*Range*/  
			$arraysign[] = $headerResource;     /*CanonicalizedHeaders*/
			$arraysign[] = $urlResource;        /*CanonicalizedResource*/
	
			$str2sign = implode("\n", $arraysign);
	
		$sig = base64_encode(hash_hmac('sha256', urldecode(utf8_encode($str2sign)), base64_decode($accesskey), true));  
		$authHeader = "SharedKey $storageAccount:$sig";
	
		$headers = [
			'Authorization: ' . $authHeader,
			'x-ms-blob-cache-control: max-age=3600',
			'x-ms-blob-type: BlockBlob',
			'x-ms-date: ' . $currentDate,
			'x-ms-version: 2015-12-11',
			'Content-Type: video/mp4',
			'Content-Length: ' . $fileLen
		];
	
		$ch = curl_init($destinationURL);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_INFILE, $handle); 
		curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
		curl_setopt($ch, CURLOPT_UPLOAD, true); 
		$result = curl_exec($ch);
	
		echo ('Result<br/>');
		print_r($result);
	
		echo ('Error<br/>');
		print_r(curl_error($ch));
	
		curl_close($ch);
		}
		
		return $destinationURL;			
	}
	


	public function DataMerchant()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		if ($this->uri->segment(4) == 'view') {
			$id_merchant = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_merchant', 'id_merchant', $id_merchant)->row();
			$data['detail']['id_merchant'] = $tampil->id_merchant;
			$data['detail']['nama_merchant'] = $tampil->nama_merchant;
			$data['detail']['alamat_merchant'] = $tampil->alamat_merchant;
			$data['detail']['tlp_merchant'] = $tampil->tlp_merchant;
			$data['detail']['email_merchant'] = $tampil->email_merchant;
			$data['detail']['desc_merchant'] = $tampil->desc_merchant;
			$data['detail']['foto_merchant'] = $tampil->foto_merchant;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateMerchant';
		} else {
			$data['DataMerchant'] = $this->MSudi->GetDataWhere1('tbl_merchant', 'is_active', 1, 'id_merchant','asc')->result();
			$data['content'] = 'VMerchant';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddMerchant()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddMerchant';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataMerchant()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['nama_merchant'] = $this->input->post('nama_merchant');
		$add['alamat_merchant'] = $this->input->post('alamat_merchant');
		$add['tlp_merchant'] = $this->input->post('tlp_merchant');
		$add['email_merchant'] = $this->input->post('email_merchant');
		$add['desc_merchant'] = $this->input->post('desc_merchant');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s"); 
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;

		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_merchant'] = isset($imagePath) ? strval($imagePath) : '#';
		$this->MSudi->AddData('tbl_merchant', $add);
		redirect(site_url('Welcome/DataMerchant'));
	}
	public function UpdateDataMerchant()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_merchant = $this->input->post('id_merchant');
		$update['nama_merchant'] = $this->input->post('nama_merchant');
		$update['alamat_merchant'] = $this->input->post('alamat_merchant');
		$update['tlp_merchant'] = $this->input->post('tlp_merchant');
		$update['email_merchant'] = $this->input->post('email_merchant');
		$update['desc_merchant'] = $this->input->post('desc_merchant'); 
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] =  date("Y-m-d H:i:s");
		$update['is_active'] = 1;

		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_merchant'] = isset($imagePath) ? strval($imagePath) : '#';


		$this->MSudi->UpdateData('tbl_merchant', 'id_merchant', $id_merchant, $update);
		redirect(site_url('Welcome/DataMerchant'));
	}
	public function DeleteDataMerchant()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_merchant = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] =$data['nama'] ;
		$update['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_merchant', 'id_merchant', $id_merchant, $update);
		redirect(site_url('Welcome/DataMerchant'));
	}




	public function DataHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_hotel = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_hotel', 'id_hotel', $id_hotel)->row();
			$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
			$data['detail']['id_hotel'] = $tampil->id_hotel;
			$data['detail']['id_merchant'] = $tampil->id_merchant;
			$data['detail']['nama_hotel'] = $tampil->nama_hotel;
			$data['detail']['alamat_hotel'] = $tampil->alamat_hotel;
			$data['detail']['tlp_hotel'] = $tampil->tlp_hotel;
			$data['detail']['email_hotel'] = $tampil->email_hotel;
			$arrayidfasilitas = json_decode($tampil->id_fasilitas, TRUE);
			$data['detail']['id_fasilitas'] = $arrayidfasilitas;
			$data['detail']['rating'] = $tampil->rating;
			$data['detail']['keterangan_hotels'] = $tampil->keterangan_hotels;
			$data['detail']['foto_hotel'] = $tampil->foto_hotel;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateHotel';
		} else {
			$data['DataHotel'] = $this->MSudi->GetDataWhere1('tbl_hotel', 'is_active', 1, 'id_hotel','asc')->result();
			$data['content'] = 'VHotel';
			
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddHotel';
		$idCheck = !empty($_GET['id_merchant']);
		// echo $npm;
		if($idCheck == true){
			$id_merchant = $_GET['id_merchant'];
			$data['nama_merchant']=$this->MSudi->GetData('tbl_merchant');
			$tampil=$this->MSudi->GetDataWhere('tbl_merchant','id_merchant',$id_merchant)->row();
			
			
			$data['detail']['id_merchant']= $tampil->id_merchant;
			$data['detail']['nama_merchant']= $tampil->nama_merchant;
	
			// echo $data['detail']['nama_mahasiswa'];
		}else{

		
		}
		$data['DataMerchant'] = $this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		
		$this->load->view('welcome_message', $data);
	}
	public function AddDataHotel()
	{
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null)
		$id_fasilitas =  [];
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['id_merchant'] = $this->input->post('id_merchant');
		$add['nama_hotel'] = $this->input->post('nama_hotel');
		$add['alamat_hotel'] = $this->input->post('alamat_hotel');
		$add['tlp_hotel'] = $this->input->post('tlp_hotel');
		$add['email_hotel'] = $this->input->post('email_hotel');
		
		$add['id_fasilitas'] = json_encode($id_fasilitas);
		$add['rating'] = null;
		$add['keterangan_hotels'] = $this->input->post('keterangan_hotels');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_hotel'] = isset($imagePath) ? strval($imagePath) : '#';
		


		$this->MSudi->AddData('tbl_hotel', $add);
		redirect(site_url('Welcome/DataHotel'));
	}
	public function UpdateDataHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null|| $id_fasilitas == ""){
			$id_fasilitas = "[]";
		}else{
			$id_fasilitas = json_encode($id_fasilitas);
		}
		
		$id_hotel = $this->input->post('id_hotel');
		$update['id_merchant'] = $this->input->post('id_merchant');
		$update['nama_hotel'] = $this->input->post('nama_hotel');
		$update['alamat_hotel'] = $this->input->post('alamat_hotel');
		$update['tlp_hotel'] = $this->input->post('tlp_hotel');
		$update['email_hotel'] = $this->input->post('email_hotel');
		$update['id_fasilitas'] = $id_fasilitas;
		$update['rating'] = null;
		$update['keterangan_hotels'] = $this->input->post('keterangan_hotels');
	
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		

		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_hotel'] = isset($imagePath) ? strval($imagePath) : '#';
		



		$this->MSudi->UpdateData('tbl_hotel', 'id_hotel', $id_hotel, $update);
		redirect(site_url('Welcome/DataHotel'));
	}
	public function DeleteDataHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_hotel = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] =$data['nama'] ;
		$update['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_hotel', 'id_hotel', $id_hotel, $update);
		redirect(site_url('Welcome/DataHotel'));
	}




	public function DataFasilitas()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_fasilitas = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_fasilitas', 'id_fasilitas', $id_fasilitas)->row();
			$data['detail']['id_fasilitas'] = $tampil->id_fasilitas;
			$data['detail']['nama_fasilitas'] = $tampil->nama_fasilitas;
			$data['detail']['foto_fasilitas'] = $tampil->foto_fasilitas;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_date'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateFasilitas';
		} else {
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere1('tbl_fasilitas', 'is_active', 1, 'id_fasilitas','asc')->result();
			$data['content'] = 'VFasilitas';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddFasilitas()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddFasilitas';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataFasilitas()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['nama_fasilitas'] = $this->input->post('nama_fasilitas');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_fasilitas'] = isset($imagePath) ? strval($imagePath) : '#';
		
		$this->MSudi->AddData('tbl_fasilitas', $add);
		redirect(site_url('Welcome/DataFasilitas'));
	}
	public function UpdateDataFasilitas()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_fasilitas = $this->input->post('id_fasilitas');
		
		$update['nama_fasilitas'] = $this->input->post('nama_fasilitas');
		
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_fasilitas'] = isset($imagePath) ? strval($imagePath) : '#';
		
		$this->MSudi->UpdateData('tbl_fasilitas', 'id_fasilitas', $id_fasilitas, $update);
		redirect(site_url('Welcome/DataFasilitas'));
	}
	public function DeleteDataFasilitas()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_fasilitas = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'] ;
		$update['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_fasilitas', 'id_fasilitas', $id_fasilitas, $update);
		redirect(site_url('Welcome/DataFasilitas'));
	}

	
	public function DataKategoriArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_kategori_artikel = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_kategori_artikel', 'id_kategori_artikel', $id_kategori_artikel)->row();
			$data['detail']['id_kategori_artikel'] = $tampil->id_kategori_artikel;
			$data['detail']['nama_kategori_artikel'] = $tampil->nama_kategori_artikel;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateKategoriArtikel';
		} else {
			$data['DataKategoriArtikel'] = $this->MSudi->GetDataWhere1('tbl_kategori_artikel', 'is_active', 1, 'id_kategori_artikel','asc')->result();
			$data['content'] = 'VKategoriArtikel';
		}


		$this->load->view('welcome_message', $data);
	}
		public function VFormKategoriAddArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddKategoriArtikel';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataKategoriArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['nama_kategori_artikel'] = $this->input->post('nama_kategori_artikel');
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_kategori_artikel', $add);
		redirect(site_url('Welcome/DataKategoriArtikel'));
	}
	public function UpdateDataKategoriArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_kategori_artikel = $this->input->post('id_kategori_artikel');
		
		$update['nama_kategori_artikel'] = $this->input->post('nama_kategori_artikel');
	
		
		$this->MSudi->UpdateData('tbl_kategori_artikel', 'id_kategori_artikel', $id_kategori_artikel, $update);
		redirect(site_url('Welcome/DataKategoriArtikel'));
	}
	public function DeleteDataKategoriArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_kategori_artikel = $this->uri->segment('3');
		$update['is_active'] = 0;
		
		$this->MSudi->UpdateData('tbl_kategori_artikel', 'id_kategori_artikel', $id_kategori_artikel, $update);
		redirect(site_url('Welcome/DataKategoriArtikel'));
	}





	public function DataArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_artikel = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_artikel', 'id_artikel', $id_artikel)->row();
			$data['detail']['id_artikel'] = $tampil->id_artikel;
			$data['detail']['judul_artikel'] = $tampil->judul_artikel;
			$data['detail']['desc_artikel'] = $tampil->desc_artikel;
			$data['detail']['id_kategori'] = $tampil->id_kategori;
			$data['detail']['foto_artikel'] = $tampil->foto_artikel;
		
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateArtikel';
		} else {
			$data['DataArtikel'] = $this->MSudi->GetDataWhere1('tbl_artikel', 'is_active', 1, 'id_artikel','asc')->result();
			$data['content'] = 'VArtikel';
		}


		$this->load->view('welcome_message', $data);
	}

	public function VFormAddArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$data['id_kategori_artikel'] = $this->MSudi->GetData('tbl_kategori_artikel');

		$data['content'] = 'VFormAddArtikel';
		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$data['id_kategori_artikel'] = $this->MSudi->GetData('tbl_kategori_artikel');
	
		$add['judul_artikel'] = $this->input->post('judul_artikel');
		$add['desc_artikel'] = $this->input->post('desc_artikel');
		$add['id_kategori'] = $this->input->post('id_kategori');
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$add['foto_artikel'] = isset($imagePath) ? strval($imagePath) : '#';
		
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_artikel', $add);
		redirect(site_url('Welcome/DataArtikel'));
	}
	public function UpdateDataArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_artikel = $this->input->post('id_artikel');
		
		$update['judul_artikel'] = $this->input->post('judul_artikel');
		$update['desc_artikel'] = $this->input->post('desc_artikel');
		$update['id_kategori'] = $this->input->post('id_kategori');
		$file = file_exists($_FILES['file']['tmp_name']) ? $_FILES["file"] : '';
		if ($file !== '')  {
            $media_type =  $_FILES['file']['type'];
            if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
            $unique_file = uniqid() . '.jpeg';
            $file['name'] =  $unique_file;
            }elseif($media_type == 'video/mp4'){
            $unique_file = uniqid() . '.mp4';
            $file['name'] =  $unique_file;
            }
            $imagePath = $this->UploadBlob($file['name'],$file['tmp_name'],'file');
        //     if (!$file && is_wp_error($imagePath)) {
        //     $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
        // }
		}
		$update['foto_artikel'] = isset($imagePath) ? strval($imagePath) : '#';
		
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
	
	
		
		$this->MSudi->UpdateData('tbl_artikel', 'id_artikel', $id_artikel, $update);
		redirect(site_url('Welcome/DataArtikel'));
	}
	public function DeleteDataArtikel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_artikel = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'] ;
		$update['deleted_date'] =  date("Y-m-d H:i:s");
		$this->MSudi->UpdateData('tbl_artikel', 'id_artikel', $id_artikel, $update);
		redirect(site_url('Welcome/DataArtikel'));
	}




	public function Logout()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}
}
