-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2016 a las 16:52:19
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beerfans`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `idAdmin` int(11) NOT NULL,
  `adminName` char(64) NOT NULL,
  `adminPassword` char(64) NOT NULL,
  `adminLastConnection` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adminuser`
--

INSERT INTO `adminuser` (`idAdmin`, `adminName`, `adminPassword`, `adminLastConnection`) VALUES
(3, 'admin', '$2y$10$SWMoKfH4qv5.5vTOvds4j.0t3LQx6oKj919EmDWuRzGRVdCPUZiOa', '2016-05-23 12:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannerbeerslider`
--

CREATE TABLE IF NOT EXISTS `bannerbeerslider` (
  `idBannerBeerSlider` int(11) NOT NULL,
  `bannerImage` varchar(450) NOT NULL,
  `idSlider` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannerbeerslider`
--

INSERT INTO `bannerbeerslider` (`idBannerBeerSlider`, `bannerImage`, `idSlider`) VALUES
(1, '20160519130924', 13),
(2, '20160519130933', 13),
(3, '20160519130942', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannersliderhome`
--

CREATE TABLE IF NOT EXISTS `bannersliderhome` (
  `idBannerSliderHome` int(11) NOT NULL,
  `bannerSliderHomeImage` varchar(450) NOT NULL,
  `bannerSliderHomeUrl` varchar(450) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannersliderhome`
--

INSERT INTO `bannersliderhome` (`idBannerSliderHome`, `bannerSliderHomeImage`, `bannerSliderHomeUrl`) VALUES
(1, '20160519131045', 'example@example.com'),
(2, '20160519131053', 'example@example.com'),
(3, '20160519131118', 'example@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannerslidernew`
--

CREATE TABLE IF NOT EXISTS `bannerslidernew` (
  `idBannerSliderNew` int(11) NOT NULL,
  `bannerSliderNewTitle` varchar(45) NOT NULL,
  `bannerSliderNewSubtitle` varchar(45) NOT NULL,
  `bannerSliderNewDescription` varchar(450) NOT NULL,
  `bannerSliderNewUrl` varchar(450) NOT NULL,
  `bannerSliderNewImage` varchar(450) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannerslidernew`
--

INSERT INTO `bannerslidernew` (`idBannerSliderNew`, `bannerSliderNewTitle`, `bannerSliderNewSubtitle`, `bannerSliderNewDescription`, `bannerSliderNewUrl`, `bannerSliderNewImage`) VALUES
(1, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', '20160519131129'),
(2, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', '20160519131139');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannersliderpost`
--

CREATE TABLE IF NOT EXISTS `bannersliderpost` (
  `idBannerSliderPost` int(11) NOT NULL,
  `bannerSliderPostTitle` varchar(45) NOT NULL,
  `bannerSliderPostSubtitle` varchar(45) NOT NULL,
  `bannerSliderPostDescription` varchar(450) NOT NULL,
  `bannerSliderPostUrl` varchar(450) NOT NULL,
  `bannerSliderPostImage` varchar(450) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bannersliderpost`
--

INSERT INTO `bannersliderpost` (`idBannerSliderPost`, `bannerSliderPostTitle`, `bannerSliderPostSubtitle`, `bannerSliderPostDescription`, `bannerSliderPostUrl`, `bannerSliderPostImage`) VALUES
(1, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', '20160519131148'),
(2, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', '20160519131200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beer`
--

CREATE TABLE IF NOT EXISTS `beer` (
  `idBeer` int(11) NOT NULL,
  `beerName` varchar(45) NOT NULL,
  `beerDescription` varchar(560) NOT NULL,
  `beerStrength` varchar(45) NOT NULL,
  `beerIBUS` varchar(45) NOT NULL,
  `beerProfileImage` varchar(450) NOT NULL,
  `beerCoverImage` varchar(450) NOT NULL,
  `beerBottleImage` varchar(450) NOT NULL,
  `beerSite` varchar(450) DEFAULT NULL,
  `beerFacebook` varchar(450) DEFAULT NULL,
  `beerTwitter` varchar(450) DEFAULT NULL,
  `beerInstagram` varchar(450) DEFAULT NULL,
  `idProducer` int(11) NOT NULL,
  `idSlider` int(11) NOT NULL,
  `idBeerType` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `beer`
--

INSERT INTO `beer` (`idBeer`, `beerName`, `beerDescription`, `beerStrength`, `beerIBUS`, `beerProfileImage`, `beerCoverImage`, `beerBottleImage`, `beerSite`, `beerFacebook`, `beerTwitter`, `beerInstagram`, `idProducer`, `idSlider`, `idBeerType`) VALUES
(1, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', '20160519130904', '20160519130904', '20160519130904', 'example@example.com', '', '', '', 1, 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beerslider`
--

CREATE TABLE IF NOT EXISTS `beerslider` (
  `idSlider` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `beerslider`
--

INSERT INTO `beerslider` (`idSlider`) VALUES
(1),
(3),
(5),
(9),
(11),
(12),
(13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beertype`
--

CREATE TABLE IF NOT EXISTS `beertype` (
  `idBeerType` int(11) NOT NULL,
  `beerTypeName` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `beertype`
--

INSERT INTO `beertype` (`idBeerType`, `beerTypeName`) VALUES
(1, 'latitude'),
(2, 'example@example.com'),
(3, 'es'),
(4, 'ess'),
(5, 'ee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `idChat` int(11) NOT NULL,
  `inbox_idInbox` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name_city` varchar(150) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name_city`, `state_id`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(4) NOT NULL,
  `name_c` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name_c`) VALUES
(1, 'MX', 'MÃ©xico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoriteelement`
--

CREATE TABLE IF NOT EXISTS `favoriteelement` (
  `idFavoriteElement` int(11) NOT NULL,
  `idFavoritesList` int(11) NOT NULL,
  `idBeer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoriteslist`
--

CREATE TABLE IF NOT EXISTS `favoriteslist` (
  `idFavoritesList` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoriteslist`
--

INSERT INTO `favoriteslist` (`idFavoritesList`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `idInbox` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inbox`
--

INSERT INTO `inbox` (`idInbox`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(11) NOT NULL,
  `messageText` varchar(540) NOT NULL,
  `messageDate` datetime NOT NULL,
  `messageStatus` tinyint(1) NOT NULL,
  `chat_idChat` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postelement`
--

CREATE TABLE IF NOT EXISTS `postelement` (
  `idPostElement` int(11) NOT NULL,
  `postElementComment` varchar(550) NOT NULL,
  `postElementDate` datetime NOT NULL,
  `idPublicMessagesList` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producer`
--

CREATE TABLE IF NOT EXISTS `producer` (
  `idProducer` int(11) NOT NULL,
  `producerName` varchar(45) NOT NULL,
  `producerDescription` varchar(560) NOT NULL,
  `producerAddress` varchar(150) NOT NULL,
  `producerZip` varchar(8) NOT NULL,
  `producerPhone` varchar(20) NOT NULL,
  `producerEmail` varchar(45) NOT NULL,
  `producerProfileImage` varchar(450) NOT NULL,
  `producerCoverImage` varchar(450) NOT NULL,
  `producerSite` varchar(450) DEFAULT NULL,
  `producerFacebook` varchar(450) DEFAULT NULL,
  `producerTwitter` varchar(450) DEFAULT NULL,
  `producerInstagram` varchar(450) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `idProducerType` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producer`
--

INSERT INTO `producer` (`idProducer`, `producerName`, `producerDescription`, `producerAddress`, `producerZip`, `producerPhone`, `producerEmail`, `producerProfileImage`, `producerCoverImage`, `producerSite`, `producerFacebook`, `producerTwitter`, `producerInstagram`, `country_id`, `state_id`, `idProducerType`) VALUES
(1, 'example@example.com', 'example@example.com', 'example@example.com', '9', '13', 'example@example.com', '20160519130826', '20160519130826', 'example@example.com', '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producertype`
--

CREATE TABLE IF NOT EXISTS `producertype` (
  `idProducerType` int(11) NOT NULL,
  `producerTypeName` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producertype`
--

INSERT INTO `producertype` (`idProducerType`, `producerTypeName`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicmessageslist`
--

CREATE TABLE IF NOT EXISTS `publicmessageslist` (
  `idPublicMessagesList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicmessageslist`
--

INSERT INTO `publicmessageslist` (`idPublicMessagesList`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankslist`
--

CREATE TABLE IF NOT EXISTS `rankslist` (
  `idRanksList` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rankslist`
--

INSERT INTO `rankslist` (`idRanksList`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankslistelement`
--

CREATE TABLE IF NOT EXISTS `rankslistelement` (
  `idRanksListElement` int(11) NOT NULL,
  `idBeer` int(11) NOT NULL,
  `ranksListElementRank` double NOT NULL,
  `idRanksList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rawmaterial`
--

CREATE TABLE IF NOT EXISTS `rawmaterial` (
  `idRawMaterial` int(11) NOT NULL,
  `rawMaterialName` varchar(45) NOT NULL,
  `rawMaterialGeneralDescription` varchar(560) NOT NULL,
  `rawMaterialDescription` varchar(560) NOT NULL,
  `rawMaterialDescriptionHTML` varchar(1260) NOT NULL,
  `rawMaterialLatitude` varchar(45) DEFAULT NULL,
  `rawMaterialLongitude` varchar(45) DEFAULT NULL,
  `rawMaterialAddress` varchar(150) NOT NULL,
  `rawMaterialZip` varchar(8) NOT NULL,
  `rawMaterialPhone` varchar(20) NOT NULL,
  `rawMaterialEmail` varchar(45) NOT NULL,
  `rawMaterialProfileImage` varchar(450) NOT NULL,
  `rawMaterialCoverImage` varchar(450) NOT NULL,
  `rawMaterialSite` varchar(450) DEFAULT NULL,
  `rawMaterialFacebook` varchar(450) DEFAULT NULL,
  `rawMaterialTwitter` varchar(450) DEFAULT NULL,
  `rawMaterialInstagram` varchar(450) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rawmaterial`
--

INSERT INTO `rawmaterial` (`idRawMaterial`, `rawMaterialName`, `rawMaterialGeneralDescription`, `rawMaterialDescription`, `rawMaterialDescriptionHTML`, `rawMaterialLatitude`, `rawMaterialLongitude`, `rawMaterialAddress`, `rawMaterialZip`, `rawMaterialPhone`, `rawMaterialEmail`, `rawMaterialProfileImage`, `rawMaterialCoverImage`, `rawMaterialSite`, `rawMaterialFacebook`, `rawMaterialTwitter`, `rawMaterialInstagram`) VALUES
(1, 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', 'example@example.com', 'example@', 'example@example.com', 'example@example.com', '20160519131023', '20160519131023', 'example@example.com', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rawmaterialtype`
--

CREATE TABLE IF NOT EXISTS `rawmaterialtype` (
  `idDrawMaterialType` int(11) NOT NULL,
  `rawMaterialTypeName` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rawmaterialtype`
--

INSERT INTO `rawmaterialtype` (`idDrawMaterialType`, `rawMaterialTypeName`) VALUES
(10, 'rawmaterial'),
(11, 'okey'),
(12, 'es'),
(13, 'ee'),
(14, 'eses'),
(15, 'e'),
(16, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rawmaterial_has_rawmaterialtype`
--

CREATE TABLE IF NOT EXISTS `rawmaterial_has_rawmaterialtype` (
  `idRawMaterial` int(11) NOT NULL,
  `idDrawMaterialType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rawmaterial_has_rawmaterialtype`
--

INSERT INTO `rawmaterial_has_rawmaterialtype` (`idRawMaterial`, `idDrawMaterialType`) VALUES
(1, 12),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `name_s` varchar(150) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name_s`, `country_id`) VALUES
(1, 'Jalisco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL,
  `registrationDate` date NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userLastName` varchar(145) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userDescription` varchar(45) DEFAULT NULL,
  `userProfileImage` varchar(450) NOT NULL,
  `userCoverImage` varchar(450) NOT NULL,
  `userEmail` varchar(245) NOT NULL,
  `userPassword` varchar(45) NOT NULL,
  `userStatus` tinyint(1) NOT NULL,
  `userConnection` tinyint(1) NOT NULL,
  `userExp` float NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `idFavoritesList` int(11) NOT NULL,
  `idWishList` int(11) NOT NULL,
  `idRanksList` int(11) NOT NULL,
  `idPublicMessagesList` int(11) NOT NULL,
  `idInbox` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `registrationDate`, `userName`, `userLastName`, `userBirthDate`, `userDescription`, `userProfileImage`, `userCoverImage`, `userEmail`, `userPassword`, `userStatus`, `userConnection`, `userExp`, `country_id`, `state_id`, `city_id`, `idFavoritesList`, `idWishList`, `idRanksList`, `idPublicMessagesList`, `idInbox`) VALUES
(1, '2016-05-01', 'name', 'last name', '2016-05-10', '1', '1', '1', 'email@email.com', '1', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `idWishList` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`idWishList`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlistelement`
--

CREATE TABLE IF NOT EXISTS `wishlistelement` (
  `idWishListElement` int(11) NOT NULL,
  `idWishList` int(11) NOT NULL,
  `idBeer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `bannerbeerslider`
--
ALTER TABLE `bannerbeerslider`
  ADD PRIMARY KEY (`idBannerBeerSlider`,`idSlider`),
  ADD KEY `fk_bannerBeerSlider_beerSlider1_idx` (`idSlider`);

--
-- Indices de la tabla `bannersliderhome`
--
ALTER TABLE `bannersliderhome`
  ADD PRIMARY KEY (`idBannerSliderHome`);

--
-- Indices de la tabla `bannerslidernew`
--
ALTER TABLE `bannerslidernew`
  ADD PRIMARY KEY (`idBannerSliderNew`);

--
-- Indices de la tabla `bannersliderpost`
--
ALTER TABLE `bannersliderpost`
  ADD PRIMARY KEY (`idBannerSliderPost`);

--
-- Indices de la tabla `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`idBeer`,`idProducer`,`idSlider`,`idBeerType`),
  ADD KEY `fk_beer_producer_idx` (`idProducer`),
  ADD KEY `fk_beer_beerSlider1_idx` (`idSlider`),
  ADD KEY `fk_beer_beerType1_idx` (`idBeerType`);

--
-- Indices de la tabla `beerslider`
--
ALTER TABLE `beerslider`
  ADD PRIMARY KEY (`idSlider`);

--
-- Indices de la tabla `beertype`
--
ALTER TABLE `beertype`
  ADD PRIMARY KEY (`idBeerType`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idChat`,`inbox_idInbox`,`user_idUser`),
  ADD KEY `fk_chat_inbox1_idx` (`inbox_idInbox`),
  ADD KEY `fk_chat_user1_idx` (`user_idUser`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`,`state_id`),
  ADD KEY `fk_cities_states1_idx` (`state_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoriteelement`
--
ALTER TABLE `favoriteelement`
  ADD PRIMARY KEY (`idFavoriteElement`,`idFavoritesList`,`idBeer`),
  ADD KEY `fk_favoriteElement_favoritesList1_idx` (`idFavoritesList`),
  ADD KEY `fk_favoriteElement_beer1_idx` (`idBeer`);

--
-- Indices de la tabla `favoriteslist`
--
ALTER TABLE `favoriteslist`
  ADD PRIMARY KEY (`idFavoritesList`);

--
-- Indices de la tabla `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`idInbox`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`,`chat_idChat`,`user_idUser`),
  ADD KEY `fk_message_chat1_idx` (`chat_idChat`),
  ADD KEY `fk_message_user1_idx` (`user_idUser`);

--
-- Indices de la tabla `postelement`
--
ALTER TABLE `postelement`
  ADD PRIMARY KEY (`idPostElement`,`idPublicMessagesList`,`idUser`),
  ADD KEY `fk_postElement_publicMessagesList1_idx` (`idPublicMessagesList`),
  ADD KEY `fk_postElement_user1_idx` (`idUser`);

--
-- Indices de la tabla `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`idProducer`,`country_id`,`state_id`,`idProducerType`),
  ADD KEY `fk_producer_countries1_idx` (`country_id`),
  ADD KEY `fk_producer_states1_idx` (`state_id`),
  ADD KEY `fk_producer_producerType1_idx` (`idProducerType`);

--
-- Indices de la tabla `producertype`
--
ALTER TABLE `producertype`
  ADD PRIMARY KEY (`idProducerType`);

--
-- Indices de la tabla `publicmessageslist`
--
ALTER TABLE `publicmessageslist`
  ADD PRIMARY KEY (`idPublicMessagesList`);

--
-- Indices de la tabla `rankslist`
--
ALTER TABLE `rankslist`
  ADD PRIMARY KEY (`idRanksList`);

--
-- Indices de la tabla `rankslistelement`
--
ALTER TABLE `rankslistelement`
  ADD PRIMARY KEY (`idRanksListElement`,`idBeer`,`idRanksList`),
  ADD KEY `fk_ranksListElement_beer1_idx` (`idBeer`),
  ADD KEY `fk_ranksListElement_ranksList1_idx` (`idRanksList`);

--
-- Indices de la tabla `rawmaterial`
--
ALTER TABLE `rawmaterial`
  ADD PRIMARY KEY (`idRawMaterial`);

--
-- Indices de la tabla `rawmaterialtype`
--
ALTER TABLE `rawmaterialtype`
  ADD PRIMARY KEY (`idDrawMaterialType`);

--
-- Indices de la tabla `rawmaterial_has_rawmaterialtype`
--
ALTER TABLE `rawmaterial_has_rawmaterialtype`
  ADD PRIMARY KEY (`idRawMaterial`,`idDrawMaterialType`),
  ADD KEY `fk_rawMaterial_has_rawMaterialType_rawMaterialType1_idx` (`idDrawMaterialType`),
  ADD KEY `fk_rawMaterial_has_rawMaterialType_rawMaterial1_idx` (`idRawMaterial`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`,`country_id`),
  ADD KEY `fk_states_countries1_idx` (`country_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`,`country_id`,`state_id`,`city_id`,`idFavoritesList`,`idWishList`,`idRanksList`,`idPublicMessagesList`,`idInbox`),
  ADD KEY `fk_user_countries1_idx` (`country_id`),
  ADD KEY `fk_user_cities1_idx` (`city_id`),
  ADD KEY `fk_user_states1_idx` (`state_id`),
  ADD KEY `fk_user_favoritesList1_idx` (`idFavoritesList`),
  ADD KEY `fk_user_wishList1_idx` (`idWishList`),
  ADD KEY `fk_user_ranksList1_idx` (`idRanksList`),
  ADD KEY `fk_user_publicMessagesList1_idx` (`idPublicMessagesList`),
  ADD KEY `fk_user_inbox1_idx` (`idInbox`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idWishList`);

--
-- Indices de la tabla `wishlistelement`
--
ALTER TABLE `wishlistelement`
  ADD PRIMARY KEY (`idWishListElement`,`idWishList`,`idBeer`),
  ADD KEY `fk_wishListElement_beer1_idx` (`idBeer`),
  ADD KEY `fk_wishListElement_wishList1_idx` (`idWishList`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `bannerbeerslider`
--
ALTER TABLE `bannerbeerslider`
  MODIFY `idBannerBeerSlider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `bannersliderhome`
--
ALTER TABLE `bannersliderhome`
  MODIFY `idBannerSliderHome` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `bannerslidernew`
--
ALTER TABLE `bannerslidernew`
  MODIFY `idBannerSliderNew` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bannersliderpost`
--
ALTER TABLE `bannersliderpost`
  MODIFY `idBannerSliderPost` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `beer`
--
ALTER TABLE `beer`
  MODIFY `idBeer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `beerslider`
--
ALTER TABLE `beerslider`
  MODIFY `idSlider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `beertype`
--
ALTER TABLE `beertype`
  MODIFY `idBeerType` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `favoriteelement`
--
ALTER TABLE `favoriteelement`
  MODIFY `idFavoriteElement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `favoriteslist`
--
ALTER TABLE `favoriteslist`
  MODIFY `idFavoritesList` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `postelement`
--
ALTER TABLE `postelement`
  MODIFY `idPostElement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producer`
--
ALTER TABLE `producer`
  MODIFY `idProducer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `producertype`
--
ALTER TABLE `producertype`
  MODIFY `idProducerType` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rankslist`
--
ALTER TABLE `rankslist`
  MODIFY `idRanksList` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rankslistelement`
--
ALTER TABLE `rankslistelement`
  MODIFY `idRanksListElement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rawmaterial`
--
ALTER TABLE `rawmaterial`
  MODIFY `idRawMaterial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rawmaterialtype`
--
ALTER TABLE `rawmaterialtype`
  MODIFY `idDrawMaterialType` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `idWishList` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `wishlistelement`
--
ALTER TABLE `wishlistelement`
  MODIFY `idWishListElement` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bannerbeerslider`
--
ALTER TABLE `bannerbeerslider`
  ADD CONSTRAINT `fk_bannerBeerSlider_beerSlider1` FOREIGN KEY (`idSlider`) REFERENCES `beerslider` (`idSlider`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `beer`
--
ALTER TABLE `beer`
  ADD CONSTRAINT `fk_beer_beerSlider1` FOREIGN KEY (`idSlider`) REFERENCES `beerslider` (`idSlider`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beer_beerType1` FOREIGN KEY (`idBeerType`) REFERENCES `beertype` (`idBeerType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beer_producer` FOREIGN KEY (`idProducer`) REFERENCES `producer` (`idProducer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_inbox1` FOREIGN KEY (`inbox_idInbox`) REFERENCES `inbox` (`idInbox`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chat_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favoriteelement`
--
ALTER TABLE `favoriteelement`
  ADD CONSTRAINT `fk_favoriteElement_beer1` FOREIGN KEY (`idBeer`) REFERENCES `beer` (`idBeer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_favoriteElement_favoritesList1` FOREIGN KEY (`idFavoritesList`) REFERENCES `favoriteslist` (`idFavoritesList`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_chat1` FOREIGN KEY (`chat_idChat`) REFERENCES `chat` (`idChat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `postelement`
--
ALTER TABLE `postelement`
  ADD CONSTRAINT `fk_postElement_publicMessagesList1` FOREIGN KEY (`idPublicMessagesList`) REFERENCES `publicmessageslist` (`idPublicMessagesList`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_postElement_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `fk_producer_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producer_producerType1` FOREIGN KEY (`idProducerType`) REFERENCES `producertype` (`idProducerType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producer_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rankslistelement`
--
ALTER TABLE `rankslistelement`
  ADD CONSTRAINT `fk_ranksListElement_beer1` FOREIGN KEY (`idBeer`) REFERENCES `beer` (`idBeer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ranksListElement_ranksList1` FOREIGN KEY (`idRanksList`) REFERENCES `rankslist` (`idRanksList`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rawmaterial_has_rawmaterialtype`
--
ALTER TABLE `rawmaterial_has_rawmaterialtype`
  ADD CONSTRAINT `fk_rawMaterial_has_rawMaterialType_rawMaterial1` FOREIGN KEY (`idRawMaterial`) REFERENCES `rawmaterial` (`idRawMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rawMaterial_has_rawMaterialType_rawMaterialType1` FOREIGN KEY (`idDrawMaterialType`) REFERENCES `rawmaterialtype` (`idDrawMaterialType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `fk_states_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_cities1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_favoritesList1` FOREIGN KEY (`idFavoritesList`) REFERENCES `favoriteslist` (`idFavoritesList`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_inbox1` FOREIGN KEY (`idInbox`) REFERENCES `inbox` (`idInbox`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_publicMessagesList1` FOREIGN KEY (`idPublicMessagesList`) REFERENCES `publicmessageslist` (`idPublicMessagesList`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_ranksList1` FOREIGN KEY (`idRanksList`) REFERENCES `rankslist` (`idRanksList`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_wishList1` FOREIGN KEY (`idWishList`) REFERENCES `wishlist` (`idWishList`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `wishlistelement`
--
ALTER TABLE `wishlistelement`
  ADD CONSTRAINT `fk_wishListElement_beer1` FOREIGN KEY (`idBeer`) REFERENCES `beer` (`idBeer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_wishListElement_wishList1` FOREIGN KEY (`idWishList`) REFERENCES `wishlist` (`idWishList`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
