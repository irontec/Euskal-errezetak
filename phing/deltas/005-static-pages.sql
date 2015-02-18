CREATE TABLE `StaticPages` (
    `id` mediumint(2) NOT NULL AUTO_INCREMENT,
    `title` varchar(20) NOT NULL COMMENT '[ml]',
    `description` text COMMENT '[ml]',
    `status` varchar(50) DEFAULT NULL COMMENT '[enum:draft|published]',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';