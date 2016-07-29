-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2016 at 12:19 PM
-- Server version: 5.6.30
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youpple`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `deleted_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `fullname`, `username`, `email`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '', 'kendysond', 'kendyson@kendyson.com', '$2y$10$4WMmRhJtpc/RCsZiuvjteuqxWkXzdzNsfwqElpJiFfC6b.tTvNrDW', 'i7XAEOykgUmOiipVcwNQ92AVokpHVUUONRMMg5geKqycoMo6EbZGrpPQfWoi', '0000-00-00', '2016-06-03 20:59:43', '2016-07-29 10:13:21'),
(2, 'hgkjjh', 'jnjkn', 'kendysojn@kendyson.com', '$2y$10$ZhEOoLn3.L37nM1vii96YONOqBKjrZbas83WsGDHnVCOsYSWKSdxC', '', '0000-00-00', '2016-07-29 10:11:38', '2016-07-29 10:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE IF NOT EXISTS `contestants` (
  `id` int(10) unsigned NOT NULL,
  `award_id` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `award_id`, `image`, `name`, `description`, `vote`, `created_at`, `updated_at`) VALUES
(1, 6, 'http://lorempixel.com/640/480/?53536', 'Ms. Desiree Corkery Sr.', 'Tenetur eum dolores amet. Reprehenderit ut sit quia. Blanditiis itaque in quam eos eum ut laboriosam.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(2, 24, 'http://lorempixel.com/640/480/?35024', 'Saul Hayes', 'Odit voluptas ipsa rerum repellendus in. Perspiciatis recusandae dolorem quia facilis nisi omnis hic. Libero veritatis labore quo qui velit. Voluptatum amet neque porro quis fugit.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(3, 8, 'http://lorempixel.com/640/480/?55580', 'Prof. Michaela Bauch', 'Cupiditate commodi ad eum at nam quae quaerat. Aut corrupti perferendis aspernatur in eum nesciunt quis. Et nulla soluta amet possimus aut aliquid maiores.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(4, 13, 'http://lorempixel.com/640/480/?76281', 'Cordell Spencer MD', 'Enim aliquam aperiam dolor incidunt. Inventore occaecati delectus quisquam libero blanditiis aut et. Qui occaecati quisquam sint necessitatibus.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(5, 13, 'http://lorempixel.com/640/480/?88801', 'Miss Bridie Toy', 'Illo aperiam quaerat maiores optio soluta temporibus blanditiis dolorem. Quia est aut sit ullam provident laudantium. Ex quis pariatur vel harum laboriosam.', 0, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(6, 8, 'http://lorempixel.com/640/480/?68771', 'Lisette Moen', 'Modi iure perspiciatis sunt. Tempore error fuga rem eum dicta qui.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(7, 2, 'http://lorempixel.com/640/480/?84882', 'Martina Reilly IV', 'Fuga qui corrupti eum sit. Et reiciendis ut ipsa repudiandae dolorum quo qui. Sed consequatur dolor facere incidunt vero et.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(8, 23, 'http://lorempixel.com/640/480/?40398', 'Adelbert Cormier', 'Illo vel culpa magnam qui et. Inventore sit voluptatem at veniam. Quisquam molestiae et magni placeat repudiandae libero. Numquam cumque nisi iure qui.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(9, 13, 'http://lorempixel.com/640/480/?95279', 'Samara Turcotte', 'Inventore voluptas sint magnam facilis fugiat dolor. Saepe ut non deleniti quis nihil iure assumenda. Quia qui ut ut.\nNihil iure ut laboriosam. Qui natus possimus quo.', 0, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(10, 18, 'http://lorempixel.com/640/480/?36296', 'William Kshlerin', 'Quia aut eum consectetur. Consequatur est corrupti similique. Quam odit qui ut et quasi. Ad adipisci aut quisquam reprehenderit sint facilis perferendis.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(11, 5, 'http://lorempixel.com/640/480/?36398', 'Cassandra Homenick', 'Reprehenderit numquam rerum perferendis possimus id ducimus ad. Voluptatem modi et beatae omnis esse labore. Est pariatur quos animi provident.', 8, '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(12, 15, 'http://lorempixel.com/640/480/?38269', 'Adriel Johnson V', 'Saepe officia ut est aut. Alias occaecati libero fuga quidem et voluptas. Autem dolores at officiis veritatis ratione velit ratione.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(13, 9, 'http://lorempixel.com/640/480/?57528', 'Ally McCullough', 'Omnis aut ducimus provident ex libero assumenda. Laboriosam excepturi fuga impedit earum quia consequuntur saepe. Voluptas et distinctio quidem vel iusto consectetur.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(14, 24, 'http://lorempixel.com/640/480/?69841', 'Mr. Monserrate Keeling II', 'Id velit nobis minima esse cum deserunt qui ut. Et architecto at natus occaecati ut. Corrupti omnis ipsa tenetur.', 9, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(15, 16, 'http://lorempixel.com/640/480/?94605', 'America Rice', 'Sint ducimus sequi minima excepturi est. Laboriosam vel aliquam sunt ea corporis. Consequatur eaque consequatur sit laboriosam natus.', 3, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(16, 4, 'http://lorempixel.com/640/480/?98468', 'Morgan Romaguera', 'Laborum a deserunt ipsum nostrum officiis. Ut minus aut hic omnis provident. Dolores id accusantium pariatur adipisci atque iusto unde qui.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(17, 21, 'http://lorempixel.com/640/480/?34575', 'Griffin Nader', 'Laborum qui molestiae autem repudiandae reiciendis beatae cumque. Hic recusandae aspernatur et nihil. Quas perspiciatis aut maxime sed. Dolores quae doloremque qui est id quos temporibus.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(18, 11, 'http://lorempixel.com/640/480/?95126', 'Dr. Fiona Dickens', 'Eos fuga dolores excepturi esse. Hic voluptatem doloribus id voluptatem sunt omnis. Omnis consequatur voluptas nulla eos. Minima ut deleniti aspernatur ex harum ut.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(19, 21, 'http://lorempixel.com/640/480/?98896', 'Adrianna Kilback', 'Voluptas autem exercitationem dolorum sint aut maiores esse. Laborum adipisci non quia aut. Itaque non maxime quasi quam. Deleniti error hic ut quaerat fuga sed reiciendis.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(20, 16, 'http://lorempixel.com/640/480/?98810', 'Mr. Branson Krajcik', 'Odit nostrum quis dolores vero voluptatem itaque. Quas ipsam sit inventore in voluptas. Ipsum consequuntur dolorem eum reiciendis quae asperiores sapiente.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(21, 4, 'http://lorempixel.com/640/480/?78754', 'Miss Jordane Bernhard V', 'Accusantium doloribus dolor expedita quidem nobis alias. Repellendus porro ipsum neque. Officiis enim ea tempore ut excepturi. Consectetur commodi repellendus et optio.', 9, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(22, 24, 'http://lorempixel.com/640/480/?58294', 'Hoyt Kuvalis', 'Facilis laboriosam provident ut laboriosam ab. Ut est doloribus velit qui. Non rerum esse aut voluptate voluptatibus quia. Provident voluptas sunt ullam eum repudiandae corrupti nostrum.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(23, 20, 'http://lorempixel.com/640/480/?59406', 'Prof. Wilhelm Heller PhD', 'Voluptas omnis amet aspernatur debitis consequuntur voluptate. Possimus animi inventore quae qui sed.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(24, 16, 'http://lorempixel.com/640/480/?48207', 'Davon Muller', 'Consequuntur aperiam minima soluta qui ad quaerat deleniti quod. Sit quia error ab in ipsum. Rerum in et et illo et magnam praesentium.', 0, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(25, 25, 'http://lorempixel.com/640/480/?91870', 'Hortense Runolfsdottir', 'Occaecati temporibus eveniet sit. Est nam et vero aut nihil odit omnis vero. Magnam aut alias voluptatem impedit ut labore vel.', 3, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(26, 21, 'http://lorempixel.com/640/480/?26436', 'Marlene Wisoky MD', 'Dolores quos minima incidunt eveniet magnam dolorem. Ad molestias eius animi provident sed ut. Nulla sint voluptatem qui.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(27, 24, 'http://lorempixel.com/640/480/?34145', 'Mr. Franco Dach Sr.', 'Quia tempora aut assumenda similique. Aut ullam velit voluptas quia qui qui. Quas dolores id vero.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(28, 7, 'http://lorempixel.com/640/480/?10082', 'Lonzo Rau', 'Consequatur repellendus est molestiae in quis inventore. Architecto non ad magnam porro. Enim consequatur vero rerum odit. Ipsum facere possimus repellat deserunt repellendus et magnam delectus.', 2, '2016-06-13 15:59:09', '2016-06-18 18:47:42'),
(29, 15, 'http://lorempixel.com/640/480/?62675', 'Dr. Catalina Kirlin Jr.', 'Ipsam molestias iste accusantium repudiandae expedita. Minima ea sit atque odio culpa. Ipsa eum at mollitia sunt.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(30, 25, 'http://lorempixel.com/640/480/?62028', 'Anya Kunde', 'Minus et tempora non repellat. Dolor nobis fugiat cupiditate quis est. Rerum sed nihil ut fugit in suscipit praesentium ipsam. Neque id voluptas et minus optio fugiat.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(31, 8, 'http://lorempixel.com/640/480/?73264', 'Mrs. Lavada Konopelski DVM', 'Voluptatem tenetur iste voluptate veniam iusto doloremque sit. Et ut possimus sed sed officia sapiente numquam. Incidunt quia ducimus sunt voluptatem non. Excepturi illo ut deserunt sint.', 5, '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(32, 4, 'http://lorempixel.com/640/480/?11945', 'Mandy Tremblay', 'Laborum voluptates aut delectus perspiciatis in totam. Et nemo porro perferendis repudiandae ex unde. Exercitationem quia unde sapiente voluptatem iste molestiae.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(33, 17, 'http://lorempixel.com/640/480/?77313', 'Miss Nikita Reilly', 'Et repudiandae consequuntur expedita quam rem culpa aut. Repellendus quidem ipsa voluptatem pariatur quaerat. Quae explicabo enim tempore quia. Eos deleniti eligendi nisi explicabo perspiciatis.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(34, 19, 'http://lorempixel.com/640/480/?49653', 'Garrison Davis', 'Ad sed et officiis nihil. Ipsam blanditiis ab hic ab dolorem omnis nisi quam. Voluptatem est laudantium laudantium exercitationem cupiditate id voluptates.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(35, 8, 'http://lorempixel.com/640/480/?69872', 'Adella Effertz', 'Quas cumque dolorum illo. Exercitationem est earum quisquam fugit impedit dolor.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(36, 9, 'http://lorempixel.com/640/480/?72674', 'Valerie Heidenreich PhD', 'Libero optio ut dolor quis voluptatem voluptatem voluptas. Rem accusamus qui odit omnis ipsum placeat. Voluptate esse aliquam sit non. Voluptatibus reiciendis consequatur soluta.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(37, 12, 'http://lorempixel.com/640/480/?73206', 'Celestine Graham', 'Error cupiditate voluptates nihil. Et laudantium dolorum impedit dolorem. Deleniti sunt ea qui fugiat in fugiat consequatur. Sit consequuntur nostrum aut deleniti.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(38, 23, 'http://lorempixel.com/640/480/?73632', 'Raven Lemke', 'Ut quam perferendis aut eaque provident id. Veritatis inventore excepturi dolorem accusamus quo. Et et repudiandae ex vitae explicabo incidunt. Distinctio tempore minima eaque eos quas.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(39, 23, 'http://lorempixel.com/640/480/?41082', 'Prof. Jordan Champlin', 'Sit odit nihil enim consectetur eius ab. Tenetur fuga et blanditiis dolores. Et laboriosam expedita sit ad in eos quas. Doloribus consequuntur eligendi voluptatibus quasi quas commodi.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(40, 11, 'http://lorempixel.com/640/480/?28242', 'Rogelio Stokes PhD', 'Minus illum voluptatibus et delectus vel. Vel quia maiores non numquam. Magni molestiae eum nesciunt vel voluptas.', 9, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(41, 17, 'http://lorempixel.com/640/480/?60928', 'Dr. Evie Abernathy II', 'Mollitia eos deleniti in animi. Ad provident dignissimos laudantium est recusandae aperiam sit. Voluptatem perspiciatis natus et sint alias delectus dolor. Dolorem id est quis quas.', 8, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(42, 21, 'http://lorempixel.com/640/480/?14320', 'Mrs. America Jacobs DDS', 'Hic quia harum expedita et. Iste labore eum iste. Ut unde nulla nostrum officiis accusantium. Exercitationem sit sunt autem ea excepturi.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(43, 16, 'http://lorempixel.com/640/480/?10952', 'Viola Ward II', 'Animi possimus sunt porro enim excepturi officiis velit. Ut et sunt quas labore dolorem aperiam eveniet.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(44, 14, 'http://lorempixel.com/640/480/?78906', 'Watson Casper', 'Perspiciatis nobis aut perferendis impedit. Sed consequuntur et illum quia qui. Rem ut quibusdam voluptates aliquid quo recusandae ducimus.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(45, 13, 'http://lorempixel.com/640/480/?38785', 'Mona Pollich', 'Fuga et et voluptas reiciendis molestiae. In iste occaecati veritatis esse. Occaecati sed ut vel esse aperiam laborum.', 0, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(46, 10, 'http://lorempixel.com/640/480/?64456', 'Jackeline Powlowski', 'Libero sint aut aspernatur. Est laudantium inventore sed numquam provident id. Doloribus ad magnam voluptatum modi. Rerum consequatur dignissimos et qui quibusdam.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(47, 11, 'http://lorempixel.com/640/480/?36902', 'Dario Kirlin', 'Quia exercitationem assumenda enim vel eligendi aliquid. Eos facere dolorum minus voluptas. Perspiciatis distinctio sunt architecto sed qui.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(48, 6, 'http://lorempixel.com/640/480/?78977', 'Jasper Hettinger', 'Unde perspiciatis temporibus excepturi molestiae. Ipsa nobis incidunt sed. Magnam quis consequuntur corporis perspiciatis. Iusto magni commodi non non aut ducimus.', 1, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(49, 18, 'http://lorempixel.com/640/480/?60206', 'Roman Von', 'Qui et corrupti tempore iusto voluptatem ipsa illo. Dignissimos natus voluptates tempora ab. Sint dolores repellat et. Est quis dignissimos possimus ut culpa et.', 3, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(50, 22, 'http://lorempixel.com/640/480/?13649', 'Kristoffer Goyette', 'Id et rerum omnis quia iusto magni. Corporis ipsa nihil doloremque itaque. Sint voluptatem sit sed quis. Aut magni consectetur dolor maxime enim.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(51, 19, 'http://lorempixel.com/640/480/?76693', 'Cody Brakus', 'Voluptate incidunt dicta qui minus assumenda culpa ut modi. Voluptatem dolor amet quis. Voluptas nulla incidunt facilis eius officia.', 0, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(52, 16, 'http://lorempixel.com/640/480/?74816', 'Mr. Freddie Lowe', 'Adipisci nesciunt in mollitia voluptatem. Autem illum sed adipisci commodi non tempora autem. Placeat id facere neque non est. Beatae laboriosam doloribus cupiditate suscipit.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(53, 13, 'http://lorempixel.com/640/480/?92891', 'Ladarius Keebler', 'Nobis sit atque facere. Dolore eaque voluptatum exercitationem quia omnis architecto. Reprehenderit excepturi sed quasi eos eos. Aperiam minima repellendus labore.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(54, 5, 'http://lorempixel.com/640/480/?70336', 'Mr. Mavis Turcotte II', 'Qui corporis corporis est et perferendis molestiae. Non nihil qui quos aliquid odio non nostrum. Accusantium sequi praesentium quod. Corrupti ea omnis omnis nulla dolore suscipit est.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(55, 14, 'http://lorempixel.com/640/480/?96785', 'Derek Harvey', 'Repudiandae maiores architecto minus nulla ducimus non nobis. Cum reiciendis maiores soluta ut. Error odit delectus beatae eius quo culpa. Commodi natus sit ab qui harum et.', 8, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(56, 9, 'http://lorempixel.com/640/480/?42302', 'Alanna Ondricka', 'Dolorem rem iste iusto. Aspernatur sit ea dolores voluptas nam. Molestias aut dolore quidem. Consectetur et mollitia enim cumque maiores impedit accusamus.', 6, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(57, 15, 'http://lorempixel.com/640/480/?82195', 'Prof. Tania Jaskolski V', 'Voluptate voluptate maiores officiis. Laborum eum possimus eos veniam assumenda et. Odio quia autem voluptas aut impedit voluptatem.', 8, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(58, 17, 'http://lorempixel.com/640/480/?90381', 'Marcelina Cruickshank', 'Omnis amet ut pariatur sint. Eos laborum aut et pariatur. Accusantium autem expedita magni delectus quisquam suscipit quo.', 2, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(59, 8, 'http://lorempixel.com/640/480/?58566', 'Oleta Bradtke IV', 'Ratione sequi et molestiae esse. Minus dolorum quia aperiam distinctio dolores ad. Ipsam velit unde qui voluptate distinctio dolores molestiae. In illo saepe expedita dignissimos quo.', 4, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(60, 10, 'http://lorempixel.com/640/480/?11960', 'Dr. Herbert King', 'Eaque nulla sed ratione. Asperiores dicta voluptatem ad ex. At est voluptatibus id quis possimus a.', 5, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(61, 5, 'http://lorempixel.com/640/480/?78807', 'Kailey Gutmann', 'Qui et quo et. Consequuntur sit quod quidem reiciendis. Explicabo est molestias voluptate ab ut perspiciatis. Deleniti qui veritatis ut.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(62, 3, 'http://lorempixel.com/640/480/?37508', 'Adriel Schuster', 'Sed est cumque et. Porro porro illo voluptatum rerum culpa. Aut inventore officia qui officia officiis.', 7, '2016-06-13 15:59:09', '2016-06-18 18:47:10'),
(63, 1, 'http://lorempixel.com/640/480/?77100', 'Dr. Milton Breitenberg', 'Tempora quo officiis beatae enim. Aspernatur tenetur vel eligendi. Sit dolorem inventore optio dicta iure quos ut.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(64, 11, 'http://lorempixel.com/640/480/?67486', 'Oma Conroy', 'Iure molestiae voluptates et repellat sequi corporis. In est neque nostrum et quae. Illo occaecati tenetur repudiandae reprehenderit aliquam labore et consequatur.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(65, 25, 'http://lorempixel.com/640/480/?72129', 'Garnett Gusikowski V', 'Incidunt et ducimus asperiores deserunt officia architecto. Et ut aperiam est aperiam voluptas earum.', 8, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(66, 23, 'http://lorempixel.com/640/480/?79669', 'Sandy Okuneva', 'Voluptas laboriosam aut doloribus. Aut ad in totam eum. Eum deserunt facilis voluptatibus beatae qui consequatur libero. Eveniet perspiciatis est delectus nesciunt repudiandae voluptatem qui.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(67, 4, 'http://lorempixel.com/640/480/?60569', 'Elda Gulgowski', 'Occaecati vitae voluptatem qui harum dolorum. Ut corporis itaque sed illum ipsum nostrum. Consequatur et ratione inventore.', 7, '2016-06-13 15:59:09', '2016-06-13 16:00:24'),
(68, 14, 'http://lorempixel.com/640/480/?57821', 'Miss Meda Krajcik', 'Accusamus sed laborum minus omnis sit ipsam tempore. Iusto consectetur dolores qui qui fugiat. Fuga et est alias deleniti ut reprehenderit in. Nihil at quod sed inventore illo.', 2, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(69, 7, 'http://lorempixel.com/640/480/?87514', 'Soledad Quigley', 'Ut quibusdam nam vero esse necessitatibus. Voluptatibus illum nisi nulla recusandae facilis veritatis. Mollitia unde et aperiam voluptas doloremque velit. Ipsam autem facilis sequi nihil cumque quo.', 9, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(70, 22, 'http://lorempixel.com/640/480/?15265', 'Shanelle Boyle', 'Quas quia aperiam unde velit. Ut tempora distinctio cumque repellendus aperiam necessitatibus atque. Tempora consequatur necessitatibus incidunt dolor aspernatur ad.', 1, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(71, 16, 'http://lorempixel.com/640/480/?56612', 'Dr. Berenice Greenholt IV', 'Dolor quia molestiae hic quia aliquid tenetur. Est dolores consectetur consequatur cum nihil. Sed ipsam omnis sunt nam sunt animi similique. Nesciunt est quam non sit nemo dolorem incidunt aut.', 8, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(72, 8, 'http://lorempixel.com/640/480/?53790', 'Mrs. Audra Jacobson PhD', 'Rem deleniti dolor soluta. Aut corporis aut odit omnis tempore in. Eius molestiae sunt aut necessitatibus et. Nostrum est voluptas voluptatem dolores.', 7, '2016-06-13 15:59:10', '2016-06-13 15:59:10'),
(73, 18, 'http://lorempixel.com/640/480/?61764', 'Oda White', 'Magni et architecto est tempora pariatur consectetur ea alias. Quo animi autem maiores molestias magnam laboriosam ipsa aut.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(74, 9, 'http://lorempixel.com/640/480/?27905', 'Marilyne Wolff', 'Natus quo et qui deleniti ratione iste. Totam cumque magnam et tenetur sunt voluptatem. Animi asperiores dolorum dolor voluptate iure eos porro.', 3, '2016-06-13 15:59:10', '2016-06-13 15:59:10'),
(75, 24, 'http://lorempixel.com/640/480/?19900', 'Dr. Orland Breitenberg', 'Et corrupti nihil eaque est. Aperiam et accusamus occaecati cupiditate ab qui. Repudiandae dignissimos aut corrupti molestias eveniet sit eveniet. Numquam harum eligendi quam.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(76, 21, 'http://lorempixel.com/640/480/?92214', 'Niko Wehner DVM', 'Consequuntur voluptatem eum error neque. Ab ea et ea non illum voluptatum. Et dolorum ut iure beatae enim in ad.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:24'),
(77, 14, 'http://lorempixel.com/640/480/?37998', 'Grady Howell I', 'Dicta dolore dolores tempore. Sint et quidem similique saepe sed. Sunt aut nostrum officiis vel.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(78, 5, 'http://lorempixel.com/640/480/?52436', 'Anika Dooley', 'Blanditiis consequatur et facilis. Labore ut qui rerum temporibus. Eum et ut quis nesciunt molestiae quia sunt. Sit qui earum molestiae et accusantium omnis eum. Fuga quo qui est quia.', 5, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(79, 3, 'http://lorempixel.com/640/480/?53004', 'Lily Heidenreich I', 'Fugit suscipit iste debitis consequatur voluptatem ut exercitationem. Aut voluptatum placeat recusandae ut unde eum beatae. Unde eaque non assumenda consequatur sit est.', 6, '2016-06-13 15:59:10', '2016-06-18 18:41:04'),
(80, 18, 'http://lorempixel.com/640/480/?74914', 'Florencio Kreiger', 'Nihil vel quaerat impedit quis totam laudantium. Et illo saepe est ipsum omnis aut. Blanditiis est est ducimus quo.', 7, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(81, 12, 'http://lorempixel.com/640/480/?25506', 'Prof. Keaton Mayer', 'Ut accusantium impedit voluptates assumenda dolores provident quo corrupti. Molestiae ipsa eos voluptatem. Soluta quisquam impedit rerum est. Suscipit et rerum doloribus ab quis sed est quos.', 5, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(82, 19, 'http://lorempixel.com/640/480/?67092', 'Mrs. Breanne Boyle MD', 'Aut quos similique magni eveniet quia aut molestias voluptate. Eos ut fugit rerum iure. Et repellat commodi optio quo alias reiciendis aspernatur sunt.', 7, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(83, 13, 'http://lorempixel.com/640/480/?75396', 'Eunice Hagenes II', 'Dolorum et rerum saepe autem. Dolores aperiam alias consectetur recusandae error aut. Aut a occaecati labore repellat.', 2, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(84, 1, 'http://lorempixel.com/640/480/?84726', 'Tristin Mills', 'Adipisci voluptas sit facilis saepe magnam officiis corporis. Atque hic neque perferendis ut sint et et. Nisi ut rem voluptas veniam.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(85, 19, 'http://lorempixel.com/640/480/?78634', 'Linnie White', 'Pariatur sunt voluptatum sint. Ducimus delectus saepe eos sunt similique corporis omnis. Neque amet rem ut tempore.', 5, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(86, 21, 'http://lorempixel.com/640/480/?46774', 'Rosie Nader Sr.', 'Iure inventore et occaecati dolorum. Possimus deleniti dolor consequatur quidem velit quam. Occaecati hic porro quod et occaecati voluptas dicta totam.', 4, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(87, 5, 'http://lorempixel.com/640/480/?20035', 'Hobart VonRueden', 'Minus qui doloremque odit doloremque. Sunt facilis dolor et at architecto ad.', 6, '2016-06-13 15:59:10', '2016-06-13 15:59:10'),
(88, 10, 'http://lorempixel.com/640/480/?25096', 'Rebeka Keebler', 'Nesciunt nemo libero eum ullam eius eveniet. Enim accusantium id vel. Id est mollitia sunt nisi consequatur et esse.', 4, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(89, 2, 'http://lorempixel.com/640/480/?36026', 'Roxane Ullrich', 'Itaque illum aliquid rerum sed veniam aut. Tempore doloribus cupiditate voluptatem aliquam magni. Exercitationem ab nam officiis est vero eaque. Voluptates repellat non dicta quis.', 0, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(90, 21, 'http://lorempixel.com/640/480/?30240', 'Noe Cassin', 'Qui deleniti asperiores quo odit est assumenda. Aliquam debitis qui et autem adipisci officiis ipsum. Eum rerum esse excepturi sit quibusdam ea sint. Enim ut aut accusantium eius officia debitis.', 6, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(91, 15, 'http://lorempixel.com/640/480/?35069', 'Trudie Witting', 'Rerum laborum ullam doloribus commodi beatae quia corrupti. Vero eligendi ipsum at autem. Eius vel tempore maiores impedit. Magni dolore quidem nostrum et deleniti veritatis.', 7, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(92, 23, 'http://lorempixel.com/640/480/?26921', 'Zackery West III', 'Velit blanditiis deleniti a impedit cum accusantium beatae incidunt. Earum sint molestiae et quo ut similique. Totam alias numquam sed temporibus ipsum assumenda ut.', 2, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(93, 16, 'http://lorempixel.com/640/480/?66366', 'Kristy Green II', 'Eum eaque praesentium assumenda. Id et atque ab quidem pariatur atque pariatur.\nEst omnis voluptatem sed debitis. Nisi sit autem eveniet aliquid. Modi deleniti facere eius neque natus ipsa.', 1, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(94, 15, 'http://lorempixel.com/640/480/?35448', 'Margarette Hand', 'Quo magni repellendus nisi qui et. Et est numquam fuga quia consequatur.', 8, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(95, 16, 'http://lorempixel.com/640/480/?35816', 'Albert Zemlak', 'Dolorem rerum tenetur qui illum vitae nihil. Officia quae et sed id sit non magni. Nesciunt labore aperiam rerum temporibus.', 2, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(96, 3, 'http://lorempixel.com/640/480/?91718', 'Filomena Kertzmann', 'Ad iusto nihil earum molestiae. Libero et et fugit ab. Autem vitae iste veritatis enim quidem omnis beatae.', 7, '2016-06-13 15:59:10', '2016-06-18 18:44:13'),
(97, 5, 'http://lorempixel.com/640/480/?83591', 'Jared Nader', 'Incidunt impedit molestiae ipsum. Voluptatem voluptas ea eligendi dolore. Nesciunt molestiae incidunt rerum aliquid laudantium unde adipisci. Est magnam est qui.', 3, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(98, 11, 'http://lorempixel.com/640/480/?66952', 'Mandy Friesen', 'Doloribus quia impedit molestiae. Maiores laboriosam optio impedit. Amet blanditiis animi voluptatum sit aut aut accusantium eveniet.', 5, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(99, 22, 'http://lorempixel.com/640/480/?42083', 'Larue Braun', 'Ut error sed deserunt et. Impedit vitae eligendi fugit ad nobis explicabo. Quas doloribus est sint dolores. Consectetur a amet explicabo saepe. Quae non facilis quia et sed est.', 6, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(100, 4, 'http://lorempixel.com/640/480/?73353', 'Raul Hermann', 'Et suscipit sed et dolor. Eligendi enim quod quisquam qui amet aspernatur maxime.', 6, '2016-06-13 15:59:10', '2016-06-13 16:00:25'),
(101, 24, 'http://lorempixel.com/640/480/?27983', 'Alayna Hilll', 'Aspernatur dignissimos magnam deleniti unde. Et velit sunt quia inventore. Dolores et dolorem assumenda harum. Culpa animi nobis maiores.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(102, 5, 'http://lorempixel.com/640/480/?39597', 'Pattie Kemmer', 'Rerum ipsam modi fugiat velit repellat. Praesentium doloremque itaque quibusdam voluptas voluptatem et voluptate. Explicabo et consectetur deleniti odit distinctio eveniet.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(103, 6, 'http://lorempixel.com/640/480/?82127', 'Antonette Doyle', 'Eveniet rem aut est vitae quo. Vel eum saepe dolorem non saepe tempora.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(104, 15, 'http://lorempixel.com/640/480/?83376', 'Dahlia Dibbert III', 'Neque earum autem molestiae rerum. Aut aut quaerat sint aperiam. Ratione numquam et distinctio. Ullam at corrupti et ipsam dolore nam.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(105, 16, 'http://lorempixel.com/640/480/?52607', 'Dr. Mac Klocko Sr.', 'Sapiente doloribus velit commodi fugiat. Ipsam qui omnis est omnis vel accusantium. Qui est recusandae id qui et.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(106, 6, 'http://lorempixel.com/640/480/?70487', 'Mr. Mallory Little', 'Magnam expedita debitis nostrum eum quibusdam. Aut ea dolor qui alias voluptatibus optio. Sed ut non sunt nihil voluptas. Ut autem perspiciatis quia quasi maxime ipsum.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(107, 4, 'http://lorempixel.com/640/480/?25811', 'Stone Schuppe', 'Cupiditate voluptate delectus totam eveniet. Quod dolorem nulla architecto. Aut a illo consectetur. Modi sequi eum est quam minus numquam quos.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(108, 14, 'http://lorempixel.com/640/480/?77333', 'Otto Renner DVM', 'Voluptatibus architecto quam dolore magni. Perferendis id officiis illo repudiandae. Enim ex quis tempora iste explicabo. Doloremque nostrum neque consequatur soluta in reprehenderit et eos.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(109, 12, 'http://lorempixel.com/640/480/?74143', 'Miss Justine Vandervort', 'Dignissimos velit rerum blanditiis. Porro consectetur fugiat est quisquam impedit molestiae. Ab laboriosam consectetur aut rerum vel sit nesciunt. Sed occaecati molestiae quia hic quos iste.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(110, 9, 'http://lorempixel.com/640/480/?71849', 'Easton Rolfson', 'Atque omnis maxime reiciendis ipsum voluptatem deserunt. Beatae id sapiente hic cumque. Natus non id animi rem natus quaerat modi.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(111, 17, 'http://lorempixel.com/640/480/?45940', 'Simeon Cormier', 'Illum excepturi rem eveniet repudiandae. Voluptatum sunt consequatur cum sit non. Consequatur deleniti error saepe reprehenderit sapiente non perferendis. Libero perferendis veritatis quo cupiditate.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(112, 15, 'http://lorempixel.com/640/480/?22812', 'Dr. Sandra Fay I', 'Debitis nam quis velit sint saepe magnam. Voluptates et nihil ipsum reprehenderit ut. Repudiandae enim repellat architecto veniam distinctio eligendi accusamus. Ut rerum dolores explicabo.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(113, 3, 'http://lorempixel.com/640/480/?66561', 'Payton Gutkowski', 'Nostrum accusantium dolorum veritatis nostrum non cupiditate. Doloribus ipsa quibusdam error laudantium officiis minus nesciunt. Perspiciatis neque sit excepturi ut.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(114, 24, 'http://lorempixel.com/640/480/?47698', 'Kitty Kutch', 'Adipisci et occaecati laborum aut non ut. Quia sunt maxime officia ipsam. Dolor doloribus repellendus iure voluptatem. Pariatur ea distinctio qui excepturi assumenda a corrupti.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(115, 5, 'http://lorempixel.com/640/480/?99391', 'Casper Stark', 'Laboriosam sit et debitis dolorem aliquam non. Quae aut dolores illum aut ratione hic. Esse fugiat excepturi consequatur exercitationem voluptatem dolor.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(116, 21, 'http://lorempixel.com/640/480/?56465', 'Aubrey Wolff', 'Vel molestiae consequatur autem ducimus sunt. Consequatur vero et est dolores. Quod voluptate iste ratione.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(117, 22, 'http://lorempixel.com/640/480/?53250', 'Ms. Jessika Crooks', 'Est possimus ab qui iusto cumque omnis. Sit fuga illo quia dolorum iste quos harum delectus.\nVel dolores doloremque quis qui facere. Beatae voluptate ipsum eius fugiat. Qui quae velit aut rerum.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(118, 22, 'http://lorempixel.com/640/480/?20824', 'Dustin Ward', 'Tenetur fugit consequatur quia laudantium nobis. Aut qui inventore doloribus qui. Vitae aut eaque at id tempora.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(119, 18, 'http://lorempixel.com/640/480/?35817', 'Jeramie Gislason', 'Nulla aut laborum sit eos. Dolorem ducimus id inventore rerum esse eos libero commodi.\nSimilique esse aut aut ut ut quo labore. Magni quasi culpa quis.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(120, 22, 'http://lorempixel.com/640/480/?37824', 'Otis Swaniawski I', 'Voluptas blanditiis molestiae quam ab est. Quia temporibus adipisci voluptatem minima. Enim enim ea commodi totam laborum minus quae.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(121, 11, 'http://lorempixel.com/640/480/?22261', 'Mr. Lincoln Fadel MD', 'Molestiae explicabo corrupti placeat. Cum in laudantium consequatur nihil doloribus debitis enim. Sint harum quas sint voluptas iste dolore dignissimos magni.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(122, 11, 'http://lorempixel.com/640/480/?95882', 'Ocie Leannon', 'Aspernatur deserunt voluptas sunt modi. Perspiciatis ducimus et incidunt rerum molestiae quos. Officiis voluptas doloremque aspernatur ratione ut.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(123, 18, 'http://lorempixel.com/640/480/?57578', 'Shanelle Kozey', 'Ut minima sit amet distinctio optio quas. Doloremque quis esse ut reiciendis debitis. Itaque ullam sint ipsum in molestiae. Quis quas voluptas distinctio et ducimus qui eveniet aperiam.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(124, 19, 'http://lorempixel.com/640/480/?95369', 'Annie Balistreri', 'Dolores omnis sit hic quod qui. Qui nobis repudiandae ipsa. Et cupiditate autem praesentium ipsa eligendi porro eius. Qui doloremque dolor fugit aut nihil.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(125, 25, 'http://lorempixel.com/640/480/?56364', 'Prof. Brian Bauch', 'Fuga ea qui non voluptatibus. Quod consequatur totam ea incidunt rerum corrupti accusantium. Aperiam ut ut ea sunt ullam aut. Dolores deleniti minima molestias in dolore quod.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(126, 12, 'http://lorempixel.com/640/480/?21193', 'Prof. Lilliana Marks', 'Aut veniam porro corporis enim. Autem exercitationem sapiente ea ea.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(127, 4, 'http://lorempixel.com/640/480/?25260', 'Mr. Porter Strosin', 'Inventore est asperiores corporis placeat. Id sint impedit non qui fugit unde autem.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(128, 4, 'http://lorempixel.com/640/480/?28217', 'Gwendolyn Aufderhar', 'Nobis quia expedita debitis ut sint ea. Soluta odio ut vel. Placeat modi quas a.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(129, 7, 'http://lorempixel.com/640/480/?34366', 'Ms. Eveline Wunsch', 'Et quia excepturi quos porro. Perspiciatis aut tempora expedita omnis quis. Harum nihil at officia velit quaerat laboriosam aperiam. Asperiores natus temporibus quibusdam sunt ab.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(130, 9, 'http://lorempixel.com/640/480/?65805', 'Reed Mohr', 'Et voluptate ipsam rem corrupti. Facilis qui ut qui nulla et quae. Veritatis nihil possimus quo exercitationem ullam quibusdam reiciendis facilis. Aut ducimus aut non ex ullam quo culpa.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:21'),
(131, 12, 'http://lorempixel.com/640/480/?36096', 'Prof. Aracely Bogan Sr.', 'In quidem aliquam dolore aliquam aliquam assumenda. Vitae eveniet debitis non aspernatur officia eos nihil dolorem. Odit libero itaque aperiam aut sapiente ipsum.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(132, 3, 'http://lorempixel.com/640/480/?13866', 'Callie Kilback', 'Quibusdam consequuntur non quia quo aperiam. Accusamus ut porro maxime.\nMolestiae velit quidem quia sunt. Velit id numquam distinctio ducimus ducimus.', 1, '2016-06-13 16:00:21', '2016-06-18 18:41:10'),
(133, 13, 'http://lorempixel.com/640/480/?75706', 'Dulce Feest', 'Saepe rerum consequatur et. Voluptatibus rerum quis maiores sed autem. Libero autem distinctio incidunt amet illum aut.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(134, 22, 'http://lorempixel.com/640/480/?60051', 'Tania Dach', 'Exercitationem architecto sit unde veritatis asperiores. Error sed quasi ad accusamus. Alias quas recusandae aut. Pariatur provident veritatis et.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(135, 17, 'http://lorempixel.com/640/480/?44124', 'Frances Willms', 'Velit ut eius et voluptate sunt. Nam fugiat necessitatibus ut harum tempore eum vel perferendis. Architecto recusandae delectus esse ut et perspiciatis magni.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(136, 6, 'http://lorempixel.com/640/480/?74960', 'Madison Von', 'Harum minus dolores unde fugit occaecati illo commodi. Commodi fugit quae nemo fugiat quasi. Iste aliquid ratione cupiditate quod.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(137, 11, 'http://lorempixel.com/640/480/?94096', 'Olga Rohan', 'Sequi voluptas sunt ut recusandae animi corrupti. Qui ea quia doloremque omnis quia occaecati et. Quos tenetur reiciendis nobis enim. Quae itaque magni molestias veritatis nisi.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(138, 12, 'http://lorempixel.com/640/480/?77964', 'Ryan Quigley', 'Sed in sunt dolor impedit libero. Voluptas culpa sint sed sed et qui nemo. Aut rem quam dolores exercitationem quia et reprehenderit exercitationem.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(139, 6, 'http://lorempixel.com/640/480/?69727', 'Lonie Terry', 'Laborum quam eius quia dolor. Qui enim quisquam ipsa nostrum. Repudiandae nihil porro hic omnis recusandae autem autem. Omnis eum aut consectetur rerum blanditiis distinctio.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(140, 15, 'http://lorempixel.com/640/480/?46676', 'Arturo Eichmann', 'Esse assumenda qui commodi vel temporibus sed et. Voluptas in ducimus dignissimos alias iste. Sint repellendus nihil corrupti voluptatem sint. Quaerat molestiae suscipit minus et deserunt aperiam.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(141, 6, 'http://lorempixel.com/640/480/?52485', 'Audie Smith', 'Ipsam eum rerum ut atque reiciendis. Minus mollitia deserunt ab voluptas repellat odit quod est. Numquam consequatur velit dolore ducimus enim qui facere.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(142, 23, 'http://lorempixel.com/640/480/?27249', 'Vesta Boyer', 'Nostrum fugit voluptas est ullam. Numquam minus doloribus omnis quas corporis beatae. Rerum ut occaecati quia quod.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(143, 2, 'http://lorempixel.com/640/480/?54448', 'Garnet Harvey', 'Eligendi culpa ipsa voluptas vero et. Voluptatem ullam ea consequuntur eum ratione illo labore. Culpa enim velit expedita veritatis quia dicta necessitatibus sunt.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(144, 21, 'http://lorempixel.com/640/480/?11673', 'Mr. Clyde Lebsack', 'Voluptate quia exercitationem eum. Eius pariatur est inventore. Eos rem officiis eaque iste saepe quia quos.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(145, 16, 'http://lorempixel.com/640/480/?86768', 'Hardy Daniel', 'Dolores a commodi ea tempora quis dolores quia. Est et consequatur vel nulla. Amet magnam recusandae cumque voluptates debitis natus.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(146, 14, 'http://lorempixel.com/640/480/?97872', 'Ms. Dasia Graham II', 'Quae veritatis explicabo nihil aut adipisci assumenda. Commodi asperiores voluptatem et fugiat accusantium similique saepe amet. Dolore itaque aperiam aut occaecati fuga impedit labore.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(147, 18, 'http://lorempixel.com/640/480/?14655', 'Marjorie Bartell DDS', 'Adipisci voluptates ea at repellendus debitis dolor ab. Omnis voluptatibus perferendis nisi illum fugiat ducimus.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(148, 25, 'http://lorempixel.com/640/480/?10922', 'Mr. Dillon O''Keefe', 'Ex est temporibus vel veniam iusto. Consequuntur consequatur quo excepturi libero consequatur. Nostrum et dolor impedit enim qui tempore.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(149, 22, 'http://lorempixel.com/640/480/?45298', 'Estefania Pouros', 'Ut sed a et. Laborum tempora architecto ut dolore iure. Enim qui cupiditate voluptate soluta quos dolorem.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(150, 7, 'http://lorempixel.com/640/480/?83025', 'Marques Lowe', 'Quia quia iure perspiciatis atque cum ducimus sint. Deserunt eos dolores est vitae atque fuga et. Incidunt nostrum qui pariatur qui eum ducimus.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:25'),
(151, 3, 'http://lorempixel.com/640/480/?64093', 'Miss Alize Pfannerstill', 'Alias magni consequatur et suscipit. Ex modi tenetur id tenetur. Ut alias provident error beatae pariatur.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(152, 17, 'http://lorempixel.com/640/480/?91489', 'Prof. Nickolas Schowalter', 'Alias quia suscipit alias et itaque. Ut esse sunt sapiente omnis quisquam aut eos. Culpa blanditiis sed tenetur adipisci. Maiores iusto earum aut omnis vitae omnis.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(153, 17, 'http://lorempixel.com/640/480/?14541', 'Willa Volkman', 'Fugiat fugiat rerum doloremque et quia harum molestiae. Itaque aut et sunt qui eos. Eum suscipit voluptas sit velit et. Excepturi officia id quia non laborum illo.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(154, 9, 'http://lorempixel.com/640/480/?51192', 'Queen Mayert', 'Veritatis qui sint ipsum. Exercitationem ratione et qui harum.\nIpsum possimus veritatis sunt autem consequatur itaque ut non. Qui aperiam quia fugiat aut. Quasi laboriosam officia vitae.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(155, 18, 'http://lorempixel.com/640/480/?24487', 'Griffin Kohler V', 'Possimus laudantium et vel sed nemo ipsa rerum. Voluptatem libero veniam consequatur beatae.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(156, 25, 'http://lorempixel.com/640/480/?22107', 'Dr. Melyna Thiel Jr.', 'Magni id possimus ut. Sit qui aut magni neque culpa. Odio deleniti maiores et voluptate non architecto rem.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(157, 5, 'http://lorempixel.com/640/480/?63779', 'Jannie Lehner', 'Dolorem nihil pariatur ut saepe ea sed harum. Nisi dolor omnis mollitia explicabo a suscipit ad. Quos ducimus expedita et.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(158, 18, 'http://lorempixel.com/640/480/?29685', 'Prof. Adalberto Williamson Jr.', 'Sunt ut ratione quia sint at. Quo temporibus et ut blanditiis sit debitis fugiat. Ipsam ullam vitae quia aut placeat facere. Vel voluptatem autem nobis vel.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(159, 13, 'http://lorempixel.com/640/480/?10341', 'Prof. Kaylee Hand', 'Molestiae quos ut odio. Corporis beatae voluptatem facilis occaecati rerum odio. Rem dolore et similique dicta nisi.', 8, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(160, 14, 'http://lorempixel.com/640/480/?59227', 'Dr. Junior Heidenreich', 'Voluptatum nulla mollitia rem laboriosam dolore magni saepe. Maxime dolor odio sed odit vel quia. Culpa a cumque assumenda blanditiis sed dolorem. Accusamus placeat voluptas et qui.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(161, 6, 'http://lorempixel.com/640/480/?66026', 'Velda Ryan', 'Nulla est molestiae assumenda ipsa quos rerum sed. Esse dolorem ea aliquam recusandae officia nobis eos. Amet architecto ratione vel dolor quia nobis eveniet.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(162, 16, 'http://lorempixel.com/640/480/?30109', 'Mrs. Idell Zulauf', 'Velit temporibus neque aut provident dolorum eum. Id incidunt iusto dicta temporibus repudiandae qui.\nUt corporis sapiente illo est. Ad quae provident et earum et veniam. Omnis debitis ut modi aut.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(163, 24, 'http://lorempixel.com/640/480/?64692', 'Javier Jones', 'Corporis qui commodi commodi sint eum laboriosam. Itaque porro autem eius aut sed aut. Occaecati facere voluptatem atque expedita culpa consequatur delectus.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(164, 11, 'http://lorempixel.com/640/480/?22093', 'Ashlynn Schaden', 'Eos dolorum vitae optio quasi praesentium inventore. Dolores animi at aut maiores nesciunt quibusdam. Nulla voluptatibus mollitia magni aliquam non soluta cupiditate ea.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(165, 24, 'http://lorempixel.com/640/480/?34459', 'Antonietta Lueilwitz II', 'Iste sit expedita suscipit consequatur enim. Ad eveniet distinctio quo dolor quia. Modi dolorum sint praesentium qui. Nemo commodi consectetur minima.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(166, 24, 'http://lorempixel.com/640/480/?13567', 'Gerard Bechtelar I', 'Sit corporis tempora modi quis velit sit. Reprehenderit aut reiciendis vitae exercitationem dolorum eos officia. Enim voluptatem voluptatum eligendi in. Labore esse minima ab et maiores.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(167, 1, 'http://lorempixel.com/640/480/?10544', 'Prof. Ali Purdy DVM', 'Delectus quibusdam voluptatum dolor esse aut. Ad provident sint laborum laborum repellendus. Aut vel temporibus dolores quia. Corporis perspiciatis voluptatibus a dignissimos pariatur pariatur.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(168, 6, 'http://lorempixel.com/640/480/?26364', 'Josefa Morar', 'Et et quod et. Maiores maxime autem voluptatem odio dolore itaque atque. Soluta eligendi molestias eos doloribus recusandae dolor et. Ab id laborum et provident.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(169, 3, 'http://lorempixel.com/640/480/?24091', 'Hellen Nolan', 'Voluptatem aut quia ab cupiditate nihil et maiores. Et sunt nemo ea fugiat adipisci reiciendis neque. Voluptate et sint sunt ad dolorum sapiente cupiditate qui.', 10, '2016-06-13 16:00:21', '2016-06-18 18:45:16'),
(170, 3, 'http://lorempixel.com/640/480/?77560', 'Prof. Rollin Cruickshank I', 'Ut quaerat quia ea dolore ut. Esse nemo sed consectetur eveniet rerum. Iste rerum esse maxime placeat alias. Voluptatem deserunt quod unde aut enim.', 9, '2016-06-13 16:00:21', '2016-06-18 18:44:49'),
(171, 5, 'http://lorempixel.com/640/480/?28337', 'Dr. Keira Nolan', 'Quidem vel nostrum quaerat. Quia nam quia illum earum vel eius. Ea impedit iste iste qui. Et laborum eligendi aut voluptas harum aliquam.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:21'),
(172, 1, 'http://lorempixel.com/640/480/?92878', 'Prof. Hilton Adams', 'Dolorem recusandae accusantium aspernatur expedita aliquam. Aut error maiores commodi autem. Nobis ea ipsam quisquam quia. In nesciunt corrupti necessitatibus qui sit.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:21'),
(173, 22, 'http://lorempixel.com/640/480/?52856', 'Evert Hauck', 'Quia praesentium eum eum atque ut ipsa. Deleniti velit itaque corrupti qui rerum cumque consequatur eius. Vel et maxime et ut error similique.', 7, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(174, 21, 'http://lorempixel.com/640/480/?92098', 'Micah Stiedemann', 'Eveniet corporis illum dolores veritatis laborum. Unde voluptates esse corporis consequatur. Nostrum enim id alias beatae fugit.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(175, 10, 'http://lorempixel.com/640/480/?49119', 'Monroe Kessler Sr.', 'Non quibusdam quo nostrum est. Qui natus voluptatem eius et porro. Fugiat aspernatur sit alias. Accusantium nemo fugit facere totam.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(176, 11, 'http://lorempixel.com/640/480/?43361', 'Buddy Kris DVM', 'Quo deleniti aspernatur cumque occaecati amet. Aspernatur et consequuntur est tempora aut accusamus laborum. Enim accusamus in culpa omnis nemo et. Rerum quibusdam nam tempora sit ex qui.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(177, 1, 'http://lorempixel.com/640/480/?85922', 'Ms. Araceli Will Sr.', 'Et aspernatur expedita molestias quia ullam. Earum sed error dolor. Sint laborum rerum pariatur.\nEst aspernatur voluptatem quas. Voluptas nisi voluptatem aut ipsa. Labore eum aut et omnis.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(178, 13, 'http://lorempixel.com/640/480/?52739', 'Dr. Leone Hickle', 'Magnam iure sequi similique dolor non. Architecto neque voluptas sequi dignissimos dignissimos eos. Aut et aut tenetur eos sint esse praesentium.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(179, 4, 'http://lorempixel.com/640/480/?79193', 'Ms. Eldora Simonis', 'Eos numquam deleniti facilis architecto nemo harum. Saepe sed assumenda quidem labore vel. Eos ipsum nemo est omnis facilis.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(180, 13, 'http://lorempixel.com/640/480/?33001', 'Dr. Milan Rohan', 'Non esse quas occaecati. Est est esse sapiente nihil laboriosam.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(181, 19, 'http://lorempixel.com/640/480/?67180', 'Prof. Kendrick Johns', 'Nemo quaerat qui temporibus vitae vel dolores veniam. Maxime impedit occaecati consequuntur incidunt. Inventore eaque quaerat sapiente et ab. Commodi maiores nulla ut in qui.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(182, 1, 'http://lorempixel.com/640/480/?26858', 'Prof. Vaughn Lueilwitz', 'Iste mollitia dolorem similique velit. Tempore veniam accusamus aut cupiditate ex reiciendis aut. Tempora est rerum nulla nihil provident qui impedit.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(183, 10, 'http://lorempixel.com/640/480/?60525', 'Jamey Leannon', 'Iusto dicta aut reiciendis unde. Rerum voluptas atque quaerat impedit qui ipsum repellendus sed. Fuga quibusdam libero et impedit. Sint est aliquid dignissimos explicabo dolores rerum.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(184, 22, 'http://lorempixel.com/640/480/?13922', 'Rosamond Connelly', 'Nulla nobis quaerat facilis sequi assumenda excepturi dolor. Ea hic odit quas rerum. Molestiae mollitia natus praesentium delectus.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(185, 19, 'http://lorempixel.com/640/480/?30695', 'Lincoln Howell', 'Totam exercitationem delectus esse sapiente iusto necessitatibus. Deserunt qui voluptas possimus. Ducimus quia modi ullam perspiciatis ut aut dolor.', 2, '2016-06-13 16:00:21', '2016-06-13 16:00:26');
INSERT INTO `contestants` (`id`, `award_id`, `image`, `name`, `description`, `vote`, `created_at`, `updated_at`) VALUES
(186, 17, 'http://lorempixel.com/640/480/?39934', 'Tevin Schoen', 'Maiores dolore quos quod est eius provident. Qui eum recusandae nobis. Nulla qui qui repudiandae ut vel.', 9, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(187, 15, 'http://lorempixel.com/640/480/?56929', 'Jerald Berge', 'Vel voluptas facere ut quo tenetur. Delectus facere est placeat non placeat excepturi ut. Nesciunt optio est ratione.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(188, 16, 'http://lorempixel.com/640/480/?33340', 'Camren Russel IV', 'Autem voluptas voluptate nihil non vero. Architecto quidem eaque ratione rem. Recusandae maxime deserunt eligendi aliquid est aperiam nulla sed.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(189, 8, 'http://lorempixel.com/640/480/?36369', 'Ezequiel Treutel', 'Placeat repellendus magnam harum cum alias officia sit. Commodi sit est nobis.\nEaque nostrum ipsa porro. Aut blanditiis eligendi minima dolor in laboriosam. Quia commodi sit commodi consequuntur.', 3, '2016-06-13 16:00:21', '2016-06-13 16:00:21'),
(190, 8, 'http://lorempixel.com/640/480/?67534', 'Buddy Mueller', 'Ad eos labore eos. Totam sed aut aut vel sed rem qui. Quo inventore culpa dolorem aut praesentium fugit.', 1, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(191, 19, 'http://lorempixel.com/640/480/?62803', 'Roberto Von', 'Rerum est voluptas qui et illo quidem. Incidunt architecto quia asperiores temporibus sit totam qui. Libero ut nihil nemo voluptas. Adipisci qui et quibusdam.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(192, 9, 'http://lorempixel.com/640/480/?67995', 'Branson Bauch', 'Quae at magni laboriosam quia. Omnis deleniti aut distinctio corporis ipsa. Incidunt sunt vel quisquam officia omnis.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(193, 2, 'http://lorempixel.com/640/480/?89327', 'Jason Schultz MD', 'Culpa veniam nesciunt qui optio iste ducimus. Molestias autem omnis voluptas cumque accusamus consequatur. Nemo et non laudantium sunt maiores totam. Nulla in mollitia aut suscipit similique iste.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(194, 7, 'http://lorempixel.com/640/480/?24404', 'Ms. Amber Wolff', 'Accusantium natus eos quia qui cumque quidem. Est amet cupiditate qui omnis est sed dignissimos. Quae necessitatibus reiciendis in. Molestiae sint porro velit perferendis.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(195, 8, 'http://lorempixel.com/640/480/?31069', 'Lila O''Kon', 'Magni eos commodi quia. Qui nostrum corrupti rerum unde. Natus incidunt inventore rerum reprehenderit autem non illo. Iusto consectetur beatae numquam ratione ipsum.', 6, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(196, 4, 'http://lorempixel.com/640/480/?14900', 'Wanda Gleichner', 'Vel facere necessitatibus et in sed dolorem quod laboriosam. Ad id praesentium consectetur. Neque nobis maxime rerum aut quod sint rerum. Dolor dolor quis quam adipisci fugiat culpa ea.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(197, 7, 'http://lorempixel.com/640/480/?77101', 'Sammie Farrell', 'Velit non culpa excepturi et tenetur. Et voluptatem delectus totam est reprehenderit. Nostrum totam rerum exercitationem similique. Amet alias ut blanditiis magni omnis est quis.', 4, '2016-06-13 16:00:21', '2016-06-18 18:49:44'),
(198, 11, 'http://lorempixel.com/640/480/?75002', 'Ardella Wyman', 'Qui aliquid est debitis et. Vel neque et nulla vero quis magni eius omnis. Iure dolorem id et eos omnis nesciunt architecto.', 5, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(199, 6, 'http://lorempixel.com/640/480/?48382', 'Mr. Gino Bins Sr.', 'Aut quam in molestiae consectetur sed repellendus enim. Animi molestias ut perspiciatis omnis sunt ipsa. Aut sint nemo et ut.', 4, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(200, 16, 'http://lorempixel.com/640/480/?91960', 'Ophelia Casper', 'Quae quod laborum voluptatem quos amet minima. Et tempora sint officia et aut tempore unde accusantium. Unde sed dignissimos non aut.', 0, '2016-06-13 16:00:21', '2016-06-13 16:00:26'),
(201, 26, 'uploads/contestants/879024013.jpg', 'Con1', 'Desc1', 0, '2016-06-20 14:51:46', '2016-06-20 14:51:46'),
(202, 27, 'uploads/contestants/1197741636.jpg', 'Con1', 'Desc1', 0, '2016-06-20 14:52:19', '2016-06-20 14:52:19'),
(203, 28, 'uploads/contestants/803193699.jpg', 'Con1', 'Desc1', 0, '2016-06-20 14:52:52', '2016-06-20 14:52:52'),
(204, 29, 'uploads/contestants/662323324.jpg', 'c1', 'cd1', 0, '2016-06-20 15:03:06', '2016-06-20 15:03:06'),
(205, 30, 'uploads/contestants/1007824658.jpg', 'c1', 'cd1', 0, '2016-06-20 15:05:26', '2016-06-20 15:05:26'),
(206, 31, 'uploads/contestants/300913830.jpg', 'c1', 'cd1', 0, '2016-06-20 15:05:37', '2016-06-20 15:05:37'),
(207, 32, 'uploads/contestants/963384170.jpg', 'c1', 'cd1', 0, '2016-06-20 15:06:30', '2016-06-20 15:06:30'),
(208, 37, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:17:08', '2016-06-20 15:17:08'),
(209, 37, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:17:08', '2016-06-20 15:17:08'),
(210, 37, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:17:08', '2016-06-20 15:17:08'),
(211, 38, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:19:11', '2016-06-20 15:19:11'),
(212, 38, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:19:11', '2016-06-20 15:19:11'),
(213, 38, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:19:11', '2016-06-20 15:19:11'),
(214, 39, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:19:41', '2016-06-20 15:19:41'),
(215, 39, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:19:41', '2016-06-20 15:19:41'),
(216, 39, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:19:41', '2016-06-20 15:19:41'),
(217, 40, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:23:08', '2016-06-20 15:23:08'),
(218, 40, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:23:08', '2016-06-20 15:23:08'),
(219, 40, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:23:08', '2016-06-20 15:23:08'),
(220, 41, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:26:25', '2016-06-20 15:26:25'),
(221, 41, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:26:25', '2016-06-20 15:26:25'),
(222, 41, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:26:25', '2016-06-20 15:26:25'),
(223, 42, 'uploads/contestants/unknown.jpg', 'ae23', '32', 0, '2016-06-20 15:28:11', '2016-06-20 15:28:11'),
(224, 42, 'uploads/contestants/unknown.jpg', 'dsd', 'dsd', 0, '2016-06-20 15:28:11', '2016-06-20 15:28:11'),
(225, 42, 'uploads/contestants/unknown.jpg', 'sd', 'dsd', 0, '2016-06-20 15:28:11', '2016-06-20 15:28:11'),
(226, 43, 'uploads/contestants/unknown.jpg', 'kjnjn', 'jknkj', 0, '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(227, 43, 'uploads/contestants/unknown.jpg', ',knknkn', 'lknlnl', 0, '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(228, 44, 'uploads/contestants/unknown.jpg', 'ds', 'hjjh', 0, '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(229, 46, 'uploads/contestants/unknown.jpg', 'kjnjn', 'jknkj', 0, '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(230, 46, 'uploads/contestants/unknown.jpg', ',knknkn', 'lknlnl', 0, '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(231, 47, 'uploads/contestants/unknown.jpg', 'ds', 'hjjh', 0, '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(232, 59, 'uploads/contestants/910072645.jpg', 'Raymond Ativie', 'He is the man', 2, '2016-06-22 12:44:20', '2016-06-22 13:05:13'),
(233, 59, 'uploads/contestants/1262909645.jpg', 'Ebuka', 'She is the Woman', 3, '2016-06-22 12:44:20', '2016-06-22 13:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `contestant_event_award`
--

CREATE TABLE IF NOT EXISTS `contestant_event_award` (
  `event_award_id` int(10) unsigned NOT NULL,
  `contestant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `venue` text COLLATE utf8_unicode_ci NOT NULL,
  `others` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datetime_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `venue`, `others`, `datetime`, `datetime_end`, `created_at`, `updated_at`, `published`) VALUES
(1, 5, 'Adipisci ratione quo nostrum qui est magni.', '<p>Hello World</p><blockquote><p>THis is a sample quote</p></blockquote><h2>fdkfsdnf mkdf</h2><p><br></p><p>fdsfjdsf dsnkf kjdsfk dsfjkdsff<span style="background-color: rgb(255, 255, 0);">dsfds fdfdsnf sdff sdf dsf </span></p><p><span style="background-color: rgb(255, 255, 0);">fdsfddsf</span>ds fs fsdfd</p><p>d sf</p><p>df sdf </p><p><br></p><table class="table table-bordered"><tbody><tr><td>Time</td><td>Eat</td></tr><tr><td>Settle</td><td>Sleep</td></tr></tbody></table><p><br></p>', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-22 12:50:52', '0000-00-00 00:00:00', '2016-06-13 16:00:23', '2016-06-13 16:00:23', 'false'),
(2, 1, 'Possimus ratione asperiores quo.', 'Dolorum distinctio ex corporis at aut. Totam non atque voluptatem unde.\nPlaceat quo sit aut fugiat quod quia. Sit adipisci voluptatem vitae voluptatum. Ut sunt non id maxime.', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-22 12:50:55', '0000-00-00 00:00:00', '2016-06-13 16:00:23', '2016-06-13 16:00:23', 'false'),
(3, 1, 'Est expedita consequatur eveniet dolorem.', 'Tenetur aut aut officia libero. Pariatur quasi amet dolor asperiores molestiae. Aperiam dicta porro aliquid. Voluptatem sed dolor quia molestias.', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-22 12:50:58', '0000-00-00 00:00:00', '2016-06-13 16:00:23', '2016-06-13 16:00:23', 'false'),
(4, 5, 'Est vero asperiores illum consequatur nam.', 'Numquam animi itaque hic explicabo hic. Vel itaque aut aliquid ad atque. Labore rerum id quis voluptatem. Dolores excepturi labore libero nemo.', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-22 12:51:00', '0000-00-00 00:00:00', '2016-06-13 16:00:23', '2016-06-13 16:00:23', 'false'),
(5, 4, 'Quibusdam aut incidunt itaque iste dolor et eligendi.', 'Optio consectetur suscipit impedit quidem occaecati expedita commodi nam. Assumenda a nemo et voluptas eveniet nostrum. Voluptas veniam adipisci facere qui incidunt facere consequatur aut.', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-22 12:51:03', '0000-00-00 00:00:00', '2016-06-13 16:00:23', '2016-06-13 16:00:23', 'false'),
(6, 1, 'e1', '<p>jui</p>', '["v1","v2"]', '', '2016-06-20 14:33:25', '2016-06-30 09:40:00', '2016-06-20 08:47:04', '2016-06-20 08:47:04', 'false'),
(7, 1, 'e1', '<p>jui</p>', '["v1","v2"]', '', '2016-06-20 14:33:20', '2016-06-30 09:40:00', '2016-06-20 08:50:53', '2016-06-20 08:50:53', 'false'),
(8, 1, 'Vs', '<p>sfd</p>', '["v1","v3"]', '', '2016-06-20 14:33:18', '2016-06-29 10:33:00', '2016-06-20 09:33:19', '2016-06-20 09:33:19', 'false'),
(9, 1, 'jkfn', '<p>sdfsd</p>', '["jk","j"]', '', '2016-06-20 14:33:15', '2016-07-06 10:36:00', '2016-06-20 09:36:47', '2016-06-20 09:36:47', 'false'),
(10, 1, 'xv', '<p>&nbsp;kjn</p>', '["f","d"]', '', '2016-06-20 14:33:12', '2016-07-09 10:45:00', '2016-06-20 09:46:31', '2016-06-20 09:46:31', 'false'),
(11, 1, 'xv', '<p>&nbsp;kjn</p>', '["f","d"]', '', '2016-06-20 14:33:08', '2016-07-09 10:45:00', '2016-06-20 09:47:21', '2016-06-20 09:47:21', 'false'),
(12, 1, 'xv', '<p>&nbsp;kjn</p>', '["f","d"]', '', '2016-06-20 14:33:05', '2016-07-09 10:45:00', '2016-06-20 09:48:21', '2016-06-20 09:48:21', 'false'),
(13, 1, 'xv', '<p>&nbsp;kjn</p>', '["f","d"]', '', '2016-06-20 14:33:00', '2016-07-09 10:45:00', '2016-06-20 09:48:39', '2016-06-20 09:48:39', 'false'),
(14, 1, 'xv', '<p>&nbsp;kjn</p>', '["f","d"]', '', '2016-06-20 14:32:55', '2016-07-09 10:45:00', '2016-06-20 09:48:54', '2016-06-20 09:48:54', 'false'),
(15, 1, 'A proper Event', '<p>I like proper Events</p><p><br></p><h2><u>This is the begining</u></h2><h2><u><br></u></h2><h2><u><br></u></h2><table class="table table-bordered"><tbody><tr><td>Alot&nbsp;</td><td>of</td><td>table</td><td>that</td><td>i like</td><td>very&nbsp;</td><td>well</td></tr><tr><td>this is&nbsp;</td><td>just&nbsp;</td><td>the&nbsp;</td><td>begining</td><td>kdnfn</td><td>jknkj</td><td>kn</td></tr></tbody></table><p><u>JNDNInksj jd fj gd , df, df df db jfj dh dfjh jugh dgnh hg njg jdg hj </u>&nbsp;dfg djf gg dfg ,dfg dfg df, df ,dg ,dg dfg d df df gdg g</p><p>dfgdfg dfg dfuuh hjd hdj jhdfh d gjh dfg djh jdfjdfj gjdjhdjf j g hf ldf hhj<u><br></u></p><span style="line-height: 24px;">dfgdfg dfg dfuuh hjd hdj jhdfh d <a href="http://reftek.co" target="_blank">gjh dfg djh </a>jdfjdfj gjdjhdjf j g hf ldf hhj</span><p>dfgdfg dfg dfuuh hjd hdj jhdfh d gjh dfg djh jdfjdfj gjdjhdjf j g hf ldf hhj &nbsp;dfgdfg dfg dfuuh hjd hdj jhdfh d gjh dfg djh jdfjdfj gjdjhdjf j g hf ldf hhj&nbsp;</p><div><span style="line-height: 24px;">dfgdfg dfg dfuuh hjd hdj jhdfh d gjh <b>dfg djh jdfjdfj gjdjhdjf j g hf ldf hhj</b></span></div><div><iframe frameborder="0" src="//www.youtube.com/embed/otai3MAVsxw" width="640" height="360" class="note-video-clip"></iframe><span style="line-height: 24px;"><b><br></b></span></div><div><span style="line-height: 24px;"><b><br></b></span><span style="line-height: 24px;"><br></span></div>', '["Ikeja lagos area","Ikej Avenue"]', '', '2016-06-20 17:25:45', '2016-07-08 14:56:00', '2016-06-20 13:56:32', '2016-06-20 16:25:45', 'true'),
(16, 1, 'Sample', '<p>fds</p>', '["venue 1","Venue 2"]', '', '2016-06-22 13:46:30', '2016-07-01 13:10:00', '2016-06-22 12:10:43', '2016-06-22 12:10:43', 'false');
INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `venue`, `others`, `datetime`, `datetime_end`, `created_at`, `updated_at`, `published`) VALUES
(17, 1, 'Reftek Launch', '<p><img src="data:image/jpeg;base64,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', '["Venue 1","Venue 2"]', '', '2016-06-22 14:05:23', '2016-06-24 13:32:00', '2016-06-22 12:32:44', '2016-06-22 13:05:23', 'true');
INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `venue`, `others`, `datetime`, `datetime_end`, `created_at`, `updated_at`, `published`) VALUES
(18, 13, 'Blah', '<p>Blah</p>', '["Blah 1","Blah 2"]', '', '2016-06-24 09:55:00', '2016-06-30 09:55:00', '2016-06-23 08:57:59', '2016-06-23 08:57:59', 'false'),
(19, 13, 'Blah', '<p>Blah</p>', '["Blah 1","Blah 2"]', '', '2016-06-24 09:55:00', '2016-06-30 09:55:00', '2016-06-23 08:58:21', '2016-06-23 08:58:21', 'false'),
(20, 13, 'Sample Event', '<p><br></p><table class="table table-bordered"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<iframe frameborder="0" src="//www.youtube.com/embed/GcBwb-FH6M0" width="640" height="360" class="note-video-clip"></iframe></p><p><br></p><p><br></p>', '["Sample Venu",""]', '', '2016-06-29 17:36:00', '2016-06-30 17:36:00', '2016-06-29 16:37:04', '2016-06-29 16:37:04', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `event_awards`
--

CREATE TABLE IF NOT EXISTS `event_awards` (
  `id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `enable_registration` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `enable_voting` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `voting_end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_awards`
--

INSERT INTO `event_awards` (`id`, `event_id`, `title`, `description`, `enable_registration`, `enable_voting`, `voting_end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sequi impedit qui natus qui facilis.', 'Similique et rerum voluptate. Similique odio neque est fugit distinctio. Repudiandae ducimus ea aut non aut.', 'false', 'true', '2016-05-27 15:42:10', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(2, 4, 'Maiores laudantium voluptas voluptas consequatur deleniti.', 'Omnis velit cupiditate modi. Ducimus ut a voluptates voluptas dolores ad. Hic laborum et rerum neque illo qui.', 'false', 'true', '2016-01-15 06:13:03', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(3, 1, 'Qui cum quia iste consectetur.', 'Nesciunt veritatis quibusdam dicta voluptatum harum. Facilis ipsam et voluptas aut.', 'true', 'true', '2016-07-03 10:20:20', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(4, 3, 'Est dolores voluptatum possimus sint culpa officia.', 'Illum itaque a qui rerum explicabo quibusdam veritatis. Fugiat ex ad distinctio rerum. Quo rerum possimus et harum. Enim voluptatum omnis dolores perferendis et consequuntur repudiandae vero.', 'true', 'true', '2016-03-28 21:18:48', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(5, 2, 'Ex quam labore provident id rerum.', 'Eum inventore voluptas et quo aut et quisquam. Dolor nesciunt voluptatum sed. Et delectus eum fuga occaecati laboriosam voluptatem.', 'false', 'false', '2016-03-19 05:50:27', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(6, 2, 'Voluptates vitae cum commodi pariatur optio.', 'Odio aut dolor consequatur ex cumque porro. Qui sint asperiores qui impedit.\nError et unde eligendi recusandae deserunt rerum deleniti ut. Optio vero beatae maiores quas.', 'true', 'false', '2016-03-21 18:29:52', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(7, 1, 'Quo architecto harum quam veritatis molestiae est voluptas.', 'Hic ad aut est dolores architecto. Porro reprehenderit at iusto voluptatem nobis adipisci assumenda. Architecto beatae eius reprehenderit amet.', 'false', 'true', '2016-09-03 19:35:52', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(8, 3, 'Saepe expedita necessitatibus est totam non cupiditate amet dolor.', 'Et rem nulla aut soluta non architecto quis excepturi. Doloremque autem quia animi et qui tenetur. Enim quisquam a vitae sint aliquam harum. Pariatur culpa veniam dignissimos pariatur.', 'false', 'false', '2016-04-24 14:26:22', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(9, 4, 'In reprehenderit et et libero aut cumque voluptas odio.', 'Mollitia culpa reiciendis cum deserunt. Sapiente est rerum maiores porro facere. Sunt incidunt autem quos quia ipsa.', 'false', 'false', '2015-09-12 15:59:04', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(10, 2, 'Perspiciatis quia labore ex ducimus.', 'Consectetur molestiae excepturi aperiam magnam qui non id. Laboriosam dolorum non debitis. Nobis consequuntur doloribus inventore consequatur nobis.', 'true', 'false', '2015-10-15 00:48:04', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(11, 4, 'Saepe cupiditate voluptatem omnis unde quibusdam rem.', 'Maxime corporis nobis eum doloribus consequatur nihil asperiores. Earum consequuntur odit sed quibusdam iste similique. Cumque velit exercitationem distinctio sit id beatae.', 'false', 'false', '2015-08-06 06:23:59', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(12, 3, 'Aliquid quia enim in quia facere consequuntur minima.', 'Dolores voluptatum omnis quibusdam. Atque dolore voluptas voluptatem quas et.', 'false', 'false', '2015-08-08 01:49:52', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(13, 2, 'Excepturi optio qui nulla aut nulla inventore quidem.', 'Vero dolore minima expedita. Fuga aliquam sapiente aliquid dolore nostrum et accusamus. Id maiores minima vitae quod magnam alias.', 'false', 'true', '2015-08-04 10:00:33', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(14, 5, 'Delectus magni hic voluptatem sed amet.', 'Et nobis iusto facilis occaecati. Sed porro saepe eligendi. Harum odio qui iusto molestiae saepe aspernatur et a.', 'false', 'true', '2015-08-28 11:04:31', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(15, 2, 'Aut eos eum dolores quis.', 'Quia ut aut quam asperiores quasi adipisci temporibus. Sit iste iste esse earum. Est labore similique consectetur expedita aliquid tempore ut.', 'true', 'false', '2015-07-23 17:35:10', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(16, 2, 'Et aut est illum ducimus aut.', 'Voluptas fugit accusamus dolores voluptatum tempore. Debitis voluptas sapiente quo quod sunt qui magnam. Voluptate vero et est distinctio.', 'false', 'true', '2015-06-18 13:17:18', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(17, 3, 'Atque odit veritatis libero voluptates omnis voluptates ab.', 'Consequuntur aut quos et id. Debitis sint perferendis voluptas veritatis. Aut consequatur similique facere velit. Doloribus deleniti quidem ex iure rerum fuga.', 'true', 'true', '2016-06-03 21:28:51', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(18, 3, 'Voluptatibus nobis rerum explicabo cum qui itaque fugiat.', 'At in enim velit repellat. Voluptates ut eum architecto esse quisquam culpa itaque. Qui qui corrupti est consectetur sed voluptatem occaecati.', 'false', 'true', '2016-04-08 18:12:28', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(19, 1, 'Quidem aliquam aut ea ipsum laboriosam voluptatem quo.', 'Quod voluptas consectetur ipsum illum. Commodi cupiditate qui rem et. Molestiae sed sit quaerat ut. Vel a enim repellendus officia sapiente corrupti ut.', 'false', 'true', '2016-03-14 16:59:04', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(20, 1, 'Facilis illo et quia provident commodi iusto nam recusandae.', 'Provident qui repellendus a similique et et. Excepturi velit qui dicta. Consectetur tenetur quia provident consequatur quidem et voluptas et.', 'true', 'true', '2016-10-18 22:55:55', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(21, 2, 'Enim voluptatem minus quis quam et.', 'Vero modi ex in amet non blanditiis. Voluptatem doloremque hic ex. Sunt odio explicabo unde amet eaque aut pariatur. Et nisi aut ea recusandae tempora voluptatum.', 'true', 'true', '2015-09-25 13:12:34', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(22, 2, 'Laborum adipisci aut nihil quo pariatur qui.', 'Quis libero nobis nisi consequuntur. Voluptates ut enim in. Molestiae ex corrupti voluptas aut unde sunt minima.', 'false', 'false', '2016-03-28 12:25:33', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(23, 3, 'Sit eveniet architecto excepturi.', 'Officia aut hic at voluptas. Minus ut aut ipsam quo ipsa. Aut consequuntur fugit aliquid autem est id cupiditate.\nIste enim omnis ut sit ad quis. Ut natus aut ut facere aut non.', 'false', 'true', '2015-07-16 22:33:09', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(24, 1, 'Soluta omnis est quisquam consequatur placeat.', 'Aliquid repellendus itaque sed quisquam eveniet. Illum molestias et illum et hic. Quia cumque quae voluptas rerum rerum molestiae qui. Consequatur et omnis impedit ullam nihil numquam.', 'true', 'true', '2016-11-15 14:28:01', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(25, 2, 'Harum architecto voluptatibus magnam ratione non temporibus.', 'Alias sint vitae hic quis inventore ad nobis voluptates. Labore exercitationem cupiditate eos ut iure id. Ducimus omnis at necessitatibus ut quisquam accusamus.', 'true', 'true', '2016-03-08 05:17:56', '2016-06-13 16:00:24', '2016-06-13 16:00:24'),
(38, 15, 'AA', 'DD', 'false', 'true', '2016-07-06 17:12:00', '2016-06-20 15:19:11', '2016-06-20 15:19:11'),
(39, 15, 'AA', 'DD', 'false', 'true', '2016-07-06 17:12:00', '2016-06-20 15:19:41', '2016-06-20 15:19:41'),
(40, 15, 'AA', 'DD', 'false', 'true', '2016-07-06 17:12:00', '2016-06-20 15:23:08', '2016-06-20 15:23:08'),
(41, 15, 'AA', 'DD', 'false', 'true', '2016-07-06 17:12:00', '2016-06-20 15:26:25', '2016-06-20 15:26:25'),
(42, 15, 'AA', 'DD', 'false', 'true', '2016-07-06 17:12:00', '2016-06-20 15:28:11', '2016-06-20 15:28:11'),
(43, 15, 'AA1', 'AAD1', 'false', 'true', '2016-06-20 17:45:00', '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(44, 15, 'a2', 'ad2', 'false', 'false', '2016-06-20 18:45:00', '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(45, 15, 'AA3', 'AAD3', 'false', 'false', '2016-06-23 17:45:00', '2016-06-20 15:46:50', '2016-06-20 15:46:50'),
(46, 15, 'AA1', 'AAD1', 'false', 'true', '2016-06-20 17:45:00', '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(47, 15, 'a2', 'ad2', 'false', 'false', '2016-06-20 18:45:00', '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(48, 15, 'AA3', 'AAD3', 'false', 'false', '2016-06-23 17:45:00', '2016-06-20 15:47:04', '2016-06-20 15:47:04'),
(49, 15, 'hjbjh', 'jbjh', 'false', 'true', '2016-06-27 17:50:00', '2016-06-20 15:50:16', '2016-06-20 15:50:16'),
(50, 15, 's', 'd', 'false', 'false', '2016-06-22 17:53:00', '2016-06-20 15:53:54', '2016-06-20 15:53:54'),
(51, 15, 's', 'd', 'false', 'false', '2016-06-22 17:53:00', '2016-06-20 15:54:38', '2016-06-20 15:54:38'),
(52, 15, 's', 'd', 'false', 'false', '2016-06-22 17:53:00', '2016-06-20 15:54:53', '2016-06-20 15:54:53'),
(53, 15, 's', 'd', 'false', 'false', '2016-06-22 17:53:00', '2016-06-20 15:55:19', '2016-06-20 15:55:19'),
(54, 15, 's', 'd', 'true', 'false', '2016-06-22 17:53:00', '2016-06-20 15:55:38', '2016-06-20 15:55:38'),
(55, 15, 's', 'd', 'true', 'false', '2016-06-22 17:53:00', '2016-06-20 15:56:12', '2016-06-20 15:56:12'),
(56, 15, 's', 'd', 'false', 'false', '2016-06-22 17:53:00', '2016-06-20 15:56:31', '2016-06-20 15:56:31'),
(57, 15, 's', 'd', 'true', 'false', '2016-06-22 17:53:00', '2016-06-20 15:56:41', '2016-06-20 15:56:41'),
(58, 15, 's', 'd', 'true', 'false', '2016-06-22 17:53:00', '2016-06-20 16:03:08', '2016-06-20 16:03:08'),
(59, 17, 'Award 1', 'First award', 'false', 'true', '2016-06-30 14:42:00', '2016-06-22 12:44:20', '2016-06-22 12:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `event_event_type`
--

CREATE TABLE IF NOT EXISTS `event_event_type` (
  `event_id` int(10) unsigned NOT NULL,
  `event_type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_event_type`
--

INSERT INTO `event_event_type` (`event_id`, `event_type_id`, `created_at`, `updated_at`) VALUES
(6, 4, '2016-06-20 08:47:04', '2016-06-20 08:47:04'),
(6, 7, '2016-06-20 08:47:04', '2016-06-20 08:47:04'),
(7, 4, '2016-06-20 08:50:53', '2016-06-20 08:50:53'),
(7, 7, '2016-06-20 08:50:53', '2016-06-20 08:50:53'),
(8, 5, '2016-06-20 09:33:19', '2016-06-20 09:33:19'),
(8, 7, '2016-06-20 09:33:19', '2016-06-20 09:33:19'),
(9, 12, '2016-06-20 09:36:47', '2016-06-20 09:36:47'),
(9, 15, '2016-06-20 09:36:47', '2016-06-20 09:36:47'),
(10, 12, '2016-06-20 09:46:31', '2016-06-20 09:46:31'),
(10, 13, '2016-06-20 09:46:31', '2016-06-20 09:46:31'),
(11, 12, '2016-06-20 09:47:21', '2016-06-20 09:47:21'),
(11, 13, '2016-06-20 09:47:21', '2016-06-20 09:47:21'),
(12, 12, '2016-06-20 09:48:21', '2016-06-20 09:48:21'),
(12, 13, '2016-06-20 09:48:21', '2016-06-20 09:48:21'),
(13, 12, '2016-06-20 09:48:39', '2016-06-20 09:48:39'),
(13, 13, '2016-06-20 09:48:39', '2016-06-20 09:48:39'),
(14, 12, '2016-06-20 09:48:54', '2016-06-20 09:48:54'),
(14, 13, '2016-06-20 09:48:54', '2016-06-20 09:48:54'),
(15, 13, '2016-06-20 13:56:32', '2016-06-20 13:56:32'),
(16, 10, '2016-06-22 12:10:43', '2016-06-22 12:10:43'),
(16, 18, '2016-06-22 12:10:43', '2016-06-22 12:10:43'),
(17, 3, '2016-06-22 12:32:44', '2016-06-22 12:32:44'),
(17, 12, '2016-06-22 12:32:44', '2016-06-22 12:32:44'),
(18, 5, '2016-06-23 08:57:59', '2016-06-23 08:57:59'),
(19, 5, '2016-06-23 08:58:21', '2016-06-23 08:58:21'),
(20, 11, '2016-06-29 16:37:04', '2016-06-29 16:37:04'),
(20, 13, '2016-06-29 16:37:04', '2016-06-29 16:37:04'),
(20, 15, '2016-06-29 16:37:04', '2016-06-29 16:37:04'),
(20, 24, '2016-06-29 16:37:04', '2016-06-29 16:37:04'),
(20, 28, '2016-06-29 16:37:04', '2016-06-29 16:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `event_media`
--

CREATE TABLE IF NOT EXISTS `event_media` (
  `id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('image','video','audio') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `title`, `type`, `url`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, 'Est non rerum expedita ipsa.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(2, 5, 'Deleniti voluptatibus rem corrupti illum distinctio suscipit.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(3, 2, 'Quidem iure consequatur cum officia eum illum.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(4, 1, 'Quia fugit nisi molestias et illo.', 'image', 'https://morar.com/eaque-qui-veritatis-unde-quo-nisi-ullam-harum.html', 'http://lorempixel.com/640/480/?92827', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(5, 2, 'Nihil deserunt dignissimos recusandae amet.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(6, 2, 'Adipisci tenetur velit et officiis alias asperiores.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(7, 2, 'Aut soluta vel qui quia delectus.', 'image', 'https://little.com/est-velit-saepe-libero-aut.html', 'http://lorempixel.com/640/480/?64855', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(8, 3, 'Qui quidem asperiores et veniam et ut.', 'image', 'http://www.oberbrunner.org/qui-maiores-aut-quis-asperiores-ut.html', 'http://lorempixel.com/640/480/?52658', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(9, 1, 'Similique nostrum labore esse quia.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(10, 5, 'Sit nihil qui vitae veniam saepe est aut eius.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(11, 1, 'Eum fugit et assumenda delectus.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(12, 3, 'Laborum ab atque porro excepturi vitae.', 'image', 'http://leuschke.com/dicta-ut-sit-facere-deserunt-aut-quo', 'http://lorempixel.com/640/480/?59703', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(13, 3, 'Blanditiis mollitia dicta qui amet hic vitae.', 'image', 'http://ondricka.biz/provident-beatae-veniam-dolor-non', 'http://lorempixel.com/640/480/?45339', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(14, 2, 'Non totam quo aut facere ad et et voluptas.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(15, 4, 'Dignissimos quia exercitationem et et voluptatem et.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(16, 5, 'Similique quia illum non.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(17, 1, 'Dolorem impedit et quisquam laboriosam ut ut rerum enim.', 'image', 'https://www.schuppe.com/rerum-quae-totam-aut-sapiente-facere-ut', 'http://lorempixel.com/640/480/?86910', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(18, 5, 'Modi ut sunt laborum voluptatum blanditiis ea omnis totam.', 'image', 'https://swift.net/voluptas-quis-optio-illo-suscipit-quos-praesentium-placeat.html', 'http://lorempixel.com/640/480/?57506', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(19, 5, 'Qui et explicabo inventore commodi laborum.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(20, 2, 'Voluptatem animi eum at soluta.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(21, 5, 'Dicta inventore vel sed unde.', 'image', 'https://www.ondricka.com/porro-beatae-ipsa-voluptates-est-voluptatum-consequatur', 'http://lorempixel.com/640/480/?90969', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(22, 3, 'Molestiae ut non nesciunt voluptatem et.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(23, 2, 'Recusandae eveniet non impedit iure est quod.', 'video', 'http://techslides.com/demos/sample-videos/small.mp4', 'http://techslides.com/demos/sample-videos/small.mp4', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(24, 5, 'Et repellendus veniam ipsum quisquam neque velit.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(25, 4, 'Modi dolorem facilis eum suscipit aliquam cum.', 'audio', 'http://www.w3schools.com/html/horse.mp3', 'http://www.w3schools.com/html/horse.mp3', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(26, 14, 'image 1', 'image', '', 'uploads/image/752782320.jpg', '2016-06-20 11:21:19', '2016-06-20 11:21:19'),
(27, 14, 'audio 2', 'audio', '', 'uploads/audio/364546467.wma', '2016-06-20 11:21:19', '2016-06-20 11:21:19'),
(28, 14, 'Video 3', 'video', '', 'uploads/video/1173730125.mp4', '2016-06-20 11:21:19', '2016-06-20 11:21:19'),
(29, 14, 'image 1', 'image', '', 'uploads/image/871816294.jpg', '2016-06-20 11:25:30', '2016-06-20 11:25:30'),
(30, 14, 'audio 2', 'audio', '', 'uploads/audio/433936749.wma', '2016-06-20 11:25:30', '2016-06-20 11:25:30'),
(31, 14, 'Video 3', 'video', '', 'uploads/video/985348519.mp4', '2016-06-20 11:25:30', '2016-06-20 11:25:30'),
(33, 15, 'Me eating Beans', 'image', '', 'uploads/image886317029.jpg', '2016-06-20 13:57:44', '2016-06-20 13:57:44'),
(34, 17, '', 'image', '', '', '2016-06-22 12:38:43', '2016-06-22 12:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_sponsors`
--

CREATE TABLE IF NOT EXISTS `event_sponsors` (
  `id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_sponsors`
--

INSERT INTO `event_sponsors` (`id`, `event_id`, `name`, `link`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'quas', 'http://www.rempel.org/repudiandae-et-repudiandae-asperiores-magni-et', 'http://lorempixel.com/200/200/?70132', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(2, 5, 'temporibus', 'http://www.borer.com/molestias-voluptas-officiis-sunt-et', 'http://lorempixel.com/200/200/?81944', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(3, 2, 'enim', 'http://hudson.com/', 'http://lorempixel.com/200/200/?52902', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(4, 1, 'molestiae', 'http://marks.net/magni-aut-commodi-perferendis.html', 'http://lorempixel.com/200/200/?26283', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(5, 3, 'dolorum', 'http://altenwerth.com/voluptatem-ipsum-qui-sapiente-cupiditate-molestiae-labore', 'http://lorempixel.com/200/200/?85225', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(6, 1, 'et', 'http://www.runolfsdottir.com/', 'http://lorempixel.com/200/200/?66864', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(7, 1, 'quibusdam', 'http://www.cronin.biz/occaecati-non-eaque-veritatis-animi-qui-expedita-omnis.html', 'http://lorempixel.com/200/200/?48663', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(8, 2, 'consequuntur', 'https://gleason.com/molestiae-autem-sunt-sit-et-voluptate.html', 'http://lorempixel.com/200/200/?58003', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(9, 5, 'voluptatum', 'http://dach.com/rem-qui-ex-alias-dolor-voluptas-id', 'http://lorempixel.com/200/200/?41285', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(10, 5, 'qui', 'http://www.murphy.com/sit-non-aut-autem-atque-ab-officia', 'http://lorempixel.com/200/200/?71278', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(11, 2, 'iure', 'http://haag.com/quasi-culpa-repudiandae-omnis-est-non-possimus-distinctio.html', 'http://lorempixel.com/200/200/?35546', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(12, 3, 'laborum', 'http://www.klein.net/', 'http://lorempixel.com/200/200/?72350', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(13, 5, 'eum', 'http://jaskolski.com/sed-quo-mollitia-neque-voluptatem-sint', 'http://lorempixel.com/200/200/?48344', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(14, 3, 'fugiat', 'http://wiza.com/nemo-qui-eos-facilis-veniam-repellendus-officiis-ea', 'http://lorempixel.com/200/200/?98840', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(15, 1, 'molestias', 'https://dare.biz/sed-delectus-alias-voluptates-qui-aut.html', 'http://lorempixel.com/200/200/?25863', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(16, 5, 'in', 'http://trantow.org/sit-explicabo-odit-pariatur-architecto.html', 'http://lorempixel.com/200/200/?28165', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(17, 1, 'ut', 'http://cremin.com/sunt-voluptatem-possimus-architecto-quisquam', 'http://lorempixel.com/200/200/?43893', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(18, 2, 'libero', 'http://www.conn.net/omnis-voluptate-mollitia-reiciendis-hic-deserunt-pariatur-enim', 'http://lorempixel.com/200/200/?48506', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(19, 1, 'consequuntur', 'https://www.oberbrunner.com/dolores-itaque-perferendis-quia', 'http://lorempixel.com/200/200/?99308', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(20, 4, 'sapiente', 'http://www.pagac.com/ut-ea-qui-a', 'http://lorempixel.com/200/200/?65974', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(21, 3, 'nulla', 'http://howell.com/est-voluptas-vel-optio-ratione-incidunt-nemo-enim', 'http://lorempixel.com/200/200/?69512', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(22, 3, 'praesentium', 'http://www.kuhic.com/', 'http://lorempixel.com/200/200/?85189', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(23, 4, 'qui', 'http://kautzer.com/nesciunt-maiores-est-aliquid-eos-officia-nam-eum-et', 'http://lorempixel.com/200/200/?46256', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(24, 3, 'maxime', 'http://hettinger.com/qui-neque-laborum-cum-distinctio-molestiae-tenetur-quo', 'http://lorempixel.com/200/200/?70260', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(25, 1, 'nihil', 'http://leffler.com/molestiae-et-aperiam-est-velit-omnis.html', 'http://lorempixel.com/200/200/?71832', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(26, 14, 'Reftek Technologies', 'reftek.co', '1107581185.jpg', '2016-06-20 12:39:55', '2016-06-20 12:39:55'),
(27, 14, 'Reftek Technologies', 'reftek.co', 'http://localhost:8000/uploads/image/452702406.jpg', '2016-06-20 12:44:20', '2016-06-20 12:44:20'),
(28, 14, 'Reftek Technologies', 'reftek.co', 'http://localhost:8000/uploads/image/410437028.jpg', '2016-06-20 12:44:48', '2016-06-20 12:44:48'),
(29, 14, 'Reftek Technologies', 'reftek.co', 'http://localhost:8000/uploads/image/148954658.jpg', '2016-06-20 12:49:38', '2016-06-20 12:49:38'),
(30, 15, 'ra', 'hhgg', 'uploads/sponsors/1090692093.jpg', '2016-06-20 16:03:28', '2016-06-20 16:03:28'),
(31, 17, 'Reftek Technologies', 'reftek.co', 'uploads/sponsors/1093549591.jpg', '2016-06-22 12:45:32', '2016-06-22 12:45:32'),
(32, 17, 'Samp ', 'car.com', 'uploads/sponsors/1041389595.jpg', '2016-06-22 12:45:32', '2016-06-22 12:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fashion show', '2016-06-13 15:59:08', '2016-06-13 15:59:08'),
(2, 'Trade Fair', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(3, 'Career Fair', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(4, 'Talent Hunt', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(5, 'Talk Show', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(6, 'Training', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(7, 'Workshop', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(8, 'Seminar', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(9, 'Conference', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(10, 'Corporate Party', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(11, 'Tourism', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(12, 'Dinner Party', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(13, 'Pool Party', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(14, 'Carnival', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(15, 'Wedding Ceremony', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(16, 'Burial Ceremony', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(17, 'Engagement Party', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(18, 'Proposal Party', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(19, 'Convention', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(20, 'Sport Competition', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(21, 'Award Ceremony', NULL, NULL),
(22, 'Road Trip', NULL, NULL),
(23, 'Naming Ceremony', NULL, NULL),
(24, 'Birthday Party', NULL, NULL),
(25, 'Contest', NULL, NULL),
(26, 'Coronation', NULL, NULL),
(27, 'Ordination', NULL, NULL),
(28, 'Others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_13_090516_create_event_table', 1),
('2016_06_13_100258_create_package_table', 1),
('2016_06_13_121035_create_event_media_table', 1),
('2016_06_13_121807_create_event_sponsor_table', 1),
('2016_06_13_122550_create_event_awards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `fee_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_style` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `event_id`, `title`, `description`, `fee_currency`, `fee_amount`, `fee_style`, `created_at`, `updated_at`) VALUES
(1, 1, 'Accusantium corrupti id ut ipsa debitis.', 'Dolorum repellendus quibusdam nesciunt voluptatem deleniti veniam. Nihil voluptas error ut et. Animi enim incidunt id eveniet quia magni et.', 'voluptatibus', '95690254', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(2, 2, 'Reiciendis est ut explicabo repellendus dolorum.', 'Animi et aliquam dolor non ratione ullam. Atque similique repellendus libero autem. Modi unde quis perferendis. Quisquam voluptatem voluptatem et sint quibusdam.', 'reprehenderit', '21588084', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(3, 2, 'Qui ea tenetur dolor possimus illum quibusdam nostrum.', 'Et voluptates odit pariatur est omnis. Praesentium quibusdam quis earum iusto omnis et nobis. Quis at ullam vel nostrum error.', 'laborum', '25609644', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(4, 4, 'Expedita beatae doloremque et cum illum.', 'Enim nisi sunt nemo ut eligendi. Magnam est voluptas exercitationem omnis alias. Doloremque labore sint et rerum.', 'commodi', '21273245', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(5, 1, 'Tempora veritatis quibusdam molestiae rerum illum quia.', 'Libero nostrum temporibus labore id. Culpa tempora dolores est itaque voluptatem quo. Doloremque quod doloremque voluptatibus delectus.', 'voluptatum', '22238526', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(6, 2, 'Enim exercitationem cupiditate aut suscipit quam tempore similique.', 'Ratione voluptas nihil repudiandae neque eos doloribus rerum. Enim omnis est laborum deleniti ut et. Doloremque qui eius enim dolores et reprehenderit. Aspernatur quam ea soluta placeat.', 'temporibus', '80979895', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(7, 1, 'Consequuntur enim deleniti quos quis suscipit.', 'Unde sit repudiandae deleniti. Eius hic natus aspernatur ipsam architecto omnis ad nostrum. Dolores eligendi blanditiis voluptatem magni. Illum reiciendis quis necessitatibus quis.', 'qui', '2593126', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(8, 4, 'Molestiae et temporibus facilis est assumenda.', 'Cupiditate provident quidem sint nemo qui. Tenetur non est quos quia eos et corporis velit. Placeat placeat voluptatum harum. Eligendi autem quae ducimus atque placeat quasi aut.', 'ipsam', '84153444', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(9, 2, 'Sint neque et odio vitae tenetur.', 'Quas expedita veniam dolor dolorum magni autem. Tenetur quas maxime sit. Dolores et quia animi delectus. Atque tenetur ipsum natus.', 'qui', '33148103', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(10, 2, 'Eius nisi repudiandae dolore modi aut.', 'Qui aut nemo exercitationem odio rerum voluptas. Sed autem aut debitis vero qui.', 'mollitia', '16782210', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(11, 5, 'Quas error laborum et dolorem fugiat.', 'Eum et qui veniam dolor soluta sed esse. Neque corrupti fuga dolores ullam ipsum nam repellendus.\nIusto ea sunt sed. Est molestias aut quis a numquam distinctio quo. Minus dignissimos voluptate quia.', 'enim', '58572858', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(12, 3, 'Aut est voluptas ullam assumenda sed officia.', 'Quis aliquid laudantium est inventore. Sit iusto ullam sint eius tempore voluptatem. Deleniti et est tempora dolorum. Est aperiam unde esse ea alias vitae.', 'qui', '29228491', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(13, 2, 'Sit blanditiis qui aut velit.', 'Praesentium sit quia quas. Aut nobis excepturi error esse aut ut dolorem. Itaque voluptates minima voluptas voluptatem autem aut consectetur inventore.', 'consequatur', '53863267', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(14, 2, 'Et dolores maxime facere nobis accusamus explicabo accusamus.', 'Ab aperiam est mollitia. Sit praesentium quo iure. Ut sit eum voluptas aliquam voluptate. Ut qui reprehenderit enim at vero.', 'iure', '56776580', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(15, 1, 'Et suscipit aspernatur ipsam quam.', 'Deleniti omnis earum at fugiat hic. Velit blanditiis dolore soluta.', 'amet', '80658643', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(16, 4, 'Amet eum sit fuga et eligendi molestiae.', 'Minus consectetur amet quaerat eveniet delectus et velit. Deserunt et nam quae minima sunt ut laboriosam corporis. Ipsam tempora delectus velit veniam.', 'aperiam', '27983556', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(17, 2, 'Quasi enim unde quia officia dolores voluptatem error est.', 'Dolor a velit dolorem quae recusandae qui. Iusto sunt enim non occaecati minima recusandae.', 'quos', '75965653', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(18, 4, 'Sapiente nemo officiis qui consequatur.', 'Velit tempora recusandae harum dolore. Ab repudiandae cumque nihil a autem. Nemo dolor illum accusamus exercitationem porro qui. Possimus facere voluptatem sed aut beatae labore qui.', 'beatae', '27903092', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(19, 2, 'Quam qui aliquam accusantium dolores necessitatibus voluptas eum.', 'Et voluptas molestias debitis quis ut qui. Tempore cum et architecto et. Adipisci officiis eligendi sint voluptas delectus nobis cumque. Iste enim laboriosam enim aut iusto.', 'qui', '24966762', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(20, 1, 'Facilis omnis ullam officiis qui odio quis aut.', 'Est atque impedit laudantium aliquid minima et vitae. Saepe quo molestias qui quibusdam. Et voluptas quas placeat eos hic sunt cumque iusto. Et fugit consequatur nam commodi ut rerum aut.', 'nisi', '31376781', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(21, 4, 'Eligendi velit cum mollitia nihil ad repellendus.', 'Odit recusandae est natus est fuga. Ex est sunt quod iste voluptas ducimus animi vero. Molestias dolore iure a illo velit a id nihil. Debitis non excepturi ut ut rem culpa.', 'eius', '14081398', 'Late', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(22, 2, 'Inventore minus minima aperiam officia.', 'Temporibus est vitae quia non sunt nam similique enim. Nulla omnis minus est odio porro minima eum. Dicta voluptas veniam quo molestiae facere et sequi.', 'in', '21590797', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(23, 3, 'Totam impedit ut minima enim quis.', 'Iusto molestiae modi numquam ad eum. Ea molestiae aut quia eum ab dolorum sint. Qui nihil voluptatem voluptatum ipsam ut et reprehenderit. Aut quia modi aliquam culpa aut.', 'natus', '72731654', 'Early bird', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(24, 3, 'Non accusantium error pariatur impedit maiores.', 'Assumenda sint iure est. Quia id eos consequatur ipsa repudiandae ut. Quaerat et esse omnis labore et repellat maiores. Animi et consequuntur quo est et suscipit.', 'veniam', '71063857', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(25, 1, 'Aut a dolor dolorem sit a quis et.', 'Eaque dolorem est mollitia non ab beatae. Ea omnis voluptate itaque impedit adipisci architecto. Mollitia voluptas veniam aut ea qui nemo eos. Iste ducimus ut perferendis.', 'distinctio', '20202481', 'Free', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(41, 14, 'Sample', 'Sample Package description', 'Naira', '3', 'Late Bird', '2016-06-20 13:26:02', '2016-06-20 13:26:02'),
(42, 15, 'First Free Package', 'This is a free package for eveyone that comes before 1pm', 'Naira', '0', 'Free', '2016-06-20 13:57:24', '2016-06-20 13:57:24'),
(43, 15, 'Paid package', 'fsdjkds mnjf js dfjhd fdsj', 'Naira', '4000', 'Early Bird', '2016-06-20 13:57:24', '2016-06-20 13:57:24'),
(44, 17, 'Sample Package 1', 'This is a sample package that is for everyone', 'Naira', '0', 'Free', '2016-06-22 12:33:37', '2016-06-22 12:33:37'),
(45, 17, 'THis is for VIP', 'Vip sitting with 70 tables', 'Naira', '300000', 'Early Bird', '2016-06-22 12:33:37', '2016-06-22 12:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `package_fee_types`
--

CREATE TABLE IF NOT EXISTS `package_fee_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_fee_types`
--

INSERT INTO `package_fee_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'rerum', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(2, 'rerum', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(3, 'et', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(4, 'dolorem', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(5, 'ipsum', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(6, 'ut', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(7, 'est', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(8, 'unde', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(9, 'beatae', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(10, 'porro', '2016-06-13 15:59:09', '2016-06-13 15:59:09'),
(11, 'voluptas', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(12, 'est', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(13, 'veritatis', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(14, 'omnis', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(15, 'aliquid', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(16, 'illo', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(17, 'eum', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(18, 'sed', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(19, 'et', '2016-06-13 16:00:20', '2016-06-13 16:00:20'),
(20, 'aperiam', '2016-06-13 16:00:20', '2016-06-13 16:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `package_package_fee_type`
--

CREATE TABLE IF NOT EXISTS `package_package_fee_type` (
  `package_id` int(11) NOT NULL,
  `package_fee_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_package_fee_type`
--

INSERT INTO `package_package_fee_type` (`package_id`, `package_fee_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('raymond@reftek.co', '8918ad22b9ceeef95f8a5ac7a740da4aa0d5462226505fd550178e60f649cb91', '2016-06-15 10:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Flossie Schroeder', 'samson70@example.com', '', '$2y$10$r8y9.0beSgojXUCmZcJRFuJcN8ZsAh3nMpu9tkPd18g1TjkVl3SLm', 'k1A3vA9OCk', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(2, 'Jared Kiehn I', 'adele82@example.org', '', '$2y$10$jv79CAiXcYPHgpm8GNT7b.4D5AAlMGCaKlIRn1Jxa7VzcCqk/xpve', '6Qk0wShzgi', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(3, 'Tristian Dietrich', 'hazle.nolan@example.com', '', '$2y$10$EcETBwMYaLZOx69B1pMj6uEr/VjG8lqMivZ2IouJ/PIcNjfHtbmG.', 'DaN9bLZBBY', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(4, 'Mr. Lafayette Brown IV', 'bpowlowski@example.net', '', '$2y$10$dqbXIuXLIXUfZkU5hxvZJu4VjDEDhXVEwYMy3t47ISGf7/txzgxP2', 'cT6Gl8p9bz', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(5, 'Ole Sipes', 'denis.ferry@example.org', '', '$2y$10$3TUstfEbFgvnoGAy4zgxo.WBgJA8rtYhVnny.tH4.EJX/3wSFQrKC', 'KUuAAOvyWE', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(6, 'Jorge Conn', 'alexandrine75@example.net', '', '$2y$10$TZLJctFMaJrys9Cg5zsTKemSnRQA5mPF0vyyf784FPHctWtUqba4O', '8C1ebGnHNd', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(7, 'Irwin Maggio', 'garett.christiansen@example.net', '', '$2y$10$fC7FbwyEa2rQiyDNGmRk4OUhPhjMvrhS3/SQOWddj8fe49i0DzyyC', '7ad5ZklyMG', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(8, 'Domenico Beer', 'moore.brayan@example.org', '', '$2y$10$C214/WK0sScwunoSZCjt2.iGpuONXbOO84xmAZdgqhJWh63RFc26O', '7joHJvKCy9', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(9, 'Rodrick Bradtke V', 'ksmith@example.net', '', '$2y$10$rxIcRX/QQjxY4tHdGrTTMuq9ZkOg6B4GyG6VBTb7nfkOD0kSAiipa', 'WqQd1i2KaU', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(10, 'Torrance Lakin', 'jspencer@example.com', '', '$2y$10$w4HNkGEOluRZf6vcaxo5VuRhNYHfCuWdWugy2CHtSVMfTfq1AeNc.', 'xVXt5rLyOi', '2016-06-13 16:00:23', '2016-06-13 16:00:23'),
(11, 'Sam', 'raymond@reftek.co', '', '$2y$10$L4m7GQbr5JxiEuicJhRP3Oi8e.CKYJtQe63ifi.QUPkWyx2m1ehkS', 'DucYwQ3TG8zQ0ZMdpdNqgJ2XsJYw5PsKqLINGTReyGqQZho2Y2lkb5ah6OcZ', '2016-06-14 14:10:05', '2016-06-15 09:04:55'),
(12, 'Raymond Ativie', 'raymonds@reftek.co', '', '$2y$10$GRT2ydAYfkzc.6iNIuflJ.R0SIdalTreulYjF.q3MPN4bNR.Dy1zS', 'fw9KivOSWqRPfXu92T9ZqX9Z7iuDXmnuiE1CthH3LltJIPHgVJsK7BfQc0GY', '2016-06-15 08:02:30', '2016-06-15 08:12:41'),
(13, 'Raymond Ativie', 'RaymondAtivie@gmail.com', '', '$2y$10$MItW7P86e3i/yNixiW2D0eBN5R4sbQ/5xSE6xhfxmz1A1u.vxtatW', '7mJxnIEgADiv8etx8Io6e5XRUVmnMeZnSLsqrThkpr83SHNtOoDw63V3nee5', '2016-06-18 20:36:37', '2016-06-23 09:02:50'),
(14, 'Raymond Ativie', 'ray@gmail.com', '', '$2y$10$WBdL.25v3drh2KpasiqJFO0Ub/GLJNAMks1kCJ66M3Zy4fAVH01gS', NULL, '2016-06-23 10:05:34', '2016-06-23 10:05:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestant_event_award`
--
ALTER TABLE `contestant_event_award`
  ADD KEY `contestant_event_award_event_award_id_index` (`event_award_id`),
  ADD KEY `contestant_event_award_contestant_id_index` (`contestant_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_awards`
--
ALTER TABLE `event_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_event_type`
--
ALTER TABLE `event_event_type`
  ADD KEY `event_event_type_event_id_index` (`event_id`),
  ADD KEY `event_event_type_event_type_id_index` (`event_type_id`);

--
-- Indexes for table `event_media`
--
ALTER TABLE `event_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_sponsors`
--
ALTER TABLE `event_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_fee_types`
--
ALTER TABLE `package_fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `event_awards`
--
ALTER TABLE `event_awards`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `event_media`
--
ALTER TABLE `event_media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `event_sponsors`
--
ALTER TABLE `event_sponsors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `package_fee_types`
--
ALTER TABLE `package_fee_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contestant_event_award`
--
ALTER TABLE `contestant_event_award`
  ADD CONSTRAINT `contestant_event_award_contestant_id_foreign` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contestant_event_award_event_award_id_foreign` FOREIGN KEY (`event_award_id`) REFERENCES `event_awards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_event_type`
--
ALTER TABLE `event_event_type`
  ADD CONSTRAINT `event_event_type_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_event_type_event_type_id_foreign` FOREIGN KEY (`event_type_id`) REFERENCES `event_types` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
