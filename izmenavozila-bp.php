<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
if (!$bp)
    die("Greska prilikom povezivanja na bazu podataka");

$ID = (int) @$_POST['ID'];
$Proizvodjac = mysqli_real_escape_string($bp, @$_POST['Proizvodjac']);
$Model = mysqli_real_escape_string($bp, @$_POST['Model']);
$Registracija = mysqli_real_escape_string($bp, @$_POST['Registracija']);
$Vozac_JMBG = mysqli_real_escape_string($bp, @$_POST['Vozac_JMBG']);

$upit = "update Vozilo set Proizvodjac='$Proizvodjac', Model='$Model',Registracija='$Registracija',Vozac_JMBG='$Vozac_JMBG' where ID=$ID; ;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

header("Location: listavozila.php");
