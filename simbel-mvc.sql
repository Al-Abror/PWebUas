-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jun 2021 pada 19.39
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbel-mvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `grade`) VALUES
(1, 'Ilmu Pengetahuan Alams', 'Kursus untuk mendalami ilmu pengetahuan alam IPA jenjang SMA', 'SMA'),
(5, 'Matematika', 'Kursus untuk mendalami Matematika jenjang SMA', 'SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_members`
--

CREATE TABLE `course_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `course_members`
--

INSERT INTO `course_members` (`id`, `user_id`, `course_id`) VALUES
(20, 3, 1),
(26, 2, 1),
(27, 23, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `module_file` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `description`, `module_file`, `course_id`) VALUES
(1, 'Bab 1. Pendahuluan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec congue velit. Mauris quam ante, faucibus sed sollicitudin sit amet, vehicula nec elit. Aliquam sit amet tellus id arcu tempus aliquam. Nulla luctus condimentum dolor nec laoreet. Sed quis turpis ut urna venenatis molestie. Aliquam erat volutpat. Nulla a cursus nisl, vitae gravida leo. Nam elementum aliquet odio a eleifend. Aliquam accumsan ante eget dolor feugiat, in congue tortor dapibus. Aenean sem turpis, laoreet at tellus et, egestas efficitur sem. Suspendisse faucibus commodo metus, et feugiat diam vestibulum eu. Morbi sed est nec nisi gravida commodo. Cras tristique hendrerit eros a luctus. Maecenas lacinia lacus non lorem sodales, vitae tempor diam fermentum. Proin quis est tristique, cursus erat et, maximus tortor.', 'GIS - Geoprocessing.pdf', 1),
(2, 'Bab 2. Mengenal Flora dan Fauna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec congue velit. Mauris quam ante, faucibus sed sollicitudin sit amet, vehicula nec elit. Aliquam sit amet tellus id arcu tempus aliquam. Nulla luctus condimentum dolor nec laoreet. Sed quis turpis ut urna venenatis molestie. Aliquam erat volutpat. Nulla a cursus nisl, vitae gravida leo. Nam elementum aliquet odio a eleifend. Aliquam accumsan ante eget dolor feugiat, in congue tortor dapibus. Aenean sem turpis, laoreet at tellus et, egestas efficitur sem. Suspendisse faucibus commodo metus, et feugiat diam vestibulum eu. Morbi sed est nec nisi gravida commodo. Cras tristique hendrerit eros a luctus. Maecenas lacinia lacus non lorem sodales, vitae tempor diam fermentum. Proin quis est tristique, cursus erat et, maximus tortor.', 'GIS - Geoprocessing.pdf', 1),
(3, 'Bab 3. Percobaan ', 'adasdasdasd', 'Bab 3. Percobaan .pdf', 1),
(7, 'Bab 4. Uji Coba s', 'uji coba bos test', 'Bab 4. Uji Coba.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member',
  `join_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `role`, `join_at`) VALUES
(1, 'Administrator', 'administrator', 'admin@simbel.com', '$2y$10$2oiESyfrYkBk0.p.opI/NOYjf0Vp6eQ9qrATu/JwjPwYyBCTUzOyy', 'admin', '2021-06-10 08:06:07'),
(2, 'M Farhan', 'farhan', 'farhan@simbel.com', '$2y$10$N3Sj6evu9bTTUC2ck40aOeAMbzFsqMvvGM/SaUsJtGqGTJRuRyMLm', 'member', '2021-06-15 16:36:16'),
(3, 'Member Setia', 'member', 'member@email.com', '$2y$10$N3Sj6evu9bTTUC2ck40aOeAMbzFsqMvvGM/SaUsJtGqGTJRuRyMLm', 'member', '2021-06-12 10:22:57'),
(23, 'Muhammad Farhan Al Abror', 'farhanalabror', 'farhan.alabror@gmail.com', '$2y$10$xMdx3LafEwcYrM6fyf.P5.07FKxHggFQnzMfEYja7FMPfU9x0dihG', 'member', '2021-06-17 06:47:34'),
(24, 'M Farhan Zein', 'farzein', 'farzein@gmail.com', '$2y$10$97H6tz3ov6am0K29AFup4usAez0683eaLp5FJZayMyvo5sZnwVYl6', 'member', '2021-06-17 06:51:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indeks untuk tabel `course_members`
--
ALTER TABLE `course_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_member` (`user_id`),
  ADD KEY `fk_course_item` (`course_id`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `fk_course_module` (`course_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `course_members`
--
ALTER TABLE `course_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `course_members`
--
ALTER TABLE `course_members`
  ADD CONSTRAINT `fk_course_item` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_course_member` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_course_module` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
