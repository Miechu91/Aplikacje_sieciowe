<?php
require_once 'core/Config.class.php';
$conf = new core\Config();
include 'config.php'; //ustaw konfigurację

function &getConf(){ global $conf; return $conf; }

//załaduj definicję klasy Messages i stwórz obiekt
require_once 'core/Messages.class.php';
$msgs = new core\Messages();

function &getMessages(){ global $msgs; return $msgs; }

//przygotuj Smarty, twórz tylko raz - wtedy kiedy potrzeba
$smarty = null;
function &getSmarty(){
    global $smarty;
    if (!isset($smarty)){
        //stwórz Smarty i przypisz konfigurację i messages
        include_once 'core/smarty/Smarty.class.php';
        $smarty = new Smarty();
        //przypisz konfigurację i messages
        $smarty->setTemplateDir('app/views/templates');
        $smarty->setCompileDir('app/views/templates_c');
        $smarty->assign('conf',getConf());
        $smarty->assign('msgs',getMessages());
    }
    return $smarty;
}

require_once 'core/ClassLoader.class.php'; //załaduj i stwórz loader klas
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

require_once 'core/functions.php';

$action = getFromRequest('action');