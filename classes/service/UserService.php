<?php
/**
 * User 服务层
 */

namespace service;

use entity;
use dao;
use framework\util;
use exception\CommonException;
use utils\Functions;

/**
 * 用户的的Service
 * 
 * @package UserService
 */
class UserService
{
	/**
	 * 
	 * @var dao \UserDao $dataDao
	 */
	private $dataDao;

	public function __construct()
	{
		//$this->dataDao = util\Singleton::get("dao\\UserDao");
	}
	
	public function checkLoginParams($params)
	{
		extract($params);
		
		if(!isset($username) || empty($username)){
			return array(false,'lack_of_username');
		}
		
		if(!isset($password) || empty($password)){
			return array(false,'lack_of_password');
		}
		
		if(!isset($captcha) || empty($captcha)){
			return array(false,'lack_of_captcha');
		}
		
		return array(true,'ok');
	}

	public function loginCheck($userName,$password,$captcha)
	{
		$url = ADMIN_LOGIN_API_URL;
		$serverName =  $_SERVER['HTTP_HOST'];
		$postData = array(
			'user_name' => $userName,
			'user_pass' => $password,
			'admin_id' => ADMIN_ID,
			'code' => $captcha,
		);
		
		if(empty($captcha)){
			return array(false,'lack_of_captcha',null);
		}
		
		$_SESSION['captcha'] = array();
		
		$configs = array('timeout' => 30);
		if(defined('ADMIN_LOGIN_PROXY')) $configs['proxy'] = ADMIN_LOGIN_PROXY;
		$rspJson = Functions::curl($url,"POST",$postData,array(),$configs);
		$rspData = json_decode($rspJson,true);
		if(!is_array($rspData) || empty($rspData)){
			return array(false,'internal_error',null);
		}
		
		if(!isset($rspData['code']) || $rspData['code'] !== 1){
			return array(false,$rspData['msg'],null);
		}

		$userInfo = array(
			'user_id' => $rspData['userid'],
			'user_name' => $userName,
			'permission'=>	$rspData['permission'],
			'apps' => $rspData['apps'],
			'applist' => $rspData['applist'],
		);
		return array(true,'ok',$userInfo);
	}
	
	public function encryptUserPass($userPass)
	{
		return md5($userPass);
	}
	
	public function isLogin()
	{
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$userInfo = array(
				'user_id' => $_SESSION['user_id'],
				'user_name' => $_SESSION['user_name'],
			);
			return array(true,$userInfo);
		}
		return array(false,array());
	}
	public function getAllPrivilege()
	{
		$permissionJson = $_SESSION['permission'];
		$permissionList = json_decode($permissionJson,true);
		$res = array();
		foreach($permissionList as $permission){
			if(!empty($permission['act'])) {
				$res[] = $permission['act'];
			}
		}
		return $res;
	}
	public function getUserMenu()
	{
		$permissionJson = $_SESSION['permission'];
		$permissionList = json_decode($permissionJson,true);
		return $permissionList;
	}

	public function getLoginImageInfos() 
	{
		$url = "http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&mkt=zh-CN";
		$content = Functions::curl($url);
		$content = json_decode($content, true);
		if (empty($content) || empty($content['images'])) {
			return [];
		}

		$imageUrl = $content['images'][0]['url'];
		$copyright = $content['images'][0]['copyright'];

		$data = [
			'imageUrl' => '//s.cn.bing.net' . $imageUrl,
			'copyright' => $copyright,
		];

		return $data;
	}
}
