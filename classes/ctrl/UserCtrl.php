<?php // -*-coding:utf-8; mode:php-mode;-*-
/**
 * 用户控制器
 */

namespace ctrl;

use framework\mvc\view\smarty;

use framework\util;
use \utils\Functions;
use \view\RedirectView;
use service\AnswerService;
use view\JsonView;

/**
 * 用户登录的 ctrl
 * 
 * @package LoginCtrl
 * @subpackage CtrlBase
 */
class UserCtrl extends CtrlBase {
	/**
	 * 构造函数，继承父方法
	 * 
	 * @return void 
	 * @access public 
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 用户在登录操作前，此方法先执行
	 * 
	 * @return boolean Success
	 * @access public 
	 */
	public function beforeFilter()
	{
		return true;
	}

	/**
	 * 用户退出
	 * 
	 * @return void 
	 * @access public 
	 */
	public function logout()
	{
		$_SESSION = array();
		return new RedirectView("/");
	}


	/**
	 * 用户提交登录
	 * 
	 * @return void 
	 * @access public 
	 */
	public function login()
	{
		if("POST" === $_SERVER['REQUEST_METHOD']){
			$params = $_POST;
			$smartyVars = array();

			/** @var UserService $userService */
			$userService = util\Singleton::get("service\\UserService");
			list($checkResult,$checkNotice) = $userService->checkLoginParams($params);
			if(true !== $checkResult){
				$rspArr = AnswerService::makeResponseArray($checkNotice);
				$smartyVars = array('message' => $rspArr['msg']);
				return new smarty\SmartyView("user/login.html",$smartyVars);
			}
			
			extract($params);
			list($loginResult,$loginNotice,$userInfo) = $userService->loginCheck($username,$password,$captcha);
			if(true !== $loginResult){
				$rspArr = AnswerService::makeResponseArray($loginNotice);
				$smartyVars = array('message' => $rspArr['msg']);
				return new smarty\SmartyView("user/login.html",$smartyVars);
			}
			
			$_SESSION['user_id'] = $userInfo['user_id'];
			$_SESSION['user_name'] = $userInfo['user_name'];
			$_SESSION['permission'] = json_encode($userInfo['permission']);
			$_SESSION['user_apps'] = json_encode($userInfo['apps']);
			$_SESSION['user_applist'] = json_encode($userInfo['applist']);

			return new RedirectView('/');
		}
		else{
			$userService = util\Singleton::get("service\\UserService");
			$imageInfos = $userService->getLoginImageInfos();

			return new smarty\SmartyView("user/login.html", $imageInfos);
		}
		
	}
}
