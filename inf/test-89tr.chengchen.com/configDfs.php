<?php
/**
 */

class DFSConfigs {
	/* tracker 服务器配置 */
	public static $tracker = array(
		'default' => array(
			'ip_addr' => '10.22.173.49',
			'port' => '22122',
		),
	);
	
	/* storage 服务器配置  */
	public static $storage = array(
		'defalut' => array(
			'group1' => array(
				'ip_addr' => '10.22.173.49',
				'port' => '80',
			),
		),
	);
}
