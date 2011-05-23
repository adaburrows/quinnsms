CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `sms_number` varchar(15) NOT NULL DEFAULT '',
  `passcode` varchar(15) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);
