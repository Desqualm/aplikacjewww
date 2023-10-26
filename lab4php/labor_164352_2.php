<?php
    $nr_indeksu = '164352';
    $nrGrupy = 2;

    echo 'Damian Chmielewski '.$nr_indeksu.' grupa '.$nrGrupy.' <br/> <br/>';
    
    echo 'Zastosowanie metody include() <br />';
    include 'indeks.php';
    echo 'Nr indeksu z pliku indeks.php: '.$nrInd.'<br /> <br/>';

    echo 'Zastosowanie metody require_once() <br />';

    function zwrocGrupe() {
        require_once('grupa.php');
        return $nrGrupy;
    }
    //Tu się wypisze
    echo '1.Nr grupy z pliku grupa.php: '.zwrocGrupe().'<br />';
    //Tu się nie wypisze
    echo '2.Nr grupy z pliku grupa.php: '.zwrocGrupe().'<br /> <br />';

    echo 'Zastosowanie warunku if, elseif, else <br />';

    $wiek = 16;

    echo "Wiek = $wiek to ";
    if ($wiek < 11) {
        echo 'Dziecko';
    } else if ($wiek >= 11 && $wiek < 18) {
        echo 'Nastolatek';
    } else {
        echo 'Dorosły';
    }

    echo '<br /> <br />';

    echo 'Zastosowanie pętli switch <br/>';

    $dzien_tygodnia = 1;
    echo $dzien_tygodnia.' dzien tygodnia to ';
    switch($dzien_tygodnia) {
        case 1:
            echo 'Poniedziałek';
            break;
        case 2:
            echo 'Wtorek';
            break;
        case 3:
            echo 'Środa';
            break;
        case 4:
            echo 'Czwartek';
            break;
        case 5:
            echo 'Piątek';
            break;
        case 6:
            echo 'Sobota';
            break;
        case 7:
            echo 'Niedziela';
            break;
        default:
            echo 'Nie ma takiego dnia tygodnia';
    }
    echo '<br /> <br />';

    echo 'Zastosowanie pętli while() <br />';

    $i = 0;

    while($i <= 10) {
        echo $i.' ';
        $i++;
    }

    echo '<br /> <br />';

    echo 'Zastosowanie pętli for() <br/>';

    for($i = 0; $i <= 10; $i++) {
        echo $i.' ';
    }
    echo '<br /> <br />';

    echo 'Zastosowanie typu zmiennych $_GET <br />';

    //Nalezy w url wpisac ?imie=imie np. ?imie=Damian

    echo "Witaj " .htmlspecialchars($_GET["imie"]).'! <br /> <br />';

    echo 'Zastosowanie typu zmiennych $_POST <br />';

    //Wysyłając formularz z pliku html metodą POST z polem "nazwisko" zostanie ono wypisane, lub używając programu typu np. Postman

    echo "Witaj " .htmlspecialchars($_POST["nazwisko"]).'! <br /> <br />';

    echo 'Zastosowanie typu zmiennych $_SESSION <br />';

    //W celu zobrazowania działania w pliku grupa.php została utworzona zmienna sesji 'uczelnia'.
    //Zmienna może być użyta zarówno w tym pliku jak i w pliku grupa.php bez konieczności używania metody require_once() lub include().

    echo 'Uczelnia: '.$_SESSION['uczelnia'].'! <br /> <br />';
?>