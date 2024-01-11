<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincss.css">
    <title>Panel Admina</title>
</head>
<body>
<?php
// Rozpoczęcie sesji
session_start();
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('cfg.php');

// Funkcja zwracająca formularz logowania
function FormularzLogowania() {
    $wynik = '
    <div class="login-wrapper">
    <h1 class="heading">Panel CMS:</h1>
    <form class="formularz_logowania" method="POST" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'"
    <table class="logowanie">
    <tr><td class="log4_t">[login]</td><td><input type="text" name="login_email" class="logowanie"/></td></tr>
    <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie"/></td></tr>
    <tr><td><br/></td><td><input type="submit" name="xl_submit" class="logowanie" value="Zaloguj"/></td></tr>
    </table>
    </form>
    </div>
    ';
    return $wynik;
}

// Wyświetlenie listy podstron w formie tabeli
function ListaPodstron() {
    global $link;

    $wynik = '<h3>Podstrony:</h3>'.'<table class="tabela_akcji">'.'<tr><th>ID</th><th>Tytuł podstrony</th><th>Akcje</th></tr>';
    $wynik .= '<a href="'.$_SERVER['PHP_SELF'].'?action=dodaj">Dodaj podstronę</a> <br /> <br />';

    // Pobranie danych z bazy danych
    $query = "SELECT id, page_title FROM page_list";
    $result = mysqli_query($link, $query);

    // Sprawdzenie czy zapytanie zwróciło wyniki
    if ($result) {
        // Iteracja po wynikach zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $page_title = $row['page_title'];

            // Dodanie wiersza odpowiadającego podstronie do tabeli
            $wynik .= '<tr>'.'<td>' . $id . '</td>'.'<td>' . $page_title . '</td>'.'<td><a href="'.$_SERVER['PHP_SELF'].'?action=edytuj&id='.$id.'">Edytuj</a> | <a href="'.$_SERVER['PHP_SELF'].'?action=usun&id='.$id.'">Usuń</a></td>'.'</tr>';
        }
    } else {
        // Wyświetlenie komunikatu o braku podstron
        $wynik .= '<tr><td colspan="3">Brak podstron do wyświetlenia.</td></tr>';
    }

    $wynik .= '</table>';

    echo $wynik;

    // Wykonanie odpowiedniej akcji w zależności od parametru $_GET['action']
    if (isset($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);
        if ($action === 'edytuj' && isset($_GET['id'])) {
            echo EdytujPodstrone();
        } else if ($action === 'usun' && isset($_GET['id'])) {
            echo UsunPodstrone();
        } else if ($action === 'dodaj') {
            echo DodajNowaPodstrone();
        }
}
}

// Funkcja zwracająca formularz edycji podstrony
function EdytujPodstrone() {
    global $link;

    // Ustalenie id podstrony lub wuświetlenie informacji o braku podstrony z podanym id
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono podstrony o podanym ID";
        exit;
    }

    // Pobranie danych podstrony z bazy danych
    $query = "SELECT page_title, page_content, status FROM page_list WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    // Przypisanie danych podstrony do zmiennych
    if (mysqli_num_rows($result) > 0 && $result) {
        $row = mysqli_fetch_assoc($result);
        $page_title = $row['page_title'];
        $page_content = $row['page_content'];
        $page_is_active = $row['status'];

        // Stworzenie formularza do edycji podstrony
        $wynik = '<h3>Edycja Podstrony o id:'.$id.'</h3>'.'<form method="POST" action="save_edit.php?id='.$id.'">';
        $wynik .= '<input class="tytul" type="text" name="page_title" value="'.$page_title.'"><br />';
        $wynik .= '<textarea class="tresc" rows=20 cols=100 name="page_content">'.$page_content.'</textarea><br />';
        $wynik .= 'Podstrona aktywna: <input class="aktywna" type="checkbox" name="page_is_active" value="1"'.($page_is_active == 1 ? 'checked="checked"' : '').'><br />';
        $wynik .= '<input class="zapisz" type="submit" name="zapisz" value="zapisz">'.'</form>';

        return $wynik;
    }
}

// Funkcja zwracająca formularz dodawania nowej podstrony
function DodajNowaPodstrone() {
    $wynik = '<h3>Dodaj podstronę:</h3>'.'<form method="POST" action="add_page.php">';
    $wynik .= 'Tytuł: <input class="tytul" type="text" name="page_title" value=""><br /> <br />';
    $wynik .= 'Treść: <textarea class="tresc" rows=20 cols=100 name="page_content"></textarea><br /> <br />';
    $wynik .= 'Podstrona aktywna: <input class="aktywna" type="checkbox" name="page_is_active" value="1"><br /> <br />';
    $wynik .= '<input class="zapisz" type="submit" value="Dodaj">'.'</form>';
    
    return $wynik;
}

