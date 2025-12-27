<?php 
require_once('db.php');

$message = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `kandydaci` WHERE id = '$id'";

    if(mysqli_query($conn, $sql)) {
        $message = "Kandydat usunięty";
    } else {
        $message = "Błąd: " . mysqli_error($conn);
    }
} else {
    $message = "Nie podano ID rekordu do usunięcia";
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie kandydata</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
      <a href="dodaj_kandydata.php" class="add">Dodaj kandydata</a>
</header>
<body>
<div class="form-wrapper">
    <h1>Kandydat usunięty</h1>
    <div class="message"><?php echo $message; ?></div>
    <a href="index.php" class="back-button">Wróć</a>
</div>

<footer>
    <p>&copy; 2025 System Głosowania w Wyborach Powszechnych</p>
    <p>Autorzy: Oliwia Bartosiak, Jan Bursiak</p>
</footer>
</body>
</html>
