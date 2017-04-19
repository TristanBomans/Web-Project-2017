-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 19 apr 2017 om 20:59
-- Serverversie: 5.5.54-0+deb8u1
-- PHP-versie: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `web project 2017`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelinhoud`
--

CREATE TABLE IF NOT EXISTS `bestelinhoud` (
`id` int(11) NOT NULL,
  `bestelling_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelinhoud`
--

INSERT INTO `bestelinhoud` (`id`, `bestelling_id`, `product_id`, `aantal`) VALUES
(180, 51, 8, 1),
(181, 51, 22, 1),
(182, 52, 7, 7),
(183, 52, 9, 7),
(184, 52, 10, 7),
(185, 53, 8, 6),
(186, 53, 7, 6),
(187, 53, 22, 6),
(195, 60, 22, 1),
(196, 60, 9, 1),
(250, 86, 7, 1),
(251, 86, 32, 1),
(252, 86, 30, 1),
(253, 86, 8, 1),
(254, 86, 22, 1),
(255, 87, 7, 1),
(256, 88, 32, 1),
(257, 88, 7, 1),
(265, 93, 32, 1),
(266, 93, 30, 1),
(279, 100, 32, 1),
(280, 100, 30, 1),
(281, 100, 31, 1),
(282, 101, 8, 1),
(283, 101, 32, 1),
(284, 101, 30, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Factuuradres` varchar(100) NOT NULL,
  `Leveradres` varchar(100) NOT NULL,
  `Levermethode` varchar(50) NOT NULL,
  `betaalmethode` varchar(35) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `username`, `Factuuradres`, `Leveradres`, `Levermethode`, `betaalmethode`, `datum`) VALUES
