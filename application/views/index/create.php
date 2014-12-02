<form id="accessInfosCreate" method="POST" action="javascript:">
    <h2>Informations personnelles</h2>
    <div class="label">Nom</div>
    <div class="label_value"><input type="text" name="lastname" value="" /></div>
    <div class="label">Prénom</div>
    <div class="label_value"><input type="text" name="firstname" value="" /></div>
    <div class="label">E-mail de contact</div>
    <div class="label_value"><input type="text" name="mail" value="" /></div>
    <div class="label">Téléphone</div>
    <div class="label_value"><input type="text" name="phone" value="" /></div>
    <div class="label">Adresse</div>
    <div class="label_value"><input type="text" name="address_1" value="" /></div>
    <div class="label">Complément</div>
    <div class="label_value"><input type="text" name="address_2" value="" /></div>
    <div class="label">Code postal</div>
    <div class="label_value"><input type="text" name="zipcode" value="" /></div>
    <div class="label">Ville</div>
    <div class="label_value"><input type="text" name="city" value="" /></div>
    <div class="label">Pays</div>
    <div class="label_value"><input type="text" name="country" value="" /></div>
    <div class="label">Licence</div>
    <div class="label_value"><input type="text" name="licence" value="" /></div>
    <div class="label">Club</div>
    <div class="label_value"><input type="text" name="club" value="" /></div>
    <div class="label">Sexe</div>
    <div class="label_value"><input type="radio" name="sexe" value="H" /> Homme <input type="radio" name="sexe" value="F" /> Femme</div>
    <div class="label">Classements</div>
    <div class="label_value">
        <select name="simple">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>"><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select> /
        <select name="double">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>"><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select> /
        <select name="mixte">
            <?php foreach(array("T5","T10","T20","T50","A1","A2","A3","A4","B1","B2","B3","B4","C1","C2","C3","C4","D1","D2","D3","D4","NC","inconnu") as $rk) : ?>
            <option value="<?php print($rk); ?>"><?php print($rk); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="label">Date de naissance (dd/mm/aaaa)</div>
    <div class="label_value"><input type="text" name="birthdate" value="" /></div>    
    
    
    <h2>Accès utilisateur</h2>
    <div class="label">Identifiant</div>
    <div class="label_value"><input type="text" name="username" value="" placeholder="Identifiant" /></div>

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
    <div class="label_value"><input type="button" value="Créer son compte" onclick="newContact(false);" /></div>
</form>   