// Funkcja pozwalająca na usunięcie podstrony
function UsunPodstrone() {
    global $link;

    // Odszukanie podstrony o podanym id lub wyświetlenie komunikatu o braku podstrony
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono podstrony o podanym ID";
        exit;
    }


    // Usunięcie podstrony z bazy danych
    $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    // Wyświetlenie komunikatu o usunięciu podstrony lub o błędzie
    if ($result) {
        echo "Pomyślnie usunięto podstronę";
    } else {
        echo "Błą podczas usuwania podstrony";
        exit;
    }
}

// Wyświetlenie panelu admina lub formularza logowania w zależności od stanu zmiennej sesji
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    echo 'Jesteś zalogowany jako administrator';
    echo '<a href="logout.php">Wyloguj</a>';
    echo ListaPodstron();
} else {
    echo FormularzLogowania();
}

// Sprawdzenie czy dane z formularza logowania zostały ustawione
if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
    // Przypisanie danych z formularza do zmiennych i zabezpieczenie przed SQL Injection
    $formLogin = htmlspecialchars($_POST['login_email']);
    $formPass = htmlspecialchars($_POST['login_pass']);

    // Sprawdzenie czy dane z formularza są poprawne
    if ($formLogin === $login && $formPass === $pass) {
        // Ustawienie zmiennej sesji admin_logged_in na true i odświeżenie strony
        $_SESSION['admin_logged_in'] = true;
        header("Refresh:0");
    } else {
        // Wyświetlenie komunikatu o błędnych danych logowania i formularza logowania
        echo 'Błędny login lub hasło';
        echo FormularzLogowania();
    }
}


//SKLEP
function DodajKategorie() {
    $wynik = '<h3>Dodaj kategorię:</h3>'.'<form method="POST" action="add_category.php">';
    $wynik .= 'Matka: <input class="tytul" type="text" name="mother" value=""><br /> <br />';
    $wynik .= 'Nazwa: <input class="tytul" type="text" name="name" value=""><br /> <br />';
    $wynik .= '<input class="zapisz" type="submit" value="Dodaj">'.'</form>';
    
    return $wynik;
}

function UsunKategorie() {
    global $link;

    // Odszukanie podstrony o podanym id lub wyświetlenie komunikatu o braku podstrony
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono podstrony o podanym ID";
        exit;
    }

    // Usunięcie kategorii z bazy danych
    $query = "DELETE FROM shop WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    // Wyświetlenie komunikatu o usunięciu kategorii lub o błędzie
    if ($result) {
        echo "Pomyślnie usunięto kategorię";
        exit;
    } else {
        echo "Błą podczas usuwania kategorii";
        exit;
    }
}

function EdytujKategorie() {
    global $link;

    // Ustalenie id kategorii lub wuświetlenie informacji o braku kategorii z podanym id
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono kategorii o podanym ID";
        exit;
    }

    // Pobranie danych kategorii z bazy danych
    $query = "SELECT matka, nazwa FROM shop WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    // Przypisanie danych kategorii do zmiennych
    if (mysqli_num_rows($result) > 0 && $result) {
        $row = mysqli_fetch_assoc($result);
        $matka = $row['matka'];
        $nazwa = $row['nazwa'];

        // Stworzenie formularza do edycji kategorii
        $wynik = '<h3>Edycja Kategorii o id:'.$id.'</h3>'.'<form method="POST" action="save_edit_category.php?id='.$id.'">';
        $wynik .= '<input class="tytul" type="text" name="mother" value="'.$matka.'"><br />';
        $wynik .= '<input class="tytul" type="text" name="name" value="'.$nazwa.'"><br />';
        $wynik .= '<input class="zapisz" type="submit" name="zapisz" value="zapisz">'.'</form>';

        return $wynik;
    }
}

