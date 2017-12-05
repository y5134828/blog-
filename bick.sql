-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-12-05 11:29:11
-- 服务器版本： 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bick`
--

-- --------------------------------------------------------

--
-- 表的结构 `bk_admin`
--

CREATE TABLE `bk_admin` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_admin`
--

INSERT INTO `bk_admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'ya', 'e10adc3949ba59abbe56e057f20f883e'),
(23, 'peng', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `bk_article`
--

CREATE TABLE `bk_article` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(60) NOT NULL DEFAULT '''''' COMMENT '文章标题',
  `keywords` varchar(100) NOT NULL DEFAULT '''''' COMMENT '关键词',
  `desc` varchar(255) NOT NULL DEFAULT '''''' COMMENT '描述',
  `author` varchar(30) NOT NULL DEFAULT '''''' COMMENT '作者',
  `pic` varchar(160) NOT NULL DEFAULT '''''' COMMENT '缩略图地址',
  `content` text NOT NULL COMMENT '内容',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击数',
  `zan` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不推荐，1推荐',
  `creat_time` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '所属栏目'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_article`
--

INSERT INTO `bk_article` (`id`, `title`, `keywords`, `desc`, `author`, `pic`, `content`, `click`, `zan`, `rec`, `creat_time`, `cateid`) VALUES
(1, '旅行生活', '旅行', '记录旅行生活', 'me', '/static/uploads/20171121/9f7e059eb74a78fd79b46d03ceb1fca5.jpg', '<p>旅行生活<img src=\"/ueditor/php/upload/image/20171121/1511256505825693.jpg\" title=\"1511256505825693.jpg\" alt=\"196891.jpg\" width=\"572\" height=\"286\"/></p>', 5, 0, 0, 0, 19),
(2, 'html基础', 'html基础', 'html基础', 'me', '/static/uploads/20171130/3812f287418143054feffa9464002ee8.jpg', '<p>html基础</p><p><img src=\"/ueditor/php/upload/image/20171121/1511229392378808.jpg\" title=\"1511229392378808.jpg\" alt=\"bg-nav1.jpg\" width=\"512\" height=\"367\"/></p><p><br/></p>', 3, 0, 1, 0, 18),
(3, 'css基础', 'css基础', 'css基础', 'me', '/static/uploads/20171130/311fdd18e19376bbc5967e561b0b6fcc.jpg', '<p>css基础<img src=\"/ueditor/php/upload/image/20171130/1512044616429500.jpg\" title=\"1512044616429500.jpg\" alt=\"8694a4c27d1ed21b803c5f36ac6eddc450da3f6f.jpg\" width=\"542\" height=\"351\"/></p>', 3, 0, 0, 0, 18),
(4, 'javascript基础', 'javascript基础', 'javascript基础', 'me', '/static/uploads/20171130/aebed1c573b55e5e55c11bc5558890a5.jpg', '<p>javascript基础<img src=\"/ueditor/php/upload/image/20171130/1512044753774012.jpg\" title=\"1512044753774012.jpg\" alt=\"457188.jpg\" width=\"546\" height=\"335\"/></p>', 3, 0, 0, 0, 21),
(8, '旅游生活', '旅游生活', '旅游生活', 'me', '/static/uploads/20171121/53b3749fe8e4f75e44db1966752a956f.jpg', '<p>单车生活</p><p><img src=\"/ueditor/php/upload/image/20171130/1512045755594570.jpg\" title=\"1512045755594570.jpg\" alt=\"1101975663506b5b45o.jpg\"/></p><p><br/></p><p>&nbsp; &nbsp;单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活单车生活<img src=\"/ueditor/php/upload/image/20171130/1512045778283278.jpg\" title=\"1512045778283278.jpg\" alt=\"8694a4c27d1ed21b803c5f36ac6eddc450da3f6f.jpg\"/></p>', 11, 0, 1, 1511255638, 19),
(10, '旅游生活', '旅游生活', '旅游生活', 'me', '/static/uploads/20171121/38f9e2381e9502c6bd5b73c59f6b3fa5.jpg', '<p>生活<img src=\"/ueditor/php/upload/image/20171121/1511255793134056.jpg\" title=\"1511255793134056.jpg\" alt=\"8694a4c27d1ed21b803c5f36ac6eddc450da3f6f.jpg\" width=\"577\" height=\"313\"/></p>', 7, 0, 0, 1511255809, 19),
(11, '旅游生活', '旅游生活', '旅游生活', 'me', '/static/uploads/20171121/5f2741b71862d4b0d38c6cbae7ae8876.jpeg', '<p>旅游生活<img src=\"/ueditor/php/upload/image/20171121/1511257342134495.jpeg\" title=\"1511257342134495.jpeg\" alt=\"20130320161607_aELiK.jpeg\" width=\"586\" height=\"340\"/></p>', 12, 0, 0, 1511255828, 19),
(9, '旅游生活', '旅游生活', '旅游生活', 'me', '/static/uploads/20171121/1eee03c4049a1e6cd930ffb24abac128.jpg', '<p>骑行生活<img src=\"/ueditor/php/upload/image/20171121/1511255673418871.jpg\" title=\"1511255673418871.jpg\" alt=\"457188.jpg\" width=\"547\" height=\"286\"/></p>', 2, 0, 1, 1511255689, 19),
(12, 'lunix基础', 'lunix基础', 'lunix基础', 'me', '/static/uploads/20171122/7ba9ff924c5a7c96fae19a8343609c27.jpeg', '<p>lunix基础</p><p><br/></p><p>lunix基础。</p><p>lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础lunix基础</p>', 13, 0, 1, 1511354117, 31),
(13, 'php基础', 'php基础', 'php基础', 'me', '/static/uploads/20171130/4c695bd19b3205c4bf0a362d4ca9615c.jpg', '<p>php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础php基础</p>', 2, 0, 0, 1511354153, 24),
(14, 'thinkphp基础', 'thinkphp基础', 'thinkphp基础', 'me', '/static/uploads/20171130/bd97c8b119a849cc92f4b58eea20b7d2.jpg', '<p>thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础</p><p>thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础</p><p>thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础</p><p>thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础</p><p>thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础thinkphp基础</p>', 6, 0, 0, 1511354176, 25),
(15, 'jqury基础', 'jqury基础', 'jqury基础', 'me', '/static/uploads/20171130/20df61c704db81d79adffa021203917d.jpg', '<p>jqury基础<img src=\"/ueditor/php/upload/image/20171130/1512048757622971.jpg\" title=\"1512048757622971.jpg\" alt=\"457188.jpg\"/></p>', 8, 0, 0, 1512048759, 29);

