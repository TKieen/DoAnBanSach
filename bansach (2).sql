-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 18, 2024 lúc 03:39 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `idDH` int(11) NOT NULL,
  `idSach` int(11) NOT NULL,
  `gialucdat` float NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonhang`
--

INSERT INTO `ctdonhang` (`idDH`, `idSach`, `gialucdat`, `soluong`) VALUES
(54, 36, 100000, 2),
(54, 44, 200000, 1),
(54, 54, 160000, 1),
(55, 39, 120000, 1),
(55, 41, 40000, 1),
(55, 49, 50000, 1),
(56, 35, 100000, 1),
(56, 44, 200000, 1),
(56, 53, 100000, 1),
(57, 36, 100000, 3),
(57, 38, 80000, 1),
(57, 41, 40000, 2),
(57, 53, 100000, 1),
(58, 32, 100000, 1),
(58, 35, 100000, 1),
(58, 41, 40000, 1),
(59, 42, 165000, 1),
(59, 44, 200000, 2),
(60, 58, 67000, 2),
(60, 59, 60000, 1),
(60, 61, 90000, 1),
(61, 36, 100000, 1),
(61, 53, 100000, 1),
(61, 54, 160000, 1),
(62, 35, 100000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `idPN` int(11) NOT NULL,
  `idSach` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`idPN`, `idSach`, `soluong`) VALUES
(106, 32, 100),
(106, 33, 100),
(106, 34, 100),
(107, 34, 100),
(107, 35, 100),
(107, 49, 100),
(108, 36, 100),
(108, 42, 100),
(108, 44, 100),
(108, 53, 40),
(108, 54, 50),
(109, 40, 100),
(109, 41, 40),
(109, 43, 50),
(110, 38, 100),
(110, 39, 100),
(110, 45, 100),
(111, 55, 120),
(111, 56, 100),
(112, 58, 100),
(112, 59, 100),
(112, 60, 100),
(112, 61, 100),
(113, 63, 50),
(113, 64, 50),
(113, 65, 50),
(114, 57, 100),
(114, 64, 20),
(115, 62, 100),
(116, 37, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDH` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `trangthai` varchar(5) NOT NULL,
  `diachigiao` varchar(255) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaycapnhat` date NOT NULL,
  `idTK` int(11) NOT NULL,
  `tongsanpham` int(11) NOT NULL,
  `idNV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDH`, `tongtien`, `trangthai`, `diachigiao`, `ngaytao`, `ngaycapnhat`, `idTK`, `tongsanpham`, `idNV`) VALUES
(54, 560000, 'ht', '7 Phan Đình Phùng,Xã Ngũ Lão,Huyện Hoà An, Cao Bằng', '2024-09-18', '2024-09-18', 12, 4, 12),
(55, 210000, 'ht', '5 Bến Cá,Phường Phương Sài,Thành phố Nha Trang, Khánh Hòa', '2024-09-18', '2024-09-18', 12, 3, 12),
(56, 400000, 'ht', '1 Nguyễn Hữu Huân,Xã Thông Bình,Huyện Tân Hồng, Đồng Tháp', '2024-09-18', '2024-09-18', 17, 3, 12),
(57, 560000, 'ht', '1 Nguyễn Hữu Huân,Thị trấn Bảy Ngàn,Huyện Châu Thành A, Hậu Giang', '2024-09-18', '2024-09-18', 17, 7, 12),
(58, 240000, 'ht', '15 Phan Văn Trị,Thị trấn Sông Đốc,Huyện Trần Văn Thời, Cà Mau', '2024-09-18', '2024-09-18', 20, 3, 12),
(59, 565000, 'ht', '20 Phan Văn Trị,Xã Hùng Lợi,Huyện Yên Sơn, Tuyên Quang', '2024-09-18', '2024-09-18', 20, 3, 12),
(60, 284000, 'ht', '111 Nguyễn Văn Trỗi,Xã Mong Thọ,Huyện Châu Thành, Kiên Giang', '2024-09-18', '2024-09-18', 21, 4, 12),
(61, 360000, 'ht', '12 Ngô Quyền,Xã Đồng Lạc,Huyện Chợ Đồn, Bắc Kạn', '2024-09-18', '2024-09-18', 21, 3, 12),
(62, 100000, 'ht', '13 Ngô Quyền,Xã Thượng Ân,Huyện Ngân Sơn, Bắc Kạn', '2024-09-18', '2024-09-18', 26, 1, 12);

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `update_inventory_trigger` AFTER UPDATE ON `donhang` FOR EACH ROW BEGIN
	IF NEW.trangthai = "huynv" OR NEW.trangthai = "huykh" THEN
        UPDATE sach 
        INNER JOIN ctdonhang ON sach.idSach = ctdonhang.idSach
        INNER JOIN donhang ON donhang.idDH = ctdonhang.idDH
        SET tonkho = tonkho + soluong
        WHERE ctdonhang.idDH = NEW.idDH;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_luotban_trigger` AFTER UPDATE ON `donhang` FOR EACH ROW BEGIN
	IF NEW.trangthai = "vc" THEN
        UPDATE sach 
        INNER JOIN ctdonhang ON sach.idSach = ctdonhang.idSach
        INNER JOIN donhang ON donhang.idDH = ctdonhang.idDH
        SET luotban = luotban + soluong
        WHERE ctdonhang.idDH = NEW.idDH;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `idMGG` int(11) NOT NULL,
  `phantram` float NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `trangthai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`idMGG`, `phantram`, `ngaybatdau`, `ngayketthuc`, `trangthai`) VALUES
(28, 10, '2024-04-16', '2024-04-17', 'huy'),
(40, 12, '2024-09-17', '2024-09-19', 'cdr');

--
-- Bẫy `magiamgia`
--
DELIMITER $$
CREATE TRIGGER `update_giaban_trigger_when_discount_status_change` AFTER UPDATE ON `magiamgia` FOR EACH ROW BEGIN
	IF NEW.trangthai = "hh" OR NEW.trangthai = "huy" 		THEN
        UPDATE sach 
        SET giaban = giabia, 
        sach.idMGG = null
        WHERE sach.idMGG = NEW.idMGG;
    ELSEIF NEW.trangthai = "hd" THEN
    	UPDATE sach
        SET giaban = (1- NEW.phantram/100) * giabia
        WHERE sach.idMGG = NEW.idMGG;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `idNCC` int(11) NOT NULL,
  `tenNCC` varchar(100) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dienthoai` char(10) DEFAULT NULL,
  `trangthai` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`idNCC`, `tenNCC`, `diachi`, `email`, `dienthoai`, `trangthai`) VALUES
