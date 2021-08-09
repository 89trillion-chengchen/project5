<?php /* Smarty version Smarty-3.1.13, created on 2021-08-06 12:10:06
         compiled from "../template/template/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:1254920032610cb61e00eaf4-49766976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fd5d6654716a5e983cdaf9896d757ba851571e1' => 
    array (
      0 => '../template/template/user/login.html',
      1 => 1552742273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1254920032610cb61e00eaf4-49766976',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'imageUrl' => 0,
    'copyright' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_610cb61e0e9501_20417354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610cb61e0e9501_20417354')) {function content_610cb61e0e9501_20417354($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    html,body{
        height: 100%;
        margin: 0;
        padding: 0;
    }
      body {
        background-color: #f5f5f5;
		background: url("<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['imageUrl']->value, ENT_QUOTES, 'UTF-8');?>
") no-repeat scroll center top transparent;
        background-size: cover;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
        margin-top: 40px;
        margin-bottom: 40px;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    input {
        width: 206px;
    }
    </style>

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script>top.location.href != self.location.href ? top.location.href = self.location.href : 1</script>
  </head>

  <body title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['copyright']->value, ENT_QUOTES, 'UTF-8');?>
">

    <div class="container">

      <form id ="myform" class="form-signin" action="/user/login" method="post" title="">
        <?php if ($_smarty_tpl->tpl_vars['message']->value){?>
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8');?>

        </div>
        <?php }?>
        <h2 class="form-signin-heading"></h2>
        <input type="text" class="input-block-level" name="username">
        <input type="password" class="input-block-level" name="password">
        <input type="text" name="captcha" maxlength="6" size="6">
        <button class="btn btn-large btn-primary" type="submit">Login</button>
      </form>
    </div> <!-- /container -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>

<script type="text/javascript">

	$("body").dblclick( function (evt) {

		evt = evt || window.event;
		var obj = evt.target || evt.srcElement;
		if ( obj.nodeName != "BODY" && obj.nodeName != "DIV" ) {
			return false;
		}

		if ( $("#myform").css("display") == "none" ) {
			$("#myform").css("display", "block");
		}
		else {
			$("#myform").css("display", "none");
		}
	});

</script>

</html>
<?php }} ?>