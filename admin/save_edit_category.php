<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

// Sprawdzenie czy pole zapisz jest ustawione
if (isset($_POST['zapisz'])) {
    // Sprawdzenie czy pola mother oraz name zostały ustawione
    if (isset($_POST['mother']) && isset($_POST['name'])) {
     $matka = htmlspecialchars($_POST['mother']);
     $nazwa = htmlspecialchars($_POST['name']);
     $id = htmlspecialchars($_GET['id']);

    // Aktualizacja kategorii w bazie danych
     $query = "UPDATE shop SET matka = '$matka', nazwa = '$nazwa' WHERE id = '$id' LIMIT 1";
     $result = mysqli_query($link, $query);

     if ($result) {
        echo "Pomyślnie zaktualizowano kategorię";
        header("refresh:2;url=index.php");
    } else {
        echo "Błąd podczas aktualizacji kategorii";
    }
 }
}
else {
    echo "Nie przesłano danych";
}
?>