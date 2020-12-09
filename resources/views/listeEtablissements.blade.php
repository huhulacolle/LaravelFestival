<title>Acceuil > Gestion établissements</title>
@include("debut");
<div class="mx-auto" style="width: 900px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td colspan='4'>Etablissements</td>
            </tr>
                <?php
                $id = NULL;
                $NBChambres2 = NULL;
                $NBChambres2 = $NBChambres;
                ?>
            @foreach ($reqEtab as $reqEtabData)
                <?php $NBChambres = $NBChambres2 ?>
                <tr class="ligneTabNonQuad">
                    <td width='44%'>{{$reqEtabData->nom}}</td>
                    <td width='16%'>
                        <center><a href="Detail?idEtablissement={{$reqEtabData->idEtablissement}}">Voir Detail</a></center>
                    </td>
                    <td width='16%'>
                        <center><a href="Modification?idEtablissement={{$reqEtabData->idEtablissement}}">Modifier</a></center>
                        <?php
                        $id = ($reqEtabData->idEtablissement);
                        $nombreChambresOffertes = ($reqEtabData->nombreChambresOffertes);
                        ?>
                    </td>
                    <td width='16%' align='center'>
                        <?php
                        $id = '"'.$id.'"';
                        $NBChambres = $NBChambres.$id;
                        $Verif = DB::select($NBChambres);
                        ?>
                        @foreach ($Verif as $VerifData)
                            <?php
                            $nbEtabChambres = ($VerifData->nombreChambres);
                            if ($nbEtabChambres == NULL) {
                                $nbEtabChambres = 0;
                            }
                            $nb = $nombreChambresOffertes - $nbEtabChambres;
                            if ($nbEtabChambres == 0) {
                                ?>
                                <a href="Suppresion?idEtablissement={{$reqEtabData->idEtablissement}}">Supprimer</a>
                                <?php
                            }
                            elseif ($nb == 0) {
                                echo "Complet";
                            }
                            else {
                                echo "Chambres libres : $nb";
                            }
                            ?>
                        @endforeach
                    </td>
                </tr>
            @endforeach
</div>
</table>
<div class="mx-auto" style="width: 1200px;">
    <table class="table table-borderless">
        <thead>
            <tr class='ligneTabNonQuad'>
                <td width='70%'></td>

                <td colspan='4'><a href='Creation'>
                        Création d'un établissement</a></td>
            </tr>
    </table>
</div>

<?php

// echo "
// <table width='70%' cellspacing='0' cellpadding='0' align='center'
// class='tabNonQuadrille'>
//    <tr class='enTeteTabNonQuad'>
//       <td colspan='4'>Etablissements</td>
//    </tr>";

//    $req=obtenirReqEtablissements();
//    $rsEtab=mysqli_query( $connexion,$req);
//    $lgEtab=mysqli_fetch_array($rsEtab);
//    // BOUCLE SUR LES ÉTABLISSEMENTS
//    while ($lgEtab!=FALSE)
//    {
//       $idEtablissement=$lgEtab['idEtablissement'];
//       $nom=$lgEtab['nom'];
//       echo $nom;
//       echo"
// 		<tr class='ligneTabNonQuad'>
//          <td width='52%'>$nom</td>

//          <td width='16%' align='center'>
//          <a href='detailEtablissement.php?idEtablissement=$idEtablissement'>
//          Voir détail</a></td>

//          <td width='16%' align='center'>
//          <a href='modificationEtablissement.php?action=demanderModifEtab&amp;idEtablissement=$idEtablissement'>
//          Modifier</a></td>";

//          // S'il existe déjà des attributions pour l'établissement, il faudra
//          // d'abord les supprimer avant de pouvoir supprimer l'établissement
// 			if (!existeAttributionsEtab($connexion, $idEtablissement))
// 			{
//             echo "
//             <td width='16%' align='center'>
//             <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;idEtablissement=$idEtablissement'>
//             Supprimer</a></td>";
//          }
//          else
//          {
//             echo "
//             <td width='16%'>&nbsp; </td>";
// 			}
// 			echo "
//       </tr>";
//       $lgEtab=mysqli_fetch_array($rsEtab);
//    }
//    echo "
//    <tr class='ligneTabNonQuad'>
//       <td colspan='4'><a href='creationEtablissement.php?action=demanderCreEtab'>
//       Création d'un établissement</a ></td>
//   </tr>
// </table>";

 ?>
