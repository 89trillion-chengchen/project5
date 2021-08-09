<?php /* Smarty version Smarty-3.1.13, created on 2021-08-06 19:54:51
         compiled from "../template/template/main.html" */ ?>
<?php /*%%SmartyHeaderCode:1197938385610d230b2b7e97-46858335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd0b93f106f411d177a6e2b1def5326117ab3f5' => 
    array (
      0 => '../template/template/main.html',
      1 => 1512213426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1197938385610d230b2b7e97-46858335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iframeUrl' => 0,
    'permission' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_610d230b3b0210_99765573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610d230b3b0210_99765573')) {function content_610d230b3b0210_99765573($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars(@constant('SITE_NAME'), ENT_QUOTES, 'UTF-8');?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.layout.js"></script>
    <!-- Le styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 36px;
        padding-bottom: 5px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
  </head>
<body>
<script src="/js/jquery.mloading.js"></script>
<link href="/js/jquery.mloading.css" rel="stylesheet" media="screen">
<div class="ui-layout-center">
 <iframe id="main" width="100%" max-width="150%" scrolling="yes" height="100%" 
 frameborder="0" name="main" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iframeUrl']->value, ENT_QUOTES, 'UTF-8');?>
"></iframe>
</div>
<div class="ui-layout-north">
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/"><?php echo htmlspecialchars(@constant('SITE_NAME'), ENT_QUOTES, 'UTF-8');?>
</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">欢迎，<?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');?>
  &nbsp; | &nbsp;
            <a href="/user/logout" class="navbar-link">退出</a>
            <ul class="nav">
              <!-- <li class="active"><a href="/">首页</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
</div>
<!-- 
<div class="ui-layout-south">South</div>
<div class="ui-layout-east">East</div>
 -->
<div class="ui-layout-west" id="mainFrame">
        <div class="span2" style="width:163px">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"></li>
              <li class="active"><a href="/">首页</a></li>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['permission']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total']);
?>
                <?php if ($_smarty_tpl->tpl_vars['permission']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['act']==''){?>
                <li class="nav-header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['permission']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'], ENT_QUOTES, 'UTF-8');?>
</li>
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['permission']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isShow']=='1'){?>
                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['permission']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['act'], ENT_QUOTES, 'UTF-8');?>
" target="main"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['permission']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'], ENT_QUOTES, 'UTF-8');?>
</a></li>
                <?php }?>
                <?php }?>
                <?php endfor; endif; ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
</div>

<script type="text/javascript">
$(document).ready(function () {
	var myLayout = $('body').layout();
	myLayout.allowOverflow("center");

    $(".sidebar-nav li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    });

    $("#mainFrame").hover(function(){
    	$(this).css("overflow-y","scroll");
    },function(){
    	$(this).css("overflow-y","hidden");
    });
});
</script>
<script>

    $("li").click(function(e) {
        if(e.ctrlKey || e.metaKey)
        {
            return true;
        }
        var pass = true;
        //some validations
        if(pass == false){
            return false;
        }
        $(".ui-layout-center").mLoading();
        return true;
    });
</script>
</body>
</html>
<?php }} ?>