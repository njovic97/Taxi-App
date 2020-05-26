<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Edit drivers</title>
</head>

<body>
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
                                this.value = 'Search..';
                            }">
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <?php

    $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);

    if (!$bp)
        die("Greska prilikom povezivanja na bazu podataka");

    $JMBG = (int) @$_GET['JMBG'];

    $upit = "select * from Vozac where JMBG=$JMBG;";
    $rezultat = mysqli_query($bp, $upit);
    if (!$rezultat)
        die(mysqli_error($bp));
    if (mysqli_num_rows($rezultat) != 1)
        die('Ne postoji taj vozac!');
    $Vozac = mysqli_fetch_object($rezultat);

    ?>

    <div class="unos">
        <form id="dodavanje" action="izmenavozaca-bp.php" method="post">
            <h1>Driver edit</h1>
            <input type="hidden" name="JMBG" value="<?php echo $Vozac->JMBG; ?>" />
            <li>Name: <input class="unos1" type="text" name="Ime" value="<?php echo $Vozac->Ime ?>" /><br></li>
            <li>Surname: <input class="unos1" type="text" name="Prezime" value="<?php echo $Vozac->Prezime ?>" /><br></li>
            </select>
            <button type="submit">Edit driver</button>
        </form>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>