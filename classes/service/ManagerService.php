<?php

namespace service;

use Exception;
use framework\util\Singleton;

class ManagerService extends BaseService
{

    /**
     * ManagerService constructor.
     */
    public function __construct()
    {
    }


    public function checkParams($params)
    {
        extract($params);

        if (!isset($id) || empty($id)) {
            return array(false, 'lack_of_id');
        }

        if (!isset($name) || empty($name)) {
            return array(false, 'lack_of_name');
        }

        if (!isset($price) || empty($price)) {
            return array(false, 'lack_of_price');
        }

        if (!isset($diamond) || empty($diamond)) {
            return array(false, 'lack_of_diamond');
        }

        if (!isset($soldier) || empty($soldier)) {
            return array(false, 'lack_of_soldier');
        }

        if (!isset($soldier_num) || empty($soldier_num)) {
            return array(false, 'lack_of_soldier_num');
        }

        if (!isset($coin) || empty($coin)) {
            return array(false, 'lack_of_coin');
        }

        return array(true, 'ok');
    }

    public function getPvpDate()
    {
        /** @var SampleService $sampleService */
        $sampleService = Singleton::get(SampleService::class);
        $sql = "SELECT * FROM Champion_package";
        $result = $sampleService->query($sql);
        return parent::show(
            200,
            ok,
            $result
        );
    }

    public function getBossDate()
    {
        /** @var SampleService $sampleService */
        $sampleService = Singleton::get(SampleService::class);
        $sql = "SELECT * FROM BossChampion_package";
        $result = $sampleService->query($sql);
        return parent::show(
            200,
            ok,
            $result
        );
    }

    public function upPvpDate($params)
    {
        /** @var SampleService $sampleService */
        $sampleService = Singleton::get(SampleService::class);
        //查询原始数据
        $sql = "SELECT * FROM Champion_package";
        $result = $sampleService->query($sql);
        //type字符串记录哪几列更改
        $type = '';
        //时间戳作为groupid
        $groupid = time();
        //修改时间
        $upData = date('Y-m-d H:i:s');
        //随机更改人
        $name = 'user_' . $this->getRandomString(3);
        //$params新数据与$result旧数据进行比较
        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]['name'] != $params[$i]['name']) {
                $type = $type . '0,';
            }
            if ($result[$i]['price'] != $params[$i]['price']) {
                $type = $type . '1,';
            }
            if ($result[$i]['diamond'] != $params[$i]['diamond']) {
                $type = $type . '2,';
            }
            if ($result[$i]['soldier'] != $params[$i]['soldier']) {
                $type = $type . '3,';
            }
            if ($result[$i]['soldier_num'] != $params[$i]['soldier_num']) {
                $type = $type . '4,';
            }
            if ($result[$i]['coin'] != $params[$i]['coin']) {
                $type = $type . '5';
            }
            $id = $params[$i][id];
            $package_name = $params[$i]['name'];
            $price = $params[$i]['price'];
            $diamond = $params[$i]['diamond'];
            $soldier = $params[$i]['soldier'];
            $soldier_num = $params[$i]['soldier_num'];
            $coin = $params[$i]['coin'];

            try {
                //更新数据库
                $sql = "update `Champion_package` set name='$package_name',price='$price',diamond='$diamond',soldier='$soldier',soldier_num='$soldier_num',coin='$coin' where id='$id'";
                $upnum = $sampleService->query($sql);
                //插入操作记录
                $sql = "INSERT INTO `Champion_package_log` (group_id,sku,price,diamond,soldier,soldier_num,coin,type,package_type,name,updateTime) 
            VALUES ('$groupid','$package_name','$price','$diamond','$soldier','$soldier_num','$coin','$type','pvp冠军礼包','$name','$upData')";
                $innum = $sampleService->query($sql);
                //操作字段重置
                $type = '';
            } catch (Exception $exception) {
                return parent::show(
                    400,
                    error,
                    '修改失败！'
                );
            }
        }
        return parent::show(
            200,
            ok,
            '修改成功！'
        );
    }

    public function upBossDate($params)
    {
        /** @var SampleService $sampleService */
        $sampleService = Singleton::get(SampleService::class);
        //查询原始数据
        $sql = "SELECT * FROM BossChampion_package";
        $result = $sampleService->query($sql);
        //type字符串记录哪几列更改
        $type = '';
        //时间戳作为groupid
        $groupid = time();
        //修改时间
        $upData = date('Y-m-d H:i:s');
        //随机更改人
        $name = 'user_' . $this->getRandomString(3);
        //记录插入数据库次数
        $incount = 0;
        //记录更新数据库次数
        $upcount = 0;
        //$params新数据与$result旧数据进行比较
        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]['name'] != $params[$i]['name']) {
                $type = $type . '0,';
            }
            if ($result[$i]['price'] != $params[$i]['price']) {
                $type = $type . '1,';
            }
            if ($result[$i]['diamond'] != $params[$i]['diamond']) {
                $type = $type . '2,';
            }
            if ($result[$i]['soldier'] != $params[$i]['soldier']) {
                $type = $type . '3,';
            }
            if ($result[$i]['soldier_num'] != $params[$i]['soldier_num']) {
                $type = $type . '4,';
            }
            if ($result[$i]['coin'] != $params[$i]['coin']) {
                $type = $type . '5,';
            }
            $type=rtrim($type,",");
            $id = $params[$i][id];
            $package_name = $params[$i]['name'];
            $price = $params[$i]['price'];
            $diamond = $params[$i]['diamond'];
            $soldier = $params[$i]['soldier'];
            $soldier_num = $params[$i]['soldier_num'];
            $coin = $params[$i]['coin'];

            try {
                //更新数据库
                $sql = "update `BossChampion_package` set name='$package_name',price='$price',diamond='$diamond',soldier='$soldier',soldier_num='$soldier_num',coin='$coin' where id='$id'";
                $upnum = $sampleService->query($sql);
                $upcount = $upcount + $upnum;
                //插入操作记录
                $sql = "INSERT INTO `Champion_package_log` (group_id,sku,price,diamond,soldier,soldier_num,coin,type,package_type,name,updateTime) 
            VALUES ('$groupid','$package_name','$price','$diamond','$soldier','$soldier_num','$coin'
            ,'$type','boss冠军礼包','$name','$upData')";
                $innum = $sampleService->query($sql);
                $incount = $incount + $innum;
                //操作字段重置
                $type = '';
            } catch (Exception $exception) {
                return parent::show(
                    400,
                    error,
                    '修改失败！'
                );
            }
        }
        return parent::show(
            200,
            ok,
            '修改成功！'
        );
    }

    public function getlog()
    {
        /** @var SampleService $sampleService */
        $sampleService = Singleton::get(SampleService::class);
        $sql = "SELECT DISTINCT group_id FROM Champion_package_log GROUP BY group_id";
        $pvpresult = $sampleService->query($sql);
        $result=array();
        foreach ($pvpresult as $key=>$value) {
            $sql="SELECT * from Champion_package_log where group_id= '$value[group_id]'";
            $re=$sampleService->query($sql);
            array_push($result,$re);
        }
        return parent::show(
            200,
            ok,
            $result
        );
    }

    /**
     * 生成随机数
     * @param $len
     * @param null $chars
     * @return string
     */
    function getRandomString($len, $chars = null)
    {
        if (is_null($chars)) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000 * (double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }
}