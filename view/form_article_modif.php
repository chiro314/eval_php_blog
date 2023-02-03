<?php 
//const ID = 0, TITLE = 1, PHOTO = 2, SUMMARY = 3, CONTENT = 4, SHOWCASE = 5;
//const STATUS = 6, FIRSTPUBLICATIONDATE = 7, LASTMODIFICATIONDATE = 8, LOGINUSER = 9;
?>
<br>
<p class="text-center h4 mt-2"><?php echo $title ?></p>
<div class="div-alert"> <?php echo $message ?></div>

<?php foreach($articles as $article){ ?>
    
    <form id="form_article_modif" name="form_article_modif" action="index2.php" method="POST">
        
        <div class="row">
            <div class="col-12 col-md-2 text-right"><span class="font-weight-bold">Publication : </span></div>
            <div class="col-12 col-md-2">
                <input type="radio" id="nopublication" name="status" value="draft" <?php echo $article[STATUS]=="draft" ? ' checked' : ''; ?>>
                <label id="label-nopublication" for="nopublication">Brouillon</label>
            </div>
            <div class="col-12 col-md-2">
                <input type="radio" id="publication" name="status" value="inline" <?php echo $article[STATUS]=="draft" ? '' : ' checked'; ?>>
                <label id="label-publication" for="publication">Publié</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2 text-right"><span class="font-weight-bold">Mise en vitrine :</span></div>
            <div class="col-12 col-md-2">
                <input type="radio" id="noshowcase" name="showcase" value="0" <?php  echo $article[SHOWCASE]==0? ' checked' : ''; ?>>
                <label id="label-noshowcase" for="noshowcase">Non</label>
            </div>
            <div class="col-12 col-md-2">
                <input type="radio" id="showcase" name="showcase" value="1" <?php   echo $article[SHOWCASE]==0? '' : ' checked'; ?>>
                <label id="label-showcase" for="showcase">Oui</label>
            </div>
        </div>
        <br>

        <label for="title">Titre </label><input id="title" name="title" type="text" value="<?php echo $article[TITLE] ?>" required><br>
        <label for="photo">Photo</label><input id="photo" name="photo" type="text" value="<?php echo $article[PHOTO] ?>"><br>
        <label for="summary">Résumé </label><textarea id="summary" name="summary" minlength="5" maxlength="<?php echo SUMMARYMAX ?>" rows="2" cols="100" required><?php echo $article[SUMMARY] ?></textarea><br>
        <label for="content">Contenu  </label><textarea id="content" name="content" maxlength="<?php echo CONTENTMAX ?>" rows="7" cols="100"><?php echo $article[CONTENT] ?></textarea>

        <input type="hidden" name="id" value="<?php echo $article[ID] ?>">
        <input type="hidden" name="form_article_modif" value="1">
        <div class="text-center">
            <br><input type="submit" value="Envoyer" class="button">
        </div>
    </form>
<?php } ?>
