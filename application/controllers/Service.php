<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class Service extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()){
				redirect('login');
			}else{
				$this->load->model('PelangganModel','pelanggan');
				$this->load->model('BarangModel','barang');
			}
		}
		
		/*
		 * pelanggan api service
		 * **/
		public function getPelanggan()
		{
			$pelanggans = parent::model('pelanggan')->get_pelanggan()->result_array();
			if ($pelanggans === null) {
				echo json_encode(array('pelanggan' => null));
			} else {
				echo json_encode($pelanggans);
			}
		}
		
		/*
		 * barang api service
		 * **/
		public function getBarang()
		{
			$barangs = parent::model('barang')->get_barang()->result_array();
			if ($barangs === null){
				echo json_encode(array('barangs' => null));
			}else{
				echo json_encode(array('barangs' => $barangs));
			}
		}
		
		public function getBarangByCategory($kategori)
		{
			$barangs = parent::model('barang')->get_barang_by_category($kategori);
//			parent::type_dump($barangs);
			if ($barangs === null || count($barangs) <= 0 ){
				echo json_encode(array('barangs' => null));
			}else{
				echo json_encode(array('barangs' => $barangs));
			}
		}
		
	}