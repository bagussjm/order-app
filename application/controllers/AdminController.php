<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class AdminController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()){
				redirect('login');
			}else{
				$this->load->model('PelangganModel','pelanggan');
				$this->load->model('PemesananModel','pemesanan');
				$this->load->model('AuthModel','auth');
			}
		}
		
		/*
		 * controller pelanggan
		 * modul insert, view, update, delete data pelanggan
		 * **/
		public function index()
		{
			$data['title'] = 'Dashboard Admin - Aplikasi Order Logistik';
			$data['pemesanans'] = parent::model('pemesanan')->get_pesanan();
			$data['permohonans'] = parent::model('pemesanan')->get_permohonan();
			$data['total_pelanggan'] = parent::model('pemesanan')->total_of_table('orderapp_pelanggan');
			$data['transaksi'] = parent::model('pemesanan')->sum_field('pemesanan_total','orderapp_pemesanan');
			$data['stok'] = parent::model('pemesanan')->sum_field('barang_stok','orderapp_barang');

//			parent::type_dump($data['total_pelanggan']);
			parent::template('admin/dashboard',$data);
		}
		
		/*
		 * modul profil, bantuan dan data pribadi admin pengguna sistem
		 * bisa menambahkan sales baru
		 * */
		
		public function profil()
		{
			$data['title'] = 'Profil pengguna sistem';
			$id = $this->session->userdata('user_id');
			$data['pengguna'] = parent::model('auth')->get_data_pengguna($id);
			$data['penggunas'] = parent::model('auth')->get_penggunas();
			
//			parent::array_dump($data['penggunas']);
			parent::template('admin/profil',$data);
		}
		
		public function tambah()
		{
			$data['title'] = 'Tambah admin pengguna sistem';
			parent::template('admin/tambah',$data);
		}
		
		public function add()
		{
			$idBarang = uniqid('usr-');
			$pengguna = array(
				'pengguna_id' => $idBarang,
				'pengguna_username' => parent::post('username'),
				'pengguna_password' => md5('admin'),
				'pengguna_fullname' => parent::post('fullname'),
				'pengguna_email'    => parent::post('email'),
				'pengguna_telepon'  => parent::post('telepon'),
				'pengguna_alamat'   => parent::post('alamat'),
				'pengguna_level'    => parent::post('level')
			);
			
			$insertStatus = parent::model('auth')->tambah_pengguna($pengguna);
			
			if ($insertStatus > 0){
				parent::alert('alert','success-insert');
				redirect('profil');
			}else{
				parent::alert('alert','error-insert');
				redirect('admin/tambah');
			}
		}
		
		public function ubah($id)
		{
			$pengguna = parent::model('auth')->get_data_pengguna($id);
			if ($pengguna !== null){
				$data['pengguna'] = $pengguna;
				$data['title'] = 'Ubah data admin pengguna ';
				parent::template('admin/ubah',$data);
			}else{
				show_404();
			}
		}
		
		public function edit($id)
		{
			$pengguna = parent::model('auth')->get_data_pengguna($id);
			if ($pengguna !== null){
				$dateEdit = date('Y-m-d h:i:s',time());
				$pengguna = array(
					'pengguna_username' => parent::post('username'),
					'pengguna_password' => md5('admin'),
					'pengguna_fullname' => parent::post('fullname'),
					'pengguna_email'    => parent::post('email'),
					'pengguna_telepon'  => parent::post('telepon'),
					'pengguna_alamat'   => parent::post('alamat'),
					'pengguna_level'    => parent::post('level'),
					'pengguna_isEdit'   => 1,
					'pengguna_date_edit' => $dateEdit
				);
				
				$statusUpdate = parent::model('auth')->ubah_pengguna($id,$pengguna);
				if ($statusUpdate > 0){
					parent::alert('alert','success-update');
					redirect('profil');
				}else{
					parent::alert('alert','error-delete');
					redirect('admin/ubah/'.$id);
				}
			}else{
				parent::alert('alert','error-edit');
				redirect('admin/ubah/'.$id);
			}
		}
		
		public function hapus($id)
		{
			$pengguna = parent::model('auth')->get_data_pengguna($id);
			if ($pengguna !== null){
				$deleteStatus = parent::model('auth')->hapus_pengguna($id);
				if ($deleteStatus > 0){
					parent::alert('alert','success-delete');
					redirect('profil');
				}else{
					parent::alert('alert','error-delete');
					redirect('profil');
				}
			}else{
				parent::alert('alert','error-delete');
				redirect('profil');
			}
		}
		
		/*
		 * helper pages
		 * about,settings, help
		 * */
		public function bantuan()
		{
			$data['title'] = 'Halaman Bantuan Sistem Order Logistik Berbasis Website';
			parent::template('admin/bantuan',$data);
		}
		
		public function pengaturan()
		{
			$data['title'] = 'Pengaturan Sistem Order Logistik Berbasi Website';
			parent::template('admin/pengaturan',$data);
		}
	}