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
    <title>Car List</title>
    <script type="text/javascript">
        function upit() {
            var upit = confirm("Are you sure?");
            if (upit) {
                return true;
            } else {
                return false;
            }
        }
    </script>
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
                                this.value = 'Search...';
                            }">
                    </form>
                </li>
            </ul>
        </div>

        <?php
        $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
        if (!$bp)
            die('Greska prilikom povezivanja na bazu podataka');

        $upit = "select * from vozilo;";

        $Rezultat = mysqli_query($bp, $upit);
        if (mysqli_error($bp))
            die(mysqli_error($bp));

        $Lista2 = array();

        while ($Vozilo = mysqli_fetch_object($Rezultat)) {
            $Lista2[] = $Vozilo;
        }

        foreach ($Lista2 as $Vozilo) {


            echo "<div class='Rezultat'>";
            echo "<div class='ID'>ID: $Vozilo->ID</div><br>";
            echo "<div class='Proizvodjac'>Manufacturer: $Vozilo->Proizvodjac</div><br>";
            echo "<div class='Model'>Model: $Vozilo->Model</div><br>";
            echo "<div class='Registracija'>Licence plate: $Vozilo->Registracija</div><br>";
            echo "<div class='Vozac_JMBG'>Driver JMBG: $Vozilo->Vozac_JMBG</div><br>";
            echo "<td><a href='brisanjevozila.php?ID={$Vozilo->ID}' onclick='return upit()'><i class='fas fa-trash'></i> Delete</a></td>\n";
            echo "<td><a href='izmenavozila.php?ID={$Vozilo->ID}'><i class='far fa-edit'></i> Edit</a></td>\n";
            echo "</div><br>";
        }
        ?>

        <div class="cleaner">
        </div>
    </div>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>