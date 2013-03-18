<?php
if(!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    $xtpl->parse('main.TOP.login_yet');
}
else {
    $xtpl->assign('USER', $_SESSION['email']);
    $xtpl->parse('main.TOP.login_success');
}
$xtpl->parse('main.TOP');
