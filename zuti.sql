/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100128
Source Host           : localhost:3306
Source Database       : zuti

Target Server Type    : MYSQL
Target Server Version : 100128
File Encoding         : 65001

Date: 2018-01-17 08:12:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pocetna
-- ----------------------------
DROP TABLE IF EXISTS `pocetna`;
CREATE TABLE `pocetna` (
  `ID` int(255) NOT NULL,
  `Vozac_JMBG` int(11) DEFAULT NULL,
  `Vozilo_ID` int(11) DEFAULT NULL,
  `Pocetna_adresa` varchar(255) DEFAULT NULL,
  `Odrediste` varchar(255) DEFAULT NULL,
  `Kontakt` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK2` (`Vozac_JMBG`),
  KEY `FK3` (`Vozilo_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vozac
-- ----------------------------
DROP TABLE IF EXISTS `vozac`;
CREATE TABLE `vozac` (
  `JMBG` int(11) NOT NULL,
  `Ime` varchar(255) DEFAULT NULL,
  `Prezime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`JMBG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vozilo
-- ----------------------------
DROP TABLE IF EXISTS `vozilo`;
CREATE TABLE `vozilo` (
  `ID` int(11) NOT NULL,
  `Proizvodjac` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Registracija` varchar(255) DEFAULT NULL,
  `Vozac_JMBG` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK1` (`Vozac_JMBG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
