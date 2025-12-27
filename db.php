<?php 
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_SCHEMA = 'wybory_2025';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_SCHEMA);
if(!$conn) {
    die("blad".mysqli_connect_error());
} else {
    echo " ";
}
?>