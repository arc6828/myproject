-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 08:43 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `title`, `content`, `price`, `cost`, `photo`, `quantity`) VALUES
(1, '2020-05-23 06:16:15', '2020-05-23 11:33:16', 'เศรษฐกิจโลก 1,000 ปี More... เศรษฐกิจโลก 1,000 ปี', 'เรียนรู้อดีต เพื่อเข้าใจอนาคต... โลกทั้ง 1,000 ปี จะถูกย่นย่อสรุปความให้เหลือ 1 เล่ม ด้วยถ้อยคำสไตล์ \"ลงทุนแมน\" ที่บรรจงเชื่อมโยงร้อยเรียงขึ้นมา ถ้าใครได้อ่านแล้วจะสามารถเชื่อมโยง เข้าใจโลกได้ดีขึ้น', 332.00, 100.00, 'uploads/1KdPspAyl5sBLd3NFG9VqELh4HKtApSPoiIhQJmd.jpeg', 100),
(2, '2020-05-23 06:17:49', '2020-05-23 11:36:29', 'Money 101 : เริ่มต้นนับหนึ่งสู่ชีวิตการเงินอุดมสุข', 'ครอบคลุมประเด็นสำคัญในเรื่อง \"การเงินส่วนบุคคล\" และให้หลักคิด หลักปฏิบัติอย่างง่าย เพื่อให้ผู้อ่านสามารถเริ่มต้นได้ในทันทีที่อ่านจบแต่ละบท มากกว่าที่จะลงลึกรายละเอียดที่มีความซับซ้อน', 180.00, 100.00, 'uploads/H1KYECeSSxcdIb9MBSB1sQFXF2ZfbulZp12m8IYL.jpeg', 99),
(3, '2020-05-23 06:19:01', '2020-05-23 11:36:29', 'สีน้ำแสนสนุก', 'พื้นฐานการวาดภาพสีน้ำ กับภาพง่าย ๆ น่ารัก ๆ ที่พบได้ทั่วไปในชีวิตประจำวัน ไม่ยากเกินไปสำหรับมือใหม่ พร้อมเสริมความเข้าใจด้วยคลิปวิดีโอการวาด เพื่อให้ผู้อ่านทำตามได้ง่ายยิ่งขึ้นจากรายการสีน้ำแสนสนุก', 185.00, 120.00, 'uploads/fHsKaj4vXPp4KCZrlngrVhV6siB5K5hTHPzO17rZ.jpeg', 98);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
