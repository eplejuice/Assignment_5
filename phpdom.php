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

  function kjorDOMRepresent($controller){
    
      $doc = new DOMDocument();
        if (!$doc->load('SkierLogs.xml')) {
          echo "feil ved lasting av dokument";
            } 
        else {
            $xpath = new DOMXpath($doc);
            foreach($xpath->query("/SkierLogs/Season") as $element){
            $fallYear = $element->getAttribute('fallYear');
            foreach($xpath->query("/SkierLogs/Season[@fallYear = $fallYear]/Skiers") as $element){
              if($element->hasAttribute('clubId')){
                  
                $clubId = $element->getAttribute('clubId');
                foreach($xpath->query("/SkierLogs/Season[@fallYear = $fallYear]/Skiers[@clubId = \"$clubId\"]/Skier") as $element){
                $userName = $element->getAttribute('userName');
                $totalDistance = 0;
                foreach($xpath->query("/SkierLogs/Season[@fallYear = $fallYear]/Skiers[@clubId = \"$clubId\"]/Skier[@userName = \"$userName\"]/Log/Entry/Distance") as $temp){
                  $totalDistance += $temp->nodeValue;
                }
               $controller->addRepresent(new represent($userName, $clubId, $fallYear, $totalDistance));
                      }

              }
              else
              {
                $clubId = NULL;
                foreach($xpath->query("/SkierLogs/Season[@fallYear = $fallYear]/Skiers[not(@clubId)]/Skier") as $element){
                $userName = $element->getAttribute('userName');
                $totalDistance = 0;
                foreach($xpath->query("/SkierLogs/Season[@fallYear = $fallYear]/Skiers[not(@clubId)]/Skier[@userName = \"$userName\"]/Log/Entry/Distance") as $temp){
                  $totalDistance += $temp->nodeValue;
                }
               $controller->addRepresent(new represent($userName, $clubId, $fallYear, $totalDistance));
                      }
                  }
            
                }
              }
            }
    }
?>