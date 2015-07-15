CREATE TABLE IF NOT EXISTS `#__cwtraffic` (
  `id` int(11) NOT NULL auto_increment,
  `tm` int NOT NULL,
  `ip` varchar(16) NOT NULL DEFAULT '0.0.0.0',
  `country_code` varchar( 10 ) ,
  `country_name` varchar( 50 ) ,
  `city` varchar( 50 ) ,

  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__cwtraffic_whoiswho` (
  `id` int(11) NOT NULL auto_increment,
  `visitors` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `ip` varchar(16) NOT NULL DEFAULT '0.0.0.0',

  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__cwtraffic_total` (
  `tcount` int(11) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
