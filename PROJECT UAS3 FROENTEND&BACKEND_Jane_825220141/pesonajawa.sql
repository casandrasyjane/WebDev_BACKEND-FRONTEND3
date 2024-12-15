-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:24 AM
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
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` varchar(200) NOT NULL,
  `destinasiFOTO` char(255) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('D007', 'Pulau Dewata', 'Dewata Bali dengan Sunsetnya yang Indah dan menawan', '3.jpeg', 'D000'),
('J001', 'Goa Rancang', 'Indahnya pemandangan alam wisata Goa Rancang di Yogyakarta', 'goarancang.jpg', 'JOG1'),
('K001', 'Kembangan', 'Wisata Indah Desa Kembangan', 'candisari1.jpg', 'JOO6'),
('P222', 'Labuan Bajo', 'Wisata Alam Labuan Bajo', 'labuanbajo.jpg', 'JOG1');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('JOO6', 'Janumet', 'janumet.png', ''),
('M251', 'Metformin', 'metformin.png', ''),
('M256', 'Mylanta', 'mylanta.png', ''),
('P001', 'Promaag', 'Promag_Tablet.jpg', ''),
('T001', 'LUM', 'kapsul.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(120) NOT NULL,
  `hotelALAMAT` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelALAMAT`) VALUES
('M981', 'Mercure', 'Jakarta Selatan'),
('P871', 'Pullman', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `jane`
--

CREATE TABLE `jane` (
  `berita0141` char(4) NOT NULL,
  `beritaJUDUL` char(120) NOT NULL,
  `kategoriberitajane` char(225) NOT NULL,
  `event0141` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jane`
--

INSERT INTO `jane` (`berita0141`, `beritaJUDUL`, `kategoriberitajane`, `event0141`) VALUES
('J091', 'Jennie Blackpink mirip Jane Sandra', 'Hot News', 'Fakta Blackpink'),
('N092', 'Nando mirip Kairi', 'Fake News', 'Hoax'),
('P002', 'Putri Kece', 'Fake News', 'Hoax');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriberita`
--

CREATE TABLE `kategoriberita` (
  `kategoriberitaKODE` varchar(4) NOT NULL,
  `kategoriberitaNAMA` varchar(120) NOT NULL,
  `kategoriberitaKET` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(225) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('D000', 'Pulau Dewata', 'Keindahan Pulau Dewata Bali', 'D007'),
('JOG1', 'Wisata Jogja', 'Daftar Wisata Di Jogja', 'J001'),
('JOO6', 'Desa Kembangan', 'Wisata Indah Desa Kembangan', 'J406');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `kulinerKODE` char(4) NOT NULL,
  `kulinerNAMA` char(120) NOT NULL,
  `kulinerGAMBAR` char(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`kulinerKODE`, `kulinerNAMA`, `kulinerGAMBAR`) VALUES
('B000', 'Burger', 'satu.jpeg'),
('B001', 'Bakpao', 'enam.jpeg'),
('CU22', 'Cumi Saus Padang', 'cumisauspadang.jpg'),
('L981', 'Dimsum', 'uwu.jpeg'),
('P001', 'Sandwich', 'dua.jpeg'),
('U819', 'Katsu', 'hmm.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `obatKODE` char(4) NOT NULL,
  `obatNAMA` char(120) NOT NULL,
  `obatGAMBAR` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sandra`
--

CREATE TABLE `sandra` (
  `sandraID` char(200) NOT NULL,
  `sandraKOTA` char(120) NOT NULL,
  `destinasiFOTO` char(225) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sandra`
--

INSERT INTO `sandra` (`sandraID`, `sandraKOTA`, `destinasiFOTO`, `destinasiKODE`) VALUES
('ID222', 'Jombang', '2.jpeg', 'D007'),
('ID78', 'Bali', 'batuan.jpg', 'K001'),
('ID92', 'Wayag', 'bromo.jpg', 'J001');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `transportasiKODE` char(4) NOT NULL,
  `transportasiJENIS` char(255) NOT NULL,
  `travelKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`transportasiKODE`, `transportasiJENIS`, `travelKODE`) VALUES
('A000', 'Pesawat', 'AT00'),
('G001', 'Kereta Api', 'GB00');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` char(4) NOT NULL,
  `travelNAMA` char(120) NOT NULL,
  `travelFILE` char(120) NOT NULL,
  `tempatNAMA` char(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `travelNAMA`, `travelFILE`, `tempatNAMA`) VALUES
('AT00', 'Wisata Alam', 'airterjunlepo.jpg', 'Air Terjun Lepo'),
('B092', 'Bojong Escape', 'island.jpg', 'Bojong Indah'),
('GB00', 'Eksplor ID', 'gunungbatur.jpg', 'Gunung Batur');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('a', 'a', 'a@a.a', 'aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelKODE`);

--
-- Indexes for table `jane`
--
ALTER TABLE `jane`
  ADD PRIMARY KEY (`berita0141`);

--
-- Indexes for table `kategoriberita`
--
ALTER TABLE `kategoriberita`
  ADD PRIMARY KEY (`kategoriberitaKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`kulinerKODE`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`obatKODE`);

--
-- Indexes for table `sandra`
--
ALTER TABLE `sandra`
  ADD PRIMARY KEY (`sandraID`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`transportasiKODE`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
