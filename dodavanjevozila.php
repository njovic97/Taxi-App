<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);

if (!$bp) die('Greska prilikom povezivanja na bazu podataka');

$ID = mysqli_real_escape_string($bp,  $_REQUEST['ID']);
$Proizvodjac = mysqli_real_escape_string($bp, $_REQUEST['Proizvodjac']);
$Model = mysqli_real_escape_string($bp, $_REQUEST['Model']);
$Registracija = mysqli_real_escape_string($bp, $_REQUEST['Registracija']);
$Vozac_JMBG = mysqli_real_escape_string($bp, $_REQUEST['Vozac_JMBG']);

$upit = "insert into vozilo (ID, Proizvodjac, Model, Registracija, Vozac_JMBG) values ('$ID', '$Proizvodjac', '$Model', '$Registracija','$Vozac_JMBG');";

mysqli_query($bp, $upit);
if (mysqli_error($bp)) die(mysqli_error($bp));

header('Location: Vozila.php');
