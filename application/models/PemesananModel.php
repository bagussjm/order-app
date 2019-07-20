<?php
	/**
	 * Created by PhpStorm.
	 * User: ibag
	 * Date: 7/16/2019
	 * Time: 2:10 PM
	 */
	
	class PemesananModel extends GLOBAL_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function insert_pesanan($pesanans)
		{
			return parent::insert_with_status('orderapp_pemesanan',$pesanans);
		}
		
		public function get_pesanan_pelanggan($id,$sales)
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_pemesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_pemesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_pemesanan.pelanggan_id');
			parent::db()->join('orderapp_barang', 'orderapp_barang.barang_id = orderapp_pemesanan.barang_id');
			parent::db()->where('orderapp_pemesanan.pelanggan_id',$id);
			parent::db()->where('orderapp_pemesanan.pengguna_id',$sales);
			parent::db()->where('orderapp_pemesanan.pemesanan_status_pesan','menunggu');
			parent::db()->where('orderapp_pemesanan.pemesanan_isDelete',0);
			return parent::db()->get()->result_array();
//			return parent::get_object_of_row('orderapp_pemesanan',$query)->result_array();
		}
		
		public function update_stok($idBarang,$jumlahPesan)
		{
			$query = "UPDATE orderapp_barang SET barang_stok = barang_stok - $jumlahPesan WHERE barang_id = '$idBarang'";
			return parent::exec_query($query);
		}
	}