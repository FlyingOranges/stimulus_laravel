DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` int(11) NOT NULL COMMENT '封面',
  `title` varchar(20) NOT NULL COMMENT '文章标题',
  `intr` varchar(255) NOT NULL COMMENT '简介',
  `conent` text NOT NULL COMMENT '文章内容',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

INSERT INTO `article` (`id`, `cover`, `title`, `intr`, `conent`, `created_at`, `updated_at`, `status`)
VALUES
	(1,5,'夏日搭配哪家强','你不会真的以为我要做个打扮指南吧','<p>无论是谁，无论在哪里都能够简单的使用电子邮件，电子钱包，情报搜索之类的公共服务，一个与现实一样的假想都市被建成，并且被普及到世界的各个角落。主人公小矶健二是个性格内向的理科男生，暑假期间被自己仰慕的前辈筱原夏希拖去了她的老家长野县上田市。那里住着从室町时代开始一直存在的战国一家，阵内家。以夏希90岁的曾祖母为首，医生，渔民，消防员，水道管理员，电器店老板，警察，自卫队的军官，小学生直到婴儿，各行各业的亲戚都有。在这个热闹的田舍度过的暑假，健二看见了阵内家的活跃与和睦。一天夜里，健二受到了一封可疑的数学智力竞赛的邮件忍不住好奇心通宵将其解答。但是他却不知道这将是引起一场大灾难。</p>',1533606233,1533606233,1),
	(2,6,'你喜欢大海，我爱过你','阚清子和纪凌尘不得不说的故事','<p>无论是谁，无论在哪里都能够简单的使用电子邮件，电子钱包，情报搜索之类的公共服务，一个与现实一样的假想都市被建成，并且被普及到世界的各个角落。主人公小矶健二是个性格内向的理科男生，暑假期间被自己仰慕的前辈筱原夏希拖去了她的老家长野县上田市。那里住着从室町时代开始一直存在的战国一家，阵内家。以夏希90岁的曾祖母为首，医生，渔民，消防员，水道管理员，电器店老板，警察，自卫队的军官，小学生直到婴儿，各行各业的亲戚都有。在这个热闹的田舍度过的暑假，健二看见了阵内家的活跃与和睦。一天夜里，健二受到了一封可疑的数学智力竞赛的邮件忍不住好奇心通宵将其解答。但是他却不知道这将是引起一场大灾难。</p>',1533606233,1533606233,1),
	(3,7,'幸福就是如此简单','能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？','<p>无论是谁，无论在哪里都能够简单的使用电子邮件，电子钱包，情报搜索之类的公共服务，一个与现实一样的假想都市被建成，并且被普及到世界的各个角落。主人公小矶健二是个性格内向的理科男生，暑假期间被自己仰慕的前辈筱原夏希拖去了她的老家长野县上田市。那里住着从室町时代开始一直存在的战国一家，阵内家。以夏希90岁的曾祖母为首，医生，渔民，消防员，水道管理员，电器店老板，警察，自卫队的军官，小学生直到婴儿，各行各业的亲戚都有。在这个热闹的田舍度过的暑假，健二看见了阵内家的活跃与和睦。一天夜里，健二受到了一封可疑的数学智力竞赛的邮件忍不住好奇心通宵将其解答。但是他却不知道这将是引起一场大灾难。</p>',1533606233,1533606233,1),
	(4,8,'CBD天气简直是要热死人','烤炉模式的城，到黄昏，如同打翻的调色盘一般.','<p>无论是谁，无论在哪里都能够简单的使用电子邮件，电子钱包，情报搜索之类的公共服务，一个与现实一样的假想都市被建成，并且被普及到世界的各个角落。主人公小矶健二是个性格内向的理科男生，暑假期间被自己仰慕的前辈筱原夏希拖去了她的老家长野县上田市。那里住着从室町时代开始一直存在的战国一家，阵内家。以夏希90岁的曾祖母为首，医生，渔民，消防员，水道管理员，电器店老板，警察，自卫队的军官，小学生直到婴儿，各行各业的亲戚都有。在这个热闹的田舍度过的暑假，健二看见了阵内家的活跃与和睦。一天夜里，健二受到了一封可疑的数学智力竞赛的邮件忍不住好奇心通宵将其解答。但是他却不知道这将是引起一场大灾难。</p>',1533606233,1534314490,1),
	(5,9,'烟火里的尘埃','只有我，守着安静的沙漠，等待着花开','<p>无论是谁，无论在哪里都能够简单的使用电子邮件，电子钱包，情报搜索之类的公共服务，一个与现实一样的假想都市被建成，并且被普及到世界的各个角落。主人公小矶健二是个性格内向的理科男生，暑假期间被自己仰慕的前辈筱原夏希拖去了她的老家长野县上田市。那里住着从室町时代开始一直存在的战国一家，阵内家。以夏希90岁的曾祖母为首，医生，渔民，消防员，水道管理员，电器店老板，警察，自卫队的军官，小学生直到婴儿，各行各业的亲戚都有。在这个热闹的田舍度过的暑假，健二看见了阵内家的活跃与和睦。一天夜里，健二受到了一封可疑的数学智力竞赛的邮件忍不住好奇心通宵将其解答。但是他却不知道这将是引起一场大灾难。</p>',1533606233,1533606233,1),
	(6,26,'按暗恋最是煎熬','山有木兮木有枝，心悦君兮君不知','<p style=\"text-align: left;\"><span style=\"font-weight: bold;\">山有木兮 木有枝叶 心悦君兮 君不知</span></p><p><img src=\"http://dev.ciji.c/uploadFile/image/4bce07b058e81b3c15f6073d544244fd5.png\" style=\"max-width:100%;\"><br></p><p><br></p>',1534302014,1534317653,1);

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '轮播图标题',
  `link` varchar(255) DEFAULT NULL COMMENT '指向地址',
  `src` int(11) DEFAULT '1' COMMENT '图片指向地址',
  `status` int(1) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='轮播图表';

INSERT INTO `banners` (`id`, `title`, `link`, `src`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'12321312321321','范德萨范德萨发生大发啊发范德萨发的萨法撒',27,1,1533606233,1534314538),
	(2,'我不曾爱过你，我自己骗自己','为你写的信，又被我丢进海里',2,1,1533606233,1533606233),
	(3,'我不曾爱过你，我自己骗自己','为你写的信，又被我丢进海里',3,1,1533606233,1533606233),
	(4,'我不曾爱过你，我自己骗自己','为你写的信，又被我丢进海里',4,1,1533606233,1533606233),
	(5,'我不曾爱过你，我自己骗自己','为你写的信，又被我丢进海里',10,1,1533606234,1533606233),
	(6,'新的标题','http://www.baidu.com',28,1,1534144051,1534314642);

DROP TABLE IF EXISTS `ltm_translations`;

CREATE TABLE `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`)
VALUES
	(1,0,'zh','views','slug',NULL,'2018-08-13 11:43:49','2018-08-13 11:43:49'),
	(2,0,'zh','views','name',NULL,'2018-08-13 11:44:33','2018-08-13 11:44:33'),
	(3,0,'zh','banner','sex',NULL,'2018-08-13 11:44:33','2018-08-13 11:44:33'),
	(4,0,'zh','views','age',NULL,'2018-08-13 11:44:33','2018-08-13 11:44:33'),
	(5,0,'zh','banner','age',NULL,'2018-08-13 11:45:20','2018-08-13 11:45:20'),
	(6,0,'zh','views','src',NULL,'2018-08-13 11:50:39','2018-08-13 11:50:39'),
	(7,0,'zh','banner','created_at',NULL,'2018-08-14 08:31:39','2018-08-14 08:31:39'),
	(8,0,'zh','banner','updated_at',NULL,'2018-08-14 08:31:47','2018-08-14 08:31:47'),
	(9,0,'zh','article','title',NULL,'2018-08-14 10:17:37','2018-08-14 10:17:37'),
	(10,0,'zh','articles','viewList',NULL,'2018-08-15 08:29:19','2018-08-15 08:29:19'),
	(11,0,'zh','articles','name',NULL,'2018-08-15 08:31:30','2018-08-15 08:31:30'),
	(12,0,'zh','articles','intr',NULL,'2018-08-15 08:32:58','2018-08-15 08:32:58'),
	(13,0,'zh','aritcles','cover',NULL,'2018-08-15 08:33:46','2018-08-15 08:33:46'),
	(14,0,'zh','validation','custom.password.required',NULL,'2018-08-15 13:41:09','2018-08-15 13:41:09'),
	(15,0,'zh','common','created_at',NULL,'2018-08-15 13:57:10','2018-08-15 13:57:10'),
	(16,0,'zh','common','updated_at',NULL,'2018-08-15 13:57:10','2018-08-15 13:57:10'),
	(17,0,'zh','banner','cover',NULL,'2018-08-15 14:11:27','2018-08-15 14:11:27');

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '菜单关系',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '图标',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单对应的权限',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '菜单链接地址',
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单高亮地址',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `pid`, `name`, `icon`, `slug`, `url`, `active`, `description`, `sort`, `created_at`, `updated_at`)
VALUES
	(1,0,'控制台','fa fa-dashboard','homecontroller.index','admin','admin','后台首页',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(2,0,'系统管理','fa fa-cog','system.manage','','admin/role*,admin/permission*,admin/user*,admin/menu*','系统功能管理',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(3,2,'用户管理','fa fa-users','usercontroller.index','admin/user','admin/user*','显示用户管理',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(4,2,'角色管理','fa fa-male','rolecontroller.index','admin/role','admin/role*','显示角色管理',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(5,2,'权限管理','fa fa-paper-plane','permissioncontroller.index','admin/permission','admin/permission*','显示权限管理',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(6,2,'菜单管理','fa fa-navicon','menucontroller.index','admin/menu','admin/menu*','显示菜单管理',0,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(7,0,'前端管理','fa fa-dashboard','bannerscontroller.index','admin','admin/banners*,admin/articles*','轮播管理一级菜单',0,'2018-08-13 11:02:02','2018-08-14 10:16:16'),
	(8,7,'轮播图列表','fa fa-navicon','bannerscontroller.index','admin/banners','admin/banners*','查看轮播图',0,'2018-08-13 11:03:18','2018-08-13 11:11:11'),
	(9,7,'文章管理','fa fa-navicon','articlescontroller.index','admin/articles','admin/articles*','文章管理信息',0,'2018-08-14 10:08:05','2018-08-14 10:15:47');

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_04_02_193005_create_translations_table',1),
	(2,'2014_10_12_000000_create_users_table',1),
	(3,'2014_10_12_100000_create_password_resets_table',1),
	(4,'2015_01_15_105324_create_roles_table',1),
	(5,'2015_01_15_114412_create_role_user_table',1),
	(6,'2015_01_26_115212_create_permissions_table',1),
	(7,'2015_01_26_115523_create_permission_role_table',1),
	(8,'2015_02_09_132439_create_permission_user_table',1),
	(9,'2017_11_06_074112_create_menus_table',1),
	(10,'2017_11_06_080846_create_settings_table',1);

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(2,2,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(3,3,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(4,4,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(5,5,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(6,6,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(7,7,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(8,8,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(9,9,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(10,10,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(11,11,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(12,12,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(13,13,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(14,14,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(15,15,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(16,16,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(17,17,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(18,18,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(19,19,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(20,20,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(21,21,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(22,22,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(23,23,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(24,24,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(25,25,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(26,26,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(27,27,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(28,28,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(29,29,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(30,30,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(31,31,1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(32,31,2,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(33,32,1,'2018-08-13 11:02:03','2018-08-13 11:02:03'),
	(34,33,1,'2018-08-13 11:05:07','2018-08-13 11:05:07'),
	(35,34,1,'2018-08-13 11:38:55','2018-08-13 11:38:55'),
	(37,36,1,'2018-08-13 11:50:58','2018-08-13 11:50:58'),
	(38,37,1,'2018-08-14 08:38:05','2018-08-14 08:38:05'),
	(39,38,1,'2018-08-14 08:44:52','2018-08-14 08:44:52'),
	(40,39,1,'2018-08-14 09:20:55','2018-08-14 09:20:55'),
	(41,40,1,'2018-08-14 10:08:11','2018-08-14 10:08:11'),
	(42,41,1,'2018-08-14 10:18:24','2018-08-14 10:18:24'),
	(43,42,1,'2018-08-14 10:22:05','2018-08-14 10:22:05'),
	(44,43,1,'2018-08-15 08:56:24','2018-08-15 08:56:24'),
	(45,44,1,'2018-08-15 09:31:32','2018-08-15 09:31:32'),
	(46,45,1,'2018-08-15 11:00:40','2018-08-15 11:00:40'),
	(47,46,1,'2018-08-15 14:14:30','2018-08-15 14:14:30'),
	(48,47,1,'2018-08-15 14:28:10','2018-08-15 14:28:10');

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`)
VALUES
	(1,'系统管理','system.manage','系统管理',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(2,'后台语言切换','settingcontroller.language','后台语言切换',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(3,'显示菜单列表','menucontroller.index','显示菜单列表',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(4,'创建菜单','menucontroller.create','创建菜单',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(5,'创建菜单视图','menucontroller.store','创建菜单视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(6,'删除菜单','menucontroller.destroy','删除菜单',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(7,'修改菜单视图','menucontroller.edit','修改菜单视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(8,'修改菜单','menucontroller.update','修改菜单',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(9,'查看菜单','menucontroller.show','查看菜单',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(10,'清除菜单缓存','menucontroller.cacheclear','清除菜单缓存',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(11,'显示角色列表','rolecontroller.index','显示角色列表',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(12,'创建角色视图','rolecontroller.create','创建角色视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(13,'创建角色','rolecontroller.store','创建角色',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(14,'删除角色','rolecontroller.destroy','删除角色',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(15,'修改角色视图','rolecontroller.edit','修改角色视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(16,'修改角色','rolecontroller.update','修改角色',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(17,'查看角色权限','rolecontroller.show','查看角色权限',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(18,'显示权限列表','permissioncontroller.index','显示权限列表',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(19,'创建权限视图','permissioncontroller.create','创建权限视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(20,'创建权限','permissioncontroller.store','创建权限',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(21,'删除权限','permissioncontroller.destroy','删除权限',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(22,'修改权限视图','permissioncontroller.edit','修改权限视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(23,'修改权限','permissioncontroller.update','修改权限',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(24,'显示用户列表','usercontroller.index','显示用户列表',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(25,'创建用户视图','usercontroller.create','创建用户视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(26,'创建用户','usercontroller.store','创建用户',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(27,'修改用户视图','usercontroller.edit','修改用户视图',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(28,'修改用户','usercontroller.update','修改用户',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(29,'删除用户','usercontroller.destroy','删除用户',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(30,'查看用户信息','usercontroller.show','查看用户信息',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(31,'后台首页','homecontroller.index','后台首页',NULL,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(32,'轮播图列表','bannerscontroller.index','轮播图列表',NULL,'2018-08-13 10:57:47','2018-08-14 09:51:47'),
	(33,'轮播图详情','bannerscontroller.show','轮播图详情',NULL,'2018-08-13 11:05:07','2018-08-14 09:52:05'),
	(34,'新增轮播图','bannerscontroller.create','新增轮播图',NULL,'2018-08-13 11:38:55','2018-08-14 09:52:19'),
	(36,'新增轮播图操作','bannerscontroller.store','新增轮播图操作',NULL,'2018-08-13 11:50:58','2018-08-14 09:53:03'),
	(37,'编辑轮播图页面','bannerscontroller.edit','编辑轮播图页面',NULL,'2018-08-14 08:38:05','2018-08-14 09:53:19'),
	(38,'编辑轮播图操作','bannerscontroller.update','编辑轮播图操作',NULL,'2018-08-14 08:44:52','2018-08-14 09:53:40'),
	(39,'删除轮播图操作','bannerscontroller.destroy','删除轮播图操作',NULL,'2018-08-14 09:20:55','2018-08-14 09:53:57'),
	(40,'文章管理','articlescontroller.index','文章列表管理',NULL,'2018-08-14 10:07:06','2018-08-14 10:07:06'),
	(41,'articlescontroller.create','articlescontroller.create','articlescontroller.create',NULL,'2018-08-14 10:18:24','2018-08-14 10:18:24'),
	(42,'articlescontroller.show','articlescontroller.show','articlescontroller.show',NULL,'2018-08-14 10:22:05','2018-08-14 10:22:05'),
	(43,'articlescontroller.store','articlescontroller.store','articlescontroller.store',NULL,'2018-08-15 08:56:24','2018-08-15 08:56:24'),
	(44,'homecontroller.wangeditoruploadimage','homecontroller.wangeditoruploadimage','homecontroller.wangeditoruploadimage',NULL,'2018-08-15 09:31:32','2018-08-15 09:31:32'),
	(45,'articlescontroller.edit','articlescontroller.edit','articlescontroller.edit',NULL,'2018-08-15 11:00:40','2018-08-15 11:00:40'),
	(46,'articlescontroller.update','articlescontroller.update','articlescontroller.update',NULL,'2018-08-15 14:14:30','2018-08-15 14:14:30'),
	(47,'articlescontroller.destroy','articlescontroller.destroy','articlescontroller.destroy',NULL,'2018-08-15 14:28:10','2018-08-15 14:28:10');

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片地址',
  `width` int(11) NOT NULL COMMENT '图片宽度',
  `height` int(11) NOT NULL COMMENT '图片高度',
  `md5` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'md5哈希验证字符',
  `sha1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sha1哈希验证字符',
  `type` int(1) DEFAULT '1' COMMENT '1 本地上传 2 oss 3 qiniu',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片信息表';

INSERT INTO `picture` (`id`, `path`, `width`, `height`, `md5`, `sha1`, `type`, `created_at`, `updated_at`, `status`)
VALUES
	(1,'/images/yuantiao.jpg',500,333,'','',1,1533606233,1533606233,1),
	(2,'/images/cbd.jpg',500,333,'','',1,1533606233,1533606233,1),
	(3,'/images/muwu.jpg',500,333,'','',1,1533606233,1533606233,1),
	(4,'/images/shuijiao.jpg',500,333,'','',1,1533606233,1533606233,1),
	(5,'/images/1.jpeg',500,333,'','',1,1533606233,1533606233,1),
	(6,'/images/2.jpeg',500,333,'','',1,1533606233,1533606233,1),
	(7,'/images/3.jpeg',500,333,'','',1,1533606233,1533606233,1),
	(8,'/images/4.jpeg',500,333,'','',1,1533606233,1533606233,1),
	(9,'/images/5.jpg',500,333,'','',1,1533606233,1533606233,1),
	(10,'/images/6.jpg',375,250,'','',1,1533606234,1533606233,1),
	(24,'uploadFile/image/f4128f63e1b1fe9332621d48e06ecc0d5.jpeg',180,180,'fbfddba657cddb66b36f47e99fa74c42','e07201636b88130e76ca11ed2d8a7a859e3146ee',1,1534299162,1534299162,1),
	(25,'uploadFile/image/cf4999be57cccb1dd9935a5cb92e9e3c5.jpeg',164,164,'381fc727c76cdfcf46d5435da07ad4b6','7e0e3f059671f3f99922f2ba95d1c02c92476827',1,1534299162,1534299162,1),
	(26,'uploadFile/image/d547e4c4d55d198df59f1dc80347796b5.jpg',200,200,'259789cdb1be7ce50ef640da09238f66','f86a54d82268c716f75b1c40cfe0ddd5bc8ea2e4',1,1534302014,1534302014,1),
	(27,'uploadFile/image/1b77167078f6ba7dbb56f9d3d7dc69be5.jpg',500,333,'2f2a352401cbd0b3fd715a6cb5273078','2ad9e075a50237f98c514ba5944d104d0e3d4ac5',1,1534314538,1534314538,1),
	(28,'uploadFile/image/9cf184b69b98a8108d68456c67ee78685.jpg',500,333,'7aea0e5fb1805dbcce1b9f9e2a99a5f9','cd1cba7af87ac15fe0328cef1542e55537c552fa',1,1534314642,1534314642,1),
	(29,'uploadFile/image/4bce07b058e81b3c15f6073d544244fd5.png',643,900,'e35cd44665bffc9c92bc1f15a63f0f33','88b734917553a782ea678ac0fee17be954fcd13b',1,1534317651,1534317651,1);

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(2,2,2,'2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(3,2,3,'2018-08-13 09:08:48','2018-08-13 09:08:48');

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`)
VALUES
	(1,'超级管理员','admin','超级管理员',1,'2018-08-13 09:08:47','2018-08-13 09:08:47'),
	(2,'普通用户','user','普通用户',1,'2018-08-13 09:08:47','2018-08-13 09:08:47');

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'洗头只用海飞丝','admin','admin@admin.com','$2y$10$2SpFjx5IRSvvprC.gGNaJObUjq77iKjMZH63T6ESvfZjv6DWPgEFW','gsympTFlAQ','2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(2,'Dr. Frederic Runte','o\'keefe','blick.garrick@example.com','$2y$10$HfaMhLbs/JwogdkHIIi2V.KWCfs161BrJuEoQRAgA9wEuSXIr0hfK','oCPBvdjKcN','2018-08-13 09:08:48','2018-08-13 09:08:48'),
	(3,'Humberto Gibson V','harber','daisy.windler@example.com','$2y$10$HfaMhLbs/JwogdkHIIi2V.KWCfs161BrJuEoQRAgA9wEuSXIr0hfK','ylIjmNAd7n','2018-08-13 09:08:48','2018-08-13 09:08:48');