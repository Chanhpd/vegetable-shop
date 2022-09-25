-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 25, 2022 lúc 10:18 AM
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
  `create_at` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `thumbnail`, `short`, `des`, `create_at`, `id_user`) VALUES
(1, 'Organic foods is good for your health', 'image_1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-31', 1),
(2, 'Creative WordPress Themes', 'image_2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26', 1),
(3, 'Even the all-powerful Pointing has no control about the blind texts', 'image_3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26', 1),
(4, 'Even the all-powerful Pointing has no control about the blind texts', 'image_4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26', 1),
(5, 'Even the all-powerful Pointing has no control about the blind texts', 'image_5.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-26', 1),
(6, 'Even the all-powerful Pointing has no control about the blind texts', 'image_6.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', NULL, '2022-08-06', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'vegetables'),
(2, 'fruit'),
(3, 'juice'),
(4, 'dried');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name_user`, `blog_id`, `created_at`, `thumb`, `content`) VALUES
(1, 'Yi', 1, '2022-09-11 04:36:21', 'person_1.jpg', 'I love it very much'),
(2, 'chanhpro', 1, '2022-09-11 04:36:21', 'person_2.jpg', 'This is a wonderful website.I can see more vegetab'),
(3, 'Tinh121131', 2, '2022-09-11 04:52:25', 'person_1.jpg', 'sad'),
(4, 'Pham duy chánh', 3, '2022-09-11 04:56:06', 'person_1.jpg', 'This paragraph is excited '),
(6, 'admin', 1, '2022-09-24 06:15:03', NULL, 'I love it very much'),
(7, 'Yi', 1, '2022-09-25 04:14:00', 'person_1.jpg', 'aa'),
(8, 'Yi', 1, '2022-09-25 04:14:57', 'person_1.jpg', 'Everything are greatful\n'),
(9, 'Yi', 2, '2022-09-25 08:35:17', 'https://res.cloudinary.com/vku-university/image/upload/v1664087620/umqhljdbff6paj6hf5bh.jpg', 'very interesting'),
(15, 'Yi', 2, '2022-09-25 08:43:05', 'https://res.cloudinary.com/vku-university/image/upload/v1664087620/umqhljdbff6paj6hf5bh.jpg', 'aa'),
(21, 'Pham duy chánh', 5, '2022-09-25 09:29:02', 'https://res.cloudinary.com/vku-university/image/upload/v1664090919/j8r9ejay03konw5xepzx.jpg', 'Very good'),
(25, 'Pham duy chánh', 2, '2022-09-25 10:16:39', 'https://res.cloudinary.com/vku-university/image/upload/v1664090919/j8r9ejay03konw5xepzx.jpg', 'Very well');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `note`, `order_date`, `status`) VALUES
(1, 1, 'Phạm Duy Chánh', 'chanhpd.21it@vku.udn.vn', '0205851198', 'tịnh hà', 'fdfdfdsf', '2022-09-04 10:45:49', NULL),
(13, 1, 'Văn Hậu ', 'adasd@gmail.com', '444889555', 'Viet Han', '', '2022-09-04 11:05:10', NULL),
(14, 1, 'Văn Hậu ', 'd@gmail.com', '0205851198', 'Viet Han', '', '2022-09-04 11:06:11', NULL),
(15, 1, 'Văn Hậu ', '', '0205851198', 'Viet Han', 'd', '2022-09-04 11:07:06', NULL),
(16, 1, 'Văn Hậu ', '', '0205851198', 'Viet Han', 'd', '2022-09-04 11:19:49', NULL),
(17, 1, 'Phạm Văn Nam', 'phamduychanh1904@gmail.c', '0845305767', 'Viet Han', 'sdffdsfsdf', '2022-09-04 11:20:23', NULL),
(26, 1, 'Phạm Duy Chánh', 'dddd@gmail.com', '0205851198', 'Viet Han', 'dasdasdadasdada', '2022-09-04 15:56:38', NULL),
(27, 1, 'Chansh', 'd@gmail.com', 'wdwd', 'wdwd', 'wdadawd', '2022-09-04 15:57:58', NULL),
(28, 1, 'Văn Hậu ', 'fb88@r.com', '0205851198', '470 tran dai nghia', 'dddd', '2022-09-04 15:58:41', NULL),
(35, NULL, 'Le Duan', 'landisuderland@gmail.com', '0205851198', '9900 Tran THu Do Ha Noi', 'adasdasd', '2022-09-11 05:25:20', NULL),
(36, NULL, 'Le Duan', 'landisuderland@gmail.com', '0205851198', '9900 Tran THu Do Ha Noi', 'adasdasd', '2022-09-11 05:26:16', NULL),
(37, NULL, 'John', 'landisuderland@gmail.com', '0022259999', 'Wishdom', 'note', '2022-09-11 11:10:10', NULL),
(38, NULL, 'Nhan', 'tinhtd2.21it@vku.udn.vn', '123', '5500 Viet Nam', '123124', '2022-09-13 17:20:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `num` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `price`, `num`, `product_id`) VALUES
(1, 1, 120, 3, 7),
(2, 1, 120, 3, 7),
(3, 1, 120, 1, 8),
(4, 1, 120, 1, 3),
(5, 1, 120, 1, 2),
(6, 1, 120, 1, 3),
(7, 1, 120, 1, 4),
(8, 1, 120, 1, 2),
(9, 1, 120, 1, 3),
(10, 1, 120, 1, 4),
(11, 1, 120, 1, 2),
(12, 1, 120, 1, 3),
(13, 1, 120, 1, 4),
(14, 1, 120, 1, 1),
(15, 1, 120, 1, 2),
(16, 1, 120, 2, 3),
(17, 1, 120, 1, 4),
(18, 1, 120, 1, 1),
(19, 1, 120, 1, 2),
(20, 1, 120, 2, 3),
(21, 1, 120, 1, 4),
(22, 1, 120, 1, 2),
(23, 1, 120, 1, 3),
(24, 1, 120, 1, 4),
(25, 1, 120, 1, 3),
(26, 1, 1000000, 5, 2),
(32, 35, 120, 1, 1),
(33, 35, 120, 2, 7),
(34, 35, 120, 1, 10),
(35, 35, 85, 1, 11),
(36, 35, 120, 1, 12),
(37, 36, 120, 1, 1),
(38, 36, 120, 2, 7),
(39, 36, 120, 1, 10),
(40, 36, 85, 1, 11),
(41, 36, 120, 1, 12),
(42, 37, 110, 1, 6),
(43, 37, 120, 2, 7),
(44, 38, 120, 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cate` int(11) NOT NULL,
  `price` float NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `des` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `id_cate`, `price`, `sale`, `des`, `created_at`, `updated_at`, `deleted_at`, `size`, `status`) VALUES
