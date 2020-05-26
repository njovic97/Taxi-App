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
    <title>Lista vozaca</title>
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

        <?php
        $bp = mysqli_connect("localhost", "root", "", "zuti", 3306);
        if (!$bp)
            die('Greska prilikom povezivanja na bazu podataka');

        $upit = "select * from vozac;";

        $Rezultat = mysqli_query($bp, $upit);
        if (mysqli_error($bp))
            die(mysqli_error($bp));

        $Lista1 = array();

        while ($Vozac = mysqli_fetch_object($Rezultat)) {
            $Lista1[] = $Vozac;
        }

        foreach ($Lista1 as $Vozac) {

            echo "<div class='Rezultat'>";
            echo "<div class='JMBG'>JMBG: $Vozac->JMBG</div><br>";
            echo "<div class='Ime'>Name: $Vozac->Ime</div><br>";
            echo "<div class='Prezime'>Surname: $Vozac->Prezime</div><br>";
            echo "<td><a href='brisanjevozaca.php?JMBG={$Vozac->JMBG}' onclick='return upit()'><i class='fas fa-trash'></i> Delete</a></td>\n";
            echo "<td><a href='izmenavozaca.php?JMBG={$Vozac->JMBG}'><i class='far fa-edit'></i> Edit</a></td>\n";
            echo "</div><br>";
        }
        ?>

        <div class="cleaner">
        </div>
    </div>
    <style>
        .JMBG {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }

        .Ime {
            background-color: rgba(255, 198, 0, 0.8);
            border: 1px solid #000000;
            border-radius: 7px;
        }

        .Prezime {
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