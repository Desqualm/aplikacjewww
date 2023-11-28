-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 07:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Table structure for table `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'Recenzje', '<main class=\"review-container\">\r\n	<h1>Recenzje Anime</h1>\r\n	<table class=\"review-table\">\r\n		<thead>\r\n			<tr>\r\n				<th>Nazwa Anime</th>\r\n				<th>Ocena</th>\r\n				<th>Opinia</th>\r\n				<th>Data</th>\r\n				<th>Okładka</th>\r\n			</tr>\r\n		</thead>\r\n		<tbody>\r\n			<tr>\r\n				<td>Naruto</td>\r\n				<td>8/10</td>\r\n				<td>Świetna seria, pełna emocji i przygód!</td>\r\n				<td>2023-10-08</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/naruto.jpg\"\r\n						alt=\"cover-naruto\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Attack on Titan</td>\r\n				<td>9/10</td>\r\n				<td>Intrygująca fabuła i niesamowita akcja.</td>\r\n				<td>2023-10-07</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/aot.jpg\"\r\n						alt=\"cover-attack_on_titan\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>One Piece</td>\r\n				<td>10/10</td>\r\n				<td>Niesamowite przygody piratów, pełne śmiechu i emocji.</td>\r\n				<td>2023-10-06</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/op.jpg\"\r\n						alt=\"cover-one_piece\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>My Hero Academia</td>\r\n				<td>9/10</td>\r\n				<td>Fascynujący świat bohaterów i epickie walki.</td>\r\n				<td>2023-10-05</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/mha.jpg\"\r\n						alt=\"cover-my_hero_academia\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Fullmetal Alchemist: Brotherhood</td>\r\n				<td>10/10</td>\r\n				<td>Genialna fabuła, emocje i głębokie przesłanie.</td>\r\n				<td>2023-10-04</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/fmab.jpg\"\r\n						alt=\"cover-fullmetal_alchemist\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Steins;Gate</td>\r\n				<td>9/10</td>\r\n				<td>Wciągający thriller sci-fi z elementami podróży w czasie.</td>\r\n				<td>2023-10-03</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/steinsgate.jpg\"\r\n						alt=\"cover-steins_gate\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Death Note</td>\r\n				<td>8/10</td>\r\n				<td>\r\n					Intrygujący psychologiczny thriller z elementami nadnaturalnymi.\r\n				</td>\r\n				<td>2023-10-02</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/dn.jpg\"\r\n						alt=\"cover-death_note\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Tokyo Ghoul</td>\r\n				<td>8/10</td>\r\n				<td>Ciemne i mroczne anime z interesującą tematyką.</td>\r\n				<td>2023-10-01</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/tg.jpg\"\r\n						alt=\"cover-tokyo_ghoul\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Clannad</td>\r\n				<td>9/10</td>\r\n				<td>Wzruszająca historia z pięknymi relacjami międzyludzkimi.</td>\r\n				<td>2023-09-30</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/clannad.jpg\"\r\n						alt=\"cover-clannad\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Haikyuu!!</td>\r\n				<td>9/10</td>\r\n				<td>Wspaniałe anime o siatkówce z dynamiczną akcją.</td>\r\n				<td>2023-09-29</td>\r\n				<td>\r\n					<img\r\n						class=\"jQueryImage\"\r\n						src=\"./img/anime_covers/haikyuu.jpg\"\r\n						alt=\"cover-haikyuu\"\r\n					/>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</main>\r\n<script>\r\n	$(document).ready(function () {\r\n		$(\".jQueryImage\").on({\r\n			mouseenter: function () {\r\n				$(this).addClass(\"enlarged\");\r\n			},\r\n			mouseleave: function () {\r\n				$(this).removeClass(\"enlarged\");\r\n			},\r\n		});\r\n	});\r\n</script>\r\n', 1),
(2, 'Top 5', '<main class=\"top-five-container\">\r\n	<h2><i>Top 5</i> Anime</h2>\r\n	<table>\r\n		<tr>\r\n			<td class=\"cover-fullmetal_alchemist\">\r\n				<div class=\"title-cover\">\r\n					<p>1. FullmetalAlchemist:Brotherhood</p>\r\n				</div>\r\n			</td>\r\n			<td class=\"cover-one_piece\">\r\n				<div class=\"title-cover\"><p>2. One Piece</p></div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class=\"cover-naruto\">\r\n				<div class=\"title-cover\"><p>3. Naruto</p></div>\r\n			</td>\r\n			<td class=\"cover-death_note\">\r\n				<div class=\"title-cover\"><p>4. Death Note</p></div>\r\n			</td>\r\n			<td class=\"cover-tokyo_ghoul\">\r\n				<div class=\"title-cover\"><p>5. Tokyo Ghoul</p></div>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</main>\r\n', 1),
(3, 'Ulubione Postacie', '<main class=\"favorite-container\">\r\n	<h1>Moje ulubione postacie</h1>\r\n	<table border=\"1\">\r\n		<tr>\r\n			<td rowspan=\"2\" class=\"edward\"></td>\r\n			<td class=\"text-container\">\r\n				<h2>Edward Elric</h2>\r\n				<h3>Seria: <i> Fullmetal Alchemist: Brotherhood </i></h3>\r\n				<p>\r\n					Jego niezwykła determinacja i silna wola są inspirujące. Mimo że\r\n					stracił wiele w życiu, w tym swoje własne ciało, nie przestaje dążyć\r\n					do swojego celu - odzyskania pełnego ciała dla siebie i swojego brata.\r\n					To pokazuje, że nawet w najtrudniejszych momentach życia można\r\n					zachować nadzieję i walczyć o swoje marzenia. Ponadto, Edward to\r\n					postać, która jest bardzo kompleksowa. Ma swoje wady, takie jak upór i\r\n					impulsywność, ale również wiele zalet, w tym inteligencję, empatię i\r\n					odwagę. Jego rozwój jako postaci przez całą serię jest fascynujący, a\r\n					widzowie mogą śledzić, jak staje się bardziej dojrzały i mądrzejszy.\r\n				</p>\r\n			</td>\r\n			<td rowspan=\"2\" class=\"luffy\"></td>\r\n		</tr>\r\n		<tr>\r\n			<td class=\"text-container\">\r\n				<h2>Luffy</h2>\r\n				<h3>Seria: <i> One Piece </i></h3>\r\n				<p>\r\n					Luffy z serii anime One Piece jest moją ulubioną postacią ze względu\r\n					na jego niezwykłą determinację i pasję do osiągnięcia swojego celu -\r\n					stania się Królem Piratów. Jego bezgraniczna odwaga i gotowość do\r\n					ryzykowania wszystkim dla swoich przyjaciół oraz załogi sprawiają, że\r\n					jest inspirującą postacią. Luffy także posiada unikalne umiejętności,\r\n					takie jak zdolność do rozciągania swojego ciała dzięki owocowi Gomu\r\n					Gomu no Mi, co nadaje mu niezwykłe umiejętności w walce. Jego\r\n					pozytywne podejście do życia i zdolność do przyciągania lojalnych\r\n					towarzyszy do swojej drużyny sprawiają, że jest postacią, którą trudno\r\n					nie pokochać.\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</main>\r\n', 1),
(4, 'Poradnik', '<main class=\"howto-container\">\r\n	<h1>Jak zacząć przygodę z Anime?</h1>\r\n	<table>\r\n		<tr>\r\n			<td style=\"background-color: rgba(173, 216, 230, 0.6)\">\r\n				<h2>Co to jest anime?</h2>\r\n				<p>\r\n					Anime to japońska forma animacji, która może obejmować różnorodne\r\n					gatunki, od przygody i fantasy po dramat i komedię.\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color: rgba(144, 238, 144, 0.6)\">\r\n				<h2>Jak zacząć oglądać anime?</h2>\r\n				<p>Aby zacząć przygodę z anime, polecamy:</p>\r\n				<ul>\r\n					<li>Wybór gatunku, który cię interesuje.</li>\r\n					<li>Wyszukiwanie popularnych serii anime.</li>\r\n					<li>\r\n						Obejrzenie kilku odcinków, aby zrozumieć, czy dany tytuł ci się\r\n						podoba.\r\n					</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color: rgba(255, 182, 193, 0.6)\">\r\n				<h2>Popularne serie anime</h2>\r\n				<p>Oto kilka popularnych serii anime:</p>\r\n				<ul>\r\n					<li>Naruto</li>\r\n					<li>One Piece</li>\r\n					<li>Attack on Titan</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color: rgba(255, 165, 0, 0.8)\">\r\n				<h2>Strumieniowanie i platformy anime</h2>\r\n				<p>\r\n					Możesz oglądać anime na różnych platformach, takich jak Crunchyroll,\r\n					Funimation, Netflix i Hulu.\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color: rgb(89, 28, 81)\">\r\n				<h2>Podsumowanie</h2>\r\n				<p>\r\n					Anime to fascynująca forma rozrywki, która może dostarczyć wiele\r\n					emocji i przygód. Zacznij od wyboru gatunku, który cię interesuje, i\r\n					eksploruj świat anime!\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</main>\r\n', 1),
(5, 'Kontakt', '<main class=\"form-container\">\r\n	<form action=\"admin/contact.php\" method=\"POST\">\r\n		<h1>Skontaktuj się ze mną!</h1>\r\n		<label for=\"email\">Twój email:</label>\r\n		<input class=\"input\" type=\"email\" name=\"email\" id=\"email\" />\r\n		<label for=\"Temat\">Temat:</label>\r\n		<input class=\"input\" type=\"text\" name=\"temat\" id=\"temat\" />\r\n		<label for=\"tresc\">Wiadomość:</label>\r\n		<textarea name=\"tresc\" cols=\"80\" rows=\"10\"></textarea>\r\n		<input class=\"form-button\" type=\"submit\" name=\"send\" value=\"Wyślij!\" />\r\n	</form>\r\n</main>\r\n', 1),
(6, 'Filmy', '<main class=\"movies-container\">\r\n	<div class=\"small-movie-container\">\r\n		<iframe\r\n			width=\"560\"\r\n			height=\"315\"\r\n			src=\"https://www.youtube.com/embed/xPyJ2XhSKOI?si=xNbonO94G7js1wag\"\r\n			title=\"One Piece 1 Opening\"\r\n			frameborder=\"0\"\r\n			allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n			allowfullscreen\r\n		></iframe>\r\n		<iframe\r\n			width=\"560\"\r\n			height=\"315\"\r\n			src=\"https://www.youtube.com/embed/J6YdEvsTQHg?si=eHDrpkb6nk-p9aod\"\r\n			title=\"Fullmetal Alchemist Brotherhood 1 Opening\"\r\n			frameborder=\"0\"\r\n			allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n			allowfullscreen\r\n		></iframe>\r\n	</div>\r\n	<iframe\r\n		width=\"800\"\r\n		height=\"300\"\r\n		src=\"https://www.youtube.com/embed/KZGMXiqtcMk?si=6POAZcW1HXIUUlxe\"\r\n		title=\"Top 10 One Piece Fights\"\r\n		frameborder=\"0\"\r\n		allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n		allowfullscreen\r\n	></iframe>\r\n</main>\r\n', 1),
(7, 'Główna', '<main class=\"main-container\">\r\n	<table>\r\n		<tr>\r\n			<td rowspan=\"2\" class=\"top-left cell\">\r\n				<img src=\"./img/calendar.png\" alt=\"calendar\" />\r\n				<div class=\"text-content\">\r\n					<h2>Premiery <span style=\"color: red\">w tym roku</span></h2>\r\n					<p><b>Dead Mount Death Play</b> - <u>19.11.2023</u></p>\r\n					<p id=\"timeLeft\"></p>\r\n					<p><b>Rurouni Kenshin</b> - <u>05.12.2023</u></p>\r\n					<p id=\"timeLeft2\"></p>\r\n					<p><b>NieR Automata</b> - <u>21.12.2023</u></p>\r\n					<p id=\"timeLeft3\"></p>\r\n				</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td class=\"top-right\">\r\n				<img class=\"rowlet-img\" src=\"./img/rowlet.png\" alt=\"pokemon-rowlet\" />\r\n				<div class=\"text\">\r\n					<h2>\r\n						<span style=\"color: limegreen\">Rowlet</span> - mój ulubiony Pokemon\r\n					</h2>\r\n					<p><b>Rowlet</b> jest pokemonem typu <i>trawiasto-llatający.</i></p>\r\n					<p>\r\n						Na poziomie 17 ewoluuje w <b>Datrixa</b>, a na poziomie 34 w\r\n						<b>Decidueye</b>\r\n					</p>\r\n					<p>Jest jednym z trzech <u>starterów</u> w regionie <b>Alola</b></p>\r\n					<p>\r\n						Jest on małym pokemonem przypominającym sowę. Ma okrągłe ciało oraz\r\n						krótkie nogi. Jego ubarwienie składa się głównie z koloru beżowego.\r\n						Posiada duże, czarne oczy oraz zadarty dziób. Na szyi posiada dwa\r\n						liście złożone na kształt muszki.\r\n					</p>\r\n					<p>\r\n						Podczas dnia kumuluje energię za pomoca fotosyntezy. Jest zdolny do\r\n						obrócenia swojej głowy prawie o 180 stopni oraz doskonale widzi w\r\n						ciemności.\r\n					</p>\r\n				</div>\r\n				<button class=\"change-img-btn\">Zmień obrazek!</button>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" class=\"bottom\">\r\n				<p>\r\n					Anime stało się moim ulubionym hobby z kilku powodów. Po pierwsze,\r\n					fascynująca różnorodność gatunków i tematów, jakie anime oferuje,\r\n					zawsze pozwala mi odkrywać nowe historie i światy. Niezależnie od\r\n					tego, czy jest to epicka przygoda fantasy, głęboka opowieść\r\n					psychologiczna czy urocza komedia, zawsze znajdę coś, co mnie\r\n					zaciekawi. Po drugie, anime często porusza ważne tematy społeczne i\r\n					emocjonalne, co prowokuje do refleksji i dyskusji. Ponadto, jako forma\r\n					sztuki, anime zachwyca mnie swoją różnorodnością stylów artystycznych\r\n					i pięknem animacji. Oglądanie anime to także okazja do odkrywania\r\n					różnych kultur i tradycji, które często są ważnym elementem fabuły.\r\n					Wreszcie, anime to wspaniała okazja do nawiązywania kontaktów z ludźmi\r\n					o podobnych zainteresowaniach, dzięki czemu mogę uczestniczyć w\r\n					społeczności, która wspólnie cieszy się tą formą rozrywki. Dlatego też\r\n					anime stało się dla mnie nie tylko hobby, ale również źródłem\r\n					inspiracji i rozwoju osobistego.\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</main>\r\n\r\n<script src=\"./js/timedate.js\" type=\"text/javascript\"></script>\r\n<script src=\"./js/kolorujtlo.js\" type=\"text/javascript\"></script>\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;