(20, 'AZ Việt Nam', '81 Hai Bà Trưng,Xã Chiềng Mai,Huyện Mai Sơn, Sơn La', 'azvietnam@gmail.com', '0999630032', b'1'),
(21, 'Nhã Nam', '77 Phan Đình Phùng,Xã Thanh Yên,Huyện Điện Biên, Điện Biên', 'nhanam@gmail.com', '0905630032', b'1'),
(22, 'Tuổi Trẻ', '77 Phan Đình Giót,Xã Sơn A,Thị xã Nghĩa Lộ, Yên Bái', 'tuoitre@gmail.com', '0905631032', b'1'),
(28, 'Hương Việt', '81 Hai Bà Trưng,Xã Bản Qua,Huyện Bát Xát, Lào Cai', 'huongviet@gmail.com', '0905630051', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `idPN` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `tongsoluong` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `trangthai` varchar(5) NOT NULL,
  `ngaycapnhat` date NOT NULL,
  `chietkhau` float NOT NULL,
  `idNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`idPN`, `tongtien`, `tongsoluong`, `ngaytao`, `trangthai`, `ngaycapnhat`, `chietkhau`, `idNV`) VALUES
(106, 31050000, 300, '2024-09-18', 'ht', '2024-09-18', 10, 12),
(107, 22540000, 300, '2024-09-18', 'ht', '2024-09-18', 8, 12),
(108, 53820000, 390, '2024-09-18', 'ht', '2024-09-18', 8, 12),
(109, 12920000, 190, '2024-09-18', 'ht', '2024-09-18', 5, 12),
(110, 34040000, 300, '2024-09-18', 'ht', '2024-09-18', 8, 12),
(111, 16150000, 220, '2024-09-18', 'ht', '2024-09-18', 5, 12),
(112, 23310000, 400, '2024-09-18', 'ht', '2024-09-18', 10, 12),
(113, 25760000, 150, '2024-09-18', 'ht', '2024-09-18', 8, 12),
(114, 15120000, 120, '2024-09-18', 'ht', '2024-09-18', 10, 12),
(115, 5850000, 100, '2024-09-18', 'ht', '2024-09-18', 10, 12),
(116, 6300000, 100, '2024-09-18', 'ht', '2024-09-18', 10, 12);

--
-- Bẫy `phieunhap`
--
DELIMITER $$
CREATE TRIGGER `update_phieunhapkho_status` AFTER UPDATE ON `phieunhap` FOR EACH ROW BEGIN
	IF NEW.trangthai = "ht" THEN
        UPDATE sach 
        INNER JOIN ctphieunhap ON sach.idSach = ctphieunhap.idSach
        INNER JOIN phieunhap ON phieunhap.idPN = ctphieunhap.idPN
        SET tonkho = tonkho + soluong
        WHERE ctphieunhap.idPN = NEW.idPN;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `idSach` int(11) NOT NULL,
  `tuasach` varchar(255) NOT NULL,
  `tacgia` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `tonkho` int(11) NOT NULL,
  `luotban` int(11) NOT NULL,
  `nxb` varchar(30) NOT NULL,
  `namxb` year(4) NOT NULL,
  `giaban` float NOT NULL,
  `giabia` float NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `idMGG` int(11) DEFAULT NULL,
  `idNCC` int(11) NOT NULL,
  `hinhanh` varchar(30) NOT NULL,
  `idTL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`idSach`, `tuasach`, `tacgia`, `mota`, `tonkho`, `luotban`, `nxb`, `namxb`, `giaban`, `giabia`, `trangthai`, `idMGG`, `idNCC`, `hinhanh`, `idTL`) VALUES
