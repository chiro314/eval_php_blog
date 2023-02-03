<?php

class class_articles_controller {

    private $articles;

    

    public function __construct($theme, $status)
    {
        $this->articles = new class_articles($theme, $status);
    }

    public function constructOne($id)
    {
        $this->articles->constructOne($id);
    }

    public function getFirstpublicationdate($id)
    {
        return $this->articles->getFirstpublicationdate($id);
    }

    public function getId()
    {
        return $this->articles->getId();
    }
        
    public function displayAll($theme)
    {   global $title, $message;
        
        $articles = $this->articles->getAll(); 
        
        //if ($articles != null){ // null when the table is empty
            if ($theme == "*") $title = "Liste des articles";
            else $title = 'Liste des articles du thème '.$theme;
        //}
        
        include "view/div_articles.php";
    }

    public function siteDisplayAll($theme){

        $articles = $this->articles->getAll();
        include "view/site_div_articles.php";
    }
    
    public function displayOne()
    {   
        global $message, $title;

        $articles = $this->articles->getAll(); // here, "All" is only one

        if ($articles != null){ // null when the table is empty
            include "view/form_article_modif.php";
        }
    }

    public function siteDisplayOne()
    {   
        global $message;

        $articles = $this->articles->getAll(); // here, "All" is only one

 /*       //Get the comments for this article :
        require "model/class_comments.php";
        require "controller/class_comments_controller.php"; 
        $ctrl = new class_comments_controller($this->articles->getId(), "inline"); //($idarticle, $status)
        
        $comments = $ctrl->getAll();
  */  
        if ($articles != null){ // null when the table is empty
            include "view/site_div_article_form_comment.php"; // an article with a form to create a comment and with its comments.
        }
    }
   
    public function deleteArticle($id)
    {
        $this->articles->deleteArticle($id);        
    }

    public function createArticle($title, $photo, $summary, $content)
    {
        $this->articles->createArticle($title, $photo, $summary, $content);        
    }

    public function updateArticle($id, $title, $photo, $summary, $content, $showcase, $status, $firstpublicationdate, $lastmodificationdate, $loginuser) 
    {
        $this->articles->updateArticle($id, $title, $photo, $summary, $content, $showcase, $status, $firstpublicationdate, $lastmodificationdate, $loginuser);        
    }
} 