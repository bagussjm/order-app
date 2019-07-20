<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	
	// pemesanan
	$route['pemesanan'] = 'PemesananController';
	$route['pemesanan/tambah'] = 'PemesananController/tambah';
	
	// barang
	$route['barang'] = 'BarangController';
	$route['barang/tambah'] = 'BarangController/tambah';
	$route['barang/(:any)'] = 'BarangController/detail/$1';
	
	//sales
	$route['sales/dashboard'] = 'SalesController/dashboard';
	
	// pelangan
	$route['pelanggan'] = 'PelangganController';
	$route['pelanggan/tambah'] = 'PelangganController/tambah';
	$route['pelanggan/(:any)'] = 'PelangganController/detail/$1';

	$route['default_controller'] = 'AdminController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

