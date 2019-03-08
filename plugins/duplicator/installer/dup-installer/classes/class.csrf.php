<?php
defined("ABSPATH") or die("");

class DUPX_CSRF {
	
	/** Session var name
	 * @var string
	 */
	public static $prefix = '_DUPX_CSRF';
	
	/** Generate DUPX_CSRF value for form
	 * @param	string	$form	- Form name as session key
	 * @return	string	- token
	 */
	public static function generate($form = NULL) {
		if (!empty($_COOKIE[DUPX_CSRF::$prefix . '_' . $form])) {
			$token = $_COOKIE[DUPX_CSRF::$prefix . '_' . $form];
		} else {
            $token = DUPX_CSRF::token() . DUPX_CSRF::fingerprint();
		}
		$cookieName = DUPX_CSRF::$prefix . '_' . $form;
        $ret = DUPX_CSRF::setCookie($cookieName, $token);
		return $token;
	}
	
	/** Check DUPX_CSRF value of form
	 * @param	string	$token	- Token
	 * @param	string	$form	- Form name as session key
	 * @return	boolean
	 */
	public static function check($token, $form = NULL) {
		if (!self::isCookieEnabled()) {
			return true;
		}
		if (isset($_COOKIE[DUPX_CSRF::$prefix . '_' . $form]) && $_COOKIE[DUPX_CSRF::$prefix . '_' . $form] == $token) { // token OK
			return true;
			// return (substr($token, -32) == DUPX_CSRF::fingerprint()); // fingerprint OK?
		}
		return FALSE;
	}
	
	/** Generate token
	 * @param	void
	 * @return  string
	 */
	protected static function token() {
		mt_srand((double) microtime() * 10000);
		$charid = strtoupper(md5(uniqid(rand(), TRUE)));
		return substr($charid, 0, 8) . substr($charid, 8, 4) . substr($charid, 12, 4) . substr($charid, 16, 4) . substr($charid, 20, 12);
	}
	
	/** Returns "digital fingerprint" of user
	 * @param 	void
	 * @return 	string 	- MD5 hashed data
	 */
	protected static function fingerprint() {
		return strtoupper(md5(implode('|', array($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']))));
	}

	public static function setCookie($cookieName, $cookieVal) {
		$_COOKIE[$cookieName] = $cookieVal;
		$domainPath = self::getDomainPath();
		return setcookie($cookieName, $cookieVal, time() + 10800, '/');
	}

	public static function getDomainPath() {
		return '/';
		// return str_replace('main.installer.php', '', $_SERVER['SCRIPT_NAME']);
	}
	
	/**
	* @return bool
	*/
	protected static function isCookieEnabled() {
		return (count($_COOKIE) > 0);
	}

	public static function resetAllTokens() {
		foreach ($_COOKIE as $cookieName => $cookieVal) {
			$step1Key = DUPX_CSRF::$prefix . '_step1';
			if ($step1Key != $cookieName && (0 === strpos($cookieName, DUPX_CSRF::$prefix) || 'archive' == $cookieName || 'bootloader' == $cookieName)) {
				// $domainPath = self::getDomainPath();
				setcookie($cookieName, '', time() - 86400, '/');
				unset($_COOKIE[$cookieName]);
			}
		}
	}
}