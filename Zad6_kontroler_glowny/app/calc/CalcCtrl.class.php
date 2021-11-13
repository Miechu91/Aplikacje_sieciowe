<?php
// KONTROLER strony kalkulatora
require_once $conf->root_path.'/libs/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';


// Smarty
require_once $conf->root_path.'/libs/smarty/Smarty.class.php';


class CalcCtrl
{

    private $msgs;   //wiadomości dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

// 1. pobranie parametrów
    public function getParams()
    {
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
        $this->form->procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
    }
// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
    public function validate()
    {

// sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->procent))) {
            //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            $this->msgs->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów.');
        }

// sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->kwota == "") {
            $this->msgs->addError('Nie podano kwoty kredytu');
        }
        if ($this->form->lata == "") {
            $this->msgs->addError('Nie podano okresu kredytowania');
        }
        if ($this->form->procent == "") {
            $this->msgs->addError('Nie podano oprocentowania');
        }

//nie ma sensu walidować dalej gdy brak parametrów
        if (!$this->msgs->isError()) {

            // sprawdzenie, czy $kwota, $lata, $procent są liczbami
            if (!is_numeric($this->form->kwota)) {
                $this->msgs->addError('Kwota nie jest liczbą');
            }
            if (!is_numeric($this->form->lata)) {
                $this->msgs->addError('Okres kredytowania nie jest liczbą całkowitą');
            }
            if (!is_numeric($this->form->procent)) {
                $this->msgs->addError('Oprocentowanie nie jest liczbą');
            }

            // Sprawdzenie czy $kwota i $lata nie są 0.
            if ($this->form->kwota <= 0 || $this->form->lata <= 0) {
                $this->msgs->addError('Kwota i okres kredytowania muszą być większe od 0');
            }
            return !$this->msgs->isError();
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
            $this->msgs->addInfo('Parametry poprawne.');

            $this->result->kwota_calkowita = ((($this->form->procent / 100) * $this->form->kwota) + $this->form->kwota);
            $this->result->result = ((($this->form->procent / 100) * $this->form->kwota) + $this->form->kwota) / ($this->form->lata * 12);
            $this->msgs->addInfo('Wykonano obliczenia.');
        }
        $this->generateView();
    }
// 4. Wywołanie widoku z przekazaniem zmiennych
    public function generateView()
    {
        global $conf;
        $smarty = new Smarty();
        $smarty->setTemplateDir($conf->root_path.'/templates');
        $smarty->setCompileDir($conf->root_path.'/templates_c');

        $smarty->assign('conf',$conf);
        $smarty->assign('msgs',$this->msgs);
        $smarty->assign('form',$this->form);
        $smarty->assign('res',$this->result);
        $smarty->display('calc_view.tpl');
    }
}