(32, 'Đám Trẻ Ở Đại Dương Đen', 'Châu Sa Đáy Mắt', 'Đám trẻ ở đại dương đen là lời độc thoại và đối thoại của những đứa trẻ ở đại dương đen, nơi từng lớp sóng của nỗi buồn và tuyệt vọng không ngừng cuộn trào, lúc âm ỉ, khi dữ dội. Những đứa trẻ ấy phải vật lộn trong những góc tối tâm lý, với sự u uất đè nén từ tổn thương khi không được sinh ra trong một gia đình toàn vẹn, ấm êm, khi phải mang trên đôi vai non dại những gánh nặng không tưởng.', 99, 1, 'Phương Nam', '2012', 100000, 100000, b'1', NULL, 20, '789772.jpg', 7),
(33, 'Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn', 'Lưu Hiểu Huy', '“Ghi chép pháp y - Những cái chết bí ẩn” là cuốn sách nằm trong hệ liệt với “Pháp y Tần Minh” - bộ tiểu thuyết nổi đình đám của xứ Trung đã được chuyển thể thành series phim. Cuốn sách tổng hợp những vụ án có thật, được viết bởi bác sĩ pháp y Lưu Hiểu Huy - người có 15 năm kinh nghiệm và từng mổ xẻ hơn 800 tử thi.', 100, 0, 'Thế Giới', '2012', 150000, 150000, b'0', NULL, 20, '369199.jpg', 7),
(34, 'Trốn Lên Mái Nhà Để Khóc', 'Lam', 'Những cơn gió heo may len lỏi vào từng góc phố nhỏ, mùa thu về gợi nhớ bao yêu thương đong đầy, bao xúc cảm dịu dàng của ký ức. Đó là nỗi nhớ đau đáu những hương vị quen thuộc của đồng nội, là hoài niệm bất chợt khi đi trên con đường cũ in dấu bao kỷ niệm... để rồi ta ước có một chuyến tàu kỳ diệu trở về những năm tháng ấy, trở về nơi nương náu bình yên sau những tháng ngày loay hoay để học cách trở thành một người lớn. Bạn sẽ được đắm mình trong những cảm xúc đẹp đẽ xen lẫn những tiếc nuối đầy lắng đọng trong “Trốn lên mái nhà đẻ khóc” của Lam.', 200, 0, 'Thế Giới', '2015', 95000, 95000, b'1', NULL, 20, '778791.jpg', 7),
(35, 'Cây Cam Ngọt Của Tôi', 'José Mauro de Vasconcelos', 'Có hề gì đâu bao nhiêu là hắt hủi, đánh mắng, vì Zezé đã có một người bạn đặc biệt để trút nỗi lòng: cây cam ngọt nơi vườn sau. Và cả một người bạn nữa, bằng xương bằng thịt, một ngày kia xuất hiện, cho cậu bé nhạy cảm khôn sớm biết thế nào là trìu mến, thế nào là nỗi đau, và mãi mãi thay đổi cuộc đời cậu.', 97, 3, 'NXB Hội Nhà Văn', '1999', 100000, 100000, b'1', NULL, 20, '311181.jpg', 7),
(36, 'Chiến Binh Cầu Vồng', 'Andrea Hirata', 'Chiến binh Cầu vồng có cả tình yêu trong sáng tuổi học trò lẫn những trò đùa tinh quái, cả nước mắt lẫn tiếng cười – một bức tranh chân thực về hố sâu ngăn cách giàu nghèo, một tác phẩm văn học cảm động truyền tải sâu sắc nhất ý nghĩa đích thực của việc làm thầy, việc làm trò và việc học.', 94, 6, 'NXB Hội Nhà Văn', '2000', 100000, 100000, b'1', NULL, 21, '775641.jpg', 7),
(37, 'Nhật Ký Chú Bé Nhút Nhát ', 'Jeff Kinney', 'Bộ sách đã trở thành series dành cho tuổi học trò được ưa chuộng nhất thế giới, vượt qua cả bộ truyện đình đám Harry Potter của nhà văn J. K. Rowling, đưa tác giả Jeff Kinney trở thành một trong 100 người có ảnh hưởng nhất thế giới.\r\nVới mong muốn biến bộ sách không chỉ là một bộ truyện giải trí mà trở thành công cụ hỗ trợ các độc giả, đặc biệt là các độc giả nhí có mong muốn đọc và trau dồi vốn từ vựng, ngữ pháp và khả năng đọc hiểu tiếng Anh, Hà Giang Books đã in song song hai ngôn ngữ Việt-Anh từ tập 1-11, đồng thời cung cấp thêm các từ, cụm từ tiếng Anh thông dụng biến hóa theo tình huống hài hước trong truyện giúp độc giả tiện tra cứu.', 100, 0, 'NXB Văn Học', '2014', 70000, 70000, b'1', NULL, 21, '795084.jpg', 8),
(38, 'Cuộc Phiêu Lưu Của Tom Sawyer', 'Mark Twain', 'Tom Sawyer là một cậu bé rất thông minh, ham hiểu biết, được chăm sóc, học hành nhưng cậu hay trốn hoặc đi chơi và “đầu têu” của những trò nghịch ngợm tinh quái. Bạn của cậu, Huck Finn, lớn lên như bụi cây dại giữa rừng, thích tự do, sẵn sàng hi sinh vì bạn bè. Trong khi cùng chơi, cả hai phát hiện ra một vụ giết người, cướp của. Tom đã dũng cảm đứng lên vạch trần kẻ thủ ác, cứu người bị oan.', 99, 1, 'NXB Văn Học', '1999', 80000, 80000, b'1', NULL, 22, '498122.jpg', 8),
(39, 'Truyện Cổ Andersen', 'Hans Christian Andersen', 'Hans Christian Andersen (1805-1875) là một nhà văn người Đan Mạch, ông cũng là một người có tài kể chuyện cổ tích hay nhất thế giới. Khi lớn lên, Andersen bắt đầu chuyến chu du khắp châu Âu của mình. Ông đã đưa những điều mắt thấy tai nghe trong chuyến đi vào các câu chuyện nhỏ đầy thú vị và bắt đầu sự nghiệp viết truyện cổ tích. Truyện cổ Andersen ra đời từ đó. Các câu chuyện của ông đã được đông đảo các em thiếu nhi yêu thích.', 99, 1, 'Văn Học', '2013', 120000, 120000, b'1', NULL, 22, '2003.jpg', 8),
(40, 'Hoàng Tử Bé', 'Antoine de Saint-Exupéry', 'Hoàng tử bé được xuất bản lần đầu năm 1943 của nhà văn, phi công người Pháp Antoine de Saint-exupéry là một trong những cuốn tiểu thuyết kinh điển nổi tiếng nhất mọi thời đại. Câu chuyện ngắn gọn về cuộc gặp gỡ diệu kỳ giữa viên phi công bị rơi máy bay và Hoàng tử bé giữa sa mạc Sa-ha-ra hoang vu. Hành tinh quê hương và các mối quan hệ của hoàng tử bé dần hé lộ: Tình bạn, tình yêu thương của Hoàng tử bé dành cho bông hồng duy nhất, tình cảm sâu sắc dành cho chú cáo.', 100, 0, 'Văn Học', '1999', 50000, 50000, b'1', NULL, 21, '94045.jpg', 8),
(41, 'Tranh Truyện Ehon Nhật Bản', 'Wakiko Sato', 'Tác giả Wakiko Sato vẫn luôn mang đến sự bất ngờ trong các cuốn truyện của mình. Và đây chính là một tác phẩm Ehon thú vị khác của bà.\r\n\r\nCâu chuyện bắt đầu vào một ngày đẹp trời khi Mẹ muốn giặt tất tần tật đồ đạc trong nhà. Nào là vỏ chăn, vỏ gối, quần áo, rèm cửa, cả hai anh em mẹ cũng đem ra giặt giũ, phơi phóng hết! Thế nhưng, ở trên trời những đám mây mưa ùn ùn kéo đến, cậu Sấm nhỏ vén mây lên xem và rồi…\r\n\r\nMã hàng	9786047785049\r\nĐộ Tuổi	3 - 6\r\nNhà Cung Cấp	Cty TNHH More Production Vietnam\r\nTác giả	Wakiko Sato\r\nNgười Dịch	Lê Hiển, Linh Trụ\r\nNXB	Kim Đồng\r\nNăm XB	2023\r\nNgôn Ngữ	Tiếng Việt\r\nTrọng lượng (gr)	100\r\nKích Thước Bao Bì	26 x 19 x 0.2 cm\r\nSố trang	36\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Truyện Tranh Ehon Nhật Bản bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nChính sách khuyến mãi trên Fahasa.com không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc\r\nTranh Truyện Ehon Nhật Bản - Mẹ Giặt Đồ\r\n\r\nTác giả Wakiko Sato vẫn luôn mang đến sự bất ngờ trong các cuốn truyện của mình. Và đây chính là một tác phẩm Ehon thú vị khác của bà.\r\n\r\nCâu chuyện bắt đầu vào một ngày đẹp trời khi Mẹ muốn giặt tất tần tật đồ đạc trong nhà. Nào là vỏ chăn, vỏ gối, quần áo, rèm cửa, cả hai anh em mẹ cũng đem ra giặt giũ, phơi phóng hết! Thế nhưng, ở trên trời những đám mây mưa ùn ùn kéo đến, cậu Sấm nhỏ vén mây lên xem và rồi…', 36, 4, 'Kim Đồng', '2020', 40000, 40000, b'1', NULL, 21, '27064.jpg', 8),
(42, 'Chiến Tranh Tiền Tệ', 'Song Hong Bing', 'Một khi đọc “Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” bạn sẽ phải giật mình nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc chúng ta chi tiêu hàng ngày là cả một thế lực ngầm đáng sợ - một thế lực bí ẩn với quyền lực siêu nhiên có thể điều khiển cả thế giới rộng lớn này.\r\n\r\n“Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” đề cập đến một cuộc chiến khốc liệt, không khoan nhượng và dai dẳng giữa một nhóm nhỏ các ông trùm tài chính – đứng đầu là gia tộc Rothschild – với các thể chế tài chính của nhiều quốc gia. Đó là một cuộc chiến mà đồng tiền là súng đạn và mức sát thương thật sự ghê gớm.\r\n\r\nĐồng thời, “Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” còn giúp bạn hiểu thêm nhiều điều, rằng Bill Gates chưa phải là người giàu nhất hành tinh, rằng tỉ lệ tử vong của các tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh lính Mỹ ngoài chiến trường, hay vì sao phố Wall lại mạo hiểm đổ hết vốn liếng của mình cho việc “đầu tư” vào Hitler.\r\n\r\nLà một cuốn sách làm sửng sốt những ai muốn tìm hiểu về bản chất của tiền tệ, để từ đó nhận ra những hiểm họa tài chính tiềm ẩn nhằm chuẩn bị tâm lý cho một cuộc chiến tiền tệ “không đổ máu”, “Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” còn phơi bày những âm mưu của các nhà tài phiệt thế giới trong việc tạo ra những cơn “hạn hán”, “bão lũ” về tiền tệ để thu lợi nhuận. Cuốn sách cũng đề cập đến sự phát triển của các định chế tài chính – những cơ cấu được xây dựng nhằm đáp ứng nhu cầu phát triển vũ bão của nền kinh tế toàn cầu.\r\n\r\nGấp cuốn sách lại, có thể bạn đọc sẽ có nhiều tâm trạng khác nhau. Đối với một số người, đó có thể là sự sợ hãi thế lực tài chính quốc tế và cảm giác bất an về sự chi phối của thế lực này. Với số khác thì đó có thể là một cảm giác thú vị khi khám phá ra sự thật trần trụi để từ đó có cách nhìn nhận khác nhằm xây dựng cho mình những kế hoạch đầu tư một cách hiệu quả nhất. Và cho dù bạn có lo sợ hay cảm thấy tò mò, thú vị thì “Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” cũng là một cuốn sách đáng đọc. Một cuốn sách bổ ích cho các chuyên gia quản lý tài chính, các nhà quản trị doanh nghiệp, các nhà đầu tư nhỏ, các giáo viên giảng dạy về tài chính – ngân hàng cũng như sinh viên các trường kinh tế.\r\n\r\nMã hàng	9786043437881\r\nTên Nhà Cung Cấp	Bách Việt\r\nTác giả	Song Hong Bing\r\nNgười Dịch	Hồ Ngọc Minh\r\nNXB	NXB Lao Động\r\nNăm XB	2022\r\nTrọng lượng (gr)	570\r\nKích Thước Bao Bì	24 x 16 x 1.5 cm\r\nSố trang	532\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nBách Việt\r\nFlashsale\r\nMã Giảm Giá\r\nRƯỚC DEAL LINH ĐÌNH VUI ĐÓN TRUNG THU\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Phân Tích Kinh Tế bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nChính sách khuyến mãi trên Fahasa.com không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc\r\nChiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự Là Người Giàu Nhất Thế Giới?\r\n\r\nMột khi đọc “Chiến tranh tiền tệ - Ai thật sự là người giàu nhất thế giới” bạn sẽ phải giật mình nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc chúng ta chi tiêu hàng ngày là cả một thế lực ngầm đáng sợ - một thế lực bí ẩn với quyền lực siêu nhiên có thể điều khiển cả thế giới rộng lớn này.', 99, 1, 'NXB Lao Động', '2022', 165000, 165000, b'1', NULL, 21, '145514.jpg', 9),
(43, 'Nền Kinh Tế Chia Sẻ', 'Arun Sundararajan', 'Arun Sundarajan giải thích sự chuyển biến đến trạng thái mà ông mô tả là- một phương cách tổ chức hoạt động kinh tế mới mẻ có thể thế chỗ cho mô hình truyền thống lấy công ti làm trọng tâm.', 50, 0, 'NXB Lao Động', '2022', 140000, 140000, b'1', NULL, 21, '993664.jpg', 9),
(44, 'Tương Lai Thuộc Về Châu Á', 'Parag Khanna', 'Khi phương Tây đang đấu đá và chiến thắng Chiến tranh Lạnh thì châu Á đã bắt đầu đuổi kịp. Trong bốn thập kỷ qua, người châu Á đã chiếm tỷ trọng lớn nhất trong tổng tăng trưởng kinh tế toàn cầu trong khi người phương Tây, đặc biệt là người lao động công nghiệp trung lưu, lại chiếm tỉ trọng thấp nhất - một xu hướng hình thành do sự gia tăng của hoạt động sản xuất ở châu Á.  Hàng tỷ người châu Á lớn lên trong hai thập kỷ qua đã được hưởng sự ổn định về địa chính trị, sự thịnh vượng phát triển nhanh chóng, và niềm tự hào dân tộc ngày càng dâng cao. Thế giới mà họ biết không phải là một thế giới bị phương Tây thống trị mà là một thế giới với sự lên ngôi của châu Á.', 96, 4, 'NXB Trẻ', '2019', 200000, 200000, b'1', NULL, 21, '862223.jpg', 9),
(45, 'Giá Trị Vạn Vật ', 'Mariana Mazzucato', 'Giá trị vạn vật săm soi kỹ lưỡng cách giá trị kinh tế được nhìn nhận và tiết lộ học thuyết kinh tế đã thất bại trong việc chỉ rõ khác biệt giữa kiến tạo giá trị và bòn rút giá trị như thế nào. Mariana Mazzucato tranh luận rằng lằn ranh ngày càng mờ giữa hai phạm trù nói trên đã cho phép những nhân vật nhất định trong nền kinh tế tự nhận mình là những người tạo ra giá trị, trong khi thực tế họ chỉ tận dụng giá trị sẵn có, hoặc tệ hơn là hủy hoại nó.', 100, 0, 'NXB ', '2022', 170000, 170000, b'1', NULL, 22, '135808.jpg', 9),
(49, 'Cô bé tóc đỏ', 'Alice', 'rất hay', 99, 1, 'Tiền Phong', '2012', 50000, 50000, b'1', NULL, 20, '338931.jpg', 8),
(53, 'Đừng Khóc Trước Khi Ngủ', 'Ốc', 'Bạn cười lên rất đẹp, nhớ cười nhiều một chút, nhất định phải vì chính mình\r\nmà vui vẻ sống.', 37, 3, 'Hà Nội', '2024', 100000, 100000, b'1', NULL, 21, '37768.webp', 7),
(54, 'Kệ Hàng Trống ', 'James Rickards', 'Nền kinh tế toàn cầu sẽ đối mặt với nhiều thử thách trong tương lai gần, và việc chúng ta chìm hay nổi trong cơn sóng dữ phụ thuộc vào việc ta tự trang bị cho mình tốt đến đâu và làm những gì để ngăn chặn cuộc sụp đổ sắp tới.', 48, 2, 'NXB Trẻ', '2024', 160000, 160000, b'1', NULL, 21, '649562.webp', 9),
(55, 'Của Tớ, Của Tớ, Của Tớ - Nhím Nói Chẳng Chần Chờ', 'Quảng Văn', 'Hôm nay Nhím đến nhà Alfie. Alfie vui vẻ rủ Nhím chơi đồ chơi cùng mình', 120, 0, 'Phụ nữ', '2024', 100000, 100000, b'1', NULL, 28, '394806.jpg', 8),
(56, 'One Story A Day', 'Alex', '365 Câu Chuyện Truyền Cảm Hứng Và Giáo Dục Nhân Cách', 100, 0, 'HG Books', '2023', 50000, 50000, b'1', NULL, 28, '308901.webp', 8),
(57, 'Nhà Ảo Thuật Trên Cầu Bộ Hành', 'Tú Uyên', 'Cậu bé nhà tiệm giày ao ước học trò ảo thuật, thằng Mark hàng kim khí bỗng đi đâu biệt tích ba tháng trời rồi quay về đầy ly kỳ, cô nàng Theresa con thầy bói sở hữu chú cá vàng trong suốt…', 100, 0, 'Phụ nữ', '2022', 122000, 122000, b'1', NULL, 21, '363866.webp', 7),
(58, 'Nụ Hôn Dưới Vòm Cây', 'Nguyễn Khắc Cường', 'Phóng viên trẻ Hải Đường là một chàng trai sôi nổi, nhiệt huyết. Khi lần theo dấu tích những người bạn xưa của bà ngoại, anh đã tình cờ phát hiện một câu chuyện bi hùng và đẹp đẽ của những người lớn lên trong thời chiến', 98, 2, 'NXB Trẻ', '2024', 67000, 67000, b'1', NULL, 28, '714307.webp', 7),
(59, 'Ký Ức Đông Dương', 'Tô Hoài', 'Ký Ức Đông Dương là tập bút ký của nhà văn Tô Hoài viết về con người và đất nước láng giềng gần gũi của nhân dân Việt Nam.', 99, 1, 'NXB Kim Đồng', '2024', 60000, 60000, b'1', NULL, 28, '128007.webp', 7),
(60, 'Sydney Yêu Thương', 'Trung Nghĩa', 'Sydney yêu thương, không có những đoạn văn nặng nề tính giáo dục, không có những từ ngữ đao to búa lớn, mọi thứ như cái tựa sách, yêu thương từng điều nhỏ nhặt của cuộc sống, một cách bình dị nhất.\r\n', 100, 0, 'NXB Trẻ', '2019', 42000, 42000, b'1', NULL, 28, '396227.webp', 7),
(61, 'Ai Cũng Cần Kết Thúc Để Lại Bắt Đầu', 'Linh', 'Ai cũng từng trải qua tổn thương, ai cũng từng có những thất bại, những vấp ngã, cảm thấy bản thân quá\r\nđỗi bé nhỏ và bất lực trước những khó khăn của cuộc sống. Và đôi khi ta phải dựng lên vỏ bọc mạnh mẽ\r\nđể tiếp tục lao vào dòng đời hối hả mà quên mất rằng những nỗi đau lâu ngày sẽ âm ỉ gặm nhấm tâm hồn\r\nta. ', 99, 1, 'Skybooks', '2024', 90000, 90000, b'1', NULL, 28, '527102.webp', 7),
(62, 'Bản Giao Hưởng Của Nước', 'Thùy Trang', 'Trong bản hòa âm hùng tráng, mênh mang và mĩ lệ của Trái Đất, tồn tại một bản giao hưởng riêng không kém phần hài hòa, nhịp nhàng được kiến tạo bởi nguồn tài nguyên quý giá và quen thuộc với con người. Đó chính là nước. Nước bảo vệ chúng ta khi mới chỉ là bào thai trong bụng mẹ và tồn tại bên trong chúng ta suốt cuộc đời.', 100, 0, 'NXB Kim Đồng', '2024', 65000, 65000, b'1', NULL, 20, '178976.webp', 8),
(63, 'Hip Hop Và Ca sĩ Bậc thầy', 'Isabelle Muller', 'Đây là cuộc phiêu lưu nối dài của Hip Hop cùng những người bạn ở Khu vườn Thung Lũng Xanh, Ca sĩ Bậc Thầy Cosma hợp lực tổ chức lớp học để loài chim có thể cất tiếng hót trở lại, tìm lại thanh âm cho thiên nhiên.', 50, 0, 'NXB Tổng hợp TP.HCM', '2024', 100000, 100000, b'1', NULL, 21, '274164.jpg', 8),
(64, 'Kinh Thánh Về Nghệ Thuật Bán Hàng', 'Jeffrey Gitomer', 'Kẻ chiến thắng sẽ bán được hàng. Trong tình yêu hay bán hàng, mọi thứ đều công bằng. Tôi muốn bán được hàng. Card Levis chiến thắng trong nội dung chạy 100 m tại ba kỳ Thế vận hội khi chỉ nhanh hơn một bước chân.', 70, 0, 'Alphabooks', '2023', 230000, 230000, b'1', NULL, 21, '889643.webp', 9),
(65, 'Điều Kỳ Diệu Của Lòng Hiếu Khách', 'Danny Meyer', 'Trong cuốn sách đột phá này, Danny chia sẻ những bài học mà ông đã học được trong suốt sự nghiệp kinh doanh nhà hàng. Đặc biệt, cuốn sách đề cập tới một triết lý vô cùng mới mẻ là Lòng hiếu khách khai sáng', 50, 0, 'Alpha books', '2023', 230000, 230000, b'1', NULL, 21, '57986.webp', 9);

