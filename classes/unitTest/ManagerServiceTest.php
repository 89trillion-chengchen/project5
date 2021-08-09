<?php

namespace service;

use framework\util\Singleton;
use PHPUnit\Framework\TestCase;
use view\JsonView;

class ManagerServiceTest extends TestCase
{

    public function testUpPvpDate()
    {
        $json = '[
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
    ]';
        $params = json_decode($json);
        /** @var ManagerService $managerService */
        $managerService = Singleton::get(ManagerService::class);
        //执行函数
        $result = $managerService->upPvpDate($params);
        return new JsonView($result);
    }

    public function testUpBossDate()
    {
        $json = '[
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
    ]';
        $params = json_decode($json);
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
