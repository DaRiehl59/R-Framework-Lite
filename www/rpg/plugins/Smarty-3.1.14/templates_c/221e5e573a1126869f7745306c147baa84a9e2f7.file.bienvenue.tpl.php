<?php /* Smarty version Smarty-3.1.14, created on 2015-09-16 16:55:53
         compiled from "./view/templates/bienvenue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144543438555f97fef8bd7e6-66752257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '221e5e573a1126869f7745306c147baa84a9e2f7' => 
    array (
      0 => './view/templates/bienvenue.tpl',
      1 => 1442415338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144543438555f97fef8bd7e6-66752257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_55f97fef96cad1_13560420',
  'variables' => 
  array (
    'application_name' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f97fef96cad1_13560420')) {function content_55f97fef96cad1_13560420($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="bienvenue">
			<h1><?php echo $_smarty_tpl->tpl_vars['application_name']->value;?>
</h1>
			<h2>Bienvenue</h2>
			<p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
		</div>
<?php echo $_smarty_tpl->getSubTemplate ("html_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>