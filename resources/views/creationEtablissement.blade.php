<title>Acceuil > Gestion établissements > Création établissements</title>
@include ("debut")
<table align='center' width='85%'>
    <tr>
        <td width='34%' align='left'><a href='GestionEtablissement'>Retour</a>
        </td>
    </tr>
</table>
<form method='post' action='CreationExec'>
@csrf

    <center>
        <h4> Nouvel Etablissement </h4>
    </center>
<?php
$nb = '0123456789';
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$id = '035';
for ($i = 0; $i < 4; $i++) {
    $id .= $nb[rand(0, strlen($nb) - 1)];
}
$id[7] = $chars[rand(0, strlen($chars) - 1)];
?>
    <div class="mx-auto" style="width: 800px;">
        <table class="table table-hover">
            <tr>
                <td> id : <input type='text' class="form-control" name='id' <?php echo "value='" . $id . "'" ?> size='1'
                        maxlength='8' readonly>
                    <br>
                </td>
                <td>
                <td></td>
                </td>
            </tr>
            <tr>
                <td>Nom : <input type="text" class="form-control" name="nom" maxlength="45" required></td>
                <td>Adresse :<input type="text" class="form-control" name="adresseRue" maxlength="45" required></td>
                <td>Code Postal :<input type="number" class="form-control" name="codePostal"
                        onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;"></td>
            </tr>
            <tr>
                <td>Ville :<input type="text" class="form-control" name="ville" maxlength="35" required></td>
                <td>Téléphone :<input type="number" class="form-control" name="tel" maxlength="10" required></td>
                <td>E-mail (non obligatoire) :<input type="email" class="form-control" name="adresseElectronique"
                        maxlength="70"></td>
            </tr>
            <tr>
                <br> <br>
                <td> <br> <strong> Type: </strong> </td>

                <td> <br> <input type='radio' name='type' value='1' checked> Etablissement Scolaire </td>
                <td> <br> <input type='radio' name='type' value='0'> autre </td>
            </tr>

            </td>
            </tr>
            <tr>
                <td> <br> <br> <strong>Responsable :</strong></td>
                </select>
                <td> <br> Nom : <input type="text" class="form-control" name="nomResponsable" size="26" maxlength="25" required>
                </td>
                <td> <br> Prénom : <input type="text" class="form-control" name="prenomResponsable" size="26"
                        maxlength="25" required> </td>
            </tr>
            <tr>
                <td></td>
                <td> <br> Civilité :
                    <select class="form-control" name='civiliteResponsable'>
                        <option>M.</option>
                        <option>Mme</option>
                        <option>Melle</option>
                </td>
                <td> <br> Nombre chambres offertes :<input type="number" class="form-control"
                        name="nombreChambresOffertes" size="1"
                        onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" min="0" required></td>

            </tr>
        </table>
    </div>
    <div class="mx-auto" style="width: 1000px;">
        <table class="table table-borderless">
            <thead>
                <tr class='ligneTabNonQuad'>
                    <td width='85%'></td>
                    <td><button type="submit" value="Valider" class="btn btn-primary mb-2">Valider</button></td>
                </tr>
        </table>
    </div>
    <?php

// En cas de validation du formulaire : affichage des erreurs ou du message de
// confirmation
// if ($action=='validerCreEtab')
// {
//    if (nbErreurs()!=0)
//    {
//       afficherErreurs();
//    }
//    else
//    {
//       echo '<meta http-equiv="refresh" content="0 ; URL=listeEtablissements.php">';
//    }
// }

?>
