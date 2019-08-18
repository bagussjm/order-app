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
		
		public function get_pesanan()
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_pemesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_pemesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_pemesanan.pelanggan_id');
			parent::db()->join('orderapp_barang', 'orderapp_barang.barang_id = orderapp_pemesanan.barang_id');
			parent::db()->where('orderapp_pemesanan.pemesanan_isDelete',0);
			return parent::db()->get()->result_array();
		}
		
		public function insert_pesanan($pesanans)
		{
			return parent::insert_with_status('orderapp_pemesanan',$pesanans);
		}
		
		public function get_pesanan_pelanggan_by_request($requestId)
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_pemesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_pemesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_pemesanan.pelanggan_id');
			parent::db()->join('orderapp_barang', 'orderapp_barang.barang_id = orderapp_pemesanan.barang_id');
			parent::db()->where('orderapp_pemesanan.request_id',$requestId);
			parent::db()->where('orderapp_pemesanan.pemesanan_status_pesan','menunggu');
			parent::db()->where('orderapp_pemesanan.pemesanan_isDelete',0);
			return parent::db()->get()->result_array();
//			return parent::get_object_of_row('orderapp_pemesanan',$query)->result_array();
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
		}
		
		// remove pesanan
		public function delete_pemesanan($idPemesanan)
		{
			$query = array('pemesanan_id'=> $idPemesanan);
			return parent::delete_row_with_status('orderapp_pemesanan',$query);
		}
		
		public function update_stok($idBarang,$jumlahPesan)
		{
			$query = "UPDATE orderapp_barang SET barang_stok = barang_stok - $jumlahPesan WHERE barang_id = '$idBarang'";
			return parent::exec_query($query);
		}
		
		public function tambah_stok($idBarang,$jumlahPesan)
		{
			$query = "UPDATE orderapp_barang SET barang_stok = barang_stok + $jumlahPesan WHERE barang_id = '$idBarang'";
			return parent::exec_query($query);
		}
		
		// modul permohonan
		public function get_permohonan()
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_requestpesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_requestpesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_requestpesanan.pelanggan_id');
			return parent::db()->get()->result_array();
		}
		
		public function get_daftar_permohonan($id)
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_requestpesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_requestpesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_requestpesanan.pelanggan_id');
			parent::db()->where('request_id',$id);
			return parent::db()->get()->row_array();
		}
		
		
		public function get_request_pesanan($idPelanggan,$penggunaID)
		{
			$query = array(
				'pengguna_id' => $penggunaID,
				'pelanggan_id' => $idPelanggan,
				'request_status' => 'terkirim'
			);
			return parent::get_object_of_row('orderapp_requestpesanan',$query)->num_rows();
		}
		
		public function insert_permohonan($request)
		{
			return parent::insert_with_status('orderapp_requestpesanan',$request);
		}
		
		public function update_status_pemesanan($idPesanan)
		{
			$query = array('pemesanan_status_pesan' => 'konfirmasi');
			return parent::update_table_with_status('orderapp_pemesanan','pemesanan_id',$idPesanan,$query);
		}
		
		public function update_status_permohononan($idRequest)
		{
			$query = array('request_status' => 'dilihat');
			return parent::update_table_with_status('orderapp_requestpesanan','request_id',$idRequest,$query);
		}
		
		public function get_request_by_sales($salesId,$pelangganId)
		{
			$query = "SELECT * FROM orderapp_requestpesanan WHERE pengguna_id = '$salesId' AND pelanggan_id = '$pelangganId'";
			return parent::exec_query($query);
		}
		
		// modul cetak permohonan
		public function get_pesanan_by_request($pelanggan,$sales,$tanggalRequest)
		{
			$query = "SELECT * FROM orderapp_pemesanan INNER JOIN
						orderapp_pengguna on orderapp_pemesanan.pengguna_id = orderapp_pengguna.pengguna_id
						INNER JOIN orderapp_pelanggan on orderapp_pemesanan.pelanggan_id = orderapp_pelanggan.pelanggan_id
						INNER JOIN orderapp_barang on orderapp_pemesanan.barang_id = orderapp_barang.barang_id
						WHERE orderapp_pemesanan.pengguna_id = '$sales' AND  orderapp_pemesanan.pelanggan_id = '$pelanggan'
						AND orderapp_pemesanan.pemesanan_tgl_pesan <= '$tanggalRequest' ";
			return parent::exec_query($query)->result_array();
			
		}
		
		public function get_data_surat_by_request($id)
		{
			parent::db()->select('*');
			parent::db()->from('orderapp_pemesanan');
			parent::db()->join('orderapp_pengguna', 'orderapp_pengguna.pengguna_id = orderapp_pemesanan.pengguna_id');
			parent::db()->join('orderapp_pelanggan', 'orderapp_pelanggan.pelanggan_id = orderapp_pemesanan.pelanggan_id');
			parent::db()->join('orderapp_barang', 'orderapp_barang.barang_id = orderapp_pemesanan.barang_id');
			parent::db()->where('orderapp_pemesanan.request_id',$id);
			parent::db()->where('orderapp_pemesanan.pemesanan_status_pesan','konfirmasi');
			parent::db()->where('orderapp_pemesanan.pemesanan_isDelete',0);
			return parent::db()->get()->result_array();
		}
		
		// get total rows of table
		public function total_of_table($table)
		{
			return parent::db()->count_all($table);
		}
		
		public function sum_field($field,$table)
		{
			parent::db()->select_sum($field);
			return parent::db()->get($table)->row_array();
		}
		
	}