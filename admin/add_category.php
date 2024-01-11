<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

// Sprawdzenie czy pola mother oraz name zostały ustawione
if (isset($_POST['mother']) && isset($_POST['name'])) {
    $matka = htmlspecialchars($_POST['mother']);
    $nazwa = htmlspecialchars($_POST['name']);

    // Dodanie nowej kategorii do bazy danych
    $query = "INSERT INTO shop (matka, nazwa) VALUES ('$matka', '$nazwa')";
    $result = mysqli_query($link, $query);
    //Przekierowanie na stronę shop.php
    if ($result) {
        echo "Pomyślnie dodano kategorię";
        header("refresh:2;url=index.php");
    } else {
        echo "Błąd podczas dodawania kategorii";
    }
}
?>