<?php
/**
 * @file config.php
 */

\error_reporting(E_ALL);
\ini_set('display_errors', 1);
date_default_timezone_set('Asia/Shanghai');

/**
 * 调试模式
 * 
 * @var int 
 */
define("DEBUG_MODE", true);

/**
* 当前环境
*/
define("ENV", 'test');

/**
 * 站点名称
 */
define('SITE_NAME', '[TEST] xx管理后台');



/**
 * 全局配置
 */
global $G_CONFIGS;
$G_CONFIGS = array(
	// 'key' => array('item1','item2'),
);

