<?php
// KONTROLER strony kalkulatora
require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl
{

    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

// 1. pobranie parametrów
    public function getParams()
    {
        $this->form->kwota = getFromRequest('kwota');
        $this->form->lata = getFromRequest('lata');
        $this->form->procent = getFromRequest('procent');
    }
// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
    public function validate()
    {

// sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->procent))) {
            //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            getMessages()->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów.');
        }

// sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->kwota == "") {
            getMessages()->addError('Nie podano kwoty kredytu');
        }
        if ($this->form->lata == "") {
            getMessages()->addError('Nie podano okresu kredytowania');
        }
        if ($this->form->procent == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }

//nie ma sensu walidować dalej gdy brak parametrów
        if (!getMessages()->isError()) {

            // sprawdzenie, czy $kwota, $lata, $procent są liczbami
            if (!is_numeric($this->form->kwota)) {
                getMessages()->addError('Kwota nie jest liczbą');
            }
            if (!is_numeric($this->form->lata)) {
                getMessages()->addError('Okres kredytowania nie jest liczbą całkowitą');
            }
            if (!is_numeric($this->form->procent)) {
                getMessages()->addError('Oprocentowanie nie jest liczbą');
            }

            // Sprawdzenie czy $kwota i $lata nie są 0.
            if ($this->form->kwota <= 0 || $this->form->lata <= 0) {
                getMessages()->addError('Kwota i okres kredytowania muszą być większe od 0');
            }
            return !getMessages()->isError();
        }
    }
// 3. wykonaj zadanie jeśli wszystko w porządku
        public function process()
    {
        $this->getparams();

        if ($this->validate()) {

                //konwersja parametrów na int i double
            $this->form->kwota = doubleval($this->form->kwota);
            $this->form->lata = intval($this->form->lata);
            $this->form->procent = doubleval($this->form->procent);
            getMessages()->addInfo('Parametry poprawne.');

            $this->result->kwota_calkowita = ((($this->form->procent / 100) * $this->form->kwota) + $this->form->kwota);
            $this->result->result = ((($this->form->procent / 100) * $this->form->kwota) + $this->form->kwota) / ($this->form->lata * 12);
            getMessages()->addInfo('Wykonano obliczenia.');
        }
        $this->generateView();
    }
// 4. Wywołanie widoku z przekazaniem zmiennych
    public function generateView()
    {
        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('res',$this->result);
        getSmarty()->display('calc_view.tpl');
    }
}