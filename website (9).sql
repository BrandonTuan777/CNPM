-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2020 lúc 01:55 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `par_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `children`
--

INSERT INTO `children` (`id`, `user`, `text`, `date`, `par_code`) VALUES
(1, 'SV2', 'd', '2020-12-01 23:45:28', 'fbjctr'),
(2, 'SV1', 'dsadsad', '2020-12-02 00:45:56', 'qZwFFs'),
(3, 'SV1', 'dsadasd', '2020-12-02 01:15:37', 'qZwFFs'),
(4, 'gv1', 'Hello em', '2020-12-02 18:47:12', 'f6oiIo'),
(5, 'GV3', 'Thầy là nam em', '2020-12-02 18:57:54', 'S40IIq');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsach`
--

CREATE TABLE `danhsach` (
  `id_room` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhsach`
--

INSERT INTO `danhsach` (`id_room`, `username`) VALUES
('24f4df0', 'SV2'),
('24f4df0', 'SV3'),
('71b5a0b', 'SV1'),
('deb50f6', 'SV1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id` int(50) NOT NULL,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `size` int(11) NOT NULL,
  `id_class` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id`, `filename`, `size`, `id_class`, `date`) VALUES
(6, 'DoAnCuoiKi (6).pdf', 495542, '71b5a0b', '2020-12-02 18:50:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(10) NOT NULL,
  `id_room` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `parents`
--

INSERT INTO `parents` (`id`, `user`, `text`, `date`, `code`, `id_room`) VALUES
(1, 'SV2', 'adsad', '2020-12-01 23:45:15', '6nDXX9', ''),
(2, 'SV2', 'dasdas', '2020-12-01 23:45:18', 'lguMCP', ''),
(3, 'SV2', 'dsadasd', '2020-12-01 23:45:22', 'fbjctr', ''),
(4, 'SV2', 'đâsdasd', '2020-12-02 00:14:11', 'pceqrD', '5d51c4f'),
(5, 'SV2', 'sadasd', '2020-12-02 00:25:02', 'I8dUmK', '5d51c4f'),
(6, 'SV2', 'dsad', '2020-12-02 00:27:41', 'mJkzPG', '5d51c4f'),
(7, 'SV1', 'đâsdasd', '2020-12-02 00:45:50', 'qZwFFs', 'deb50f6'),
(8, 'SV1', 'đâsd\r\n', '2020-12-02 13:27:31', 'FY5hQt', '5d51c4f'),
(9, 'SV1', 'đâsdasd', '2020-12-02 13:33:59', '8SHdHh', '5d51c4f'),
(10, 'SV1', 'Hello cô', '2020-12-02 18:46:49', 'f6oiIo', '71b5a0b'),
(11, 'SV3', 'Hi cô', '2020-12-02 18:57:34', 'S40IIq', '24f4df0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_public` tinyint(4) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `is_public`, `createdate`, `updatedate`) VALUES
(3, 'Tuan', 'hello', 0, 1, '2020-12-08 21:02:22', '2020-12-08 21:02:22'),
(6, 'Đồ ăn', 'Đồ ăn ngon vl ra ấy cho 5 sao', 36, 1, '2020-12-08 21:14:31', '2020-12-08 21:14:31'),
(7, 'Dịch vụ', 'Phòng gym 5 sao', 37, 1, '2020-12-09 18:00:48', '2020-12-09 18:00:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `orderbill` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `num_people` int(5) NOT NULL,
  `type_room` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `orderbill` (`id`, `username`, `email`, `phone`, `num_people`, `type_room`, `service`, `createdate`) VALUES
(8, 'KH1', 'khachhang1@gmail.com', 198415387, 4, 'STD', 'SPA', '2020-12-09 19:50:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `createdate` datetime NOT NULL,
  `is_block` tinyint(4) NOT NULL DEFAULT 0,
  `permision` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `createdate`, `is_block`, `permision`) VALUES
(36, 'admin', '$2y$10$0g19y3w/cbEb1DqY4iKJgeBePMg4zQ9d3/E7gaOiipLocEMFni4me', 'admin@gmail.com', 'ADMIN', 888700954, '2020-11-28 23:36:42', 0, 2),
(46, 'QL1', '$2y$10$TM5kdxQwAeSFSjrD017TBO2wP5Nx5MuB8ASDYt3qvpA9Vxwulu1Wu', 'quanli1@gmail.cpom', 'Quản lí 1', 88700954, '2020-12-09 19:51:37', 0, 1),
(45, 'KH1', '$2y$10$Yd253TjoKBR41IWfH66zUeXTv6ds0sAtSqnQfQq8TOy.IaPRV.eoe', 'khachhang1@gmail.com', 'Khách Hàng 1', 198415387, '2020-12-09 19:37:26', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhsach`
--
ALTER TABLE `danhsach`
  ADD PRIMARY KEY (`id_room`,`username`);

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `orderbill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `orderbill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
