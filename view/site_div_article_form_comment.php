<?php
//const ID = 0, TITLE = 1, PHOTO = 2, SUMMARY = 3, CONTENT = 4, SHOWCASSE = 5;
//const STATUS = 6, FIRSTPUBLICATIONDATE = 7, LASTMODIFICATIONDATE = 8, LOGINUSER = 9;
global $loggedin, $comments; ?>
<div class="div-alert text-center">
    <?php echo $message ?>
</div>

<div>
    <?php
    if ($articles != null){ // null when the table is empty
        foreach($articles as $article){  /* here, only one article */  ?>
            <div class="row">
                <div class="div-articles-site col-12 offset-md-1 col-md-10">
                    <div class="text-center">
                        <br>
                        <h2> 
                            <?php echo $article[TITLE] ?>
                        </h2>
                        <?php if($article[STATUS] == "draft") { ?>
                            <span>En cours de rédaction par <?php echo $article[LOGINUSER] ?> - Dernière mise à jour le <?php echo date("d-m-Y", $article[LASTMODIFICATIONDATE]) ?>
                            </span> 
                        <?php
                        }
                        else { ?>
                            <span>Publié le <?php echo date("d-m-Y", $article[FIRSTPUBLICATIONDATE]) ?> par <?php echo $article[LOGINUSER] ?> - Dernière mise à jour le <?php echo date("d-m-Y", $article[LASTMODIFICATIONDATE]) ?>
                        </span>
                        <?php
                        } ?>

                        
                        <br><br>
                        <div class="div-photo">
                            <img class="photo-article" src="<?php echo $article[PHOTO] ?>" alt="L'image n'a pas encore été installée">
                        </div>
                        <br>
                    </div>
                    <div class="bg-white w-100 p-3 text-justify">
                        <?php echo $article[CONTENT] ?>
                    </div>
                    <div class="text-center">
                            
                        <p>______</p>
                    </div>
                </div>
            </div> <?php
        } ?>
        <!-- Faire un commentaire : -->
        <div class="text-center">
            <?php
            if (!$loggedin){
                echo "Pour laisser un commentaire, il faut avoir créé un compte et s'être connecté !";
                ?>
                <div class="text-center">         
                        <p>______</p>
                </div> <?php
            }
            else { ?>
                <form id="form_comment" name="form_comment" action="index2.php" method="POST">

                    <label id="id-label-comment-content" for="content">Votre commentaire </label> <br>
                    <textarea id="content" name="content" maxlength="<?php echo CONTENTCOMMENTMAX ?>" placeholder="<?php echo CONTENTCOMMENTMAX ?> caractères max" rows="4" cols="80"></textarea>
                    <br>
                    <div class="row">
                        <div class="col-12 offset-md-3 col-md-7 pl-1">
                            <div class="row">
                            <div class="col-12 offset-md-2 col-md-10">
                                <!--clé du site-->
                                <div class="g-recaptcha text-center" data-sitekey="6Ldv5gAkAAAAAIRTSDJqz2RY-DqswWEkqJBYlTOE"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idarticle" value="<?php echo $article[ID] ?>">
                    <input type="hidden" name="form_comment" value="1">                        
                    <input type="submit" value="Soumettre" class="button">
                    <div class="text-center">      
                        <p>______</p>
                    </div>
                </form>
                 <?php
            } ?>
        </div>

        <!-- Liste des commentaires de cet article : -->
        <?php
        
        if ($comments != null){ // null when the table is empty
    
            foreach($comments as $comment){  /* here, only one  */  ?>
                <div class="row">
                    <div class="div-comments-site col-12 offset-md-1 col-md-10">
                        <div class="text-center">
                            <span>Rédigé le <?php echo date("d-m-Y", $comment[cCREATIONDATE]) ?> par <?php echo $comment[cLOGINUSER] ?> et publié le <?php echo date("d-m-Y", $comment[cFIRSTPUBLICATIONDATE]) ?>
                            </span>
                            <br>
                        </div>
                        <div class="bg-white w-100 p-3 text-justify">
                            <?php echo $comment[cCONTENT] ?>
                        </div>
                        <div class="text-center">
                                
                            <p>______</p>
                        </div>
                    </div>
                </div> <?php
            }
        } 
    } ?>
</div>