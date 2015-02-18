CREATE TABLE `SocialNetworks` (
    `id` mediumint(2) NOT NULL AUTO_INCREMENT,
    `title` varchar(20) NOT NULL COMMENT '[ml]',
    `url` text COMMENT '[ml]',
    `status` varchar(50) DEFAULT NULL COMMENT '[enum:draft|published]',
    `icon` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';