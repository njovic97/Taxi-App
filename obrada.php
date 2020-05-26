<?php

session_start();

$korisnik = $_POST['ime'];
$lozinka = $_POST['lozinka'];

if ($korisnik == 'Nemanja' and $lozinka == 'Jovic') {
    $_SESSION['prijavljen'] = true;
    die(header("Location: index.php"));
} else {
    die(header("Location: prijava.html"));
}
