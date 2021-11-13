<?php
/* Smarty version 3.1.39, created on 2021-10-24 00:13:24
  from 'C:\xampp\htdocs\Zad4_szablony_smarty\templates\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617489046daaa3_19772730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd9c93175c4b636cc8c0bd5eba2dd169d44c3c98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zad4_szablony_smarty\\templates\\calc_view.tpl',
      1 => 1635027201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617489046daaa3_19772730 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
	<head>
		<title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Banner -->
				<section id="banner">
					<h2>Kalkulator kredytowy</h2>
					<p>Piotr Miechowski</p>
				</section>

			<!-- Main -->
				<section id="main" class="container">
					<section class="box special features">
						<div class="features-row">
							<section>
								<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
									<div class="row gtr-50 gtr-uniform">
									<div class="col-8 col-12-mobilep">
										<h4>Kwota kredytu (zł):</h4>
										<input type="text" name="kwota" id="id_kwota" value="<?php echo $_smarty_tpl->tpl_vars['kwota']->value;?>
" placeholder="Podaj kwotę kredytu" /><br />
										<h4>Okres kredytowania (lata):</h4>
										<input type="text" name="lata" id="id_lata" value="<?php echo $_smarty_tpl->tpl_vars['lata']->value;?>
" placeholder="Podaj okres kredytowania" /><br />
										<h4>Oprocentowanie (%):</h4>
										<input type="text" name="procent" id="id_procent" value="<?php echo $_smarty_tpl->tpl_vars['procent']->value;?>
" placeholder="Podaj oprocentowanie" />
									</div>
									<div class="col-4 col-12-mobilep">
										<br /><br /><br /><br /><br /><input type="submit" value="Oblicz" class="fit" />
									</div>
									</div>
								</form>
							</section>
							<section>
								<span class="icon solid major fa-chart-area accent3"></span>
								<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
								<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
								<h4>Wystąpiły błędy: </h4>
								<ol>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
									<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ol>
								<?php }?>
								<?php }?>

								<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
									<h4>Kwota całkowita kredytu:</h4>
									<p><?php echo $_smarty_tpl->tpl_vars['kwota_calkowita']->value;?>
 zł</p>
									<h4>Miesięczna rata:</h4>
									<p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 zł</p>
								<?php }?>
							</section>
						</div>
					</section>
				</div>
			</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
}
