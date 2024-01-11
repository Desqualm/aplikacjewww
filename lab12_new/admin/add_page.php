<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

// Sprawdzenie czy pola page_title oraz page_content zostały ustawione
if (isset($_POST['page_title']) && isset($_POST['page_content'])) {
    $page_title = htmlspecialchars($_POST['page_title']);
    $page_content = htmlspecialchars($_POST['page_content']);
    $page_is_active = isset($_POST['page_is_active']) ? 1 : 0;

    // Dodanie nowej podstrony do bazy danych
    $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$page_title', '$page_content', '$page_is_active')";
    $result = mysqli_query($link, $query);
    // Przekierowanie na stronę admin.php
    if ($result) {
        echo "Pomyślnie dodano podstronę";
        header("refresh:2;url=index.php");
    } else {
        echo "Błąd podczas dodawania podstrony";
    }
}
?>