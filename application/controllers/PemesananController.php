<?php
	/**
	 * Created by PhpStorm.
	 * User: ibag
	 * Date: 7/16/2019
	 * Time: 2:06 PM
	 */
	
	class PemesananController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()){
				redirect('login');
			}else{
				$this->load->model('BarangModel','barang');
				$this->load->model('PelangganModel','pelanggan');
				$this->load->model('PemesananModel','pemesanan');
			}
		}
		
		public function index()
		{
		
		}
		
		public function tambah()
		{
			$data['title'] = 'Tambah pesanan';
//			parent::type_dump($idPelanggan);
			parent::template('pemesanan/tambah',$data);
		}
		
		// tambah permohonan
		public function tambahPermohonan()
		{
			$request = array(
				'pengguna_id' => $this->session->userdata('user_id'),
				'pelanggan_id' => parent::post('pelanggan'),
				'request_pesan' => parent::post('pesan')
			);
			
			$insertStatus = parent::model('pemesanan')->insert_permohonan($request);
		
			if ($insertStatus > 0){
				parent::alert('alert','success-insert');
				redirect('sales/dashboard');
			}else{
				parent::alert('alert','error-insert');
				redirect('pemesanan/tambah');
			}
		}
	}