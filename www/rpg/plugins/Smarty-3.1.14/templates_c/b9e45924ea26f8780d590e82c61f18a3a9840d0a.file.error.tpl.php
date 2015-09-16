<?php /* Smarty version Smarty-3.1.14, created on 2015-09-16 16:37:58
         compiled from "./view/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132858717255f97ec686b6e5-97595068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9e45924ea26f8780d590e82c61f18a3a9840d0a' => 
    array (
      0 => './view/templates/error.tpl',
      1 => 1442408895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132858717255f97ec686b6e5-97595068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_55f97ec6892331_15112185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f97ec6892331_15112185')) {function content_55f97ec6892331_15112185($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="error">
			<h1>Erreur</h1>
			<p><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</p>
		</div>
<?php echo $_smarty_tpl->getSubTemplate ("html_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>