<?php
	require_once("header.php");
    //global $db;
	
	//$sql = "SELECT * FROM `member` WHERE password='d7cab98bf1a5b37fdaafabe55ecba4b2'";
	//$result = $db->query($sql);	
	//list($email) = mysql_fetch_row($result);
	//echo htmlspecialchars_decode($email);
	
	/*接收register form*/
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	//echo $email . "\n";
	//echo $password . "\n";
	//echo $gender . "\n";
	
	/*htmlspecialchars*/
	$email = htmlspecialchars($email);
	$password = htmlspecialchars($password);
	$gender = htmlspecialchars($gender);
	//echo $email . "\n";
	//echo $password . "\n";
	//echo $gender . "\n";	
	register::insert($email, $password, $gender);

	/*產生主頁面*/
	$xtpl = new XTemplate(TPL . "reg.xtpl");
	$xtpl->assign_file('main_top', TPL . "main_top.xtpl");
	$xtpl->assign('EMAIL',$email);
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