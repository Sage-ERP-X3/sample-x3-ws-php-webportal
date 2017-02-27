<?php
require_once ('config/Config.php');
class Connect {
	private $login;
	private $passwd;
	function __construct($login, $passwd) {
		$this->login = $login;
		$this->passwd = $passwd;
	}
	
	public function isConnect() {
		$ret = false;
		
		if ($this->login == Config::$WEB_SITE_LOGIN && $this->passwd == Config::$WEB_SITE_PASSWD) {
			$ret = true;
		}
		return $ret;
	}
}
?>