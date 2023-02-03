<?php
?>
<br>
<p class="text-center h4 mt-2"><?php echo $title ?></p>
<div class="text-center">
    <a class="button mb-1" type="button" href="index2.php?controller=article&action=createArticle">Créer un article</a>
</div>
<br>
<div class="div-alert"> <?php echo $message ?>
</div>
<div class="div-of-rows">
<?php
if ($articles != null){ // null when the table is empty
    foreach($articles as $article){ ?>
        <div class="row">
            <div class="col-12 col-md-1">
                <a class="text-danger" href="<?php echo 'index2.php?controller=article&action=deleteArticle&id='.$article[ID]?>">Supp.</a>
            </div>
            <div class="col-12 col-md-1">
                <a class="text-success" href="<?php echo 'index2.php?controller=article&action=updateArticle&id='.$article[ID]?>">Maj</a>
            </div>
            <div class="col-12 col-md-1"> <?php echo $article[LOGINUSER] ?> <?php echo $article[STATUS] ?></div>
            <div class="col-12 col-md-3"> <?php echo $article[TITLE] ?></div> 
            <div class="col-12 col-md-6 text-justify"> <?php echo $article[SUMMARY] ?></div>
        </div>
    <?php }
} ?>
</div>