<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FestivalController extends Controller
{
    public function obtenirReqEtablissements() {
        $reqEtab = DB::select('select idEtablissement, nom,nombreChambresOffertes from Etablissement order by idEtablissement');

        $NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
        return view('listeEtablissements', compact('reqEtab'), compact('NBChambres'));
    }

    public function obtenirDetailEtablissement(){
        $reqDetail = DB::select('select * from Etablissement where idEtablissement="'.$_GET["idEtablissement"].'"');
        return view('detailEtablissement', compact('reqDetail'));
    }

    public function obtenirModifEtablissement(){
        $reqModif = DB::select('select * from Etablissement where idEtablissement="'.$_GET["idEtablissement"].'"');
        return view('modificationEtablissement', compact('reqModif'));
    }

    public function obtenirReqEtablissementsOffrantChambres(){
        $reqChambres = DB::select('select idEtablissement, nom, nombreChambresOffertes from Etablissement where
        nombreChambresOffertes!=0 order by idEtablissement');

        $reqNBChambres = DB::select('select count(*) as nombreEtabOffrantChambres from Etablissement where
        nombreChambresOffertes!=0');

        return view('consultationAttributions', compact('reqChambres'), compact('reqNBChambres'));
    }

    public function afficheSuppression(){
        $reqNom = DB::select('select idEtablissement, nom from Etablissement where idEtablissement="'.$_GET["idEtablissement"].'"');
        return view('suppressionEtablissement', compact('reqNom'));
    }

    public function suppression(){
        DB::delete('delete from Etablissement where idEtablissement = "'.$_GET['idEtablissement'].'"');

        $reqEtab = DB::select('select idEtablissement, nom,nombreChambresOffertes from Etablissement order by idEtablissement');
        $NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
        return view('listeEtablissements', compact('reqEtab'), compact('NBChambres'));
    }

    public function afficheAttribution(){
        $reqChambres = DB::select('select idEtablissement, nom, nombreChambresOffertes from Etablissement where
        nombreChambresOffertes!=0 order by idEtablissement');

        $reqEtab = DB::select('select idEtablissement, nom,nombreChambresOffertes from Etablissement order by idEtablissement');
        return view('modificationAttributions', compact('reqChambres'), compact('reqEtab'));
    }

    public function CreaEtab(){
        $idEtablissement = $_POST["id"];
        $nom = $_POST["nom"];
        $adresseRue = $_POST["adresseRue"];
        $codePostal = $_POST["codePostal"];
        $ville = $_POST["ville"];
        $tel = $_POST["tel"];
        $adresseElectronique = $_POST["adresseElectronique"];
        $type = $_POST["type"];
        $civiliteResponsable = $_POST["civiliteResponsable"];
        $nomResponsable = $_POST["nomResponsable"];
        $prenomResponsable = $_POST["prenomResponsable"];
        $nombreChambresOffertes = $_POST["nombreChambresOffertes"];
        if ($adresseElectronique == "") {
            $adresseElectronique == "NULL";
        }
        DB::insert("insert into Etablissement values ('$idEtablissement', '$nom', '$adresseRue',
        $codePostal, '$ville', $tel, '$adresseElectronique', $type,
        '$civiliteResponsable', '$nomResponsable', '$prenomResponsable',
        $nombreChambresOffertes)");

        $reqEtab = DB::select('select idEtablissement, nom,nombreChambresOffertes from Etablissement order by idEtablissement');
        $NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
        return view('listeEtablissements', compact('reqEtab'), compact('NBChambres'));
    }

    public function ModifEtab(){
        $idEtablissement = $_POST["id"];
        $nom = $_POST["nom"];
        $adresseRue = $_POST["adresseRue"];
        $codePostal = $_POST["codePostal"];
        $ville = $_POST["ville"];
        $tel = $_POST["tel"];
        $adresseElectronique = $_POST["adresseElectronique"];
        $type = $_POST["type"];
        $civiliteResponsable = $_POST["civiliteResponsable"];
        $nomResponsable = $_POST["nomResponsable"];
        $prenomResponsable = $_POST["prenomResponsable"];
        $nombreChambresOffertes = $_POST["nombreChambresOffertes"];
        if ($adresseElectronique == "") {
            $adresseElectronique == "NULL";
        }
        DB::update('update Etablissement set nom = "'.$nom.'",
        adresseRue = "'.$adresseRue.'", codePostal = '.$codePostal.', ville = "'.$ville.'",
        tel = '.$tel.', adresseElectronique = "'.$adresseElectronique.'", type = '.$type.',
        civiliteResponsable = "'.$civiliteResponsable.'", nomResponsable = "'.$nomResponsable.'", prenomResponsable = "'.$prenomResponsable.'",
        nombreChambresOffertes = '.$nombreChambresOffertes.' where idEtablissement = "'.$idEtablissement.'"');

        $reqEtab = DB::select('select idEtablissement, nom,nombreChambresOffertes from Etablissement order by idEtablissement');
        $NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
        return view('listeEtablissements', compact('reqEtab'), compact('NBChambres'));
    }
}
