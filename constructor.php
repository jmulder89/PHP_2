<?php

	class $User{
		private $_userName;
		public function __construct($name){
			$this-> _userName = $name;
		}
		
		
		public function getUsername(){
			return $this->_userName;
		}
	}

	$user = newUser("henk");
	echo $user->getUsername;
	
?>