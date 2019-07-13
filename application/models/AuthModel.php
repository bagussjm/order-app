<?php
	
	class AuthModel extends  GLOBAL_Model {
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_pengguna($email,$password)
		{
			$user = array(
				'pengguna_email' => $email,
				'pengguna_password' => $password
			);
			
			return parent::get_object_of_row('orderapp_pengguna',$user);
			
		}
		
		
	}