(51, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-10'),
(52, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-10'),
(53, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-10'),
(60, 'Colien Vanstokstraeten', 'Kooolmezenstraat 4, 1850 Grimbergen', 'Kooolmezenstraat 4, 1850 Grimbergen', 'vrachtwagen', 'mastercard', '2017-04-10'),
(86, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-18'),
(87, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-18'),
(88, 'dev', 'Koolmezenstraat 4', 'Koolmezenstraat 4', 'vrachtwagen', 'paypal', '2017-04-18'),
(93, 'root', 'Frankrijk, Parijsstraat 69, 5411 Parijs', 'BelgiÃ«, Dutroux 88, 1850 Vilvoorde', 'vrachtwagen', 'paypal', '2017-04-19'),
(100, 'Tristan  Bomans', 'BelgiÃ«, BelgiÃ« BelgiÃ«, 1850 BelgiÃ«', 'BelgiÃ«, BelgiÃ« BelgiÃ«, 1850 BelgiÃ«', 'vrachtwagen', 'paypal', '2017-04-19'),
(101, 'Tristan  Bomans', 'Vlaams Brabant, Vlaams Brabant Vlaams Brabant, 1850 Vlaams Brabant', 'Vlaams Brabant, Vlaams Brabant Vlaams Brabant, 1850 Vlaams Brabant', 'vrachtwagen', 'paypal', '2017-04-19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `naam` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`naam`, `active`) VALUES
('Brol', 1),
('hacket', 0),
('legit bucht', 0),
('Multi Media', 1),
('Snelle kars', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `configuratie`
--

CREATE TABLE IF NOT EXISTS `configuratie` (
  `id` int(11) NOT NULL,
  `naam_ws` varchar(100) NOT NULL,
  `aantal_up` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `configuratie`
--

INSERT INTO `configuratie` (`id`, `naam_ws`, `aantal_up`) VALUES
(1, 'TrisBol.com', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `username`, `subject`, `message`, `datum`) VALUES
(1, 'dev', 'U website suckt', 'aevevfljevnoipzevnhiopzeriopzerpijnbinrbn', '0000-00-00'),
(2, 'dev', 'Vraag over de website', 'iaculis, et porttitor turpis gravida. Duis rhoncus consectetur nisi a volutpat. Nam tincidunt semper odio et lobortis. Integer ornare elit id eros finibus feugiat in ut mi. Ut semper, magna a consequat sodales, enim risus sodales libero, sed vulputate metus erat id quam. Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet enim volutpat luctus. Suspendisse laoreet nisi in sem semper euismod vel a turpis. Sed non euismod ex. Nunc di', '2017-03-23'),
(3, 'dev', 'Vdddd', 'Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet e', '2017-03-23'),
(4, 'dev', 'dit is leuk', 'Nullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id lacinia libero.\r\n\r\nProin semper, metus quis commodo mattis, erat dui dictum odio, eget placerat tellus ligula id erat. Nam facilisis ligula sed enim tristique finibus. Etiam varius, augue quis laoreet tempor, augue erat rhoncus dui, at tempor sem dolor vitae quam. Nulla fermentum ante vitae nibh molestie molestie. Duis a pulvinar lacus. Aenean in tincidunt lorem. Pellentesque convallis lacinia aliquam.\r\n\r\nAenean porta mi sed leo viverra varius. Integer id dui placerat, viverra libero vitae, lobortis lacus. Sed eu lectus sit amet enim volutpat luctus. Suspendisse laoreet nisi in sem semper euismod vel a turpis. Sed non euismod ex. Nunc dictum vestibulum orci ut suscipit. Duis vitae ex eros. In eu aliquam enim, ac fringilla erat. In hac habitasse platea dictumst. Curabitur vitae varius libero. Cras facilisis malesuada massa quis laoreet. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing', '2017-03-24'),
(5, 'dev', 'U website suckt', ' finibus feugiat in ut mi. Ut semper, magna a consequat sodales, enim risus sodales libero, sed vulputate metus erat id quam. Praesent tellus ligula, pellentesque sit amet posuere et, gravida vel massa. Mauris ultricies tellus et libero sollicitudin, eget tempus sapien consectetur. Curabitur luctus, justo at efficitur feugiat, dui sapien semper justo, non ornare ante nisl quis turpis. Aenean et elit mattis, feugiat elit eu, fermentum nulla. Mauris sed enim at metus facilisis porttitor non sit amet lectus. Vestibulum varius orci libero, eu lobortis nisi tempus nec. Cras et arcu vulputate, suscipit augue in, ultrices ligula.\r\n\r\nNullam bibendum eros eget bibendum eleifend. Nulla vehicula erat a suscipit feugiat. Aenean pharetra velit ut enim mattis venenatis. Vivamus vitae rhoncus augue, ac egestas metus. In lobortis, lectus eget commodo hendrerit, arcu ante rutrum risus, vitae tincidunt purus purus at dui. Quisque vel nisl sit amet urna sodales euismod. Proin pretium, felis vel placerat volutpat, leo tellus tincidunt lectus, malesuada semper tortor massa ut lorem. Maecenas eu lacus volutpat, tincidunt ante in, euismod lacus. Nam ut mi id justo faucibus porttitor. Fusce non sem urna. Donec imperdiet, orci ut bibendum volutpat, sapien mi auctor dolor, egestas dapibus nulla dui a massa.\r\n\r\nDonec aliquam nulla eget mattis faucibus. Curabitur varius euismod dui, sagittis venenatis risus eleifend at. Mauris non purus non magna aliquet accumsan id vel lectus. Quisque bibendum purus ut dui malesuada cursus. Aenean sed elit nunc. Nunc dignissim ultrices leo tristique fermentum. Fusce scelerisque tellus dolor, in efficitur massa tempus ac. Nunc risus nibh, rutrum at nunc nec, tempus viverra nisl. Cras blandit, ipsum quis elementum consectetur, risus quam sagittis nulla, non sodales purus augue tempus ante. Sed nec libero ac massa varius pulvinar sit amet vitae justo. Nam vitae nulla dapibus, tincidunt dolor sed, commodo diam. Nullam id pretium nulla. Maecenas purus libero, vestibulum sit amet dictum et, dictum et erat. Vestibulum efficitur, metus varius dignissim scelerisque, erat felis tempus erat, sit amet malesuada turpis risus eget massa. Lorem ipsum dolor sit amet, consectetur adi', '2017-03-24'),
(6, 'dev', 'Vraagje', 'Werkt u website eigenlijk?', '2017-03-26'),
(7, 'dev', 'Vraagje', 'Werkt u website eigenlijk?', '2017-03-26'),
(8, 'dev', 'Zieke ziever', 'waarom werkt u website zo goed?!', '2017-03-27'),
(9, 'dev', 'Zieke ziever', 'waarom werkt u website zo goed?!', '2017-03-27'),
(10, 'dev', 'Berichtje', 'U website fucking suckt legit', '2017-04-06'),
(11, 'dev', 'Berichtje', 'U website fucking suckt legit x2', '2017-04-06'),
(12, 'dev', 'Berichtje', 'U website fucking suckt legit x2', '2017-04-06'),
(13, 'dev', 'Berichtje', 'U website fucking suckt legit x2', '2017-04-06'),
(14, 'dev', 'RObbe vindt da hij knap is', 'Robbe, ik wil da ge da weet ma ge zijt echt een fucking heet beest', '2017-04-06'),
(15, 'dev', 'Tristan Webshopekee', 'Ik wil is zien of dit werkt!', '2017-04-06'),
(16, 'dev', 'Test', 'test123', '2017-04-06'),
(17, 'dev', 'contact', 'ik neem contact op', '2017-04-06'),
(18, 'dev', 'Tristan', 'Ik wil je website kopen', '2017-04-06'),
(19, 'dev', 'Contact', 'Mag ik contact opnemen?', '2017-04-06'),
(20, 'dev', 'Vdddd', ',yyt,y,ty,', '2017-04-06'),
(21, 'dev', 'Vdddd', ',yyt,y,ty,', '2017-04-06'),
(22, 'dev', 'Vdddd', ',yyt,y,ty,', '2017-04-06'),
(23, 'dev', 'U website suckt', 'xaZGFEGEZG', '2017-04-06'),
(24, 'dev', 'xxD', '??', '2017-04-06'),
(25, 'dev', 'xD', '''''''''''', '2017-04-06'),
(26, 'koenbomans', 'Hallo', 'Hallo', '2017-04-06'),
(27, 'koenbomans', ' Probleem spreekbeurt', 'Beste mevrouw Peters\r\n\r\nMorgen zal ik mijn spreekbeurt over\r\nmilieu niet kunnen houden, omdat ik naar\r\nde dokter moet. Kan ik die spreekbeurt\r\nverplaatsen naar volgende les?\r\n\r\nHartelijk dank!\r\n\r\nBart Slypers\r\n3LAa', '2017-04-07'),
(28, 'dev', 'Vdddd', 'agzeaegzeb', '2017-04-10'),
(29, 'dev', 'Vdddd', 'Ã¨!olÃ¨ol', '2017-04-10'),
(33, 'Kristel Bomans', 'xD', 'xDDDDDDDDDDDDD', '2017-04-12'),
(36, 'dev', 'xd', 'xddd', '2017-04-19'),
(37, 'dev', 'U website suckt', 'erhbnb n', '2017-04-19'),
(38, 'Tristan  Bomans', 'LOL', '???', '2017-04-19'),
(39, 'Tristan  Bomans', 'tr', 'trtr', '2017-04-19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE IF NOT EXISTS `producten` (
`id` int(11) NOT NULL,
  `cat_naam` varchar(20) NOT NULL,
  `naam` varchar(500) NOT NULL,
  `prijs` float NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `datum_toegevoegd` date NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `uitgelicht` tinyint(1) NOT NULL DEFAULT '0',
  `avg_rating` float NOT NULL DEFAULT '0',
  `numb_ratings` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `cat_naam`, `naam`, `prijs`, `beschrijving`, `datum_toegevoegd`, `img_path`, `uitgelicht`, `avg_rating`, `numb_ratings`, `active`) VALUES
(4, 'Multi Media', 'iPhone 7', 50, 'iPhone 7 dramatically improves the most important aspects of the iPhone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iPhone. Immersive stereo speakers. The brightest, most colorful iPhone display. Splash and water resistance.1 And it looks every bit as powerful as it is. This is iPhone 7.', '2017-03-08', '../Resources/iPhone7.png', 1, 8.5, 2, 1),
(5, 'Multi Media', 'Samsung Galaxy S7', 919.95, 'So, Finally Samsung Galaxy S7 Series Smartphoneï¿½s are released and Yes they are really impressive. Both device are now available for sale. Take a look on design and curves of Samsung Galaxy S7 | S7 Edge from Samsungï¿½s official Youtube channel here:\r\n\r\nWhat if your next phone could take photos like a professional?\r\nWhat if it worked in low light?\r\nWhat if it gave you enough expandable memory to store all your pictures?', '2016-09-12', '../Resources/GalaxyS7.jpg', 0, 0, 0, 1),
(6, 'Multi Media', 'OnePlus 3T', 347, 'The OnePlus 3T delivers the best user experience, thanks to the latest hardware upgrades and carefully tested software enhancements.', '2015-08-13', '../Resources/OnePlus.png', 1, 9, 1, 1),
(7, 'Brol', 'HTC 10', 750.78, 'THE POWER OF 10\r\n\r\nHTC 10. Alles wat jij zoekt in een toonaangevende telefoon; ongeï¿½venaarde prestaties, geweldig 24-bits Hi-Res audio, ï¿½s werelds eerste voor- en hoofdcamera met optische beeldstabilisatie (OIS) en een van de hoogste scores voor telefooncamera ooit van DxOMark. Alles in een prachtig gevormd metalen behuizing.', '2017-06-15', '../Resources/htc10.png', 1, 4.55556, 9, 0),
(8, 'Multi Media', 'Samsung Galaxy A5 Zwart (2016)', 321, 'Schitterende combinatie van glas en metaal\r\nDe nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', '2017-08-16', '../Resources/samsunga5.png', 0, 4, 8, 1),
(9, 'Multi Media', 'Apple iPhone 5s Spacegrijs 16GB ', 320, 'Een technologisch pareltje\r\nDe iPhone is altijd al een voorloper geweest. En voor de iPhone 5s is dit niet anders : een technologisch pareltje die nog beter presteert. Zonder in te boeten aan batterijduur natuurlijk.', '2017-03-24', '../Resources/iphone5.png', 1, 10, 1, 1),
(10, 'Brol', 'Wiko Sunny Turkoois', 1, 'DE LEUKSTE!\r\nWil je een smartphone die super makkelijk te hanteren en te gebruiken is, maar zoek je ook een zoet ontwerp en een vleugje waanzin? We hebben het! SUNNY is de perfecte dagelijkse vriend met een compact formaat en leuke kleuren. Hoe zit het met de camera? Nou, 5MP en leuke opties om je beste momenten vast te leggen. En hebben we al Marshmallow 6.0. gezegd? Ja, ook dat heeft de SUNNY!', '2017-03-24', '../Resources/brol.png', 1, 6, 1, 1),
(11, 'Multi Media', 'Huawei P8 Titanium', 280, 'Designed to inspire\r\nDe nieuwe Huawei P8 laat zien dat design en techniek geen concessies voor elkaar hoeven te doen. Deze high-end smartphone is gemaakt met uitsluitend premium materialen en heeft een uniek ï¿½gelaagdï¿½ ontwerp. Het resultaat: esthetische lijnen die leiden tot pure schoonheid en innovaties die je creativiteit een boost zullen geven.', '2002-01-08', '../Resources/huawei.png', 1, 8, 1, 1),
(15, 'Multi Media', 'Samsung iPhone 3', 573.42, 'xDDDx', '2017-03-14', '../Resources/dummypng.png', 0, 0, 0, 1),
(19, 'Multi Media', 'Jan Wante', 5, 'Dit is een geweldige leerkracht en je krijgt er â‚¬5 bovenop!', '2017-03-16', '../Resources/10275580_10154117497140440_3031077272733934198_o.jpg', 0, 1, 1, 1),
(21, 'hacket', 'Gladiatus', 478.41, 'Gladiatus is a free online real-time strategy game released in 2007 by Gameforge AG.', '2017-03-26', '../Resources/Awesome Gladiatus Icoontje.png', 1, 0, 0, 1),
(22, 'Snelle kars', 'Audi RS6 Avant 4.0 TFSi 412kW Tiptronic quattro (2017)', 40000, 'Motor Configuratie In V Cilinderinhoud (cm3) 3993 Brandstof Benzine Voeding Turbo Kw/pk 412/560 Koppel 700 Overbrenging 4x4 Versnellingsbak Auto. 8 bak Emissienorm E6 CO2-uitstoot 223 Fiscaal vermogen 20 - See more at: http://www.autogids.be/model-type-jaar--audi--rs6-avant--2017/technische-kenmerken--2819--4-0-tfsi-412kw-tiptronic-quattro.html#sthash.qirwW0cG.dpuf', '2017-03-27', '../Resources/audi_rs6_abt_wagon_2013_94088_2560x1080.jpg', 0, 8, 3, 1),
(30, 'Snelle kars', 'Peugeot 207 CC', 35400.9, 'De Peugeot 207 is een compacte klasse personenauto, geproduceerd door de Franse autofabrikant Peugeot van 2006 tot 2014. Het model werd gepresenteerd in januari 2006 en kwam naar Europa in April 2006. Het model werd in 2012 opgevolgd door de Peugeot 208. Vanaf 2012 tot 2014 werd de 207+ nog geproduceerd voor een aantal landen, daarna viel het doek. De 207 CC bleef tot 2015 leverbaar.', '2017-04-13', '../Resources/Jens swag.png', 0, 0, 0, 1),
(31, 'Snelle kars', 'Peugeot Partner Tepee', 12471, 'De Peugeot Partner is een ludospace van het Franse automerk Peugeot. In ItaliÃ« wordt de auto Peugeot Ranch genoemd. De Partner is ontworpen in samenwerking met CitroÃ«n; de versie van CitroÃ«n heet Berlingo. Zowel de Berlingo als de Partner hebben een CNG en BEV (Battery electric vehicle) uitvoering.', '2017-04-13', '../Resources/tobi swag.png', 0, 0, 0, 1),
(32, 'Snelle kars', 'Nissan Note', 26000.9, 'De Nissan Note is een automodel van het merk Nissan. Het betreft hier een zogenaamde mini-MPV, maar de wagen positioneert zich tussen het zogenaamde B-segment en C-segment. De auto werd in april 2005 geÃ¯ntroduceerd in BelgiÃ« en is verkrijgbaar met benzine- (1.4l en 1.6l) en dieselmotoren (2 1.5l varianten). De auto werd ontwikkeld op basis van het prototype Tone dat in 2004 op het Autosalon van Parijs voorgesteld werd.', '2017-04-13', '../Resources/dddd.png', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `product_id`, `comment`, `rating`) VALUES
(24, 'dev', 8, 'Goeie GSM', 8),
(25, 'dev', 8, 'Super gsm', 7),
(26, 'devke', 4, 'Schitterende combinatie van glas en metaal De nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', 8),
(27, 'devke', 4, 'Super gsm', 9),
(28, 'dev', 19, 'nee.', 1),
(29, 'dev', 9, 'Schitterende combinatie van glas en metaal De nieuwe premium Galaxy A5 is een combinatie van stevig metaal en prachtig Gorilla Glass. Je geniet van een stabiele en comfortabele grip dankzij het slanke ontwerp.', 10),
(30, 'dev', 8, 'wel nice', 8),
(31, 'dev', 8, 'xD', -1),
(32, 'kaka', 22, 'topkar', 10),
(34, 'dev', 6, 'Bucht fone', 9),
(35, 'neukmeester69', 22, 'nice', 10),
(36, 'neukmeester69', 22, 'kancer', 4),
(38, 'dev', 8, ':)', 1),
(39, 'dev', 8, 'nog een review', 1),
(40, 'root', 7, 'Redelijke bucht', 1),
(41, 'root', 11, 'Redelijke bucht', 8),
(42, 'dev', 7, '?', 2),
(43, 'dev', 10, 'Is wel okÃ© ', 6),
(45, 'Kristel Bomans', 7, 'xD', 1),
(47, 'root', 7, 'cv', 2),
(50, 'root', 7, 'Goede gsm ', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `authority` int(11) NOT NULL,
  `emailadres` varchar(100) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`username`, `password`, `naam`, `voornaam`, `authority`, `emailadres`, `img_path`, `active`) VALUES
('Colien  Vanstokstraeten', '', ' Vanstokstraeten', 'Colien', 0, '', '../Resources/profilepics/fb-1257848837662115.jpg', 1),
('Colien Vanstokstraeten', '', 'Vanstokstraeten', 'Colien', 0, '', '0', 1),
('dev', '$2y$10$8pRBSo2Hx3Rx6pscq6jwju0h1xMW.W7Bu2s3QIJTf7HNCcvBjjZfK', 'Bomanzz x3333', 'Trizdank', 1, 'tristan.bomans@telenet.be', '0', 1),
('devke', '$2y$10$vy1DwMwNUIEPWSTaNsk1JOGag8SNLz12cBsiEFraxbzVVFkIdNn9C', 'Bomansss', 'Tristan', 0, 'tristan.bomans@telenet.be', '0', 1),
('kaka', '$2y$10$4STSHCryLzE3SwQbJ.Jb7eYmbu1.zBrMW9sfneIiC9JDYmMrKPfvW', 'kaka', 'kaka', 0, 'mickey-moustache@hotmail.com', '0', 1),
('Koen Bomans', '', 'Bomans', 'Koen', 0, 'koen.bomans@telenet.be', '../Resources/profilepics/fb-1418675281504700.jpg', 1),
('koenbomans', '$2y$10$rezhk4mdmu4lfHMaQsXZn.8bARjcAGblx6lo6PUR9URC/clsofUKC', 'Koen', 'Bomans', 0, 'koen.bomans@telenet.be', '0', 1),
('Kristel Bomans', '', 'Bomans', 'Kristel', 0, 'tristan.bomans@telenet.be', '../Resources/profilepics/fb-1867729989919195.jpg', 1),
('Nathan Bomans', '', 'Bomans', 'Nathan', 0, 'naatds@hotmail.com', '../Resources/profilepics/fb-1042875865844981.jpg', 1),
('neukmeester69', '$2y$10$E1xwshKHdmuOJerC4x1yVuZ/UlKGQdlcajXjE8.e6QCn4ADyopvpa', 'neuk', 'meester', 0, 'haha xd', '0', 1),
('Robbe  Van Hemelryck', '', 'Van Hemelryck', 'Robbe', 0, 'mickey-moustache@hotmail.com', '../Resources/profilepics/fb-1722437711105821.jpg', 1),
('root', '$2y$10$J2kxGFeOX6ARJSWBZDd.tOtZGUuk0hgUS7yVvMtVTn1lH19gydb26', 'xd', 'xd', 0, 'xd@hotmail', '0', 1),
('Tristan  Bomans', '', ' Bomans', 'Tristan', 1, 'lolman550@hotmail.com', '../Resources/profilepics/fb-1439878472699039.jpg', 1),
('tristan550505', '$2y$10$IXr3ja8gxkFZlUmPYj4vpepIg3bb/0kUGbA/WfxDPljZEDPlgwqnG', 'Bomans', 'Tristan', 0, 'tristan.bomans@telenet.be', '0', 1),
('xx', '$2y$10$hIhywtH4l46NH18W250NiOTNp9EauSGmzw5jrilowyK1YqxlyajxG', 'xx', 'xx', 0, 'xx@xx', '1', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelinhoud`
--
ALTER TABLE `bestelinhoud`
 ADD PRIMARY KEY (`id`), ADD KEY `bestelling_id` (`bestelling_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_user_name_2` (`username`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`naam`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
 ADD PRIMARY KEY (`id`), ADD KEY `cat_naam` (`cat_naam`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`username`), ADD KEY `product_id` (`product_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelinhoud`
--
ALTER TABLE `bestelinhoud`
ADD CONSTRAINT `fk_bestelling_id` FOREIGN KEY (`bestelling_id`) REFERENCES `bestellingen` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_prod_3` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
ADD CONSTRAINT `fk_user_name_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `fk_username_contact` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_naam`) REFERENCES `categorie` (`naam`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `fk_user_name` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_prod` FOREIGN KEY (`product_id`) REFERENCES `producten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
