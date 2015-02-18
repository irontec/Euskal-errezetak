ALTER TABLE `SocialNetworks` ADD `title_eu` varchar(20) NOT NULL  COMMENT '' AFTER `title`;
ALTER TABLE `SocialNetworks` ADD `title_es` varchar(20) NOT NULL  COMMENT '' AFTER `title`;
ALTER TABLE `SocialNetworks` ADD `url_eu` text COMMENT '' AFTER `url`;
ALTER TABLE `SocialNetworks` ADD `url_es` text COMMENT '' AFTER `url`;
ALTER TABLE `StaticPages` ADD `title_eu` varchar(20) NOT NULL  COMMENT '' AFTER `title`;
ALTER TABLE `StaticPages` ADD `title_es` varchar(20) NOT NULL  COMMENT '' AFTER `title`;
ALTER TABLE `StaticPages` ADD `description_eu` text COMMENT '' AFTER `description`;
ALTER TABLE `StaticPages` ADD `description_es` text COMMENT '' AFTER `description`;
