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
				$this->load->model('PemesananModel','pemesanan');
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
		public function getPelangganByID($id)
		{
			$pelanggan = parent::model('pelanggan')->get_pelanggan_detail($id);
			if ($pelanggan !== null || count($pelanggan) > 0 ){
				$salesId = $this->session->userdata('user_id');
				$salesUsername = $this->session->userdata('username');
				$tgl = date('my',time());
				$totalReqBySales = parent::model('pemesanan')->get_request_by_sales($salesId,$id)->num_rows();
				$reqId = 'REQ'.$tgl.''.$salesUsername.''.$pelanggan['pelanggan_id'].'-'.($totalReqBySales+1);
				
				echo json_encode(array('pelanggan' => $pelanggan,'request_id' => $reqId));
			}else{
				echo json_encode(array('pelanggan' => null,'request_id' => null));
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
		
		public function getbBarangByID($id)
		{
			$barang = parent::model('barang')->get_barang_by_id($id);
			if ($barang !== null || count($barang) > 0){
				echo json_encode(array('barang' => $barang));
			}else{
				echo json_encode(array('barang' => null));
			}
		}
		
		// pemesanan api service
		
		// post/insert into pemesanan
		public function postPesanan()
		{
			$idPesanan =substr( uniqid('psn-'),0,13);
			
			
			$timeTags = substr(time(),6,5);
			$pemesananNumber = 'ordr/'.$timeTags;
			
			$pesanans = array(
				'pemesanan_id' => $idPesanan,
				'pemesanan_no' => $pemesananNumber,
				'pengguna_id' => parent::post('pesanan-sales-id'),
				'pelanggan_id' => parent::post('pesanan-pelanggan-id'),
				'barang_id' => parent::post('pesanan-barang-id'),
				'request_id' => parent::post('pesanan-request-id'),
				'pemesanan_jumlah' => parent::post('pesanan-total-pesan'),
				'pemesanan_total' => parent::post('pesanan-total-harga')
			);
			
			$isUpdateStok = $this->updateStokBarang($pesanans['barang_id'],$pesanans['pemesanan_jumlah']);
			if ($isUpdateStok){
				$insertStatus = parent::model('pemesanan')->insert_pesanan($pesanans);
				
				if ($insertStatus > 0){
					echo json_encode(array(
						'insert' => 'success',
						'message' => 'berhasil menambahkan data'
					));
				}else{
					echo json_encode(array(
						'insert' => 'error',
						'message' => 'kesalahan menambahkan data'
					));
				}
			}else{
				echo json_encode(array(
					'insert' => 'error',
					'message' => 'permasalahan stok barang'
				));
			}
		}
		
		//get detail pesanan by pelanggan
		public function getPesananByPelanggan($id)
		{
			$sales = $this->session->userdata('user_id');
			$pesananList = parent::model('pemesanan')->get_pesanan_pelanggan($id,$sales);
//			parent::type_dump($pesananList);
			if (!empty($pesananList)){
				echo json_encode(array(
					'data' => $pesananList,
					'message' => 'data pesanan yang belum di konfirmasi',
					'status' => 'success'
				));
			}else{
				echo json_encode(array(
					'data' => null,
					'message' => 'belum ada pesanan yang menunggu konfirmasi',
					'status' => 'not found'
				));
			}
		}
		
		// remove pesanan data from db
		public function removePesanan($idPemesanan)
		{
			$jumlahPesan = parent::post('jumlah-pesanan');
			$idBarang    = parent::post('barang-id');
			
			$restoreStok = $this->tambahStok($idBarang,$jumlahPesan);
			
			if ($restoreStok){
				$removeStatus = parent::model('pemesanan')->delete_pemesanan($idPemesanan);
				if ($removeStatus > 0){
					echo json_encode(array(
						'remove' => 'success',
						'message' => 'berhasil menghapus data pesanan'
					));
				}else{
					echo json_encode(array(
						'remove' => 'error',
						'message' => 'permasalahan menghapus data pesanan'
					));
				}
			}else{
				echo json_encode(array(
					'remove' => 'error',
					'message' => 'permasalahan stok barang'
				));
			}
		}
		
		public function cekRequestPesan($idPelanggan)
		{
			$penggunaID = $this->session->userdata('user_id');
			
			$requestData = parent::model('pemesanan')->get_request_pesanan($idPelanggan,$penggunaID);
			
			if ($requestData > 0){
				echo json_encode(array(
					'data' => $requestData,
					'status' => 'success',
					'message' => 'request berhasil ditemukan'
				));
			}else {
				echo json_encode(array(
					'data'  => null,
					'status' => 'error',
					'message' => 'data tidak ditemukan'
				));
			}
		}
		
		// update stok before pesanan insertion -> kurangi sebelum insert
		public function updateStokBarang($idBarang,$jumlahPesan)
		{
			$isUpdate = parent::model('pemesanan')->update_stok($idBarang,$jumlahPesan);
			return $isUpdate;
		}
		
		// tambah data ketika ada penghapusan atau pembatalan pemesanan
		public function tambahStok($idBarang,$jumlahPesan)
		{
			$isUpdate = parent::model('pemesanan')->tambah_stok($idBarang,$jumlahPesan);
			return $isUpdate;
		}
		
		
		// konfirmasi pesanan
		public function konfirmasiPesanan($idPesanan)
		{
			$updateStatusPesan = parent::model('pemesanan')->update_status_pemesanan($idPesanan);
			if ($updateStatusPesan > 0){
				echo json_encode(array('status' => 'success'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}
		// konfirmasi permohohan
		public function konfirmasiPermohonan($idRequest)
		{
			$updatePermohonan = parent::model('pemesanan')->update_status_permohononan($idRequest);
			if ($updatePermohonan > 0){
				echo json_encode(array('status' => 'success'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}
		
		public function cancelPesanan($idPesanan)
		{
			$deletePesanan = parent::model('pemesanan')->delete_pesanan($idPesanan);
			if ($deletePesanan > 0){
				echo json_encode(array('status' => 'success'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}
		
		public function deletePermohonan($idRequest)
		{
			$deletePermohonanStatus = parent::model('pemesanan')->delete_permohononan($idRequest);
			if ($deletePermohonanStatus > 0){
				echo json_encode(array('status' => 'success'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}
	}