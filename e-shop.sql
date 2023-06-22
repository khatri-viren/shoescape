-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3300
-- Generation Time: Jun 22, 2023 at 02:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bb_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bb_id`, `b_name`, `description`) VALUES
(1, 'Jordan', NULL),
(2, 'Nike', NULL),
(3, 'Adidas', NULL),
(4, 'New Balance', NULL),
(5, 'Reebok', NULL),
(6, 'Converse', NULL),
(7, 'Puma', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `parent_id`, `description`) VALUES
(1, 'Male', '[{\"src\":\"uploads\\/1682398148-59286.png\",\"thumb\":\"uploads\\/thumb_1682398148-59286.png\"}]', 0, ''),
(2, 'Female', '[{\"src\":\"uploads\\/1682398158-35304.png\",\"thumb\":\"uploads\\/thumb_1682398158-35304.png\"}]', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `ct_id` int(11) NOT NULL,
  `colour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`ct_id`, `colour`) VALUES
(4, 'Beige'),
(1, 'Black'),
(6, 'Blue'),
(5, 'Brown'),
(8, 'Grey'),
(7, 'Light Blue'),
(9, 'Pink'),
(3, 'Red'),
(2, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_log`
--

CREATE TABLE `deleted_log` (
  `dl_id` int(11) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_log`
--

INSERT INTO `deleted_log` (`dl_id`, `gst_id`, `colour`, `size`, `date_time`) VALUES
(3, 4, 'Light Blue', 'UK7', '2023-05-09 07:34:52'),
(4, 19, 'Beige', 'UK10', '2023-05-09 14:46:07'),
(5, 18, 'Pink', 'UK7', '2023-06-21 18:18:44'),
(6, 17, 'Beige', 'UK6', '2023-06-21 18:20:00'),
(7, 1, 'Black', 'UK10', '2023-06-22 14:34:32'),
(8, 4, 'Grey', 'UK8', '2023-06-22 14:34:45'),
(9, 4, 'Light Blue', 'UK11', '2023-06-22 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `general_shoe`
--

CREATE TABLE `general_shoe` (
  `gst_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_shoe`
--

INSERT INTO `general_shoe` (`gst_id`, `brand_id`, `product_name`, `description`, `image`, `category_id`) VALUES
(1, 1, 'Air 37', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?', '[{\"src\":\"uploads\\/1682412779-89316.jpeg\",\"thumb\":\"uploads\\/thumb_1682412779-89316.jpeg\"}]', 1),
(2, 1, 'Why Not 6', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.', '[{\"src\":\"uploads\\/1682416662-71799.jpeg\",\"thumb\":\"uploads\\/thumb_1682416662-71799.jpeg\"}]', 1),
(4, 2, 'Air Max 95', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.', '[{\"src\":\"uploads\\/1682417744-8331.jpeg\",\"thumb\":\"uploads\\/thumb_1682417744-8331.jpeg\"}]', 1),
(5, 1, 'Air Vapour Max Plus', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.', '[{\"src\":\"uploads\\/1682417899-16019.jpeg\",\"thumb\":\"uploads\\/thumb_1682417899-16019.jpeg\"}]', 1),
(7, 3, 'Ultraboost 1.0 ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\n', '[{\"src\":\"uploads\\/1682442634-25472.jpeg\",\"thumb\":\"uploads\\/thumb_1682442634-25472.jpeg\"}]', 2),
(8, 2, 'Air VapourMax 2021 Flyknit', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\n', '[{\"src\":\"uploads\\/1682442816-57719.jpeg\",\"thumb\":\"uploads\\/thumb_1682442816-57719.jpeg\"}]', 2),
(9, 2, 'Wms Air Vapour Max Plus', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\n', '[{\"src\":\"uploads\\/1682443123-63570.jpeg\",\"thumb\":\"uploads\\/thumb_1682443123-63570.jpeg\"}]', 2),
(10, 2, 'Wms Pegasus Trail 4 Gore-Tex', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\r\n', '[{\"src\":\"uploads\\/1682443309-21167.jpeg\",\"thumb\":\"uploads\\/thumb_1682443309-21167.jpeg\"}]', 2),
(11, 1, 'Wms Jumpman Two Trey', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.', '[{\"src\":\"uploads\\/1682765419-60830.jpeg\",\"thumb\":\"uploads\\/thumb_1682765419-60830.jpeg\"}]', 2),
(15, 2, 'Blazer Mid \'77 QS', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?', '[{\"src\":\"uploads\\/1682765887-77873.jpeg\",\"thumb\":\"uploads\\/thumb_1682765887-77873.jpeg\"}]', 1),
(17, 4, 'Wms 327', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?', '[{\"src\":\"uploads\\/1683137073-43234.jpeg\",\"thumb\":\"uploads\\/thumb_1683137073-43234.jpeg\"}]', 2),
(18, 6, 'Wms Run Star Legacy CX', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?', '[{\"src\":\"uploads\\/1683137273-59157.jpeg\",\"thumb\":\"uploads\\/thumb_1683137273-59157.jpeg\"}]', 2),
(19, 1, 'Air 1 Zoom CMF', 'dsfgjklsadglfkgsdlkfhsd;iaf fjdsgflkjdhjkfa test 1', '[{\"src\":\"uploads\\/1683623595-10072.jpeg\",\"thumb\":\"uploads\\/thumb_1683623595-10072.jpeg\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ot_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `shipping` text NOT NULL,
  `cart` text NOT NULL,
  `user` text NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ot_id`, `customer_id`, `order_status`, `shipping`, `cart`, `user`, `order_date`, `total_price`) VALUES
(13, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"NetBanking\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.\",\"gst_id\":\"6\",\"brand_id\":\"2\",\"product_name\":\"Balance 327\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418074-14763.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418074-14763.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"7\",\"general_shoe_id\":\"6\",\"colour_id\":\"4\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418109-8358.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418109-8358.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-25937.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-25937.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-28101.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-28101.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-86294.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-86294.jpeg\\\"}]\",\"stock\":\"8\",\"price\":\"999\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"4\",\"colour\":\"Beige\",\"quantity\":1},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682668001', 2198),
(14, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"NetBanking\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.\",\"gst_id\":\"6\",\"brand_id\":\"2\",\"product_name\":\"Balance 327\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418074-14763.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418074-14763.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"7\",\"general_shoe_id\":\"6\",\"colour_id\":\"4\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418109-8358.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418109-8358.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-25937.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-25937.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-28101.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-28101.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-86294.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-86294.jpeg\\\"}]\",\"stock\":\"8\",\"price\":\"999\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"4\",\"colour\":\"Beige\",\"quantity\":1},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682668133', 2198),
(15, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.\",\"gst_id\":\"6\",\"brand_id\":\"2\",\"product_name\":\"Balance 327\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418074-14763.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418074-14763.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"7\",\"general_shoe_id\":\"6\",\"colour_id\":\"4\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418109-8358.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418109-8358.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-25937.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-25937.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-28101.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-28101.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-86294.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-86294.jpeg\\\"}]\",\"stock\":\"8\",\"price\":\"999\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"4\",\"colour\":\"Beige\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682675883', 2198),
(16, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.\",\"gst_id\":\"6\",\"brand_id\":\"2\",\"product_name\":\"Balance 327\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418074-14763.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418074-14763.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"7\",\"general_shoe_id\":\"6\",\"colour_id\":\"4\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682418109-8358.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418109-8358.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-25937.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-25937.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-28101.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-28101.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682418110-86294.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682418110-86294.jpeg\\\"}]\",\"stock\":\"8\",\"price\":\"999\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"4\",\"colour\":\"Beige\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682675893', 2198),
(17, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682677609', 3797),
(18, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682678292', 3797),
(19, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682678294', 3797),
(20, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682678294', 3797),
(21, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682678294', 3797),
(22, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682678295', 3797),
(23, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"15\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"10\",\"brand_id\":\"2\",\"product_name\":\"Wms Pegasus Trail 4 Gore-Tex\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443309-21167.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443309-21167.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"13\",\"general_shoe_id\":\"10\",\"colour_id\":\"3\",\"size_id\":\"5\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682443336-96205.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-96205.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-77936.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-77936.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-45508.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-45508.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682443336-44985.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682443336-44985.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"1199\",\"st_id\":\"5\",\"size\":\"UK8\",\"ct_id\":\"3\",\"colour\":\"Red\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":null,\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682751170', 3797);
INSERT INTO `orders` (`ot_id`, `customer_id`, `order_status`, `shipping`, `cart`, `user`, `order_date`, `total_price`) VALUES
(24, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"Pune CIty 412\",\"payment_method\":\"UPI\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"8\",\"brand_id\":\"2\",\"product_name\":\"Air VapourMax 2021 Flyknit\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442816-57719.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442816-57719.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"11\",\"general_shoe_id\":\"8\",\"colour_id\":\"9\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442845-3022.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-3022.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-55556.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-55556.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-57384.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-57384.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442845-63311.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442845-63311.jpeg\\\"}]\",\"stock\":\"13\",\"price\":\"1299\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":3},{\"bb_id\":\"1\",\"b_name\":\"Jordan\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, ad ullam minus quisquam dicta, corporis, obcaecati rerum sequi aliquid molestias fugit quibusdam sapiente vero iste nisi. Eligendi consequuntur doloremque excepturi, earum exercitationem amet ea accusantium delectus voluptas veniam, vel odio quasi repudiandae quidem sed inventore dicta facilis itaque natus. Minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quas dolore repellat rem dicta magni hic accusantium doloribus, iusto unde perferendis laboriosam, dolores esse? Tempora consequatur eligendi molestias placeat quam ducimus ab, magni, sequi dolorem, optio sapiente quia non nihil officiis commodi aspernatur nostrum quae tempore quidem voluptatibus tenetur temporibus.\",\"gst_id\":\"11\",\"brand_id\":\"1\",\"product_name\":\"Wms Jumpman Two Trey\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682765419-60830.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765419-60830.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"14\",\"general_shoe_id\":\"11\",\"colour_id\":\"7\",\"size_id\":\"3\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682765621-84478.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765621-84478.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682765621-61995.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765621-61995.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682765621-52683.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765621-52683.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682765621-83530.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765621-83530.jpeg\\\"}]\",\"stock\":\"23\",\"price\":\"999\",\"st_id\":\"3\",\"size\":\"UK6\",\"ct_id\":\"7\",\"colour\":\"Light Blue\",\"quantity\":1},{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\",\"gst_id\":\"15\",\"brand_id\":\"2\",\"product_name\":\"Blazer Mid \'77 QS\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682765887-77873.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765887-77873.jpeg\\\"}]\",\"category_id\":\"1\",\"sst_id\":\"15\",\"general_shoe_id\":\"15\",\"colour_id\":\"2\",\"size_id\":\"7\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682766057-67179.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-67179.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-37837.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-37837.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-74211.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-74211.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-96395.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-96395.jpeg\\\"}]\",\"stock\":\"56\",\"price\":\"699\",\"st_id\":\"7\",\"size\":\"UK11\",\"ct_id\":\"2\",\"colour\":\"White\",\"quantity\":5},{\"bb_id\":\"3\",\"b_name\":\"Adidas\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\\r\\n\",\"gst_id\":\"7\",\"brand_id\":\"3\",\"product_name\":\"Ultraboost 1.0 \",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442634-25472.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442634-25472.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"10\",\"general_shoe_id\":\"7\",\"colour_id\":\"9\",\"size_id\":\"2\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682442747-13896.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442747-13896.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442747-60165.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442747-60165.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442747-67349.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442747-67349.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682442747-87825.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682442747-87825.jpeg\\\"}]\",\"stock\":\"13\",\"price\":\"450\",\"st_id\":\"2\",\"size\":\"UK5\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":2}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":\"Pune CIty 412\",\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1682833058', 9291),
(25, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"Pune CIty 412\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\",\"gst_id\":\"15\",\"brand_id\":\"2\",\"product_name\":\"Blazer Mid \'77 QS\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682765887-77873.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765887-77873.jpeg\\\"}]\",\"category_id\":\"1\",\"sst_id\":\"15\",\"general_shoe_id\":\"15\",\"colour_id\":\"2\",\"size_id\":\"7\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682766057-67179.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-67179.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-37837.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-37837.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-74211.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-74211.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-96395.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-96395.jpeg\\\"}]\",\"stock\":\"51\",\"price\":\"699\",\"st_id\":\"7\",\"size\":\"UK11\",\"ct_id\":\"2\",\"colour\":\"White\",\"quantity\":1}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":\"Pune CIty 412\",\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1683014764', 699),
(26, 3, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"9850054844\",\"address\":\"Pune CIty 412\",\"payment_method\":\"NetBanking\"}', '[{\"bb_id\":\"1\",\"b_name\":\"Jordan\",\"description\":\"dsfgjklsadglfkgsdlkfhsd;iaf fjdsgflkjdhjkfa test 1\",\"gst_id\":\"19\",\"brand_id\":\"1\",\"product_name\":\"Air 1 Zoom CMF\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1683623595-10072.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683623595-10072.jpeg\\\"}]\",\"category_id\":\"1\",\"sst_id\":\"21\",\"general_shoe_id\":\"19\",\"colour_id\":\"4\",\"size_id\":\"1\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1683623632-59331.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683623632-59331.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683623633-25667.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683623633-25667.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683623633-41790.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683623633-41790.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683623633-89072.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683623633-89072.jpeg\\\"}]\",\"stock\":\"10\",\"price\":\"1990\",\"st_id\":\"1\",\"size\":\"UK10\",\"ct_id\":\"4\",\"colour\":\"Beige\",\"quantity\":2}]', '{\"id\":\"3\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$tLvBt03lnRUeJ08hrJ1l3Oyo0hXyA.pVKPqMm2iwEL2obx.U26.gG\",\"phone_number\":\"9850054844\",\"email\":\"vsk102002@gmail.com\",\"address\":\"Pune CIty 412\",\"user_type\":\"admin\",\"created\":\"1681633497\"}', '1683623728', 3980),
(27, 7, '1', '{\"first_name\":\"John\",\"last_name\":\"Doe\",\"phone_number\":\"1234567890\",\"address\":\"xczbcvb vbv\",\"payment_method\":\"Credit\\/Debit Card\"}', '[{\"bb_id\":\"6\",\"b_name\":\"Converse\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\",\"gst_id\":\"18\",\"brand_id\":\"6\",\"product_name\":\"Wms Run Star Legacy CX\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1683137273-59157.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683137273-59157.jpeg\\\"}]\",\"category_id\":\"2\",\"sst_id\":\"19\",\"general_shoe_id\":\"18\",\"colour_id\":\"9\",\"size_id\":\"4\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1683137303-57306.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683137303-57306.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683137303-69784.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683137303-69784.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683137304-30387.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683137304-30387.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1683137304-80795.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1683137304-80795.jpeg\\\"}]\",\"stock\":\"14\",\"price\":\"699\",\"st_id\":\"4\",\"size\":\"UK7\",\"ct_id\":\"9\",\"colour\":\"Pink\",\"quantity\":3}]', '{\"id\":\"7\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"username\":null,\"password\":\"$2y$10$wjJEU7S5T73MMK\\/lPA\\/kJ.80kAGDdqymXSA4WQB7QvnPvSo3CuZuK\",\"phone_number\":\"1234567890\",\"email\":\"1032210542@mitwpu.edu.in\",\"address\":null,\"user_type\":\"customer\",\"created\":\"1683125842\"}', '1683737488', 2097),
(28, 8, '1', '{\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"phone_number\":\"123456789\",\"address\":\"\",\"payment_method\":\"None Selected\"}', '[{\"bb_id\":\"2\",\"b_name\":\"Nike\",\"description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?\",\"gst_id\":\"15\",\"brand_id\":\"2\",\"product_name\":\"Blazer Mid \'77 QS\",\"image\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682765887-77873.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682765887-77873.jpeg\\\"}]\",\"category_id\":\"1\",\"sst_id\":\"15\",\"general_shoe_id\":\"15\",\"colour_id\":\"2\",\"size_id\":\"7\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1682766057-67179.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-67179.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-37837.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-37837.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-74211.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-74211.jpeg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1682766057-96395.jpeg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1682766057-96395.jpeg\\\"}]\",\"stock\":\"51\",\"price\":\"700\",\"st_id\":\"7\",\"size\":\"UK11\",\"ct_id\":\"2\",\"colour\":\"White\",\"quantity\":1}]', '{\"id\":\"8\",\"first_name\":\"Viren\",\"last_name\":\"Khatri\",\"username\":null,\"password\":\"$2y$10$kKy4sAnNDnOnPfdtzsoPYO\\/JUqctW7pCORgZwwdoyYVD\\/376ocFSa\",\"phone_number\":\"123456789\",\"email\":\"vsk102002@gmail.com\",\"address\":\"\",\"user_type\":\"admin\",\"created\":\"1687334574\"}', '1687359177', 700);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `prt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`prt_id`, `item_id`, `name`, `email`, `rating`, `review`, `time`) VALUES
(1, 15, 'Viren Khatri', 'vsk102002@gmail.com', 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium assumenda reprehenderit ducimus id, sed eligendi architecto molestias non excepturi cum vel velit sunt consequuntur pariatur dolorum impedit alias, sit ipsam beatae quaerat?', 1682788016),
(2, 15, 'John Doe', 'fsdkfnn@gmail.com', 3, 'fskandfl roewjqrpoq xknclkas oweqjrq kdsncfklasd eoqpr scbasfh fiuhweqiufer', 1682788423),
(3, 11, 'gfasdfg', 'fasdf@gmail.com', 5, 'dfaasdfgdfghsdf', 1683737425),
(4, 15, 'fdas', 'dasf@fmail.com', 4, 'dfghfdsafhgdszbdf', 1687359781);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `st_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`st_id`, `size`) VALUES
(1, 'UK10'),
(2, 'UK5'),
(3, 'UK6'),
(4, 'UK7'),
(5, 'UK8'),
(6, 'UK9'),
(7, 'UK11'),
(8, 'UK12'),
(9, 'UK4');

-- --------------------------------------------------------

--
-- Table structure for table `specific_shoe`
--

CREATE TABLE `specific_shoe` (
  `sst_id` int(11) NOT NULL,
  `general_shoe_id` int(11) NOT NULL,
  `colour_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `photos` text DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specific_shoe`
--

INSERT INTO `specific_shoe` (`sst_id`, `general_shoe_id`, `colour_id`, `size_id`, `photos`, `stock`, `price`) VALUES
(3, 2, 2, 7, '[{\"src\":\"uploads\\/1682417100-87570.jpeg\",\"thumb\":\"uploads\\/thumb_1682417100-87570.jpeg\"},{\"src\":\"uploads\\/1682417100-12856.jpeg\",\"thumb\":\"uploads\\/thumb_1682417100-12856.jpeg\"},{\"src\":\"uploads\\/1682417100-80415.jpeg\",\"thumb\":\"uploads\\/thumb_1682417100-80415.jpeg\"},{\"src\":\"uploads\\/1682417100-8277.jpeg\",\"thumb\":\"uploads\\/thumb_1682417100-8277.jpeg\"}]', 12, 2100),
(6, 5, 1, 7, '[{\"src\":\"uploads\\/1682417932-16988.jpeg\",\"thumb\":\"uploads\\/thumb_1682417932-16988.jpeg\"},{\"src\":\"uploads\\/1682417932-8564.jpeg\",\"thumb\":\"uploads\\/thumb_1682417932-8564.jpeg\"},{\"src\":\"uploads\\/1682417932-6066.jpeg\",\"thumb\":\"uploads\\/thumb_1682417932-6066.jpeg\"},{\"src\":\"uploads\\/1682417933-83943.jpeg\",\"thumb\":\"uploads\\/thumb_1682417933-83943.jpeg\"}]', 32, 1699),
(10, 7, 9, 2, '[{\"src\":\"uploads\\/1682442747-13896.jpeg\",\"thumb\":\"uploads\\/thumb_1682442747-13896.jpeg\"},{\"src\":\"uploads\\/1682442747-60165.jpeg\",\"thumb\":\"uploads\\/thumb_1682442747-60165.jpeg\"},{\"src\":\"uploads\\/1682442747-67349.jpeg\",\"thumb\":\"uploads\\/thumb_1682442747-67349.jpeg\"},{\"src\":\"uploads\\/1682442747-87825.jpeg\",\"thumb\":\"uploads\\/thumb_1682442747-87825.jpeg\"}]', 11, 450),
(11, 8, 9, 3, '[{\"src\":\"uploads\\/1682442845-3022.jpeg\",\"thumb\":\"uploads\\/thumb_1682442845-3022.jpeg\"},{\"src\":\"uploads\\/1682442845-55556.jpeg\",\"thumb\":\"uploads\\/thumb_1682442845-55556.jpeg\"},{\"src\":\"uploads\\/1682442845-57384.jpeg\",\"thumb\":\"uploads\\/thumb_1682442845-57384.jpeg\"},{\"src\":\"uploads\\/1682442845-63311.jpeg\",\"thumb\":\"uploads\\/thumb_1682442845-63311.jpeg\"}]', 10, 1299),
(12, 9, 9, 4, '[{\"src\":\"uploads\\/1682443149-25976.jpeg\",\"thumb\":\"uploads\\/thumb_1682443149-25976.jpeg\"},{\"src\":\"uploads\\/1682443149-19486.jpeg\",\"thumb\":\"uploads\\/thumb_1682443149-19486.jpeg\"},{\"src\":\"uploads\\/1682443150-39639.jpeg\",\"thumb\":\"uploads\\/thumb_1682443150-39639.jpeg\"},{\"src\":\"uploads\\/1682443150-8514.jpeg\",\"thumb\":\"uploads\\/thumb_1682443150-8514.jpeg\"}]', 21, 1499),
(13, 10, 3, 5, '[{\"src\":\"uploads\\/1682443336-96205.jpeg\",\"thumb\":\"uploads\\/thumb_1682443336-96205.jpeg\"},{\"src\":\"uploads\\/1682443336-77936.jpeg\",\"thumb\":\"uploads\\/thumb_1682443336-77936.jpeg\"},{\"src\":\"uploads\\/1682443336-45508.jpeg\",\"thumb\":\"uploads\\/thumb_1682443336-45508.jpeg\"},{\"src\":\"uploads\\/1682443336-44985.jpeg\",\"thumb\":\"uploads\\/thumb_1682443336-44985.jpeg\"}]', 13, 1199),
(14, 11, 7, 3, '[{\"src\":\"uploads\\/1682765621-84478.jpeg\",\"thumb\":\"uploads\\/thumb_1682765621-84478.jpeg\"},{\"src\":\"uploads\\/1682765621-61995.jpeg\",\"thumb\":\"uploads\\/thumb_1682765621-61995.jpeg\"},{\"src\":\"uploads\\/1682765621-52683.jpeg\",\"thumb\":\"uploads\\/thumb_1682765621-52683.jpeg\"},{\"src\":\"uploads\\/1682765621-83530.jpeg\",\"thumb\":\"uploads\\/thumb_1682765621-83530.jpeg\"}]', 22, 999),
(15, 15, 2, 7, '[{\"src\":\"uploads\\/1682766057-67179.jpeg\",\"thumb\":\"uploads\\/thumb_1682766057-67179.jpeg\"},{\"src\":\"uploads\\/1682766057-37837.jpeg\",\"thumb\":\"uploads\\/thumb_1682766057-37837.jpeg\"},{\"src\":\"uploads\\/1682766057-74211.jpeg\",\"thumb\":\"uploads\\/thumb_1682766057-74211.jpeg\"},{\"src\":\"uploads\\/1682766057-96395.jpeg\",\"thumb\":\"uploads\\/thumb_1682766057-96395.jpeg\"}]', 50, 700);

--
-- Triggers `specific_shoe`
--
DELIMITER $$
CREATE TRIGGER `stock_logging` AFTER UPDATE ON `specific_shoe` FOR EACH ROW BEGIN
INSERT INTO stock_log (item_id, available_stock, date_time) VALUES (OLD.sst_id, NEW.stock, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `sl_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `available_stock` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`sl_id`, `item_id`, `available_stock`, `date_time`) VALUES
(1, 11, 13, '2023-04-29 12:22:50'),
(2, 13, 13, '2023-04-29 12:22:50'),
(3, 5, 66, '2023-04-30 10:20:54'),
(4, 5, 89, '2023-04-30 10:21:05'),
(5, 5, 89, '2023-04-30 10:42:40'),
(6, 9, 28, '2023-04-30 10:42:40'),
(7, 11, 10, '2023-04-30 11:07:38'),
(8, 14, 22, '2023-04-30 11:07:38'),
(9, 15, 51, '2023-04-30 11:07:38'),
(10, 10, 11, '2023-04-30 11:07:38'),
(11, 15, 50, '2023-05-02 13:36:04'),
(12, 20, 12, '2023-05-09 07:36:54'),
(13, 21, 8, '2023-05-09 14:45:28'),
(14, 19, 11, '2023-05-10 22:21:28'),
(15, 19, 11, '2023-06-21 18:18:35'),
(16, 19, 11, '2023-06-21 18:18:39'),
(17, 15, 51, '2023-06-21 18:40:18'),
(18, 15, 51, '2023-06-21 18:40:30'),
(19, 15, 50, '2023-06-21 20:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `temp_quantity`
--

CREATE TABLE `temp_quantity` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_quantity`
--

INSERT INTO `temp_quantity` (`order_id`, `item_id`, `item_quantity`, `user_id`) VALUES
(27, 19, 3, 7),
(28, 15, 1, 8);

--
-- Triggers `temp_quantity`
--
DELIMITER $$
CREATE TRIGGER `checkout_stock_update` AFTER INSERT ON `temp_quantity` FOR EACH ROW BEGIN
UPDATE specific_shoe SET stock = stock-NEW.item_quantity WHERE sst_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `phone_number`, `email`, `address`, `user_type`, `created`) VALUES
(7, 'John', 'Doe', NULL, '$2y$10$wjJEU7S5T73MMK/lPA/kJ.80kAGDdqymXSA4WQB7QvnPvSo3CuZuK', '1234567890', '1032210542@mitwpu.edu.in', NULL, 'customer', '1683125842'),
(8, 'Viren', 'Khatri', NULL, '$2y$10$kKy4sAnNDnOnPfdtzsoPYO/JUqctW7pCORgZwwdoyYVD/376ocFSa', '123456789', 'vsk102002@gmail.com', '', 'admin', '1687334574');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `general_product_id` int(11) NOT NULL,
  `created_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wt_id`, `user_id`, `general_product_id`, `created_time`) VALUES
(22, 7, 15, '1683126166'),
(27, 8, 11, '1687357429');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bb_id`),
  ADD UNIQUE KEY `b_name` (`b_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`ct_id`),
  ADD UNIQUE KEY `colour` (`colour`);

--
-- Indexes for table `deleted_log`
--
ALTER TABLE `deleted_log`
  ADD PRIMARY KEY (`dl_id`),
  ADD KEY `gst_id` (`gst_id`);

--
-- Indexes for table `general_shoe`
--
ALTER TABLE `general_shoe`
  ADD PRIMARY KEY (`gst_id`),
  ADD KEY `general_shoe_ibfk_1` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`prt_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `specific_shoe`
--
ALTER TABLE `specific_shoe`
  ADD PRIMARY KEY (`sst_id`),
  ADD KEY `general_shoe_id` (`general_shoe_id`),
  ADD KEY `colour_id` (`colour_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`sl_id`),
  ADD KEY `stock_log_ibfk_1` (`item_id`);

--
-- Indexes for table `temp_quantity`
--
ALTER TABLE `temp_quantity`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `temp_quantity_ibfk_3` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wt_id`),
  ADD KEY `general_product_id` (`general_product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deleted_log`
--
ALTER TABLE `deleted_log`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `general_shoe`
--
ALTER TABLE `general_shoe`
  MODIFY `gst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `prt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `specific_shoe`
--
ALTER TABLE `specific_shoe`
  MODIFY `sst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deleted_log`
--
ALTER TABLE `deleted_log`
  ADD CONSTRAINT `deleted_log_ibfk_1` FOREIGN KEY (`gst_id`) REFERENCES `general_shoe` (`gst_id`);

--
-- Constraints for table `general_shoe`
--
ALTER TABLE `general_shoe`
  ADD CONSTRAINT `general_shoe_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `general_shoe_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`bb_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `general_shoe` (`gst_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specific_shoe`
--
ALTER TABLE `specific_shoe`
  ADD CONSTRAINT `specific_shoe_ibfk_1` FOREIGN KEY (`general_shoe_id`) REFERENCES `general_shoe` (`gst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specific_shoe_ibfk_2` FOREIGN KEY (`colour_id`) REFERENCES `colours` (`ct_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `specific_shoe_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`st_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `temp_quantity`
--
ALTER TABLE `temp_quantity`
  ADD CONSTRAINT `temp_quantity_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`general_product_id`) REFERENCES `general_shoe` (`gst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
