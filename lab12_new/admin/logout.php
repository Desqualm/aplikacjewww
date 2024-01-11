<?php
// Rozpoczęcie sesji
session_start();

// Sprawdzenie czy administrator jest zalogowany
if (isset($_SESSION['admin_logged_in'] ) && $_SESSION['admin_logged_in'] === true) {
    // Zniszczenie sesji i przekierowanie na stronę administratora
    session_destroy();
    header('Location: ./admin.php');
} else {
    // Przekierowanie na stronę administratora
    header('Location: ./admin.php');
}
?>