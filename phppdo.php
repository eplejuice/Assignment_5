<?php

include_once("skier.php");
include_once("club.php");
include_once("represent.php");

class db
{        
    protected $db = null;
    public function __construct($db = null)  
    {  
	   if ($db) {
			$this->db = $db;
		}
		else
		{
            try {
                $this->db = new PDO('mysql:host=localhost;dbname=assignment_5;charset=utf8mb4', 'root', '', 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }   
            catch(PDOException $ex) {
                throw $ex;
            }
		}
    }
   
    public function addSkier($skier)
    {
        try {
        $stmt = $this->db->prepare('INSERT INTO skier (userName, firstName, lastName, YearOfBirth) '
        . 'VALUES(:userName, :firstName, :lastName, :YearOfBirth)');
        
        }
        catch(PDOException $ex) {
            throw $ex;
        }
        $stmt->bindValue(':userName', $skier->userName);
        $stmt->bindValue(':firstName', $skier->firstName);
        $stmt->bindValue(':lastName', $skier->lastName);
        $stmt->bindValue(':YearOfBirth', $skier->YearOfBirth);
        $stmt->execute();
    }


    public function addClub($club)
    {
        try {
        $stmt = $this->db->prepare('INSERT INTO club (clubID, name, city, county) '
        . 'VALUES(:clubID, :name, :city, :county)');
        
        }
        catch(PDOException $ex) {
            throw $ex;
        }
        $stmt->bindValue(':clubID', $club->clubID);
        $stmt->bindValue(':name', $club->name);
        $stmt->bindValue(':city', $club->city);
        $stmt->bindValue(':county', $club->county);
        $stmt->execute();
    }


    public function addRepresent($represent)
    {
        try {
        $stmt = $this->db->prepare('INSERT INTO represent (userName, clubID, season, totalDistance) '
        . 'VALUES(:userName, :clubID, :season, :totalDistance)');
        
        }
        catch(PDOException $ex) {
            throw $ex;
        }
        $stmt->bindValue(':userName', $represent->userName);
        $stmt->bindValue(':clubID', $represent->clubID);
        $stmt->bindValue(':season', $represent->season);
        $stmt->bindValue(':totalDistance', $represent->totalDistance);
        $stmt->execute();
    }

}
?>