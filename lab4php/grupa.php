<?php
    session_start();
    $_SESSION['uczelnia'] = 'UWM';

    $nrGrupy = 2;

    echo "Uczelnia: ".$_SESSION['uczelnia'].'<br />';
?>