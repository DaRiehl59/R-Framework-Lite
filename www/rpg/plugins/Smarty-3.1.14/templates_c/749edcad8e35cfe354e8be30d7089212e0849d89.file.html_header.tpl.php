<?php /* Smarty version Smarty-3.1.14, created on 2015-09-16 16:44:16
         compiled from "./view/templates/html_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212538941255f97ec6896e05-07526989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749edcad8e35cfe354e8be30d7089212e0849d89' => 
    array (
      0 => './view/templates/html_header.tpl',
      1 => 1442414652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212538941255f97ec6896e05-07526989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_55f97ec69a1591_94632013',
  'variables' => 
  array (
    'head_title' => 0,
    'head_charset' => 0,
    'generator' => 0,
    'head_metas' => 0,
    'head_styles' => 0,
    'URI_root' => 0,
    'head_scripts' => 0,
    'head_favicon' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f97ec69a1591_94632013')) {function content_55f97ec69a1591_94632013($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
		<meta charset="<?php echo $_smarty_tpl->tpl_vars['head_charset']->value;?>
">
		<meta name="generator" content="<?php echo $_smarty_tpl->tpl_vars['generator']->value;?>
">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['name'] = 'head_sec0';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_metas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total']);
?>
		<meta name="<?php echo $_smarty_tpl->tpl_vars['head_metas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec0']['index']]['name'];?>
" content="<?php echo $_smarty_tpl->tpl_vars['head_metas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec0']['index']]['content'];?>
">
<?php endfor; endif; ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['name'] = 'head_sec1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_styles']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total']);
?>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['head_styles']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec1']['index']];?>
">
<?php endfor; endif; ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['name'] = 'head_sec2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_scripts']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total']);
?>
		<script src="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['head_scripts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec2']['index']];?>
"></script>
<?php endfor; endif; ?>
<?php if ($_smarty_tpl->tpl_vars['head_favicon']->value){?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/favicon.ico">
<?php }?>
	</head>
	<body><?php }} ?>