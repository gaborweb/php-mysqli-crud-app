-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 05. 14:16
-- Kiszolgáló verziója: 10.1.39-MariaDB
-- PHP verzió: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `registrationhandler`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `registeredpeople`
--

CREATE TABLE `registeredpeople` (
  `id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `hobby` varchar(200) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `registeredpeople`
--

INSERT INTO `registeredpeople` (`id`, `name`, `email`, `gender`, `address`, `hobby`, `country`) VALUES
(1, 'Leo Nardo', 'leo@gmail.com', 'male', 'Hamburg', 'music,games', 'Germany'),
(2, 'Michel Angelo', 'angelo@gmail.com', 'male', 'Canberra', 'games,travel', 'Australia'),
(3, 'Dona Tello', 'dona@gmail.com', 'female', 'Brighton', 'movies', 'England');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `registeredpeople`
--
ALTER TABLE `registeredpeople`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `registeredpeople`
--
ALTER TABLE `registeredpeople`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
