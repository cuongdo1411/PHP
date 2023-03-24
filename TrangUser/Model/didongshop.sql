-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2022 lúc 02:59 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `didongshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(200) NOT NULL,
  `dongia` float NOT NULL,
  `giagiam` float NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `nhom` int(4) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giagiam`, `hinhanh`, `nhom`, `soluotxem`, `mota`, `soluongton`, `mausac`) VALUES
(1, 'Apple Watch S8 GPS 41mm viền nhôm dây silicone', 11990000, 10790000, 'sp1.jpg', 3, 10, 'Màn hình: OLED, 1.9 inch\r\n\r\nĐo nhịp tim, Cảm biến nhiệt độ, Đo lượng tiêu thụ oxy tối đa (VO2 max)', 50, 'Màu trắng'),
(2, 'iPhone 14 Pro Max (128GB)', 34490000, 0, 'sp2.jpg', 1, 9, 'Chip Apple A16 Bionic\r\n\r\nRAM: 6 GB\r\n\r\nDung lượng: 128 GB\r\n\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\n\r\nCamera trước: 12 MP\r\n\r\nPin 4323 mAh, Sạc 20 W', 50, 'Màu tím'),
(3, 'iPhone 14 Pro', 30490000, 0, 'sp3.jpg', 1, 8, 'Chip Apple A16 Bionic\r\n\r\nRAM: 6 GB\r\n\r\nDung lượng: 128 GB\r\n\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\n\r\nCamera trước: 12 MP\r\n\r\nPin 3200 mAh, Sạc 20 W', 50, 'Màu tím'),
(4, 'Ipad Pro M1 11 inch WiFi', 42990000, 35990000, 'sp4.jpg', 2, 5, 'Chip Apple M1\r\n\r\nRAM 16 GB\r\n\r\nDung lượng 1 TB\r\n\r\nNghe gọi qua FaceTime\r\n\r\nPin 28.65 Wh (~ 7538 mAh), Sạc 20 W', 50, 'Màu trắng'),
(5, 'Ipad Pro M1 11 inch 5G', 46990000, 41990000, 'sp5.jpg', 2, 6, 'Chip Apple M1\r\n\r\nRAM 16 GB\r\n\r\nDung lượng 1 TB\r\n\r\n5G, Nghe gọi qua FaceTime\r\n\r\nPin 28.65 Wh (~ 7538 mAh), Sạc 20 W', 50, 'Màu đen'),
(6, 'iPhone 11', 14990000, 11690000, 'sp6.jpg', 1, 9, 'Chip Apple A13 Bionic\r\n\r\nRAM: 4 GB\r\n\r\nDung lượng: 64 GB\r\n\r\nCamera sau: 2 camera 12 MP\r\n\r\nCamera trước: 12 MP\r\n\r\nPin 3110 mAh, Sạc 18 W', 50, 'Màu trắng'),
(7, 'iPhone 13 Pro Max 1TB', 45490000, 36990000, 'sp7.jpg', 1, 7, 'Chip Apple A15 Bionic\r\n\r\nRAM: 6 GB\r\n\r\nDung lượng: 1 TB\r\n\r\nCamera sau: 3 camera 12 MP\r\n\r\nCamera trước: 12 MP\r\n\r\nPin 4352 mAh, Sạc 20 W', 50, 'Màu vàng'),
(8, 'iPhone 12 Mini 256GB', 21990000, 0, 'sp8.jpg', 1, 8, 'Chip Apple A14 Bionic\r\n\r\nRAM: 4 GB\r\n\r\nDung lượng: 256 GB\r\n\r\nCamera sau: 2 camera 12 MP\r\n\r\nCamera trước: 12 MP\r\n\r\nPin 2227 mAh, Sạc 20 W', 50, 'Màu đỏ'),
(9, 'Apple Watch Series 7 GPS 41mm viền nhôm dây silicone', 11990000, 8153000, 'sp9.jpg', 3, 4, 'Màn hình: OLED, 1.61 inch\r\n\r\nĐo nhịp tim, Tính lượng calories tiêu thụ, Chế độ luyện tập', 50, 'Màu hồng'),
(10, 'Apple Watch Series 7 LTE 41mm viền thép dây silicone', 20990000, 17990000, 'sp10.jpg', 3, 8, 'Màn hình: OLED, 1.61 inch\r\n\r\nĐo nhịp tim, Tính lượng calories tiêu thụ, Chế độ luyện tập', 50, 'Màu xám');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
