-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2024 pada 18.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_kevin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `persen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Islam', '2023-11-05 15:32:07', NULL, NULL),
(2, 'Kristen', '2023-11-05 15:32:07', NULL, NULL),
(3, 'Katolik', '2023-11-05 15:32:07', NULL, NULL),
(4, 'Hindu', '2023-11-05 15:32:07', NULL, NULL),
(5, 'Buddha', '2023-11-05 15:32:07', NULL, NULL),
(6, 'Konghucu', '2023-11-05 15:32:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(11) NOT NULL,
  `nama_b` varchar(255) NOT NULL,
  `statuss` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blok`
--

INSERT INTO `blok` (`id_blok`, `nama_b`, `statuss`, `semester`, `created_at`) VALUES
(2, '1', 'Aktif', 1, '2023-10-15 02:06:42'),
(3, '2', 'Tidak-Aktif', 1, '2023-10-15 02:06:43'),
(4, '3', 'Tidak-Aktif\r\n', 1, '2023-10-15 02:06:44'),
(5, '4', 'Tidak-Aktif\r\n', 1, '2023-10-15 02:06:45'),
(6, '5', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:46'),
(7, '6', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:47'),
(8, '7', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:48'),
(9, '8', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi_kantor`
--

CREATE TABLE `data_absensi_kantor` (
  `id_absensi` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi_sekolah`
--

CREATE TABLE `data_absensi_sekolah` (
  `id_absensi` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_absensi_sekolah`
--

INSERT INTO `data_absensi_sekolah` (`id_absensi`, `siswa`, `jurusan`, `tanggal`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 2, '2024-04-19', 1, '2024-04-19 18:06:32', '2024-04-19 19:41:11', NULL),
(2, 14, 2, '2024-04-19', 2, '2024-04-19 18:06:32', NULL, NULL),
(3, 13, 4, '2024-04-19', 2, '2024-04-19 18:06:41', NULL, NULL),
(4, 16, 4, '2024-04-19', 3, '2024-04-19 18:06:41', NULL, NULL),
(5, 12, 3, '2024-04-19', 1, '2024-04-19 18:06:47', NULL, NULL),
(6, 15, 3, '2024-04-19', 4, '2024-04-19 18:06:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_agenda`
--

CREATE TABLE `data_agenda` (
  `id_agenda` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `renper_1` text NOT NULL,
  `renper_2` text DEFAULT '-',
  `renper_3` text DEFAULT '-',
  `renper_4` text DEFAULT '-',
  `renper_5` text DEFAULT '-',
  `reape_1` text NOT NULL,
  `reape_2` text DEFAULT '-',
  `reape_3` text DEFAULT '-',
  `reape_4` text DEFAULT '-',
  `reape_5` text DEFAULT '-',
  `pk_1` text NOT NULL DEFAULT '-',
  `pk_2` text DEFAULT '-',
  `pk_3` text DEFAULT '-',
  `pm_1` text DEFAULT '-',
  `pm_2` text DEFAULT '-',
  `pm_3` text DEFAULT '-',
  `senyum` enum('Baik','Kurang') DEFAULT NULL,
  `keramahan` enum('Baik','Kurang') DEFAULT NULL,
  `penampilan` enum('Baik','Kurang') DEFAULT NULL,
  `komunikasi` enum('Baik','Kurang') DEFAULT NULL,
  `realisasi_kerja` enum('Baik','Kurang') DEFAULT NULL,
  `catatan` text DEFAULT '-',
  `kondisi` int(11) DEFAULT NULL,
  `approve_g` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_agenda`
--

INSERT INTO `data_agenda` (`id_agenda`, `siswa`, `tanggal`, `jam_masuk`, `jam_keluar`, `renper_1`, `renper_2`, `renper_3`, `renper_4`, `renper_5`, `reape_1`, `reape_2`, `reape_3`, `reape_4`, `reape_5`, `pk_1`, `pk_2`, `pk_3`, `pm_1`, `pm_2`, `pm_3`, `senyum`, `keramahan`, `penampilan`, `komunikasi`, `realisasi_kerja`, `catatan`, `kondisi`, `approve_g`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, '2024-04-19', '08:00:00', '17:00:00', 'Rakit komputer baru', '-', '-', '-', '-', 'Rakit komputer terselesaikan', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', '-', 1, NULL, '2024-04-19 23:12:13', '2024-04-19 00:00:00', NULL),
(2, 11, '2024-04-20', '08:00:00', '17:00:00', 'Rakit komputer baru', '-', '-', '-', '-', 'Rakit komputer setengah jadi', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', '-', 1, NULL, '2024-04-19 23:12:13', '2024-04-19 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_instruktur`
--

CREATE TABLE `data_instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `nama_instruktur` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_instruktur`
--

INSERT INTO `data_instruktur` (`id_instruktur`, `nama_instruktur`, `nama_perusahaan`, `telepon`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pak Haris', 'Batam Coding', '084512475687', 8, '2024-04-19 13:39:14', '2024-04-19 13:43:46', NULL),
(2, 'Pak Tono', 'Indo Maju', '084679512487', 20, '2024-04-19 22:59:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keterangan`
--

CREATE TABLE `data_keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keterangan`
--

INSERT INTO `data_keterangan` (`id_keterangan`, `nama_keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hadir', '2023-07-19 23:11:49', NULL, NULL),
(2, 'Izin', '2023-07-19 23:12:01', NULL, NULL),
(3, 'Sakit', '2023-07-19 23:12:17', NULL, NULL),
(4, 'Alpa', '2023-07-19 23:12:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rombel` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nik`, `nama`, `rombel`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8001', 'Pak Dedi', 1, 6, '2024-04-19 11:47:23', NULL, NULL),
(2, '8002', 'Pak If', 3, 17, '2024-04-19 19:22:59', NULL, NULL),
(3, '8003', 'Bu Rosita', 22, 18, '2024-04-19 20:39:48', NULL, NULL),
(4, '8004', 'Pak Beni', 21, 19, '2024-04-19 20:40:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_vote`
--

CREATE TABLE `hasil_vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_guru`
--

CREATE TABLE `jabatan_guru` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan_guru`
--

INSERT INTO `jabatan_guru` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kesiswaan', '2024-04-19 10:43:35', NULL, NULL),
(2, 'Kajur', '2024-04-19 10:43:35', NULL, NULL),
(3, 'Guru Pembimbing', '2024-04-19 10:43:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laki - laki', '2023-11-05 15:34:54', NULL, NULL),
(2, 'Perempuan', '2023-11-05 15:34:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMP', '2023-10-02 23:01:48', NULL, NULL),
(2, 'SMK', '2023-10-02 23:01:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'RPL', '2023-10-02 10:56:57', NULL, NULL),
(3, 'AKL', '2023-10-02 11:18:54', NULL, NULL),
(4, 'BDP', '2023-10-03 01:42:21', NULL, NULL),
(5, 'SMP', '2023-10-03 01:44:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `wakil` varchar(255) NOT NULL,
  `wakil2` varchar(255) NOT NULL,
  `visimisi` text NOT NULL,
  `periode_id` int(11) NOT NULL,
  `suara` int(11) NOT NULL,
  `status2` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `maker_kelas` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `maker_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12', '', '2023-10-02 10:56:48', NULL, NULL),
(5, '11', '', '2023-10-03 01:41:46', NULL, NULL),
(7, '10', '', '2023-10-03 01:41:57', NULL, NULL),
(8, '9', '', '2023-10-03 01:42:02', NULL, NULL),
(9, '8', '', '2023-10-03 01:43:32', NULL, NULL),
(14, '7', '', '2023-10-03 01:43:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_perizinan`
--

CREATE TABLE `keterangan_perizinan` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(255) NOT NULL,
  `kode_keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan_perizinan`
--

INSERT INTO `keterangan_perizinan` (`id_keterangan`, `nama_keterangan`, `kode_keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Izin', 'I', '2023-10-10 08:45:36', NULL, NULL),
(2, 'Sakit', 'S', '2023-10-10 08:45:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '2023-10-09 19:57:33', NULL, NULL),
(2, 'Admin', '2023-10-09 19:57:33', NULL, NULL),
(3, 'Guru / Wali Kelas', '2023-10-09 19:57:33', NULL, NULL),
(4, 'Siswa / Orang Tua', '2023-10-09 19:57:33', NULL, NULL),
(5, 'Sekretaris', '2023-10-15 14:22:31', NULL, NULL),
(6, 'Instruktur', '2024-04-18 22:46:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `jenis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bahasa Inggris', 'Bahasa Asing', '2023-11-01 05:35:50', NULL, NULL),
(3, 'Bahasa Indonesia', 'Muatan Lokal', '2023-11-05 21:32:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `pengetahuan` varchar(255) NOT NULL,
  `keterampilan` varchar(255) NOT NULL,
  `blok` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `rombel` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `pekerjaan_ortu` text NOT NULL,
  `alamat_kantor_ortu` text NOT NULL,
  `gambar_akta_lahir` text DEFAULT NULL,
  `gambar_kk` text DEFAULT NULL,
  `gambar_ijazah` text DEFAULT NULL,
  `gambar_3x4` text DEFAULT NULL,
  `gambar_invoice` text DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perizinan`
--

CREATE TABLE `perizinan` (
  `id_perizinan` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(11) NOT NULL,
  `alasan` text NOT NULL,
  `foto` text DEFAULT '-',
  `rombel` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_r` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `nama_r`, `kelas`, `jurusan`, `jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', 2, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(3, 'B', 2, 2, 2, '2023-10-02 21:22:33', NULL, NULL),
(4, 'C', 2, 2, 2, '2023-10-03 01:42:57', NULL, NULL),
(5, 'A', 5, 2, 2, '2023-10-03 01:43:05', NULL, NULL),
(6, 'B', 5, 2, 2, '2023-10-03 01:43:12', NULL, NULL),
(7, 'C', 9, 5, 1, '2023-10-03 01:45:03', NULL, NULL),
(8, 'A', 14, 5, 1, '2023-10-03 01:45:09', NULL, NULL),
(9, 'B', 8, 5, 1, '2023-10-03 01:45:19', NULL, NULL),
(10, 'C', 14, 5, 1, '2023-10-03 01:45:33', NULL, NULL),
(11, 'A', 9, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(12, 'B', 14, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(14, 'Baru', 7, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(15, 'Baru', 7, 3, 2, '2023-10-03 01:43:12', NULL, NULL),
(16, 'Baru', 7, 4, 2, '2023-10-03 01:45:19', NULL, NULL),
(17, 'Baru', 8, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(18, 'Baru', 9, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(19, 'Baru', 14, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(21, 'A', 5, 3, 2, '2023-10-03 01:43:05', NULL, NULL),
(22, 'A', 5, 4, 2, '2023-10-03 01:43:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `nama_s` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `nama_s`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ganjil (Blok 1,2,3,4)', '2023-10-11 23:01:24', NULL, NULL),
(2, 'Genap (Blok 5,6,7,8)', '2023-10-11 23:01:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `jabatan` int(4) DEFAULT NULL,
  `jurusan` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `instruktur` int(11) DEFAULT NULL,
  `jadwal_piket` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `rombel`, `jabatan`, `jurusan`, `user`, `instruktur`, `jadwal_piket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '1001', 'Kevin Fernando', 6, NULL, 2, 11, 1, NULL, '2024-04-19 15:28:24', '2024-04-19 22:57:40', NULL),
(4, '1002', 'Jofinson', 21, NULL, 3, 12, NULL, NULL, '2024-04-19 15:31:30', NULL, NULL),
(5, '1003', 'Kelsey', 22, NULL, 4, 13, NULL, NULL, '2024-04-19 15:31:57', NULL, NULL),
(6, '1004', 'Darrell', 6, NULL, 2, 14, 2, NULL, '2024-04-19 17:32:44', '2024-04-19 23:02:55', NULL),
(7, '1005', 'Richard', 21, NULL, 3, 15, NULL, NULL, '2024-04-19 17:33:34', NULL, NULL),
(8, '1006', 'Yanda', 22, NULL, 4, 16, NULL, NULL, '2024-04-19 17:34:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `nama_t` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `nama_t`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2023', 'Aktif', '2023-10-09 01:16:23', NULL, NULL),
(3, '2024', 'Tidak-Aktif', '2023-10-09 02:28:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`, `jenjang`, `jabatan`, `pendaftaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin SMP', 'Superadmin SMP', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', 1, NULL, NULL, '2024-04-16 15:24:07', NULL, NULL),
(2, 'Superadmin SMK', 'Superadmin SMK', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', 2, NULL, NULL, '2024-04-16 15:24:07', NULL, NULL),
(6, NULL, 'Pak Dedi', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'default.png', 2, 1, NULL, '2024-04-19 11:47:23', NULL, NULL),
(8, NULL, 'Pak Haris', 'c4ca4238a0b923820dcc509a6f75849b', 6, 'default.png', NULL, NULL, NULL, '2024-04-19 13:39:14', NULL, NULL),
(11, 'Kevin Fernando', '1001', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:28:24', NULL, NULL),
(12, 'Jofinson', '1002', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:30', NULL, NULL),
(13, 'Kelsey', '1003', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:57', NULL, NULL),
(14, 'Darrell', '1004', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:32:44', NULL, NULL),
(15, 'Richard', '1005', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:33:34', NULL, NULL),
(16, 'Yanda', '1006', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:34:02', NULL, NULL),
(17, NULL, 'Pak If', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'default.png', 2, 2, NULL, '2024-04-19 19:22:59', NULL, NULL),
(18, NULL, 'Bu Rosita', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'default.png', 2, 2, NULL, '2024-04-19 20:39:48', NULL, NULL),
(19, NULL, 'Pak Beni', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'default.png', 2, 2, NULL, '2024-04-19 20:40:45', NULL, NULL),
(20, NULL, 'Pak Tono', 'c4ca4238a0b923820dcc509a6f75849b', 6, 'default.png', NULL, NULL, NULL, '2024-04-19 22:59:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `p_mulai` datetime NOT NULL,
  `p_selesai` datetime NOT NULL,
  `status` enum('Aktif','Tidak-Aktif') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo_website` text DEFAULT NULL,
  `logo_pdf` text DEFAULT NULL,
  `favicon_website` text DEFAULT NULL,
  `komplek` text DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_website`, `nama_website`, `logo_website`, `logo_pdf`, `favicon_website`, `komplek`, `jalan`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ERP - SPH', 'logo_contoh.svg', 'logo_pdf_contoh.svg', 'favicon_contoh.svg', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '2023-05-01 16:33:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indeks untuk tabel `data_absensi_kantor`
--
ALTER TABLE `data_absensi_kantor`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `data_absensi_sekolah`
--
ALTER TABLE `data_absensi_sekolah`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `data_instruktur`
--
ALTER TABLE `data_instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indeks untuk tabel `data_keterangan`
--
ALTER TABLE `data_keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `hasil_vote`
--
ALTER TABLE `hasil_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `keterangan_perizinan`
--
ALTER TABLE `keterangan_perizinan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id_perizinan`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_absensi_kantor`
--
ALTER TABLE `data_absensi_kantor`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_absensi_sekolah`
--
ALTER TABLE `data_absensi_sekolah`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_agenda`
--
ALTER TABLE `data_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_instruktur`
--
ALTER TABLE `data_instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_keterangan`
--
ALTER TABLE `data_keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hasil_vote`
--
ALTER TABLE `hasil_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `keterangan_perizinan`
--
ALTER TABLE `keterangan_perizinan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id_perizinan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
