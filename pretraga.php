<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'zuti', 3306);
if (!$db) {
    die('Greska prilikom povezivanja na bazu podataka');
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/17236376d1.js" crossorigin="anonymous"></script>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="wrapper">
        <div id="meni">
            <ul>
                <li><a href="index.php">Add a ride</a></li>
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

        <?php
        if (isset($_GET["query"])) {
            $res = mysqli_query($db, "SELECT * FROM pocetna WHERE ID='$_GET[query]'");
            echo "<table class='tabelaPretraga'>";
            echo "<tr>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "Driver JMBG";
            echo "</th>";
            echo "<th>";
            echo "Car ID";
            echo "</th>";
            echo "<th>";
            echo "Start adress";
            echo "</th>";
            echo "<th>";
            echo "Location";
            echo "</th>";
            echo "<th>";
            echo "Contact";
            echo "</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>";
                echo $row["ID"];
                echo "</td>";
                echo "<td>";
                echo $row["Vozac_JMBG"];
                echo "</td>";
                echo "<td>";
                echo $row["Vozilo_ID"];
                echo "</td>";
                echo "<td>";
                echo $row["Pocetna_adresa"];
                echo "</td>";
                echo "<td>";
                echo $row["Odrediste"];
                echo "</td>";
                echo "<td>";
                echo $row["Kontakt"];
                echo "</td>";

                echo "</tr>";
            }

            echo "</table>";
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