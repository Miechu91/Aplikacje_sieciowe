<!DOCTYPE HTML>
<html>
	<head>
		<title>Logowanie - Piotr Miechowski</title>
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
								<form action="{$conf->action_url}login" method="post">
									<div class="row gtr-50 gtr-uniform">
									<div class="col-8 col-12-mobilep">
										<h4>Login:</h4>
										<input id="id_login" type="text" name="login"/><br />
										<h4>Hasło:</h4>
										<input id="id_pass" type="password" name="hasło" /><br />
									</div>
									<div class="col-4 col-12-mobilep">
										<br /><br /><br /><br /><br /><input type="submit" value="Zaloguj" class="fit" />
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
								{if $msgs->isInfo()}
									<h4>Informacja: </h4>
										<ol>
											{foreach $msgs->getInfos() as $inf}
												{strip}
													<li>{$inf}</li>
												{/strip}
											{/foreach}
										</ol>
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