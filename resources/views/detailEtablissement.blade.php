<title>Acceuil > Gestion établissements > Détail des établissements</title>

@include("debut")

<table align='center' width='85%'>
    <tr>
        <td width='34%' align='left'><a href='GestionEtablissement'>Retour</a>
        </td>
    </tr>
</table>
<div class="mx-auto" style="width: 700px;">
    <table class="table table-hover">
        @foreach ($reqDetail as $reqDetailData)
        <tr>
            <td> id : </td>
            <td>{{$reqDetailData->idEtablissement}}</td>
            <td>  </td>
        </tr>
        <tr>
            <td> adresse : </td>
            <td>{{$reqDetailData->adresseRue}}</td>
            <td>  </td>
        </tr>
        <tr>
            <td> Code Postal : </td>
            <td>{{$reqDetailData->codePostal}}</td>
            <td> </td>
        </tr>
        <tr>
            <td> Ville : </td>
            <td>{{$reqDetailData->ville}}</td>
            <td>  </td>
        </tr>
        <tr>
            <td> Téléphone : </td>
            <td>{{$reqDetailData->tel}}</td>
            <td>  </td>
        </tr>
        <tr>
            <td>E-Mail : </td>
            <td>{{$reqDetailData->adresseElectronique}}</td>
            <td> </td>
        </tr>
        <tr>
            <td> Type : </td>
            <td>
                <?php
                $TYPE = ($reqDetailData->type);
                if ($TYPE == 1) {
                    echo "Etablissement Scolaire";
                }
                else {
                    echo "Autre";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td> Responsable : </td>
            <td>{{$reqDetailData->nomResponsable}}</td>
            <td>  </td>
        </tr>
        <tr>
            <td> Offre : </td>
            <td>{{$reqDetailData->nombreChambresOffertes}}</td>
            <td> </td>
        </tr>
        @endforeach
    </table>
