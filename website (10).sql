-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2020 lúc 06:07 AM
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
-- Cấu trúc bảng cho bảng `orderbill`
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
-- Đang đổ dữ liệu cho bảng `orderbill`
--

INSERT INTO `orderbill` (`id`, `username`, `email`, `phone`, `num_people`, `type_room`, `service`, `createdate`) VALUES
(8, 'KH1', 'khachhang1@gmail.com', 198415387, 4, 'STD', 'SPA', '2020-12-09 19:50:32'),
(0, 'KH3', 'khachhang3@gmail.com', 123168741, 3, 'SUP', 'SPA', '2020-12-11 11:39:35');

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
(45, 'KH1', '$2y$10$Yd253TjoKBR41IWfH66zUeXTv6ds0sAtSqnQfQq8TOy.IaPRV.eoe', 'khachhang1@gmail.com', 'Khách Hàng 1', 198415387, '2020-12-09 19:37:26', 0, 0),
(0, 'KH3', '$2y$10$3Y4/gFY13AMtvqdHx2CXY.XbUW9442/RbazrhydljxfNQxZcB.Eoa', 'khachhang3@gmail.com', 'Khách Hàng 3', 123168741, '2020-12-11 11:39:12', 0, 0),
(0, 'KH2', '$2y$10$XstoE1NKeWQPC.9k4Wg5r.d2IxK7yVZvyBqDt54Y8/zqyd2Yfdn3C', 'khachhang2@gmail.com', 'Khách Hàng 2', 15684534, '2020-12-11 11:41:36', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
