-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 08:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hahadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `tieude1` varchar(200) DEFAULT NULL,
  `tieude2` varchar(200) DEFAULT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  `loaibanner` varchar(50) NOT NULL,
  `linkweb` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `tieude1`, `tieude2`, `hinhanh`, `loaibanner`, `linkweb`) VALUES
(37, 'Đặt Huawei Watch <br>giá tốt quà ngon', '', 'images/banner/800-300-800x300-18.png', 'ThanhTruot', ''),
(38, 'Phụ kiện Online <br>đồng giá', '', 'images/banner/banner2.png', 'ThanhTruot', ''),
(39, 'Tháng 5 rực rỡ<br> giảm đến 40%', '', 'images/banner/banner5.png', 'ThanhTruot', ''),
(40, 'Độc quyền<br> Galaxy A51', '', 'images/banner/a51-800-300-800x300-3.png', 'ThanhTruot', ''),
(41, 'Iphone 7<br> Giảm sâu', '', 'images/banner/banneriphone7-800x300.png', 'ThanhTruot', ''),
(47, '', '', 'images/banner/A31.png', 'BenCanh', ''),
(45, '', '', 'images/banner/AppleStiky.png', 'BenCanh', 'http://localhost/Mobile/sanphamtheohang.php?hang=Apple'),
(46, '', '', 'images/banner/combo-A3-1-398-110-398x110.png', 'BenCanh', '');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `stt` int(5) NOT NULL,
  `madh` int(5) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `soluong` int(5) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`stt`, `madh`, `masp`, `soluong`, `dongia`, `thanhtien`) VALUES
