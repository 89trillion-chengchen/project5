import time
from locust import HttpUser, task, between

class QuickstartUser(HttpUser):
    wait_time = between(1, 2.5)


    @task
    def req_getBossDate(self):
        login_response = self.client.get('/index/getBossDate')

    @task
    def req_getPvpDate(self):
        login_response = self.client.get('/index/getPvpDate')

    @task
    def req_getlog(self):
        login_response = self.client.get('/index/getlog')

    @task
    def req_upBossDate(self):
        data = {
        "param":[
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
        login_response = self.client.post('/index/upBossDate', data=data)

    @task
    def req_upPVPDate(self):
        data = {
        "param":[
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
        login_response = self.client.post('/index/upPVPDate', data=data)