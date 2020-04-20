<?php
class Event{
	public $name;
	public $date;
	public $time;
	public $volNeeded; //number of volunteers needed
	//public $volSignedUp; if we can figure out how to do it
	public $description;
	
	public function construct($name=null, $date=null, $time=null, $volNeeded=null, $description=null) {
		$this->name=$name;
		$this->date=$date;
		$this->time=$time;
		$this->volNeeded=$volNeeded;
		//$this->volSignedUp=$volSignedUp;
		$this->description=$description;
	}
	
	public function create($data) {
		//check if all fields are filled
		if(!isset($data['name']{0}) || !isset($data['date']{0}) || !isset($data['time']{0}) || !isset($data['volNeeded']{0}) || !isset($data['description']{0})) return 'One or more fields is missing. Please fill out every field.';
		
		//check if date hasn't happened yet
		if(strtotime($data['date']) <= time()) return 'This date has already occurred, please choose a date in the future.';
		
		//Possibily put a restriction on the time of the event
		
		//I believe volNeeded can get restricitons directly in the form
		
		//Possibly put a character limit on description
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