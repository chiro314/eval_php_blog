    <?php
    //http://localhost/exo/eval_php_blog/index2.php

    require "view/header2.php";

    ?>
    <div class="row">
    
        <div class="col-12 col-md-1">
        </div>

        <div class="col-12 col-md-10">
        
            <?php // "Accueil" menu parameters reception :
            if (isset($_REQUEST['controller']) and isset($_REQUEST['action'])){ //cma
                $controller = $_REQUEST['controller'];
                $action = $_REQUEST['action'];             

                switch($controller){

                    case"comment":

                        switch($action){

                            case"updateComment":
                                require "model/connexionbdd.php";
                                require "model/class_comments.php";
                                require "controller/class_comments_controller.php";

                                $ctrl = new class_comments_controller("",""); // "" means empty object
                                $ctrl->constructOne($_REQUEST['id']); // comment id
                                $title = "Modérer ce commentaire de l'article";
                                $message = "";
                                $ctrl->displayOne();
                            break;

                            case"publishComment": //publish the comment (admin draft comments list)
                                require "model/connexionbdd.php";
                                require "model/class_comments.php";
                                require "controller/class_comments_controller.php";
                                $ctrl = new class_comments_controller("", ""); // ($idarticle, $status) : "" means an empty object just to call the function "deleteComment".
                                $ctrl->publishComment($_REQUEST['id']); //($idcomment) 

                                // Display all the remaining draft comments (for all the articles) :
                                $ctrl2 = new class_comments_controller("*", "draft"); // ($idarticle, $status) 
                                $title = "Commentaires à modérer et/ou publier";
                                $message="Le commentaire a été publié";
                                $ctrl2->siteDisplayAll("draft");  
            
                            break;

                            case"deleteComment":
                                require "model/connexionbdd.php";
                                require "model/class_comments.php";
                                require "controller/class_comments_controller.php";
                                $ctrl = new class_comments_controller("", ""); // ($idarticle, $status) : "" means an empty object just to call the function "deleteComment".
                                $ctrl->deleteComment($_REQUEST['id']); //($idcomment) 

                                // Display all the remaining draft comments (for all the articles) :
                                $ctrl = new class_comments_controller("*", "draft"); // ($idarticle, $status) 
                                $title = "Commentaires à modérer et/ou publier";
                                $message="Le commentaire a été supprimé";
                                $ctrl->siteDisplayAll("draft");  
                            break;

                            case"list": // Display the draft comments for the admin
                                require "model/connexionbdd.php";
                                require "model/class_comments.php";
                                require "controller/class_comments_controller.php";
                                $ctrl = new class_comments_controller("*", "draft"); // ($idarticle, $status) 
                                $message = "";
                                $title = "Commentaires à modérer et/ou publier";
                                $ctrl->siteDisplayAll("draft");
                            break;
                        }
                    break;

                    case"article":
                    
                        switch($action){

                            case"siteArticle": // Display one article for the user or the admin
                                require "model/connexionbdd.php";
                                                                
                                //Get the comments for this article :
                                require "model/class_comments_article.php";
                                require "controller/class_comments_article_controller.php"; 
                                $ctrl2 = new class_comments_article_controller($_REQUEST['id'], "inline"); //($idarticle, $status)
                                $comments = $ctrl2->getAll();

                                //ko if ($comments == null) echo "NULL";
                                
                                //Get the article :
                                require "model/class_articles.php";
                                require "controller/class_articles_controller.php";
                                $ctrl = new class_articles_controller("",""); // "" means empty object
                                $ctrl->constructOne($_REQUEST['id']); // id article
                                $message = "";

                                $ctrl->siteDisplayOne();
                            break;

                            case"siteList": // liste of the articles (inline for the user, all for the admin)
                                require "model/connexionbdd.php";
                                require "model/class_articles.php";
                                require "controller/class_articles_controller.php";
                                if ($userType == "admin"){
                                    $ctrl = new class_articles_controller("*", "*"); // "*" mean every themes and status
                                }
                                else{
                                    $ctrl = new class_articles_controller("*", "inline"); // "*" means every themes with status "inline"
                                }
                                $ctrl->siteDisplayAll("*"); // "*" means every themes

                            break;

                            case"list": //the list of all the articles for the admin
                                require "model/connexionbdd.php";
                                require "model/class_articles.php";
                                require "controller/class_articles_controller.php";
                                $ctrl = new class_articles_controller("*", "*"); // "*" mean every themes and every status)
                                $message="";
                                $ctrl->displayAll("*"); // "*" means every themes)
                            break;

                            case"updateArticle": // update an article for the admin
                                require "model/connexionbdd.php";
                                require "model/class_articles.php";
                                require "controller/class_articles_controller.php";

                                $ctrl = new class_articles_controller("",""); // "" means empty object
                                $ctrl->constructOne($_REQUEST['id']);
                                $title = "Modifier cet article";
                                $message = "";
                                $ctrl->displayOne();
                            break;

                            case"deleteArticle": // delete an article for the admin
                                require "model/connexionbdd.php";
                                require "model/class_articles.php";
                                require "controller/class_articles_controller.php";
                                                
                                $ctrl = new class_articles_controller("",""); // ($theme, $status) : "" means an empty object just to call the function "deleteArticle".
                                $ctrl->deleteArticle($_REQUEST['id']);

                                // Display all the remaining articles
                                $ctrl = new class_articles_controller("*", "*"); // ($theme, $status) "*" means every themes
                                $message="L'article a été supprimé";
                                $ctrl->displayAll("*"); // "*" means every themes)                               
                            break;

                            case"createArticle": // create an article for the admin
                                $title = 'Créer un article ';
                                $message = "";
                                $formType = "creation"; // or modification
                                include "view/form_article.php";
                            break;
                        }
                    break;

                    case"user":

                        switch($action){
                            
                            case"connection": //for user and admin
                                $message = "";
                                require "view/form_login.php";
                            break;

                            case"disconnection": //for user and admin
                                session_destroy();
                                header("Location: http://localhost/exo/J16-EXAM/index2.php");
                                //exit;
                            break;

                            case"registration": //create an account (user or admin)
                                $message = "";
                                $formType = $_REQUEST['type'];
                                require "view/form_registration.php";
                            break;
                        }
                    break; //case"user"
                }
            }
            // form_login :
            if (isset($_POST['form_login']) and $_POST['form_login'] ==1) {
                $givenStrs = array($_POST['login'], $_POST['psw']);
                $message = testStrs("La connexion", $givenStrs); //Visual Studio Code can't find that function that is still in controller/functions.php.
                if($message!="") require "view/form_login.php";
                else if (!validerCaptcha()){  //Visual Studio Code can't find that function that is still in controller/functions.php.
                    $message = "Captcha ko, recommencez !";
                    require "view/form_login.php";
                }
                else{
                    //Verify in the DB that login and psw exist : 
                    require "model/connexionbdd.php";
                    require "model/class_user.php";
                    require "controller/class_user_controller.php";
                    
                    $ctrl = new user_controller($_POST['login'], $_POST['psw']);
                    if ($ctrl->checkExists()){
                        $_SESSION["login"] = $_POST['login']; //ou $givenStrs[0];
                        $_SESSION["type"] = $ctrl->getType();
                        $_SESSION["status"] = $ctrl->getStatus();
                        header("Location: http://localhost/exo/J16-EXAM/index2.php");
                        //exit;
                    }
                    else{
                        session_unset(); // unset($_SESSION['nomvariable']); session_destroy();
                        $message = "Login ou mot de passe incorrect.<br>La connexion n'a pas eu lieu.";
                        require "view/form_login.php";
                    }
                }
            }
            // form_registration :
            if (isset($_POST['form_registration']) and $_POST['form_registration'] ==1) {
                $givenStrs = array($_POST['login'], $_POST['psw']);
                $message = testStrs("L'inscription", $givenStrs); //Visual Studio Code can't find that function that is still in controller/functions.php.
                if($message!="") require "view/form_registration.php";
                else if (!validerCaptcha()){  //Visual Studio Code can't find that function that is still in controller/functions.php.
                    $message = "Captcha ko, recommencez !";
                    require "view/form_login.php";
                }
                else{
                    //Verify into the DB that this Login is free : 
                    require "model/connexionbdd.php";
                    require "model/class_user.php";
                    require "controller/class_user_controller.php";
              
                    $ctrl = new user_controller($_POST['login'], $_POST['psw']);
                    if ($ctrl->checkIsFree()){
                    
                        if($_POST['type'] == "admin"){
                            $ctrl->insert("admin", "actif");
                        }
                        else {
                            $ctrl->insert("user", "actif");
                            $_SESSION["login"] = $_POST['login']; 
                            $_SESSION["type"] = "user";
                            $_SESSION["status"] = "actif";
                        }
                        //$_SESSION["login"] = $_POST['login']; //ou $givenStrs[0];

                        header("Location: http://localhost/exo/J16-EXAM/index2.php");
                        //exit;
                    }
                    else{
                        session_unset(); // unset($_SESSION['nomvariable']); session_destroy();
                        $message = "Ce Login n'est pas disponible.<br>L'inscription n'a pas eu lieu.";
                        require "view/form_registration.php";
                    }
                }
            }

            // form_article_modif :
            if (isset($_POST['form_article_modif']) and $_POST['form_article_modif'] ==1) {
                 
                require "model/connexionbdd.php";
                require "model/class_articles.php";
                require "controller/class_articles_controller.php";

                //Récupérer certaines anciennes valeurs :
                $ctrlOld = new class_articles_controller("", ""); // "" means empty object
                $ctrlOld->constructOne($_POST['id']);
                $firstpublicationdateOld = $ctrlOld->getFirstpublicationdate($_POST['id']);

                //Calculer et transmettre les nouvelles valeurs :
                $ctrl = new class_articles_controller("","");

                $ctrl->updateArticle(
                    $_POST['id'], $_POST['title'], $_POST['photo'], $_POST['summary'], $_POST['content'],
                    $_POST['showcase'] == 0 ? 0 : time(),
                    $_POST['status'],
                    ($firstpublicationdateOld == 0 and $_POST['status'] == "inline") ? time() : $firstpublicationdateOld ,
                    time(),
                    $login
                );  
                
                // Display all articles :
                $ctrl = new class_articles_controller("*", "*"); // "*" mean every themes and every status)
                $message="";
                $ctrl->displayAll("*"); // "*" means every themes)
            }

            // form_article (creation) :
            if (isset($_POST['form_article']) and $_POST['form_article'] ==1) {
                
                require "model/connexionbdd.php";
                require "model/class_articles.php";
                require "controller/class_articles_controller.php";
                                
                if($_POST['type'] == "creation"){
                    $ctrl = new class_articles_controller("", ""); // "" means an empty object just to call the function "createArticle".
                    $ctrl->createArticle($_POST['title'],$_POST['photo'],$_POST['summary'],$_POST['content']);
                
                    $ctrl = new class_articles_controller("*", "*"); // "*" mean every themes and every status)
                    $message="";
                    $ctrl->displayAll("*"); // "*" means every themes)
                }               
            }
            
            // form_comment : comment creation :
            if (isset($_POST['form_comment']) and $_POST['form_comment'] ==1) {

                require "model/connexionbdd.php";

                $givenStrs = array($_POST['content']);
                $message = testStrs("L'enregistrement du commentaire", $givenStrs); //Visual Studio Code can't find that function that is still in controller/functions.php.
                if($message!="") {
                    $message .= '  : <a href="#form_comment">retour aux commentaires</a>'; 
                }
                else if (!validerCaptcha()){  //Visual Studio Code can't find that function that is still in controller/functions.php.
                    $message = "Captcha ko, recommencez !";
                    require "view/form_login.php";
                }
                else{
                    // Insert the comment (waiting for admin control) into the DB : 
                    require "model/class_comments.php";
                    require "controller/class_comments_controller.php";
              
                    $ctrl = new class_comments_controller("", "");
                
                    $ctrl->createComment($_POST['content'], $_POST['idarticle']);      
                    $message = "Votre commentaire a été envoyé pour validation. Merci.";
                    $message .= ' <a href="#form_comment">Retour aux commentaires</a>';
                }
                
                //Get comments for this article :
                require "model/class_comments_article.php";
                require "controller/class_comments_article_controller.php"; 
                $ctrl2 = new class_comments_article_controller($_POST['idarticle'], "inline"); 
                $comments = $ctrl2->getAll();

                //Display the article again using $_POST['idarticle'] :
                require "model/class_articles.php";
                require "controller/class_articles_controller.php";
                              
                $ctrl = new class_articles_controller("",""); // "" means empty object
                $ctrl->constructOne($_POST['idarticle']);
                $ctrl->siteDisplayOne(); ///////////ko
            } 

            //form_comment_modif :
            if (isset($_POST['form_comment_modif']) and $_POST['form_comment_modif'] ==1) {
                 
                require "model/connexionbdd.php";
                require "model/class_comments.php";
                require "controller/class_comments_controller.php";

                //Récupérer certaines anciennes valeurs :
                $ctrlOld = new class_comments_controller("", ""); // "" means empty object
                $ctrlOld->constructOne($_POST['id']);

                $firstpublicationdateOld = $ctrlOld->getFirstpublicationdate($_POST['id']);
                $creationdateOld = $ctrlOld->getCreationdate($_POST['id']); 
                $idarticleOld = $ctrlOld->getIdarticle($_POST['id']); 
                $loginuserOld = $ctrlOld->getLoginuser($_POST['id']);       

                //Calculer et transmettre les nouvelles valeurs :
                $contentmodif = 1;
                $creationdate = $creationdateOld ;
                $lastmodificationdate = time();

                if($firstpublicationdateOld != 0) $firstpublicationdate = $firstpublicationdateOld;
                else if ($_POST['status'] == "draft") $firstpublicationdate = 0;
                else $firstpublicationdate = time();

                $idarticle = $idarticleOld;
                $loginuser = $loginuserOld;

                $ctrl = new class_comments_controller("","");
                $ctrl->updateComment(
                    $_POST['id'], 
                    $_POST['status'],
                    $contentmodif,
                    $_POST['content'],
                    $creationdate,
                    $lastmodificationdate,
                    $firstpublicationdate,
                    $idarticle,
                    $loginuser
                );  
                            
                // Display all the remaining draft comments (for all the articles) :
                $ctrl2 = new class_comments_controller("*", "draft"); // ($idarticle, $status) 
                $title = "Commentaires à modérer et/ou publier";
                $message = "La modification a été prise en compte";
                $message .= ($_POST['status'] == 'inline') ? " et le commentaire a été publié." : ".";
                $ctrl2->siteDisplayAll("draft"); 
            }
            ?>
        </div> <!-- col-->

        <div class="col-12 col-md-1">
        </div>
    </div> <!--row-->
    <footer>
        <div id="div-hello-footer">
            <p class="text-center"><?php echo $helloFooter ?></p>
            <button><a id="" href="#div-h1">Retour en haut de la page</a></button>
        </div>
    </footer>
</div> <!--container-->
<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous">
</script>
<!-- <script type="text/javascript" src="view/deconnexion.js"></script>  -->
</body>
</html>