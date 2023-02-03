
<br>
<p class="text-center h4 mt-2"><?php echo $title ?></p>
<div class="div-alert"> <?php echo $message ?></div>
<form id="form_article" name="form_article" action="index2.php" method="POST">
    <label for="title">Titre </label><input id="title" name="title" type="text" value="" required><br>
    <label for="photo">Photo</label><input id="photo" name="photo" type="text" value=""><br>
    <label for="summary">Résumé </label><textarea id="summary" name="summary" minlength="5" maxlength="<?php echo SUMMARYMAX ?>" rows="2" cols="100" value="" required></textarea><br>
    <label for="content">Contenu  </label><textarea id="content" name="content" maxlength="<?php echo CONTENTMAX ?>" rows="7" cols="100" value=""></textarea>
    
    <input type="hidden" name="type" value="<?php echo $formType ?>"> <!-- creation or modification (not used : see form_article_modif.php) -->
    <input type="hidden" name="form_article" value="1">
    <div class="text-center">
        <br><input type="submit" value="Envoyer" class="button">
    </div>
</form>
