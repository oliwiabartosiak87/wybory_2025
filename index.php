<?php
require_once "db.php";


$sql = "SELECT * FROM kandydaci";
$result = mysqli_query($conn, $sql);
$kandydaci = mysqli_fetch_all($result, MYSQLI_ASSOC);

// glosy
$sumaResult = mysqli_query($conn, "SELECT COUNT(*) AS suma FROM glosy");
$sumaGlosow = mysqli_fetch_assoc($sumaResult)['suma'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>System głosowania</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<header>
      <a href="dodaj_kandydata.php" class="add">Dodaj kandydata</a>
</header>

<main class="content">
    <h1>Wybory Prezydenckie 2025</h1>
    <p>Twój głos ma znaczenie.</p>
    
</main>
<div class="candidate">
    <h2> Lista kandydatów</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Wiek</th>
            <th>Miejscowosc</th>
            <th>Wykształcenie</th>
            <th>Zawód</th>
            <th>Partia</th>
            <th>Oświadczenie lustracyjne</th>
            <th>% głosów</th>
            <th>Głosuj</th>
            <th>Usuń</th>
            <th>Edytuj</th>
        </tr>

        <?php foreach($kandydaci as $k): ?>
        <tr>
            <td><?= $k['id'] ?></td>
            <td><?= $k['imie'] ?></td>
            <td><?= $k['nazwisko'] ?></td>
            <td><?= $k['wiek'] ?></td>
            <td><?= $k['miejscowosc'] ?></td>
            <td><?= $k['wyksztalcenie'] ?></td>
            <td><?= $k['zawod'] ?></td>
            <td><?= $k['partia'] ?></td>
            <td><?= $k['oswiadczenie_lustracyjne'] ?></td>
            <td><?= $procent ?>%</td>
            <td><a href="glosuj.php?id=<?= $k['id'] ?>">GŁOSUJ</a></td>
            <td><a href="usun_kandydata.php?id=<?= $k['id'] ?>">USUŃ</a></td>
            <td><a href="edytuj_kandydata.php?id=<?= $k['id'] ?>">EDYTUJ</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<footer>
    <p>&copy; 2025 System Głosowania w Wyborach Powszechnych</p>
    <p>Autorzy: Oliwia Bartosiak, Jan Bursiak</p>
</footer>

</body>
</html>
