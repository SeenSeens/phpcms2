-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 28, 2018 lúc 11:31 PM
-- Phiên bản máy phục vụ: 5.7.24-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpcms2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nameadmin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `dateofassociation` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `addby` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `nameadmin`, `email`, `password`, `role`, `dateofassociation`, `addby`) VALUES
(1, 'tuan123', 'truongtuan829@gmail.com', 'tuan123', 1, '28-12-2018', 'TuanIT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `namecategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `namecategory`, `created`) VALUES
(4, 'PHP', '28-12-2018'),
(5, 'SQL', '28-12-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `iduser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idadmin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcomment`, `iduser`, `idadmin`, `comments`, `status`, `idpost`) VALUES
(5, 'TuanITSSS', 'TuanIT', 'Ã¡dasd', 'ON', 4),
(6, 'TuanITSSS', 'TuanIT', 'Ã¡dasd', 'ON', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `idpost` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `idadmin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `idadmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`idpost`, `idcategory`, `idadmin`, `title`, `slug`, `images`, `content`, `created`) VALUES
(4, 4, 'TuanIT', 'Láº­p trÃ¬nh viÃªn PHP', 'lap-trinh-vien-php', 'photo-1-1545358549262843565338-crop-15453585571391293799801.png', '<p><span style=\"color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">Trong khi Ä‘&oacute;, giai Ä‘oáº¡n 5 naÌ†m g&acirc;Ì€n Ä‘aÌ‚y th&igrave; coÌ‚ng ngháº¹Ì‚ AI (tr&iacute; tuáº¹Ì‚ nh&acirc;n táº¡o) Ä‘uÌ›Æ¡Ì£c nhi&ecirc;Ì€u chuyeÌ‚n gia trong ngaÌ€nh Ä‘aÌnh giaÌ Ä‘aÌƒ Ä‘aÌ£t mÆ°Ìc hoaÌ€n thiáº¹Ì‚n sau má»Ì‚t quaÌƒng thÆ¡Ì€i gian phaÌt tri&ecirc;Ì‰n nh&acirc;Ìt Ä‘iÌ£nh. RieÌ‚ng taÌ£i thiÌ£ truÌ›Æ¡Ì€ng Viáº¹Ì‚t Nam, hiáº¹Ì‚n coÌ r&acirc;Ìt nhi&ecirc;Ì€u startup lÆ¡Ìn nhoÌ‰ Ä‘ang phaÌt tri&ecirc;Ì‰n caÌc dÆ°Ì£ aÌn ti&ecirc;Ì€m naÌ†ng lieÌ‚n quan Ä‘&ecirc;Ìn trÆ°Ì£c ti&ecirc;Ìp Ä‘&ecirc;Ìn AI vaÌ€ Machine Learning taÌ£o Ä‘uÌ›Æ¡Ì£c nhi&ecirc;Ì€u giaÌ triÌ£ Ä‘á»Ì‚t bi&ecirc;Ìn cho toaÌ€n ngaÌ€nh coÌ‚ng ngháº¹Ì‚ noÌi chung. CuÌƒng chiÌnh viÌ€ sÆ°Ì£ phaÌt tri&ecirc;Ì‰n naÌ€y maÌ€ mÆ°Ìc luÌ›oÌ›ng cuÌƒng nhuÌ› Ä‘á»Ì‚ noÌng cuÌ‰a kyÌƒ suÌ› AI Ä‘uÌ›Æ¡Ì£c dÆ°Ì£ baÌo seÌƒ taÌ†ng maÌ£nh trong nhÆ°Ìƒng naÌ†m sÄƒÌp tÆ¡Ìi.</span></p>', '28-12-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `password`) VALUES
(1, 'con đũy chó', 'cdc@gmail.com', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idpost` (`idpost`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idpost`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
