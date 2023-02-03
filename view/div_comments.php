<?php
global $title, $message; 
?>
<br>
<p class="text-center h4 mt-2"><?php echo $title ?></p>
<br>
<div class="div-alert"> <?php echo $message ?>
</div>

<div class="div-of-rows">
<?php
if ($comments != null){ // null when the table is empty
    foreach($comments as $comment){ ?>
        <div class="row">
            <div class="col-12 col-md-1">
                <a class="text-danger" href="<?php echo 'index2.php?controller=comment&action=deleteComment&id='.$comment[cID]?>">Supp.</a>
            </div>
            <div class="col-12 col-md-1">
                <a class="text-alert" href="<?php echo 'index2.php?controller=comment&action=updateComment&id='.$comment[cID]?>">Modérer</a>
            </div>
            <div class="col-12 col-md-1">
                <a class="text-success" href="<?php echo 'index2.php?controller=comment&action=publishComment&id='.$comment[cID]?>">Publier.</a>
            </div>
            <div class="col-12 col-md-1"> <?php echo $comment[cLOGINUSER] ?></div>
            <div class="col-12 col-md-2"> <?php echo $comment[cTITLE] ?></div> 
            <div class="col-12 col-md-6 text-justify"> <?php echo $comment[cCONTENT] ?></div>
        </div>
    <?php }
} ?>
</div>