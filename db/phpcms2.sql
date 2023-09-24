-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 24, 2023 lúc 07:00 PM
-- Phiên bản máy phục vụ: 8.1.0
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `idadmin` int NOT NULL,
  `nameadmin` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `dateofassociation` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `addby` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `namecategory` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `namecategory`, `created`) VALUES
(6, 'PHP', '24-09-2023'),
(7, 'WordPress', '24-09-2023'),
(8, 'JavaScript', '24-09-2023'),
(9, 'Tin Tức', '24-09-2023'),
(10, 'Java', '24-09-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcomment` int NOT NULL,
  `idperent` int DEFAULT NULL,
  `iduser` int NOT NULL,
  `idpost` int NOT NULL,
  `idadmin` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `idpost` int NOT NULL,
  `idcategory` int NOT NULL,
  `idadmin` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `videos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `idpost` int NOT NULL,
  `idcategory` int NOT NULL,
  `idadmin` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`idpost`, `idcategory`, `idadmin`, `title`, `slug`, `images`, `content`, `created`) VALUES
(9, 9, 'TuanIT', 'Những tài nguyên này đã giúp tôi trở thành Nhà phát triển Full Stack', 'nhung - tai - nguyen - nay - da - giup - toi - tro - thanh - nha - phat - trien - full - stack', '0_kuzffypXEYqcPkU.jpg', '<div class=\"jj qh qi qj qk\">\r\n<div class=\"n p\">\r\n<div class=\"cz bm da db dc dd\">\r\n<p id=\"9bd1\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Một th&aacute;ng trước, t&ocirc;i đ&atilde; kể với mọi người về&nbsp;</span><a class=\"ay jc\" href=\"https://medium.com/startit-up/how-i-became-a-full-stack-software-developer-in-7-months-self-taught-583bb3e21ebb\" rel=\"noopener\"><span>việc t&ocirc;i đ&atilde; trở th&agrave;nh Nh&agrave; ph&aacute;t triển phần mềm Full Stack</span></a><span>&nbsp;trong khoảng 7 th&aacute;ng như thế n&agrave;o.&nbsp;B&agrave;i đăng đ&oacute; đ&atilde; tiếp cận được rất nhiều người, v&igrave; vậy đ&acirc;y l&agrave; nhiều hơn nữa!</span></p>\r\n<figure class=\"vq vr vs vt vu vv kr ks paragraph-image\">\r\n<div class=\"vw vx by vy bm vz\" tabindex=\"0\" role=\"button\">\r\n<div class=\"kr ks vp\"><picture><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*kuzffypXEYqcPkU_ 640w, https://miro.medium.com/v2/resize:fit:720/0*kuzffypXEYqcPkU_ 720w, https://miro.medium.com/v2/resize:fit:750/0*kuzffypXEYqcPkU_ 750w, https://miro.medium.com/v2/resize:fit:786/0*kuzffypXEYqcPkU_ 786w, https://miro.medium.com/v2/resize:fit:828/0*kuzffypXEYqcPkU_ 828w, https://miro.medium.com/v2/resize:fit:1100/0*kuzffypXEYqcPkU_ 1100w, https://miro.medium.com/v2/resize:fit:1400/0*kuzffypXEYqcPkU_ 1400w\" type=\"image/webp\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\"><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*kuzffypXEYqcPkU_ 640w, https://miro.medium.com/v2/resize:fit:720/0*kuzffypXEYqcPkU_ 720w, https://miro.medium.com/v2/resize:fit:750/0*kuzffypXEYqcPkU_ 750w, https://miro.medium.com/v2/resize:fit:786/0*kuzffypXEYqcPkU_ 786w, https://miro.medium.com/v2/resize:fit:828/0*kuzffypXEYqcPkU_ 828w, https://miro.medium.com/v2/resize:fit:1100/0*kuzffypXEYqcPkU_ 1100w, https://miro.medium.com/v2/resize:fit:1400/0*kuzffypXEYqcPkU_ 1400w\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\" data-testid=\"og\"><img class=\"bm wa wb c\" role=\"presentation\" src=\"https://miro.medium.com/v2/resize:fit:700/0*kuzffypXEYqcPkU_\" alt=\"\" width=\"700\" height=\"467\" loading=\"eager\"></picture></div>\r\n</div>\r\n<figcaption class=\"wc ij wd kr ks we wf al b bl ag ai\" data-selectable-paragraph=\"\"><span>Ảnh của&nbsp;</span><a class=\"ay jc\" href=\"https://unsplash.com/@sickhews?utm_source=medium&amp;utm_medium=referral\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Wes Hicks</span></a><span>&nbsp;tr&ecirc;n&nbsp;</span><a class=\"ay jc\" href=\"https://unsplash.com/?utm_source=medium&amp;utm_medium=referral\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Bapt</span></a></figcaption>\r\n</figure>\r\n<p id=\"eb2d\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Hiện tại, t&ocirc;i tin v&agrave;o&nbsp;</span><strong class=\"mh gm\"><span>việc học dựa tr&ecirc;n dự &aacute;n</span></strong><span>&nbsp;(h&atilde;y thử x&acirc;y dựng một dự &aacute;n v&agrave; học hỏi những điều trong qu&aacute; tr&igrave;nh thực hiện nhờ n&oacute;).</span></p>\r\n<p id=\"06d0\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Nhưng trước khi x&acirc;y dựng một dự &aacute;n, bạn n&ecirc;n hiểu một ch&uacute;t về c&aacute;c kh&aacute;i niệm.</span></p>\r\n<blockquote class=\"wg wh wi\">\r\n<p id=\"9f8f\" class=\"uv uw wj mh b ux uy uz va vb vc vd ve wk vf vg vh wl vi vj vk wm vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><strong class=\"mh gm\"><span>C&oacute; rất nhiều k&ecirc;nh YouTube c&oacute; thể dạy bạn ph&aacute;t triển web.&nbsp;Th&agrave;nh thật m&agrave; n&oacute;i, h&atilde;y ngừng thử nghiệm mọi k&ecirc;nh v&agrave; chỉ chọn một k&ecirc;nh!</span></strong></p>\r\n</blockquote>\r\n<p id=\"4e9b\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>B&acirc;y giờ ch&uacute;ng ta đừng v&ograve;ng vo nữa.</span></p>\r\n<p id=\"4727\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Dưới đ&acirc;y l&agrave; một số t&agrave;i nguy&ecirc;n miễn ph&iacute; v&agrave; trả ph&iacute; đ&atilde; gi&uacute;p t&ocirc;i c&oacute; được c&ocirc;ng việc thực tập v&agrave; sau đ&oacute; l&agrave; vị tr&iacute; to&agrave;n thời gian.</span></p>\r\n<h1 id=\"c236\" class=\"wn wo qm al wp wq wr ws ll wt wu wv lq ww wx wy wz xa xb xc xd xe xf xg xh xi bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.udemy.com/course/the-complete-web-development-bootcamp/\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Chương tr&igrave;nh đ&agrave;o tạo ph&aacute;t triển web ho&agrave;n chỉnh năm 2023</span></a><span>&nbsp;(Trả ph&iacute;)</span></h1>\r\n<p id=\"f847\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Để ph&aacute;t triển web full stack, t&ocirc;i đ&atilde; mua kh&oacute;a học&nbsp;</span><a class=\"ay jc\" href=\"https://www.udemy.com/course/the-complete-web-development-bootcamp/\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>&ldquo;Bootcamp ph&aacute;t triển web ho&agrave;n chỉnh năm 2023&rdquo;</span></a><span>&nbsp;của Angela Yu (thời của t&ocirc;i l&agrave; năm 2022).</span></p>\r\n<p id=\"4ce7\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Bạn c&oacute; thể mua n&oacute; với gi&aacute; khoảng 449 INR tr&ecirc;n Udemy.</span></p>\r\n<p id=\"5a8c\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>T&ocirc;i thấy kh&oacute;a học n&agrave;y được dạy tốt.&nbsp;Hầu hết c&aacute;c chủ đề d&agrave;nh cho nh&agrave; ph&aacute;t triển web đều được đưa v&agrave;o, c&ugrave;ng với một số lệnh d&ograve;ng lệnh/thiết bị đầu cuối v&agrave; c&aacute;c mẹo về những vấn đề chung như c&aacute;ch học v&agrave; c&aacute;ch tiếp tục theo đuổi c&aacute;c chủ đề.</span></p>\r\n<h1 id=\"15be\" class=\"wn wo qm al wp wq wr ws ll wt wu wv lq ww wx wy wz xa xb xc xd xe xf xg xh xi bp\" data-selectable-paragraph=\"\"><span>T&agrave;i nguy&ecirc;n miễn ph&iacute;</span></h1>\r\n<p id=\"3999\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>B&acirc;y giờ, nh&oacute;m c&ocirc;ng nghệ của t&ocirc;i (c&aacute;c c&ocirc;ng nghệ m&agrave; t&ocirc;i l&agrave;m việc ngoại trừ HTML, CSS v&agrave; JavaScript) bao gồm:</span></p>\r\n<ul class=\"\">\r\n<li id=\"0155\" class=\"uv uw qm mh b ux uy uz va vb vc vd ve lr xo vg vh lw xp vj vk mb xq vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><span>Phản ứng</span></li>\r\n<li id=\"ca3f\" class=\"uv uw qm mh b ux xu uz va vb xv vd ve lr xw vg vh lw xx vj vk mb xy vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><span>Next.js</span></li>\r\n<li id=\"778e\" class=\"uv uw qm mh b ux xu uz va vb xv vd ve lr xw vg vh lw xx vj vk mb xy vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><span>Node.js</span></li>\r\n<li id=\"6c24\" class=\"uv uw qm mh b ux xu uz va vb xv vd ve lr xw vg vh lw xx vj vk mb xy vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><span>Thể hiện</span></li>\r\n<li id=\"7dd7\" class=\"uv uw qm mh b ux xu uz va vb xv vd ve lr xw vg vh lw xx vj vk mb xy vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><span>Phản ứng gốc</span></li>\r\n</ul>\r\n<p id=\"e98d\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>V&igrave; vậy, một số k&ecirc;nh YouTube m&agrave; m&igrave;nh giới thiệu cho mọi người đ&oacute; l&agrave;:</span></p>\r\n<h1 id=\"eac7\" class=\"wn wo qm al wp wq wr ws ll wt wu wv lq ww wx wy wz xa xb xc xd xe xf xg xh xi bp\" data-selectable-paragraph=\"\"><span>Để ph&aacute;t triển Web Frontend</span></h1>\r\n<h2 id=\"5ad3\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/@WebDevSimplified\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Nh&agrave; ph&aacute;t triển web đơn giản h&oacute;a</span></a></h2>\r\n<p id=\"b47d\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>(Video về HTML, CSS, JavaScript, React, v.v.)</span></p>\r\n<p id=\"d152\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>K&ecirc;nh YouTube kh&aacute; tuyệt vời để bắt đầu ph&aacute;t triển web.&nbsp;Th&agrave;nh thật m&agrave; n&oacute;i, một trong những k&ecirc;nh đầu ti&ecirc;n đ&atilde; giới thiệu t&ocirc;i với thế giới nh&agrave; ph&aacute;t triển web.</span></p>\r\n<h2 id=\"959e\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/@CodeWithHarry\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>CodeWithHarry</span></a><span>&nbsp;(bằng tiếng Hindi)</span></h2>\r\n<p id=\"4d5b\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Bao gồm HTML, CSS, JavaScript, React, Node.js, v.v.)</span></p>\r\n<p id=\"b122\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>T&ocirc;i đ&atilde; xem danh s&aacute;ch ph&aacute;t Web Dev của anh ấy v&agrave; thật tốt nếu ai đ&oacute; muốn học bằng tiếng Hindi.</span></p>\r\n<h2 id=\"6a37\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/@akshaymarch7\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Akshay Saini</span></a><span>&nbsp;(JavaScript)</span></h2>\r\n<p id=\"b75a\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Điểm đến cuối c&ugrave;ng để hiểu c&aacute;c kh&aacute;i niệm JavaScript v&agrave; chuẩn bị phỏng vấn.&nbsp;T&ocirc;i vẫn đang xem danh s&aacute;ch ph&aacute;t&nbsp;</span><a class=\"ay jc\" href=\"https://www.youtube.com/playlist?list=PLlasXeu85E9cQ32gLCvAvr9vNaUccPVNP\" target=\"_blank\" rel=\"noopener ugc nofollow\"><strong class=\"mh gm\"><span>Namaste JavaScript</span></strong></a><span>&nbsp;.</span></p>\r\n<h2 id=\"80c8\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/channel/UCJZv4d5rbIKd4QHMPkcABCw\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Kevin Powell</span></a></h2>\r\n<p id=\"e1a7\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>CSS!&nbsp;CSS!&nbsp;CSS!</span></p>\r\n<p id=\"de42\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Anh ấy dạy CSS rất tốt v&agrave; lu&ocirc;n ghi nhớ c&aacute;c kh&aacute;i niệm như bố cục v&agrave; khoảng c&aacute;ch.&nbsp;Bao gồm rất nhiều mẹo, thủ thuật v&agrave; c&aacute;ch thực h&agrave;nh tốt nhất.</span></p>\r\n<h2 id=\"a130\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/@Fireship\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>t&agrave;u hỏa</span></a></h2>\r\n<p id=\"18ba\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>K&ecirc;nh tuyệt vời d&agrave;nh cho nh&agrave; ph&aacute;t triển c&oacute; kinh nghiệm + người mới bắt đầu.&nbsp;N&oacute;i rất nhiều điều về việc viết m&atilde; chỉ trong một khoảng thời gian ngắn (theo đ&uacute;ng nghĩa đen l&agrave; 2 ph&uacute;t!).</span></p>\r\n<p id=\"ae3e\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/playlist?list=PL0vfts4VzfNiI1BsIK5u7LpPaIDKMJIDN\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Bao gồm c&aacute;c video d&agrave;i 100 gi&acirc;y</span></a><span>&nbsp;chất lượng rất cao&nbsp;(chỉ để giới thiệu c&ocirc;ng nghệ/c&ocirc;ng cụ/khu&ocirc;n khổ mới).</span></p>\r\n<h2 id=\"8f82\" class=\"xz wo qm al wp lh ya li ll lm yb ln lq lr yc ls lv lw yd lx ma mb ye mc mf yf bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://www.youtube.com/@TraversyMedia\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Phương tiện truyền th&ocirc;ng</span></a></h2>\r\n<p id=\"ee5a\" class=\"pw-post-body-paragraph uv uw qm mh b ux xj uz va vb xk vd ve lr xl vg vh lw xm vj vk mb xn vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Một k&ecirc;nh nổi tiếng trong lĩnh vực ph&aacute;t triển phần mềm tr&ecirc;n YouTube, c&oacute; rất nhiều kh&oacute;a học cấp tốc hay (video khoảng 1&ndash;2 giờ).</span></p>\r\n<p id=\"caf3\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Họ chắc chắn sẽ gi&uacute;p bạn bắt đầu với c&aacute;c c&ocirc;ng cụ v&agrave; khu&ocirc;n khổ m&agrave; bạn muốn học.&nbsp;T&ocirc;i đ&atilde; xem video&nbsp;</span><a class=\"ay jc\" href=\"https://youtu.be/-0exw-9YJBo?si=L0VpQIJSi74-EAmQ\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>ngăn xếp MERN</span></a><span>&nbsp;của anh ấy , nơi anh ấy tạo API REST với c&aacute;c thao t&aacute;c CRUD cơ bản bằng c&aacute;ch sử dụng c&aacute;c phương ph&aacute;p hay nhất.</span></p>\r\n<h1 id=\"0db8\" class=\"wn wo qm al wp wq wr ws ll wt wu wv lq ww wx wy wz xa xb xc xd xe xf xg xh xi bp\" data-selectable-paragraph=\"\"><span>Để ph&aacute;t triển web phụ trợ</span></h1>\r\n<ul class=\"\">\r\n<li id=\"917c\" class=\"uv uw qm mh b ux xj uz va vb xk vd ve lr yg vg vh lw yh vj vk mb yi vm vn vo xr xs xt bp\" data-selectable-paragraph=\"\"><a class=\"ay jc\" href=\"https://youtu.be/cGAdC4A5fF4?si=RM__1DFftOzv6Nxt\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>Nắm vững phần BACKEND trong một video</span></a><span>&nbsp;của Lập tr&igrave;nh vi&ecirc;n 6 g&oacute;i&nbsp;</span><strong class=\"mh gm\"><span>(Tiếng Hindi)</span></strong></li>\r\n</ul>\r\n<p id=\"7ab2\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Kh&oacute;a học k&eacute;o d&agrave;i 6 giờ n&agrave;y bao gồm Node.js, Express, API v&agrave; dự &aacute;n CRUD bao gồm x&aacute;c thực (với React).&nbsp;T&ocirc;i đ&atilde; nhờ sự trợ gi&uacute;p của video n&agrave;y để l&agrave;m phần phụ trợ cho dự &aacute;n mẫu của m&igrave;nh.</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"n p yj fb kn yk\" role=\"separator\">&nbsp;</div>\r\n<div class=\"jj qh qi qj qk\">\r\n<div class=\"n p\">\r\n<div class=\"cz bm da db dc dd\">\r\n<blockquote class=\"wg wh wi\">\r\n<p id=\"99bb\" class=\"uv uw wj mh b ux uy uz va vb vc vd ve wk vf vg vh wl vi vj vk wm vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><strong class=\"mh gm\"><span>một mẹo</span></strong></p>\r\n<p id=\"687e\" class=\"uv uw wj mh b ux uy uz va vb vc vd ve wk vf vg vh wl vi vj vk wm vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>KH&Ocirc;NG n&aacute;n lại video YouTube l&acirc;u hơn.&nbsp;Chọn một &yacute; tưởng dự &aacute;n v&agrave; bắt đầu x&acirc;y dựng n&oacute;!&nbsp;Nếu n&oacute; tốt, chỉ cần viết n&oacute; v&agrave;o sơ yếu l&yacute; lịch của bạn!</span></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"n p yj fb kn yk\" role=\"separator\">&nbsp;</div>\r\n<div class=\"jj qh qi qj qk\">\r\n<div class=\"n p\">\r\n<div class=\"cz bm da db dc dd\">\r\n<p id=\"08ee\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Ngo&agrave;i ra, nếu bạn gặp phải nhiều vấn đề kh&aacute;c nhau trong qu&aacute; tr&igrave;nh viết m&atilde; h&agrave;ng ng&agrave;y v&agrave; kh&ocirc;ng thể t&igrave;m ra giải ph&aacute;p cho vấn đề đ&oacute;, bạn c&oacute; thể xem kho lưu trữ GitHub&nbsp;</span><a class=\"ay jc\" href=\"https://github.com/Sumansourabh14/coding-solutions\" target=\"_blank\" rel=\"noopener ugc nofollow\"><span>&ldquo;Giải ph&aacute;p m&atilde; h&oacute;a&rdquo;</span></a><span>&nbsp;của t&ocirc;i .</span></p>\r\n<p id=\"fb08\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Ở đ&acirc;y t&ocirc;i đ&atilde; liệt k&ecirc; c&aacute;c li&ecirc;n kết v&agrave; giải ph&aacute;p hữu &iacute;ch cho c&aacute;c vấn đề m&atilde; h&oacute;a kh&aacute;c nhau m&agrave; t&ocirc;i gặp phải trong qu&aacute; tr&igrave;nh viết m&atilde; h&agrave;ng ng&agrave;y.&nbsp;T&ocirc;i tiếp tục cập nhật thời gian n&agrave;y.</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"n p yj fb kn yk\" role=\"separator\">&nbsp;</div>\r\n<div class=\"jj qh qi qj qk\">\r\n<div class=\"n p\">\r\n<div class=\"cz bm da db dc dd\">\r\n<p id=\"91e7\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>T&ocirc;i sẽ cập nhật b&agrave;i đăng n&agrave;y khi t&ocirc;i tiếp tục cố gắng nhớ lại nhiều t&agrave;i nguy&ecirc;n hơn.&nbsp;L&agrave;m ơn ki&ecirc;n nhẫn một ch&uacute;t nh&eacute;!</span></p>\r\n<p id=\"860d\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><strong class=\"mh gm\"><em class=\"wj\"><span>Bạn c&oacute; thể li&ecirc;n hệ với t&ocirc;i tr&ecirc;n&nbsp;</span></em></strong><a class=\"ay jc\" href=\"https://www.linkedin.com/in/sumansourabh14/\" target=\"_blank\" rel=\"noopener ugc nofollow\"><strong class=\"mh gm\"><em class=\"wj\"><span>LinkedIn</span></em></strong></a><strong class=\"mh gm\"><em class=\"wj\"><span>&nbsp;v&agrave;&nbsp;</span></em></strong><a class=\"ay jc\" href=\"https://twitter.com/sumansourabhdev\" target=\"_blank\" rel=\"noopener ugc nofollow\"><strong class=\"mh gm\"><em class=\"wj\"><span>Twitter</span></em></strong></a><strong class=\"mh gm\"><em class=\"wj\"><span>&nbsp;.</span></em></strong></p>\r\n</div>\r\n</div>\r\n</div>', '24-09-2023'),
(10, 10, 'TuanIT', 'Ngừng sử dụng Ngoại lệ trong Java', 'ngung-su-dung-ngoai-le-trong-java', '0_cTEou51qdPB0wdVw.png', '<p id=\"f742\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Tất cả ch&uacute;ng ta đều biết rằng&nbsp;</span><em class=\"wj\"><span>GOTO</span></em><span>&nbsp;kh&ocirc;ng được d&ugrave;ng nữa v&agrave; bị coi l&agrave; t&agrave; &aacute;c tuyệt đối.&nbsp;Hơn nữa, bất kỳ lệnh nhảy n&agrave;o cũng kh&ocirc;ng tốt v&igrave; n&oacute; ph&aacute; vỡ luồng tuần tự logic trong m&atilde; của bạn.&nbsp;Việc nhảy theo c&aacute;c nh&atilde;n sẽ l&agrave;m tổn thương n&atilde;o bộ của ch&uacute;ng ta v&agrave; khiến ch&uacute;ng ta kh&oacute; theo d&otilde;i logic v&igrave; ch&uacute;ng ta phải theo d&otilde;i trạng th&aacute;i hiện tại của bất kỳ biến số v&agrave; bối cảnh n&agrave;o.</span></p>\r\n<p id=\"7e86\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Vậy tại sao ch&uacute;ng ta lại sử dụng Ngoại lệ cho logic nghiệp vụ của m&igrave;nh?</span></p>\r\n<p id=\"6489\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>H&atilde;y bắt đầu lại từ đầu.&nbsp;H&atilde;y mở bản đồ ph&acirc;n cấp lỗi trong Java:</span></p>\r\n<figure class=\"vq vr vs vt vu vv kr ks paragraph-image\">\r\n<div class=\"vw vx by vy bm vz\" tabindex=\"0\" role=\"button\">\r\n<div class=\"kr ks ajo\"><picture><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*cTEou51qdPB0wdVw 640w, https://miro.medium.com/v2/resize:fit:720/0*cTEou51qdPB0wdVw 720w, https://miro.medium.com/v2/resize:fit:750/0*cTEou51qdPB0wdVw 750w, https://miro.medium.com/v2/resize:fit:786/0*cTEou51qdPB0wdVw 786w, https://miro.medium.com/v2/resize:fit:828/0*cTEou51qdPB0wdVw 828w, https://miro.medium.com/v2/resize:fit:1100/0*cTEou51qdPB0wdVw 1100w, https://miro.medium.com/v2/resize:fit:1400/0*cTEou51qdPB0wdVw 1400w\" type=\"image/webp\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\"><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*cTEou51qdPB0wdVw 640w, https://miro.medium.com/v2/resize:fit:720/0*cTEou51qdPB0wdVw 720w, https://miro.medium.com/v2/resize:fit:750/0*cTEou51qdPB0wdVw 750w, https://miro.medium.com/v2/resize:fit:786/0*cTEou51qdPB0wdVw 786w, https://miro.medium.com/v2/resize:fit:828/0*cTEou51qdPB0wdVw 828w, https://miro.medium.com/v2/resize:fit:1100/0*cTEou51qdPB0wdVw 1100w, https://miro.medium.com/v2/resize:fit:1400/0*cTEou51qdPB0wdVw 1400w\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\" data-testid=\"og\"><img class=\"bm wa wb c\" role=\"presentation\" src=\"https://miro.medium.com/v2/resize:fit:700/0*cTEou51qdPB0wdVw\" alt=\"\" width=\"700\" height=\"242\" loading=\"eager\"></picture></div>\r\n</div>\r\n</figure>\r\n<p id=\"c517\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Như bạn c&oacute; thể đ&atilde; biết, Error l&agrave; một trường hợp đặc biệt &mdash; n&oacute; được sử dụng khi kh&ocirc;ng thể tiếp tục hoạt động v&agrave; ch&uacute;ng ta muốn dừng JVM (hoặc hệ thống kh&ocirc;ng thể hoạt động được nữa).&nbsp;Lớp n&agrave;y v&agrave; tất cả c&aacute;c lớp con của n&oacute; được đ&aacute;nh dấu bằng m&agrave;u xanh l&aacute; c&acirc;y.</span></p>\r\n<p id=\"63ec\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Một trường hợp kh&aacute;c l&agrave; lớp Exception con của n&oacute; (RuntimeException) cũng c&oacute; m&agrave;u xanh nhưng c&aacute;c phần c&ograve;n lại c&oacute; m&agrave;u đỏ.</span></p>\r\n<p id=\"acd2\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Tất cả c&aacute;c lớp m&agrave;u xanh l&aacute; c&acirc;y đều l&agrave; những ngoại lệ kh&ocirc;ng được kiểm tra v&agrave; kh&ocirc;ng n&ecirc;n bị bắt v&agrave; xử l&yacute; một c&aacute;ch r&otilde; r&agrave;ng trong m&atilde;.&nbsp;V&agrave; tất cả những c&aacute;i m&agrave;u đỏ đều được chọn - ch&uacute;ng phải được đề cập trong phần khai b&aacute;o h&agrave;m v&agrave; được xử l&yacute; một c&aacute;ch r&otilde; r&agrave;ng.</span></p>\r\n<p id=\"f87d\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Hầu hết người d&ugrave;ng ng&agrave;y nay th&iacute;ch sử dụng c&aacute;c ngoại lệ kh&ocirc;ng được kiểm tra bằng c&aacute;ch sử dụng lớp RuntimeException l&agrave;m lớp cha để kế thừa.&nbsp;Ngay cả khi bất kỳ API n&agrave;o đ&atilde; khai b&aacute;o ngoại lệ được kiểm tra trong chữ k&yacute; phương thức, ch&uacute;ng t&ocirc;i vẫn sử dụng Lombok với ch&uacute; th&iacute;ch SneakyThrows để ngăn chặn ngoại lệ đ&oacute;.&nbsp;Spring Web Framework cung cấp ch&uacute; th&iacute;ch ControllerAdvice để tạo tr&igrave;nh xử l&yacute; c&aacute;c ngoại lệ của ch&uacute;ng t&ocirc;i.</span><mark class=\"aju ajv ao\"><span>Ngay cả khi bất kỳ API n&agrave;o đ&atilde; khai b&aacute;o ngoại lệ được kiểm tra trong chữ k&yacute; phương thức, ch&uacute;ng t&ocirc;i vẫn sử dụng Lombok với ch&uacute; th&iacute;ch SneakyThrows để ngăn chặn ngoại lệ đ&oacute;.</span></mark><span>Spring Web Framework cung cấp ch&uacute; th&iacute;ch ControllerAdvice để tạo tr&igrave;nh xử l&yacute; c&aacute;c ngoại lệ của ch&uacute;ng t&ocirc;i.</span></p>\r\n<p id=\"aef7\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Khi t&ocirc;i rơi v&agrave;o suy nghĩ v&agrave; tự đặt c&acirc;u hỏi: sự kh&aacute;c biệt giữa nhảy nh&atilde;n giống GOTO v&agrave; tr&igrave;nh xử l&yacute; ngoại lệ (bao gồm cả khối bắt) nếu ch&uacute;ng ta đang n&oacute;i về việc triển khai logic nghiệp vụ l&agrave; g&igrave;?</span></p>\r\n<p id=\"dea9\" class=\"pw-post-body-paragraph uv uw qm mh b ux uy uz va vb vc vd ve lr vf vg vh lw vi vj vk mb vl vm vn vo jj bp\" data-selectable-paragraph=\"\"><span>Thực sự, tại sao ch&uacute;ng ta lại sử dụng Ngoại lệ trong những trường hợp kh&ocirc;ng c&oacute; trường hợp ngoại lệ n&agrave;o?&nbsp;V&iacute; dụ: ch&uacute;ng t&ocirc;i thường sử dụng một c&aacute;i g&igrave; đ&oacute; như EntityNotFoundException khi ch&uacute;ng t&ocirc;i kh&ocirc;ng thể t&igrave;m thấy bản ghi trong DB cho API HTTP của m&igrave;nh v&agrave; sau đ&oacute; ch&uacute;ng t&ocirc;i xử l&yacute; ngoại lệ n&agrave;y trong ControllerAdvice để trả về m&atilde; trạng th&aacute;i 404 NotFound cho kh&aacute;ch h&agrave;ng.&nbsp;Trường hợp n&agrave;y c&oacute; thực sự cần một ngoại lệ?&nbsp;Trường hợp n&agrave;y c&oacute; ngoại lệ kh&ocirc;ng?&nbsp;Hoặc n&oacute; l&agrave; điều b&igrave;nh thường đối với bất kỳ ứng dụng web n&agrave;o?</span></p>\r\n<figure class=\"vq vr vs vt vu vv kr ks paragraph-image\">\r\n<div class=\"vw vx by vy bm vz\" tabindex=\"0\" role=\"button\">\r\n<div class=\"kr ks ajp\"><picture><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*2-3skXJc3pMq_5j1 640w, https://miro.medium.com/v2/resize:fit:720/0*2-3skXJc3pMq_5j1 720w, https://miro.medium.com/v2/resize:fit:750/0*2-3skXJc3pMq_5j1 750w, https://miro.medium.com/v2/resize:fit:786/0*2-3skXJc3pMq_5j1 786w, https://miro.medium.com/v2/resize:fit:828/0*2-3skXJc3pMq_5j1 828w, https://miro.medium.com/v2/resize:fit:1100/0*2-3skXJc3pMq_5j1 1100w, https://miro.medium.com/v2/resize:fit:1400/0*2-3skXJc3pMq_5j1 1400w\" type=\"image/webp\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\"><source srcset=\"https://miro.medium.com/v2/resize:fit:640/0*2-3skXJc3pMq_5j1 640w, https://miro.medium.com/v2/resize:fit:720/0*2-3skXJc3pMq_5j1 720w, https://miro.medium.com/v2/resize:fit:750/0*2-3skXJc3pMq_5j1 750w, https://miro.medium.com/v2/resize:fit:786/0*2-3skXJc3pMq_5j1 786w, https://miro.medium.com/v2/resize:fit:828/0*2-3skXJc3pMq_5j1 828w, https://miro.medium.com/v2/resize:fit:1100/0*2-3skXJc3pMq_5j1 1100w, https://miro.medium.com/v2/resize:fit:1400/0*2-3skXJc3pMq_5j1 1400w\" sizes=\"(min-resolution: 4dppx) and (max-width: 700px) 50vw, (-webkit-min-device-pixel-ratio: 4) and (max-width: 700px) 50vw, (min-resolution: 3dppx) and (max-width: 700px) 67vw, (-webkit-min-device-pixel-ratio: 3) and (max-width: 700px) 65vw, (min-resolution: 2.5dppx) and (max-width: 700px) 80vw, (-webkit-min-device-pixel-ratio: 2.5) and (max-width: 700px) 80vw, (min-resolution: 2dppx) and (max-width: 700px) 100vw, (-webkit-min-device-pixel-ratio: 2) and (max-width: 700px) 100vw, 700px\" data-testid=\"og\"><img class=\"bm wa wb c\" role=\"presentation\" src=\"https://miro.medium.com/v2/resize:fit:700/0*2-3skXJc3pMq_5j1\" alt=\"\" width=\"700\" height=\"394\" loading=\"lazy\"></picture></div>\r\n</div>\r\n</figure>', '24-09-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  ADD KEY `idpost` (`idpost`),
  ADD KEY `iduser` (`iduser`);

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
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `idpost` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
