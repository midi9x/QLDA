-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2015 at 02:50 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bhmt`
--
CREATE DATABASE IF NOT EXISTS `bhmt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bhmt`;

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE IF NOT EXISTS `cauhinh` (
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cauhinh`
--

INSERT INTO `cauhinh` (`url`, `title`, `description`, `keyword`, `logo`) VALUES
('http://binhminhcomputer.com/', 'Bình Minh Computer - Siêu thị máy tính hàng đầu Việt Nam', 'Siêu thị máy tính Bình Minh Computer. Chuyên cung cấp sản phẩm máy tính, các phụ kiện máy tính, thiết bị kỹ thuật số.', 'may tinh xach tay, may tinh ca nhan, laptop, pc, may tinh ban, may tinh bang, tablet PC, phu kien may tinh, loa ky thuat so, chuot quang, usb, ban phimm may tinh', 'http://binhminhcomputer.com/images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE IF NOT EXISTS `ctdonhang` (
  `id_donhang` int(10) NOT NULL,
  `id_hang` int(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  PRIMARY KEY (`id_donhang`,`id_hang`),
  KEY `id_hang` (`id_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`id_donhang`, `id_hang`, `soluong`, `dongia`) VALUES
(1, 4, 2, 5790000),
(1, 5, 1, 7790000),
(1, 10, 1, 13990000),
(2, 3, 1, 10990000),
(2, 9, 1, 129000),
(2, 16, 2, 199000),
(3, 10, 1, 13990000),
(3, 12, 1, 5990000),
(4, 16, 1, 199000),
(5, 2, 1, 12490000),
(6, 11, 2, 12590000),
(7, 10, 3, 13990000),
(7, 11, 1, 12590000),
(8, 15, 1, 499000),
(8, 16, 1, 199000),
(9, 3, 2, 10990000),
(10, 8, 1, 5790000),
(10, 10, 1, 13990000),
(11, 5, 3, 7790000),
(11, 11, 2, 12590000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `id_donhang` int(10) NOT NULL AUTO_INCREMENT,
  `id_kh` int(11) DEFAULT NULL,
  `id_nv` int(11) DEFAULT NULL,
  `hoten` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tinhtrang` text NOT NULL,
  PRIMARY KEY (`id_donhang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_kh`, `id_nv`, `hoten`, `diachi`, `dienthoai`, `email`, `tongtien`, `ngaydat`, `tinhtrang`) VALUES
(1, 1, NULL, 'Nguyễn Minh Định', 'Phú thọ', 1682485646, 'midi9x@gmail.com', 33360000, '2015-04-28 15:45:19', 'damua'),
(2, 1, NULL, 'Nguyễn Minh Định', 'Phú thọ', 1682485646, 'midi9x@gmail.com', 11517000, '2015-04-29 03:25:40', 'damua'),
(3, 3, NULL, 'Mãi Xuân Vũ', 'Thái bình', 1234567890, 'vu@gmail.com', 19980000, '2015-04-29 03:49:55', 'damua'),
(4, 3, NULL, 'Mãi Xuân Vũ', 'Thái bình', 1234567890, 'vu@gmail.com', 199000, '2015-04-29 03:49:56', 'damua'),
(5, 0, NULL, 'Nguyễn Văn A', 'Từ liêm hà nội ', 1682485646, 'midi9x@gmail.com', 12490000, '2015-04-29 03:50:34', 'dathang'),
(6, 0, NULL, 'Mai Xuân Vũ', 'Hà Nội', 1234567890, 'vu@gmail.com', 25180000, '2015-04-29 04:05:42', 'dathang'),
(7, 1, NULL, 'Nguyễn Minh Định', 'Phú thọ', 1682485646, 'midi9x@gmail.com', 54560000, '2015-05-03 02:59:31', 'damua'),
(8, 2, NULL, 'Nguyễn Thị Thảo', 'Thanh hoa', 963007105, 'thao@gmail.com', 698000, '2015-05-03 03:00:35', 'damua'),
(9, 4, NULL, 'Nguyễn Thị Thu Hường', 'Hà nội', 1234567890, 'huong@gmail.com', 21980000, '2015-05-03 03:01:00', 'damua'),
(10, 0, NULL, 'Nguyễn Minh Định', 'Phu tho', 1682485646, 'midi9x@gmail.com', 19780000, '2015-05-15 13:35:31', 'damua'),
(11, 1, NULL, 'Nguyễn Minh Định', 'Phú thọ', 1682485646, 'midi9x@gmail.com', 48550000, '2015-05-18 13:50:17', 'dathang');

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE IF NOT EXISTS `hang` (
  `id_hang` int(20) NOT NULL AUTO_INCREMENT,
  `id_loai` int(10) NOT NULL,
  `tenhang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dongia` int(15) NOT NULL,
  `ghichu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(100) NOT NULL,
  `mancc` int(20) NOT NULL,
  PRIMARY KEY (`id_hang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id_hang`, `id_loai`, `tenhang`, `mota`, `hinhanh`, `dongia`, `ghichu`, `soluong`, `mancc`) VALUES
(2, 2, 'Dell Inspiron 5542', '<li>CPU: Core i5 4210U </li>\r\n<li>RAM/ HDD:	4Gb/ 500Gb  </li>\r\n<li>Màn hình:	15.6Inch   </li>\r\n<li>VGA:	 VGA rời  </li>\r\n<li>Màu sắc:   Black </li>\r\n<div class="clear"></div>\r\n<b>Dell Inspiron 5542</b> là một máy tính xách tay kiểu dáng đẹp với các vật liệu hiện đại. Độ tin cậy đã được thử nghiệm bởi Dell. Máy tính xách tay này được lụa chọn sử dụng chip Intel thế hệ thứ 4: Intel Core i3 hoặc bộ vi xử lý điện áp cực thấp Core i5 với 3 MB bộ nhớ cache cấp 3. Màn hình hiển thị 15,6 inch với độ phân giải 1366 x 768 pixel và tùy chọn màn hình cảm ứng điện dung. Các bộ vi xử lý ULV tích hợp Intel HD Graphics 4400. Nếu bạn chọn card đò họa AMD Radeon R5 M240 với 2 GB DDR3 bộ nhớ đồ họa, hiệu suất đồ họa sẽ tốt hơn và nó trở nên phù hợp hơn cho bức ảnh chỉnh sửa hoặc video. \r\n<br />\r\n<p class=center><img src="http://www.ankhang.vn/media/product/4890_0_dell_inspiron_15_5542_2_300x300.jpg" /></p>\r\n\r\n<b>Dell Inspiron 5542 </b>được trang bị Waves MaxxAudio Master giúp cho máy tính xách tay này biến thành một cỗ máy giải trí thực thụ với âm thanh cực sống động, hệ thống loa stereo tinh tế và khả năng lan toả âm thanh cực rộng. Dù nghe nhạc, xem phim, chơi trò chơi hay chat Skype, chất lượng âm thanh của máy luôn ở mức tuyệt hảo nhất. Có nhiều cách tùy chỉnh sao cho phù hợp với tai nghe của người dùng nhưng hình ảnh dưới đây sẽ giúp cho những người mới tập tành cho thể dùng để tối ưu hóa âm bass phát ra<br />\r\n<p class="center"><img src="http://www.ankhang.vn/media/product/4890_1_dell_inspiron_15_5542_3_300x300.jpg" /></p>\r\nỔ cứng lưu trữ lên đến 1 TB dung lượng, bạn có thể lưu trữ nhiều tập tin trên máy tính xách tay này. Có hai khe cắm SODIMM, với công suất tối đa 8 GB. Một thẻ nhớ khe cắm đầu đọc thẻ 5-trong-1 hỗ trợ MS Pro, MS, SDHC, SD 3.0 và thẻ SD. Cổng bên trái là USB 2.0 và bộ chuyển đổi năng lượng. Phía đối diện có RJ-45 LAN, HDMI, hai cổng USB 3.0 và jack cắm tai nghe. Nếu không có tích hợp ODD, Dell ODD bên ngoài có thể là một giải pháp tốt nếu bạn vẫn cần phải đọc hoặc ghi đĩa.\r\n<br />\r\n<p class="center"><img src="http://www.ankhang.vn/media/product/4890_2_dell_inspiron_15_5542_300x300.jpg\r\n" /></p>\r\nTính năng kết nối của <b>Dell Inspiron 5542 </b>là rất đầy đủ. Nó mang đến cho Wi-Fi 802.11 b / g / n / ac để truy cập web tốc độ nhanh. 10/100 Mbps Ethernet và Bluetooth 4.0 cũng được hỗ trợ. Bên cạnh những tính năng, nó cũng hỗ trợ Miracast yêu cầu Windows 8.1 hoặc cao hơn và tùy chọn Intel WiDi. Phía trên màn hình là một máy ảnh 0,92 megapixel web có hỗ trợ quay video 720p. Độ dày của Inspiron 15 5000 này là 0,89 inch cho các mô hình không cảm ứng và 0,91 inch cho các mô hình cảm ứng. Trọng lượng của các mô hình không cảm ứng và cảm ứng mô hình là 2,1kg và 2,3 tương ứng. ', 'DellInspiron5542.jpg', 12490000, 'new', 10, 0),
(3, 2, 'DELL N5442 - M4I324PW', '<li>Vi xử lý: Core i3-4005U 1.7Ghz-3Mb</li>\r\n<li>Bộ nhớ trong: 4Gb</li>\r\n<li>Dung lượng ổ cứng: 500Gb</li>\r\n<li>Màn hình: 14Inch</li>\r\n<li>Cạc đồ họa: Intel HD graphics</li>\r\n <div class="clear"></div>\r\n<p><b>Dell Inspiron N5442 M4I324PW</b> là chiếc laptop mỏng nhẹ với hiệu năng linh hoạt khi được trang bị bộ xử lý Core i3 thế hệ mới nhất Haswell của Intel, dung lượng RAM lớn và màn hình tiêu chuẩn 14” HD WLED rõ nét. Không chỉ mỏng nhẹ, laptop <b>Dell Inspiron N5442 M4I324PW</b> còn là mẫu máy 14” nhưng được thiết kế bàn phím đầy đủ với bàn phím số bên phải, nâng cao hiệu suất điện toán cho công việc mỗi ngày.</p>\r\n\r\n<div><b>TÍNH NĂNG NỔI BẬT</b></div>\r\n<p><b>Mỏng hơn, nhẹ hơn</b><br>\r\nVới độ mỏng khá ấn tượng (22.4mm) so với máy tính trong cùng phân khúc, <b>Dell Inspiron N5442 M4I324PW</b> cũng có trọng lượng khá nhẹ chỉ 2Kg. Sự cải tiến trong thiết kế này mang đến cho người dùng sự lựa chọn mới, làm tăng tính linh hoạt và thuận tiện hơn khi cho máy vào túi xách, balo dễ dàng mang theo bên mình. Phần vỏ ngoài thiết kế vân nổi chống vân tay nhưng vẫn đảm bảo khả năng vệ sinh hiệu quả.</p>\r\n<p align="center"><img src="http://hcm.lazada.vn/static/content/Laptop/dell-inspiron-14-5442-01.jpg" alt="Dell Inspiron N5442 M4I324PW" /></p>\r\n<p><b>Tối đa hoá công việc và giải trí</b><br>\r\nLaptop <b>Dell Inspiron N5442 M4I324PW</b> được trang bị bộ xử lý Intel Core i3-4005U 1.7GHz, RAM 4GB DDR3L 1600MHz và đồ hoạ tích hợp Intel HD Graphics 4400 sẽ tối đa hoá nhu cầu xử lý đa nhiệm, hỗ trợ tốt hơn cho công việc hằng ngày. Bên cạnh đó, việc trang bị ổ cứng dung lượng lên đến 500GB cho phép bạn thoải mái lưu trữ mọi dữ liệu công việc và giải trí để mang theo bên người.</p>\r\n<p align="center"><img src="http://hcm.lazada.vn/static/content/Laptop/dell-inspiron-14-5442-03.jpg" alt="Dell Inspiron N5442 M4I324PW" /></p>\r\n<p><b>Màn hình 14.0” LED-Backlit</b><br>\r\nMáy sử dụng màn hình WLED tiêu chuẩn với kích thước 14” cho độ sáng cao, nâng cao độ tương phản và khả năng hiển thị màu sắc sống động. Phía trên màn hình tích hợp Micro và Camera hỗ trợ quay video độ phân giải HD (720p) giúp hình ảnh rõ nét hơn khi thực hiện cuộc gọi video từ máy tính của bạn. Hướng đến phân khúc người dùng muốn sở hữu chiếc máy tính cho công việc và học tập, laptop <b>Dell Inspiron N5442 M4I324PW</b> được trang bị bàn phím đầy đủ với bàn phím số thuận tiện hơn cho công việc tính toán và nhập liệu.</p>\r\n<p align="center"><img src="http://hcm.lazada.vn/static/content/Laptop/dell-inspiron-14-5442-02.jpg" alt="Dell Inspiron N5442 M4I324PW" /></p>\r\n<p><b>Kết nối không dây linh hoạt, mạnh mẽ</b><br>\r\nLaptop <b>Dell Inspiron N5442 M4I324PW</b> được tích hợp Wifi chuẩn 802.11b/g/n có thể kết nối với hầu hết các thiết bị phát Wifi mới hiện nay. Bên cạnh đó, kết nối Bluetooth cũng được trang bị, nhờ đó việc kết nối giữa laptop với các thiết bị số tương thích sẽ trở nên linh hoạt hơn rất nhiều. Ngoài ra, lựa chọn kết nối mạng qua cáp Ethernet cũng được hỗ trợ với tốc độ tối đa lên đến 1000Mbps. Ngoài ra, máy cũng có đầy đủ các cổng kết nối HDMI 1.4a, USB 3.0, USB 2.0, đầu đọc thẻ nhớ SD và ổ đĩa DVD-RW đáp ứng tối đa nhu cầu sử dụng của người dùng.</p>       ', 'DELLN5442M4I324PW.jpg', 10990000, 'new', 13, 0),
(4, 1, 'Acer Aspire E5-411-C9P5', '<li>CPU: Intel Celeron N2930</li>\r\n<li>RAM: 2GB DDR3, ROM: 500GB</li>\r\n<li>Graphics: Intel® HD Graphics</li>\r\n<li>Display: 14" HD LED</li>\r\n<li>Weight: 2.1 kg</li>\r\n<div class="clear"></div>\r\n<b>Laptop Acer Aspire E5 411</b> là phiên bản hướng đến người dùng tầm trung và thấp, nhưng có thiết kế ấn tượng, khá đẹp, sang trọng. Máy được trang bị cấu hình đa dạng, phù hợp với nhu cầu từng người dùng khác nhau, với màn hình phổ biến 14.0 inches, bàn phím chiclet và bàn di chuột rộng thoáng giúp cho việc điều khiển được dễ dàng. Acer Aspire E5 411 được tung ra thị trường với mức giá thành khá thấp, chắc chắn sẽ là sự lựa chọn hấp dẫn phù hợp túi tiền với học sinh, sinh viên, giới văn phòng.<br />\r\n<p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-1.jpg" /></p>\r\n\r\nSử dụng lớp vỏ nhựa phủ sơn tinh tế trong giống như làm bằng vỏ kim loại, mặt trước máy còn tạo ấn tượng với thiết kế dạng vân xước trông khá lịch lãm. Phần bản lề giữa màn hình và thân máy to mang lại sự chắc chắn, cố định cho màn hình và không gây rung lắc khi sử dụng. Máy có trọng lượng tương đối nhẹ 2.1kg dễ dàng mang theo bên người. Các góc máy được bo tròn tạo cảm giác thon gọn, không gây vướng víu khi cho vào ba lô.<br />\r\n<p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-2.jpg" /></p>\r\nAcer Aspire E5-411 được trang bị vi xử lý Intel Celeron Processor N2930-4, RAM 2GB và card màn hình Intel HD Graphics được tích hợp cho phép máy xử lý mượt mà các ứng dụng văn phòng trong công việc và học tập. Bên cạnh đó, laptop còn sở hữu dung lượng lớn ổ đĩa HDD lên đến 500GB, giúp bạn lưu trữ một lượng rất lớn dữ liệu mọi lúc mọi nơi.<br />\r\n\r\n<p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-3.jpg" /></p>\r\n\r\nMàn hình LED rộng rãi sắc nét 14.0 inches, có độ phân giải 1366 x 786 pixels cho bạn những giây phút trải nghiệm, giải trí chân thật. Công nghệ CineCrytal được Acer trang bị cho máy nhằm mang lại khả năng hiển thị hình ảnh có độ tương phản cao, dễ dàng nhìn thấy ngay cả khi đang ở ngoài trời.<br />\r\n<p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-3.jpg" /></p>\r\nAcer Aspire E5 411 còn được trang bị công nghệ âm thanh Intel High Definition Audio, Stereo Speakers cải thiện chất lượng âm thanh trên nền  loa 2.0. Âm thanh phát ra với âm lượng lớn, trong và sáng, điều chỉnh tần số thích hợp với từng thể loại âm nhạc, phim ảnh hay game. Giờ phút giải trí của bạn sẽ thật sống động, hấp dẫn.\r\n\r\n', 'AcerAspireE5411C9P5.jpg', 5790000, 'new', 100, 0),
(5, 1, ' Acer Aspire E5-411-C239', '<li>CPU: Intel Celeron Processor N294-4</li>\r\n<li>RAM: 2GB DDR3L-1600Mhz</li>\r\n<li>HDD: 500GB (5400rpm)</li>\r\n<li>Graphics: Intel HD Graphics</li>\r\n<li>Weight: 2.1Kg - Battery: 4 Cell</li>\r\n<div class="clear"></div>\r\nLaptop Acer Aspire E5 411 là phiên bản hướng đến người dùng tầm trung và thấp, nhưng có thiết kế ấn tượng, khá đẹp, sang trọng. Máy được trang bị cấu hình đa dạng, phù hợp với nhu cầu từng người dùng khác nhau, với màn hình phổ biến 14.0 inches, bàn phím chiclet và bàn di chuột rộng thoáng giúp cho việc điều khiển được dễ dàng. Acer Aspire E5 411 được tung ra thị trường với mức giá thành khá thấp, chắc chắn sẽ là sự lựa chọn hấp dẫn phù hợp túi tiền với học sinh, sinh viên, giới văn phòng.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-1.jpg" /></p>\r\nSử dụng lớp vỏ nhựa phủ sơn tinh tế trong giống như làm bằng vỏ kim loại, mặt trước máy còn tạo ấn tượng trông khá lịch lãm. Phần bản lề giữa màn hình và thân máy to mang lại sự chắc chắn, cố định cho màn hình và không gây rung lắc khi sử dụng. Máy có trọng lượng tương đối nhẹ 2.1kg dễ dàng mang theo bên người. Các góc máy được bo tròn tạo cảm giác thon gọn, không gây vướng víu khi cho vào ba lô.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-2.jpg" /></p>\r\nAcer Aspire E5-411 được trang bị vi xử lý Intel Celeron Processor N2940-4, RAM 2GB và card màn hình Intel HD Graphics được tích hợp cho phép máy xử lý mượt mà các ứng dụng văn phòng trong công việc và học tập. Bên cạnh đó, laptop còn sở hữu dung lượng lớn ổ đĩa HDD lên đến 500GB, giúp bạn lưu trữ một lượng rất lớn dữ liệu mọi lúc mọi nơi.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-3.jpg" /></p>\r\nMàn hình LED rộng rãi sắc nét 14.0 inches, có độ phân giải 1366 x 786 pixels cho bạn những giây phút trải nghiệm, giải trí chân thật. Công nghệ CineCrytal được Acer trang bị cho máy nhằm mang lại khả năng hiển thị hình ảnh có độ tương phản cao, dễ dàng nhìn thấy ngay cả khi đang ở ngoài trời.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/acer/e5-411/acer-aspire-e5-411-4.jpg" /></p>\r\nAspire E5 411 được trang bị đầy đủ các cổng kết nối như cổng USB 2.0, USB 3.0, LAN, VGA, HDMI. Kết nối wifi chuẩn 802.11b/g/n, có kết nối Bluetooth, jack cắm tai nghe 3.5mm thông dụng.<br />\r\nAcer Aspire E5 411 được trang bị pin 4 cell, hứa hẹn đáp ứng tốt nhu cầu di chuyển và sử dụng ngoài trời. Một điểm cộng nữa là máy hoạt động vô cùng êm ái đem đến sự dễ chịu khi bạn sử dụng trong thời gian dài.', 'AcerAspireE5411C239.jpg', 7790000, 'new', 50, 0),
(6, 1, 'Acer Aspire E5 471 MN6SV', '<li>CPU: Intel Core i3-4005U (1.70 GHz, 3MB L3 Cache)</li>\r\n<li>RAM: 2GB DDR3, HDD: 500GB, DVD RW</li>\r\n<li>Graphics: Intel HD Graphics 4400</li>\r\n<li>Display: 14 inches HD LED Backlit</li>\r\n<li>Weight: 2.1Kg - Battery: 4 Cell</li>\r\n<div class="clear"></div>\r\nTrên Acer Aspire E5 471 bạn có thể làm việc và giải trí thông qua chiếc màn hình 14 inch với độ phân giải được coi là chuẩn 1366 x 768px, hình ảnh, trang web, chất lượng phim ảnh đều được thể hiện khá tốt trên màn hình này, màu sắc hài hòa, dễ nhìn. Ngoài ra công nghệ màn hình Acer CineCrystal LED Backlight sẽ là điểm giúp người dùng an tâm hơn về chất lượng màn hình, với khả năng hiển thị được cải tiến vượt trội so với nhiều sản phẩm trước đó của Acer\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/acer/acer-aspire-e5-471-mn2SV/acer-aspire-e-c.jpg" /></p>\r\nVới bộ vi xử lý Core i5 Haswell và RAM 4GB có lẽ thiết bị sẽ làm nhiều người dùng hài lòng, với tầm giá này thì thường chỉ có chip Core i3 nhưng Acer Aspire E5 471 thì khác. Đây là bộ vi xử lý được thiết kế với khả năng tiết kiệm điện rất hiệu quả, với tốc độ 1.7GHz, hiệu suất của máy ổn định. Ngoài ra sản phẩm còn được sử dụng vi xử lý đồ hoạ  Intel HD Graphics 4400 mang đến hiệu suất đồ họa mạnh mẽ, đáp ứng được nhu cầu sử dụng máy tính đa dạng của người dùng hiện nay.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/acer/acer-aspire-e5-471-mn2SV/1.jpg" /></p>\r\nAcer Aspire E5 471 mang trên mình nhiều phương thức kết nối quan trọng và cần thiết, với chuẩn wifi b/g/n bạn có thể thỏa thích online và cập nhật tin tức mọi nơi. Ngoài ra còn có 2 cổng kết nối USB 2.0 và một cổng USB 3.0 tốc độ cao.', 'AcerAspireE5471MN6SV.jpg', 8190000, 'new', 20, 0),
(7, 1, 'Acer Aspire E5 572G 56PV', '<li>CPU Intel® Core I5 4210M 2.6 GHz</li>\r\n<li>RAM 4GB DDR3/1600Mhz, HDD 500GB</li>\r\n<li>Graphics Nvidia GT840 2GB</li>\r\n<li>DVD RW</li>\r\n<li>Display 15 inches HD</li>\r\n<div class="clear"></div>\r\nLaptop Acer Aspire E5-572G-56PV được trang bị sức mạnh từ bộ xử lý i5-4210M của Intel tốc độ 2.60 GHz, hỗ trợ công nghệ tăng tốc lên đến 3.20 GHz giúp xử lý nhanh và mạnh mọi tác vụ của người dùng. Với ưu diểm về hiệu năng và tiết kiệm năng lượng kết hợp với khả năng tỏa nhiệt thấp của dòng chip Haswell. Dù vậy, máy vẫn được trang bị đồ họa rời Nvidia GT840 2GB, cung cấp hiệu suất xử lý đồ họa cao hơn cho phép người dùng tha hồ tận hưởng không gian giải trí sống động cũng như vận hành mượt mà các ứng dụng đồ họa cao cấp.\r\n<br /> <p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/acer/acer-e5-572g/bai-viet/2.jpg" />\r\n</p>\r\nSở hữu màn hình rộng 15 inches độ phân giải HD (1366x786 pixels) và dựa trên công nghệ CineCrystal độc quyền của Acer mang đến cho bạn những trải nghiệm màu sắc và độ tương phản chân thật nhất ngay ca khi ngoài trời.\r\n<br /> <p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/acer/acer-e5-572g/bai-viet/3.jpg" /></p>\r\nBên cạnh kết nối Wifi, VGA, laptop Acer Aspire E5 572G 56PV  còn được tích hợp các công nghệ kết nối không dây như Bluetooth 4.0. Ngoài ra, máy còn hỗ trợ đầu đọc thẻ nhớ SD cho dành cho các bạn đam mê nhiếp ảnh hoặc jack cắm 3.5 mm dành cho các fan cần sự tinh tế khi thưởng thức các beat nhạc say mê.', 'AcerAspireE5572G56PV.jpg', 11990000, 'new', 60, 0),
(8, 3, 'Asus X453MA-WX058D', '<li>CPU: Celeron N2830</li>\r\n<li>RAM: 2GB  - DVD: +/- RW</li>\r\n<li>HDD: 500GB-5400rpm</li>\r\n<li>Display: 14 inches LED HD</li>\r\n<li>Weight: 2Kg </li>\r\n<div class="clear"></div>\r\nAsus X453MA là chiếc laptop phổ biến, giá cả hợp lý, sử dụng màn hình 14.0 inches, bộ vi xử lý Celerron N2830, đồ họa được tích hợp bởi Intel HD Graphics, dung lượng ổ cứng lên tới 500GB. Rất phù hợp để hợc tập, làm các công việc văn phòng.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/asus/asus-x453ma-wx060d/hinh-bai-viet/asus-x453ma-wx060d-01.jpg" /></p>\r\nAsus X453MA được thiết kế mới kiểu dáng cổ điển, đơn giản và cân đối, với tông màu đen cùng những đường vân bất mắt tạo cảm giác sang trọng. Lớp vỏ mặt lung nổi bật với logo Asus màu bạc sáng bóng, cùng chất liệu nhám chống dấu vân tay giúp cho máy của bạn luôn như mới. \r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/asus/asus-x453ma-wx060d/hinh-bai-viet/asus-x453ma-wx060d-03.jpg" /></p>\r\nAsus X453MA sử dụng bộ vi xử lý Celerron N2830, Ram 2GB, ổ cứng 500GB vừa đủ cho bạn chạy tốt các ứng dụng văn, những thước phim giải trí, dung lượng ổ cứng lớn giúp cho bạn lưu được nhiều những tài liệu học tập, những tước phim giải trí, những game mà bạn yêu thích. Laptop Asus khởi động nhanh từ chế độ ngủ trong 2 giây và cổng USB 3.0 giúp bạn truyền tải dữ liệu nhanh hơn. Những hiệu năng, yếu tố cần thiết bạn cần điều có trong chiếc laptop Asus X453MA.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/asus/asus-x453ma-wx060d/hinh-bai-viet/asus-x453ma-wx060d-02.jpg" /></p>\r\nCông nghệ âm thanh SonicMaster và Asus AudioWizard độc quyền của Asus giúp cho hiệu suất âm thanh của chiếc laptop của bạn phát ra âm thanh tốt, trung thực, đa hướng, giúp cho bạn có những phút giây xem phim, nghe nhạc thoải mái.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/asus/asus-x453ma-wx060d/hinh-bai-viet/asus-x453ma-wx060d-04.jpg" /></p>\r\nAsus X453MA trang bị tất cả các cổng bạn cần bao gồm cổng HDMI, cổng VGA, RJ45 LAN. Về kết nối, nó có Bluetooth 4.0 + 802.11 b / g / n kết hợp wifi, và 10/100 Base T LAN. Một webcam VGA có thể được sử dụng video call. Bạn có thể đọc / ghi DVD với một đĩa DVD Super-Multi ở phía bên phải.', 'AsusX453MAWX058D.jpg', 5790000, 'new', 24, 0),
(9, 14, 'USB SanDisk CZ52 Cruzer 8GB', '<li>Thiết kế trượt nhỏ gọn và phong cách</li>\r\n<li>Có thể gắn vào móc khóa của bạn</li>\r\n<li>Lưu trữ nhiều hơn với dung lượng lên đến 8GB</li>\r\n<li>Nhanh và mạnh hơn USB thường</li>\r\n<li>Cổng kết nối 2.0</li>\r\n<div class="clear"></div>\r\nLưu trữ và chuyển video, âm nhạc, hoặc các tập tin hình ảnh của bạn với Ổ cứng di động Cruzer SanDisk CZ52  8GB nhỏ gọn và phong cách. Với thiết kế trượt đơn giản, nó hoàn hảo cho việc lưu trữ tập tin yêu thích của bạn với bạn. Cho dù đó là âm nhạc yêu thích hoặc tài liệu công việc của bạn, SanDisk Cruzer Edge cho phép bạn lưu trữ trong một thiết bị nhỏ gọn và di động. Khi bạn cần lưu trữ thông tin, bạn có thể tin tưởng SanDisk.\r\n<br /><p align="center"><img src="/hinhanh/thumb/USBSanDiskCZ52Cruzer8GB.jpg" /></p>', 'USBSanDiskCZ52Cruzer8GB.jpg', 129000, 'new', 42, 0),
(10, 5, 'HP ProBook 450 J7V40PA', '<li>CPU: Intel Core i5-4210M</li>\r\n<li>RAM : 4GB 1600 DDR3L </li>\r\n<li>HDD : 500 GB Hybrid</li>\r\n<li>Weight : 2.4 Kg</li>\r\n<li Pin: 6 Cell </li>\r\n<div class="clear"></div>\r\nLaptop HP ProBook 450 sở hữu cấu hình cực mạnh và thiết kế tối giản sẽ là một trợ thủ đắc lực cho cuộc sống năng động của bạn. Màn hình 15.6" cực lớn giúp bạn xử lý công việc một cách nhanh chóng và hiệu quả nhất. Laptop HP ProBook 450: Vi xử lý Intel Core i5-4210M tốc độ 2.6Ghz, Max Turbo Freqency 3.2Ghz, bộ nhớ đệm RAM 4GB DDR3 1600 MHz\r\n\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp-probook450/hp-probook450-01.jpg" /></p>\r\nLaptop HP ProBook 450 được trang bị bộ vi xử lý intel Core i5-4210M tốc độ 2.6Ghz, Max Turbo Freqency 3.2Ghz, bộ nhớ đệm RAM 4GB DDR3 1600 MHz, 2 khe cắm RAM, ổ cứng 500GB - Ổ cứng Hybrid kết hợp ổ truyền thống và SSD tốc độ cao, giúp truy xuất dữ liệu và tăng hiệu suất với chi phí thấp nhưng lại rất bền, tích hợp đồ họa Intel HD Graphics 4600.\r\n\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp-probook450/hp-probook450-02.jpg" /></p>\r\nCấu hình trên đủ sức cho bạn xem trọn những bộ phim HD bom tấn, chơi game online thả ga, lướt web, nghe nhạc hay chạy đa nhiệm đều rất mượt mà.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp-probook450/hp-probook450-04.jpg" /></p>\r\nMàn hình LED backlit 15.6 ", độ phân giải HD 1366x768 pixels của Laptop HP ProBook 450 cho khả năng hiển thị màu sắc chân thực, hình ảnh sắc nét và không làm mỏi mắt nếu phải nhìn màn hình quá lâu\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp-probook450/hp-probook450-03.jpg" /></p>\r\nai cổng giao tiếp USB 2.0 và 2 cổng USB 3.0 dùng cho các kết nối ngoại vi đem lại cho Laptop HP ProBook 450 nhiều lợi thế vượt trội, giúp tải dữ liệu nhanh hơn USB 2.0. Đặc biệt USB 3.0 có khả năng ngắt hoặc tạm ngưng khi người dùng không còn sử dụng nhằm tiết kiệm pin.<br />\r\nLaptop HP ProBook 450 có chuẩn wifi IEEE 802.11 a/b/g/n, mạng lan 10/100/1000 , ổ đĩa quang DVD SuperMulti, bluetooth 4.0 và cổng HDMI chất lượng cao, cổng mic, bàn phím full size, có bàn phím số, chuột cảm ứng đa điểm, khe cắm thẻ nhớ 5 in 1, 1 jack cắm tai nghe 3.5mn, camera 1.3 MP.', 'HPProBook450J7V40PA.jpg', 13990000, 'new', 34, 0),
(11, 5, 'HP 15-r012TX J2C29PA', '<li>CPU: Intel Core i5-4210U</li>\r\n<li>RAM: 4GB DDR3L 1600</li>\r\n<li>HDD: 500GB-5400 rpm</li>\r\n<li>Display: 15.6 inches,W LED</li>\r\n<li>Weight: 2.23Kg - Battery: 4Cell</li>\r\n<div class="clear"></div>\r\nLaptop HP 15-r012TX với cấu hình cực mạnh và thiết kế đơn giản, thân thiện với người dùng sẽ là một trợ thủ đắc lực cho công việc lẫn nhu cầu giải trí cấp cao của bạn.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp14-r041tu-j6m10pa/hp14-r041tu-j6m10pa-03.jpg" /></p>\r\nLaptop HP 15-r012TX được trang bị bộ vi xử lý Intel Core i5-4210U (3MB, 1.7GHz) mạnh mẽ, RAM 4GB DDR3L 1600 MHz, ổ cứng 500GB - 5400 rpm, tích hợp card đồ họa NVIDIA® GeForce® GT 820M.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp14-r041tu-j6m10pa/hp14-r041tu-j6m10pa-02.jpg" /></p>\r\nCấu hình trên đủ sức cho bạn xem trọn những bộ phim HD bom tấn, chơi game online thả ga, lướt web, nghe nhạc hay chạy đa nhiệm đều rất mượt mà.\r\n\r\nPin 4 cell cho Laptop HP 15-r012TX thời gian hoạt động liên tục 3-4 giờ. Màn hình LED 15.6 ", độ phân giải HD 1366x768 pixels của Laptop HP 15-r012TX cho khả năng hiển thị màu sắc chân thực, hình ảnh sắc nét và không làm mỏi mắt nếu phải nhìn màn hình quá lâu.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp14-r041tu-j6m10pa/hp14-r041tu-j6m10pa%20-01.jpg" /></p>\r\nMáy chạy hệ điều hành Free Dos, tương thích với Windows 7, Windows 8. Laptop HP 15-r012TX có thiết kế vỏ nhựa chống xước. Với thiết kế mỏng gọn, máy sẽ thuận tiện cho việc di chuyển và phục vụ công việc hiệu quả.\r\n<br /><p align="center"><img src="http://www.vienthonga.vn/uploads/2-bai-viet-sp/laptop/hp/hp14-r041tu-j6m10pa/hp14-r041tu-j6m10pa-04.jpg" /></p>\r\nLaptop LAPTOP HP 15-r012TX có chuẩn wifi wireless 820.11b/g/n, mạng lan 10/100/1000 Base T, ổ đĩa quang, bluetooth 4.0 + HS cổng mic, tai nghe, bàn phím tiêu chuẩn, chuột cảm ứng đa điểm.\r\n\r\n<div class="clear"></div>\r\n<table width=600 align=center border=0>\r\n  <tr>\r\n    <td width=250>Màu Sắc:\r\n    </td>\r\n    <td>Silver\r\n    </td>\r\n  </tr>\r\n\r\n<tr>\r\n<td width=250>Loại:\r\n</td>\r\n<td>WLED (1366x768)\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td width=250>CPU:\r\n</td>\r\n<td>Intel Core i5-4210U (1.7 GHz, 3MB cache, 2 core)\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td width=250>RAM :\r\n</td>\r\n<td>4GB DDR3L 1600\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td width=250>WIFI:\r\n</td>\r\n<td>802.11 b/g/n\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td width=250>Loại Pin:\r\n</td>\r\n<td>4 Cell\r\n</td>\r\n</tr>\r\n\r\n</table>', 'HP15r012TXJ2C29PA.jpg', 12590000, 'new', 44, 0),
(12, 5, 'HP Stream 13', '<li>CPU Intel® Celeron N2840 </li>\r\n<li>RAM: 2GB DDR3, HDD: 32GB eMMC</li>\r\n<li>Display : 13.3 inches HD LED - Blackit</li>\r\n<li>Graphics: Intel® HD Graphics</li>\r\n<li>Kết nối Wifi, Bluetooth 4.0</li>\r\n<div class="clear"></div>\r\nVới thiết kế trẻ trung thanh mảnh với tone màu tràn đầy sức sống, Hp Stream 13 đã mang đến cho các bạn trẻ năng động một thiết bị di động xuất sắc với mức giá cực kỳ hấp dẫn.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/hp/stream-13/bai-viet/2.jpg" /></p>\r\nHP Stream 13 được trang bị chip Intel Celeron N2820 cùng với RAM 2GB. Với thiết kế  phần cứng tương đương một chiếc Tablet cao cấp trong hình hài Laptop, HP hướng đến người sử dụng văn phòng hoặc chuyên dụng dành cho học sinh sinh viên. Để hoàn thiện thêm về trải nghiệm người dùng, HP Stream 13 được áp dụng thiết kế FanLess cũng như trang bị thêm thiết bị cao cấp như  ổ cứng eMMC 32GB, cổng USB 3.0.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/hp/stream-13/bai-viet/3.jpg" /></p>\r\nNgoài ra HP Stream 13 còn được trang bị màn hình 13.3 inches độ phân giải 1366x765, điều này rất tiện lợi cho công việc phải thao tác nhiều trên các phẩn mềm văn phòng như Office 365 hoặc thưỡng thức các bộ phim Full HD.\r\n<br /><p align="center"><img src="http://media.vienthonga.com.vn/data/san-pham/laptop/hp/stream-13/bai-viet/1.jpg" /></p>', 'HPStream13.jpg', 5990000, 'new', 32, 0),
(13, 13, 'Chuột quang Genius NS120', '<li>Công nghệ chống nhiễu và tiết kiệm điện năng.</li>\r\n<li>Cảm biến quang học dễ điều khiển, chuyển động trơn tru.</li>\r\n<li>Thiết kế các nút chức năng nhạy, vừa tay.</li>\r\n<li> Chính hãng Genius</li>\r\n<div class="clear"></div>\r\n\r\n<br /><p align="center"><img src="/hinhanh/thumb/ChuotquangGeniusNS120.jpg" /></p>\r\n- Công nghệ chống nhiễu và tiết kiệm điện năng.\r\n<br />\r\n- Cảm biến quang học dễ điều khiển, chuyển động trơn tru.\r\n<br />\r\n- Thiết kế các nút chức năng nhạy, vừa tay.\r\n<br />\r\n- Chính hãng Genius\r\n', 'ChuotquangGeniusNS120.jpg', 119000, 'new', 34, 0),
(14, 13, 'Bộ bàn phím chuột Logitech  MK240', '<li>Thiết kế tối giản, gọn gàng.</li>\r\n<li>Độ bền cao</li>\r\n<li>Vị trí để tay hợp lý thoải mái.</li>\r\n<li>Chuột có độ phân giải cao.</li>\r\n<div class="clear"></div>\r\n\r\n<img style="text-align:center;" src="/hinhanh/thumb/BobanphimchuotLogitechMK240.jpg" />\r\n<br />\r\n- Thiết kế tối giản, gọn gàng với màu sắc và hoa văn bắt mắt.\r\n- Khả năng chịu lực tốt, độ bền cao, với chân chống nghiêng vững chắc.\r\n- Vị trí để tay thoải mái, thoải mái khi sử dụng trong thời gian dài.\r\n- Chuột có cùng thiết kế với bàn phím tạo nên sự hài hòa, đẹp mắt, cùng với mắt đọc có độ phân giải lên đến 1.000 dpi cho phép bạn thoải mái sử dụng trên nhiều bề mặt khác nhau.', 'BobanphimchuotLogitechMK240.jpg', 499000, 'new', 34, 0),
(21, 16, 'Loa Vi tính Microlab M100', '<li>2 loa vệ tinh, 1 loa siêu trầm</li>\r\n<li>Chống nhiễm từ, Jack 3.5mm</li>\r\n<li>Sử dụng cho máy vi tính, DVD, CD</li>\r\n<li>Kích thước 96 x 95 x 116 mm</li>\r\n<li>Khối lượng 1.2 kg</li>\r\n<div class="clear"></div>\r\n\r\n<p align="center"><img src="/hinhanh/thumb/LoaVitinhMicrolabM100.jpg" /></p>\r\n\r\n- Dòng sản phẩm: MICROLAB M-100<br />\r\n- Màu: Đen<br />\r\n- Hệ thống loa: 2 loa vệ tinh, 1 loa siêu trầm (Subwoofer)<br />\r\n- Chống nhiễm từ, Jack 3.5mm<br />\r\n- Tổng công suất 17W (RMS)<br />\r\n- Công suất loa vệ tinh 4W x 2<br />\r\n- Công suất Loa Subwoofer 9W<br />\r\n- Sử dụng cho máy vi tính, DVD, VCD, CD<br />\r\n- Kích thước 96 x 95 x 116 mm<br />\r\n- Khối lượng 1.2 kg<br />', 'LoaVitinhMicrolabM100.jpg', 499000, 'new', 12, 0),
(22, 16, 'Đế tản nhiệt DeepCool N2000FS', '<li>Hãng sản xuất: Deep Cool</li>\r\n<li>Kết nối: USB</li>\r\n<li> Chất liệu: Kim loại, nhựa</li>\r\n<li> Số lượng quạt: 1 quạt lớn</li>\r\n<li>Phù hợp laptop dưới 17 inch</li>\r\n<div class="clear"></div>\r\n\r\nĐế Tản Nhiệt Laptop DeepCool N2000 FS Cooling<br />\r\n- Hướng đến sự đơn giản và gọn nhẹ với thiết kế phần chân đế chỉ là một ống thép chắc chắn, bề mặt tiếp xúc bằng kim loại dạng lưới và thanh chống trượt, đế tản nhiệt DeepCool N2000 FS sẽ luôn đảm bảo laptop của bạn không bị xê dịch khi bạn sử dụng.<br />\r\n<p align="center"><img src="/hinhanh/thumb/DetannhietDeepCoolN2000FS.jpg" /></p>\r\n- Với một quạt chính kích thước 120mm tốc độ quay đạt 1000 vòng/phút,  mang đến hiệu quả làm mát tối ưu.<br />\r\n- Phần chân đế được thiết kế cách điệu và đơn giản chỉ là một ống thép uốn lượn vừa tạo độ nghiêng phù hợp vừa mang đến sự thông thoáng hai bên, đồng thời tăng thêm vẻ ngoài độc đáo cho sản phẩm. Bên cạnh đó phần bọc nhựa đen sẽ tăng ma sát giúp đế tản nhiệt và laptop không xê dịch khi bạn làm việc.<br />\r\n- Đế tản nhiệt có khả năng tương ứng với nhiều loại máy tính xách tay khác nhau, với kích thước màn hình tối đa là 15.6”.\r\n', 'DetannhietDeepCoolN2000FS.jpg', 199000, 'new', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `id_kh` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `hoten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`id_kh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `username`, `password`, `hoten`, `diachi`, `dienthoai`, `email`, `ngaysinh`, `gioitinh`, `phanloai`) VALUES
(1, 'midi9x', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Minh Định', 'Phú thọ', 1682485646, 'midi9x@gmail.com', '1994-04-17', 1, 1),
(2, 'thao', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Thị Thảo', 'Thanh hoa', 963007105, 'thao@gmail.com', '1993-03-17', 0, 0),
(3, 'vu', '21232f297a57a5a743894a0e4a801fc3', 'Mãi Xuân Vũ', 'Thái bình', 1234567890, 'vu@gmail.com', '1993-04-04', 1, 0),
(4, 'huong', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Thị Thu Hường', 'Nam Định', 1234567890, 'huong@gmail.com', '1994-04-03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE IF NOT EXISTS `loaihang` (
  `id_loai` int(10) NOT NULL,
  `id_nhom` int(11) NOT NULL,
  `tenloaisp` text NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_loai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`id_loai`, `id_nhom`, `tenloaisp`, `ghichu`) VALUES
(2, 1, 'Dell', ''),
(9, 2, 'Microsoft', ''),
(8, 2, 'Samsung', ''),
(1, 1, 'Acer', ''),
(7, 2, 'Lenovo', ''),
(6, 2, 'Apple', ''),
(5, 1, 'HP', ''),
(4, 3, 'HP', ''),
(3, 1, 'Asus', ''),
(10, 3, 'Dell PC', ''),
(11, 3, 'Sunpac PC', ''),
(12, 3, 'Kingston', ''),
(13, 4, 'Bàn phím - Chuột', ''),
(14, 4, 'USB', ''),
(16, 4, 'Phụ kiện khác', ''),
(17, 3, 'Chuột', '');

-- --------------------------------------------------------

--
-- Table structure for table `nhacc`
--

CREATE TABLE IF NOT EXISTS `nhacc` (
  `mancc` int(11) NOT NULL AUTO_INCREMENT,
  `tenncc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`mancc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nhacc`
--

INSERT INTO `nhacc` (`mancc`, `tenncc`, `diachi`, `dienthoai`, `email`) VALUES
(1, 'Thế giới di động', 'Hà nội', 4999999, 'tgdd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE IF NOT EXISTS `nhanvien` (
  `id_nv` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quyen` int(10) NOT NULL,
  PRIMARY KEY (`id_nv`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `username`, `password`, `hoten`, `diachi`, `dienthoai`, `email`, `quyen`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Minh Định', 'Phú Thọ', 1682485646, 'midi9x@gmail.com', 1),
(2, 'thao', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Thị Thảo', 'Thanh hoa', 963007105, 'thao@gmail.com', 2),
(3, 'vu', '21232f297a57a5a743894a0e4a801fc3', 'Mai Xuân Vũ', 'Thái Bình', 999999999, 'vuvu@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nhomhang`
--

CREATE TABLE IF NOT EXISTS `nhomhang` (
  `id_nhom` int(10) NOT NULL,
  `tennhom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_nhom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhomhang`
--

INSERT INTO `nhomhang` (`id_nhom`, `tennhom`) VALUES
(1, 'Máy tính xách tay'),
(2, 'Máy tính bảng'),
(3, 'Máy tính để bàn'),
(4, 'Phụ kiện máy tính');

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE IF NOT EXISTS `phanhoi` (
  `id_phanhoi` int(10) NOT NULL AUTO_INCREMENT,
  `id_kh` int(11) NOT NULL,
  `hoten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngayphanhoi` datetime NOT NULL,
  PRIMARY KEY (`id_phanhoi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`id_phanhoi`, `id_kh`, `hoten`, `diachi`, `email`, `dienthoai`, `noidung`, `ngayphanhoi`) VALUES
(1, 1, 'Nguyễn Minh Định', 'Phú thọ', 'midi9x@gmail.com', 1682485646, 'hi', '2015-04-28 13:49:38'),
(2, 0, 'Nguyễn Thị Thảo', 'Hà nội', 'thao@gmail.com', 963007105, 'nội dung phản hồi', '2015-04-29 03:58:17'),
(3, 0, 'Nguyễn Văn Minh', 'hà nội', 'minh@gmail.com', 999999999, 'Siêu thị máy tính Binh Minh', '2015-05-15 14:54:05'),
(5, 0, 'Trần Mai', 'ha noi', 'bb@gmail.com', 23232434, 'LIÊN HỆ ', '2015-05-15 14:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `phieuchuyen`
--

CREATE TABLE IF NOT EXISTS `phieuchuyen` (
  `id_pc` int(11) NOT NULL AUTO_INCREMENT,
  `id_donhang` int(11) NOT NULL,
  `ngaychuyen` date NOT NULL,
  `tinhtrang` text NOT NULL,
  PRIMARY KEY (`id_pc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
