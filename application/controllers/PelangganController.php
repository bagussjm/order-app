<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class PelangganController extends GLOBAL_Controller
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
			$data['pelanggans'] = parent::model('pelanggan')->get_pelanggan();
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
	}