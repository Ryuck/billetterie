<?php /* Smarty version Smarty3rc4, created on 2011-11-28 17:29:16
         compiled from "C:/wamp/www/billetterie/private/tpl/commande-result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16234ed3c4ec1f1016-54851168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2ab292a1d24efdefd553f4e4abea3aa88165119' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/commande-result.tpl',
      1 => 1322133055,
    ),
  ),
  'nocache_hash' => '16234ed3c4ec1f1016-54851168',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include 'C:\wamp\www\billetterie\private\libs\smarty\plugins\function.cycle.php';
?><table>
	<thead>
       <tr>
           <th class="datcom">Date commande</th>
           <th class="numcom">Numéro commande</th>
           <th class="clicom">Client</th>
           <th class="numclicom">Numéro client</th>
           <th class="pricom">Prix ttc</th>
           <th class="etacom">Etat</th>
           <th class="liencom"></th>
       </tr>
   </thead>
   <tbody>
   		<tr class="espace"><td></td></tr>
   		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commande')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['c']->total=($_from instanceof Traversable)?iterator_count($_from):count($_from);
 $_smarty_tpl->tpl_vars['c']->iteration=0;
 $_smarty_tpl->tpl_vars['c']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['lastcommande']['total'] = $_smarty_tpl->tpl_vars['c']->total;
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['c']->iteration++;
 $_smarty_tpl->tpl_vars['c']->index++;
 $_smarty_tpl->tpl_vars['c']->first = $_smarty_tpl->tpl_vars['c']->index === 0;
 $_smarty_tpl->tpl_vars['c']->last = $_smarty_tpl->tpl_vars['c']->iteration === $_smarty_tpl->tpl_vars['c']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['lastcommande']['first'] = $_smarty_tpl->tpl_vars['c']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['lastcommande']['last'] = $_smarty_tpl->tpl_vars['c']->last;
?>
			<tr class="<?php echo smarty_function_cycle(array('values'=>'repeat-1,repeat-2'),$_smarty_tpl->smarty,$_smarty_tpl);?>
  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['lastcommande']['last']){?>last <?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['lastcommande']['first']){?>first <?php }?>">
				<td><?php echo $_smarty_tpl->tpl_vars['c']->value['commande_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['c']->value['commande_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['c']->value['client_nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['client_prenom'];?>
</td>
				<td>CL<?php echo $_smarty_tpl->tpl_vars['c']->value['commande_fk_client_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['c']->value['prix'];?>
€</td>
				<td><?php echo $_smarty_tpl->tpl_vars['c']->value['commande_etat'];?>
</td>
				<td>
					<a href="#" class="details com-<?php echo $_smarty_tpl->tpl_vars['c']->value['commande_id'];?>
">Détails</a> - 
					<a href="#" class="facture com-<?php echo $_smarty_tpl->tpl_vars['c']->value['commande_id'];?>
">Facture</a> - 
					<a href="#" class="billets com+<?php echo $_smarty_tpl->tpl_vars['c']->value['commande_id'];?>
+<?php echo $_smarty_tpl->tpl_vars['c']->value['client_nom'];?>
+<?php echo $_smarty_tpl->tpl_vars['c']->value['client_prenom'];?>
">Envoyer les billets</a>
				</td>
			</tr>
		<?php }} ?>
   </tbody>
</table>
<?php $_template = new Smarty_Internal_Template("pagination.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>