(22, 1, 'HW01', 1, 23990000, 23990000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(5) NOT NULL,
  `matk` varchar(50) NOT NULL,
  `ngaymua` date NOT NULL,
  `tongtien` float NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madh`, `matk`, `ngaymua`, `tongtien`, `trangthai`) VALUES
(1, 'khach1', '2020-06-08', 23990000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `mahang` varchar(30) NOT NULL,
  `tenhang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Hãng điện thoại';

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`mahang`, `tenhang`) VALUES
('Samsung', 'Samsung'),
('Vsmart', 'Vsmart'),
('Oppo', 'Oppo'),
('Xiaomi', 'Xiaomi'),
('Vivo', 'Vivo'),
('Apple', 'Apple'),
('Realme', 'Realme'),
('Huawei', 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(5) NOT NULL,
  `masp` varchar(20) NOT NULL,
  `giakhuyenmai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `masp`, `giakhuyenmai`) VALUES
(7, 'XM01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `maquyen` int(2) NOT NULL,
  `tenquyen` varchar(20) NOT NULL,
  `qlbanner` tinyint(1) NOT NULL,
  `qlthacmac` tinyint(1) NOT NULL,
  `qldonhang` tinyint(1) NOT NULL,
  `qlhang` tinyint(1) NOT NULL,
  `qlsanpham` tinyint(1) NOT NULL,
  `qltintuc` tinyint(1) NOT NULL,
  `qlkhachhang` tinyint(1) NOT NULL,
  `qluser` tinyint(1) NOT NULL,
  `qlphanquyen` tinyint(1) NOT NULL,
  `qlkhuyenmai` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`maquyen`, `tenquyen`, `qlbanner`, `qlthacmac`, `qldonhang`, `qlhang`, `qlsanpham`, `qltintuc`, `qlkhachhang`, `qluser`, `qlphanquyen`, `qlkhuyenmai`) VALUES
(1, 'Giám đốc', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(0, 'Khách hàng', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Kế toán', 0, 0, 1, 1, 1, 0, 0, 0, 0, 1),
(3, 'Chăm sóc khách hàng', 0, 1, 0, 0, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(10) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `soluong` int(5) NOT NULL,
  `dongia` float NOT NULL,
  `giakhuyenmai` float NOT NULL,
  `thongtin` text NOT NULL,
  `hinhanh` varchar(400) NOT NULL,
  `hinhanh1` varchar(400) NOT NULL,
  `hinhanh2` varchar(400) NOT NULL,
  `hinhanh3` varchar(400) NOT NULL,
  `ngaynhap` date NOT NULL,
  `hang` varchar(30) NOT NULL,
  `loai` int(1) NOT NULL,
  `manhinh` varchar(100) DEFAULT NULL,
  `hedieuhanh` varchar(50) DEFAULT NULL,
  `cameratruoc` varchar(50) DEFAULT NULL,
  `camerasau` varchar(50) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `bonhotrong` varchar(50) DEFAULT NULL,
  `dungluongpin` varchar(50) DEFAULT NULL,
  `ketnoi` varchar(50) DEFAULT NULL,
  `baohanh` varchar(20) DEFAULT NULL,
  `view` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `soluong`, `dongia`, `giakhuyenmai`, `thongtin`, `hinhanh`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `ngaynhap`, `hang`, `loai`, `manhinh`, `hedieuhanh`, `cameratruoc`, `camerasau`, `CPU`, `ram`, `bonhotrong`, `dungluongpin`, `ketnoi`, `baohanh`, `view`) VALUES
('OP01', 'OPPO Reno2 F', 100, 7490000, 3999000, 'OPPO Reno2 F là một trong 3 chiếc smartphone thuộc dòng OPPO Reno2 vừa được OPPO giới thiệu với thiết kế thời trang cùng nhiều nâng cấp mạnh mẽ về camera.', 'images/sanpham/oppo-reno2-f-white-400x460-400x460.png', 'images/sanpham/oppo-reno2-f-xanh-1-org.jpg', 'images/sanpham/oppo-reno2-f-xanh-2-org.jpg', 'images/sanpham/oppo-reno2-f-xanh-5-org.jpg', '2020-05-24', 'Oppo', 1, 'AMOLED, 6.5', 'Android 9.0 (Pie)', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'MediaTek Helio P70 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh', 'Hỗ trợ 4G, 2 Nano SIM, Jack tai nghe 3.5 mm', '12 Tháng', 109),
('SS01', 'Samsung Galaxy Fold', 500, 50000000, 0, 'Sau rất nhiều chờ đợi thì Samsung Galaxy Fold - chiếc smartphone màn hình gập đầu tiên của Samsung cũng đã chính thức trình làng với thiết kế mới lạ.\r\nThiết kế 2 màn hình, màn hình uốn dẻo\r\nSamsung Galaxy Fold không chỉ sở hữu một màn hình có thể uốn dẻo mà còn có một màn hình riêng, để có thể sử dụng độc lập khi gập máy lại.\r\nKhi mà những chiếc smartphone gần đây đang ngày càng có thiết kế giống nhau thì sự ra đời của Samsung Galaxy Fold thực sự tạo nên làn gió mới trên thị trường.', 'images/sanpham/samsung-galaxy-fold-black-400x460.png', 'images/sanpham/samsung-galaxy-fold-den-1-org.jpg', 'images/sanpham/samsung-galaxy-fold-den-10-org.jpg', '', '2020-05-30', 'Samsung', 1, 'Chính: Dynamic AMOLED, phụ: Super AMOLED, Chính 7.3', 'Android 9.0 (Pie)', 'Trong: 10 MP, 8 MP; Ngoài: 10 MP', 'Chính 12 MP & Phụ 12 MP, 16 MP', 'Snapdragon 855 8 nhân', '12 GB', '512 GB', '4380 mAh, có sạc nhanh', 'USB Type-C, NFC, OTG', '12 tháng', 80),
('XM01', 'Xiaomi Redmi Note 9S', 1000, 5790000, 0, 'Redmi Note 9s là sản phẩm tầm trung nhà Xiaomi, gây ấn tượng với thiết kế tràn viền độc đáo, cấu hình mạnh mẽ và hệ thống bốn camera sau chất lượng.\r\nThiết kế cao cấp, vân tay dời sang cạnh bên\r\nKhác với màn hình giọt nước trên người anh tiền nhiệm Redmi Note 8, Redmi Note 9s có thiết kế màn hình đục lỗ với camera trước đặt trong màn hình tương tự như trên hầu hết các máy flagship hiện nay.\r\nMáy được trang bị màn hình IPS LCD với kích thước 6.67 inch, độ phân giải Full HD+ và tỉ lệ màn hình 20:9, cho hình ảnh hiển thị rõ nét và rộng rãi.\r\nCạnh dưới của Redmi Note 9s gồm có cổng USB-C, dải loa, mic thoại và jack tai nghe 3.5 mm. Trong khi đó, cạnh phải sẽ là nơi đặt nút nguồn tích hợp cả cảm biến vân tay và cụm phím tăng giảm âm lượng.\r\nMáy sở hữu thiết kế nguyên khối với khung kim loại cứng cáp và mặt lưng kính Gorilla Glass 5 cường lực, tương đối cao cấp so với các dòng smartphone Android tầm trung hiện tại.\r\nMáy có 2 phiên bản màu: Aurora Blue và Interstellar Black, được cài đặt sẵn Android 10 cùng phiên bản MIUI 11 mới nhất khi xuất xưởng.', 'images/sanpham/xiaomi-redmi-note-9s-400x460-400x460.png', 'images/sanpham/xiaomi-redmi-note-9s-xam-5-org.jpg', 'images/sanpham/xiaomi-redmi-note-9s-xam-11-org.jpg', '', '2020-05-30', 'Xiaomi', 1, 'IPS LCD, 6.67', 'Android 10', '16 MP', 'Chính 48 MP & Phụ 8 MP, 5 MP, 2 MP', 'Snapdragon 720G 8 nhân', '6 GB', '128 GB', '5020 mAh, có sạc nhanh', 'Hỗ trợ 4G, 2 Nano SIM, USB Type-C, OTG, Hồng Ngoại', '12 tháng', 21),
('VS01', 'Vsmart Active 3', 2000, 3690000, 0, 'Ra mắt vào đầu năm 2020, Vsmart Active 3 là một smartphone có hiệu năng ổn định, thời lượng pin cả ngày dài và còn nhiều tính năng đặc biệt khác nữa, hứa hẹn sẽ mang đến cho bạn một thiết bị công nghệ chẳng những thời trang còn rất hiện đại.\r\nSang trọng với mặt lưng kính, hiệu ứng gradient thời thượng\r\nMặt sau của Active 3 gồm 4 sự lựa chọn thời trang: Xanh lục bảo, Xanh sapphire, Đen thạch anh và Tím ngọc lấy cảm hứng từ vẻ đẹp của đá quý. Thiết kế cong nhẹ về hai cạnh và 4 góc được bo tròn mềm mại, Active 3 được hoàn thiện theo xu hướng gradient – bóng bẩy và chuyển màu khi di chuyển.', 'images/sanpham/vsmart-active-3-6gb-purple-ruby-400x460-1-400x460.png', 'images/sanpham/vsmart-active-3-6gb-xanh-4-org.jpg', 'images/sanpham/vsmart-active-3-6gb-xanh-8-org.jpg', '', '2020-05-30', 'Vsmart', 1, 'AMOLED, 6.39', 'Android 9.0 (Pie)', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP', 'MediaTek Helio P60 8 nhân', '6 GB', '64 GB', '4020 mAh, có sạc nhanh', 'Hỗ trợ 4G, 2 SIM Nano (SIM 2 chung khe thẻ nhớ), O', '12 tháng', 5),
('AP01', 'iPhone 11 Pro Max 64GB', 1500, 29990000, 0, 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.\r\nCamera được cải tiến mạnh mẽ\r\nChắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.', 'images/sanpham/iphone-11-pro-max-black-400x460.png', 'images/sanpham/iphone-11-pro-max-mau-bac-1-org.jpg', 'images/sanpham/iphone-11-pro-max-mau-bac-2-org.jpg', '', '2020-05-30', 'Apple', 1, 'OLED, 6.5', 'iOS 13', '12 MP', '3 camera 12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '64 GB', '3969 mAh, có sạc nhanh', 'Hỗ trợ 4G, 1 eSIM & 1 Nano SIM, Lightning', '12 tháng', 16),
('SS02', 'Samsung Galaxy S20 Ultra', 500, 27490000, 26999000, 'Samsung Galaxy S20 Ultra siêu phẩm công nghệ hàng đầu của Samsung mới ra mắt với nhiều đột phá công nghệ, màn hình tràn viền không khuyết điểm, hiệu năng đỉnh cao, camera độ phân giải siêu khủng 108 MP cùng khả năng zoom 100X thách thức mọi giới hạn smartphone.\r\nĐột phá màn hình siêu tràn viền kích thước lớn\r\nGalaxy S20 Ultra được trang bị một màn hình kích thước 6.9 inch sử dụng tấm nền Dynamic AMOLED 2X cho chất lượng hiển thị hình ảnh trung thực, sắc nét đến từng chi tiết.', 'images/sanpham/samsung-galaxy-s20-ultra-400x460-1-400x460.png', 'images/sanpham/samsung-galaxy-s20-ultra-xam-1-org.jpg', 'images/sanpham/samsung-galaxy-s20-ultra-xam-2-org.jpg', '', '2020-05-30', 'Samsung', 1, 'Dynamic AMOLED 2X, 6.9', 'Android 10', '40 MP', 'Chính 108 MP & phụ 48 MP, 12 MP, TOF 3D', 'Exynos 990 8 nhân', '12 GB', '128 GB', '5000 mAh, có sạc nhanh', 'Hỗ trợ 4G, 2 SIM Nano (SIM 2 chung khe thẻ nhớ), W', '12 tháng', 10),
('HW01', 'Huawei P40 Pro (Không có Google)', 300, 23990000, 0, 'Huawei P40 Pro là một trong 3 mẫu smartphone đầu bảng năm 2020 đến từ nhà Huawei. Chiếc máy sở hữu cụm 4 camera Leica chụp ảnh và quay phim đỉnh cao, thiết kế màn hình siêu tràn ấn tượng cùng hiệu năng khủng xứng tầm flagship.', 'images/sanpham/huawei-p40-pro-400x460-3-400x460.png', 'images/sanpham/huawei-p40-pro-xanh-1-org.jpg', 'images/sanpham/huawei-p40-pro-xanh-2-org.jpg', '', '2020-05-30', 'Huawei', 1, 'OLED, 6.58', 'EMUI 10 (Android 10 không có Google)', 'Chính 32 MP & Phụ IR TOF 3D', 'Chính 50 MP & Phụ 40 MP,12 MP, TOF 3D', 'Kirin 990 8 nhân', '8 GB', '256 GB', '4200 mAh, có sạc nhanh', 'Hỗ trợ 5G, 2 SIM Nano (SIM 2 chung khe thẻ nhớ), W', '12 tháng', 23),
('AP02', 'iPhone SE 256GB (2020)', 1000, 17990000, 0, 'iPhone SE 256GB 2020 cuối cùng đã được Apple ra mắt, với ngoại hình nhỏ gọn được sao chép từ iPhone 8 nhưng mang trong mình một hiệu năng mạnh mẽ với vi xử lý A13 Bionic, mức giá hấp dẫn hứa hẹn sẽ là yếu tố “hút khách” của smartphone đình đám đến từ nhà Táo khuyết.', 'images/sanpham/iphone-se-256gb-2020-261820-101806-400x460.png', 'images/sanpham/do-1020-org.jpg', 'images/sanpham/iphone-se-256gb-2020-223220-013217.jpg', '', '2020-05-30', 'Apple', 1, 'IPS LCD, 4.7', 'iOS 13', '7 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '3 GB', '256 GB', '1821 mAh, có sạc nhanh', 'Hỗ trợ 4G, 1 eSIM & 1 Nano SIM, Air Play, OTG', '12 tháng', 12),
('SSS2', 'Samsung Gear S2 Sport', 300, 3490000, 0, 'Phiên bản smartwatch Gear S2 được Samsung giới thiệu lần đầu tiên tại triển lãm IFA 2015 diễn ra ở Berlin (Đức) vào tháng 9/2015. Hãng điện tử Hàn Quốc đã trang bị thêm cho thiết bị này nhiều ứng dụng tiện ích, cùng với đó là sự nâng cấp về phần cứng để cạnh tranh với các đối thủ cùng thuộc phân khúc cao cấp như Moto 360 2015 và Apple Watch.', 'images/sanpham/s21.jpg', 'images/sanpham/s23.jpg', 'images/sanpham/s24.jpg', '', '2020-06-08', 'Samsung', 0, '', '', '', '', '', '', '', '', '', '12 tháng', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sanphammoi`
-- (See below for the actual view)
--
CREATE TABLE `sanphammoi` (
`masp` varchar(10)
,`tensp` varchar(100)
,`soluong` int(5)
,`dongia` float
,`thongtin` text
,`hinhanh` varchar(400)
,`hinhanh1` varchar(400)
,`hinhanh2` varchar(400)
,`hinhanh3` varchar(400)
,`ngaynhap` date
,`hang` varchar(30)
,`loai` int(1)
,`manhinh` varchar(100)
,`hedieuhanh` varchar(50)
,`cameratruoc` varchar(50)
,`camerasau` varchar(50)
,`CPU` varchar(50)
,`ram` varchar(50)
,`bonhotrong` varchar(50)
,`dungluongpin` varchar(50)
,`ketnoi` varchar(50)
,`baohanh` varchar(20)
,`view` int(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `quyen` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `matkhau`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`, `email`, `sdt`, `quyen`) VALUES
('1', '1', '1', '2000-01-01', '1', '1', '1', '1', 1),
('khach1', '123456', 'khach', '2020-06-01', '1', 'Ha Noi', 'khach1@gmail.com', '09123456789', 0),
('3', '3', '3', '2000-01-01', '1', '3', '3', '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `thacmac`
--

CREATE TABLE `thacmac` (
  `id` int(5) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `noidung` text NOT NULL,
  `phanhoi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(5) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `tomtat` varchar(500) NOT NULL,
  `noidung` varchar(3000) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  `ngaydang` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `tomtat`, `noidung`, `hinhanh`, `ngaydang`) VALUES
(13, 'Dưới 4 triệu, Nokia 5.3 có gì đáng mua tại thời điểm này', 'Mức giá dưới 4 triệu có rất nhiều đối thủ nhưng Nokia 5.3 vẫn nổi bật hơn nhờ những yếu tố sau.', 'Hệ thống camera xuất sắc trong tầm giá<br>\r\nCó thể thấy được rằng Nokia đã quan tâm rất nhiều đến khả năng nhiếp ảnh của những sản phẩm tầm trung giá rẻ với chiếc Nokia 5.3 cũng không ngoại lệ. Máy được trang bị tới 4 camera sau mang đến rất nhiều tính năng hay, phục vụ đầy đủ nhu cầu của người dùng cơ bản.Camera chính với độ phân giải 13MP, khẩu độ lớn f/1.8, cho khả năng chụp ảnh ấn tượng ngay cả trong điều kiện ánh sáng yếu. Ngoài ra, bạn còn có camera góc siêu rộng 5MP, camera chụp siêu cận cảnh macro 2MP và camera hỗ trợ chụp ảnh xóa phông cũng 2MP. Qua đó, chỉ với mức giá dưới 4 triệu nhưng Nokia 5.3 đã phục vụ đầy đủ nhu cầu chụp ảnh hiện nay, giúp bạn tự tin sáng tạo trong mọi khoảnh khắc.<br><br>\r\nMàn hình lớn, thiết kế bền bỉ, thời trang<br>\r\nMàn hình lớn tới 6,55 inch của Nokia 5.3 giúp bạn thoải mái, chơi game, xem phim, màn hình lớn cũng mang đến những hình ảnh chân thực và nhiều cảm hứng hơn. Bên cạnh đó, Nokia 5.3 cũng được thừa kế những ưu điểm của nhà sản xuất này khi độ hoàn thiện máy cực kỳ cao, bền bỉ, chắc chắn khi sử dụng. Đây có thể là một ưu điểm mà không phải chiếc smartphone nào trong phân khúc cũng có.<br><br>\r\nHiệu năng ổn định, pin siêu trâu<br>\r\nThật bất ngờ khi Nokia 5.3 lại được trang bị bộ xử lý mạnh mẽ đến vậy. Con chip Snapdragon 665 mang đến sự lột xác cho chiếc điện thoại này, tự tin đương đầu với mọi tựa game hiện nay mà không lo giật lag. Chưa hết, Nokia 5.3 còn được ưu ái khi trang bị viên pin lên tới 4000 mAh cùng chế độ quản lý pin thông minh bằng trí tuệ nhân tạo AI, Nokia 5.3 có khả năng tiết kiệm năng lượng tối ưu lên tới 2 ngày sử dụng.Điểm mạnh của Nokia 5.3 chính là trang bị hệ điều hành Android One. Đây là hệ điều hành nguyên bản với giao diện đơn giản, dễ sử dụng, không có ứng dụng rác. Bạn sẽ được tận hưởng tốc độ nhanh nhất, những tính năng mới nhất và được cập nhật liên tục trong thời gian dài.\r\n', 'images/tintuc/637266950853872367_nokia-5_3-01380.jpg', '2020-06-08');

-- --------------------------------------------------------

--
-- Structure for view `sanphammoi`
--
DROP TABLE IF EXISTS `sanphammoi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sanphammoi`  AS  select `sanpham`.`masp` AS `masp`,`sanpham`.`tensp` AS `tensp`,`sanpham`.`soluong` AS `soluong`,`sanpham`.`dongia` AS `dongia`,`sanpham`.`thongtin` AS `thongtin`,`sanpham`.`hinhanh` AS `hinhanh`,`sanpham`.`hinhanh1` AS `hinhanh1`,`sanpham`.`hinhanh2` AS `hinhanh2`,`sanpham`.`hinhanh3` AS `hinhanh3`,`sanpham`.`ngaynhap` AS `ngaynhap`,`sanpham`.`hang` AS `hang`,`sanpham`.`loai` AS `loai`,`sanpham`.`manhinh` AS `manhinh`,`sanpham`.`hedieuhanh` AS `hedieuhanh`,`sanpham`.`cameratruoc` AS `cameratruoc`,`sanpham`.`camerasau` AS `camerasau`,`sanpham`.`CPU` AS `CPU`,`sanpham`.`ram` AS `ram`,`sanpham`.`bonhotrong` AS `bonhotrong`,`sanpham`.`dungluongpin` AS `dungluongpin`,`sanpham`.`ketnoi` AS `ketnoi`,`sanpham`.`baohanh` AS `baohanh`,`sanpham`.`view` AS `view` from `sanpham` where `sanpham`.`ngaynhap` > curdate() + interval -10 day ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`mahang`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Indexes for table `thacmac`
--
ALTER TABLE `thacmac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `stt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `thacmac`
--
ALTER TABLE `thacmac`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
