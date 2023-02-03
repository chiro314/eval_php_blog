<?php 

?>
<br>
<p class="text-center h4 mt-2"><?php echo $title ?></p>
<div class="div-alert"> <?php echo $message ?></div>

<?php foreach($comments as $comment){ ?>
    
    <p id="#id-label-comment-article" class="text-center h5 mt-2"><?php echo $comment[cTITLE] ?></p><br>

    <form class="text-center" id="form_comment_modif" name="form_comment_modif" action="index2.php" method="POST">
        
        <div class="row">
            <div class="col-12 offset-md-1 col-md-2 text-right">
                <span class="font-weight-bold">Publication : </span>
            </div>
            <div class="col-12 col-md-2">
                <input class="text-right" type="radio" id="nopublication2" name="status" value="draft" <?php echo $comment[cSTATUS]=="draft" ? ' checked' : ''; ?>>
                <label class="text-left" id="label-nopublication2" for="nopublication2">Brouillon</label>
            </div>
            <div class="col-12 col-md-2">
                <input class="text-right" type="radio" id="publication2" name="status" value="inline" <?php echo $comment[cSTATUS]=="draft" ? '' : ' checked'; ?>>
                <label class="text-left" id="label-publication2" for="publication2">Publié</label>
            </div>
        </div>
        <br>
        
        <textarea id="content" name="content" maxlength="<?php echo CONTENTCOMMENTMAX ?>" rows="5" cols="100"><?php echo $comment[cCONTENT] ?></textarea>
        
        <input type="hidden" name="id" value="<?php echo $comment[cID] ?>">
        <input type="hidden" name="form_comment_modif" value="1">
        <div class="text-center">
            <input type="submit" value="Envoyer" class="button">
        </div>
    </form>
<?php } ?>
