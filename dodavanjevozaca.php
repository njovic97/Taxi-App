<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);

if (!$bp) die('Greska prilikom povezivanja na bazu podataka');

$JMBG = mysqli_real_escape_string($bp,  $_REQUEST['JMBG']);
$Ime = mysqli_real_escape_string($bp, $_REQUEST['Ime']);
$Prezime = mysqli_real_escape_string($bp, $_REQUEST['Prezime']);

$upit = "insert into vozac (JMBG, Ime, Prezime) values ('$JMBG', '$Ime', '$Prezime');";

mysqli_query($bp, $upit);
if (mysqli_error($bp)) die(mysqli_error($bp));

header('Location: Vozaci.php');
