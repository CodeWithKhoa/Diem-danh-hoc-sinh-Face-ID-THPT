-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 10, 2024 lúc 09:30 AM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-log-cll-lve
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tqaponqr_dichvusieure`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` bigint(20) NOT NULL,
  `email` varchar(999) DEFAULT NULL,
  `password` varchar(999) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `value`) VALUES
(1, 'admin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `arrived`
--

CREATE TABLE `arrived` (
  `id` bigint(20) NOT NULL,
  `ma_hoc_sinh` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `arrival_time` time NOT NULL,
  `arrival_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `arrived`
--

INSERT INTO `arrived` (`id`, `ma_hoc_sinh`, `name`, `arrival_time`, `arrival_date`) VALUES
(1, '123456789', 'Trần Đăng Khoa', '21:58:00', '2024-01-06'),
(2, '0123456788', 'Trần Doãn Lực', '21:12:12', '2024-01-06'),
(3, '12345678', 'Trần Đăng Khoa', '23:12:31', '2024-01-06'),
(4, '12312312', 'Trần Đăng Khoa', '23:21:00', '2024-01-06'),
(5, '123456789', 'Trần Đăng Khoa', '23:22:40', '2024-01-06'),
(6, '12345678', 'Trần Đăng Khoa', '23:22:45', '2024-01-06'),
(7, '123456789', 'Trần Đăng Khoa', '23:23:39', '2024-01-07'),
(8, '123456789', 'TRAN DANG KHOA', '23:25:02', '2024-01-07'),
(9, '1234567899', 'TRAN DANG KHOA', '15:10:03', '2024-01-03'),
(10, '1234569', 'TRAN DANG KHOA', '15:21:57', '2024-01-04'),
(11, '123456', 'NGUYEN DUC KHAI', '15:24:56', '2024-01-09'),
(12, '012345678', 'TRAN DOAN LUC', '15:29:49', '2024-01-03'),
(13, '3361040066', 'Trần Đăng Khoa', '15:53:52', '2024-01-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` bigint(20) NOT NULL,
  `ma_hoc_sinh` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `hovaten` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `lop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `ma_hoc_sinh`, `hovaten`, `ngaysinh`, `lop`) VALUES
(354, '3361040064', 'Nguyễn Đức Khải', '2006-08-31', '12A9'),
(355, '3361040065', 'Vũ Xuân Khải', '2006-08-05', '12A9'),
(356, '3361040063', 'Trịnh Quốc Khánh', '2006-09-02', '12A9'),
(357, '3361040066', 'Trần Đăng Khoa', '2006-12-31', '12A9'),
(358, '3361040067', 'Nguyễn Minh Khôi', '2006-03-12', '12A9'),
(359, '3361040068', 'Nguyễn Trung Kiên', '2006-08-15', '12A9'),
(360, '3361040069', 'Phạm Hữu Kiên', '2006-04-14', '12A9'),
(361, '3368487522', 'Phạm Trung Kiên', '2006-08-30', '12A9'),
(362, '3361040070', 'Phạm Thị Thu Lan', '2006-09-24', '12A9'),
(363, '3368072921', 'Trần Mạnh Lâm', '2006-09-02', '12A9'),
(364, '3361040071', 'Nguyễn Thị Nhật Lệ', '2006-07-24', '12A9'),
(365, '3361040072', 'Lê Thị Kim Liên', '2006-05-16', '12A9'),
(366, '3361040073', 'Mai Văn Liệu', '2006-12-22', '12A9'),
(367, '3361040074', 'Đinh Tuấn Linh', '2006-04-14', '12A9'),
(368, '3361040076', 'Đồng Hoàng Thùy Linh', '2005-11-21', '12A9'),
(369, '3361040078', 'Lê Thuỳ Linh', '2006-11-19', '12A9'),
(370, '3361040080', 'Nguyễn Diệu Linh', '2006-10-17', '12A9'),
(371, '3361040083', 'Nguyễn Thị Phương Linh', '2006-01-22', '12A9'),
(372, '3361040082', 'Nguyễn Thị Phương Linh', '2006-04-16', '12A9'),
(373, '3361040084', 'Nguyễn Thị Thùy Linh', '2006-11-11', '12A9'),
(374, '3361040085', 'Trần Thị Phương Linh', '2006-01-23', '12A9'),
(375, '3361040087', 'Trần Thị Thùy Linh', '2006-03-26', '12A9'),
(376, '3361040088', 'Trịnh Thị Thùy Linh', '2005-09-04', '12A9'),
(377, '3361040089', 'Vũ Ngọc Khánh Linh', '2006-11-19', '12A9'),
(378, '3361040091', 'Mai Thành Long', '2006-05-26', '12A9'),
(379, '3348697990', 'Trần Đức Long', '2006-08-05', '12A9'),
(380, '3361040094', 'Vũ Thị Lụa', '2006-01-28', '12A9'),
(381, '3361040093', 'Nguyễn Văn Luyến', '2006-08-07', '12A9'),
(382, '3361040097', 'Trần Doãn Lực', '2006-10-17', '12A9'),
(383, '3361040095', 'Trần Đức Lương', '2006-05-04', '12A9'),
(384, '3361040096', 'Trần Doãn Lượng', '2006-05-14', '12A9'),
(385, '3361040098', 'Lương Khánh Ly', '2006-06-21', '12A9'),
(386, '3361040099', 'Nguyễn Thị Cẩm Ly', '2006-12-26', '12A9'),
(387, '3361040100', 'Quách Thị Vân Ly', '2006-08-07', '12A9'),
(388, '3361040101', 'Cao Thị Lý', '2006-04-11', '12A9'),
(389, '3361040103', 'Đào Tuyết Mai', '2006-08-13', '12A9'),
(390, '3361040102', 'Đào Thị Mai', '2006-10-22', '12A9'),
(391, '3361040104', 'Hoàng Thúy Mai', '2006-01-12', '12A9'),
(392, '3361040105', 'Nguyễn Thị Sao Mai', '2006-06-04', '12A9'),
(393, '3361040106', 'Vũ Thị Hồng Mai', '2006-03-04', '12A9'),
(394, '3361040138', 'Nguyễn Văn Quyến', '2006-08-07', '12A9'),
(395, '2675898934', 'Nguyễn Thị Khánh Hạ', '2006-11-11', '12A9'),
(396, '12345', 'Nguyễn Quang Huy', '2006-06-13', '12A8');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `arrived`
--
ALTER TABLE `arrived`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `arrived`
--
ALTER TABLE `arrived`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
