<?php /* Smarty version Smarty-3.1.13, created on 2021-08-09 15:59:51
         compiled from "../template/template/user/log.html" */ ?>
<?php /*%%SmartyHeaderCode:11261852696110db7e648988-39816248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a3bdc2651f38700f00d947b02142a3fd48912a6' => 
    array (
      0 => '../template/template/user/log.html',
      1 => 1628495990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11261852696110db7e648988-39816248',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6110db7e6a12e6_07281916',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6110db7e6a12e6_07281916')) {function content_6110db7e6a12e6_07281916($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
</head>

<body>
    <style>

    </style>

    <div id="app">
        <el-button type="primary" round @click="topvp">前往PVP礼包管理</el-button>
        <el-button type="primary" round @click="toboss">前往BOSS冠军礼包管理</el-button>
        <div class="px-5">
            <el-table :data="tableDatas" :span-method="objectSpanMethod" stripe border  :header-cell-style="{textAlign: 'center'}"
                style="width: 100%; margin-top: 20px" :cell-style="cellStyle">
                <el-table-column label="" width="180" prop="package_type">
                </el-table-column>
                <el-table-column prop="sku" label="sku">
                </el-table-column>
                <el-table-column prop="price" label="价格">
                </el-table-column>
                <el-table-column prop="diamond" label="钻石奖励">
                </el-table-column>
                <el-table-column prop="soldier" label="士兵">
                </el-table-column>
                <el-table-column prop="soldier_num" label="士兵数量">
                </el-table-column>
                <el-table-column prop="coin" label="金币数量">
                </el-table-column>
                <el-table-column prop="updateTime" label="修改日期">
                </el-table-column>
                <el-table-column prop="name" label="修改人">
                </el-table-column>
            </el-table>
        </div>
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
                tableDatas:[],
                titleFirstLength:'',
                res:{
                    "status": 200,
                    "msg": "ok",
                    "data": []
                },
                titleSecLength:'',
                allLength:[]
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            getList() {
                console.log('getlist')
                axios.get('http://89tr.chengchen.com/index/getlog')
                    .then((res)=> {
                        console.log(res.data.data);
                        res.data.data.forEach((item,index)=>{
                                console.log(this.allLength)
                                this.tableDatas = this.tableDatas.concat(item)
                            })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getTableData() {
                let spanOneArr = [],
                    spanTwoArr = [],
                    concatOne = 0,
                    concatTwo = 0;
                this.tableDatas.forEach((item, index) => {
                    if (index === 0) {
                        spanOneArr.push(1);
                        spanTwoArr.push(1);
                    } else {
                        if (item.package_type === this.tableDatas[index - 1].package_type) { //第一列需合并相同内容的判断条件
                            spanOneArr[concatOne] += 1;
                            spanOneArr.push(0);
                        } else {
                            spanOneArr.push(1);
                            concatOne = index;
                        };
                    }
                });
                return {
                    one: spanOneArr,
                    two: spanTwoArr
                }
            },
            cellStyle({row,column,rowIndex,columnIndex}){
                if(row.type.indexOf(columnIndex-1)!==-1){
                    return{ textAlign: 'center',background:'pink' }
                }
                else{
                    return{ textAlign: 'center',background:'white' }
                }

            },
            toboss(){
                window.location.href="http://89tr.chengchen.com/index/toboss";
            },
            topvp(){
                window.location.href="http://89tr.chengchen.com/index/topvp";
            },
            objectSpanMethod({ row, column, rowIndex, columnIndex }) {
                console.log( row, column, rowIndex, columnIndex )
                if (columnIndex === 0) {
                    const _row = (this.getTableData().one)[rowIndex];
                    const _col = _row > 0 ? 1 : 0;
                    return {
                        rowspan: _row,
                        colspan: _col
                    }
                }
            },
        }

    })
</script>

</html>
<?php }} ?>