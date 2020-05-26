<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
if (!$bp)
    die("Greska prilikom povezivanja na bazu podataka");

$ID = (int) $_GET['ID'];

$upit = "delete from pocetna where ID=$ID;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die(mysqli_error($bp));
}
header("Location: utoku.php");