--
-- Bẫy `sach`
--
DELIMITER $$
CREATE TRIGGER `update_sach_status` AFTER UPDATE ON `sach` FOR EACH ROW BEGIN
    IF ( (SELECT trangthai FROM theloai WHERE theloai.idTL = NEW.idTL) = 0 AND NEW.trangthai = 1 ) THEN
    UPDATE sach SET trangthai = 0 WHERE sach.idSach = NEW.idSach;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idTK` int(11) NOT NULL,
  `tenTK` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `matkhau` varchar(60) NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `phanquyen` char(2) NOT NULL,
  `dienthoai` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idTK`, `tenTK`, `email`, `matkhau`, `trangthai`, `phanquyen`, `dienthoai`) VALUES
(12, 'Lê Ngọc Thảo Vy', 'thaovy3724@gmail.com', '$2y$10$x9ZwP5nQ4TUA9MyxmwIq5.G41RtmfMVEePfpy0BOLtYVKY.6imNQa', b'1', 'DN', '0778052785'),
(13, 'Lê Ngọc Như Ý', 'nhuy3011@gmail.com', '$2y$10$VV6V.mcHIzhgbpOJTh0eqe8DGN2n14Q9XkrSrBl3si2chTo9xT38e', b'0', 'KH', '0794988554'),
(14, 'Nguyễn Trọng Hiếu', 'tronghieu123@gmail.com', '$2y$10$ZWmH0FAeMgwyDzoM0DKA9ea23XpUHPU1q9Oogp1/JffVNO9k.0QBK', b'1', 'TK', '0334926500'),
(15, 'Lê Ngọc Quỳnh Hương', 'huongle123@gmail.com', '$2y$10$i/kyePWkTOY9VKSvSTvDDu9mBMX23ZdA6KegrkUmu.OyDoBbmVO9i', b'1', 'BH', '0894988554'),
(16, 'Nguyễn Phạm Quỳnh Hương', 'huongnguyen123@gmail.com', '$2y$10$IdzjDyoJIwr5/y/J9ifTHuDAzrWR4EYdMIEQtYyHqy7KkvW2mBVsK', b'1', 'KH', '0694988554'),
(17, 'Nguyễn Ngọc Thảo Vy', 'vynguyen123@gmail.com', '$2y$10$C7DG.ToAe6vkvqaV0eWrd.nPntlX7PvQXD7C1hjqOq9f6MBlVQB0.', b'1', 'KH', '0998052785'),
(18, 'Hoàng Trọng Vũ', 'trongvu123@gmail.com', '$2y$10$6eVYBT6ITLv4S/xO2vVRuuW30udvABqSTUcV8ZP1Gp4YKXFoe.ZFq', b'0', 'KH', '0383826625'),
(19, 'Nguyễn Minh Thư', 'minhthu123@gmail.com', '$2y$10$Ow0PUezKbPdrzSnXJHfmxeeDbxSUWpJYVQWtXMNuJHhG/Y5Ic11Gi', b'1', 'AD', '0794988553'),
(20, 'Nguyễn Ngọc Ánh', 'anhnguyen123@gmail.com', '$2y$10$LRjqZ/5PCiorO1P6M6qp5e505hBZPb4g7hTq/bVD2RTowxGvLrtCG', b'1', 'KH', '0914483015'),
(21, 'Nguyễn Thảo Mi', 'minguyen123@gmail.com', '$2y$10$D6J45UXYnO9tAptDzcangO52k3.FKNQIwGcgSm.hfPPjCkXNPo0ZK', b'1', 'KH', '0905630032'),
(26, 'Nguyễn Hiệp Phú', 'hiepphu@gmail.com', '$2y$10$828NyGaKxbpkK8cJ6YL9WOYjHUDMi8UF55LiTmWOqtQiOeGoRAvqy', b'1', 'KH', '0778052783'),
(27, 'Nguyễn Vũ Thảo Mi', 'mivu@gmail.com', '$2y$10$FLHbXck/OsRW88F1/MkuBOLX2MGA8w0N5GBH0zsmLFsng/66/NSBK', b'1', 'KH', '0778052782');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `idTL` int(11) NOT NULL,
  `tenTL` varchar(255) NOT NULL,
  `trangthai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`idTL`, `tenTL`, `trangthai`) VALUES
(7, 'Văn Học', b'1'),
(8, 'Thiếu Nhi', b'1'),
(9, 'Kinh Tế', b'1');

--
-- Bẫy `theloai`
--
DELIMITER $$
CREATE TRIGGER `update_category_status` AFTER UPDATE ON `theloai` FOR EACH ROW BEGIN
    IF NEW.trangthai = 0 THEN
       UPDATE sach SET sach.trangthai = 0 WHERE sach.idTL = NEW.idTL AND sach.trangthai = 1;
    ELSEIF NEW.trangthai = 1 THEN
       UPDATE sach SET sach.trangthai = 1 WHERE sach.idTL = NEW.idTL AND sach.trangthai = 0;
    END IF;
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`idDH`,`idSach`),
  ADD KEY `idSach` (`idSach`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`idPN`,`idSach`),
  ADD KEY `idSach` (`idSach`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDH`),
  ADD KEY `idTK` (`idTK`),
  ADD KEY `idNV` (`idNV`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`idMGG`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`idNCC`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`idPN`),
  ADD KEY `idNV` (`idNV`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`idSach`),
  ADD KEY `idNCC` (`idNCC`),
  ADD KEY `idTL` (`idTL`),
  ADD KEY `idMGG` (`idMGG`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idTK`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`idTL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `idMGG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `idNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `idPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `idSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `idTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`idDH`) REFERENCES `donhang` (`idDH`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`idSach`) REFERENCES `sach` (`idSach`);

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`idPN`) REFERENCES `phieunhap` (`idPN`),
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`idSach`) REFERENCES `sach` (`idSach`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idTK`) REFERENCES `taikhoan` (`idTK`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idNV`) REFERENCES `taikhoan` (`idTK`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`idNV`) REFERENCES `taikhoan` (`idTK`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`idNCC`) REFERENCES `nhacungcap` (`idNCC`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`idMGG`) REFERENCES `magiamgia` (`idMGG`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`idTL`) REFERENCES `theloai` (`idTL`),
  ADD CONSTRAINT `sach_ibfk_4` FOREIGN KEY (`idMGG`) REFERENCES `magiamgia` (`idMGG`);

DELIMITER $$
--
-- Sự kiện
--
CREATE DEFINER=`root`@`localhost` EVENT `check_active_discounts` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-04-13 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE magiamgia
    SET trangthai = 'hd'
    WHERE ngaybatdau = CURDATE() AND trangthai = "cdr"$$

CREATE DEFINER=`root`@`localhost` EVENT `check_expired_discounts` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-04-13 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE magiamgia
    SET trangthai = 'hh'
    WHERE ngayketthuc < CURDATE() AND trangthai = "hd"$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
