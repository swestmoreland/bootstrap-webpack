<?php
defined("ABSPATH") or die("");
/**	 * *****************************************************
 *  CLASS::DUPX_Http
 *  Http Class Utility */
class DUPX_HTTP
{
	/**
	 *  Do an http post request with html form elements
	 *  @param string $url		A URL to post to
	 *  @param string $data		A valid key/pair combo $data = array('key1' => 'value1', 'key2' => 'value2')
	 * 							generated hidden form elements
	 *  @return string		    An html form that will automatically post itself
	 */
	public static function post_with_html($url, $data)
	{
		$id = uniqid();
		$html = "<form id='".DUPX_U::esc_attr($id)."' method='post' action='".DUPX_U::esc_url($url)."'>\n";
		foreach ($data as $name => $value)
		{
			$html .= "<input type='hidden' name='".DUPX_U::esc_attr($name)."' value='".DUPX_U::esc_attr($value)."' />\n";
		}
		$html .= "</form>\n";
		$html .= "<script>$(document).ready(function() { $('#{$id}').submit(); });</script>";
		echo $html;
	}

	/**
	 *  Gets the URL of the current request
	 *  @param bool $show_query		Include the query string in the URL
	 *  @return string	A URL
	 */
	public static function get_request_uri($show_query = true)
	{
		$isSecure = false;

		if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || ($_SERVER['SERVER_PORT'] == 443))
		{
			$isSecure = true;
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
		{
			$isSecure = true;
		}
		$protocol = $isSecure ? 'https' : 'http';
		$url = "{$protocol}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$url = ($show_query) ? $url : preg_replace('/\?.*/', '', $url);
		return $url;
	}

	public static function parse_host($url)
	{
		$url = parse_url(trim($url));
		if ($url == false)
		{
			return null;
		}
		return trim($url['host'] ? $url['host'] : array_shift(explode('/', $url['path'], 2)));
	}
}
