<?php
class skier {
	public $userName;
	public $firstName;
	public $lastName;
	public $YearOfBirth;

	public function __construct($userName, $firstName, $lastName, $YearOfBirth) {  
        $this->userName = $userName;
        $this->firstName = $firstName;
	    $this->lastName = $lastName;
	    $this->YearOfBirth = $YearOfBirth;
    } 
}
?>