<?php
// CONSTANTS for class_articles :
const ID = 0, TITLE = 1, PHOTO = 2, SUMMARY = 3, CONTENT = 4, SHOWCASE = 5;
const STATUS = 6, FIRSTPUBLICATIONDATE = 7, LASTMODIFICATIONDATE = 8, LOGINUSER = 9;

// CONSTANTS for class_comments :
const   cID = 0, cSTATUS = 1, cCONTENTMODIF = 2, cCONTENT = 3, 
        cCREATIONDATE = 4, cLASTMODIFICATIONDATE = 5, cFIRSTPUBLICATIONDATE = 6,
        cIDARTICLE = 7, cLOGINUSER = 8, 
        cTITLE = 9; // cTITLE est the article tittle (used on admin comments screens)

// CONSTANTS for form_articles :
const SUMMARYMAX = 500; // same DB
const CONTENTMAX = 15000; // same DB
const CONTENTCOMMENTMAX = 500; // same DB


function testStrs($operation, $strsTransmises){
    $strsTestees = [];
    for($i=0;$i<count($strsTransmises);$i++) { 
        array_push($strsTestees, strip_tags($strsTransmises[$i]));
    }

    $adjOrdinal = [];
    if(count($strsTransmises) ==1) $adjOrdinal[0] = "";
    else $adjOrdinal[0] = " 1ère";
    for($i=1;$i<count($strsTransmises);$i++) { 
        array_push($adjOrdinal, " ".($i +1)."e");
    }
    //$adjOrdinal = [" 1ère", " 2e", " 3e", " 4e", " 5e", " 6e"];

    //Contrôles de chaque zone de saisie : 
    for($i=0;$i<count($strsTransmises);$i++) { 
        if ($strsTestees[$i] != $strsTransmises[$i]) {
            return "L'information de la".$adjOrdinal[$i]." zone n'était pas valide.<br>".$operation." n'a pas eu lieu.";
        }
    }
    for($i=0;$i<count($strsTransmises);$i++) { 
        if(empty($strsTransmises[$i])) {
            return "La ".$adjOrdinal[$i]." zone était vide. ".$operation." n'a pas eu lieu.";
        }
    }
    
    //Tous les contrôles sont négatif (= sont OK) :
    return "";
}

function validerCaptcha(){
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Ldv5gAkAAAAAPFwjhV6iMKrQEbT_z3KliOPMNuB&response={$_POST['g-recaptcha-response']}";
    
    $response = file_get_contents($url);
    
    if(empty($response) || is_null($response)) {
        echo "empty $response";  //header('Location: index2.php');
        return false;
    }
    else{
        $data = json_decode($response);

        if($data->success) return true;
        else  return false;    //header('Location: index2.php');
    }
}
