# 1.整体思路
### 1.登陆注册
![Image text](https://raw.githubusercontent.com/89trillion-chengchen/project4/master/images/%E6%B5%81%E7%A8%8B%E5%9B%BE.jpg)
### 2.使用礼品码
![Image text](https://raw.githubusercontent.com/89trillion-chengchen/job3/master/images/%E6%B5%81%E7%A8%8B%E5%9B%BE3.jpg)

# 2.接口设计

### （1）获取世界BOSS冠军礼包信息
####请求方法  
```php 
HTTP POST
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
HTTP POST
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
HTTP POST
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

# 3.目录结构

```php 
.
├── README.md
├── classes
│   ├── ctrl
│   │   ├── GiftCodeCtrl.php
│   │   ├── LoginCtrl.php
│   ├── entity
│   │   ├── user.php
│   ├── service
│   │   ├── AnswerService.php
│   │   ├── BaseService.php
│   │   ├── CacheService.php
│   │   ├── GiftCodeService.php
│   │   ├── LoginService.php
│   │   └── SampleService.php
│   ├── unitTest
│   │   ├── GiftCodeServiceTest.php
│   │   └── LoginServiceTest.php
├── report
│   ├── locustfile.py
│   └── report_1628134286.6186502.html
└── webroot
    └── index.php

```
## 3.1 逻辑分层
  ```php

    classes/ctrl是请求控制层

    classes/service是业务控制层

    classes/unitTest是测试层

    webroot/index.php是入口
  ```
## 4.运行和测试
### 4.1 如何部署运行服务
  ```php
使用docker运行容器，容器包含 nginx、php、php-fpm

配置文件根目录为项目根目录webroot，运行端口为8000
  ```
### 4.2 如何测试接口
  ```php
  终端进入 report 目录
  运行 locust 
  ```