<div class="subscribe step1">
    <h2>Informations personnelles</h2>
    <div class="step1_liaison">
    <?php if ( $age < $age +1 ) : ?>
<form action="#" method="POST" id='liaisonSanitaireForm'>
    <div>
        Enfant : <?php print(ucfirst(strtolower($contact->firstname))); ?> <?php print(strtoupper($contact->lastname)); ?>, né le <?php $dt = new DateTime($contact->birthdate); print($dt->format("d/m/Y")); ?>
    </div>
    <div>
        <h2>Merci de remplir la fiche sanitaire suivante</h2>
        <h3>Vaccination</h3>
        <table>
            <thead>
                <tr>
                    <th>Vaccin</th>
                    <th>Effectué</th>
                    <th>Date du dernier rappel</th>
                    <th>Etat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Diphtérie</td>
                    <td><input type="checkbox" name="diphterie" value="1" attr-mandatory='true' /></td>
                    <td><input type="text" name="date_diphterie" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='true' /></td>
                    <td>Obligatoire</td>
                </tr>
                <tr>
                    <td>Tétanos</td>
                    <td><input type="checkbox" name="tetanos" value="1" attr-mandatory='true' /></td>
                    <td><input type="text" name="date_tetanos" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='true' /></td>
                    <td>Obligatoire</td>
                </tr>
                <tr>
                    <td>Poliomyelite / DT Polio / Tétracoq</td>
                    <td><input type="checkbox" name="polio" value="1" attr-mandatory='true' /></td>
                    <td><input type="text" name="date_polio" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='true' /></td>
                    <td>Obligatoire</td>
                </tr>
                <tr>
                    <td>BCG</td>
                    <td><input type="checkbox" name="bcg" value="1" attr-mandatory='true' /></td>
                    <td><input type="text" name="date_bcg" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='true' /></td>
                    <td>Obligatoire</td>
                </tr>
                <tr>
                    <td>Hépatite B</td>
                    <td><input type="checkbox" name="hepatite_b" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_hepatite_b" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>Recommandé</td>
                </tr>
                <tr>
                    <td>Rubéole-Oreillons-Rougeole</td>
                    <td><input type="checkbox" name="rubeole" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_rubeole" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>Recommandé</td>
                </tr>
                <tr>
                    <td>Coqueluche</td>
                    <td><input type="checkbox" name="coqueluche" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_coqueluche" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>Recommandé</td>
                </tr>
                <tr>
                    <td>Autre : <input type="text" name="autre_1" value="" attr-mandatory='false' /></td>
                    <td><input type="checkbox" name="autre_1" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_autre_1" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Autre : <input type="text" name="autre_2" value="" attr-mandatory='false' /></td>
                    <td><input type="checkbox" name="autre_2" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_autre_2" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Autre : <input type="text" name="autre_3" value="" attr-mandatory='false' /></td>
                    <td><input type="checkbox" name="autre_3" value="1" attr-mandatory='false' /></td>
                    <td><input type="text" name="date_autre_3" value="<?php print(date("d/m/Y")); ?>" attr-mandatory='false' /></td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div>
        <h2>Maladies contractées</h2>
        <p>L'enfant a déjà contracté les maladies suivantes : </p>
        <input type='checkbox' name='has_rubeole' value='1' attr-mandatory='false' /><label for="has_rubeole">Rubéole</label>
        <input type='checkbox' name='has_varicelle' value='1' attr-mandatory='false' /><label for="has_varicelle">Varicelle</label>
        <input type='checkbox' name='has_angine' value='1' attr-mandatory='false' /><label for="has_angine">Angine</label>
        <input type='checkbox' name='has_rhumatisme' value='1' attr-mandatory='false' /><label for="has_rhumatisme">Rhumatisme Articulaire Aigu</label>
        <input type='checkbox' name='has_scarlatine' value='1' attr-mandatory='false' /><label for="has_scarlatine">Scarlatine</label>
        <input type='checkbox' name='has_coqueluche' value='1' attr-mandatory='false' /><label for="has_coqueluche">Coqueluche</label>
        <input type='checkbox' name='has_otite' value='1' attr-mandatory='false' /><label for="has_otite">Otite</label>
        <input type='checkbox' name='has_rougeole' value='1' attr-mandatory='false' /><label for="has_rougeole">Rougeole</label>
        <input type='checkbox' name='has_oreillons' value='1' attr-mandatory='false' /><label for="has_oreillons">Oreillons</label>
    </div>
    
    <div>
        <h2>Allergies</h2>
        <p>L'enfant a les allergies suivantes : </p>
        <input type='checkbox' name='allergie_asthme' value='1' attr-mandatory='false' /><label for="allergie_asthme">Asthme</label>
        <input type='checkbox' name='allergie_aliment' value='1' attr-mandatory='false' /><label for="allergie_aliment">Alimentaire</label>
        <input type='checkbox' name='allergie_medicament' value='1' attr-mandatory='false' /><label for="allergie_medicament">Médicamenteuse</label>
        <label for="allergie_autre">Autres (précisez) : </label><input type='text' name='allergie_autre' value='' attr-mandatory='false' />
        <br /><label for="allergie_conduite">Cause de(s) allergie(s) et Conduite à tenir : </label><br />
        <textarea name='allergie_conduite' attr-mandatory='false'></textarea>
    </div>
    
    <div>
        <h2>Difficultés de santé</h2>
        <p>Indiquez ici les difficultés de santé (maladie, accident, crises convulsives, hospitalisation, opération, rééducation), en précisant les dates et <b>les précautions à prendre</b></p>
        <textarea name='difficulte_sante'></textarea>
    </div>
    
    <div>
        <h2>Recommandations des parents</h2>
        <label for="reco_lit">L'enfant mouille son lit</label> <input type='checkbox' name='reco_lit' value='1' attr-mandatory='false' />
        <label for="reco_fille">Ma fille est reglée</label> <input type='checkbox' name='reco_fille' value='1' attr-mandatory='false' />
        <p>Votre enfant porte-t-il des lentilles, des lunettes, des prothèses auditives, des prothèses dentaires, ... ?</p>
        <textarea name='reco_parent' attr-mandatory='false'></textarea>
    </div>
    
    <div>
        <h2>Responsable légal de l'enfant pendant le séjour</h2>
        <label for="lastname">Nom</label><div><input type="text" name ="lastname" value="" placeholder="Nom" attr-mandatory='true' /></div>
        <label for="firstname">Prénom</label><div><input type="text" name ="firstname" value="" placeholder="Prénom" attr-mandatory='true' /></div>
        <label for="phone">Téléphone</label><div><input type="text" name ="phone" value="" placeholder="Téléphone" attr-mandatory='true' /></div>
        <label for="cell_phone">Téléphone</label><div><input type="text" name ="cell_phone" value="" placeholder="Téléphone mobile" attr-mandatory='true' /></div>
        <label for="address_1">Adresse</label><div><input type="text" name ="address_1" value="" placeholder="Adresse" class="xl" attr-mandatory='true' /></div>
        <label for="address_2">Complément</label><div><input type="text" name ="address_2" value="" placeholder="Complément d'adresse" class="xl" attr-mandatory='false' /></div>
        <label for="zipcode">Code Postal</label><div><input type="text" name ="zipcode" value="" placeholder="CP" class="s" attr-mandatory='true' /></div>
        <label for="city">Ville</label><div><input type="text" name ="city" value="" placeholder="Ville" attr-mandatory='true' /></div>
        <label for="secu">Numéro de sécurité sociale</label><div><input type="text" name ="secu" value="" placeholder="N° sécu" attr-mandatory='true' /></div>
        <label for="lastname_dr">Nom du médecin traitant</label><div><input type="text" name ="lastname_dr" value="" placeholder="Nom" attr-mandatory='true' /></div>
        <label for="firstname_dr">Prénom du médecin traitant</label><div><input type="text" name ="firstname_dr" value="" placeholder="Prénom" attr-mandatory='true' /></div>
        <label for="phone_dr">Téléphone du médecin traitant</label><div><input type="text" name ="phone_dr" value="" placeholder="Téléphone" attr-mandatory='false' /></div>
        <label for="has_cmu">Bénéficiaire de la CMU</label><div><input type="checkbox" name ="has_cmu" value="1" attr-mandatory='false' /></div>
        <label for="has_pec_100">Prise en charge à 100% de la S.S.</label><div><input type="checkbox" name ="has_pec_100" value="1" attr-mandatory='false' /></div>
    </div>
    
    <div>
        <h2>Organisateur du stage</h2>
        [COORDONNEES ORGANISATEUR]
    </div>
    
    <div>
        <h2>Validation</h2>
        <p>Je soussigné, <input type='text' name='validation_name' value='NOM Prénom' attr-mandatory='true' />, responsable légal de l'enfant, déclare exacts les renseignements portés sur cette fiche et autorise le responsable du séjour à prendre, le cas échéant, toutes mesures (traitement médicuax, hospitalisations, interventions chirurgicales) rendues nécessaires par l'état de l'enfant.</p>
        <p>Date : <?php print(date("d/m/Y")); ?></p>
        <p><input type='checkbox' name='validation_finale' value='1' attr-mandatory='true' /> Je valide la fiche sanitaire ci-dessus</p>
    </div>
    
    <div class='result'></div>
</form>
    <?php else : ?>
        Participant au stage : <?php print(ucfirst(strtolower($contact->firstname))); ?> <?php print(strtoupper($contact->lastname)); ?>
    <?php endif; ?>
    </div>
    <input type="button" name="create_contact" onclick='insertSanitaire(<?php print($id_stage); ?>, <?php print($age < $age +1 ? 1 : 0); ?>);' value="Etape suivante" />
</div>
<div class="subscribe step2">
    b
</div>
<div class="subscribe step3">
    c
</div>

<script type='text/javascript'>
$("input.logged_subscriber").click(function() {
    if ( $(this).val() == 1 )
        $("div.step1_contact").hide();
    else
        $("div.step1_contact").show();
});
</script>