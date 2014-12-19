<?php
class Hash {
	public static function make($string, $salt = '') {
		return password_hash($string, PASSWORD_BCRYPT, array("cost"=>12));
		// return hash('sha256', $string . $salt);
	}

	public static function salt($length) {
		return mcrypt_create_iv($length);
	}

	public static function unique() {
		return self::make(uniqid());
	}

	public static function check($string, $dbstring) {
		return password_verify($string, $dbstring);
	}
}