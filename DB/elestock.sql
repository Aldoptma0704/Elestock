-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 09.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elestock`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`) VALUES
(1, 'Gudang Utama', 'Lokasi penyimpanan utama'),
(5, 'Gudang A', 'Lokasi penyimpanan tambahan A'),
(6, 'Gudang B', 'Lokasi penyimpanan tambahan B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `specification` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `specification`, `stock`, `supplier_id`, `location_id`) VALUES
(1, 'Laptop ASUS X412	', 'Laptop', 'Intel Core i5, RAM 8GB, SSD 256GB', 15, 1, 1),
(2, 'Smartphone Xiaomi Redmi Note 10', 'Smartphone', 'Snapdragon 678, RAM 6GB, 128GB', 25, 2, 5),
(3, 'Monitor LG 24MK430H-B', 'Monitor', '24 inch, Full HD, IPS Panel', 10, 3, 6),
(4, 'Laptop Lenovo Thinkpad X250', 'Laptop', 'Intel Core i5, RAM 8GB, SSD 256GB', 30, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_reports`
--

CREATE TABLE `sales_reports` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `email`, `phone`, `product_id`) VALUES
(1, 'ASUS Indonesia', 'Budi Santoso', 'budi@asus.co.id', '081234567890', NULL),
(2, 'Xiaomi Store', 'Lisa Tan', 'lisa@xiaomi.com', '087654321098', 1),
(3, 'LG Electronics', 'Bambang Sudarsa', 'bambang@lgelectronics.com', '089876543210', NULL),
(4, 'Lenovo Indonesia', 'Ahmad', 'ahmad@gmail.com', '089172635521', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@elestock.com', 'admin', 1),
(2, 'Aldo', 'aldopratama0707@gmail.com', '$2y$10$jMa2tRgUuQTssWtfclgNtOZP2uRAZZ1KfxChpHzOULj3iXExpbZx2', 0),
(3, 'Budi', 'wow@sharklasers.com', '$2y$10$ACZrlJSREW.ybVIh69eBJODY9suKWo3EtGxnbZb7LxyIkabnhkwXG', 0),
(4, 'daffa', 'daffa@gmail.com', 'daffa', 0),
(5, 'daffa', 'daffa@gmail.com', 'daffa', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_reports`
--
ALTER TABLE `sales_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sales_reports`
--
ALTER TABLE `sales_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
