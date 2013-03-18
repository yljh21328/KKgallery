<?php
session_start();
    
/*Check Page and login state*/
$index = strrpos($_SERVER["REQUEST_URI"],"/") + 1;
$filename = substr($_SERVER[REQUEST_URI],$index);
if($filename != "index.php") {
    if(!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
        header("Location: index.php");
        //exit;
    }
}

require_once('../config.php');
require_once(CPLIB . "xtpl.php");
require_once(CPLIB . "db.php");

/*產生資料庫物件*/
$db = new DB();
$db->set_enc('utf8');
/*include class file*/
require_once(LIB . "class/register.inc");
require_once(LIB . "class/auth.inc");
?>
