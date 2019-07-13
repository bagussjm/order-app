<?php
	
	class PelangganModel extends  GLOBAL_Model {
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_pelanggan()
		{
			return parent::get_array_of_table('orderapp_pelanggan');
		}
		
		public function get_pelanggan_detail($idPelanggan)
		{
			$query = array('pelanggan_id' => $idPelanggan);
			return parent::get_array_of_row('orderapp_pelanggan',$query);
		}
		
	}