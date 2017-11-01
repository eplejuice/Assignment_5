<?php
class represent {
	public $userName;
	public $clubID;
	public $season;
	public $totalDistance;

	public function __construct($userName, $clubID, $season, $totalDistance) {  
        $this->userName = $userName;
        $this->clubID = $clubID;
	    $this->season = $season;
	    $this->totalDistance = $totalDistance;
    } 
}
?>