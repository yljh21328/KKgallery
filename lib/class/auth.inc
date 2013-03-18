<?php
class auth {
	private $email;
	private $password;
    private $success;
	function __construct() {
        $success = 0;
    }
    public static function const_with_two_arg(&$email, &$password) {
        $obj = new auth();
        $obj->set_email(&$email);
		$obj->set_password(&$password);
		$obj->check($obj->email, $obj->password);
        return $obj;
    }
    public static function construct_with_one_arg(&$email) {
        $obj = new auth();
        $obj->set_email(&$email);
        return $obj->check_username(&$email);
    }

    
	public function set_email(&$email) {
	    $this->email = $email;
	}
	public function set_password(&$password) {
	    $this->password = $password;
	}
    public function set_success($value) {
	    $this->success = $value;
	}
	public function get_email() {
	    return $this->email;
	}
	public function get_password() {
	    return $this->password;
	}
    public function get_success() {
	    return $this->success;
	}
	public function check(&$email,&$password) {
		$password = md5($password);
		global $db;
		$str = "SELECT COUNT(*) AS success FROM `member` WHERE email = '$email' and password = '$password'";
		$result = $db->query($str);
		$arr = mysql_fetch_array($result);
		if($arr["success"] == true) {
			$_SESSION['email'] = "$email";
			$_SESSION['password'] = "$password";
			//echo $_SESSION['email'];
			//echo $_SESSION['password'];
			//echo "Successful login!";
			//header("Refresh: 3; url=index.php");
            $this->set_success(1);
            //echo "yes!";
		}
		else {
		
			/*PHP 自動跳轉*/
	        //header("Refresh: 3; url=index.php");
            $this->set_success(0);
            //echo "no!";
		}
		    //echo "Deny access.";
		//echo $email."\n";
		//echo $password."\n";
	}
    public function check_username(&$email) {
		global $db;
		$str = "SELECT COUNT(*) AS success FROM `member` WHERE email = '$email'";
		$result = $db->query($str);
		$arr = mysql_fetch_array($result);
		if($arr["success"] == true) {
			return "這個帳號已有人使用";
		}
		else {
            return "這個帳號目前沒人使用";
		}
		    //echo "Deny access.";
		//echo $email."\n";
		//echo $password."\n";
	}
}