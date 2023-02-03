<?php

class class_comments_controller {

    private $comments;

    public function __construct($idarticle, $status)
    {
        $this->comments = new class_comments($idarticle, $status);
    }
//??
    public function constructOne($idcomment)
    {
        $this->comments->constructOne($idcomment);
    }

    public function getAll() 
    {
        return $this->comments->getAll();
    }

    public function getFirstpublicationdate($idcomment)
    {
        return $this->comments->getFirstpublicationdate($idcomment);
    }
    public function getCreationdate($idcomment)
    {
        return $this->comments->getCreationdate($idcomment);
    }
    public function getIdarticle($idcomment)
    {
        return $this->comments->getIdarticle($idcomment);
    }
    public function getLoginuser($idcomment)
    {
        return $this->comments->getLoginuser($idcomment);
    }
      
    public function displayAll($status)
    {   global $title, $message;
        
        $comments = $this->comments->getAll(); 
        if ($status == "draft") $title = "Liste des commentaires non publiés (draft)";
        else $title = "";

        include "view/div_comments.php";
    }

    public function siteDisplayAll($id){

        $comments = $this->comments->getAll();
        include "view/div_comments.php";
    }
    
    public function displayOne()
    {   
        global $message, $title;

        $comments = $this->comments->getAll(); // here, All is only one
        
        if ($comments != null){ // null when the table is empty
            include "view/form_comment_modif.php";
        }
    }
 
    public function deleteComment($idcomment)
    {
        $this->comments->deleteComment($idcomment);        
    }
    
    public function publishComment($idcomment)
    {
        $this->comments->publishComment($idcomment);        
    }


    public function createComment($content, $idarticle)
    {
        $this->comments->createComment($content, $idarticle);        
    }

    public function updateComment($id, $status, $contentmodif, $content, $creationdate, $lastmodificationdate, $firstpublicationdate, $idarticle, $loginuser) 
    {
        $this->comments->updateComment($id, $status, $contentmodif, $content, $creationdate, $lastmodificationdate, $firstpublicationdate, $idarticle, $loginuser);        
    }
} 