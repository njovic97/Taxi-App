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
    <title>Drivers</title>
</head>

<body>

    <?php
    $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
    if (!$bp) die('Greska prilikom povezivanja na bazu podataka');

    $upit = "select * from vozac;";

    $Rezultat = mysqli_query($bp, $upit);
    if (mysqli_error($bp)) die(mysqli_error($bp));

    $Lista = array();

    while ($Vozac = mysqli_fetch_object($Rezultat)) {
        $Lista[] = $Vozac;
    }
    ?>

    <div id="wrapper">
        <div id="meni">
            <ul>
                <li><a href="index.php">Add a ride</a></li>
                <li><a href="Vozila.php">Cars</a></li>
                <li><a class="active" href="Vozaci.php">Drivers</a></li>
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
        <h1>Add driver</h1>
        <form id="dodavanje" action="dodavanjevozaca.php" method="post">
            <li>JMBG: <input class="unos1" type="text" name="JMBG"><br></li>
            <li>Name: <input class="unos1" type="text" name="Ime"> <br></li>
            <li>Surname: <input class="unos1" type="text" name="Prezime"><br></li>
            <button type="submit">Add driver</button>
        </form>
        <form action="listavozaca.php" method="post">
            <button type="submit">Drivers list</button>
        </form>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>