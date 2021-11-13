<!DOCTYPE HTML>
<html>
	<head>
		<title>Kalkulator kredytowy - Piotr Miechowski</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
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
								<form action="{$conf->action_root}calcCompute" method="post">
									<div class="row gtr-50 gtr-uniform">
									<div class="col-8 col-12-mobilep">
										<h4>Kwota kredytu (zł):</h4>
										<input type="text" name="kwota" id="id_kwota" value="{$form->kwota}" placeholder="Podaj kwotę kredytu" /><br />
										<h4>Okres kredytowania (lata):</h4>
										<input type="text" name="lata" id="id_lata" value="{$form->lata}" placeholder="Podaj okres kredytowania" /><br />
										<h4>Oprocentowanie (%):</h4>
										<input type="text" name="procent" id="id_procent" value="{$form->procent}" placeholder="Podaj oprocentowanie" />
									</div>
									<div class="col-4 col-12-mobilep">
										<br /><br /><br /><br /><br /><input type="submit" value="Oblicz" class="fit" />
									</div>
									</div>
								</form>
							</section>
							<section>
								<span class="icon solid major fa-chart-area accent3"></span>
								{if $msgs->isError()}
								<h4>Wystąpiły błędy: </h4>
								<ol>
									{foreach $msgs->getErrors() as $err}
										{strip}
									<li>{$err}</li>
									{/strip}
									{/foreach}
								</ol>
								{/if}

								{if isset($res->result)}
									<h4>Kwota całkowita kredytu:</h4>
									<p>{$res->kwota_calkowita} zł</p>
									<h4>Miesięczna rata:</h4>
									<p>{$res->result} zł</p>
								{/if}
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
			<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.dropotron.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
			<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/assets/js/util.js"></script>
			<script src="{$conf->app_url}/assets/js/main.js"></script>

	</body>
</html>