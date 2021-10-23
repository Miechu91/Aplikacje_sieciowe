<!DOCTYPE HTML>
<html>
	<head>
		<title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$app_url}/assets/css/main.css" />
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
								<form action="{$app_url}/app/calc.php" method="post">
									<div class="row gtr-50 gtr-uniform">
									<div class="col-8 col-12-mobilep">
										<h4>Kwota kredytu (zł):</h4>
										<input type="text" name="kwota" id="id_kwota" value="{$kwota}" placeholder="Podaj kwotę kredytu" /><br />
										<h4>Okres kredytowania (lata):</h4>
										<input type="text" name="lata" id="id_lata" value="{$lata}" placeholder="Podaj okres kredytowania" /><br />
										<h4>Oprocentowanie (%):</h4>
										<input type="text" name="procent" id="id_procent" value="{$procent}" placeholder="Podaj oprocentowanie" />
									</div>
									<div class="col-4 col-12-mobilep">
										<br /><br /><br /><br /><br /><input type="submit" value="Oblicz" class="fit" />
									</div>
									</div>
								</form>
							</section>
							<section>
								<span class="icon solid major fa-chart-area accent3"></span>
								{if isset($messages)}
								{if count($messages) > 0}
								<h4>Wystąpiły błędy: </h4>
								<ol>
									{foreach  $messages as $msg}
									{strip}
									<li>{$msg}</li>
									{/strip}
									{/foreach}
								</ol>
								{/if}
								{/if}

								{if isset($result)}
									<h4>Kwota całkowita kredytu:</h4>
									<p>{$kwota_calkowita} zł</p>
									<h4>Miesięczna rata:</h4>
									<p>{$result} zł</p>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>