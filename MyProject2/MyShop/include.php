<?php
header("content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
define("ROOT", dirname(__FILE__));
date_default_timezone_set('PRC'); //设置中国时区 
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'string.func.php';
require_once 'image.func.php';
require_once 'configs.php';
require_once 'mysql.func.php';
//require_once 'common.func.php';
require_once 'admin.inc.php';
require_once 'cate.inc.php';
//require_once 'pro.inc.php';
require_once 'album.inc.php';
//require_once 'user.inc.php';
connect();