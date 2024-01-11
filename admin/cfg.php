<?php
// Zmienne wymagane do połąćzenia z bazą danych
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';
$login = 'admin';
$pass = 'admin';

// Wykonanie połąćzenia z bazą danych
$link = mysqli_connect($dbhost, $dbuser, $dbpass);
// Wyświetlenie informacji w przypadku nieudanego połączenia
if (!$link) echo '<b>przerwane połączenie</b>';
// Wyświetlenie informacji w przypadku nieudanego wybrania bazy danych
if (!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';
?>