-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 11:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsell`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `id_user`, `id_sanpham`, `soluong`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(7, NULL, 1, 69, 1, NULL, 120000, 'Paypal', 'hup', '2022-06-08 08:08:31', '2022-06-08 08:08:31'),
(6, 5, 1, 69, 1, NULL, 120000, 'Thanh Toán Tiền Mặt', 'ko', '2022-06-06 04:51:39', '2022-06-06 04:46:31'),
(8, NULL, 1, 63, 2, NULL, 136000, 'Thanh Toán Tiền Mặt', '123123123', '2022-06-08 08:49:22', '2022-06-08 08:49:22'),
(9, NULL, 1, 67, 4, NULL, 592000, 'Thanh Toán Tiền Mặt', '123123123', '2022-06-08 08:49:22', '2022-06-08 08:49:22'),
(10, NULL, 1, 68, 6, NULL, 990000, 'Thanh Toán Tiền Mặt', '123123123', '2022-06-08 08:49:22', '2022-06-08 08:49:22'),
(11, NULL, 1, 66, 6, NULL, 1350000, 'Thanh Toán Tiền Mặt', '123123123', '2022-06-08 08:49:22', '2022-06-08 08:49:22'),
(12, NULL, 1, 70, 1, NULL, 195000, 'Paypal', 'sdfdsf', '2022-06-08 08:51:35', '2022-06-08 08:51:35'),
(13, NULL, 1, 64, 4, NULL, 272000, 'Thanh Toán Tiền Mặt', 'f', '2022-06-10 04:16:33', '2022-06-10 04:16:33'),
(14, NULL, 1, 70, 1, NULL, 195000, 'Thanh Toán Tiền Mặt', 'd', '2022-06-10 05:03:56', '2022-06-10 05:03:56'),
(15, NULL, 1, 66, 1, NULL, 225000, 'Thanh Toán Tiền Mặt', 'd', '2022-06-10 05:03:56', '2022-06-10 05:03:56'),
(16, NULL, 1, 67, 1, NULL, 148000, 'Paypal', '2\r\n13', '2022-06-10 05:39:30', '2022-06-10 05:39:30'),
(17, NULL, 1, 69, 1, NULL, 120000, 'Paypal', 'hup de', '2022-06-10 05:41:02', '2022-06-10 05:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 5000, '2017-03-11 13:10:10', '0000-00-00 00:00:00'),
(2, 5, 12, 1, 10000, '2017-03-11 13:08:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `thanhtoan` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `name`) VALUES
(1, 'Món dùng ngay'),
(2, 'Món chế biến sẵn'),
(3, 'Đồ uống');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(5, 'Huong Huong', 'Nữ', 'huongnguyenak96@gmail.com', 'le thi rieng', '55555555', '55555555555555', '2016-11-14 08:25:57', '2016-11-14 08:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `new`, `status`, `created_at`, `updated_at`) VALUES
(63, 'SALAD RAU MÙA SỐT CAM TASTY', 8, 'Salad rau mùa sốt cam TASTY là sự lựa chọn tuyệt vời cho các tín đồ yêu eat clean. Món ăn có đến 5 loại xà lách (carol, frise, lô lô tím, xà lách mỡ và radicchio tím) kết hợp cùng các loại trái cây như táo, cà chua, ô liu... mang lại nguồn vitamin tổng hợp dồi dào, hỗ trợ tăng cường đề kháng cho cơ thể. Điểm nhấn tạo nên nét chấm phá cho món nằm ở nước sốt cam độc đáo với vị chua ngọt tự nhiên dịu dàng. Salad rau mùa sốt cam TASTY thực sự là một bữa tiệc về màu sắc, xua tan cơn nóng mùa hè, đánh thức tối đa vị giác.', 68000, 0, 'salad-bo-1280x1000-4dbe.jpg', '1', 1, '2022-06-06 03:30:42', '2022-06-06 03:33:40'),
(64, 'SALAD RAU MÙA SỐT MÁC MÁC', 8, 'Salad rau mùa sốt mác mác được lựa chọn từ những loại rau củ ẩm thực phương Tây như xà lách lolo, xà lách carron, dầu oliu, kết hợp với hương đồng cỏ nội trong văn hoá ẩm thực Việt Nam là củ dền, táo đỏ, táo xanh, chanh dây và rau quế. Tất cả được hòa quyện dưới lớp sốt mác mác rau mùi được cấu thành bởi 3 thành phần chính là chanh dây, rau mùi và mayonaise, đem đến hương vị độc đáo, giàu vitamin C và chất xơ.', 68000, 0, '18-salad-rau-mua-3-fea4.jpg', '0', 1, '2022-06-06 03:39:22', '2022-06-06 03:39:22'),
(65, 'NEM CHUA TASTY', 8, 'Khác với các loại nem chua thông thường, Nem chua TASTY mang hương vị đặc trưng của người miền Bắc qua bàn tay tài hoa của các đầu bếp TASTY dễ dàng làm \"xiêu lòng\" mọi thực khách. Món ăn được chế biến hoàn toàn thủ công, trải qua nhiều công đoạn, kết hợp các nguyên liệu chất lượng như thịt heo nóng, da heo cùng các gia vị khác, sử dụng phương pháp lên men tự nhiên tạo nên vị chua ngậy đầy hấp dẫn. Một trong những nguyên liệu chủ đạo làm gia tăng mùi vị thơm lừng xen lẫn chút bùi bùi, béo béo là thính bắp rang chín vàng, không quá cháy cũng chẳng quá non. Nem chua TASTY dùng kèm với lá sung, đinh lăng, tỏi cô đơn và ớt hiểm chấm thêm tương ớt mang đến hương vị vừa quen, vừa lạ, là lựa chọn mà các tín đồ mê ăn vặt không thể bỏ qua.', 78000, 0, 'nem-chua-423b.jpg', '0', 1, '2022-06-06 03:48:05', '2022-06-06 03:48:05'),
(66, 'GÀ LẠNH Ủ MUỐI HOA TIÊU', 9, 'Gà lạnh ủ muối hoa tiêu món - món ăn tưởng chừng đơn giản nhưng đòi hỏi sự chăm chút kỹ lưỡng từ khâu lựa chọn nguyên liệu cho đến cách căn chỉnh nguyên liệu thật hài hòa. Loại gà được sử dụng trong món là gà ta thả vườn chính vì vậy thịt gà luôn đảm bảo chất lượng và có độ mềm dai vừa phải. Thêm vào đó, các đầu bếp TASTY còn sử dụng những gia vị hoàn toàn tự nhiên như: đinh hương, thảo quả, hoa hồi, quế cây, lá nguyệt quế, sả, gừng, nghệ tươi,... đi cùng đó là gia vị đặc biệt: muối hột và hoa tiêu. Đây cũng là một trong số những bí quyết giúp lớp da gà vàng ươm thêm giòn sần sật, thịt gà săn chắc, vị ngon ngọt đậm đà đồng thời thơm nồng mùi hoa tiêu hấp dẫn.', 225000, 0, 'ga-lanh-2782.jpg', '0', 1, '2022-06-06 04:11:30', '2022-06-06 04:11:30'),
(67, 'CÀ RI GÀ', 9, 'Với công thức đặc biệt được nghiên cứu từ các đầu bếp TASTY nhằm chinh phục khẩu vị tinh tế của người Việt, Cà ri gà TASTY là một món ngon không thể bỏ lỡ để đổi vị hoàn hảo cho mâm cơm tại gia. Từng miếng thịt gà ta mềm ngọt được tẩm ướp kĩ càng hòa quyện đều trong nước súp sánh ngọt của nước cốt dừa béo ngậy và khoai lang bùi bùi, hòa quyện cùng vị cay the nồng nàn của các loại gia vị, thích hợp ăn cùng cơm nóng hoặc ăn kèm bánh mì.', 148000, 0, 'ca-ri-ga-2-7986.jpg', '1', 1, '2022-06-06 04:12:26', '2022-06-06 04:12:26'),
(68, 'MÌ SOBA TÔM SỐT CAM CAY', 9, 'Mì soba tôm sốt cam cay là sự kết hợp đầy thú vị và sáng tạo của ẩm thực châu Á. Từ sợi mì soba xuất xứ Nhật Bản chứa nhiều protein, mangan, chất xơ và nhiều dưỡng chất tốt cho sức khỏe hòa quyện cùng vị ấn tượng của Nước sốt cam cay - Lấy ý tưởng từ sốt ớt nổi tiếng Singapore thêm biến tấu với nước cam cô đặc và thịt cua tạo ra hương vị mới lạ, đầy hấp dẫn. Chút nhấn nhá cùng phần tôm sú tươi tẩm ướp cẩn thận với gừng, vỏ quế và hoa hồi,...mang đến một món ăn độc đáo làm thực khách nhớ mãi.', 165000, 0, 'mi-soba-tom-1280x1000-b890.jpg', '1', 1, '2022-06-06 04:13:26', '2022-06-06 04:13:26'),
(69, 'CANH CHUA CÁ LÓC', 10, 'Canh chua cá lóc dưới sự chế biến của các đầu bếp TASTY Kitchen mang đến hương vị tuyệt hảo mà bạn chưa từng thưởng thức trước đây. Với phần nước canh trong vắt màu nâu hoàn toàn tự nhiên từ me, vị đậm đà thêm chút chua chua đặc sắc. Đi kèm đó là thịt cá lóc tươi ngon được xử lý tinh tế có mùi thơm hấp dẫn. Đặc biệt hơn, món ăn còn dễ dàng kích hoạt vị giác khi dậy mùi thơm của các loại rau nêm phong phú', 120000, 0, 'canh-chua-ca-loc-1280x1000-368f.jpg', '1', 1, '2022-06-06 04:14:50', '2022-06-06 04:14:50'),
(70, 'ĐỊA SÂM TIỀM TRÁI DỪA', 10, 'Địa sâm tiềm trái dừa được các đầu bếp TASTY Kitchen nâng tầm từ món ăn cổ truyền của Miền Bắc kết hợp nhiều nguyên liệu phong phú tốt cho sức khỏe. Với phần nước dùng chế biến từ địa sâm là một loại hải sản quý hiếm giàu axit amin, glyxin, các loại khoáng chất giúp thanh nhiệt dương khí. Thêm vào đó là bóng bì chứa nhiều collagen làm chậm quá trình lão hóa cùng tôm thẻ tươi ngon, ngọt thịt. Tất cả hòa quyện tạo nên món canh bổ dưỡng, thanh tao dễ hấp thụ, thích hợp trong mọi thời tiết.', 195000, 0, 'dia-sam-trai-dua-1280x1000-df54.jpg', '0', 1, '2022-06-06 04:16:23', '2022-06-09 09:08:46'),
(71, 'CANH MƯỚP HƯƠNG NHỒI THỊT', 10, 'Canh mướp hương nhồi thịt được xử lý đầy tinh tế mang đến vị ngọt thanh và hương thơm thoang thoảng kích thích vị giác. Mướp hương vốn là loại quả quen thuộc được nhiều người ưa thích có vị ngọt, tính mát cùng nhiều dưỡng chất tốt cho sức khỏe. Đặc biệt kết hợp với phần nhân làm từ tôm bạc thẻ, thịt heo xay, giò sống heo giúp tăng thêm vị đậm đà, sự dai giòn ấn tượng. Đi cùng vị ngọt thuần chất của các loại củ như su hào, bắp mỹ trái, hành baro, củ sắn...chắc chắn sẽ mang đến trải nghiệm khó quên.', 120000, 0, 'canh-muop-1280x1000-final-2109.jpg', '0', 0, '2022-06-06 04:17:03', '2022-06-06 04:17:03'),
(72, 'CƠM CHẢ CUA HOÀNG KIM', 11, 'Cơm chả cua hoàng kim với sự đặc biệt khi chả của được làm 100% thủ công. Từ khâu chọn lựa nguyên vật liệu chất lượng, đánh thịt làm giò sóng, sau đó kết hợp với các nguyên liệu như nấm mèo, miến, thịt cua miếng và thịt cua xé nhuyễn. Điểm nhấn đặc biệt nhất là trứng muối béo bùi, tất cả làm nên một hương vị chả cua chỉ có tại TASTY Kitchen. Chả cua được ăn kèm với cơm gạo ST25 hảo hạng, thơm ngon, dẻo bùi, cùng đồ chua được ngâm thủ công tại bếp đảm bảo chất lượng và hương vị độc đáo. Nước mắm được xem như linh hồn của món được pha chế công phu, khi độ ngọt thanh tự nhiên đến từ nước dừa tươi nấu lên làm thành thứ nước mắm đặc kẹo và là mảnh ghép cuối cùng cho sự tròn trịa hương vị của món tuy quen mà lạ.', 75000, 0, 'com-cha-cua-66f6.jpg', '0', 0, '2022-06-06 04:23:16', '2022-06-06 04:23:16'),
(73, 'CHÁO BÒ BẰM TRỨNG BẮC THẢO [RTC]', 13, '- Khuấy cháo nhẹ trong quá trình hâm, tránh cháy dưới đáy nồi và cháo bị tách lớp.\r\n\r\n - Không microwave bò xào, trứng bắc thảo trong bao hút chân không kín.\r\n\r\n - Ngon hơn khi dùng kèm tiêu xay, hành phi, hành lá, rau răm.', 74000, 0, 'bo-ham-cu-cai-af61.jpg', '0', 0, '2022-06-06 04:25:12', '2022-06-06 04:25:12'),
(74, 'CỦ SEN XÓC MUỐI RONG BIỂN 60 GR', 14, 'Sau khi mở nắp sử dụng hết trong 03 ngày.\r\n\r\nBảo quản nơi khô ráo, thoáng mát. Đậy kín nắp hộp khi sử dụng không hết.', 48000, 0, 'cu-sen-pho-mai-60gr-1b8f.jpg', '0', 0, '2022-06-06 04:26:32', '2022-06-06 04:26:57'),
(75, 'TRÀ SỮA SẦU RIÊNG CHAI 250ML', 16, 'Hạn sử dụng 72H \r\n\r\nNên sử dụng trong vòng 24h kể từ khi mở nắp\r\n\r\nLắc đều trước khi sử dụng', 48000, 0, 'tra-sua-sau-rieng-142b.jpg', '0', 0, '2022-06-06 04:28:24', '2022-06-06 04:28:24'),
(76, 'TRÀ SỮA KHOAI LANG VÀNG', 17, 'Sử dụng nguyên liệu khoai lang mật nông sản nổi tiếng tại Việt Nam, kết hợp cùng trà oolong, mang đến sản phẩm vừa quen thuộc vừa mới lạ. Thơm vị trà olong & khoai lang vàng, ngọt dịu', 48000, 0, 'tra-sua-khoai-lang-ac8e.jpg', '1', 0, '2022-06-06 04:29:21', '2022-06-06 04:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL,
  `id_sanpham` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_image` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `id_sanpham`, `customer_name`, `customer_image`, `review`, `updated_at`, `created_at`) VALUES
