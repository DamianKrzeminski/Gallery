-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2024, 18:21
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gallery_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(1, 7, 'Damian', 'First Comment'),
(2, 9, 'wqde', 'wqerewr'),
(3, 27, 'afwf', 'awfdawf'),
(4, 27, 'dsagsd', 'asdgads');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `user_id`) VALUES
(26, 'w', '', '', 'images-50.jpg', '', 'image/jpeg', 21652, 19),
(27, 'e', '', '', 'images-44.jpg', '', 'image/jpeg', 29486, 19),
(28, 'r', '', '', 'images-42.jpg', '', 'image/jpeg', 22401, 19),
(29, 't', '', '', 'images-22.jpg', '', 'image/jpeg', 21133, 19),
(30, 'a', '', '', 'images-12.jpg', '', 'image/jpeg', 18540, 20),
(31, 's', '', '', 'images-13.jpg', '', 'image/jpeg', 22082, 20),
(32, 'd', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, 20),
(33, 'f', '', '', 'images-17.jpg', '', 'image/jpeg', 22792, 20),
(34, 'g', '', '', 'images-23.jpg', '', 'image/jpeg', 22792, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `user_image`, `role`) VALUES
(19, 'QuÃ¡zar', '$2y$10$KUpm.4txsibbZx7LXxhAAuhhHrEc6cBbrnn6QT0r1hf3lWbKe1rru', 'damian.krzeminski13@gmail.com', 'Damian', 'KrzemiÅ„ski', 'images-4.jpg', 'Admin'),
(20, 'QuÃ¡zarS', '$2y$10$84VhJN.8ANcPPoTEJax.reOFzDE2Hm3nvsdAiARfVZpyAimHPz7R.', 'damian.krzeminski13@gmail.com', 'Damian', 'KrzemiÅ„ski', 'images-3.jpg', 'Subscriber'),
(21, 'new', '$2y$10$IARlnqoI2LJlP3Ha4l7XG.w1gfrHKtatXMl.RJZXOwNDOOUFyqkwS', 'damian.krzeminski13@gmail.com', 'QuÃ¡zar', 'KrzemiÅ„ski', '', 'Admin'),
(22, '', '$2y$10$93f7pcx4972jJ.Hk9UW6AuYeOeHC3BBqMlvbf6MK.3cV.Fni46WOG', '', '', '', '', 'Subscriber'),
(23, '', '$2y$10$7AvHOM/3jkeEZqIMsXdr5.rmhQ2VBBIdLORp3yCcfUEGKYD3CCIpm', '', '', '', '', 'Subscriber'),
(24, '', '$2y$10$gOyalsC01n9F/f0w7hFCzuALrVPAY8ixeOVEeEluVG9A6lARglTtu', '', '', '', '', 'Subscriber'),
(25, '', '$2y$10$eqoF4XPcPq6seHsulwtFt.9.R4fAxsCUAPvAZZqoq45POizCDl6oW', '', '', '', '', 'Subscriber'),
(26, '', '$2y$10$Gu.10sT8QuWrCPjQ97XIau9hwS.Pph2vPMIKprP9Fc./l.lsMmmBq', '', '', '', '', 'Subscriber'),
(27, '', '$2y$10$0epk.gKVB7txXQBZh4cBEeoHL5.cp6PpjpzScMjZ6Qq6Wm0BFL3zC', '', '', '', '', 'Subscriber'),
(28, '', '$2y$10$p4dqmJMwFzYs1OInhqCQduvaACd90SgeRWITmGddKHW.G9rQg7Q62', '', '', '', '', 'Subscriber'),
(29, '', '$2y$10$c6ojevFmE6qxgX6rMm.pluK7GEnUyiM/oAXX0qHAmHYZKEizIIwL6', '', '', '', '', 'Subscriber'),
(30, '', '$2y$10$ZAX4IEdbCAhCTdQw1ejjFuvKXW6woAGGfuMlfqN4rxFlIcx5f32mG', '', '', '', '', 'Subscriber'),
(31, '', '$2y$10$OTqcmWa4VV5g0zHTSxXzyuXaB7fzb4YsGQvpHm/haEhz.EAsRbIl.', '', '', '', '', 'Subscriber'),
(32, '', '$2y$10$KkSqVl/lo9an.H7RI9KBFu8JiOQ4pYfHLoqj02oCLVVy6KmBLpxha', '', '', '', '', 'Subscriber'),
(33, '', '$2y$10$tJUHU1LhwVz9cjYGvuBz0eJamElYLFYEhwKb4yH7wNnpCxYgfFYam', '', '', '', '', 'Subscriber'),
(34, '', '$2y$10$QnN3WdfaEHAjwPExyDSRiu0OpOVWyPCObXZtp9JO/B83lOKAieksS', '', '', '', '', 'Subscriber'),
(35, '', '$2y$10$d2AlOrqorFW5Ao2gKkSIHu0k1PqCNWKUY6NIA6vkAGePVs.MgtZuq', '', '', '', '', 'Subscriber'),
(36, '', '$2y$10$fGdSBO4B2ziH6Fb1wWVJEuUzu/wWhN9jKwOjxCaeMVIFp/HYdLtB.', '', '', '', '', 'Subscriber'),
(37, '', '$2y$10$jIgfu1sj3VD5TyF7rniiv.4npRtjcCF2Qo8CDAM8TTZOQLzs1QVeu', '', '', '', '', 'Subscriber'),
(38, '', '$2y$10$RggEpJ9VhAYwZaZ2TXJc9.O59jNvi/FeDZNAk9cdT2D5SEBcmXMji', '', '', '', '', 'Subscriber'),
(39, '', '$2y$10$1DcJ5MJmSMcJODxbqIxQBuAxjH9jn5dFCGEOUb5JpjCqrYEMyfOYS', '', '', '', '', 'Subscriber'),
(40, '', '$2y$10$amK0kfF45qII1Py7Ks8UaeTN45RapkCPNL9LXo9CSQCtpgw7JMLYi', '', '', '', '', 'Subscriber');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
