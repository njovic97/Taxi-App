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
    <title>Free</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<div id="wrapper">
    <div id="meni">
        <ul>
            <li><a href="index.php">Add a ride</a></li>
            <li><a href="Vozila.php">Cars</a></li>
            <li><a href="Vozaci.php">Drivers</a></li>
            <li><a href="utoku.php">In progress</a></li>
            <li><a class="active" href="Slobodno.php">Free</a></li>
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
    <div class="copy-right">
        <p>Designed and Developed by &copy; 2019 Nemanja Jovic</p>
    </div>
    </body>

</html>