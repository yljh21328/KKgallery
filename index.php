<?php
    require_once "header.php";

	/*產生主頁面*/
	$xtpl = new XTemplate(TPL . "index.xtpl");
	$xtpl->assign_file('main_top', TPL . "main_top.xtpl");
	$xtpl->assign_file('main_down', TPL . "main_down.xtpl");
	/*import main_top*/
	require_once "main_top.php";
    /*import main_down*/
	require_once "main_down.php";
	
    if(!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
        $xtpl->parse('main.container.SIGNUP');
    }
	/*finish parse & output*/
    
	$xtpl->parse('main.container');
    $xtpl->parse('main');
	$xtpl->out('main');

