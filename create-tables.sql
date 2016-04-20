--
-- Structure de la table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `from` int(10) NOT NULL,
  `to` int(10) NOT NULL,
  `type` varchar(3) DEFAULT NULL,
  `distance` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour la table `links`
--
ALTER TABLE `links`
 ADD PRIMARY KEY (`from`,`to`), ADD KEY `to` (`to`), ADD KEY `distance` (`distance`);

--
-- Structure de la table `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
`ID` int(10) NOT NULL,
  `url` varchar(264) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `crawled` int(1) NOT NULL DEFAULT '0',
  `clicks` int(3) DEFAULT NULL,
  `http_code` int(3) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `modified` int(15) DEFAULT NULL,
  `md5` varchar(32) DEFAULT NULL,
  `crawl_tag` varchar(32) DEFAULT NULL,
  `html` text
) ENGINE=MyISAM AUTO_INCREMENT=701 DEFAULT CHARSET=latin1;

--
-- Index pour la table `urls`
--
ALTER TABLE `urls`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `url` (`url`), ADD KEY `crawl_tag` (`crawl_tag`);