function PokazKategorie() {
    global $link;

    $wynik = '<a href="../index.php">Strona Główna</a> <h3>Kategorie w sklepie:</h3>' . '<ul class="kategorie">';
    $wynik .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?action=dodaj_kat">Dodaj Kategorię</a></li>';

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
            $wynik .= '<br /><li>ID: '. $matka['id'].' <a href="./products.php?kategoria='.$matka['nazwa'].'" style="text-decoration: none; font-size: 1.6em; margin-bottom: 20px; font-weight: bold;">'. $matka['nazwa'] . '</a>' . '    <a href="' . $_SERVER['PHP_SELF'] . '?action=edytuj_kat&id=' . $matka['id'] . '">Edytuj</a> | <a href="' . $_SERVER['PHP_SELF'] . '?action=usun_kat&id=' . $matka['id'] . '">Usuń</a></li>';
            $wynik .= '<ul>';

            // Pętla zagnieżdżona do wyświetlenia podkategorii
            foreach ($matka['podkategorie'] as $podkategoria) {
                $wynik .= '<li>ID: '. $podkategoria['id'].' ' .' <span style="font-size: 1.3em; margin-bottom: 20px;">'. $podkategoria['nazwa'] . '</span>' . '    <a href="' . $_SERVER['PHP_SELF'] . '?action=edytuj_kat&id=' . $podkategoria['id'] . '">Edytuj</a> | <a href="' . $_SERVER['PHP_SELF'] . '?action=usun_kat&id=' . $podkategoria['id'] . '">Usuń</a></li>';
            }

            $wynik .= '</ul></li>';
        }

    } else {
        // Wyświetlenie komunikatu o braku kategorii
        $wynik .= '<li style="font-size:1.6em">Brak kategorii</li>';
    }

    $wynik .= '</ul>';

    echo $wynik;

    // Wykonanie odpowiedniej akcji w zależności od parametru $_GET['action']
    if (isset($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);
        if ($action === 'edytuj_kat' && isset($_GET['id'])) {
            echo EdytujKategorie();
        } else if ($action === 'usun_kat' && isset($_GET['id'])) {
            echo UsunKategorie();
        } else if ($action === 'dodaj_kat') {
            echo DodajKategorie();
        }
    }
}

echo PokazKategorie();


//PRODUKTY

function DodajProdukt() {
    $wynik = '<h3>Dodaj produkt:</h3>'.'<form method="POST" action="add_product.php">';
    $wynik .= 'Tytul: <input class="tytul" type="text" name="title" value=""><br /> <br />';
    $wynik .= 'Opis: <textarea class="tresc" rows=20 cols=100 name="opis"></textarea><br /> <br />';
    $wynik .= 'Data wygaśnięcia: <input class="tytul" type="date" name="data" value=""><br /> <br />';
    $wynik .= 'Cena netto: <input class="tytul" type="text" name="netto" value=""><br /> <br />';
    $wynik .= 'Podatek VAT: <input class="tytul" type="number" name="vat" value=""><br /> <br />';
    $wynik .= 'Ilość sztuk w magazynie: <input class="tytul" type="number" name="number" value=""><br /> <br />';
    $wynik .= 'Kategoria: <input class="tytul" type="number" name="category" value=""><br /> <br />';
    $wynik .= 'Gabaryt produktu: <input class="tytul" type="text" name="weight" value=""><br /> <br />';
    $wynik .= 'Zdjęcie: <input class="tytul" type="text" name="photo" value=""><br /> <br />';
    $wynik .= '<input class="zapisz" type="submit" value="Dodaj">'.'</form>';
    
    return $wynik;
}

function UsunProdukt() {
    global $link;

    // Odszukanie produktu o podanym id lub wyświetlenie komunikatu o braku produktu
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono produktu o podanym ID";
        exit;
    }

    // Usunięcie produktu z bazy danych
    $query = "DELETE FROM produkty WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    // Wyświetlenie komunikatu o usunięciu produktu lub o błędzie
    if ($result) {
        echo "Pomyślnie usunięto produkt";
    } else {
        echo "Błą podczas usuwania produktu";
        exit;
    }
}

