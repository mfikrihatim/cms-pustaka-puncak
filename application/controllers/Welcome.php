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
			$data['DataUser'] = $this->MSudi->GetData1('tbl_user','id_user','asc');
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
		
		// $add['foto_user']= $this->input->post('foto_user');
		// $add['st_user']= $this->input->post('st_user');  

		// $config['upload_path'] = './upload/user_profile';
		// $config['allowed_types'] = 'gif|jpg|png';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	redirect(site_url('Welcome/VFormAddUser'));
		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$add['foto_profile'] = implode($this->upload->data());
		// }
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
		$update['created_by'] = $this->input->post('created_by');
		$update['created_date'] = $this->input->post('created_date');
		$update['updated_by'] =$data['nama'] ;
		$update['updated_date'] = date("Y-m-d H:i:s");
		$update['deleted_by'] = NULL;
		$update['deleted_date'] = NULL;
		$update['is_active'] = $this->input->post('is_active');
		$update['username'] = $this->input->post('email_user');
		
		// $add['foto_user']= $this->input->post('foto_user');
		// $add['st_user']= $this->input->post('st_user');  

		// $config['upload_path']='./upload/user_profile';
		// $config['allowed_types']='gif|jpg|png|jpeg';

		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile'))
		// {
		// 	$error=array('error'=>$this->upload->display_errors());
		// 	/*redirect(site_url('Welcome/VFormUpdateUser'));*/

		// }
		// else
		// {
		// 	$data=array('upload_data'=>$this->upload->data());
		// 	$update['foto_profile']=implode($this->upload->data());

		// }
		$this->MSudi->UpdateData('tbl_user', 'id_user', $id_user, $update);
		redirect(site_url('Welcome/DataUser'));
	}



	public function DeleteDataUser()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');
		$id_user = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_user', 'id_user', $id_user);
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
			$data['DataPromo'] = $this->MSudi->GetData('tbl_promo');
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


		// $config['upload_path'] = './upload/Promo';
		// $config['allowed_types'] = 'gif|jpg|png|JPG';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	redirect(site_url('Welcome/VFormAddPromo'));
		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$add['foto_promo'] = implode($this->upload->data());
		// }
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

		// $config['upload_path'] = './upload/Promo';
		// $config['allowed_types'] = 'gif|jpg|png';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	redirect(site_url('Welcome/VFormUpdatePromo'));

		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$update['foto_promo'] = implode($this->upload->data());
		// }

		$this->MSudi->UpdateData('tbl_promo', 'id_promo', $id_promo, $update);
		redirect(site_url('Welcome/DataPromo'));
	}
	public function DeleteDataPromo()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['foto_profile'] = $this->session->userdata('foto_profile');

		$id_promo = $this->uri->segment('3');
		$this->MSudi->DeleteData('tbl_promo', 'id_promo', $id_promo);
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
