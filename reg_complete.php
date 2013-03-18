<?php
	require_once("header.php");
    
    /*PHP 自動跳轉*/
	header("Refresh: 3; url=index.php");
    
	/*接收create member form*/
	$mobile = $_POST['mobile'];
	$birth = $_POST['birth'];
	$email = $_POST['email'];
	
	//$gender = $_POST['gender'];
	//echo $email . "\n";
	//echo $password . "\n";
	//echo $gender . "\n";
	
	/*htmlspecialchars*/
	$mobile = htmlspecialchars($mobile);
	$birth =  htmlspecialchars($birth);
	$email =  htmlspecialchars($email);
	//echo $email . "\n";
	//echo $password . "\n";
	//echo $gender . "\n";	
	
	register::update($mobile, $birth, $email);

	/*產生主頁面*/
	$xtpl = new XTemplate(TPL . "reg_complete.xtpl");
	$xtpl->assign_file('main_top', TPL . "main_top.xtpl");
	$xtpl->assign_file('main_down', TPL . "main_down.xtpl");

	/*import main_top*/
	require_once("main_top.php");
    /*import main_down*/
	require_once("main_down.php");
	
	/*finish parse & output*/
    $xtpl->parse('main.container');
	$xtpl->parse('main');
	$xtpl->out('main');
	
?>
