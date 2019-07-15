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
			}
		}
		
		/*
		 * controller pelanggan
		 * modul insert, view, update, delete data pelanggan
		 * **/
		public function index()
		{
			$data['title'] = 'Pelanggan - Aplikasi Order Logistik';
			$data['pelanggans'] = parent::model('pelanggan')->get_pelanggan()->result_array();
			parent::template('pelanggan/daftar',$data);
		}
		
		public function detail($id)
		{
			$data['pelanggan'] = parent::model('pelanggan')->get_pelanggan_detail($id);
			
			if ($data['pelanggan'] !== null){
				
				$data['title'] = 'data pelanggan';
				
				parent::template('pelanggan/detail',$data);
			}else{
				show_404();
			}
		}
		
		public function tambah()
		{
			$data['title'] = 'Tambah Data Pelangga - Orderlist APP';
			parent::template('pelanggan/tambah',$data);
		}
		
		public function add()
		{
			if (isset($_POST['tambah'])){
				$idPelanggan = uniqid('plgn-');
				
				$inputPelanggan = array(
					'pelanggan_id' => $idPelanggan,
					'pelanggan_nama' => parent::post('nama'),
					'pelanggan_telepon' => parent::post('telepon'),
					'pelanggan_alamat' => parent::post('alamat'),
					'pelanggan_kota' => parent::post('kota')
				);
				
				$insertStatus = parent::model('pelanggan')->insert_pelanggan($inputPelanggan);
				if ($insertStatus > 0){
					parent::alert('alert','success-insert');
					redirect('pelanggan');
				}else{
					parent::alert('alert','error-insert');
					redirect('pelanggan/tambah');
				}
				
			}else{
				show_404();
			}
		}
	}