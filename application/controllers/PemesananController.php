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
			$data['title'] = 'daftar seluruh pesanan pelanggan';
			$data['pemesanans'] = parent::model('pemesanan')->get_pesanan();
//			parent::array_dump($data['pemesanans']);
			parent::template('pemesanan/daftar',$data);
		}
		
		public function tambah()
		{
			$data['title'] = 'Tambah pesanan';
			
//			parent::type_dump($data['request_id']);
			parent::template('pemesanan/tambah',$data);
		}
		
		// permohonan pesanan oleh sales
		public function permohonan()
		{
			$data['title'] = 'Data permohonan pesanan barang';
			$data['permohonans'] = parent::model('pemesanan')->get_permohonan();
			parent::template('pemesanan/permohonan',$data);
		}
		
		public function daftarPermohonan($id)
		{
			$permohonan = parent::model('pemesanan')->get_daftar_permohonan($id);
			if ($permohonan !== null){
				$data['title'] = 'Detail pemesanan';
				$data['request'] = $permohonan;
				
				$data['pesanans'] = parent::model('pemesanan')->get_pesanan_pelanggan_by_request($id);
//				parent::array_dump($data['pesanans']);
				parent::template('pemesanan/pemesanans',$data);
				
			}else{
				show_404();
			}
		}
		
		// tambah permohonan
		public function tambahPermohonan()
		{
			$request = array(
				'request_id' => parent::post('request-id'),
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
		
		// modul cetak
		public function suratKeluarBarang($id)
		{
			$request = parent::model('pemesanan')->get_daftar_permohonan($id);
//			parent::array_dump($request);
			if ($request !== null){
				$pesanans = parent::model('pemesanan')->get_data_surat_by_request($id);
//				parent::array_dump($pesanans);
				$data['title'] = 'Cetak Surat Keluar Barang';
				if (!empty($pesanans)){
					$data['pesanans'] = $pesanans;
					$data['request'] = $request;
				}else{
					$data['pesanans'] = null;
					$data['request'] = null;
				}
				parent::template('pemesanan/surat-keluar',$data);
			}else{
				show_404();
			}
		}
		
		
	}