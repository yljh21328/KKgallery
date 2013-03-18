<?php
class register {
    public static function insert(&$email,&$password,&$gender) {
	    
		//echo $email;
		//echo $password;
		//echo $gender;
		//$email = htmlspecialchars($email);
		//$password = htmlspecialchars($password);
		//$gender = htmlspecialchars($gender);
		
		/*MD5 password */
		$password = md5($password);
		
		/*mysql_real_escape_string*/
		
		/*dev4 預設的 magic_quotes_gpc 是on 所以不需要mysql_real_escape_string*/
		//$email = mysql_real_escape_string($email);
		//$password = mysql_real_escape_string($password);
		//$gender = mysql_real_escape_string($gender);
		
		//echo $email . "\n";
	//echo $password . "\n";
	//echo $gender . "\n";
		global $db;
		$sql = "INSERT INTO `member`(`email`, `password`, `gender`) VALUES('$email', '$password', '$gender')";
		$db->execute($sql);
		//$db->close();
	}	
	public static function update(&$mobile,&$birth,&$email) {
	    global $db;
		//echo $mobile;
		//echo $birth;
		//echo $email;
		//exit;
		$sql = "UPDATE `member` SET `mobile`='$mobile', `birth`='$birth' WHERE `email`='$email'";
		$db->execute($sql);
	}
}