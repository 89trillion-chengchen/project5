<?php /* Smarty version Smarty-3.1.13, created on 2021-08-09 15:53:57
         compiled from "../template/template/user/pvp.html" */ ?>
<?php /*%%SmartyHeaderCode:1191189794610d255d45c3c3-57060915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25d375367ec5d30798e3c740f8b7c0dca5f449d0' => 
    array (
      0 => '../template/template/user/pvp.html',
      1 => 1628495636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1191189794610d255d45c3c3-57060915',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_610d255d4a74a6_13939340',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610d255d4a74a6_13939340')) {function content_610d255d4a74a6_13939340($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
</head>

<body>
    <div id="app">
        <el-button type="primary" round @click="toboss">前往BOSS冠军礼包管理</el-button>
        <div class="px-5">
            <el-table :data="tableData" :span-method="objectSpanMethod" stripe border
                style="width: 100%; margin-top: 20px">
                <el-table-column label="" width="180">{{title}}
                </el-table-column>
                <el-table-column prop="name" label="sku">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.name" v-if="edit">
                        </el-input>
                        <span v-else>{{scope.row.name}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="price" label="价格">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.price" v-if="edit">
                        </el-input>
                        <span v-else>{{scope.row.price}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="diamond" label="钻石奖励">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.diamond" v-if="edit">
                        </el-input>
                        <span v-else>{{scope.row.diamond}}</span>
                    </template>
                </el-table-column>
                <el-table-column label="士兵">
                    <template slot-scope="scope">
                        <el-select class="filter-item" v-model="scope.row.soldier" v-if="edit" placeholder="士兵"
                            clearable>
                            <el-option v-for="item in statusList" :key="item.value" :label="item.label"
                                :value="item.value"></el-option>
                        </el-select>
                        <span v-else>{{scope.row.soldier}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="soldiersNum" label="士兵数量">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.soldier_num" v-if="edit">
                        </el-input>
                        <span v-else>{{scope.row.soldier_num}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="money" label="金币数量">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.coin" v-if="edit">
                        </el-input>
                        <span v-else>{{scope.row.coin}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="amount3" label="操作">
                    <template slot-scope="scope">
                        <el-button type="warning" size="mini" @click="edit=!edit">修改</el-button>
                        <el-button type="primary" size="mini" @click="confDia=true">确认</el-button>
                        <el-button type="danger" size="mini" @click="tolog">操作记录</el-button>
                    </template>
                </el-table-column>

            </el-table>
        </div>
        <el-dialog title="提交修改" :visible.sync="confDia" width="30%">
            <span>确认提交修改吗</span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="confDia = false">取 消</el-button>
                <el-button type="primary" @click="handleSubmit">确 定</el-button>
            </span>
        </el-dialog>

    </div>


</body>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    new Vue({
        el: '#app',
        data: function () {
            return {
                visible: false,
                show: false,
                confDia: false,
                edit: false,
                title: 'PVP冠军礼包',
                tableData: [],
                tableDatas:[],
                span_num:0,
                statusList: [
                    {
                        label: '投矛手',
                        value: '投矛手'
                    },
                    {
                        label: '巫毒娃娃',
                        value: '巫毒娃娃'
                    },
                    {
                        label: '巨石兵',
                        value: '巨石兵'
                    }
                ],


            }
        },
        mounted() {
            this.getList();
        },

        methods: {
            getList() {
                console.log('getlist')
                axios.get('http://89tr.chengchen.com/index/getPvpDate')
                    .then((response)=> {
                        this.tableData = response.data.data
                        this.span_num=this.tableData.length;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            //发送修改请求
            async handleSubmit() {
                let param = this.tableData;
                let type = 1;
                console.log(param);
                axios({
                    method : 'post',
                    url : `http://89tr.chengchen.com/index/upPvpDate`,
                    data : {param : param},
                    headers:{'Content-Type': 'application/json'},
                }).then((res)=> {
                    console.log(res.data);
                    this.confDia = false;
                    this.edit=false;
                }).catch((res) =>{
                    console.log(res)
                })
            },
            tolog(){
                window.location.href="http://89tr.chengchen.com/index/tolog";
            },
            toboss(){
                window.location.href="http://89tr.chengchen.com/index/toboss";
            },
            objectSpanMethod({ row, column, rowIndex, columnIndex }) {
                if (columnIndex === 0 || columnIndex === 7) {
                    if (rowIndex === 0) {
                        return {
                            rowspan: this.span_num,
                            colspan: 1
                        };
                    } else {
                        return {
                            rowspan: 0,
                            colspan: 0
                        };
                    }
                }
            }
        }

    })
</script>

</html>
<?php }} ?>