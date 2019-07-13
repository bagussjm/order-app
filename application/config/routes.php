<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	
	//sales
	$route['sales/dashboard'] = 'SalesController/dashboard';
	
	// pelangan
	$route['pelanggan'] = 'PelangganController';
	$route['pelanggan/(:any)'] = 'PelangganController/detail/$1';

	$route['default_controller'] = 'SalesController/cek_content';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

