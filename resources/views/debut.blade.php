<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- TITRE ET MENUS -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Language" content="fr">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <link rel="shortcut icon" href="css\toppng.com-hackerman-672x589-1-ConvertImage.ico" type="image/x-icon">
</head>
<center> <img src= "css\logo-200x200.png" ?> </center>

<?php
$adresse = $_SERVER['PHP_SELF'];
$adresse = explode("/", $adresse);
$tabCivilite = array("M.", "Mme", "Melle");
echo '<ul class="nav justify-content-center nav-tabs">';

    if (isset($adresse[2])) {
        echo "<li class='nav-item'>";
        echo'<a class="nav-link" href="/">Acceuil</a>';
        echo '</li>';
        echo "<li class='nav-item'>";
    if (strpos($adresse[2], "Etablissement") !== false) {
        echo '<a class="nav-link active" href="GestionEtablissement">Gestion établissements</a>';
    }
    else {
        echo '<a class="nav-link" href="GestionEtablissement">Gestion établissements</a>';
    }
    echo "</li>";
    echo "<li class='nav-item'>";
    if (strpos($adresse[2], "Attributions")!== false)  {
        echo '<a class="nav-link active" href="AttributionChambres">Attributions chambres</a>';
    }
    else {
        echo '<a class="nav-link" href="AttributionChambres">Attributions chambres</a>';
    }
    }
    else {
        echo "<li class='nav-item'>";
        if ($adresse[1] == "index.php") {
        echo'<a class="nav-link active" href="/">Acceuil</a>';
    }
    else {
        echo'<a class="nav-link" href="/">Acceuil</a>';
    }
    echo "</li>";
    echo '<a class="nav-link" href="GestionEtablissement">Gestion établissements</a>';
    echo "</li>";
    echo '<a class="nav-link" href="AttributionChambres">Attributions chambres</a>';
    echo "</li>";

    }
    ?>

    </li>
</ul>
</table>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
