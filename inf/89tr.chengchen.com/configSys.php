<?php
/**
 * @file config.php
 */

\error_reporting(E_ALL^ (E_NOTICE | E_WARNING));
\ini_set('display_errors', 0);
date_default_timezone_set('Asia/Shanghai');

/**
 * 调试模式
 * 
 * @var int 
 */
define("DEBUG_MODE", false);

/**
* 当前环境
*/
define("ENV", 'online');

/**
 * 站点名称
 */
define('SITE_NAME', 'xxx管理后台');


/**
 * 数组类型配置
 */
global $G_CONFIGS;
$G_CONFIGS = array(
	// 'key' => array('item1','item2'),
);
