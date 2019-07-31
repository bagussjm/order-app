<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	$route['logout'] = 'AuthController/logout';
	
	// admin
	$route['profil'] = 'AdminController/profil';
	$route['bantuan'] = 'AdminController/bantuan';
	$route['pengaturan'] = 'AdminController/pengaturan';
	$route['admin/tambah'] = 'AdminController/tambah';
	$route['admin/ubah/(:any)'] = 'AdminController/ubah/$1';
	$route['admin/hapus/(:any)'] = 'AdminController/hapus/$1';
	
	// pemesanan
	$route['pemesanan'] = 'PemesananController';
	$route['pemesanan/tambah'] = 'PemesananController/tambah';
	$route['pemesanan/permohonan/tambah'] = 'PemesananController/tambahPermohonan';
	$route['pemesanan/permohonan'] = 'PemesananController/permohonan';
	$route['pemesanan/permohonan/(:any)'] = 'PemesananController/daftarPermohonan/$1';
	$route['pemesanan/surat-keluar-barang/(:any)'] = 'PemesananController/suratKeluarBarang/$1';
	
	// cetak
	$route['cetak/surat-keluar-barang/(:any)'] = 'PemesananController/cetakKeluar/$1';
	
	// barang
	$route['barang'] = 'BarangController';
	$route['barang/tambah'] = 'BarangController/tambah';
	$route['barang/(:any)'] = 'BarangController/detail/$1';
	$route['barang/ubah/(:any)'] = 'BarangController/ubah/$1';
	$route['barang/hapus/(:any)'] = 'BarangController/delete/$1';

	// route arsip
	$route['arsip/barang'] = 'BarangController/arsipBarang';
	$route['arsip/pelanggan'] = 'PelangganController/arsipPelanggan';
	$route['arsip/pengguna'] = 'AdminController/arsipPengguna';

//sales
	$route['sales/dashboard'] = 'SalesController/dashboard';
	
	// pelangan
	$route['pelanggan'] = 'PelangganController';
	$route['pelanggan/tambah'] = 'PelangganController/tambah';
	$route['pelanggan/(:any)'] = 'PelangganController/detail/$1';
	$route['pelanggan/hapus/(:any)'] = 'PelangganController/hapus/$1';
	$route['pelanggan/ubah/(:any)'] = 'PelangganController/ubah/$1';

	$route['default_controller'] = 'AdminController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

