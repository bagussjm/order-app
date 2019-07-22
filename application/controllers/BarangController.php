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
			// validation only on sales view
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
//			parent::array_dump($data['barangs']);
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
		
		public function tambah()
		{
			$data['title'] = 'Tambahkan data barang';
			$data['kategoris'] = parent::model('barang')->get_kategori();
			parent::template('barang/tambah',$data);
		}
		
		public function add()
		{
			if (isset($_POST['tambah'])){
				$idBarang = uniqid('brg-');
				$barangKode = 'prod-'.substr(parent::post('nama'),0,3).'-'.substr(time(),4,3);
				
				$dataBarang = array(
					'barang_id'	=> $idBarang,
					'kategori_id' => parent::post('kategori'),
					'barang_kode' => $barangKode,
					'barang_nama' => parent::post('nama'),
					'barang_harga' => parent::post('harga'),
					'barang_satuan' => parent::post('satuan'),
					'barang_stok' => parent::post('stok')
				);
				
				$statusTambah = parent::model('barang')->tambah_barang($dataBarang);
				if ($statusTambah > 0){
					parent::alert('alert','success-insert');
					redirect('barang');
				}else{
					parent::alert('alert','error-insert');
					redirect('barang/tambah');
				}
				
			}else{
				show_404();
			}
		}
		
		public function delete($id)
		{
			if ($id!== ''){
				$deleteStatus = parent::model('barang')->hapus_barang($id);
				if ($deleteStatus > 0){
					parent::alert('alert','success-delete');
					redirect('barang');
				}
			}
		}
	}