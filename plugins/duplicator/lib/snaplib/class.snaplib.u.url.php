<?php

if(!class_exists('SnapLibURLU')) {
	return;
}

/**
 * Utility class used for working with URLs
 *
 * Standard: PSR-2
 * @link http://www.php-fig.org/psr/psr-2
 *
 * @package SnapLib
 * @copyright (c) 2017, Snapcreek LLC
 * @license	https://opensource.org/licenses/GPL-3.0 GNU Public License
 *
 */
class SnapLibURLU
{

	/**
     * Append a new query value to the end of a URL
     *
     * @param string $url   The URL to append the new value to
     * @param string $key   The new key name
     * @param string $value The new key name value
     *
     * @return string Returns the new URL with with the query string name and value
     */
    public static function appendQueryValue($url, $key, $value)
    {
        $separator = (parse_url($url, PHP_URL_QUERY) == NULL) ? '?' : '&';
        $modified_url = $url."$separator$key=$value";

        return $modified_url;
    }

	/*
	 * Fetches current URL via php
	 *
	 * @param bool $queryString If true the query string will also be returned.
	 *
	 * @returns The current page url
	 */
    public static function getCurrentUrl($queryString = true) {
		$protocol = 'http';
		if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')) {
			$protocol .= 's';
			$protocolPort = $_SERVER['SERVER_PORT'];
		} else {
			$protocolPort = 80;
		}
		$host = $_SERVER['HTTP_HOST'];
		$port = $_SERVER['SERVER_PORT'];
		$request = $_SERVER['PHP_SELF'];

		$query = ($queryString === TRUE) ? $_SERVER['QUERY_STRING'] : "";
		$url = $protocol . '://' . $host . ($port == $protocolPort ? '' : ':' . $port) . $request . (empty($query) ? '' : '?' . $query);
		return $url;
	}
}