(1, 73, 'Phạm Tiến Đức', '278762605_1411798959265016_8115676779592581896_n.jpg', 'Ngon', '2022-06-09 10:18:57', '2022-06-09 10:18:57'),
(2, 73, 'Phạm Tiến Đức', '278762605_1411798959265016_8115676779592581896_n.jpg', 'very suong', '2022-06-09 10:22:17', '2022-06-09 10:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tittle` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `image`, `tittle`, `content`, `link`, `created_at`, `updated_at`) VALUES
(5, 'Slide-01', 'group-863-97d5.png', 'Chú thích 1', 'Nội dung', 'https://tiki.vn/tikingon/soi-bien-203-trung-kinh-i259884', '2022-06-06 04:20:58', '2022-06-06 04:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `id_category`, `created_at`, `updated_at`) VALUES
(8, 'Khai vị', 1, '2022-06-06 03:17:45', '2022-06-06 03:17:45'),
(9, 'Món chính dùng ngay', 1, '2022-06-06 03:18:01', '2022-06-06 03:49:58'),
(10, 'Canh-Tiềm-Súp', 1, '2022-06-06 03:18:15', '2022-06-06 03:18:15'),
(11, 'Cơm-Mỳ-Cháo', 1, '2022-06-06 03:18:27', '2022-06-06 03:18:27'),
(12, 'Tráng miệng', 1, '2022-06-06 03:18:34', '2022-06-06 03:18:34'),
(13, 'Món chính chế biến sẵn', 2, '2022-06-06 03:19:30', '2022-06-06 03:50:31'),
(14, 'Ăn vặt', 2, '2022-06-06 03:19:40', '2022-06-06 03:19:40'),
(15, 'Sốt', 2, '2022-06-06 03:19:51', '2022-06-06 03:19:51'),
(16, 'Đồ uống dùng trong ngày', 3, '2022-06-06 03:20:12', '2022-06-06 03:20:12'),
(17, 'Đồ uống đóng chai', 3, '2022-06-06 03:20:22', '2022-06-06 03:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user.png',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `phone`, `address`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Tiến Đức', 'cuongnew37@gmail.com', '$2y$10$qitS6Uds5hfIC.m93Hiuw.AB3.joQxA1/5FHSew/7tjnhvBdZ0HNe', '278762605_1411798959265016_8115676779592581896_n.jpg', '0976947354', NULL, 0, NULL, '2022-06-06 01:56:51', '2022-06-15 04:49:29'),
(2, 'Phạm Tiến Duat', 'ducpham0307@gmail.com', '$2y$10$mxteLp6cE3WuDPFDagoAg.gSLoZim3xAtoJO3fxFTB/FVz6mTYXqi', 'user.png', '0976947356', NULL, 1, NULL, '2022-06-06 02:49:51', '2022-06-06 02:49:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
