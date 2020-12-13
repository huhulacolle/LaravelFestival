<title>Acceuil > Gestion établissements</title>
@include("debut")
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
