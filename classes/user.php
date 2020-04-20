<?php
class User {
	//attributes
	public $name;
	public $email;
	public $password;
	public $organization; //organization the user works for
	
	public function construct($name=null, $email=null, $password=null) {
		$this->name=$name;
		$this->email=$email;
		$this->password=$password;
		$this->organization=$organization;
	}
	
	public function create($data) {
		//check if all fields are filled
		if(!isset($data['name']{0}) || !isset($data['email']{0}) || !isset($data['password']{0}) || !isset($data['organization']{0})) return 'One or more fields is missing. Please fill out every field.';
		
		//check if email is valid
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
		
		//probably add a minimum password length
	}
	
	public function update() {
		//idk for data files
		
	}
	
	public function delete() {
		//idk for data files
	}
	
	public function index() {
		
	}
	
	public function detail() {
		
	}
}
?>