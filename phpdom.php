<?php

include_once("skier.php");
include_once("club.php");
include_once("represent.php");
include_once("phppdo.php");


function kjorDOMClub($controller){

  $doc = new DOMDocument();
    if (!$doc->load('SkierLogs.xml')) {
      echo "feil ved lasting av dokument";
        } 
    else {
        $xpath = new DOMXpath($doc);
        foreach($xpath->query("/SkierLogs/Clubs/Club") as $element){
        $children = $element->childNodes;
        $clubId = $element->getAttribute('id');
        $name = $children->item(1)->nodeValue;
        $clubcity = $children->item(3)->nodeValue;
        $clubcounty = $children->item(5)->nodeValue; 
        $controller->addClub(new club($clubId, $name, $clubcity, $clubcounty));
          }
        }
}

function kjorDOMSkier($controller){
  
    $doc = new DOMDocument();
      if (!$doc->load('SkierLogs.xml')) {
        echo "feil ved lasting av dokument";
          } 
      else {
          $xpath = new DOMXpath($doc);
          foreach($xpath->query("/SkierLogs/Skiers/Skier") as $element){
          $children = $element->childNodes;
          $userName = $element->getAttribute('userName');
          $firstName = $children->item(1)->nodeValue;
          $lastName = $children->item(3)->nodeValue;
          $YearOfBirth = $children->item(5)->nodeValue; 
          $controller->addSkier(new skier($userName, $firstName, $lastName, $YearOfBirth));
            }
          }
  }
?>