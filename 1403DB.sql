-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 mrt 2017 om 22:36
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
  `username` varchar(50) NOT NULL,
  `Factuuradres` varchar(100) NOT NULL,
  `Leveradres` varchar(100) NOT NULL,
  `Levermethode` varchar(50) NOT NULL,
  `betaalmethode` varchar(35) NOT NULL
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
('Brol'),
('Multi Media');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `cat_naam` varchar(20) NOT NULL,
  `naam` varchar(500) NOT NULL,
  `prijs` float NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `datum_toegevoegd` date NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `uitgelicht` tinyint(1) NOT NULL DEFAULT '0',
  `avg_rating` float NOT NULL DEFAULT '0',
  `numb_ratings` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `cat_naam`, `naam`, `prijs`, `beschrijving`, `datum_toegevoegd`, `img_path`, `uitgelicht`, `avg_rating`, `numb_ratings`) VALUES
(4, 'Multi Media', 'iPhone 7', 50, 'iPhone 7 dramatically improves the most important aspects of the iPhone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iPhone. Immersive stereo speakers. The brightest, most colorful iPhone display. Splash and water resistance.1 And it looks every bit as powerful as it is. This is iPhone 7.', '2017-03-08', '../Resources/iPhone7.png', 1, 8.5, 2),
(5, 'Multi Media', 'Samsung S7', 90, 'So, Finally Samsung Galaxy S7 Series Smartphone’s are released and Yes they are really impressive. Both device are now available for sale. Take a look on design and curves of Samsung Galaxy S7 | S7 Edge from Samsung’s official Youtube channel here:\n\nWhat if your next phone could take photos like a professional?\nWhat if it worked in low light?\nWhat if it gave you enough expandable memory to store all your pictures?', '2016-09-12', '../Resources/GalaxyS7.jpg', 0, 0, 0),
(6, 'Multi Media', 'OnePlus 3T', 347, 'The OnePlus 3T delivers the best user experience, thanks to the latest hardware upgrades and carefully tested software enhancements.', '2015-08-13', '../Resources/OnePlus.png', 1, 0, 0),
(7, 'Brol', 'HTC 10', 749, '\r\nTHE POWER OF 10\r\n\r\nHTC 10. Alles wat jij zoekt in een toonaangevende telefoon; ongeëvenaarde prestaties, geweldig 24-bits Hi-Res audio, ’s werelds eerste voor- en hoofdcamera met optische beeldstabilisatie (OIS) en een van de hoogste scores voor telefooncamera ooit van DxOMark. Alles in een prachtig gevormd metalen behuizing.', '2017-06-15', '../Resources/htc10.png', 1, 8.5, 2),
(8, 'Multi Media', 'Samsung Galaxy A5 Zwart (2016)', 321, 'Schitterende combinatie van glas en metaal\r\nDe nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', '2017-08-16', '../Resources/samsunga5.png', 0, 7.5, 2),
(9, 'Multi Media', 'Apple iPhone 5s Spacegrijs 16GB ', 320, 'Een technologisch pareltje\r\nDe iPhone is altijd al een voorloper geweest. En voor de iPhone 5s is dit niet anders : een technologisch pareltje die nog beter presteert. Zonder in te boeten aan batterijduur natuurlijk.', '2017-03-24', '../Resources/iphone5.png', 1, 0, 0),
(10, 'Brol', 'Wiko Sunny Turkoois', 1, 'DE LEUKSTE!\r\nWil je een smartphone die super makkelijk te hanteren en te gebruiken is, maar zoek je ook een zoet ontwerp en een vleugje waanzin? We hebben het! SUNNY is de perfecte dagelijkse vriend met een compact formaat en leuke kleuren. Hoe zit het met de camera? Nou, 5MP en leuke opties om je beste momenten vast te leggen. En hebben we al Marshmallow 6.0. gezegd? Ja, ook dat heeft de SUNNY!', '2017-03-24', '../Resources/brol.png', 1, 0, 0),
(11, 'Multi Media', 'Huawei P8 Titanium', 280, 'Designed to inspire\r\nDe nieuwe Huawei P8 laat zien dat design en techniek geen concessies voor elkaar hoeven te doen. Deze high-end smartphone is gemaakt met uitsluitend premium materialen en heeft een uniek ï¿½gelaagdï¿½ ontwerp. Het resultaat: esthetische lijnen die leiden tot pure schoonheid en innovaties die je creativiteit een boost zullen geven.', '2002-01-08', '../Resources/huawei.png', 1, 0, 0),
(15, 'Multi Media', 'Samsung iPhone 3', 5747.22, 'xDDDDD', '2017-03-14', '../Resources/dummypng.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `product_id`, `comment`, `rating`) VALUES
(24, 'dev', 8, 'Goeie GSM', 8),
(25, 'dev', 8, 'Super gsm', 7),
(26, 'devke', 4, 'Schitterende combinatie van glas en metaal De nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', 8),
(27, 'devke', 4, 'Super gsm', 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `authority` int(11) NOT NULL,
  `emailadres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`username`, `password`, `naam`, `voornaam`, `authority`, `emailadres`) VALUES
('dev', '$2y$10$8pRBSo2Hx3Rx6pscq6jwju0h1xMW.W7Bu2s3QIJTf7HNCcvBjjZfK', 'Bomans', 'Tristan', 1, 'tristan.bomans@telenet.be'),
('devke', '$2y$10$vy1DwMwNUIEPWSTaNsk1JOGag8SNLz12cBsiEFraxbzVVFkIdNn9C', 'Bomans', 'Tristan', 0, 'tristan.bomans@telenet.be'),
('tristan550505', '$2y$10$IXr3ja8gxkFZlUmPYj4vpepIg3bb/0kUGbA/WfxDPljZEDPlgwqnG', 'Bomans', 'Tristan', 0, 'tristan.bomans@telenet.be');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_name_2` (`username`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`naam`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_naam` (`cat_naam`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_user_name_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_naam`) REFERENCES `categorie` (`naam`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`),
  ADD CONSTRAINT `fk_user_name` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
