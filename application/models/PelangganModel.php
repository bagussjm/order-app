<?php
	
	class PelangganModel extends  GLOBAL_Model {
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_pelanggan()
		{
			$query = array('pelanggan_isDelete' => 0);
			
			return parent::get_object_of_row('orderapp_pelanggan',$query);
		}
		
		public function get_pelanggan_detail($idPelanggan)
		{
			$query = array('pelanggan_id' => $idPelanggan);
			return parent::get_array_of_row('orderapp_pelanggan',$query);
		}
		
		public function insert_pelanggan($data)
		{
			return parent::insert_with_status('orderapp_pelanggan',$data);
		}
		
		public function ubah_pelanggan($id,$editPelanggan)
		{
			return parent::update_table_with_status('orderapp_pelanggan','pelanggan_id',$id,$editPelanggan);
		}
		
		public function hapus_pelanggan($id)
		{
			$data = array('pelanggan_isDelete' => 1);
			return parent::update_table_with_status('orderapp_pelanggan','pelanggan_id',$id,$data);
		}
		
	}