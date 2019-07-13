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
		}
		
		// test content
		public function dashboard()
		{
			$data['title'] = 'Dashboard - Aplikasi Order Logistik';
			parent::template('sales/index',$data);
		}
	}