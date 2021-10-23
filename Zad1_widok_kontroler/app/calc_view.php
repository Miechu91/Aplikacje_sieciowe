<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota kredytu: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if (! (isset($kwota))){$kwota=0;} print($kwota); ?>" /> zł<br />
	<label for="id_lata">Okres kredytowania: </label>
	<input id="id_lata" type="text" name="lata" value="<?php if (! (isset($lata))){$lata=0;} print($lata); ?>" />
    <?php if ($lata==2 || $lata==3 || $lata==4){print("lata");}else{print("lat");} ?><br />
    <label for="id_procent">Oprocentowanie: </label>
    <input id="id_procent" type="text" name="procent" value="<?php if (! (isset($procent))){$procent=0;} print($procent); ?>" /> %<br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result) && isset($kwota_calkowita)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
    <?php echo 'Kwota całkowita kredytu: '.$kwota_calkowita; ?> zł
    <br />
    <?php echo 'Miesięczna rata: '.$result; ?> zł
</div>
<?php } ?>

</body>
</html>