<?php 
require_once('db.php');

if(!isset($_GET['id'])) {
    die("Nie podano ID rekordu do edycji");
}

$id = $_GET['id'];

$sql = "SELECT * FROM kandydaci WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if(!$user) {
    die("Nie znaleziono rekordu");
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $miejscowosc = $_POST['miejscowosc'];
    $wyksztalcenie = $_POST['wyksztalcenie'];
    $zawod = $_POST['zawod'];
    $miejsce_pracy = $_POST['miejsce_pracy'];
    $partia = $_POST['partia'];
    $oswiadczenie_lustracyjne = $_POST['oswiadczenie_lustracyjne'];

    $update_sql = "UPDATE kandydaci SET 
        imie='$imie',
        nazwisko='$nazwisko',
        wiek='$wiek',
        miejscowosc='$miejscowosc',
        wyksztalcenie='$wyksztalcenie',
        zawod='$zawod',
        miejsce_pracy='$miejsce_pracy',
        partia='$partia',
        oswiadczenie_lustracyjne='$oswiadczenie_lustracyjne'
        WHERE id='$id'";

    if(mysqli_query($conn, $update_sql)) {
        $message = "Dane zaktualizowane";
    } else {
        $message = "Błąd: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj kandydata</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
      <a href="dodaj_kandydata.php" class="add">Dodaj kandydata</a>
</header>
<body>

<<div class="form-wrapper">
    <h1>Edytuj kandydata</h1>
    <?php if(isset($message)) echo "<div class='message'>$message</div>"; ?>
    <form method="POST">
        <input type="text" name="imie" value="<?php echo $user['imie']; ?>" placeholder="Imię">
        <input type="text" name="nazwisko" value="<?php echo $user['nazwisko']; ?>" placeholder="Nazwisko">
        <input type="number" name="wiek" value="<?php echo $user['wiek']; ?>" placeholder="Wiek">
        <input type="text" name="miejscowosc" value="<?php echo $user['miejscowosc']; ?>" placeholder="Miejscowość">
        <input type="text" name="wyksztalcenie" value="<?php echo $user['wyksztalcenie']; ?>" placeholder="Wykształcenie">
        <input type="text" name="zawod" value="<?php echo $user['zawod']; ?>" placeholder="Zawód">
        <input type="text" name="miejsce_pracy" value="<?php echo $user['miejsce_pracy']; ?>" placeholder="Miejsce pracy">
        <input type="text" name="partia" value="<?php echo $user['partia']; ?>" placeholder="Partia">
        <input type="text" name="oswiadczenie_lustracyjne" value="<?php echo $user['oswiadczenie_lustracyjne']; ?>" placeholder="Oświadczenie lustracyjne">
        <button type="submit">Zapisz zmiany</button>
    </form>
    <a href="index.php" class="back-button">Wróć</a>
</div>

<footer>
     <p>&copy; 2025 System Głosowania w Wyborach Powszechnych</p>
    <p>Autorzy: Oliwia Bartosiak, Jan Bursiak</p>
</footer>
</body>
</html>

