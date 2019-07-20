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
	}