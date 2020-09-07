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
			$arrayfotomerchant = json_decode($tampil->foto_merchant, TRUE);
			$data['detail']['foto_merchant'] = $arrayfotomerchant;
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

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_merchant'] = $replcate;
		}

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

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_merchant'] = $replcate;
		}

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
			$tampil1 = $this->MSudi->GetDataWhere('tbl_payment', 'id_hotel', $id_hotel)->row();
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
			$arrayfotohotel = json_decode($tampil->foto_hotel, TRUE);
			$data['detail']['foto_hotel'] = $arrayfotohotel;
			$data['detail']['price'] = $tampil1->price;
			$data['detail']['id_payment'] = $tampil1->id_payment;
			$data['detail']['custom_price'] = $tampil1->custom_price;
			$data['detail']['currency'] = $tampil1->currency;
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
	
		$data['DataMerchant'] = $this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		
		$this->load->view('welcome_message', $data);
	}
	function uploadBlobCollectionList($blobName,$realPath,$file_name,$index) {
    
		// Location
		$location =  dirname(__FILE__)."/".$blobName;
	
		$accesskey = "JUUFK+nG5Gew1o00iZOM7zKWz9gjG8j11BeuFScbyn++N5vG81qxCQLMQs2oGFfn/1YQOh+j9kt6O07HFmLP2g==";
		$storageAccount = 'pustakapuncakstorage';
		// $filetoUpload = realpath('./' . $blobName);
		$filetoUpload = $_FILES[$file_name]['tmp_name'][$index];
		$containerName = 'pustaka-puncak';
		// $blobName = 'image.jpg';
		$media_type =  $_FILES[$file_name]['type'][$index];
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

		// $accesskey = "JUUFK+nG5Gew1o00iZOM7zKWz9gjG8j11BeuFScbyn++N5vG81qxCQLMQs2oGFfn/1YQOh+j9kt6O07HFmLP2g==";
		// $storageAccount = 'pustakapuncakstorage';
		// $filetoUpload = $_FILES[$file_name]['tmp_name'][$index];
		// // $filetoUpload = $location;
		// $containerName = 'pustaka-puncak';
		// $media_type =  $_FILES[$file_name]['type'][$index];
		// $destinationURL = "https://$storageAccount.blob.core.windows.net/$containerName/$blobName";
	
		// $currentDate = gmdate("D, d M Y H:i:s T", time());
		// $handle = fopen($filetoUpload, "r");
		// $fileLen = filesize($filetoUpload);
	
		// $headerResource = "x-ms-blob-cache-control:max-age=3600\nx-ms-blob-type:BlockBlob\nx-ms-date:$currentDate\nx-ms-version:2015-12-11";
		// $urlResource = "/$storageAccount/$containerName/$blobName";
	
		// if($media_type == 'image/jpeg' || $media_type == 'image/jpg' || $media_type == 'image/png'){
		// 	$arraysign = array();
		// 	$arraysign[] = 'PUT';               /*HTTP Verb*/  
		// 	$arraysign[] = '';                  /*Content-Encoding*/  
		// 	$arraysign[] = '';                  /*Content-Language*/  
		// 	$arraysign[] = $fileLen;            /*Content-Length (include value when zero)*/  
		// 	$arraysign[] = '';                  /*Content-MD5*/  
		// 	$arraysign[] = 'image/png';         /*Content-Type*/  
		// 	$arraysign[] = '';                  /*Date*/  
		// 	$arraysign[] = '';                  /*If-Modified-Since */  
		// 	$arraysign[] = '';                  /*If-Match*/  
		// 	$arraysign[] = '';                  /*If-None-Match*/  
		// 	$arraysign[] = '';                  /*If-Unmodified-Since*/  
		// 	$arraysign[] = '';                  /*Range*/  
		// 	$arraysign[] = $headerResource;     /*CanonicalizedHeaders*/
		// 	$arraysign[] = $urlResource;        /*CanonicalizedResource*/
		
		// 	$str2sign = implode("\n", $arraysign);
		
		// 	$sig = base64_encode(hash_hmac('sha256', urldecode(utf8_encode($str2sign)), base64_decode($accesskey), true));  
		// 	$authHeader = "SharedKey $storageAccount:$sig";
		
		// 	$headers = [
		// 		'Authorization: ' . $authHeader,
		// 		'x-ms-blob-cache-control: max-age=3600',
		// 		'x-ms-blob-type: BlockBlob',
		// 		'x-ms-date: ' . $currentDate,
		// 		'x-ms-version: 2015-12-11',
		// 		'Content-Type: image/png',
		// 		'Content-Length: ' . $fileLen
		// 	];
		
		// 	$ch = curl_init($destinationURL);
		// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		// 	curl_setopt($ch, CURLOPT_INFILE, $handle); 
		// 	curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
		// 	curl_setopt($ch, CURLOPT_UPLOAD, true); 
		// 	$result = curl_exec($ch);
		
		// 	echo ('Result<br/>');
		// 	print_r($result);
		
		// 	echo ('Error<br/>');
		// 	print_r(curl_error($ch));
		
		// 	curl_close($ch);
		
		// }elseif($media_type == 'video/mp4'){
		// 		$arraysign = array();
		// 		$arraysign[] = 'PUT';               /*HTTP Verb*/  
		// 		$arraysign[] = '';                  /*Content-Encoding*/  
		// 		$arraysign[] = '';                  /*Content-Language*/  
		// 		$arraysign[] = $fileLen;            /*Content-Length (include value when zero)*/  
		// 		$arraysign[] = '';                  /*Content-MD5*/  
		// 		$arraysign[] = 'video/mp4';         /*Content-Type*/  
		// 		$arraysign[] = '';                  /*Date*/  
		// 		$arraysign[] = '';                  /*If-Modified-Since */  
		// 		$arraysign[] = '';                  /*If-Match*/  
		// 		$arraysign[] = '';                  /*If-None-Match*/  
		// 		$arraysign[] = '';                  /*If-Unmodified-Since*/  
		// 		$arraysign[] = '';                  /*Range*/  
		// 		$arraysign[] = $headerResource;     /*CanonicalizedHeaders*/
		// 		$arraysign[] = $urlResource;        /*CanonicalizedResource*/
		
		// 		$str2sign = implode("\n", $arraysign);
		
		// 	$sig = base64_encode(hash_hmac('sha256', urldecode(utf8_encode($str2sign)), base64_decode($accesskey), true));  
		// 	$authHeader = "SharedKey $storageAccount:$sig";
		
		// 	$headers = [
		// 		'Authorization: ' . $authHeader,
		// 		'x-ms-blob-cache-control: max-age=3600',
		// 		'x-ms-blob-type: BlockBlob',
		// 		'x-ms-date: ' . $currentDate,
		// 		'x-ms-version: 2015-12-11',
		// 		'Content-Type: video/mp4',
		// 		'Content-Length: ' . $fileLen
		// 	];
		
		// 	$ch = curl_init($destinationURL);
		// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		// 	curl_setopt($ch, CURLOPT_INFILE, $handle); 
		// 	curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
		// 	curl_setopt($ch, CURLOPT_UPLOAD, true); 
		// 	$result = curl_exec($ch);
		
		// 	echo ('Result<br/>');
		// 	print_r($result);
		
		// 	echo ('Error<br/>');
		// 	print_r(curl_error($ch));
		
		// 	curl_close($ch);
		// 	}
		
		// return $destinationURL;
	
		
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

		$add1['id_hotel'] = $this->input->post('id_hotel1');
		$add1['price'] = $this->input->post('price');
		$add1['custom_price'] = $this->input->post('custom_price');
		$add1['currency'] = $this->input->post('currency');
		$add1['created_by'] = $data['nama'];
		$add1['created_date'] = date("Y-m-d H:i:s");
		$add1['updated_by'] = null;
		$add1['updated_date'] = null;
		$add1['deleted_by'] = null;
		$add1['deleted_date'] = null;
		$add1['is_active'] = 1;


		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_hotel'] = $replcate;
		}



		$idhotel = $this->MSudi->AddData('tbl_hotel',$add);
		$add1['id_hotel']=$idhotel;
		$this->MSudi->AddData('tbl_payment',$add1);
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
		$id_payment = $this->input->post('id_payment');
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
		
		$update1['id_hotel'] = $this->input->post('id_hotel1');
		$update1['price'] = $this->input->post('price');
		$update1['custom_price'] = $this->input->post('custom_price');
		$update1['currency'] = $this->input->post('currency');
		
		$update1['updated_by'] =  $data['nama'];
		$update1['updated_date'] = date("Y-m-d H:i:s");
	
		$update1['is_active'] = 1;

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_hotel'] = $replcate;
		}



		$this->MSudi->UpdateData('tbl_hotel', 'id_hotel', $id_hotel, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_payment', $id_payment, $update1);
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
		
		$update1['is_active'] = 0;
		$update1['deleted_by'] = $data['nama'] ;
		$update1['deleted_date'] =  date("Y-m-d H:i:s");

		
		$this->MSudi->UpdateData('tbl_payment', 'id_hotel', $id_hotel, $update1);
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
			$arrayfotofasilitas = json_decode($tampil->foto_fasilitas, TRUE);
			$data['detail']['foto_fasilitas'] = $arrayfotofasilitas;
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
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_fasilitas'] = $replcate;
		}
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
		
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_fasilitas'] = $replcate;
		}

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
			$arrayfotoartikel = json_decode($tampil->foto_artikel, TRUE);
			$data['detail']['foto_artikel'] = $arrayfotoartikel;
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
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_artikel'] = $replcate;
		}	
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
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_artikel'] = $replcate;
		}
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


	public function DataCamp()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_camp = $this->uri->segment(3);
			$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
	
			$tampil = $this->MSudi->GetDataWhere('tbl_camp', 'id_camp', $id_camp)->row();
			$tampil1 = $this->MSudi->GetDataWhere('tbl_payment', 'id_camp', $id_camp)->row();
			$data['detail']['id_camp'] = $tampil->id_camp;
			$data['detail']['id_merchant'] = $tampil->id_merchant;
			$data['detail']['nama_camp'] = $tampil->nama_camp;
			$data['detail']['alamat_camp'] = $tampil->alamat_camp;
			$data['detail']['tlp_camp'] = $tampil->tlp_camp;
			$data['detail']['email_camp'] = $tampil->email_camp;
			$arrayidfasilitas = json_decode($tampil->id_fasilitas, TRUE);
			$data['detail']['id_fasilitas'] = $arrayidfasilitas;
			$data['detail']['durasi_camp'] = $tampil->durasi_camp;
			$data['detail']['rating'] = $tampil->rating;
			$data['detail']['keterangan_camp'] = $tampil->keterangan_camp;
			$arrayfotocamp = json_decode($tampil->foto_camp, TRUE);
			$data['detail']['foto_camp'] = $arrayfotocamp;
			$data['detail']['price'] = $tampil->price;
			$data['detail']['price'] = $tampil1->price;
			$data['detail']['id_payment'] = $tampil1->id_payment;
			$data['detail']['custom_price'] = $tampil1->custom_price;
			$data['detail']['currency'] = $tampil1->currency;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateCamp';
		} else {
			$data['DataCamp'] = $this->MSudi->GetDataWhere1('tbl_camp', 'is_active', 1, 'id_camp','asc')->result();
			$data['content'] = 'VCamp';
		}


		$this->load->view('welcome_message', $data);
	}
		public function VFormAddCamp()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['content'] = 'VFormAddCamp';
		$data['DataMerchant'] = $this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');

		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataCamp()
	{
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null)
		$id_fasilitas =  [];
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['id_merchant'] = $this->input->post('id_merchant');
		$add['nama_camp'] = $this->input->post('nama_camp');
		$add['alamat_camp'] = $this->input->post('alamat_camp');
		$add['tlp_camp'] = $this->input->post('tlp_camp');
		$add['email_camp'] = $this->input->post('email_camp');
		$add['id_fasilitas'] = json_encode($id_fasilitas);
		$add['durasi_camp'] = $this->input->post('durasi_camp');
		$add['rating'] = null;
		$add['keterangan_camp'] = $this->input->post('keterangan_camp');
		$add['price'] = $this->input->post('price');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;


		$add1['id_camp'] = $this->input->post('id_camp1');
		$add1['price'] = $this->input->post('price');
		$add1['custom_price'] = $this->input->post('custom_price');
		$add1['currency'] = $this->input->post('currency');
		$add1['created_by'] = $data['nama'];
		$add1['created_date'] = date("Y-m-d H:i:s");
		$add1['updated_by'] = null;
		$add1['updated_date'] = null;
		$add1['deleted_by'] = null;
		$add1['deleted_date'] = null;
		$add1['is_active'] = 1;


		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_camp'] = $replcate;

		}	
		$idcamp = $this->MSudi->AddData('tbl_camp',$add);
		$add1['id_camp']=$idcamp;
		$this->MSudi->AddData('tbl_payment',$add1);
		redirect(site_url('Welcome/DataCamp'));
	}
	public function UpdateDataCamp()
	{
		
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null|| $id_fasilitas == ""){
			$id_fasilitas = "[]";
		}else{
			$id_fasilitas = json_encode($id_fasilitas);
		}
		

		$id_camp = $this->input->post('id_camp');
		$id_payment = $this->input->post('id_payment');
		
		$update['id_merchant'] = $this->input->post('id_merchant');
		$update['nama_camp'] = $this->input->post('nama_camp');
		$update['alamat_camp'] = $this->input->post('alamat_camp');
		$update['tlp_camp'] = $this->input->post('tlp_camp');
		$update['email_camp'] = $this->input->post('email_camp');
		$update['id_fasilitas'] = $id_fasilitas;
		$update['durasi_camp'] = $this->input->post('durasi_camp');
		$update['rating'] = null;
		$update['keterangan_camp'] = $this->input->post('keterangan_camp');
		$update['price'] =  $this->input->post('price');
		$update['updated_by'] =  $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		
		$update1['id_camp'] = $this->input->post('id_camp1');
		$update1['price'] = $this->input->post('price');
		$update1['custom_price'] = $this->input->post('custom_price');
		$update1['currency'] = $this->input->post('currency');
		$update1['updated_by'] = $data['nama'];
		$update1['updated_date'] = date("Y-m-d H:i:s");
		$update1['is_active'] = 1;

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_camp'] = $replcate;
		}
	
		
		$this->MSudi->UpdateData('tbl_camp', 'id_camp', $id_camp, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_payment', $id_payment, $update1);
		redirect(site_url('Welcome/DataCamp'));
	}
	public function DeleteDataCamp()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_camp = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'] ;
		$update['deleted_date'] =  date("Y-m-d H:i:s");

		$update1['is_active'] = 0;
		$update1['deleted_by'] = $data['nama'] ;
		$update1['deleted_date'] =  date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tbl_camp', 'id_camp', $id_camp, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_camp', $id_camp, $update1);
		redirect(site_url('Welcome/DataCamp'));
	}


	public function DataWisata()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_wisata = $this->uri->segment(3);
			$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
	
			$tampil = $this->MSudi->GetDataWhere('tbl_wisata', 'id_wisata', $id_wisata)->row();
			$tampil1 = $this->MSudi->GetDataWhere('tbl_payment', 'id_wisata', $id_wisata)->row();
			$data['detail']['id_wisata'] = $tampil->id_wisata;
			$data['detail']['id_merchant'] = $tampil->id_merchant;
			$data['detail']['nama_wisata'] = $tampil->nama_wisata;
			$data['detail']['alamat_wisata'] = $tampil->alamat_wisata;
			$data['detail']['tlp_wisata'] = $tampil->tlp_wisata;
			$data['detail']['email_wisata'] = $tampil->email_wisata;
			$arrayidfasilitas = json_decode($tampil->id_fasilitas, TRUE);
			$data['detail']['id_fasilitas'] = $arrayidfasilitas;
			$data['detail']['durasi_wisata'] = $tampil->durasi_wisata;
			$data['detail']['rating'] = $tampil->rating;
			$data['detail']['keterangan_wisata'] = $tampil->keterangan_wisata;
			$arrayfotowisata = json_decode($tampil->foto_wisata, TRUE);
			$data['detail']['foto_wisata'] = $arrayfotowisata;
			$data['detail']['price'] = $tampil->price;
			$data['detail']['price'] = $tampil1->price;
			$data['detail']['id_payment'] = $tampil1->id_payment;
			$data['detail']['custom_price'] = $tampil1->custom_price;
			$data['detail']['currency'] = $tampil1->currency;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateWisata';
		} else {
			$data['DataWisata'] = $this->MSudi->GetDataWhere1('tbl_wisata', 'is_active', 1, 'id_wisata','asc')->result();
			$data['content'] = 'VWisata';
		}


		$this->load->view('welcome_message', $data);
	}
		public function VFormAddWisata()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['content'] = 'VFormAddWisata';
		$data['DataMerchant'] = $this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');

		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	public function AddDataWisata()
	{
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null)
		$id_fasilitas =  [];
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['id_merchant'] = $this->input->post('id_merchant');
		$add['nama_wisata'] = $this->input->post('nama_wisata');
		$add['alamat_wisata'] = $this->input->post('alamat_wisata');
		$add['tlp_wisata'] = $this->input->post('tlp_wisata');
		$add['email_wisata'] = $this->input->post('email_wisata');
		$add['id_fasilitas'] = json_encode($id_fasilitas);
		$add['durasi_wisata'] = $this->input->post('durasi_wisata');
		$add['rating'] = null;
		$add['keterangan_wisata'] = $this->input->post('keterangan_wisata');
		$add['price'] = $this->input->post('price');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;

		$add1['id_wisata'] = $this->input->post('id_wisata1');
		$add1['price'] = $this->input->post('price');
		$add1['custom_price'] = $this->input->post('custom_price');
		$add1['currency'] = $this->input->post('currency');
		$add1['created_by'] = $data['nama'];
		$add1['created_date'] = date("Y-m-d H:i:s");
		$add1['updated_by'] = null;
		$add1['updated_date'] = null;
		$add1['deleted_by'] = null;
		$add1['deleted_date'] = null;
		$add1['is_active'] = 1;

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_wisata'] = $replcate;

		}	
		$idwisata = $this->MSudi->AddData('tbl_wisata',$add);
		$add1['id_wisata']=$idwisata;
		$this->MSudi->AddData('tbl_payment',$add1);
		redirect(site_url('Welcome/DataWisata'));
	}
	public function UpdateDataWisata()
	{
		
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null|| $id_fasilitas == ""){
			$id_fasilitas = "[]";
		}else{
			$id_fasilitas = json_encode($id_fasilitas);
		}
		

		$id_wisata = $this->input->post('id_wisata');
		$id_payment = $this->input->post('id_payment');
		
		$update['id_merchant'] = $this->input->post('id_merchant');
		$update['nama_wisata'] = $this->input->post('nama_wisata');
		$update['alamat_wisata'] = $this->input->post('alamat_wisata');
		$update['tlp_wisata'] = $this->input->post('tlp_wisata');
		$update['email_wisata'] = $this->input->post('email_wisata');
		$update['id_fasilitas'] = $id_fasilitas;
		$update['durasi_wisata'] = $this->input->post('durasi_wisata');
		$update['rating'] = null;
		$update['keterangan_wisata'] = $this->input->post('keterangan_wisata');
		$update['price'] = $this->input->post('price');
		$update['updated_by'] =  $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		$update1['id_wisata'] = $this->input->post('id_wisata1');
		$update1['price'] = $this->input->post('price');
		$update1['custom_price'] = $this->input->post('custom_price');
		$update1['currency'] = $this->input->post('currency');

		$update1['updated_by'] =$data['nama'];
		$update1['updated_date'] = date("Y-m-d H:i:s");
		
		$update1['is_active'] = 1;

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_wisata'] = $replcate;

		}	
		
		$this->MSudi->UpdateData('tbl_wisata', 'id_wisata', $id_wisata, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_payment', $id_payment, $update1);
		redirect(site_url('Welcome/DataWisata'));
	}
	public function DeleteDataWisata()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_wisata = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'] ;
		$update['deleted_date'] =  date("Y-m-d H:i:s");
		$update1['is_active'] = 0;
		$update1['deleted_by'] = $data['nama'] ;
		$update1['deleted_date'] =  date("Y-m-d H:i:s");
		$this->MSudi->UpdateData('tbl_wisata', 'id_wisata', $id_wisata, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_wisata', $id_wisata, $update1);
		redirect(site_url('Welcome/DataWisata'));
	}


	public function DataTipeExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_tipe_exp = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_tipe_exp', 'id_tipe_exp', $id_tipe_exp)->row();
			$data['detail']['id_tipe_exp'] = $tampil->id_tipe_exp;
			$data['detail']['nama_tipe_exp'] = $tampil->nama_tipe_exp;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateTipeExperience';
		} else {
			$data['DataTipeExperience'] = $this->MSudi->GetDataWhere1('tbl_tipe_exp', 'is_active', 1, 'id_tipe_exp','asc')->result();
			$data['content'] = 'VTipeExperience';
		}


		$this->load->view('welcome_message', $data);
	}
	
	public function AddDataTipeExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['nama_tipe_exp'] = $this->input->post('nama_tipe_exp');
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_tipe_exp', $add);
		redirect(site_url('Welcome/DataTipeExperience'));
	}
	public function UpdateDataTipeExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_tipe_exp = $this->input->post('id_tipe_exp');
		
		$update['nama_tipe_exp'] = $this->input->post('nama_tipe_exp');
	
		
		$this->MSudi->UpdateData('tbl_tipe_exp', 'id_tipe_exp', $id_tipe_exp, $update);
		redirect(site_url('Welcome/DataTipeExperience'));
	}
	public function DeleteDataTipeExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_tipe_exp = $this->uri->segment('3');
		$update['is_active'] = 0;
		
		$this->MSudi->UpdateData('tbl_tipe_exp', 'id_tipe_exp', $id_tipe_exp, $update);
		redirect(site_url('Welcome/DataTipeExperience'));
	}

	public function DataExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {

			$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
			$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
	
			$id_exp = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_experience', 'id_exp', $id_exp)->row();
			$tampil1 = $this->MSudi->GetDataWhere('tbl_payment', 'id_exp', $id_exp)->row();
			$data['detail']['id_exp'] = $tampil->id_exp;
			$data['detail']['judul_exp'] = $tampil->judul_exp;
			$data['detail']['id_tipe_exp'] = $tampil->id_tipe_exp;
			$data['detail']['tipe_trip_exp'] = $tampil->tipe_trip_exp;
			$data['detail']['desc_exp'] = $tampil->desc_exp;
			$data['detail']['max_guest_exp'] = $tampil->max_guest_exp;
			$data['detail']['itinerary_exp'] = $tampil->itinerary_exp;
			$arrayidfasilitas = json_decode($tampil->id_fasilitas, TRUE);
			$data['detail']['id_fasilitas'] = $arrayidfasilitas;
			$data['detail']['inclusion_exp'] = $tampil->inclusion_exp;
			$data['detail']['rules_exp'] = $tampil->rules_exp;
			$data['detail']['status'] = $tampil->status;
			$data['detail']['rating'] = $tampil->rating;
			$data['detail']['lokasi_exp'] = $tampil->lokasi_exp;
			$data['detail']['durasi_exp'] = $tampil->durasi_exp;
			$data['detail']['id_minimun_booking'] = $tampil->id_minimun_booking;
			$data['detail']['id_merchant'] = $tampil->id_merchant;
			$arrayfotoexperience = json_decode($tampil->foto_experience, TRUE);
			$data['detail']['foto_experience'] = $arrayfotoexperience;
			$data['detail']['price'] = $tampil1->price;
			$data['detail']['id_payment'] = $tampil1->id_payment;
			$data['detail']['custom_price'] = $tampil1->custom_price;
			$data['detail']['currency'] = $tampil1->currency;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateExperience';
		} else {
			$data['DataExperience'] = $this->MSudi->GetDataWhere1('tbl_experience', 'is_active', 1, 'id_exp','asc')->result();
			$data['content'] = 'VExperience';
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		
		$data['content'] = 'VFormAddExperience';
		$data['DataMerchant'] = $this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['nama_merchant'] = $this->MSudi->GetData('tbl_merchant');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');

		/*$data['kelas']=$this->MSudi->GetData('tbl_kelas');*/
		// $data['tahun_ajaran']=$this->MSudi->GetData('tbl_tahun_ajaran');
		$this->load->view('welcome_message', $data);
	}
	
	public function AddDataExperience()
	{
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null)
		$id_fasilitas =  [];
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['judul_exp'] = $this->input->post('judul_exp');
		$add['id_tipe_exp'] = $this->input->post('id_tipe_exp');
		$add['tipe_trip_exp'] = $this->input->post('tipe_trip_exp');
		$add['desc_exp'] = $this->input->post('desc_exp');
		$add['max_guest_exp'] = $this->input->post('max_guest_exp');
		$add['itinerary_exp'] = $this->input->post('itinerary_exp');
		$add['id_fasilitas'] = json_encode($id_fasilitas);
		$add['inclusion_exp'] = $this->input->post('inclusion_exp');
		$add['rules_exp'] = $this->input->post('rules_exp');
		$add['status'] = null;
		$add['rating'] = null;
		$add['lokasi_exp'] = $this->input->post('lokasi_exp');
		$add['durasi_exp'] = $this->input->post('durasi_exp');
		$add['id_minimun_booking'] = $this->input->post('id_minimun_booking');
		$add['id_merchant'] = $this->input->post('id_merchant');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;

		$add1['id_exp'] = $this->input->post('id_exp1');
		$add1['price'] = $this->input->post('price');
		$add1['custom_price'] = $this->input->post('custom_price');
		$add1['currency'] = $this->input->post('currency');
		$add1['created_by'] = $data['nama'];
		$add1['created_date'] = date("Y-m-d H:i:s");
		$add1['updated_by'] = null;
		$add1['updated_date'] = null;
		$add1['deleted_by'] = null;
		$add1['deleted_date'] = null;
		$add1['is_active'] = 1;
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_experience'] = $replcate;

		}	
		$add['is_active'] = 1;
				
		$idexp = $this->MSudi->AddData('tbl_experience',$add);
		$add1['id_exp']=$idexp;
		$this->MSudi->AddData('tbl_payment',$add1);
		redirect(site_url('Welcome/DataExperience'));
	}
	public function UpdateDataExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null|| $id_fasilitas == ""){
			$id_fasilitas = "[]";
		}else{
			$id_fasilitas = json_encode($id_fasilitas);
		}

		$id_exp = $this->input->post('id_exp');
		
		$id_payment = $this->input->post('id_payment');
		
		$update['judul_exp'] = $this->input->post('judul_exp');
		$update['id_tipe_exp'] = $this->input->post('id_tipe_exp');
		$update['tipe_trip_exp'] = $this->input->post('tipe_trip_exp');
		$update['desc_exp'] = $this->input->post('desc_exp');
		$update['max_guest_exp'] = $this->input->post('max_guest_exp');
		$update['itinerary_exp'] = $this->input->post('itinerary_exp');
		$update['id_fasilitas'] = $id_fasilitas;
		$update['inclusion_exp'] = $this->input->post('inclusion_exp');
		$update['rules_exp'] = $this->input->post('rules_exp');
		$update['status'] = $this->input->post('status');
		$update['rating'] = $this->input->post('rating');
		$update['lokasi_exp'] = $this->input->post('lokasi_exp');
		$update['durasi_exp'] = $this->input->post('durasi_exp');
		$update['id_minimun_booking'] = $this->input->post('id_minimun_booking');
		$update['id_merchant'] = $this->input->post('id_merchant');
	
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
		
		$update1['id_exp'] = $this->input->post('id_exp1');
		$update1['price'] = $this->input->post('price');
		$update1['custom_price'] = $this->input->post('custom_price');
		$update1['currency'] = $this->input->post('currency');

		$update1['updated_by'] =  $data['nama'];
		$update1['updated_date'] = date("Y-m-d H:i:s");
	
		$update1['is_active'] = 1;

		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_experience'] = $replcate;

		}	
	
				
		
		$this->MSudi->UpdateData('tbl_experience', 'id_exp', $id_exp, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_payment', $id_payment, $update1);
		redirect(site_url('Welcome/DataExperience'));
	}
	public function DeleteDataExperience()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_exp = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_date'] = date("Y-m-d H:i:s");
		
		$update1['is_active'] = 0;
		$update1['deleted_by'] = $data['nama'] ;
		$update1['deleted_date'] =  date("Y-m-d H:i:s");

		
		$this->MSudi->UpdateData('tbl_payment', 'id_exp', $id_exp, $update1);
		$this->MSudi->UpdateData('tbl_experience', 'id_exp', $id_exp, $update);
		redirect(site_url('Welcome/DataExperience'));
	}

	public function DataMinimumBooking()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_minimum_booking = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_minimum_booking', 'id_minimum_booking', $id_minimum_booking)->row();
			$data['detail']['id_minimum_booking'] = $tampil->id_minimum_booking;
			$data['detail']['desc_minimum_booking'] = $tampil->desc_minimum_booking;
			$data['detail']['minimum_booking_ammount'] = $tampil->minimum_booking_ammount;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateMinimumBooking';
		} else {
			$data['DataMinimumBooking'] = $this->MSudi->GetDataWhere1('tbl_minimum_booking', 'is_active', 1, 'id_minimum_booking','asc')->result();
			$data['content'] = 'VMinimumBooking';
		}


		$this->load->view('welcome_message', $data);
	}
	
	public function AddDataMinimumBooking()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['desc_minimum_booking'] = $this->input->post('desc_minimum_booking');
		$add['minimum_booking_ammount'] = $this->input->post('minimum_booking_ammount');
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_minimum_booking', $add);
		redirect(site_url('Welcome/DataMinimumBooking'));
	}
	public function UpdateDataMinimumBooking()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_minimum_booking = $this->input->post('id_minimum_booking');
		
		$update['desc_minimum_booking'] = $this->input->post('desc_minimum_booking');
		$update['minimum_booking_ammount'] = $this->input->post('minimum_booking_ammount');
		$update['is_active'] = 1;
	
		
		$this->MSudi->UpdateData('tbl_minimum_booking', 'id_minimum_booking', $id_minimum_booking, $update);
		redirect(site_url('Welcome/DataMinimumBooking'));
	}
	public function DeleteDataMinimumBooking()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_minimum_booking = $this->uri->segment('3');
		$update['is_active'] = 0;
		
		$this->MSudi->UpdateData('tbl_minimum_booking', 'id_minimum_booking', $id_minimum_booking, $update);
		redirect(site_url('Welcome/DataMinimumBooking'));
	}


	public function DataPaymentMethod()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_payment_method = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_payment_method', 'id_payment_method', $id_payment_method)->row();
			$data['detail']['id_payment_method'] = $tampil->id_payment_method;
			$data['detail']['nama_payment_method'] = $tampil->nama_payment_method;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdatePaymentMethod';
		} else {
			$data['DataPaymentMethod'] = $this->MSudi->GetDataWhere1('tbl_payment_method', 'is_active', 1, 'id_payment_method','asc')->result();
			$data['content'] = 'VPaymentMethod';
		}


		$this->load->view('welcome_message', $data);
	}
	
	public function AddDataPaymentMethod()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['nama_payment_method'] = $this->input->post('nama_payment_method');
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_payment_method', $add);
		redirect(site_url('Welcome/DataPaymentMethod'));
	}
	public function UpdateDataPaymentMethod()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_payment_method = $this->input->post('id_payment_method');
		
		$update['nama_payment_method'] = $this->input->post('nama_payment_method');
		$update['is_active'] = 1;
	
		
		$this->MSudi->UpdateData('tbl_payment_method', 'id_payment_method', $id_payment_method, $update);
		redirect(site_url('Welcome/DataPaymentMethod'));
	}
	public function DeleteDataPaymentMethod()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_payment_method = $this->uri->segment('3');
		$update['is_active'] = 0;
		
		$this->MSudi->UpdateData('tbl_payment_method', 'id_payment_method', $id_payment_method, $update);
		redirect(site_url('Welcome/DataPaymentMethod'));
	}





	public function DataKamarHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_kamar = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_kamar_hotel', 'id_kamar', $id_kamar)->row();
			$tampil1 = $this->MSudi->GetDataWhere('tbl_payment', 'id_kamar_hotel', $id_kamar)->row();
			$data['id_hotel'] = $this->MSudi->GetData('tbl_hotel');
			$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
			$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
			$data['detail']['id_kamar'] = $tampil->id_kamar;
			$data['detail']['id_hotel'] = $tampil->id_hotel;
			$data['detail']['nama_kamar'] = $tampil->nama_kamar;
			$data['detail']['jumlah_kamar'] = $tampil->jumlah_kamar;
			$arrayidfasilitas = json_decode($tampil->id_fasilitas, TRUE);
			$data['detail']['id_fasilitas'] = $arrayidfasilitas;
			$data['detail']['keterangan_kamar'] = $tampil->keterangan_kamar;
			$data['detail']['max_tamu'] = $tampil->max_tamu;
			$data['detail']['price'] = $tampil1->price;
			$data['detail']['id_payment'] = $tampil1->id_payment;
			$data['detail']['custom_price'] = $tampil1->custom_price;
			$data['detail']['currency'] = $tampil1->currency;
			$arrayfotokamar = json_decode($tampil->foto_kamar, TRUE);
			$data['detail']['foto_kamar'] = $arrayfotokamar;
			$data['detail']['foto_profile_kamar'] = $tampil->foto_profile_kamar;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_date'] = $tampil->created_date;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_date'] = $tampil->updated_date;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_date'] = $tampil->deleted_date;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateKamarHotel';
		} else {
			$data['DataKamarHotel'] = $this->MSudi->GetDataWhere1('tbl_kamar_hotel', 'is_active', 1, 'id_kamar','asc')->result();
			$data['content'] = 'VKamarHotel';
			
		}


		$this->load->view('welcome_message', $data);
	}
	public function VFormAddKamarHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$data['content'] = 'VFormAddKamarHotel';
	
		$data['DataHotel'] = $this->MSudi->GetDataWhere('tbl_hotel', 'is_active', 1)->result();
		$data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();

		$data['id_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['nama_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['id_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		$data['nama_fasilitas'] = $this->MSudi->GetData('tbl_fasilitas');
		
		$this->load->view('welcome_message', $data);
	}
	public function AddDataKamarHotel()
	{
		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null)
		$id_fasilitas =  [];
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$add['id_hotel'] = $this->input->post('id_hotel');
		$add['nama_kamar'] = $this->input->post('nama_kamar');
		$add['jumlah_kamar'] = $this->input->post('jumlah_kamar');
		$add['id_fasilitas'] = json_encode($id_fasilitas);
		$add['keterangan_kamar'] = $this->input->post('keterangan_kamar');
		$add['max_tamu'] = $this->input->post('max_tamu');
		$add['created_by'] = $data['nama'];
		$add['created_date'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_date'] = null;
		$add['deleted_by'] = null;
		$add['deleted_date'] = null;
		$add['is_active'] = 1;

		$add1['id_kamar_hotel'] = $this->input->post('id_kamar_hotel1');
		$add1['price'] = $this->input->post('price');
		$add1['custom_price'] = $this->input->post('custom_price');
		$add1['currency'] = $this->input->post('currency');
		$add1['created_by'] = $data['nama'];
		$add1['created_date'] = date("Y-m-d H:i:s");
		$add1['updated_by'] = null;
		$add1['updated_date'] = null;
		$add1['deleted_by'] = null;
		$add1['deleted_date'] = null;
		$add1['is_active'] = 1;

	
		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$add['foto_kamar'] = $replcate;
		}

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
		$add['foto_profile_kamar'] = isset($imagePath) ? strval($imagePath) : '#';
	

		$idkamar = $this->MSudi->AddData('tbl_kamar_hotel',$add);
		$add1['id_kamar_hotel']=$idkamar;
		$this->MSudi->AddData('tbl_payment',$add1);
		redirect(site_url('Welcome/DataKamarHotel'));
	}
	public function UpdateDataKamarHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_fasilitas = $this->input->post("id_fasilitas");
		if($id_fasilitas == null|| $id_fasilitas == ""){
			$id_fasilitas = "[]";
		}else{
			$id_fasilitas = json_encode($id_fasilitas);
		}
		
		$id_kamar = $this->input->post('id_kamar');
			
		$id_payment = $this->input->post('id_payment');
		$update['id_hotel'] = $this->input->post('id_hotel');
		$update['nama_kamar'] = $this->input->post('nama_kamar');
		$update['jumlah_kamar'] = $this->input->post('jumlah_kamar');
		$update['id_fasilitas'] = $id_fasilitas;
		$update['keterangan_kamar'] = $this->input->post('keterangan_kamar');
		$update['max_tamu'] = $this->input->post('max_tamu');
		$update['updated_by'] = $data['nama'];
		$update['updated_date'] = date("Y-m-d H:i:s");
	
		$update['is_active'] = 1;

		$update1['id_kamar_hotel'] = $this->input->post('id_kamar_hotel1');
		$update1['price'] = $this->input->post('price');
		$update1['custom_price'] = $this->input->post('custom_price');
		$update1['currency'] = $this->input->post('currency');
	
		$update1['updated_by'] = $data['nama'];
		$update1['updated_date'] =  date("Y-m-d H:i:s");
		
		$update1['is_active'] = 1;


		$imagePathCollections = [];
		$file_collections = file_exists($_FILES['file']['tmp_name'][0]) ? $_FILES["file"] : '';
		if($file_collections !== ''){
            foreach($file_collections['tmp_name'] as $i => $val){
                $unique_file = uniqid() . '.jpeg';
                $file_collections['name'][$i] =  $unique_file;
                $imagePathCollection = $this->uploadBlobCollectionList($file_collections['name'][$i],$val,'file',$i);
                //  if (!$file_collections && is_wp_error($imagePath)) {
                //  $errors[] = __('Error : ' . $imagePath->get_error_messages(), 'bnr');
            // }
            // $deleteImageTemp =  dirname(__FILE__)."/".$unique_file;
            // unlink($deleteImageTemp);
            array_push($imagePathCollections,$imagePathCollection);
		}
	}
		if(count($imagePathCollections) > 0){
			
			$image = json_encode($imagePathCollections);
			$replcate = str_replace("\/", "/", $image);
			$update['foto_kamar'] = $replcate;
		}

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
		$update['foto_profile_kamar'] = isset($imagePath) ? strval($imagePath) : '#';
	


		$this->MSudi->UpdateData('tbl_kamar_hotel', 'id_kamar', $id_kamar, $update);
		$this->MSudi->UpdateData('tbl_payment', 'id_payment', $id_payment, $update1);
		redirect(site_url('Welcome/DataKamarHotel'));
	}
	public function DeleteDataKamarHotel()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_kamar = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_date'] = date("Y-m-d H:i:s"); 

		$update1['is_active'] = 0;
		$update1['deleted_by'] = $data['nama'];
		$update1['deleted_date'] = date("Y-m-d H:i:s"); 
		
		$this->MSudi->UpdateData('tbl_payment', 'id_kamar_hotel', $id_kamar, $update1);
		$this->MSudi->UpdateData('tbl_kamar_hotel', 'id_kamar', $id_kamar, $update);
		redirect(site_url('Welcome/DataKamarHotel'));
	}


	public function DataAvailability()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		if ($this->uri->segment(4) == 'view') {
			$id_availability = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_availability', 'id_availability', $id_availability)->row();
			$data['detail']['id_availability'] = $tampil->id_availability;
			$data['detail']['availability_years'] = $tampil->availability_years;
			$data['detail']['availability_month'] = $tampil->availability_month;
			$data['detail']['availability_date'] = $tampil->availability_date;
			$data['detail']['id_exp'] = $tampil->id_exp;
			$data['detail']['id_hotel'] = $tampil->id_hotel;
			$data['detail']['id_camp'] = $tampil->id_camp;
			$data['detail']['id_wisata'] = $tampil->id_wisata;
			$data['detail']['is_active'] = $tampil->is_active;
			$data['content'] = 'VFormUpdateAvailability';
		} else {
			$data['DataAvailability'] = $this->MSudi->GetDataWhere1('tbl_availability', 'is_active', 1, 'id_availability','asc')->result();
			$data['content'] = 'VAvailability';
		}


		$this->load->view('welcome_message', $data);
	}
	
	public function AddDataAvailability()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$data['id_exp'] = $this->MSudi->GetData('tbl_experience');
		$data['judul_exp'] = $this->MSudi->GetData('tbl_experience');
		$data['id_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['nama_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['id_camp'] = $this->MSudi->GetData('tbl_camp');
		$data['nama_camp'] = $this->MSudi->GetData('tbl_camp');
		$data['id_wisata'] = $this->MSudi->GetData('tbl_wisata');
		$data['nama_wisata'] = $this->MSudi->GetData('tbl_wisata');


		$add['availability_years'] = date('Y');
		$add['availability_month'] = date('M');
		$add['availability_date'] = date('d');
		$add['id_exp'] = $this->input->post('id_exp');
		$add['id_hotel'] = $this->input->post('id_hotel');
		$add['id_camp'] = $this->input->post('id_camp');
		$add['id_wisata'] = $this->input->post('id_wisata');
		$add['is_active'] = 1;
				
		$this->MSudi->AddData('tbl_availability', $add);
		redirect(site_url('Welcome/DataAvailability'));
	}
	public function UpdateDataAvailability()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');


		$id_availability = $this->input->post('id_availability');
		$data['id_exp'] = $this->MSudi->GetData('tbl_experience');
		$data['judul_exp'] = $this->MSudi->GetData('tbl_experience');
		$data['id_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['nama_hotel'] = $this->MSudi->GetData('tbl_hotel');
		$data['id_camp'] = $this->MSudi->GetData('tbl_camp');
		$data['nama_camp'] = $this->MSudi->GetData('tbl_camp');
		$data['id_wisata'] = $this->MSudi->GetData('tbl_wisata');
		$data['nama_wisata'] = $this->MSudi->GetData('tbl_wisata');


		$update['availability_years'] = date('Y');
		$update['availability_month'] = date('M');
		$update['availability_date'] = date('d');
		$update['id_exp'] = $this->input->post('id_exp');
		$update['id_hotel'] = $this->input->post('id_hotel');
		$update['id_camp'] = $this->input->post('id_camp');
		$update['id_wisata'] = $this->input->post('id_wisata');
		$update['is_active'] = 1;
	
		
		$this->MSudi->UpdateData('tbl_availability', 'id_availability', $id_availability, $update);
		redirect(site_url('Welcome/DataAvailability'));
	}
	public function DeleteDataAvailability()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_availability = $this->uri->segment('3');
		$update['is_active'] = 0;
		
		$this->MSudi->UpdateData('tbl_availability', 'id_availability', $id_availability, $update);
		redirect(site_url('Welcome/DataAvailability'));
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
