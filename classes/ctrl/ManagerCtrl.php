<?php

namespace ctrl;

use framework\util\Singleton;
use service\AnswerService;
use service\ManagerService;
use utils\HttpUtil;
use view\JsonView;

class ManagerCtrl extends CtrlBase
{
    /**
     * 构造函数，继承父方法
     *
     * @return void
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function toPvp(){
        return new smarty\SmartyView("user/pvp.html",array());
    }

    public function getPvpDate()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getPvpDate();
        return new JsonView($result);
    }

    public function getBossDate()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getBossDate();
        return new JsonView($result);
    }

    public function upPvpDate()
    {
        //获取get或post请求数据
        $params = HttpUtil::getPostData('param');

        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        //执行函数
        $result = $managerService->upPvpDate($params);

        return new JsonView($result);
    }

    public function upBossDate()
    {
        //获取get或post请求数据
        $params = HttpUtil::getPostData('param');
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        //执行函数
        $result = $managerService->upBossDate($params);

        return new JsonView($result);
    }

    public function getlog()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getlog();
        return new JsonView($result);
    }


}