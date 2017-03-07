-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 mrt 2017 om 01:16
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web project 2017`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `Factuuradres` varchar(100) NOT NULL,
  `Leveradres` varchar(100) NOT NULL,
  `Levermethode` varchar(50) NOT NULL,
  `betaalmethode` varchar(35) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `naam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`naam`) VALUES
('Multi Media');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `cat_naam` varchar(20) NOT NULL,
  `naam` varchar(500) NOT NULL,
  `prijs` decimal(11,0) NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `datum_toegevoegd` date NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `uitgelicht` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `cat_naam`, `naam`, `prijs`, `beschrijving`, `datum_toegevoegd`, `img_path`, `uitgelicht`) VALUES
(4, 'Multi Media', 'iPhone 7', '50', 'iPhone 7 dramatically improves the most important aspects of the iPhone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iPhone. Immersive stereo speakers. The brightest, most colorful iPhone display. Splash and water resistance.1 And it looks every bit as powerful as it is. This is iPhone 7.', '2017-03-08', '../Resources/iPhone7.png', 1),
(5, 'Multi Media', 'Samsung S7', '90', 'So, Finally Samsung Galaxy S7 Series Smartphone’s are released and Yes they are really impressive. Both device are now available for sale. Take a look on design and curves of Samsung Galaxy S7 | S7 Edge from Samsung’s official Youtube channel here:\n\nWhat if your next phone could take photos like a professional?\nWhat if it worked in low light?\nWhat if it gave you enough expandable memory to store all your pictures?', '2016-09-12', '../Resources/GalaxyS7.jpg', 0),
(6, 'Multi Media', 'OnePlus 3T', '347', 'The OnePlus 3T delivers the best user experience, thanks to the latest hardware upgrades and carefully tested software enhancements.', '2015-08-13', '../Resources/OnePlus.png', 1),
(7, 'Multi Media', 'HTC 10', '749', '\r\nTHE POWER OF 10\r\n\r\nHTC 10. Alles wat jij zoekt in een toonaangevende telefoon; ongeëvenaarde prestaties, geweldig 24-bits Hi-Res audio, ’s werelds eerste voor- en hoofdcamera met optische beeldstabilisatie (OIS) en een van de hoogste scores voor telefooncamera ooit van DxOMark. Alles in een prachtig gevormd metalen behuizing.', '2017-06-15', '../Resources/htc10.png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` int(11) NOT NULL,
  `voornaam` int(11) NOT NULL,
  `authority` int(11) NOT NULL,
  `emailadres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`naam`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_naam` (`cat_naam`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_users_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_naam`) REFERENCES `categorie` (`naam`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
