<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./css/styles.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<title>Anime - Moje Hobby</title>
	</head>
	<body>
		<header class="nav-container">
			<div class="logo-container">
				<a href="index.php"><img src="./img/logo.png" alt="logo" class="logo" /></a>
				<h1 class="title">Moje Hobby - Anime</h1>
			</div>

			<div class="links-container">
				<ul class="links">
					<li><a href="index.php?idp=1">Recenzje</a></li>
					<li><a href="index.php?idp=2">Top 5</a></li>
					<li>
						<a href="index.php?idp=3">Ulubione postacie</a>
					</li>
					<li><a href="index.php?idp=4">Poradnik</a></li>
					<li><a href="index.php?idp=5">Kontakt</a></li>
					<li><a href="index.php?idp=6">Filmy</a></li>
					<li><a href="admin/shop.php">Sklep</a></li>
				</ul>
			</div>
		</header>

		<?php
		// Dodanie parametrów oraz funkcji z plików cfg.php oraz showpage.php
		require('./admin/cfg.php');
		require('./admin/showpage.php');

		// ustawienie id strony na 7 (strona główna) jeśli nie zostało podane żadne id
		if (empty($_GET['idp'])) {
			$strona_id = 7;
		} else {
			$strona_id = htmlspecialchars($_GET['idp']);
		}
		// przypisanie podstrony do zmiennej za pomocą funkcji PokazPodstrone z pliku showpage.php
		$tresc_strony = PokazPodstrone($strona_id);
		// sprawdzenie, czy strona istnieje i wyświetlenie jej treści
		if ($tresc_strony === '[nie_znaleziono_strony]') {
			echo 'Strona nie istnieje.';
		} else {
			echo $tresc_strony;
		}

		// przypisanie zmiennych i wyświetlenie informacji o autorze
		$nr_indeksu ='164352';
		$nrGrupy = '2';

		echo 'Autor: Damian Chmielewski '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
		?>
	</body>
</html>