-- --------------------------------------------------------

--
-- 表的结构 `bk_auth_group`
--

CREATE TABLE `bk_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_auth_group`
--

INSERT INTO `bk_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(3, '超级管理员', 1, '16,27,28,29,30,18,19,26,20,21,12,14,22,25,24,23'),
(2, '普通管理员', 1, '12,14,22,25,24,23'),
(7, '链接管理员', 1, '18,19,26,20,21');

-- --------------------------------------------------------

--
-- 表的结构 `bk_auth_group_access`
--

CREATE TABLE `bk_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_auth_group_access`
--

INSERT INTO `bk_auth_group_access` (`uid`, `group_id`) VALUES
(1, 3),
(20, 2),
(23, 7);

-- --------------------------------------------------------

--
-- 表的结构 `bk_auth_rule`
--

CREATE TABLE `bk_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `sort` int(3) NOT NULL DEFAULT '99',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_auth_rule`
--

INSERT INTO `bk_auth_rule` (`id`, `sort`, `name`, `title`, `type`, `status`, `condition`, `pid`, `level`) VALUES
(19, 99, 'link/lst', '友情链接列表', 1, 1, '', 18, 1),
(12, 3, 'conf', '系统设置', 1, 1, '', 0, 0),
(14, 3, 'conf/conf', '配置项', 1, 1, '', 12, 1),
(18, 2, 'link', '友情链接', 1, 1, '', 0, 0),
(16, 1, 'admin', '管理员管理', 1, 1, '', 0, 0),
(21, 99, 'link/del', '删除友情链接', 1, 1, '', 19, 2),
(20, 99, 'link/add', '添加友情链接', 1, 1, '', 19, 2),
(22, 99, 'conf/lst', '配置列表', 1, 1, '', 12, 1),
(23, 99, 'conf/add', '添加配置', 1, 1, '', 22, 2),
(24, 99, 'conf/del', '删除配置', 1, 1, '', 22, 2),
(25, 99, 'conf/edit', '修改配置', 1, 1, '', 22, 2),
(26, 99, 'link/edit', '修改友情链接', 1, 1, '', 19, 2),
(27, 99, 'admin/lst', '管理员列表', 1, 1, '', 16, 1),
(28, 99, 'admin/add', '添加管理员', 1, 1, '', 27, 2),
(29, 99, 'admin/del', '删除管理员', 1, 1, '', 27, 2),
(30, 99, 'admin/edit', '修改管理员', 1, 1, '', 27, 2);

-- --------------------------------------------------------

--
-- 表的结构 `bk_cate`
--

CREATE TABLE `bk_cate` (
  `id` mediumint(9) NOT NULL,
  `cate_name` varchar(30) NOT NULL DEFAULT '''''',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是列表栏目，2是单页栏目,3是图片列表',
  `keywords` varchar(255) NOT NULL DEFAULT '''''',
  `desc` varchar(255) NOT NULL DEFAULT '''''',
  `content` text NOT NULL,
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上一级栏目的id',
  `rec_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不推荐1推荐到首页',
  `rec_bottom` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示不推荐，1表示推荐到底部',
  `sort` mediumint(9) NOT NULL DEFAULT '99' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_cate`
--

INSERT INTO `bk_cate` (`id`, `cate_name`, `type`, `keywords`, `desc`, `content`, `pid`, `rec_index`, `rec_bottom`, `sort`) VALUES
(1, '单车', 1, '单车', '单车列', '<p>单车列</p>', 1, 0, 0, 1),
(14, '顶层1次级分类', 1, '', '', '', 1, 0, 0, 99),
(5, '测试次级分类', 3, '', '', '', 12, 0, 0, 99),
(9, '测试次级分类的次级', 2, '', '', '', 9, 0, 0, 99),
(17, 'html前端', 1, 'html前端', 'html前端', '<p>html前端</p>', 0, 0, 1, 1),
(12, '测试次级分类的次级', 2, '', '', '', 5, 0, 0, 99),
(13, '测试次级分类2', 2, '', '', '', 13, 0, 0, 99),
(15, '顶层1次级分类的分类', 1, '', '', '', 14, 0, 0, 99),
(18, 'html5/css3', 1, 'html5/css3', 'html5/css3', '<p>html5/css3</p>', 17, 1, 0, 99),
(19, '旅游相册', 3, '旅游', '旅游相册', '<p>旅游相册</p>', 0, 0, 1, 4),
(30, '其它相关', 1, '其它相关', '其它相关', '<p>其它相关</p>', 0, 0, 0, 3),
(21, 'javascript', 1, 'javascript', 'javascript', '<p>javascript</p>', 17, 1, 0, 99),
(22, '测试次级分类的次级的次级', 1, '测试次级分类的次级的次级', '测试次级分类的次级的次级', '<p>测试次级分类的次级的次级测试次级分类的次级的次级测试次级分类的次级的次级测试次级分类的次级的次级测试次级分类的次级的次级测试次级分类的次级的次级</p>', 15, 0, 0, 99),
(23, 'php后端', 1, 'php后端', 'php后端', '<p>php后端</p>', 0, 0, 0, 2),
(24, 'php', 1, 'php', 'php', '<p>php</p>', 23, 1, 1, 99),
(25, 'thinkphp', 1, 'thinkphp', 'thinkphp', '<p>thinkphp</p>', 23, 1, 1, 99),
(27, '联系博主', 2, '联系博主', '联系博主', '<h2 style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 22px; vertical-align: baseline; font-family: \">联系博主</h2><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 28px; color: rgb(102, 102, 102); font-family: \">&nbsp; &nbsp; 电话：111111111</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 28px; color: rgb(102, 102, 102); font-family: \">&nbsp; &nbsp; 邮箱：1111111111@.com</p><p><br/></p>', 0, 0, 1, 99),
(29, 'jQury', 1, 'jQury', 'jQury', '<p>jQury</p>', 17, 1, 1, 99),
(31, 'lunix', 1, 'lunix', 'lunix', '<p>lunix</p>', 30, 0, 0, 99);

-- --------------------------------------------------------

--
-- 表的结构 `bk_conf`
--

CREATE TABLE `bk_conf` (
  `id` mediumint(9) NOT NULL,
  `cnname` varchar(50) NOT NULL COMMENT '配置项中文名',
  `enname` varchar(50) NOT NULL COMMENT '配置项英文名',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置项类型1：代表单行文本框2：文本域3：单选按钮4：复选按钮5：下拉菜单',
  `value` varchar(255) NOT NULL COMMENT '配置项值',
  `values` varchar(255) NOT NULL COMMENT '配置项可选值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_conf`
