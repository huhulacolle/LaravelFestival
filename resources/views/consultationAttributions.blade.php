<title>Acceuil > Attribution chambres</title>
@include("debut")
<?php
$id = NULL;
$NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
$NBChambres2 = $NBChambres;
?>
@foreach ($reqNBChambres as $reqNBChambresData)
<?php $nb = ($reqNBChambresData->nombreEtabOffrantChambres);
if ($nb != 0) {
?>
<table width='30%' cellspacing='0' cellpadding='0' align='right'>
<tr><td>
    <a href='EffectuerOuModifier'>
        Effectuer ou modifier les attributions</a></td></tr></table><br><br><br>
</table>
    @foreach ($reqChambres as $reqChambresData)
    <?php
    $NBChambre = ($reqChambresData->nombreChambresOffertes);
    $NBChambres = $NBChambres2;
    $id = ($reqChambresData->idEtablissement);
    $id = '"'.$id.'"';
    $DB = $NBChambres.$id;
    $Verif = DB::select($DB);
    ?>
    @foreach ($Verif as $VerifData)
    <?php $Disp = ($VerifData->nombreChambres) ?>
    @endforeach
    <?php
    $Dispo = $NBChambre - $Disp;
    if ($Dispo == 0) {
        $Dispo = "Aucune réservations disponible";
    }
    if ($Disp == 0) {
    }
    else {
        ?>
    <div class='mx-auto' style='width: 700px;'>
        <table class='table table-bordered' width='60%' cellspacing='0' cellpadding='0' align='center'class='tabQuadrille'>
            <td colspan='2' align='center'>
                <strong>{{$reqChambresData->nom}}</strong>
                (Offre : {{$reqChambresData->nom}} Disponibilités : {{$Dispo}})
            </td>
            <?php
            $Equipe = DB::select('select distinct idE, nom, nomPays from Equipe, Attribution where
        Attribution.idEquipe=Equipe.ide and idEtab='.$id.'');
            ?>
            <tr class='ligneTabQuad'>
                <td width='65%' align='left'><i><strong>Nom Equipe</strong></i></td>
                <td width='35%' align='left'><i><strong>Chambres attribuées</strong></i>
                </td>
            </tr>
            @foreach ($Equipe as $EquipeData)
            <?php
            $idEquipe = ($EquipeData->idE);
            $DBEquipe = DB::select('select nombreChambres From Attribution where idEtab='.$id.' and idEquipe="'.$idEquipe.'"');
            ?>
            @foreach ($DBEquipe as $DBEquipeData)
            <?php
                $NbOccupEquipe = ($DBEquipeData->nombreChambres);
                Log::debug($NbOccupEquipe);
            ?>
            @endforeach
            <tr class='ligneTabQuad'>
                <td width='65%' align='left'><strong>{{$EquipeData->nom}}</strong> - {{$EquipeData->nomPays}}</td>
                <td width='35%' align='left'>{{$NbOccupEquipe}}</td>
            </tr>
            @endforeach

        </table>
    </div>
        <?php
    }
    ?>
    <br> <br>
    @endforeach
<?php
}
else {
    echo "Veillez crée des établissements";
}
?>
@endforeach
<?php
// if ($nbEtab!=0)
// {
//    echo "

//    <table width='30%' cellspacing='0' cellpadding='0' align='right'>
//    <tr><td>
//    <a href='modificationAttributions.php?action=demanderModifAttrib'>
//    Effectuer ou modifier les attributions</a></td></tr></table><br><br><br>";

//    // POUR CHAQUE ÉTABLISSEMENT : AFFICHAGE D'UN TABLEAU COMPORTANT 2 LIGNES
//    // D'EN-TÊTE ET LE DÉTAIL DES ATTRIBUTIONS
//    $req=obtenirReqEtablissementsAyantChambresAttribuées();
//    $rsEtab=$connexion->query($req);
//    $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
//    // BOUCLE SUR LES ÉTABLISSEMENTS AYANT DÉJÀ DES CHAMBRES ATTRIBUÉES
//    while($lgEtab!=FALSE)
//    {
//       $idEtab=$lgEtab['idEtablissement'];
//       $nomEtab=$lgEtab['nom'];

//       echo "
//       <div class='mx-auto' style='width: 700px;'>
//       <table class='table table-bordered' width='60%' cellspacing='0' cellpadding='0' align='center'
//       class='tabQuadrille'>";

//       $nbOffre=$lgEtab["nombreChambresOffertes"];
//       $nbOccup=obtenirNbOccup($connexion, $idEtab);
//       // Calcul du nombre de chambres libres dans l'établissement
//       $nbChLib = $nbOffre - $nbOccup;

//       // AFFICHAGE DE LA 1ÈRE LIGNE D'EN-TÊTE
//       echo "
//       <tr class='enTeteTabQuad'>
//          <td colspan='2' align='center'><strong>$nomEtab</strong>&nbsp;
//          (Offre : $nbOffre&nbsp;&nbsp;Disponibilités : ";
//          if($nbChLib == 0)
//             {
//                echo"Aucune réservations disponible)";
//             }
//          else
//          {
//              echo"$nbChLib)";
//          }
//       echo"
//          </td>
//       </tr>";

//       // AFFICHAGE DE LA 2ÈME LIGNE D'EN-TÊTE
//       echo "
//       <tr class='ligneTabQuad'>
//          <td width='65%' align='left'><i><strong>Nom Equipe</strong></i></td>
//          <td width='35%' align='left'><i><strong>Chambres attribuées</strong></i>
//          </td>
//       </tr>";

//       // AFFICHAGE DU DÉTAIL DES ATTRIBUTIONS : UNE LIGNE PAR GROUPE AFFECTÉ
//       // DANS L'ÉTABLISSEMENT
//       $req=obtenirReqEquipesEtab($idEtab);
//       $rsEquipe=$connexion->query($req);
//       $lgEquipe=$rsEquipe->fetch(PDO::FETCH_ASSOC);

//       // BOUCLE SUR LES GROUPES (CHAQUE GROUPE EST AFFICHÉ EN LIGNE)
//       while($lgEquipe!=FALSE)
//       {
//          $idEquipe=$lgEquipe['idE'];
//          $nomEquipe=$lgEquipe['nom'];
//          $nomPays=$lgEquipe['nomPays'];
//          echo "
//          <tr class='ligneTabQuad'>
//             <td width='65%' align='left'><strong>$nomEquipe</strong> - $nomPays</td>";
//          // On recherche si des chambres ont déjà été attribuées à ce groupe
//          // dans l'établissement
//          $nbOccupEquipe=obtenirNbOccupEquipe($connexion, $idEtab, $idEquipe);
//          echo "
//             <td width='35%' align='left'>$nbOccupEquipe</td>
//          </tr>" ;
//          $lgEquipe=$rsEquipe->fetch(PDO::FETCH_ASSOC);
//       } // Fin de la boucle sur les groupes

//       echo "
//       </table><br><br>";
//       $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
//    } // Fin de la boucle sur les établissements
// }

?>
