<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
if (!$bp)
    die("Greska prilikom povezivanja na bazu podataka");

$JMBG = (int) @$_POST['JMBG'];
$Ime = mysqli_real_escape_string($bp, @$_POST['Ime']);
$Prezime = mysqli_real_escape_string($bp, @$_POST['Prezime']);

$upit = "update Vozac set Ime='$Ime', Prezime='$Prezime' where JMBG=$JMBG; ;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

header("Location: listavozaca.php");
