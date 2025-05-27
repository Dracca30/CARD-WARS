-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2025 alle 20:01
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racca_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('creatura','incantesimo','costruzione') NOT NULL,
  `description` text DEFAULT NULL,
  `attack` int(11) DEFAULT 0,
  `defense` int(11) DEFAULT 0,
  `cost` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cards`
--

INSERT INTO `cards` (`id`, `name`, `type`, `description`, `attack`, `defense`, `cost`, `image_url`) VALUES
(1, 'Corn Dog', 'creatura', 'Le creature adiacenti guadagnano +4 Attacco.', 9, 11, 2, 'https://i.postimg.cc/j5vjG6Nc/Corn-Dog.webp'),
(2, 'Husker Knight', 'creatura', 'Le creature adiacenti guadagnano +2 Attacco.', 6, 3, 1, 'https://i.postimg.cc/SNKwLBrj/Husker-Knight.webp'),
(3, 'Cool Dog', 'creatura', 'La creatura nella corsia opposta non può usare la sua abilità Floop nel prossimo turno.\n', 3, 7, 1, 'https://i.postimg.cc/vT6vPmxQ/Cool-Dog.webp'),
(4, 'Field Reaper', 'creatura', 'Riduci l\'Attacco di tutte le creature avversarie di 4.\n', 25, 13, 4, 'https://i.postimg.cc/13k1MvC6/Field-Reaper.webp'),
(5, 'The Cow', 'creatura', 'Cura tutte le tue creature di 5 punti.\n', 6, 39, 3, 'https://i.postimg.cc/jSzs7Vcm/The-Cow-Gold.webp'),
(6, 'Immortal Maize Walker', 'creatura', 'Infliggi 33 danni a una qualsiasi creatura avversaria di tipo Mais.\n', 11, 36, 5, 'https://i.postimg.cc/SsMWpxkj/Immortal-Maize-Walker.webp'),
(7, 'Fluffantry', 'creatura', 'Cura il tuo Eroe di 2 punti per ogni tua creatura sul campo.\n', 20, 25, 5, 'https://i.postimg.cc/qqT8LHnY/Fluffantry.webp'),
(8, 'School House', 'costruzione', 'La tua creatura in questa corsia guadagna 5 Difesa quando viene usata un\'abilità Floop.\n', 0, 0, 1, 'https://i.postimg.cc/QxGwWFzN/School-House.webp'),
(9, 'Rainbow Barfer', 'creatura', 'Infliggi 5 danni alla creatura nella corsia opposta per ogni tuo paesaggio diverso.\n', 16, 34, 5, 'https://i.postimg.cc/yxFRGpBG/Rainbow-Barfer.webp'),
(10, 'The Pig', 'incantesimo', 'Riduci l\'Attacco di tutte le creature Mais di 1.\n', 1, 6, 1, 'https://i.postimg.cc/DZc6Jz40/The-Pig-Gold.webp'),
(11, 'Sandwitch', 'creatura', '+9 Difesa a una creatura casuale sul campo, inclusi gli avversari.\n', 25, 10, 4, 'https://i.postimg.cc/Gp1WwHkS/Sandwitch.webp'),
(12, 'Cornfield', 'costruzione', 'Dà +1 difesa alle creature di tipo \"mais\".', 0, 0, 0, 'https://i.postimg.cc/15rvbfYt/Corn.webp'),
(13, 'Log Knight', 'creatura', 'Aumenta l\'Attacco di questa creatura di 4 per ogni creatura che hai fatto floopare questo turno.\n', 10, 20, 0, 'https://i.postimg.cc/SN3knQhm/Log-Knight.webp'),
(14, 'Brain Gooey', 'creatura', 'Lower the attack of all enemy creatures by 12 and destroy this creature.', 5, 20, 5, 'https://i.postimg.cc/yd4th2b3/Brain-Gooey.webp'),
(15, 'Wall of Sand', 'creatura', 'Le creature adiacenti guadagnano +4 Difesa.\n', 0, 26, 3, 'https://i.postimg.cc/j5WPHQ5D/Wall-Of-Sand.webp'),
(16, 'Dr. Death', 'creatura', 'Infliggi 7 danni alla creatura nella corsia opposta e cura questa creatura di 7 punti.\n', 52, 15, 5, 'https://i.postimg.cc/nrbsJKhQ/Dr-Death-Gold.webp'),
(17, 'Archer Dan', 'creatura', 'Scegli una creatura avversaria e riduci il suo Attacco di 4.\n', 12, 6, 2, 'https://i.postimg.cc/Z5bnTMYm/Archer-Dan.webp'),
(18, 'Nice Ice Baby', 'creatura', 'La creatura nella corsia opposta non può attaccare nella prossima fase di combattimento.\n', 2, 3, 1, 'https://i.postimg.cc/MK7XJjBh/Nice-Ice-Baby.webp'),
(19, 'Mouthball', 'creatura', 'La creatura nella corsia opposta non può usare l’abilità Floop nel prossimo turno.\n', 3, 2, 1, 'https://i.postimg.cc/90XZwtyw/Mouthball.webp'),
(20, 'Ghost Sludger', 'creatura', '+13 Attacco.\n', 1, 37, 4, 'https://i.postimg.cc/KzFP7ytW/Ghost-Sludger.webp'),
(21, 'Punk Cat', 'creatura', 'Attiva l’abilità Floop di una creatura adiacente, se possibile.\n', 8, 22, 3, 'https://i.postimg.cc/1tvcHjmr/Punk-Cat.webp'),
(22, 'Astral Fortress', 'costruzione', 'La creatura in questa corsia guadagna +4 Difesa.\n', 0, 0, 1, 'https://i.postimg.cc/L5jW0DGQ/Astral-Fortress.webp'),
(23, 'Banana Butt', 'incantesimo', 'Distruggi una tua creatura e pesca 1 carta.\n', 0, 0, 1, 'https://i.postimg.cc/SN6sWp1C/Banana-Butt.webp'),
(24, 'The Sludger', 'creatura', 'Riduci la Difesa delle creature adiacenti di 2 e aumenta il loro Attacco di 4.\n', 15, 15, 3, 'https://i.postimg.cc/QVZd2jSg/The-Sludger.webp'),
(25, 'Cactus Thug', 'creatura', 'Infliggi danni alla creatura nella corsia opposta pari alla Difesa di questa creatura.\n', 25, 12, 5, 'https://i.postimg.cc/8PQdpNr6/Cactus-Thug.webp'),
(26, 'Bubblegum Butt', 'incantesimo', 'Pesca 3 carte.', 0, 0, 5, 'https://i.postimg.cc/bvj9m8qP/Bubblegum-Butt.webp'),
(27, 'Grape Slimey', 'creatura', 'Pesca 1 carta e manda questa creatura nella pila degli scarti.\n', 2, 5, 1, 'https://i.postimg.cc/7LqhmPQS/Grape-Slimey.webp'),
(28, 'Corn Ronin', 'creatura', '+3 Attacco per ogni carta nella tua mano.\n', 18, 10, 3, 'https://i.postimg.cc/WphSbsbN/Corn-Ronin.webp'),
(29, 'Ghost Ninja', 'creatura', 'Infliggi 4 danni alla creatura nella corsia opposta e cura questa creatura di 5 punti.\n', 5, 10, 3, 'https://i.postimg.cc/FRD9PjJ4/Ghost-Ninja.webp'),
(30, 'Spirit Tower', 'costruzione', 'Infliggi 5 danni all’eroe avversario quando una nuova creatura viene messa in questa corsia.\n', 0, 0, 1, 'https://i.postimg.cc/xjRML7xk/Spirit-Tower.webp');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'andrea9095', 'andrea9095@gmail.com', '$2y$10$GNFdNyGPvgeQc37Jp/3D9.UJdjNPOARtH5DFkmM7kBglPd0vwJuFK'),
(2, 'alessio7003', 'alessio7003@yahoo.com', '$2y$10$B.lDrvtTrwdeELt1EYDjw.AkEucTaftPhGvRmzE1Wl23rtfWGipdG'),
(3, 'francesco6797', 'francesco6797@hotmail.com', '$2y$10$/oC19TxSiOD0sj25iPUBz.Wp6ho7ETs7tPub5cKE6vPZlS35.7V1S'),
(4, 'giulia7612', 'giulia7612@yahoo.com', '$2y$10$iRIeI0HepRIGetCkMVuAu.yPqOlyovivfIdHJuqi.F2IMTtixXAg.'),
(5, 'chiara37', 'chiara37@gmail.com', '$2y$10$XDohHAX/0kF4ccHzp9OOROxmDET.Tb1ut17epVTqOayfEbhGUn6s6'),
(6, 'martina9250', 'martina9250@gmail.com', '$2y$10$5RKisrXlWbwZ1y5HkgRMTu3oRHY4sg2PIos/iIfdJPcwTXqZi.9mK'),
(7, 'laura7594', 'laura7594@gmail.com', '$2y$10$79WjNcZRL9ErpWMU9dVB0ejOxJLJH4fiawsWGAcBkKlvmT5JsgTNG'),
(8, 'marco6493', 'marco6493@yahoo.com', '$2y$10$vEn7NMPrWUGANTyQoJo8FuyE.eKW7ar0uNFhO4X/PVqypT59zFdOq'),
(9, 'marco7343', 'marco7343@yahoo.com', '$2y$10$gvVJVzlpwVLMH45ymQv8TOykq.CS9B.OXWYetyiEuuSYRMJO1Xph2'),
(10, 'martina7570', 'martina7570@outlook.com', '$2y$10$qlrxgCx8zd/8kU.MPDc92OvPjhgvM6v6fET9jHw179dBnF.dBJk8S'),
(11, 'elisa603', 'elisa603@hotmail.com', '$2y$10$VonQ//LtI6KensQUCyc39.zqarwDDocOQ5pAGEL0Tqp2hNwpYZ6PW'),
(12, 'simone4322', 'simone4322@outlook.com', '$2y$10$auQnm7L/CvPgJLMEJmtJ2OarYIniPowbInm.9B/f9C9ZtBKGof7ea'),
(13, 'elisa5771', 'elisa5771@hotmail.com', '$2y$10$d1UTUW/ZN6.Y8/iErSFiceNlZ.kNHS04z5txY9VyhfT19L8M63Uli'),
(14, 'alessio5872', 'alessio5872@yahoo.com', '$2y$10$9dIIubDF9hJe07ySP2ep6uAu2EAlLLeG4iJrd6A7FXWlx3CkIt5gS'),
(15, 'irene9813', 'irene9813@outlook.com', '$2y$10$CgSl36okH3fbWwAAGpIlzOZg.puoQqZs26dxQqY6TCcW.u5yDz1Iq'),
(16, 'francesco5747', 'francesco5747@outlook.com', '$2y$10$eVUKE5.QgBK2GWnhsNl1f.jUfxvfi8gEMRFPSh5iofeEQgbkoAxVK'),
(17, 'irene5506', 'irene5506@hotmail.com', '$2y$10$0wpE4FU2iw1aqdzixBM6POoPtzjwcSIXyo5CmZ1LN12uVtLtkehYO'),
(18, 'davide6358', 'davide6358@hotmail.com', '$2y$10$sFqdKlQ/SL8LExu/ALdMReJFEWhiC5SwlmYN9abnWNDTwNjDmmfcC'),
(19, 'davide5862', 'davide5862@yahoo.com', '$2y$10$8t1/14lLPNFsFV72pE7JneB4D3ZKSiz1/XOy.8/HcMhQV/OclMpVG'),
(20, 'matteo3946', 'matteo3946@outlook.com', '$2y$10$h/IZUSd21ZKKyKPOazPpQOppty6m1OZCE7UoXuLl5Ml9rmjFNcuV6'),
(21, 'sara703', 'sara703@outlook.com', '$2y$10$o7Hsmkylywg6cZ9aLY4OTO32hF1R3IQkLGtRpN7ro/b/A3e70LV56'),
(22, 'francesco1204', 'francesco1204@yahoo.com', '$2y$10$B/o.qTGrzzv5hucDaqcp1O0ehN1Z.BRQm5s0VQ99gk45jtSBEMPCC'),
(23, 'elisa4387', 'elisa4387@gmail.com', '$2y$10$6tN.u.ihqwyJAwxM5h81AeJ0kfTGNMHfWA6fLROs/4y5AsmPQSeoG'),
(24, 'silvia133', 'silvia133@yahoo.com', '$2y$10$90GV9FMMlxHN1rc7H0mcRu6GlUiXTzTSdNXVMzpHXj7r5eAyV7uni'),
(25, 'irene9643', 'irene9643@outlook.com', '$2y$10$1W7fDwxBFnmjll9rxWkUoOMTjhx/nt4vv6LZ6gWkhYHViYtK/Phb6'),
(26, 'giulia8630', 'giulia8630@hotmail.com', '$2y$10$E4vbx5ktngBO4/752Ixmou7LfgXfdpn2rbgi3Gqd7ThCEH3PifXqW'),
(27, 'marco4450', 'marco4450@yahoo.com', '$2y$10$hcIqW.0z9EtVmxnMb5s/wexp8Uw2VKg5Jxge2815llQ/7YHRU2Dw2'),
(28, 'francesco4548', 'francesco4548@outlook.com', '$2y$10$2FI8Lk90ocTXVnWm/efHWuO/sAYf3woDaVJ1a.wRz2WypX/WVSDO6'),
(29, 'francesco1136', 'francesco1136@outlook.com', '$2y$10$H64uVx2ymVTndU3grjejQuNYs9cY6TBoTKdOFEO6ynCXf6pstwdSy'),
(30, 'valentina6115', 'valentina6115@hotmail.com', '$2y$10$N5SI4sjrRBwWJu4AyJYRc.ncCezWV.VDtJaZoitNaD88MCVmVbIya'),
(31, 'elisa7317', 'elisa7317@hotmail.com', '$2y$10$nXJWd8LVT6UGGjViqG88.upnMvtQL5zvMc.DU3/l7xsQK4T/vUv8S'),
(32, 'sara908', 'sara908@yahoo.com', '$2y$10$WCdSmL6ziCZ0nO/zKju0oeuRIxDZwqLDlABTIo11KCe.SP7STGzM.'),
(33, 'davide9010', 'davide9010@yahoo.com', '$2y$10$xe.FCgNxsqrz43x85tjK2eOnxA.QlPsxqqLpG5GelAS6Zkt5UQlAG'),
(34, 'valentina2625', 'valentina2625@gmail.com', '$2y$10$94x5mUYdr0ElMihOlpIdQOz1M4XukymdAjs/6SeosR19sCTnXr6Ja'),
(35, 'silvia9382', 'silvia9382@gmail.com', '$2y$10$OTwitgYJ4q5gbFHOpHXzFu8xHm7FKc0E9rihysJ/PMILIeueifpye'),
(36, 'valentina839', 'valentina839@gmail.com', '$2y$10$oiRStYfA8ma6b5SSoAen6eHexTJ7hWUXxvnulO0DWGlcedXlqvFoi'),
(37, 'silvia3252', 'silvia3252@gmail.com', '$2y$10$xAos6K5A62QS2YjktKmX4OBst.W5cyta9Q3aWFwT0OsNe7zukLIt.'),
(38, 'andrea7986', 'andrea7986@gmail.com', '$2y$10$8lgpaBy9157/u.iI.eRNn.7Y7Uspp3xtps2nh2DBGABtenYo63KIW'),
(39, 'anna725', 'anna725@yahoo.com', '$2y$10$6kV3ya5JeSaUffDeXMDG5.VJ0nFWvzNknOTxxJkY9My/bWHn8ngku'),
(40, 'matteo5665', 'matteo5665@hotmail.com', '$2y$10$e41oML./xRG1DG1kTPUQvOmPHNmNJFLuQ6WXKFjghsq8qCGoJigNq'),
(41, 'silvia8995', 'silvia8995@outlook.com', '$2y$10$JS7YrEtvttjTSRySevoo/.OtNWoFG6LLVYvQ94EVaDi0I5kroTOk2'),
(42, 'martina1631', 'martina1631@yahoo.com', '$2y$10$YXT.adHcNRr/pIAMIWz1ue7QI8cqHUw7O2nZvzktKQ1AMTuiEnMsi'),
(43, 'simone2525', 'simone2525@gmail.com', '$2y$10$yL.NvkWpLw5nWYBlA9uNF.yNPLZmP7gPzsvfFeY8NMGIl2kgChwNm'),
(44, 'giulia9226', 'giulia9226@gmail.com', '$2y$10$/Bes5USrpHFpZ9D2exgXt.WwmT9q1oX3BQfM5cCQOrHXovaKxOuZW'),
(45, 'elisa2557', 'elisa2557@hotmail.com', '$2y$10$7/mrfYgPEVIdHn3lgGdRG.6muKBrBP5GY3I.QtvWAcZYOy.JVT4Ym'),
(46, 'valentina7592', 'valentina7592@gmail.com', '$2y$10$S15pnf37taV4ANoPuFmYc.E5m6aqlKS9SoT9.Nqg1PKC2mTN17A7S'),
(47, 'alessio2636', 'alessio2636@yahoo.com', '$2y$10$Kh5Aaw.JOqktgJtBuqL4NOYKdmQ42jx9HX31cTFsptSJsrXptbCoi'),
(48, 'luca3785', 'luca3785@gmail.com', '$2y$10$ARlFXpQQ18X21Fw7pTUEP.IQNLTAX60ZRx7vmqbQg4Zr.wUUZW/I6'),
(49, 'marco1367', 'marco1367@hotmail.com', '$2y$10$awt4oyprSWd03bMvnSoezuQUAl91W7EkdThxJqxMkkuYz0IXxTgOq'),
(50, 'anna1820', 'anna1820@gmail.com', '$2y$10$vv82p0yPFTl0fogQqKs.QuIsY5ZOSMRRQp2rwjxef3yphQkl8tCIu'),
(51, 'giulia1054', 'giulia1054@yahoo.com', '$2y$10$MvcHOAKLZkPEn2cJDUhZ9.mCygwlLBQiEFGI.RTfUjUtZnBpWMk3m'),
(52, 'anna3616', 'anna3616@hotmail.com', '$2y$10$jg3B4zUwTewBQA8frAcMaunm3hQO4OO1JgkEYwZnLf/8wgvFR7jTy'),
(53, 'elisa3729', 'elisa3729@gmail.com', '$2y$10$s3DMp3GrGY42yXZM6cMNOOg2ph13S9x5r/r93VaNy9JEaLBzrVEf6'),
(54, 'laura3128', 'laura3128@outlook.com', '$2y$10$rDEb3GSG3OlUFp8rXd016.KRJz5ztfUBiTAMEZPnbvPN7mwWufgqy'),
(55, 'matteo1268', 'matteo1268@hotmail.com', '$2y$10$QQMbLNEo2RnnP.B8YKc2s.YNeVBp5N/yppJWJYB9C3kZVUkL1ZfBG'),
(56, 'silvia6976', 'silvia6976@yahoo.com', '$2y$10$gpP6a0vjAHCsgdpmGtmwtevBKWcyfWmtP29y2JhqjX0k6BG3OScnS'),
(57, 'sara953', 'sara953@outlook.com', '$2y$10$NBstfir.p4BmcpdRaypK3uP5.LcgXCY8VMnxJqXVS1GW4ML4HKgme'),
(58, 'matteo111', 'matteo111@gmail.com', '$2y$10$SsSuvWkjX8QC9n8r90t3sOjtLaD8q6Yv.bdrwpj7AmKspBO6teIe.'),
(59, 'silvia5621', 'silvia5621@gmail.com', '$2y$10$N9ansN9NKsMRwvw36EnmKuSHTk0BX5iHie4Mcb8rv7FHvJ.Xu.WgK'),
(60, 'edoardo5417', 'edoardo5417@hotmail.com', '$2y$10$SQ4gl1WV9X6wQxKRyGXpv.7LH.BQrQOUDJZGWzNXSFQu4.jVugvgu'),
(61, 'marco9738', 'marco9738@outlook.com', '$2y$10$z2mO/.S0nG2wNT2fVrzlU.8zTyndb9oLyYdxKB9B6VMtxNnBlbpWm'),
(62, 'martina4260', 'martina4260@yahoo.com', '$2y$10$in1k7LbvR0IvMNafyySosedA0YAiHxJZpNN8DJd28xicKdnkmq9Eq'),
(63, 'martina1511', 'martina1511@yahoo.com', '$2y$10$jNAZB9FxUzt0t4DojyRZlO.UhYQ8bpoVb0/DC/sFDPb.CJNrdRdJC'),
(64, 'giorgio8194', 'giorgio8194@outlook.com', '$2y$10$0.WW2dL5WvVojp8udaAnW.cTqKgX1TieEVrOg/nEpwtoG9zZx.5k.'),
(65, 'elisa425', 'elisa425@hotmail.com', '$2y$10$gvvjwx9Vbop9IoB1VyJaDej7l4EsK2nXDBKdZj5/jRtagOp345oH2'),
(66, 'giorgio2137', 'giorgio2137@yahoo.com', '$2y$10$Cx5FV29p6uVXG0tO3kHimuef47WEjGZkkAHBIA7zYxfVI/TkbgtUC'),
(67, 'luca660', 'luca660@outlook.com', '$2y$10$i19DsdrTngAExNMQ9mQcf.uXyuUE1zbvw2wv6bqyR4ZmqoY6dikdq'),
(68, 'elisa2571', 'elisa2571@hotmail.com', '$2y$10$sP/f6A0LAQcTE3LQX4fdf.sgU7jk0OX7PAzMVvAHmhS.aoAFzjIcu'),
(69, 'silvia6522', 'silvia6522@outlook.com', '$2y$10$S1W6GZyI4vmeFGmVPBZGRec7E5wMSVE5WQ/BqZqOd0chByy2EjUOm'),
(70, 'andrea3158', 'andrea3158@hotmail.com', '$2y$10$0ZBtnk7OKqi3Lm1ph2z/veA0HKJ8dM9vC6L59mj9uvgIFFwsGgF5C'),
(71, 'giorgio4217', 'giorgio4217@gmail.com', '$2y$10$kcp7qtTenpwr2/WI2.hPJetvyiSzSKJAV5ykuyxn3iiNa9fCL0O6C'),
(72, 'chiara902', 'chiara902@gmail.com', '$2y$10$lMLds1ucqqw3BPpxSXPC4.kzZ2jtNa5U.gAulz2l6Bmnf6Dy5qRSO'),
(73, 'alessio3479', 'alessio3479@gmail.com', '$2y$10$V3DZx8gL7octojIpzctPVOQXxrZ92TL/h98mMg72wNLmujw9Y1Icu'),
(74, 'davide3548', 'davide3548@hotmail.com', '$2y$10$vOC9hb9Ek8zA39uwYbNxhepZgkvvyHM0MIZwuRRlk9TYbqfg6qXv.'),
(75, 'francesco4677', 'francesco4677@yahoo.com', '$2y$10$Xt9AOfuXl9Ymw7BY73MEm.qs6raWe0/JiK2.TjyGZNyY0fVcGbXAC'),
(76, 'sara4861', 'sara4861@yahoo.com', '$2y$10$i7W3RofHj33XBmlBLiuxbOngId88F8zyR5BRxjOw9AHfCjBrRtmJO'),
(77, 'silvia1841', 'silvia1841@outlook.com', '$2y$10$91AUp4o0Au0L.jGz4SCDHO/IKB5L0dcPdOjhxmGNzNsqtEz2ys.pW'),
(78, 'edoardo6255', 'edoardo6255@hotmail.com', '$2y$10$pbL7YowQmUxjOO8VAiHMgOeZOeYKhFZCrnLx4RXOv9HgmMuIPi2mS'),
(79, 'luca2344', 'luca2344@yahoo.com', '$2y$10$7aAQlCQheoh8dRVQO7dvbuFGa9jhPBbwoWjWh9d9IyXiaDV8xwhd2'),
(80, 'martina1202', 'martina1202@gmail.com', '$2y$10$m2moFBqj7FkNbotz0UWaneFCrlGjiUgSc/uSyOk10hX66oel8Dit2'),
(81, 'francesco1027', 'francesco1027@hotmail.com', '$2y$10$lpYrVEa7hpEwmgdRve80bewwpufXroJdx0BbGiOJWTtwr6hl.V3Se'),
(82, 'valentina5223', 'valentina5223@yahoo.com', '$2y$10$BSWy5tZrcyhf9NhN/JatbOC5MVS.OMxqUpQOdwMO.hKazecp9gYY2'),
(83, 'elisa1686', 'elisa1686@yahoo.com', '$2y$10$3qlK94gRgtehD3QAJ9RwA.ZJ8qxqrafKua97I2pwpU/T4dcpB.iZe'),
(84, 'alessio8688', 'alessio8688@yahoo.com', '$2y$10$TG9DP4yRfHht7iU6rEY/g.oS0V3n6nrJV1zd2BGkMXB0Z7bMDIfn2'),
(85, 'marco4783', 'marco4783@outlook.com', '$2y$10$b5xWZ0zUT0jCDsXA7mCqHu6l2kDVYp4mNPShg0CkdHRYeutggElfm'),
(86, 'elisa7989', 'elisa7989@yahoo.com', '$2y$10$ftJJico.G.u6grsC44w1hObt7YQw69VDw/HZEkXLkPpd5rsVaWIEy'),
(87, 'elisa2525', 'elisa2525@yahoo.com', '$2y$10$91zdenUHN7u0MUrH3fj30e10Nq09JbI4Cgn6RoDw6xqEOLcFoN3Za'),
(88, 'laura4760', 'laura4760@hotmail.com', '$2y$10$8nidh8KWyTbK9QfpjBe45.DFRNZMGbDtDe8SynOwK8EgJ.Tt6NGha'),
(89, 'anna2270', 'anna2270@outlook.com', '$2y$10$oSQNgnaXXPcXfTE/nrs98e9.MjaN.NaNLzBDHgi5w88ACAi4R50s.'),
(90, 'chiara4096', 'chiara4096@hotmail.com', '$2y$10$4A1PUpCVrxWqKtlnCdepJepfxkMQz5n1lWXYoqGffcxRGbta9zIEy'),
(91, 'chiara6329', 'chiara6329@outlook.com', '$2y$10$k0LAFa4f8gYaKMtLDONyLupDBVV1FjsgV48Y7Lfna2wboKXywAfYi'),
(92, 'edoardo1389', 'edoardo1389@outlook.com', '$2y$10$/CEYMJqSfw3eImuMQHqH/OaVHLyXoJhy/t/yfXK9DAMOa0fy535D6'),
(93, 'martina7055', 'martina7055@gmail.com', '$2y$10$VGI/UQpJIolYsC8AncXFwOEW1YoUIkGBKAYYehzFFjcBMI3tTDYeK'),
(94, 'silvia2161', 'silvia2161@hotmail.com', '$2y$10$sei6CN/3eXuvV7exLDIKDeKBnoSvz.XymyBKCuIp.vxYditW9tjFK'),
(95, 'anna8419', 'anna8419@yahoo.com', '$2y$10$HLd/0nPWn1h0AcWX3U48FOpqgcxzHjWcOQ9SmFhCGIdMUvuwdOhWK'),
(96, 'francesco5940', 'francesco5940@outlook.com', '$2y$10$B8xpshL2zvGgUwk0HcLU8OquvazRANWDhYV/trMvRFzynwHhqvwZe'),
(97, 'francesco95', 'francesco95@outlook.com', '$2y$10$CoAROnPOxD/2EOo22BP0OeJX.RkW56eokjj8hYoWLgOFz7yGRve2W'),
(98, 'luca1876', 'luca1876@hotmail.com', '$2y$10$qU5enonbnJGUd4Jc9Fbuv.jDM0uaDe/bAVtO2S/xgcpY5HVU.z4ea'),
(99, 'matteo5089', 'matteo5089@outlook.com', '$2y$10$hc.tjW.HWzyeLXbITmtzz.VYErSVQlatSoMIOKJLGKpdeZRNX5sV2'),
(100, 'giorgio211', 'giorgio211@outlook.com', '$2y$10$ZiOmxFKqKstX5KVgdpIa/uiQLK9ZimpBb9mvO0yAzyfGKwW2ZAkqu');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_stats`
--

