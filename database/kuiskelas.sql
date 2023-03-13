-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2023 pada 02.15
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuiskelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `judul` varchar(125) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `id_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `judul`, `deskripsi`, `id_pengajar`) VALUES
(1, 'Test Matematika', 'Test Matematika kelas 11', 1),
(2, 'Ulangan Harian Bahasa Indonesia', 'Ulangan Harian Bahasa Indonesia kelas 10 semester 2', 1),
(3, 'Ulangan Harian Bahasa Inggris', 'Ulangan Harian Bahasa Inggris kelas XI RPL 2 semester 1.', 1),
(4, 'Ulangan Desain Grafis Beginner', 'Ulangan materi desain grafis dari dasar. Nilai disertakan pada sertifikat pengujian.', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama`, `email`, `password`) VALUES
(1, 'Rahmat Rendy Prayogo', 'rahmatprayogo12@gmail.com', '$2y$10$6WH7Ibw4iQi6Z2MJE4A8y.4XfQcoWoV65RTvwy1jF4VC2CKxc1jVy'),
(2, 'Hamzah Haz', 'brotherhaz@gmail.com', '$2y$10$OU6PYn.gKG8Pi2WOhaVznOWRCW7tLhljTv9HQmNdS32ylE2u8rH.C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai_kuis` int(45) NOT NULL,
  `jawaban_benar` int(45) NOT NULL,
  `jawaban_salah` int(45) NOT NULL,
  `waktu_penilaian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_kuisioner`, `id_siswa`, `nilai_kuis`, `jawaban_benar`, `jawaban_salah`, `waktu_penilaian`) VALUES
(25, 2, 1, 10, 0, 0, '0000-00-00 00:00:00'),
(26, 1, 1, 10, 0, 0, '0000-00-00 00:00:00'),
(27, 2, 1, 10, 0, 0, '2022-07-05 20:26:24'),
(28, 2, 1, -30, 0, 0, '2022-07-05 20:45:58'),
(29, 1, 1, 10, 2, 1, '2022-07-05 20:51:34'),
(30, 1, 1, 10, 2, 1, '2022-07-15 11:01:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelas`, `email`, `password`) VALUES
(1, 'Halimatus Syahdiyah', '5', 'syahdiyah511@gmail.com', '$2y$10$6WH7Ibw4iQi6Z2MJE4A8y.4XfQcoWoV65RTvwy1jF4VC2CKxc1jVy'),
(9, 'Ilman Maula', '12', 'ilman@gmail.com', '$2y$10$00/Yfc8PEvezvqnIPUG/dOFWWGJZ9sJKN1qkOmd7SUDzN/QoqYuIy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `pertanyaan` varchar(125) NOT NULL,
  `jawaban_a` varchar(125) NOT NULL,
  `jawaban_b` varchar(125) NOT NULL,
  `jawaban_c` varchar(125) NOT NULL,
  `jawaban_d` varchar(125) NOT NULL,
  `jawaban_benar` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_kuisioner`, `pertanyaan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_benar`) VALUES
(5, 2, 'Apabila?', 'iyakah', 'afakah', 'betul', 'valid', 'd'),
(6, 1, 'jika x + 2 = 4, berapa nilai x?', '2', 'kurang yakin', '5', '8', 'a'),
(10, 2, 'Suatu saat budi pergi ke rumah temannya, udin. Mereka ada janji pergi bersama mendaki gunung. Dimanakah dimas sekarang?', 'Di gunung', 'Di rumah udin', 'Di sawah', 'Terserah dimas', 'd'),
(11, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent congue imperdiet ligula, ut sagittis nibh tempus id. Pr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent congue imperdiet ligula, ut sagittis nibh tempus id.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, ', 'Lorem ipsum', 'a'),
(12, 2, 'Sinonim dari kurang dimengerti?', 'sulit dimengerti semoga harimu bahagia', 'YNTKTS', 'cukup tw', 'yang bener...', 'a'),
(13, 1, 'bagaimana perbedaan x, y dan z berdasarkan grafik?', 'kurang tau', '400.000', 'yang bener', 'uwaaaw', 'a'),
(16, 3, 'hello world adalah...', 'halo dunia', 'kurang yakin', 'yang bener', 'afa iyahh', 'a'),
(18, 4, 'Berikut yang merupakan software desain grafis, kecuali...', 'Coreldraw', 'Paint', 'Photoshop', 'Chrome', 'd'),
(19, 4, 'Berikut adalah software untuk membuat desain bitmap, adalah...', 'Photoshop', 'Coreldraw', 'Paint', 'MS. Word', 'a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`,`id_pengajar`),
  ADD KEY `fk_kuisioner_pengajar_idx` (`id_pengajar`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_siswa_has_kuisioner_kuisioner1_idx` (`id_kuisioner`),
  ADD KEY `fk_siswa_has_kuisioner_siswa1_idx` (`id_siswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_table1_kuisioner1` (`id_kuisioner`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `fk_kuisioner_pengajar` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_siswa_has_kuisioner_kuisioner1` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id_kuisioner`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_siswa_has_kuisioner_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_table1_kuisioner1` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id_kuisioner`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
