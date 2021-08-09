<?php
/**
 * IndexCtrl
 */

namespace ctrl;

use framework\util;
use framework\mvc\view\smarty;
use framework\util\Singleton;
use service\AnswerService;
use service\ManagerService;
use utils\HttpUtil;
use view\JsonView;

class IndexCtrl extends CtrlBase
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

    public function main()
    {
        return new smarty\SmartyView("user/pvp.html", array());
    }

    public function toPvp()
    {
        return new smarty\SmartyView("user/pvp.html", array());
    }

    public function toBoss()
    {
        return new smarty\SmartyView("user/boss.html", array());
    }

    public function tolog()
    {
        return new smarty\SmartyView("user/log.html", array());
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
        //校验数据
        list($checkResult, $checkNotice) = $managerService->checkParams($params);
        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }
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
        //校验数据
        list($checkResult, $checkNotice) = $managerService->checkParams($params);
        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }
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

    public function test()
    {
        $a='
[
        {
            "id":"1",
            "name":"boss1",
            "price":"3.90",
            "diamond":"500",
            "soldier":"投矛手",
            "soldier_num":"5",
            "coin":"5000"
        },
        {
            "id":"2",
            "name":"boss_2",
            "price":"9.90",
            "diamond":"1000",
            "soldier":"巨石兵",
            "soldier_num":"12",
            "coin":"12000"
        },
        {
            "id":"3",
            "name":"boss_3",
            "price":"19.90",
            "diamond":"2500",
            "soldier":"巫毒娃娃",
            "soldier_num":"30",
            "coin":"30000"
        },
        {
            "id":"4",
            "name":"boss_4",
            "price":"499.99",
            "diamond":"6500",
            "soldier":"巫毒娃娃",
            "soldier_num":"90",
            "coin":"80000"
        },
        {
            "id":"5",
            "name":"boss_5",
            "price":"99.99",
            "diamond":"14000",
            "soldier":"巫毒娃娃",
            "soldier_num":"600",
            "coin":"200000"
        }
    ]
';
        $params=json_decode($a);

        return new JsonView($params[0]);
    }

    public function welcome()
    {
        return new smarty\SmartyView("welcome.html", array());
    }

}