--

INSERT INTO `bk_conf` (`id`, `cnname`, `enname`, `type`, `value`, `values`) VALUES
(1, 'p、个人博客', 'sedname', 1, '自行车网', ''),
(7, '站点关键词', 'keywords', 2, '自行车', ''),
(4, '网站状态', 'static', 3, '关闭', '开启,关闭'),
(5, '是否启用验证', 'code', 4, '', '是'),
(6, '自动清空缓存时间', 'cache', 5, '4小时', '1小时,2小时,3小时,4小时');

-- --------------------------------------------------------

--
-- 表的结构 `bk_link`
--

CREATE TABLE `bk_link` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '连接标题',
  `desc` text NOT NULL COMMENT '链接描述',
  `url` varchar(100) NOT NULL COMMENT '连接地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bk_link`
--

INSERT INTO `bk_link` (`id`, `title`, `desc`, `url`) VALUES
(1, '新浪', '新浪新浪', 'http://www.xinlang.com'),
(3, 'baidu', 'baidu', 'http://www.baidu.com'),
(4, '百度', '测试百度', 'www.baidu.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bk_admin`
--
ALTER TABLE `bk_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_article`
--
ALTER TABLE `bk_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_auth_group`
--
ALTER TABLE `bk_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_auth_group_access`
--
ALTER TABLE `bk_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `bk_auth_rule`
--
ALTER TABLE `bk_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `bk_cate`
--
ALTER TABLE `bk_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_conf`
--
ALTER TABLE `bk_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_link`
--
ALTER TABLE `bk_link`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bk_admin`
--
ALTER TABLE `bk_admin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `bk_article`
--
ALTER TABLE `bk_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `bk_auth_group`
--
ALTER TABLE `bk_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `bk_auth_rule`
--
ALTER TABLE `bk_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用表AUTO_INCREMENT `bk_cate`
--
ALTER TABLE `bk_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用表AUTO_INCREMENT `bk_conf`
--
ALTER TABLE `bk_conf`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `bk_link`
--
ALTER TABLE `bk_link`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