CREATE TABLE `user_stats` (
  `user_id` int(11) NOT NULL,
  `games_played` int(11) DEFAULT 0,
  `games_won` int(11) DEFAULT 0,
  `games_lost` int(11) DEFAULT 0,
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user_stats`
--

INSERT INTO `user_stats` (`user_id`, `games_played`, `games_won`, `games_lost`, `points`) VALUES
(1, 230, 26, 204, 4044),
(2, 308, 234, 74, 2676),
(3, 166, 91, 75, 132),
(4, 49, 4, 45, 2694),
(5, 104, 61, 43, 3056),
(6, 146, 16, 130, 641),
(7, 364, 11, 353, 4243),
(8, 113, 9, 104, 2392),
(9, 34, 9, 25, 3849),
(10, 314, 52, 262, 3496),
(11, 320, 248, 72, 362),
(12, 39, 18, 21, 4343),
(13, 59, 28, 31, 3002),
(14, 381, 320, 61, 3977),
(15, 234, 42, 192, 4732),
(16, 165, 92, 73, 229),
(17, 347, 97, 250, 1353),
(18, 229, 136, 93, 1443),
(19, 282, 60, 222, 4472),
(20, 391, 196, 195, 304),
(21, 61, 28, 33, 4368),
(22, 265, 51, 214, 4590),
(23, 97, 70, 27, 2147),
(24, 420, 137, 283, 2647),
(25, 360, 34, 326, 1292),
(26, 204, 130, 74, 840),
(27, 132, 28, 104, 3134),
(28, 382, 169, 213, 2551),
(29, 231, 39, 192, 611),
(30, 163, 47, 116, 3481),
(31, 218, 164, 54, 4557),
(32, 184, 35, 149, 2102),
(33, 212, 103, 109, 1486),
(34, 109, 43, 66, 1374),
(35, 172, 114, 58, 3577),
(36, 50, 37, 13, 1637),
(37, 154, 42, 112, 2010),
(38, 36, 17, 19, 3683),
(39, 245, 157, 88, 3329),
(40, 142, 42, 100, 1062),
(41, 319, 289, 30, 3174),
(42, 182, 21, 161, 1485),
(43, 83, 56, 27, 3323),
(44, 398, 95, 303, 3810),
(45, 357, 82, 275, 548),
(46, 158, 137, 21, 3547),
(47, 161, 29, 132, 3909),
(48, 426, 231, 195, 4858),
(49, 394, 111, 283, 1765),
(50, 195, 144, 51, 856),
(51, 24, 6, 18, 1042),
(52, 297, 201, 96, 1637),
(53, 276, 141, 135, 3027),
(54, 176, 129, 47, 1959),
(55, 180, 114, 66, 1808),
(56, 45, 22, 23, 2403),
(57, 141, 43, 98, 150),
(58, 395, 326, 69, 233),
(59, 403, 118, 285, 2903),
(60, 70, 8, 62, 2815),
(61, 228, 205, 23, 888),
(62, 239, 178, 61, 2711),
(63, 303, 207, 96, 1542),
(64, 91, 55, 36, 3638),
(65, 231, 107, 124, 2712),
(66, 78, 40, 38, 634),
(67, 275, 147, 128, 254),
(68, 131, 64, 67, 4418),
(69, 71, 37, 34, 2554),
(70, 46, 11, 35, 3777),
(71, 55, 34, 21, 3387),
(72, 359, 323, 36, 924),
(73, 395, 57, 338, 414),
(74, 59, 31, 28, 2167),
(75, 129, 60, 69, 984),
(76, 337, 240, 97, 4769),
(77, 185, 13, 172, 2649),
(78, 56, 32, 24, 2138),
(79, 196, 174, 22, 4800),
(80, 271, 112, 159, 3748),
(81, 218, 35, 183, 2689),
(82, 404, 55, 349, 1236),
(83, 143, 114, 29, 1117),
(84, 25, 11, 14, 4498),
(85, 209, 153, 56, 1492),
(86, 71, 55, 16, 3491),
(87, 131, 84, 47, 1136),
(88, 193, 169, 24, 2776),
(89, 267, 154, 113, 420),
(90, 345, 85, 260, 1123),
(91, 88, 51, 37, 3180),
(92, 374, 215, 159, 4205),
(93, 345, 87, 258, 4841),
(94, 77, 29, 48, 2415),
(95, 183, 67, 116, 606),
(96, 216, 127, 89, 775),
(97, 188, 81, 107, 1701),
(98, 220, 154, 66, 2004),
(99, 66, 32, 34, 4045),
(100, 65, 36, 29, 4710);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `user_stats`
--
ALTER TABLE `user_stats`
  ADD CONSTRAINT `user_stats_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
