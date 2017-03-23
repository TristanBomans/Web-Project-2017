-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mrt 2017 om 23:57
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
-- Tabelstructuur voor tabel `bestelinhoud`
--

CREATE TABLE `bestelinhoud` (
  `id` int(11) NOT NULL,
  `bestelling_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelinhoud`
--

INSERT INTO `bestelinhoud` (`id`, `bestelling_id`, `product_id`) VALUES
(4, 3, 10),
(5, 3, 8),
(6, 3, 9),
(7, 3, 4),
(8, 3, 11),
(9, 3, 7),
(10, 5, 5),
(11, 5, 4),
(12, 8, 8),
(13, 8, 7),
(14, 8, 10),
(15, 9, 9),
(16, 9, 10),
(17, 9, 5),
(18, 9, 4),
(19, 9, 15),
(20, 10, 15),
(21, 10, 19),
(22, 10, 19),
(23, 10, 15),
(24, 10, 4),
(25, 10, 5),
(26, 11, 7),
(27, 11, 8),
(28, 11, 10),
(29, 12, 9),
(30, 12, 10),
(31, 12, 11),
(32, 12, 4),
(33, 13, 8),
(34, 13, 19),
(35, 13, 15),
(36, 14, 9),
(37, 14, 10),
(38, 14, 9),
(39, 14, 7),
(40, 15, 8),
(41, 15, 7),
(42, 15, 9),
(43, 15, 10),
(44, 16, 8),
(45, 16, 7),
(46, 16, 10),
(47, 16, 9),
(48, 16, 19),
(49, 16, 15),
(50, 16, 4),
(51, 16, 5),
(52, 17, 8),
(53, 17, 8),
(54, 17, 7),
(55, 17, 20);

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
  `betaalmethode` varchar(35) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `username`, `Factuuradres`, `Leveradres`, `Levermethode`, `betaalmethode`, `datum`) VALUES
(3, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'webshopsnelservice', 'paypal', '2017-03-23'),
(5, 'dev', 'Kooolmezenstraat 4, 1850 Grimbergen', 'Kooolmezenstraat 4, 1850 Grimbergen', 'vrachtwagen', 'paypal', '2017-03-23'),
(8, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'ophalen', 'paypal', '2017-03-23'),
(9, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-23'),
(10, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-23'),
(11, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-23'),
(12, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'ophalen', 'paypal', '2017-03-23'),
(13, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'ophalen', 'paypal', '2017-03-23'),
(14, 'tristan550505', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-23'),
(15, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-23'),
(16, 'dev', 'Kooolmezenstraat 4, 1850 Grimbergen', 'Kooolmezenstraat 4, 1850 Grimbergen', 'vrachtwagen', 'paypal', '2017-03-23'),
(17, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-03-24');

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
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `username`, `subject`, `message`, `datum`) VALUES
(1, 'dev', 'U website suckt', 'aevevfljevnoipzevnhiopzeriopzerpijnbinrbn', '0000-00-00'),
(2, 'dev', 'Vraag over de website', 'iaculis, et porttitor turpis gravida. Duis rhoncus consectetur nisi a volutpat. Nam tincidunt semper odio et lobortis. Integer ornare elit id eros finibus feugiat in ut mi. Ut semper, magna a consequat sodales, enim risus sodales libero, sed vulputate metus erat id quam. Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet enim volutpat luctus. Suspendisse laoreet nisi in sem semper euismod vel a turpis. Sed non euismod ex. Nunc di', '2017-03-23'),
(3, 'dev', 'Vdddd', 'Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet e', '2017-03-23'),
(4, 'dev', 'dit is leuk', 'Nullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet enim volutpat luctus. Suspendisse laoreet nisi in sem semper euismod vel a turpis. Sed non euismod ex. Nunc dictum vestibulum orci ut suscipit. Duis vitae ex eros. In eu aliquam enim, ac fringilla erat. In hac habitasse platea dictumst. Curabitur vitae varius libero. Cras facilisis malesuada massa quis laoreet. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing', '2017-03-24'),
(5, 'dev', 'U website suckt', ' finibus feugiat in ut mi. Ut semper, magna a consequat sodales, enim risus sodales libero, sed vulputate metus erat id quam. Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adi', '2017-03-24');

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
  `img_path` varchar(250) NOT NULL,
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
(9, 'Multi Media', 'Apple iPhone 5s Spacegrijs 16GB ', 320, 'Een technologisch pareltje\r\nDe iPhone is altijd al een voorloper geweest. En voor de iPhone 5s is dit niet anders : een technologisch pareltje die nog beter presteert. Zonder in te boeten aan batterijduur natuurlijk.', '2017-03-24', '../Resources/iphone5.png', 1, 10, 1),
(10, 'Brol', 'Wiko Sunny Turkoois', 1, 'DE LEUKSTE!\r\nWil je een smartphone die super makkelijk te hanteren en te gebruiken is, maar zoek je ook een zoet ontwerp en een vleugje waanzin? We hebben het! SUNNY is de perfecte dagelijkse vriend met een compact formaat en leuke kleuren. Hoe zit het met de camera? Nou, 5MP en leuke opties om je beste momenten vast te leggen. En hebben we al Marshmallow 6.0. gezegd? Ja, ook dat heeft de SUNNY!', '2017-03-24', '../Resources/brol.png', 1, 0, 0),
(11, 'Multi Media', 'Huawei P8 Titanium', 280, 'Designed to inspire\r\nDe nieuwe Huawei P8 laat zien dat design en techniek geen concessies voor elkaar hoeven te doen. Deze high-end smartphone is gemaakt met uitsluitend premium materialen en heeft een uniek ï¿½gelaagdï¿½ ontwerp. Het resultaat: esthetische lijnen die leiden tot pure schoonheid en innovaties die je creativiteit een boost zullen geven.', '2002-01-08', '../Resources/huawei.png', 1, 0, 0),
(15, 'Multi Media', 'Samsung iPhone 3', 5747.22, 'xDDDDD', '2017-03-14', '../Resources/dummypng.png', 0, 0, 0),
(19, 'Brol', 'Jan Wante', -50, 'Dit is een geweldige leerkracht en je krijgt er â‚¬50 bovenop!', '2017-03-16', '../Resources/10275580_10154117497140440_3031077272733934198_o.jpg', 0, 1, 1),
(20, 'Brol', 'test', 40.6, 'xzergrebh', '2017-03-24', '../Resources/audi_rs6_red_side_view_105201_2560x1080.jpg', 0, 0, 0);

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
(27, 'devke', 4, 'Super gsm', 9),
(28, 'dev', 19, 'nee.', 1),
(29, 'dev', 9, 'Schitterende combinatie van glas en metaal De nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', 10);

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
-- Indexen voor tabel `bestelinhoud`
--
ALTER TABLE `bestelinhoud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bestelling_id` (`bestelling_id`),
  ADD KEY `product_id` (`product_id`);

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
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

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
-- AUTO_INCREMENT voor een tabel `bestelinhoud`
--
ALTER TABLE `bestelinhoud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelinhoud`
--
ALTER TABLE `bestelinhoud`
  ADD CONSTRAINT `fk_bestelling_id` FOREIGN KEY (`bestelling_id`) REFERENCES `bestellingen` (`id`),
  ADD CONSTRAINT `fk_prod_3` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`);

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_user_name_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Beperkingen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_username_contact` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_naam`) REFERENCES `categorie` (`naam`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`),
  ADD CONSTRAINT `fk_user_name` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
