<?php 
	include_once("phppdo.php");
	include_once("phpdom.php");	

	$controller = new db();
	kjorDomClub($controller);
	kjorDomSkier($controller);
	kjorDOMRepresent($controller);

?>