function EdytujProdukt() {
    global $link;

    // Ustalenie id produktu lub wuświetlenie informacji o braku produktu z podanym id
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
    } else {
        echo "Nie znaleziono produktu o podanym ID";
        exit;
    }

    // Pobranie danych produktu z bazy danych
    $query = "SELECT tytul, opis, data_wygasniecia, cena_netto, podatek_vat, ilosc, kategoria, gabaryt, zdjecie FROM produkty WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    // Przypisanie danych produktu do zmiennych
    if (mysqli_num_rows($result) > 0 && $result) {
        $row = mysqli_fetch_assoc($result);
        $tytul = $row['tytul'];
        $opis = $row['opis'];
        $data_wygasniecia = $row['data_wygasniecia'];
        $cena_netto = $row['cena_netto'];
        $podatek_vat = $row['podatek_vat'];
        $ilosc = $row['ilosc'];
        $kategoria = $row['kategoria'];
        $gabaryt = $row['gabaryt'];
        $zdjecie = $row['zdjecie'];

        // Stworzenie formularza do edycji produktu
        $wynik = '<h3>Edycja Produktu o id:'.$id.'</h3>'.'<form method="POST" action="save_edit_product.php?id='.$id.'">';
        $wynik .= 'Tytul: <input class="tytul" type="text" name="tytul" value="'.$tytul.'"><br /> <br />';
        $wynik .= 'Opis: <textarea class="tresc" rows=20 cols=100 name="opis">'.$opis.'</textarea><br /> <br />';
        $wynik .= 'Data wygaśnięcia: <input class="tytul" type="date" name="data" value="'.$data_wygasniecia.'"><br /> <br />';
        $wynik .= 'Cena netto: <input class="tytul" type="text" name="netto" value="'.$cena_netto.'"><br /> <br />';
        $wynik .= 'Podatek VAT: <input class="tytul" type="number" name="vat" value="'.$podatek_vat.'"><br /> <br />';
        $wynik .= 'Ilość sztuk w magazynie: <input class="tytul" type="number" name="number" value="'.$ilosc.'"><br /> <br />';
        $wynik .= 'Kategoria: <input class="tytul" type="number" name="category" value="'.$kategoria.'"><br /> <br />';
        $wynik .= 'Gabaryt produktu: <input class="tytul" type="text" name="weight" value="'.$gabaryt.'"><br /> <br />';
        $wynik .= 'Zdjęcie: <input class="tytul" type="text" name="photo" value="'.$zdjecie.'"><br /> <br />';
        $wynik .= '<input class="zapisz" type="submit" name="zapisz" value="zapisz">'.'</form>';

        return $wynik;
    }
}

function PokazProduktID() {
    global $link;
    $id = htmlspecialchars($_GET['id']);

    // Pobranie danych z bazy danych
    $query = "SELECT id, tytul, opis, cena_netto, data_wygasniecia, podatek_vat, ilosc, dostepnosc, kategoria, gabaryt, zdjecie FROM produkty WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    // Sprawdzenie czy zapytanie zwróciło wyniki
    if ($result) {
        // Iteracja po wynikach zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            $tytul = $row['tytul'];
            $opis = $row['opis'];
            $cena_netto = $row['cena_netto'];
            $data_wygasniecia = $row['data_wygasniecia'];
            $podatek_vat = $row['podatek_vat'];
            $ilosc = $row['ilosc'];
            $dostepnosc = $row['dostepnosc'] == 1 ? "Dostępne" : "Niedostępne";
            $kategoria = $row['kategoria'];
            $gabaryt = $row['gabaryt'];
            $zdjecie = $row['zdjecie'];

            if ($row['kategoria'] == 1) {
                $kategoria = "Mangi";
            } else if ($row['kategoria'] == 2) {
                $kategoria = "Filmy";
            } else if ($row['kategoria'] == 3) {
                $kategoria = "Ubrania";
            }

            $cena = $cena_netto + ($podatek_vat * $cena_netto)/100;

            $wynik = '<a href="products.php">Powrót</a><h2>Kategoria: '.$kategoria.'</h2>';
            // Dodanie wiersza odpowiadającego produktowi do tabeli
            $wynik .= '<h3>Produkt: '.$tytul.'</h3><br /><br /><div style="display: flex; flex-direction: row; gap:20px;"><img width="20%" height="20%" src="'.$zdjecie.'"/>';
            $wynik .= '<div style="display: flex; flex-direction:column; gap:20px;"><p style="font-size: 1.2em;">Opis: '.$opis.'</p><h2>Cena: '.$cena.'zł</h2><p>Status dostępności: '.$dostepnosc.'!</p>';
            $wynik .= '<form action="cart.php" method="POST">';
            $wynik .= '<input type="hidden" name="id" value="'.$id.'">';
            $wynik .= '<input type="hidden" name="title" value="'.$tytul.'">';
            $wynik .= '<input type="hidden" name="description" value="'.$opis.'">';
            $wynik .= '<input type="hidden" name="price" value="'.$cena.'">';
            $wynik .= '<input type="hidden" name="weight" value="'.$gabaryt.'">';
            $wynik .= '<input type="hidden" name="photo" value="'.$zdjecie.'">';
            $wynik .= '<button type="submit" style="width: 100px; height: 30px; background-color: red; outline: none; border: none; cursor: pointer;">Kup!</button></form></div></div>';
        }
    } else {
        // Wyświetlenie komunikatu o braku profuktów
        $wynik = '<tr><td colspan="3">Brak produktów do wyświetlenia.</td></tr>';
    }

    echo $wynik;
}

