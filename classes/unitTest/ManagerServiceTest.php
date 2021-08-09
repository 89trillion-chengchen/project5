<?php

namespace service;

use framework\util\Singleton;
use PHPUnit\Framework\TestCase;
use utils\HttpUtil;
use view\JsonView;

class ManagerServiceTest extends TestCase
{

    public function testUpPvpDate()
    {
        $params=array();
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        //执行函数
        $result = $managerService->upPvpDate($params);
        return new JsonView($result);
    }

    public function testUpBossDate()
    {
        $params=array();
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        //执行函数
        $result = $managerService->upBossDate($params);

        return new JsonView($result);
    }

    public function testGetBossDate()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getBossDate();
        echo new JsonView($result);

    }

    public function testGetPvpDate()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getPvpDate();
        echo new JsonView($result);
    }

    public function testGetlog()
    {
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        $result = $managerService->getlog();
        echo new JsonView($result);
    }
}
