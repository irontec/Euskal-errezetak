ALTER TABLE `Categories` ADD `imgBaseName` VARCHAR(255) COMMENT '' AFTER `img`;
ALTER TABLE `Categories` ADD `imgMimeType` VARCHAR(80) COMMENT '' AFTER `img`;
ALTER TABLE `Categories` ADD `imgFileSize` INT(11) UNSIGNED COMMENT '[FSO]' AFTER `img`;
ALTER TABLE `Categories` DROP img;