function PokazProdukty() {
    global $link;
    $wynik = '<a href="./shop.php">Powrót</a><h3>Produkty:</h3>'.'<table class="tabela_akcji" style="width: 1400px;">'.'<tr><th>ID</th><th>Tytuł</th><th>Opis</th><th>Cena</th><th>Ilosc</th><th>Dostepnosc</th><th>Kategoria</th><th>Gabaryt</th><th>Zdjecie</th><th>Akcje</th></tr>';
    $wynik .= '<a href="'.$_SERVER['PHP_SELF'].'?action=dodaj_prod">Dodaj produkt</a> <br /> <br />';

    // Pobranie danych z bazy danych
    $query = "SELECT produkty.id, tytul, opis, cena_netto, data_wygasniecia, podatek_vat, ilosc, dostepnosc, kategoria, gabaryt, zdjecie FROM produkty JOIN shop WHERE produkty.kategoria = shop.id";
    $result = mysqli_query($link, $query);

    // Sprawdzenie czy zapytanie zwróciło wyniki
    if ($result) {
        // Iteracja po wynikach zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $tytul = $row['tytul'];
            $opis = $row['opis'];
            $cena_netto = $row['cena_netto'];
            $data_wygasniecia = $row['data_wygasniecia'];
            $podatek_vat = $row['podatek_vat'];
            $ilosc = $row['ilosc'];
            $dostepnosc = $row['dostepnosc'] == 1 ? "Dostępne" : "Niedostępne";
            $kategoria = $row['kategoria'];
            $gabaryt = $row['gabaryt'];
            $zdjecie = $row['zdjecie'];

            $cena = $cena_netto + ($podatek_vat * $cena_netto)/100;

            if ($ilosc > 0 && $data_wygasniecia > date('d-m-Y')) {
                $dostepnosc = true;
            } else {
                $dostepnosc = false;
            }

            // Dodanie wiersza odpowiadającego produktowi do tabeli
            $wynik .= '<tr>'.'<td>' . $id . '</td>'.'<td><a href="products.php?id='.$id.'">'. $tytul . '</a></td>'.'<td>' . $opis . '</td>'.'<td>' . $cena . '</td>'.'<td>' . $ilosc . '</td>'.'<td>' . $dostepnosc . '</td>'.'<td>' . $kategoria . '</td>'.'<td>' . $gabaryt . '</td>'.'<td style="width: 10%; max-height: 100%;"><img style="width: 65px; height: 100px;" src="'.$zdjecie.'"/></td>'.'<td><a href="'.$_SERVER['PHP_SELF'].'?action=edytuj_prod&id='.$id.'">Edytuj</a> | <a href="'.$_SERVER['PHP_SELF'].'?action=usun_prod&id='.$id.'">Usuń</a></td>'.'</tr>';
        }
    } else {
        // Wyświetlenie komunikatu o braku profuktów
        $wynik .= '<tr><td colspan="3">Brak produktów do wyświetlenia.</td></tr>';
    }

    $wynik .= '</table>';

    echo $wynik;

    if (isset($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);
        if ($action === 'edytuj_prod' && isset($_GET['id'])) {
            echo EdytujProdukt();
        } else if ($action === 'usun_prod' && isset($_GET['id'])) {
            echo UsunProdukt();
        } else if ($action === 'dodaj_prod') {
            echo DodajProdukt();
        }
    }
}

if (!isset($_GET['id'])) {
    echo PokazProdukty();
} else if (!isset($_GET['action'])) {
    echo PokazProduktID();
} else {
     // Wykonanie odpowiedniej akcji w zależności od parametru $_GET['action']
     if (isset($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);
        if ($action === 'edytuj_prod' && isset($_GET['id'])) {
            echo EdytujProdukt();
        } else if ($action === 'usun_prod' && isset($_GET['id'])) {
            echo UsunProdukt();
        } else if ($action === 'dodaj_prod') {
            echo DodajProdukt();
        }
}
}
?>

</body>
</html>