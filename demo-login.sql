-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2022 lúc 12:47 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo-login`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `token`) VALUES
(1, 'manh', 'manh@gmail.com', '123456', NULL),
(2, NULL, 'manh', '111111111', NULL),
(3, NULL, 'Pháº¡m DoÃ£n Máº¡nh', 'adadad', NULL),
(4, NULL, 'manh@gmail.com', 'manh123', NULL),
(5, 'Pháº¡m DoÃ£n Máº¡nh', 'a', 'manh123', NULL),
(6, 'Pháº¡m DoÃ£n Máº¡nh', 'manhtb1982@gmail.com', '111', NULL),
(7, 'Pháº¡m DoÃ£n Máº¡nh', 'manhtb1982@gmail.com', '111', NULL),
(8, 'Pháº¡m DoÃ£n Máº¡nh', 'aaaaaa', '1111', NULL),
(9, 'Pháº¡m DoÃ£n Máº¡nh', 'aaaaaa', '1111', NULL),
(10, 'Pháº¡m DoÃ£n Máº¡nh', 'manhtb1982@gmail.com', '111', NULL),
(11, 'Pháº¡m DoÃ£n Máº¡nh', 'manhtb1982@gmail.com', '111', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
