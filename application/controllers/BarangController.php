<?php
	/**
	 * Created by PhpStorm.
	 * User: ibag
	 * Date: 7/15/2019
	 * Time: 3:00 PM
	 */
	
	class BarangController extends GLOBAL_Controller{
		
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()){
				redirect('login');
			}else{
				$this->load->model('BarangModel','barang');
			}
		}
		
		
		public function index()
		{
			if (isset($_GET['kategori'])){
				$byKategori  = parent::model('barang')->get_barang_by_category_name($_GET['kategori']);
				if (count($byKategori) > 0){
					$data['barangs'] = $byKategori;
					$data['kategori_selected'] = $data['barangs'][0]['kategori_nama'];
				}else{
					$data['barangs'] = null;
					$data['kategori_selected'] = $_GET['kategori'];
				}
			}else{
				$barang = parent::model('barang')->get_barang()->result_array();
				if (count($barang) > 0 || $barang !== null){
					$data['barangs'] = $barang;
				}else{
					$data['barangs'] = null;
				}
				$data['kategori_selected']= null;
			}
			$data['kategoris'] = parent::model('barang')->get_kategori();
			$data['title'] = 'Daftar Seluruh Barang';
			parent::template('barang/daftar',$data);
		}
		
		public function detail($idBarang)
		{
			$barang = parent::model('barang')->get_barang_by_id($idBarang);
			if ($barang !== null || count($barang) > 0){
				$data['barang'] = $barang;
				$data['title'] = 'Data detail barang denga kode '.$idBarang;
				parent::template('barang/detail',$data);
			}else{
				show_404();
			}
		}
	}