<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class SalesController extends GLOBAL_Controller
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
		
		// test content
		public function dashboard()
		{
			$data['title'] = 'Dashboard - Aplikasi Order Logistik';
			$data['pemesanans'] = parent::model('pemesanan')->get_pesanan();
			$request = parent::model('pemesanan')->get_permohonan();
			if (!empty($request)){
				$data['permohonans'] = $request;
			}else{
				$data['permohonans'] = null;
			}
//			parent::array_dump($data['permohonans']);
			parent::template('sales/dashboard',$data);
		}
	}