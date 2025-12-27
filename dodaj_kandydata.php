<?php 
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>dodaj kandydata</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
      <a href="index.php" class="add">Lista kandydatów</a>
</header>
    <body>
        <div class ="main">
            <h1>Dodaj nowego kandydata</h1>
            <form method ="POST">
                <label for="imie">Imię kandydata:</label>
                <input type="text" name="imie"> <br>
                <label for="nazwisko">Nazwisko kandydata:</label>
                <input type="text" name="nazwisko"> <br>
                <label for="wiek">Wiek kandydata:</label>
                <input type="number" name="wiek"> <br>
                <label for="miejscowosc">Miejscowość kandydata:</label>
                <input type="text" name="miejscowosc"> <br>
                <label for="wyksztalcenie">Wykształcenie:</label>
                <input type="text" name="wyksztalcenie"> <br>
                <label for="zawod">Zawód kandydata:</label>
                <input type="text" name="zawod"> <br>
                <label for="miejsce_pracy">Miejsce pracy kandydata:</label>
                <input type="text" name="miejsce_pracy"> <br>
                <label for="partia">Partia kandydata</label>
                <input type="text" name="partia"> <br>
                <label for="oswiadczenie_lustracyjne">Oświadczenie lustracyjne kandydata:</label> <br>
                <input type="text" name="oswiadczenie_lustracyjne"> <br>
                <label for="procent">Procent glosow kandydata:</label> <br> 
                <input type="number" name="procent">
                <!-- pozniej mozna usunac ten procnet, narazie zostawiam -->
                 <button type ="submit">Dodaj kandydata</button>
            </form>
</div>
<footer>
    <p>© 2025 System Głosowania w Wyborach Powszechnych</p>
    <p>Autorzy: Oliwia Bartosiak, Jan Bursiak</p>
</footer>
    </body>
</html>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["wiek"]) &&
    isset($_POST["miejscowosc"]) && isset($_POST["wyksztalcenie"]) &&  isset($_POST["zawod"]) &&
     isset($_POST["miejsce_pracy"]) && 
     $_POST["imie"] != '' &&
     $_POST["nazwisko"] != '' && 
     $_POST["wiek"] != '' && 
     $_POST["miejscowosc"] != '' && 
     $_POST["wyksztalcenie"] != '' && 
     $_POST["miejsce_pracy"] != '' &&
     $_POST["zawod"] != '') {
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $wiek = $_POST["wiek"];
        $miejscowosc = $_POST["miejscowosc"];
        $wyksztalcenie = $_POST["wyksztalcenie"];
        $zawod = $_POST["zawod"];
        $miejsce_pracy = $_POST["miejsce_pracy"];
        $partia = $_POST["partia"];
        $oswiadczenie_lustracyjne = $_POST["oswiadczenie_lustracyjne"];
        $procent = $_POST["procent"];

   $sql = "INSERT INTO kandydaci 
(imie, nazwisko, wiek, miejscowosc, wyksztalcenie, zawod, miejsce_pracy, partia, oswiadczenie_lustracyjne) 
VALUES 
('$imie','$nazwisko','$wiek','$miejscowosc','$wyksztalcenie','$zawod','$miejsce_pracy','$partia','$oswiadczenie_lustracyjne')";

   
    
if(mysqli_query($conn,$sql)) {
    echo "rekord dodany";
} else {
    echo "blad".mysqli_error($conn);
}
}

else { echo "<p>wypelnij wszystkie obowiazkowe pola</p>";}
}
?>
