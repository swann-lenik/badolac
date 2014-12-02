<pre><?php
$xpl = array_map("trim", explode("/", $contact[0]->ranking));
$dt = new DateTime($contact[0]->birthdate);
?></pre>

<form id="personalInfosModif" method="POST" action="javascript:">
    <h2>Informations personnelles</h2>
    <div class="label">Nom</div>
    <div class="label_value"><input type="text" name="lastname" value="<?php print($contact[0]->lastname); ?>" /></div>
    <div class="label">Prénom</div>
    <div class="label_value"><input type="text" name="firstname" value="<?php print($contact[0]->firstname); ?>" /></div>
    <div class="label">E-mail de contact</div>
    <div class="label_value"><input type="text" name="mail" value="<?php print($contact[0]->mail); ?>" /></div>
    <div class="label">Téléphone</div>
    <div class="label_value"><input type="text" name="phone" value="<?php print($contact[0]->phone); ?>" /></div>
    <div class="label">Adresse</div>
    <div class="label_value"><input type="text" name="address_1" value="<?php print($contact[0]->address_1); ?>" /></div>
    <div class="label">Complément</div>
    <div class="label_value"><input type="text" name="address_2" value="<?php print($contact[0]->address_2); ?>" /></div>
    <div class="label">Code postal</div>
    <div class="label_value"><input type="text" name="zipcode" value="<?php print($contact[0]->zipcode); ?>" /></div>
    <div class="label">Ville</div>
    <div class="label_value"><input type="text" name="city" value="<?php print($contact[0]->city); ?>" /></div>
    <div class="label">Pays</div>
    <div class="label_value"><input type="text" name="country" value="<?php print($contact[0]->country); ?>" /></div>
    <div class="label">Licence</div>
    <div class="label_value"><input type="text" name="licence" value="<?php print($contact[0]->licence); ?>" /></div>
    <div class="label">Club</div>
    <div class="label_value"><input type="text" name="club" value="<?php print($contact[0]->club); ?>" /></div>
    <div class="label">Sexe</div>
    <div class="label_value"><input type="radio" name="sexe" value="H" <?php print($contact[0]->sexe == "H" ? "checked=\"checked\"" : ""); ?> /> Homme <input type="radio" name="sexe" value="F" <?php print($contact[0]->sexe == "F" ? "checked=\"checked\"" : ""); ?> /> Femme</div>
    <div class="label">Classements</div>
    <div class="label_value">
        <select name="simple">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>" <?php print($xpl[0] == $rk ? "selected=\"selected\"" : ""); ?> ><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select> /
        <select name="double">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>" <?php print($xpl[1] == $rk ? "selected=\"selected\"" : ""); ?> ><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select> /
        <select name="mixte">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>" <?php print($xpl[2] == $rk ? "selected=\"selected\"" : ""); ?> ><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="label">Date de naissance</div>
    <div class="label_value"><input type="text" name="birthdate" value="<?php print($dt->format("d/m/Y")); ?>" /></div>
    
    <div class="label">&nbsp;</div>
    <div class="label_value"><input type="button" value="Modifier" onclick="recPersonalInfos(<?php print($contact[0]->id_contact); ?>);" /></div>
 </form>   
    
<form id="accessInfosModif" method="POST" action="javascript:">
    <h2>Accès utilisateur</h2>
    <div class="label">Identifiant</div>
    <div class="label_value"><?php print($user[0]->username); ?></div>
    <div class="label">Adresse e-mail</div>
    <div class="label_value"><?php print($user[0]->mail); ?></div>

    <div class="label">Confirmation</div>
    <div class="label_value"><input type="password" name="new_password_2" id="new_password_2" /></div>
    <div class="label">Nouveau mot de passe</div>
    <div class="label_value"><input type="password" name="new_password_1" id="new_password_1" /></div>    
    <div class="label">Sécurité</div>
    <div class="label_value">La politique de sécurité concernant les mots de passe est la suivante :
        <ul>
            <li>8 caractères minimum, 32 maximum</li>
            <li>Au moins <b>1 chiffre</b></li>
            <li>Au moins <b>1 minuscule</b></li>
            <li>Au moins <b>1 majuscule</b></li>
        </ul>
    </div>
    
    <div class="label">&nbsp;</div>
    <div class="label_value"><input type="button" value="Modifier" onclick="modifyPersonalPassword(<?php print($user[0]->id_user); ?>);" /></div>
</form>   
