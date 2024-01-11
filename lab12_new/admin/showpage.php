<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');
function PokazPodstrone($id) {
    global $link;
    // Zabezpieczenie przed atakami SQL Injection
    $id_clear = htmlspecialchars($id);

    // Pobranie podstrony z bazy danych
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    // Przypisanie do parametru web treści podstrony lub informacji o nie znalezieniu podstrony
    if (empty($row['id'])) {
        $web = '[nie_znaleziono_strony]';
    } else {
        $web = $row['page_content'];
    }

    return $web;
}

?>