
CREATE TABLE IF NOT EXISTS `data_apis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data_app_id` varchar(100) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `is_haswadl` tinyint(1) NOT NULL,
  `is_hasanalytics` tinyint(1) NOT NULL,
  `analythicsid` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `data_apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `data_auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_api_id` int(11) NOT NULL,
  `data_collection_id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `auth_app` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `data_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(100) NOT NULL,
  `description` text,
  `data_provider_id` int(11) NOT NULL,
  `dbname` varchar(255) NOT NULL,
  `data_app_id` int(11) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`data_app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `data_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `params` text NOT NULL,
  `source_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`source_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `command` text,
  `http_methods` text,
  `data_collection_id` int(11) NOT NULL,
  `method_type_id` int(11) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`data_collection_id`,`method_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `method_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `validation` varchar(255) DEFAULT 'none',
  `is_required` tinyint(1) NOT NULL,
  `expression` text,
  `method_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `method_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `http_methods` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `source_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `init_params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



INSERT INTO `source_types` (`id`, `name`, `description`, `init_params`) VALUES
(1, 'MySQL', 'MySQL Data Source Type', '{\r\n   "host": "",\r\n   "port": "", \r\n   "username": "",\r\n   "password": ""  \r\n} ');



CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '5ecbc92d0624d99a12072c105f924834c6349378', 'admin');


