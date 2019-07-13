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
		public function cek_content()
		{
			$data['title'] = 'hae title';
			parent::template('sales/index',$data);
		}
	}