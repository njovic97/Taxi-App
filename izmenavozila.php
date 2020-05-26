<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Car edit</title>
</head>

<body>
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
                                this.value = 'Search..';
                            }">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="cleaner">
    </div>
    </div>

    <?php

    $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);

    if (!$bp)
        die("Greska prilikom povezivanja na bazu podataka");

    $ID = (int) @$_GET['ID'];

    $upit = "select * from Vozilo where ID=$ID;";
    $rezultat = mysqli_query($bp, $upit);
    if (!$rezultat)
        die(mysqli_error($bp));
    if (mysqli_num_rows($rezultat) != 1)
        die('Ne postoji to vozilo!');
    $Vozilo = mysqli_fetch_object($rezultat);

    ?>

    <div class="unos">
        <form id="dodavanje" action="izmenavozila-bp.php" method="post">
            <h1>Car edit</h1>
            <input type="hidden" name="ID" value="<?php echo $Vozilo->ID; ?>" />
            <li>Manufacturer: <input class="unos1" type="text" name="Proizvodjac" value="<?php echo $Vozilo->Proizvodjac ?>" /><br></li>
            <li>Model: <input class="unos1" type="text" name="Model" value="<?php echo $Vozilo->Model ?>" /><br></li>
            <li>Licence plate: <input class="unos1" type="text" name="Registracija" value="<?php echo $Vozilo->Registracija ?>" /><br></li>
            <li>Driver JMBG:<input class="unos1" type="text" name="Vozac_JMBG" value="<?php echo $Vozilo->Vozac_JMBG ?>" /><br></li>
            </select>
            <button type="submit">Edit car</button>
        </form>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>