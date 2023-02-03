
<br>
<form id="form_registration" name="form_registration" action="index2.php" method="POST" class="text-center">
    <div class="div-alert"> <?php echo $message ?></div>
    <label for="login">Login</label><input id="login" name="login" type="text" value="" required><br>
    <label for="psw">Mot de passe</label><input id="psw" name="psw" type="password" value="" required>
    <br><br>
    <div class="row">
        <div class="col-12 offset-md-4 col-md-5 pl-1">
            <!--clé du site-->
            <div class="g-recaptcha text-center" data-sitekey="6Ldv5gAkAAAAAIRTSDJqz2RY-DqswWEkqJBYlTOE"></div>
        </div>
    </div>
    <input type="hidden" name="type" value="<?php echo $formType ?>">
    <input type="hidden" name="form_registration" value="1">
    <br><input type="submit" value="Envoyer" class="button">
</form>
