<?php
/**
 * 
 * @file CtrlBase.php
 * @author ChengRennt <ChengRennt@gmail.com> 
 * @date 2013-3-22 下午1:34:14
 * @description Ctrl 的基础类
 */

namespace ctrl;

use framework\util;
use framework\view;
use framework\mvc\IController;
use framework\mvc\IRequestDispatcher;
use \view\RedirectView;
use \utils\Functions;

/**
 * CtrlBase Ctrl 的基础类
 * 
 * @package CtrlBase
 * @subpackage framework.core.IController
 */
class CtrlBase implements IController {
    /**
     * dispatcher 对象
     * 
     * @var object 
     * @access protected 
     */
    protected $dispatcher;

    /**
     * 设置 dispatcher
     * 
     * @param dispatcher $ 
     * @return void 
     * @access public 
     */
    public function setDispatcher(IRequestDispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    /**
     * 获取 dispatcher
     * 
     * @return framework \core\IRequestDispatcher
     * @access public 
     */
    public function getDispatcher() {
        return $this->dispatcher;
    }

    /**
     * 在执行具体动作前，要执行的动作
     * 
     * @return ture/false
     * @access public 
     */
    function beforeFilter() {
        /*$className = $this->dispatcher->getCtrlClassName();
        if(in_array($className,array('ShellCtrl','ApiCtrl','UserCtrl','ServerCtrl','ManagerCtrl'))) return true;
        if ((!isset($_SERVER['argc']) || $_SERVER['argc'] == 0)
            && (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
        ) {
            header("Location: /Manager/toPvp");
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if(!empty($uri)){
            if($uri=="/"||$uri=="/index/welcome") return true;
            $userService = util\Singleton::get("service\\UserService");
            $res = $userService->getAllPrivilege();
            $flag = true;//修改权限
            if(in_array("all",$res)||in_array(ADMIN_ID,$res)||in_array($uri,$res)) return true;
            foreach ($res as $key => $value) {
                if(stripos($uri,$value)!==false && $value!="/"){
                    return true;
                }
            }
            if($flag===false){
                echo '<script>
						if (confirm("权限不足是否重新登录?")) {
                            location.href = \'/user/logout\';

                        } else {
                            location.href = \'/\';
                        }
                        </script>';
                return false;
            }
        }*/
        return true;
    }

    /**
     * 在完成功能后，所执行的动作
     * 
     * @return ture /false
     * @access public 
     */
    function afterFilter() {
        return true;
    }

    /**
     * 构造函数
     * 
     * @return void 
     * @access public 
     */
    public function __construct() {
    }
}
