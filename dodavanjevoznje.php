<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);

if (!$bp) die('Greska prilikom povezivanja na bazu podataka');

$ID = mysqli_real_escape_string($bp,  $_REQUEST['ID']);
$Vozac_JMBG = mysqli_real_escape_string($bp, $_REQUEST['Vozac_JMBG']);
$Vozilo_ID = mysqli_real_escape_string($bp, $_REQUEST['Vozilo_ID']);
$Pocetna_adresa = mysqli_real_escape_string($bp, $_REQUEST['Pocetna_adresa']);
$Odrediste = mysqli_real_escape_string($bp, $_REQUEST['Odrediste']);
$Kontakt = mysqli_real_escape_string($bp, $_REQUEST['Kontakt']);


$upit = "insert into pocetna (ID, Vozac_JMBG, Vozilo_ID, Pocetna_adresa, Odrediste, Kontakt) values ('$ID', '$Vozac_JMBG', '$Vozilo_ID', '$Pocetna_adresa', '$Odrediste', '$Kontakt');";

mysqli_query($bp, $upit);
if (mysqli_error($bp)) die(mysqli_error($bp));

header('Location: index.php');
