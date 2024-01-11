<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincss.css">
    <title>Kategorie | Sklep</title>
</head>
<body>
<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

function PokazKategorie() {
    global $link;

    $wynik = '<a href="../index.php">Strona Główna</a> <h3>Kategorie:</h3>' . '<ul class="kategorie">';

    // Pobranie danych z bazy danych
    $query = "SELECT id, matka, nazwa FROM shop ORDER BY matka, id";
    $result = mysqli_query($link, $query);

    // Sprawdzenie czy zapytanie zwróciło wyniki
    if ($result && mysqli_num_rows($result) > 0) {
        $kategorie = array(); // Tablica przechowująca informacje o podkategoriach
        $matki = array(); // Tablica przechowująca informacje o kategoriach

        // Iteracja po wynikach zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $matka = $row['matka'];
            $nazwa = $row['nazwa'];

            // Dodanie informacji o kategoriach i podkategoriach
            if ($matka == 0) {
                $matki[$id] = array('nazwa' => $nazwa, 'id' => $id, 'podkategorie' => array());
            } else {
                $kategorie[$id] = array('nazwa' => $nazwa, 'id' => $id, 'matka' => $matka);
                $matki[$matka]['podkategorie'][] = &$kategorie[$id]; // Przypisanie podkategorii do odpowiedniej kategorii
            }
        }

        // Wyświetlenie kategorii i podkategorii z pętlą zagnieżdżoną
        foreach ($matki as $matka) {
            $wynik .= '<br /><li>ID: '. $matka['id'].' <a href="./products.php?kategoria='.$matka['nazwa'].'" style="text-decoration: none; font-size: 1.6em; margin-bottom: 20px; font-weight: bold;">'. $matka['nazwa'] . '</a>' .'</li>';
            $wynik .= '<ul>';

            // Pętla zagnieżdżona do wyświetlenia podkategorii
            foreach ($matka['podkategorie'] as $podkategoria) {
                $wynik .= '<li>ID: '. $podkategoria['id'].' ' .' <span style="font-size: 1.3em; margin-bottom: 20px;">'. $podkategoria['nazwa'] . '</span>' . '</li>';
            }

            $wynik .= '</ul></li>';
        }

    } else {
        // Wyświetlenie komunikatu o braku kategorii
        $wynik .= '<li style="font-size:1.6em">Brak kategorii</li>';
    }

    $wynik .= '</ul>';

    echo $wynik;
}

echo PokazKategorie();

?>

</body>
</html>