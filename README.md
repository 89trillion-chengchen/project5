# 1.整体思路
### 1.修改冠军礼包
![Image text](https://raw.githubusercontent.com/89trillion-chengchen/project5/master/classes/images/job51.jpg)
### 2.查询操作记录
（1）首先group by group_id得到分组信息  
（2）再根据查到的group_id查询具体的操作信息，并放入数组  
（3）返回给前端操作记录

# 2.存储设计

（1）PVP冠军礼包及世界boss礼包结构

| 内容     | 数据库 | key         | 类型    |
| -------- | ------ | ----------- | ------- |
| 主键     | mysql  | id          | int     |
| 钻石数   | mysql  | diamond     | int     |
| 礼包名   | mysql  | name        | varchar |
| 价格     | mysql  | price       | double  |
| 钻石数   | mysql  | diamond     | int     |
| 士兵类型 | mysql  | soldier     | varchar |
| 士兵数量 | mysql  | soldier_num | int     |
| 金币数量 | mysql  | coin        | int     |

（2）操作记录表

| 内容       | 数据库     | key          | 类型     |
| ---------- | ---------- | ------------ | -------- |
| 主键       | mysql      | id           | int      |
| 时间戳     | mysql      | group_id     | int      |
| 礼包名     | mysql      | Sku          | varchar  |
| 价格       | mysql      | price        | double   |
| 钻石数     | mysql     | diamond      | int      |
| 士兵类型   | mysql      | soldier      | varchar  |
| 士兵数量   | mysql      | soldier_num  | int      |
| 金币数量   | mysql      | coin         | int      |
| 记录更改列 | mysql      | type         | varchar  |
| 礼包种类   | mysql      | package_type | varchar  |
| 操作人姓名 | mysql      | name         | varchar  |
| 操作时间   | mysql      | updateTime   | datetime |

# 3.接口设计

### （1）获取世界BOSS冠军礼包信息
####请求方法  
```php 
HTTP GET
```
#### 接口地址   
```php 
http://89tr.chengchen.com/index/getBossDate
```
#### 响应
```php 
{
    "status": 200,
    "msg": "ok",
    "data": [
        {
            "id": "1",
            "name": "boss_1",
            "price": "3.90",
            "diamond": "5000",
            "soldier": "投矛手",
            "soldier_num": "50",
            "coin": "5000"
        },
        {
            "id": "2",
            "name": "boss_2",
            "price": "9.90",
            "diamond": "10000",
            "soldier": "巫毒娃娃",
            "soldier_num": "120",
            "coin": "12000"
        },
        {
            "id": "3",
            "name": "boss_3",
            "price": "19.90",
            "diamond": "25000",
            "soldier": "投矛手",
            "soldier_num": "300",
            "coin": "30000"
        },
        {
            "id": "4",
            "name": "boss_4",
            "price": "499.99",
            "diamond": "65000",
            "soldier": "投矛手",
            "soldier_num": "900",
            "coin": "80000"
        },
        {
            "id": "5",
            "name": "boss_5",
            "price": "99.99",
            "diamond": "14000",
            "soldier": "巨石兵",
            "soldier_num": "6000",
            "coin": "200000"
        }
    ]
}
```
### （2）更改世界BOSS冠军礼包信息
####请求方法
```php 
HTTP POST
```
#### 接口地址
```php 
http://89tr.chengchen.com/index/upBossDate
```
#### 请求参数
```php 
{"param":[
        {
            "id": "1",
            "name": "boss1",
            "price": "3.90",
            "diamond": "500",
            "soldier": "投矛手",
            "soldier_num": "5",
            "coin": "5000"
        },
        {
            "id": "2",
            "name": "boss_2",
            "price": "9.90",
            "diamond": "1000",
            "soldier": "巨石兵",
            "soldier_num": "12",
            "coin": "12000"
        },
        {
            "id": "3",
            "name": "boss_3",
            "price": "19.90",
            "diamond": "2500",
            "soldier": "巫毒娃娃",
            "soldier_num": "30",
            "coin": "30000"
        },
        {
            "id": "4",
            "name": "boss_4",
            "price": "499.99",
            "diamond": "6500",
            "soldier": "巫毒娃娃",
            "soldier_num": "90",
            "coin": "80000"
        },
        {
            "id": "5",
            "name": "boss_5",
            "price": "99.99",
            "diamond": "14000",
            "soldier": "巫毒娃娃",
            "soldier_num": "600",
            "coin": "200000"
        }
    ]
}
```
#### 响应
```php 
{
    "status": 200,
    "msg": "ok",
    "data": "修改成功！"
}
```
### （3）获取PVP冠军礼包信息
####请求方法
```php 
HTTP GET
```
#### 接口地址
```php 
http://89tr.chengchen.com/index/getpvpDate
```
#### 响应
```php 
{
    "status": 200,
    "msg": "ok",
    "data": [
        {
            "id": "1",
            "name": "boss1",
            "price": "3.99",
            "diamond": "500",
            "soldier": "巨石兵",
            "soldier_num": "50",
            "coin": "5000"
        },
        {
            "id": "2",
            "name": "boss_2",
            "price": "9.99",
            "diamond": "1000",
            "soldier": "巨石兵",
            "soldier_num": "12",
            "coin": "12000"
        },
        {
            "id": "3",
            "name": "boss_3",
            "price": "19.90",
            "diamond": "250",
            "soldier": "巫毒娃娃",
            "soldier_num": "30",
            "coin": "30000"
        },
        {
            "id": "4",
            "name": "boss_4",
            "price": "499.44",
            "diamond": "654",
            "soldier": "巨石兵",
            "soldier_num": "94",
            "coin": "8004"
        },
        {
            "id": "5",
            "name": "boss_5",
            "price": "99.98",
            "diamond": "1400",
            "soldier": "投矛手",
            "soldier_num": "600",
            "coin": "200000"
        },
        {
            "id": "6",
            "name": "boss_6",
            "price": "199.00",
            "diamond": "7809",
            "soldier": "巨石兵",
            "soldier_num": "778",
            "coin": "98798"
        }
    ]
}
```
### （4）更改PVP冠军礼包信息
####请求方法
```php 
HTTP POST
```
#### 接口地址
```php 
http://89tr.chengchen.com/index/upPVPDate
```
#### 请求参数
```php 
{"param":[
        {
            "id": "1",
            "name": "boss1",
            "price": "3.90",
            "diamond": "500",
            "soldier": "投矛手",
            "soldier_num": "5",
            "coin": "5000"
        },
        {
            "id": "2",
            "name": "boss_2",
            "price": "9.90",
            "diamond": "1000",
            "soldier": "巨石兵",
            "soldier_num": "12",
            "coin": "12000"
        },
        {
            "id": "3",
            "name": "boss_3",
            "price": "19.90",
            "diamond": "2500",
            "soldier": "巫毒娃娃",
            "soldier_num": "30",
            "coin": "30000"
        },
        {
            "id": "4",
            "name": "boss_4",
            "price": "499.99",
            "diamond": "6500",
            "soldier": "巫毒娃娃",
            "soldier_num": "90",
            "coin": "80000"
        },
        {
            "id": "5",
            "name": "boss_5",
            "price": "99.99",
            "diamond": "14000",
            "soldier": "巫毒娃娃",
            "soldier_num": "600",
            "coin": "200000"
        }
    ]
}
```
#### 响应
```php 
{
    "status": 200,
    "msg": "ok",
    "data": "修改成功！"
}
```
### （5）获取操作记录信息
####请求方法
```php 
HTTP GET
```
#### 接口地址
```php 
http://89tr.chengchen.com/index/getlog
```
#### 响应
```php 
{
    "status": 200,
    "msg": "ok",
    "data": [
        [
            {
                "id": "80",
                "group_id": "1628493755",
                "sku": "boss_1",
                "price": "3.99",
                "diamond": "500",
                "soldier": "巨石兵",
                "soldier_num": "50",
                "coin": "5000",
                "type": "0,1,",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            },
            {
                "id": "81",
                "group_id": "1628493755",
                "sku": "boss_2",
                "price": "9.99",
                "diamond": "1000",
                "soldier": "巨石兵",
                "soldier_num": "12",
                "coin": "12000",
                "type": "1,",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            },
            {
                "id": "82",
                "group_id": "1628493755",
                "sku": "boss_3",
                "price": "19.90",
                "diamond": "2500",
                "soldier": "巫毒娃娃",
                "soldier_num": "30",
                "coin": "30000",
                "type": "",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            },
            {
                "id": "83",
                "group_id": "1628493755",
                "sku": "boss_4",
                "price": "499.44",
                "diamond": "6544",
                "soldier": "巫毒娃娃",
                "soldier_num": "94",
                "coin": "8004",
                "type": "0,",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            },
            {
                "id": "84",
                "group_id": "1628493755",
                "sku": "boss_5",
                "price": "99.99",
                "diamond": "14000",
                "soldier": "巫毒娃娃",
                "soldier_num": "600",
                "coin": "200000",
                "type": "",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            },
            {
                "id": "85",
                "group_id": "1628493755",
                "sku": "boss_6",
                "price": "199.00",
                "diamond": "7809",
                "soldier": "巨石兵",
                "soldier_num": "778",
                "coin": "98798",
                "type": "",
                "package_type": "pvp冠军礼包",
                "name": "user_xTF",
                "updateTime": "2021-08-09 15:22:35"
            }
        ],
        [
            {
                "id": "92",
                "group_id": "1628495234",
                "sku": "boss_1",
                "price": "3.90",
                "diamond": "5000",
                "soldier": "投矛手",
                "soldier_num": "50",
                "coin": "5000",
                "type": "0,2,4",
                "package_type": "boss冠军礼包",
                "name": "user_3Gv",
                "updateTime": "2021-08-09 15:47:14"
            },
            {
                "id": "93",
                "group_id": "1628495234",
                "sku": "boss_2",
                "price": "9.90",
                "diamond": "10000",
                "soldier": "巫毒娃娃",
                "soldier_num": "120",
                "coin": "12000",
                "type": "2,3,4",
                "package_type": "boss冠军礼包",
                "name": "user_3Gv",
                "updateTime": "2021-08-09 15:47:14"
            },
            {
                "id": "94",
                "group_id": "1628495234",
                "sku": "boss_3",
                "price": "19.90",
                "diamond": "25000",
                "soldier": "投矛手",
                "soldier_num": "300",
                "coin": "30000",
                "type": "2,3,4",
                "package_type": "boss冠军礼包",
                "name": "user_3Gv",
                "updateTime": "2021-08-09 15:47:14"
            },
            {
                "id": "95",
                "group_id": "1628495234",
                "sku": "boss_4",
                "price": "499.99",
                "diamond": "65000",
                "soldier": "投矛手",
                "soldier_num": "900",
                "coin": "80000",
                "type": "2,3,4",
                "package_type": "boss冠军礼包",
                "name": "user_3Gv",
                "updateTime": "2021-08-09 15:47:14"
            },
            {
                "id": "96",
                "group_id": "1628495234",
                "sku": "boss_5",
                "price": "99.99",
                "diamond": "14000",
                "soldier": "巨石兵",
                "soldier_num": "6000",
                "coin": "200000",
                "type": "3,4",
                "package_type": "boss冠军礼包",
                "name": "user_3Gv",
                "updateTime": "2021-08-09 15:47:14"
            }
        ]
    ]
}
```

# 4.目录结构

```php 
.
├── README.md
├── classes
│   ├── ctrl
│   │   ├── IndexCtrl.php
│   ├── dao
│   │   ├── CacheDao.php
│   │   ├── ConstDaoBase.php
│   │   ├── DaoBase.php
│   │   └── SampleDao.php
│   ├── exception
│   │   └── CommonException.php
│   ├── report
│   │   ├── locustfile.py
│   │   └── report_1628499741.165128.html
│   ├── service
│   │   ├── AnswerService.php
│   │   ├── BaseService.php
│   │   ├── CacheService.php
│   │   ├── ManagerService.php
│   │   ├── SampleService.php
│   │   └── UserService.php
│   ├── unitTest
│   │   └── ManagerServiceTest.php
│   └── template
│       ├── user
│       │   ├── boss.html
│       │   ├── changepwd.html
│       │   ├── log.html
│       │   ├── login.html
│       │   └── pvp.html
│       └── welcome.html
└── webroot
    ├── index.php


```
## 4.1 逻辑分层
  ```php

    classes/ctrl是请求控制层

    classes/service是业务控制层

    classes/unitTest是测试层

    webroot/index.php是入口
  ```
## 5.运行和测试
### 5.1 如何部署运行服务
  ```php
使用docker运行容器，容器包含 nginx、php、php-fpm

配置文件根目录为项目根目录webroot，运行端口为8000
  ```
### 5.2 如何测试接口
  ```php
  终端进入 report 目录
  运行 locust 
  ```