(1, 'Bell Pepper', 'https://res.cloudinary.com/vku-university/image/upload/v1663725637/xovwssvbv6i1vmrbna5t.jpg', 1, 15, 30, 'Bell peppers, also known as sweet peppers or capsicums, are incredibly nutritious. They contain antioxidants called carotenoids that may reduce inflammation, decrease cancer risk and protect cholesterol and fats from oxidative damage', NULL, '2022-09-21', NULL, NULL, NULL),
(2, 'Strawberry', 'https://res.cloudinary.com/vku-university/image/upload/v1663757344/qi0ya7niogeycwjiy9kd.jpg', 2, 25, 0, 'These potent little packages protect your heart, increase HDL (good) cholesterol, lower your blood pressure, and guard against cancer. Packed with vitamins, fiber, and particularly high levels of antioxidants known as polyphenols, strawberries are a sodium-free, fat-free, cholesterol-free, low-calorie food.', NULL, '2022-09-21', NULL, NULL, NULL),
(3, 'Green Beans', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/product-3_updx4o.jpg', 1, 18, NULL, 'Green beans are full of fiber, which is an important nutrient for many reasons. Soluble fiber, in particular, may help to improve the health of your heart by lowering your LDL cholesterol (bad cholesterol) levels', NULL, NULL, NULL, NULL, NULL),
(4, 'Purple Cabbage', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893519/product/product-4_zurizp.jpg', 1, 20, NULL, 'Purple cabbage is a nutrient-rich vegetable linked to a variety of health benefits. These include reduced inflammation, a healthier heart, stronger bones, improved gut function, and perhaps even a lower risk of certain cancers.', NULL, NULL, NULL, NULL, NULL),
(5, 'Tomatoe', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893515/product/product-5_hth3h3.jpg', 1, 15, 30, 'Tomatoes are juicy and sweet, full of antioxidants, and may help fight several diseases. They are especially high in lycopene, a plant compound linked to improved heart health, cancer prevention, and protection against sunburns.', NULL, NULL, NULL, NULL, NULL),
(6, 'Broccoli', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893517/product/product-6_piunzv.jpg', 1, 17, NULL, 'Broccoli is rich in fiber and antioxidants — both of which may support healthy bowel function and digestive health. Bowel regularity and a strong community of healthy bacteria within your colon are two vital components to digestive health.', NULL, NULL, NULL, NULL, NULL),
(7, 'Carrots', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893517/product/product-7_mknzuq.jpg', 1, 19, 15, 'Carrots are rich in vitamins, minerals, and antioxidant compounds. As part of a balanced diet, they can help support immune function, reduce the risk of some cancers and promote wound healing and digestive health.', NULL, NULL, NULL, NULL, NULL),
(8, 'Fruit Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893517/product/product-8_nq9l7b.jpg', 3, 25, NULL, 'Fruit juices vary in nutritional value, but most have a variety of health benefits. They contain various antioxidants that help reduce the risk of certain health issues and vitamins that help the body function well.', NULL, NULL, NULL, NULL, NULL),
(9, 'Onion', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/product-9_bv3ovj.jpg', 1, 11, 30, 'Onions contain antioxidants and compounds that fight inflammation, decrease triglycerides and reduce cholesterol levels — all of which may lower heart disease risk. Their potent anti-inflammatory properties may also help reduce high blood pressure and protect against blood clots.', NULL, NULL, NULL, NULL, NULL),
(10, 'Apple', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/product-10_dtfqqv.jpg', 2, 30, NULL, 'Apples are an incredibly nutritious fruit that offers multiple health benefits. They\'re rich in fiber and antioxidants. Eating them is linked to a lower risk of many chronic conditions, including diabetes, heart disease, and cancer.', NULL, NULL, NULL, NULL, NULL),
(11, 'Garlic', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/product-11_o8vnnl.jpg', 1, 15, NULL, 'garlic could help fight inflammation, reduce cholesterol levels, and protect against chronic disease. Given its many medicinal properties, people may also wonder whether garlic can improve sexual function or increase libido.', NULL, NULL, NULL, NULL, NULL),
(12, 'Chilli', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/product-12_hruqow.jpg', 1, 10, NULL, 'Boasting high amounts of vitamin C and antioxidants, chillies have been found to help prevent lifestyle diseases including some cancers and stomach ulcers. Meanwhile, their ability to create heat within the body has also linked the peppers to weight loss as well as lowering the risk of type II diabetes.', NULL, NULL, NULL, NULL, NULL),
(13, 'Waterlemon', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/product-13_jbtvso.png', 2, 30, 15, 'In addition, several other nutrients in watermelon have specific benefits for heart health. Studies show that lycopene can help lower cholesterol and blood pressure. In obese people, postmenopausal women, and some men, lycopene helps reduce the stiffness and thickness of artery walls.', NULL, NULL, NULL, NULL, NULL),
(14, 'Red Dragon Fruit', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/product-14_f9osk9.jpg', 2, 27, NULL, 'Dragon fruit is a food that grows on a climbing cactus called hylocereus, which you\'ll find in tropical regions around the world. The plant’s name comes from the Greek word \"hyle,\" which means \"woody,\" and the Latin word \"cereus,\" which means \"waxen.\" ', NULL, NULL, NULL, NULL, NULL),
(15, 'Salad', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893517/product/salad_ny3pka.jpg', 1, 8, NULL, 'Salad greens contain Vitamin A, Vitamin C, beta-carotene, calcium, folate, fiber, and phytonutrients (see Table 1). Leafy vegetables are a good choice for a healthful diet because they do not contain cholesterol and are naturally low in calories and sodium.', NULL, NULL, NULL, NULL, NULL),
(16, 'Kiwi', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/kiwi_qxyord.jpg', 2, 33, NULL, 'Kiwis are high in Vitamin C and dietary fiber and provide a variety of health benefits. This tart fruit can support heart health, digestive health, and immunity. The kiwi is a healthy choice of fruit and is rich with vitamins and antioxidants', NULL, NULL, NULL, NULL, NULL),
(17, 'Grapefruit Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/Grapefruit_Juice_rhcdg0.jpg', 3, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Apple Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893520/product/apple_juice_pmnzwy.jpg', 3, 35, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Pomegranate Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/Pomegranate_Juice_njcinb.jpg', 3, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Blueberry Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/Blueberry_Juice_umwxvw.jpg', 3, 50, 12, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Tart Cherry Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893518/product/Tart_Cherry_Juice_ixyqfq.jpg', 3, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Prunes', 'https://res.cloudinary.com/vku-university/image/upload/v1663730531/yfkpx8kdta28unwcj2wb.webp', 4, 44, NULL, 'Dried prunes are an important source of the mineral boron, which can help build strong bones and muscles. It may also help with improving mental', NULL, '2022-09-21', NULL, NULL, NULL),
(23, 'Walnuts', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/Walnuts_vv4lzw.jpg', 4, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Raisins', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893517/product/Raisins_yk9kjq.jpg', 4, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Almond', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893516/product/Almond_oekj5f.webp', 4, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Pistachios', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893521/product/Pistachios_l3bljr.jpg', 4, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Orange Juice', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662893519/product/orange_juice_vhajpv.jpg', 3, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Cashew', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662900472/product/gia-hat-dieu-2_w5l8ec.jpg', 4, 50, 80, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Banana', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662900272/product/banane-large_w0yhaf.jpg', 2, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Grape', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662900390/product/grape_229112122_lenw8c.jpg', 2, 50, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Cauliflower', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662901184/product/cauliflower_vso80q.jpg', 1, 35, NULL, NULL, '2022-09-11', NULL, NULL, NULL, NULL),
(33, 'Mint', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662902407/product/mint_vheujt.jpg', 1, 18, NULL, 'Mint is a particularly good source of vitamin A, a fat-soluble vitamin that is critical for eye health and night vision ( 2 ). It is also a potent source of antioxidants, especially when compared to other herbs and spices.', NULL, NULL, NULL, NULL, NULL),
(34, 'Mushroom', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662902408/product/mushroom_j8nkiq.jpg', 1, 42, 15, 'Mushrooms are a rich, low calorie source of fiber, protein, and antioxidants. They may also mitigate the risk of developing serious health conditions, such as Alzheimer\'s, heart disease, cancer, and diabetes.', '2022-08-31', NULL, NULL, NULL, NULL),
(35, 'mangosteen', 'https://res.cloudinary.com/dxzr2klk5/image/upload/v1662902409/product/mangosteen_zubpn1.jpg', 2, 75, NULL, ' Mangosteen is a rich source of antioxidants and vitamins. The special antioxidant found in abundance that gives the fruit a superior edge', '2022-09-11', NULL, NULL, NULL, NULL),
(36, 'Mango', 'https://res.cloudinary.com/vku-university/image/upload/v1663727088/u7ktfrod9qn6cbinvxfk.jpg', 2, 12, 5, 'Mango, the “King of the fruits” is a drupe fruit that grows in tropical regions. It has yellow-coloured tangy pulp, with a unique flavour and fragrance.', '2022-09-21', '2022-09-21', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `id_role`, `name`, `password`, `email`, `phone`, `address`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Yi', '123', 'user1@gmail.com', '046020011133', '4700 Trần Đại Nghĩa, Đà Nẵng', 'https://res.cloudinary.com/vku-university/image/upload/v1664087620/umqhljdbff6paj6hf5bh.jpg', '2022-09-22', NULL, NULL),
(2, 1, 'admin', '$2y$10$GYvWbtLWkBDDRl1Fg/j0puw45aCpcPJv3aOPUC3QQXAGQmTK.2pV2', 'admin123@gmail.com', '9438504353', '30 Hai Bà Trưng - Đà Nẵng', '', '2022-09-07', NULL, NULL),
(3, 2, 'chanhpro', '123456', 'd@gmail.com', '0205851198', '9900 Tran THu Do Ha Noi', NULL, '2022-09-12', NULL, NULL),
(7, 2, 'Tinh121131', '', '', '55212322212', '470 Trần Đại Nghĩa, Đà Nẵng', NULL, '2022-09-12', NULL, NULL),
(29, 2, 'Pham duy chánh', '1234', 'chanhpd@gmail.com', '123456789', '9900 Tran THu Do Ha Noi', 'https://res.cloudinary.com/vku-university/image/upload/v1664090919/j8r9ejay03konw5xepzx.jpg', '2022-09-12', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_user` (`id_user`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_blog` (`blog_id`),
  ADD KEY `name_user` (`name_user`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details` (`id_order`),
  ADD KEY `order_product` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product` (`id_cate`);

--
-- Chỉ mục cho bảng `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `role_user` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`name_user`) REFERENCES `user` (`name`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
