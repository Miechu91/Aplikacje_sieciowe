<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : '';
$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : '';
$procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : '';

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lata) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $lata == "") {
	$messages [] = 'Nie podano okresu kredytowania';
}
if ( $procent == "") {
    $messages [] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $kwota, $lata, $procent są liczbami
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą';
	}

	if (! is_numeric( $lata )) {
		$messages [] = 'Okres kredytowania nie jest liczbą całkowitą';
	}
    if (! is_numeric( $procent )) {
        $messages [] = 'Oprocentowanie nie jest liczbą';
    }

    if ($kwota <= 0 || $lata <= 0 ) {
        $messages [] = 'Kwota i okres kredytowania muszą być większe od 0';
    }
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
global $role;

	//konwersja parametrów na int i double
    $kwota = doubleval($kwota);
    $lata = intval($lata);
    $procent = doubleval($procent);

    if ($role != 'admin' && $kwota >= 2000){
        $messages [] = 'Tylko administrator może wpisać kwotę kredytu większą niż 2000zł !';
    } else {
        $kwota_calkowita = ((($procent /100) * $kwota)+$kwota);
        $result = ((($procent /100) * $kwota)+$kwota)/($lata * 12);
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$lata,$procent,$result,$kwota_calkowita)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';