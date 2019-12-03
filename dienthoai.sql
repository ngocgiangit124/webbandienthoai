-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2019 lúc 01:03 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `photo`, `status`) VALUES
(3, 'YUVL606c44f2b2eb54b50dfa.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sach', 'sach', 0, 'sach', 'sach', '2019-11-03 13:19:56', '2019-11-03 13:19:56'),
(2, 'vo', 'vo', 1, 'ưq', 'ưq', '2019-11-03 13:44:59', '2019-11-03 13:44:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_24_072131_create_contacts_table', 1),
(4, '2017_10_24_072147_create_categories_table', 1),
(5, '2017_10_24_072437_create_products_table', 1),
(6, '2017_10_24_072513_create_product_images_table', 1),
(7, '2017_10_24_072629_create_product_sizes_table', 1),
(8, '2017_10_24_072708_create_orders_table', 1),
(9, '2017_10_24_072720_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_order` datetime NOT NULL,
  `total` double NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `date_order`, `total`, `payment`, `status`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2019-11-03 20:26:13', 2688.62, 'Cash On Delivery', '0', 'llll', 1, '2019-11-03 13:26:13', '2019-11-03 13:26:13'),
(2, '2019-11-03 20:26:49', 1344.31, 'Cash On Delivery', '0', 'ggg', 1, '2019-11-03 13:26:49', '2019-11-03 13:26:49'),
(3, '2019-11-03 20:27:42', 1344.31, 'Cash On Delivery', '0', '', 1, '2019-11-03 13:27:42', '2019-11-03 13:27:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `unit_price`, `size`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1111, '12', 1, 2, '2019-11-03 13:26:49', '2019-11-03 13:26:49'),
(2, 1, 1111, '12', 1, 3, '2019-11-03 13:27:42', '2019-11-03 13:27:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_new` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(244) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `price_new`, `status`, `intro`, `content`, `image`, `keywords`, `description`, `screen`, `camera1`, `camera2`, `ram`, `rom`, `cpu`, `gpu`, `battery_capacity`, `operating_system`, `sim`, `origin`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'sachg', 'sachg', 1111, 1000, '1', '<p>dsfdsfrewr</p>', '<p>rewrewrew</p>', '88cec06369738f2dd662.jpg', 'rwe', '<p>ewrwe</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-11-03 13:21:08', '2019-11-03 15:19:40'),
(3, 'sach', 'sach', 44444, NULL, '1', '<p>rrrr</p>', '<p>rrrr</p>', 'chu-meo-xinh-dep-nhat-the-gioi1-suckhoecuocsongcomvn.jpg', '444', '<p style=\"text-align:justify\"><strong>Tuyệt tác của thiết kế với màn hình Infinity-O độc đáo lần đầu tiên đã xuất hiện. Không đơn thuần là một chiếc điện thoại,&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-s10\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(24, 72, 122);\" target=\"_blank\">Samsung S10</a>&nbsp;còn là đỉnh cao của công nghệ.</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Samsung S10\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s10-mo-ta-3.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" title=\"Samsung S10\" /></strong></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Màn hình vô cực Infinity-O, xóa bỏ mọi giới hạn</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Gần như toàn bộ phần viền màn hình đã được loại bỏ trên Samsung Galaxy S10, không có tai thỏ, không bị hạn chế tầm nhìn, trước mắt bạn là màn hình cực lớn 6,1 inch hiển thị vô cùng sống động. Viền cong siêu mỏng tràn cả 4 cạnh kết hợp cùng các đường cắt laser chuẩn xác khéo léo giấu kín camera nằm ngay trên màn hình. Galaxy S10 xứng đáng được gọi là một kiệt tác ngay trên tay bạn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Màn hình Samsung S10\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s10-mo-ta-12.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" title=\"màn hình Samsung S10\" /></p>\r\n\r\n<p style=\"text-align:justify\">Công nghệ màn hình Dynamic AMOLED thế hệ mới mang đến hình ảnh chuẩn HDR10+, độ phân giải Quad HD+ siêu sắc nét. Mọi khung hình đều hiện lên chân thực, độ tương phản cao và màu sắc vô cùng sống động. Màn hình hiển thị chuẩn điện ảnh, kết hợp cùng hệ thống âm thanh nổi của loa ngoài stereo, công nghệ Dolby Atmos khiến Samsung S10 trở thành phương tiện giải trí di động hoàn hảo nhất.</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Tương lai của công nghệ bảo mật với cảm biến vân tay siêu âm</strong></h3>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2019-11-23 06:44:31', '2019-12-01 05:20:23'),
(4, 'Realme 5 Pro 4GB-128GB', 'realme-5-pro-4gb-128gb', 5690000, 0, '1', '<p>ko cos</p>', NULL, '637039047783649777_realme-5-pro-green-1.png', 'xx', '<div class=\"fs-dtctbox fsdtcts clearfix\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; zoom: 1; line-height: 1.5; font-family: Arial, Helvetica, sans-serif;\">\r\n<p style=\"text-align:justify\"><strong>Siêu phẩm công nghệ Realme 5 Pro sở hữu những tính năng hot nhất hiện nay, bao gồm cấu hình mạnh mẽ, 4 camera 48MP AI đẳng cấp, sạc nhanh VOOC 3.0, thiết kế ấn tượng và rất nhiều điều đang chờ bạn khám phá.</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-3.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></strong></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>4 camera siêu sắc nét</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Realme 5 Pro sở hữu tới 4 camera sau, trong đó camera chính sử dụng cảm biến hàng đầu Sony IMX 586, có độ phân giải siêu cao 48MP, khẩu độ lớn f/1.8 và kích thước cảm biến lên tới ½ inch. Với cảm biến camera chất lượng cùng phương pháp ghép điểm ảnh 4-in-1, Realme 5 Pro tự tin chụp được những bức ảnh tuyệt vời trong điều kiện thiếu sáng. Hãy tận hưởng vẻ đẹp về đêm lung linh qua ống kính chuyên nghiệp của Realme 5 Pro.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"camera Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-1.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Góc siêu rộng cho những điều kỳ vĩ</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Với ống kính góc siêu rộng của Realme 5 Pro, bạn sẽ có cơ hội tận hưởng mọi thứ lớn hơn 150%. Hình ảnh thu được rộng lớn hơn, rất thích hợp khi chụp ảnh thiên nhiên kỳ vĩ hay những công trình kiến trúc độc đáo. Realme 5 Pro mang cả thế giới vào trong tầm mắt của bạn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"góc siêu rộng Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-5.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Nhìn thấy những điều nhỏ nhất</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Cuộc sống quanh ta luôn ẩn chứa những điều thú vị. Realme 5 Pro giúp bạn nhìn thấy những điều nhỏ nhất trong cuộc sống bằng khả năng chụp ảnh Ultra Macro, chụp vật thể nhỏ ở cự li siêu gần chỉ 4cm. Những con côn trùng, sinh vật nhỏ bé hay nụ hoa tươi thắm đều được camera thu lại một cách độc đáo.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"macro Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-8.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Chuyên gia chụp ảnh chân dung</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Sử dụng tới 2 camera hỗ trợ đo chiều sâu, ảnh chụp chân dung của Realme 5 hoàn mỹ hơn bao giờ hết. Từ khả năng phơi sáng, nhiệt độ màu đến việc tách biệt chủ thể với phông nền đều được chăm chút tỉ mỉ, mang tới cho bạn những bức ảnh chân dung xóa phông có hiệu ứng đầy nghệ thuật.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"chân dung xóa phông Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-7.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Hiệu năng mạnh mẽ, chiến game cực đỉnh</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Realme 5 Pro trang bị bộ vi xử lý Snapdragon 712 AIE, một trong những con chip mạnh mẽ nhất hiện nay. Snapdragon 712 được sản xuất trên tiến trình mới 10nm, có 8 nhân xung nhịp tối đa 2,3GHz và GPU đồ họa Adreno 616 đỉnh cao. Bạn sẽ có một chiếc điện thoại tốc độ cực nhanh, xử lý mượt mà mọi ứng dụng và chơi game tuyệt vời. Đặc biệt, Realme 5 Pro có sẵn bộ nhớ trong 128GB, tha hồ lưu trữ mọi thứ ở tốc độ cao mà không lo đầy bộ nhớ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"hiệu năng Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-9.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Sạc siêu nhanh VOOC 3.0</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Thời lượng pin là một thế mạnh của Realme 5 Pro khi bên cạnh viên pin dung lượng cao 4035 mAh, Realme 5 Pro còn có công nghệ sạc siêu nhanh VOOC 3.0 tiên tiến. Bạn có thể sử dụng thoải mái cả ngày với những tác vụ nặng. Không chỉ sạc cực nhanh, công nghệ VOOC 3.0 trên Realme 5 Pro cũng cho phép sạc nhanh ngay cả khi đang chơi game, điều không có ở những điện thoại khác. Tha hồ tận hưởng đam mê của bạn, Realme 5 Pro luôn cung cấp đầy đủ năng lượng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"sạc siêu nhanh Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-10.JPG\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Lấp lánh như kim cương</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Không đơn thuần là một sản phẩm công nghệ, Realme 5 Pro là một tác phẩm nghệ thuật đích thực. Thiết kế mặt lưng phản chiếu ánh sáng với những khối kim cương độc đáo, lấp lánh đầy sang trọng. Mỗi lần bạn nhìn vào điện thoại đều cảm thấy hứng khởi bởi kiểu dáng độc đáo tuyệt đẹp mà Realme 5 Pro mang lại.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"thiết kế Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-5.JPG\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Màn hình lớn hơn, máy gọn gàng hơn</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Tận hưởng những nội dung sống động trên màn hình 6,3 inch Full HD+ siêu sắc nét của Realme 5 Pro. Dù màn hình lớn nhưng nhờ viền màn hình được thu hẹp lên, tăng tỉ lệ diện tích màn hình trên thân máy lên 90,6%, giúp Realme 5 Pro vẫn gọn gàng và hoàn hảo trên tay. Một chiếc máy màn hình lớn cực đã nhưng vẫn đảm bảo nhỏ gọn, đây quả là điều hết sức tuyệt vời.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"màn hình Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-6.JPG\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Chống nước hiệu quả</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Realme 5 Pro có khả năng chống nước cơ bản, giúp bạn tránh được mọi nguy cơ thường ngày từ nước. Bất ngờ đổ café lên điện thoại, tình cờ gặp mưa, hay đánh rơi máy xuống hồ bơi, … Tất cả đã không còn là mối lo nữa với khả năng chống nước vô cùng bền vững của Realme 5 Pro.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"chống nước Realme 5 Pro\" class=\"lazydetail\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/realme-5-pro-4.JPG\" style=\"background:transparent; border:0px; box-sizing:border-box; display:inline; height:auto !important; margin:0px 0px 10px; max-width:100%; padding:0px; vertical-align:middle; width:840px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><em>Lưu ý: Realme 5 Pro chỉ chống nước cơ bản trong hoạt động thường ngày của bạn, không nên ngâm nước hoặc cố tình mang điện thoại xuống nước.</em></p>\r\n\r\n<div>&nbsp;</div>\r\n</div>', '6.3 inchs, Full HD +, 1080 x 2340 Pixels', '16.0 MP', '48 MP, 8 MP + 2MP + 2MP ( 4 camera )', 'Realme 5 Pro 4GB-128GB', 'Realme 5 Pro 4GB-128GB', 'Qualcomm Snapdragon 712 AIE, 8, 2.3GHZ', 'Adreno 616', '4035mAh', 'ColorOS 6.0.1, nền tảng Android 9.0', NULL, NULL, 1, 2, '2019-12-01 05:21:46', '2019-12-01 15:51:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(4, '637039047783139834_realme-5-pro-green-4.png', 4, '2019-12-01 15:51:32', '2019-12-01 15:51:32'),
(5, '637039047782599901_realme-5-pro-green-3.png', 4, '2019-12-01 15:51:32', '2019-12-01 15:51:32'),
(6, '637039047782199994_realme-5-pro-green-5.png', 4, '2019-12-01 15:51:32', '2019-12-01 15:51:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '12', 1, '2019-11-03 13:24:57', '2019-11-03 13:24:57'),
(3, 'màu đỏ', 3, '2019-11-23 06:44:31', '2019-11-29 14:26:16'),
(4, 'xanh', 4, '2019-12-01 05:21:46', '2019-12-01 15:45:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `gender`, `address`, `phone`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'gg', 'gg', 'admin@gmail.com', '$2y$10$Bw4UJ0lhZoRO4Xsg6OnRqOgpHTQfCxDyr0qPD3AzhQfco.ZlpiF86', '', '', '', 1, '', 'rgwRlBKxks4mfAbRbQwig5KKNziKetNGIqRGRBknfrsdzJFXPLtY2rzdm0m5', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
