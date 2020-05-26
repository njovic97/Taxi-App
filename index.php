<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['prijavljen']))
    die(header("Location: prijava.html"));
?>

<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Add a ride</title>
</head>

<body>

    <?php
    $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
    if (!$bp)
        die('Greska prilikom povezivanja na bazu podataka');

    $upit = "select * from pocetna;";

    $Rezultat = mysqli_query($bp, $upit);
    if (mysqli_error($bp))
        die(mysqli_error($bp));

    $Lista = array();

    while ($Pocetna = mysqli_fetch_object($Rezultat)) {
        $Lista[] = $Pocetna;
    }
    ?>

    <div id="wrapper">
        <div id="meni">
            <ul>
                <li><a class="active" href="index.php">Add a ride</a></li>
                <li><a href="Vozila.php">Cars</a></li>
                <li><a href="Vozaci.php">Drivers</a></li>
                <li><a href="utoku.php">In progress</a></li>
                <li><a href="Slobodno.php">Free</a></li>
                <li><a href="odjava.php">Sign out</a></li>
                <li>
                    <form action="pretraga.php" method="GET">
                        <input type="text" name="query" id="pretraga" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search...';
                            }">
                    </form>
                </li>
            </ul>
        </div>
        <div class="cleaner">
        </div>
    </div>
    <div class="unos">
        <h1>Add a ride</h1>
        <form id="dodavanje" action="dodavanjevoznje.php" method="post">
            <li>Ride number: <input class="unos1" type="text" name="ID"><br></li>
            <li>Driver JMBG: <input class="unos1" type="text" name="Vozac_JMBG"> <br></li>
            <li>Car ID: <input class="unos1" type="text" name="Vozilo_ID"><br></li>
            <li>Start adress: <input class="unos1" type="text" name="Pocetna_adresa"><br></li>
            <li>Location: <input class="unos1" type="text" name="Odrediste"><br></li>
            <li>Contact: <input class="unos1" type="text" name="Kontakt"><br></li>
            <button type="submit">Add a ride</button>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>