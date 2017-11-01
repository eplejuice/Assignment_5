<?php
class club {
	public $clubID;
	public $name;
	public $city;
	public $county;

	public function __construct($clubID, $name, $city, $county) {  
        $this->clubID = $clubID;
        $this->name = $name;
	    $this->city = $city;
	    $this->county = $county;
    } 
}
?>