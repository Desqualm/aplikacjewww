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
					<li><a href="index.php?idp=recenzje">Recenzje</a></li>
					<li><a href="index.php?idp=top5">Top 5</a></li>
					<li>
						<a href="index.php?idp=ulubione_postacie">Ulubione postacie</a>
					</li>
					<li><a href="index.php?idp=poradnik">Poradnik</a></li>
					<li><a href="index.php?idp=kontakt">Kontakt</a></li>
					<li><a href="index.php?idp=filmy">Filmy</a></li>
				</ul>
			</div>
		</header>

		<?php
		 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

		 if (empty($_GET['idp'])) {
			$strona = './html/glowna.html';
		} elseif ($_GET['idp'] == 'recenzje') {
			$strona = './html/review.html';
		} elseif ($_GET['idp'] == 'top5') {
			$strona = './html/top_five.html';
		} elseif ($_GET['idp'] == 'ulubione_postacie') {
			$strona = './html/favorite_characters.html';
		}
		elseif ($_GET['idp'] == 'poradnik') {
			$strona = './html/how_to_start.html';
		}
		elseif ($_GET['idp'] == 'kontakt') {
			$strona = './html/contact.html';
		}
		elseif ($_GET['idp'] == 'filmy') {
			$strona = './html/filmy.html';
		}
		else {
			$strona = './html/glowna.html';
		}

		if (file_exists($strona)) {
			include($strona);
		} else {
			echo 'Strona nie istnieje.';
		}

		$nr_indeksu ='164352';
		$nrGrupy = '2';

		echo 'Autor: Damian Chmielewski '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
		?>
	</body>
</html>
