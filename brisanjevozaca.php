<?php

$bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
if (!$bp)
    die("Greska prilikom povezivanja na bazu podataka");

$JMBG = (int) $_GET['JMBG'];

$upit = "delete from vozac where JMBG=$JMBG;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die(mysqli_error($bp));
}
header("Location: listavozaca.php");
