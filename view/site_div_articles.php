<?php
?>
<div class="text-center">
    <!-- Filtering themes buttons list -->
</div>

<div>
    <br>
    <?php
    if ($articles != null){ // null when the table is empty
        foreach($articles as $article){ ?>
        <div class="row">
            <div class="div-articles-site col-12 offset-md-1 col-md-10">
                <div class="text-center">
                    <h2>
                        <a href="<?php echo 'index2.php?controller=article&action=siteArticle&id='.$article[ID]?>"><?php echo $article[TITLE] ?></a>
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
                        <a href="<?php echo 'index2.php?controller=article&action=siteArticle&id='.$article[ID]?>"><img class="photo-article" src="<?php echo $article[PHOTO] ?>" alt="L'image n'a pas encore été installée"></a>
                    </div>
                    <br>
                </div>
                <div class="bg-white w-100">
                    <?php echo $article[SUMMARY] ?>
                </div>
                <div class="text-center">
                    <br>    
                    <a href="<?php echo 'index2.php?controller=article&action=siteArticle&id='.$article[ID]?>">Lire la suite...</a>
                    <br>
                    <p>______</p>
                </div>
            </div>
        </div>
        
        <?php
        } 
    } ?>
</div>