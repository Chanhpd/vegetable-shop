-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 28, 2022 lúc 03:10 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vegefood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `thumbnail`, `short`, `des`, `create_at`) VALUES
(1, 'Organic foods is good for your health', 'image_1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '', '2022-08-31'),
(2, 'Creative WordPress Themes', 'image_2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26'),
(3, 'Even the all-powerful Pointing has no control about the blind texts', 'image_3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26'),
(4, 'Even the all-powerful Pointing has no control about the blind texts', 'image_4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26'),
(5, 'Even the all-powerful Pointing has no control about the blind texts', 'image_5.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26'),
(6, 'Even the all-powerful Pointing has no control about the blind texts', 'image_6.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `sale_price` float DEFAULT NULL,
  `status` float DEFAULT NULL,
  `des` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `price`, `sale_price`, `status`, `des`) VALUES
(1, 'Bell Pepper', 'product-1.jpg', 120, 80, 30, 'Bell peppers, also known as sweet peppers or capsicums, are incredibly nutritious. They contain antioxidants called carotenoids that may reduce inflammation, decrease cancer risk and protect cholesterol and fats from oxidative damage'),
(2, 'Strawberry', 'product-2.jpg', 120, NULL, NULL, 'These potent little packages protect your heart, increase HDL (good) cholesterol, lower your blood pressure, and guard against cancer. Packed with vitamins, fiber, and particularly high levels of antioxidants known as polyphenols, strawberries are a sodium-free, fat-free, cholesterol-free, low-calorie food.'),
(3, 'Green Beans', 'product-3.jpg', 120, NULL, NULL, 'Green beans are full of fiber, which is an important nutrient for many reasons. Soluble fiber, in particular, may help to improve the health of your heart by lowering your LDL cholesterol (bad cholesterol) levels'),
(4, 'Purple Cabbage', 'product-4.jpg', 120, NULL, NULL, 'Purple cabbage is a nutrient-rich vegetable linked to a variety of health benefits. These include reduced inflammation, a healthier heart, stronger bones, improved gut function, and perhaps even a lower risk of certain cancers.'),
(5, 'Tomatoe', 'product-5.jpg', 120, 80, 30, 'Tomatoes are juicy and sweet, full of antioxidants, and may help fight several diseases. They are especially high in lycopene, a plant compound linked to improved heart health, cancer prevention, and protection against sunburns.'),
(6, 'Broccoli', 'product-6.jpg', 110, NULL, NULL, 'Broccoli is rich in fiber and antioxidants — both of which may support healthy bowel function and digestive health. Bowel regularity and a strong community of healthy bacteria within your colon are two vital components to digestive health.'),
(7, 'Carrots', 'product-7.jpg', 120, NULL, NULL, 'Carrots are rich in vitamins, minerals, and antioxidant compounds. As part of a balanced diet, they can help support immune function, reduce the risk of some cancers and promote wound healing and digestive health.'),
(8, 'Fruit Juice', 'product-8.jpg', 120, NULL, NULL, 'Fruit juices vary in nutritional value, but most have a variety of health benefits. They contain various antioxidants that help reduce the risk of certain health issues and vitamins that help the body function well.'),
(9, 'Onion', 'product-9.jpg', 120, 80, 30, 'Onions contain antioxidants and compounds that fight inflammation, decrease triglycerides and reduce cholesterol levels — all of which may lower heart disease risk. Their potent anti-inflammatory properties may also help reduce high blood pressure and protect against blood clots.'),
(10, 'Apple', 'product-10.jpg', 120, NULL, NULL, 'Apples are an incredibly nutritious fruit that offers multiple health benefits. They\'re rich in fiber and antioxidants. Eating them is linked to a lower risk of many chronic conditions, including diabetes, heart disease, and cancer.'),
(11, 'Garlic', 'product-11.jpg', 85, NULL, NULL, 'garlic could help fight inflammation, reduce cholesterol levels, and protect against chronic disease. Given its many medicinal properties, people may also wonder whether garlic can improve sexual function or increase libido.'),
(12, 'Chilli', 'product-12.jpg', 120, NULL, NULL, 'Boasting high amounts of vitamin C and antioxidants, chillies have been found to help prevent lifestyle diseases including some cancers and stomach ulcers. Meanwhile, their ability to create heat within the body has also linked the peppers to weight loss as well as lowering the risk of type II diabetes.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recommend`
--

CREATE TABLE `recommend` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recommend`
--

INSERT INTO `recommend` (`id`, `name`, `position`, `thumbnail`, `comment`) VALUES
(1, 'Garreth Smith', 'Marketing Manager', 'person_1.jpg', 'ar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'),
(2, 'Garreth Smith', 'Interface Designer', 'person_2.jpg', 'I love it'),
(3, 'Eren', 'UI Designer', 'person_3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'),
(4, 'Taylor', 'Web Developer', 'person_4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'),
(5, 'William', 'System Analyst', 'person_5.jpg', 'Evething is wonderful. ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
