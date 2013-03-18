<?php
    require_once("header.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$user = new auth(&$email,&$password);
    $user = auth::const_with_two_arg(&$email, &$password);
    $xtpl = new XTemplate(TPL . "login.xtpl");
    if($user->get_success() == 1) {
        $xtpl->assign('TITLE','Login Succesful');
        $xtpl->assign('MESSAGE','Welcome back, '.$email);
    }
    else {
        $xtpl->assign('TITLE','Login Deny');
        $xtpl->assign('MESSAGE','Wrong Email or Password');
    }
    
        /*產生主頁面*/
        $xtpl->assign('EMAIL',$email);
        //$xtpl = new XTemplate(TPL . "login.xtpl");
        $xtpl->assign_file('main_top', TPL . "main_top.xtpl");
        #$xtpl->assign_file('orbit_slider', TPL . "orbit_slider.xtpl");
        $xtpl->assign_file('main_down', TPL . "main_down.xtpl");

        /*import main_top*/
        require_once "main_top.php";

        /*import main_down*/
        require_once "main_down.php";
        
        /*finish parse & output*/
        $xtpl->parse('main.container');
        $xtpl->parse('main');
        $xtpl->out('main');
