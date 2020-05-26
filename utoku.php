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
    <title>In progress</title>
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
                <li><a href="Vozila.php">Cars</a></li>
                <li><a href="Vozaci.php">Drivers</a></li>
                <li><a class="active" href="utoku.php">In progress</a></li>
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

        $upit = "select * from pocetna;";

        $Rezultat = mysqli_query($bp, $upit);
        if (mysqli_error($bp))
            die(mysqli_error($bp));

        $Lista = array();

        while ($Pocetna = mysqli_fetch_object($Rezultat)) {
            $Lista[] = $Pocetna;
        }

        foreach ($Lista as $Pocetna) {

            echo "<div class='Rezultat'>";
            echo "<div class='ID'>ID: $Pocetna->ID</div><br>";
            echo "<div class='Vozac_JMBG'>Driver JMBG: $Pocetna->Vozac_JMBG</div><br>";
            echo "<div class='Vozilo_ID'>Car ID: $Pocetna->Vozilo_ID</div><br>";
            echo "<div class='Pocetna_adresa'>Start adress: $Pocetna->Pocetna_adresa</div><br>";
            echo "<div class='Odrediste'>Location:  $Pocetna->Odrediste</div><br>";
            echo "<div class='Kontakt'>Contact: $Pocetna->Kontakt</div><br>";
            echo "<td><a href='brisanjepocetna.php?ID={$Pocetna->ID}' onclick='return upit()'><i class='fas fa-trash'></i> Delete</a></td>\n";
            echo "</div><br>";
        }
        ?>

        <div class="cleaner">
        </div>
    </div>
    <style>
        .Vozilo_ID {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }

        .Pocetna_adresa {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }

        .Odrediste {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }

        .Kontakt {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }
    </style>
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
</body>

</html>