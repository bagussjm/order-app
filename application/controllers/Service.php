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
			}
		}
		
		/*
		 * pelanggan api service
		 * **/
		public function getPelanggan()
		{
			$pelanggans = parent::model('pelanggan')->get_pelanggan();
			if ($pelanggans === null) {
				echo json_encode(array('pelanggan' => null));
			} else {
				echo json_encode($pelanggans);
			}
		}
		
	}