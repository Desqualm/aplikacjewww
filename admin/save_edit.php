<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

// Sprawdzenie czy pole zapisz jest ustawione
if (isset($_POST['zapisz'])) {
    // Sprawdzenie czy pola page_title oraz page_content zostały ustawione
    if (isset($_POST['page_title']) && isset($_POST['page_content'])) {
     $page_title = $_POST['page_title'];
     $page_content = $_POST['page_content'];
     $page_is_active = isset($_POST['page_is_active']) ? 1 : 0;
     $id = $_GET['id'];

    // Aktualizacja podstrony w bazie danych
     $query = "UPDATE page_list SET page_title = '$page_title', page_content = '$page_content', status = '$page_is_active' WHERE id = '$id' LIMIT 1";
     $result = mysqli_query($link, $query);

     if ($result) {
        echo "Pomyślnie zaktualizowano podstronę";
        header("refresh:2;url=index.php");
    } else {
        echo "Błąd podczas aktualizacji podstrony";
    }
 }
}
else {
    echo "Nie przesłano danych";
}
?>