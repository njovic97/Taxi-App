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
    <script src="https://kit.fontawesome.com/17236376d1.js" crossorigin="anonymous"></script>
    <title>Cars</title>
</head>

<body>

    <?php
    $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
    if (!$bp) die('Greska prilikom povezivanja na bazu podataka');

    $upit = "select * from vozilo;";

    $Rezultat = mysqli_query($bp, $upit);
    if (mysqli_error($bp)) die(mysqli_error($bp));

    $Lista2 = array();

    while ($Vozilo = mysqli_fetch_object($Rezultat)) {
        $Lista2[] = $Vozilo;
    }
    ?>

    <div id="wrapper">
        <div id="meni">
            <ul>
                <li><a href="index.php">Add a ride</a></li>
                <li><a class="active" href="Vozila.php">Cars</a></li>
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
        <h1>Add car</h1>
        <form id="dodavanje" action="dodavanjevozila.php" method="post">
            <li>ID: <input class="unos1" type="text" name="ID"><br></li>
            <li>Manufacturer: <input class="unos1 type=" text" name="Proizvodjac"> <br></li>
            <li>Model: <input class="unos1 type=" text" name="Model"><br></li>
            <li>Licence plate: <input class="unos1 type=" text" name="Registracija"><br></li>
            <li>Driver JMBG: <input class="unos1 type=" text" name="Vozac_JMBG"><br></li>
            <button type="submit">Add a car</button>
        </form>
        <form action="listavozila.php" method="post">
            <button class="dugme2" type="submit">Car list</button>
        </form>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>