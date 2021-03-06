<?php

/*
// +--------------------------------------------------------------------------+
// | Project:    TBDevYSE - TBDev Yuna Scatari Edition                        |
// +--------------------------------------------------------------------------+
// | This file is part of TBDevYSE. TBDevYSE is based on TBDev,               |
// | originally by RedBeard of TorrentBits, extensively modified by           |
// | Gartenzwerg.                                                             |
// |                                                                          |
// | TBDevYSE is free software; you can redistribute it and/or modify         |
// | it under the terms of the GNU General Public License as published by     |
// | the Free Software Foundation; either version 2 of the License, or        |
// | (at your option) any later version.                                      |
// |                                                                          |
// | TBDevYSE is distributed in the hope that it will be useful,              |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with TBDevYSE; if not, write to the Free Software Foundation,      |
// | Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA            |
// +--------------------------------------------------------------------------+
// |                                               Do not remove above lines! |
// +--------------------------------------------------------------------------+
*/

# IMPORTANT: Do not edit below unless you know what you are doing!
if(!defined('IN_TRACKER') && !defined('IN_ANNOUNCE'))
  die("Hacking attempt!");

if (!function_exists("htmlspecialchars_uni")) {
	function htmlspecialchars_uni($message) {
		$message = preg_replace("#&(?!\#[0-9]+;)#si", "&amp;", $message); // Fix & but allow unicode
		$message = str_replace("<","&lt;",$message);
		$message = str_replace(">","&gt;",$message);
		$message = str_replace("\"","&quot;",$message);
		$message = str_replace("  ", "&nbsp;&nbsp;", $message);
		return $message;
	}
}

// DEFINE IMPORTANT CONSTANTS
define ('TIMENOW', time());
$url = explode('/', htmlspecialchars_uni($_SERVER['PHP_SELF']));
array_pop($url);
$DEFAULTBASEURL = (($_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://").htmlspecialchars_uni($_SERVER['HTTP_HOST']).implode('/', $url);
$BASEURL = $DEFAULTBASEURL;
$announce_urls = array();
$announce_urls[] = "$DEFAULTBASEURL/announce.php";

// SECURITY
define ('COOKIE_SALT', 'default'); // Заполните эту переменную любым мусором, сиволом эдак 32 - нужно для соли кукисов
// После смены этих двух параметров всем пользователям надо будет ввести логин пароль
define ('COOKIE_UID', 'uid'); // Имя куки для userid
define ('COOKIE_PASSHASH', 'pass'); // Имя куки для пароля

// DEFINE TRACKER GROUPS
define ("UC_USER", 0);
define ("UC_POWER_USER", 1);
define ("UC_VIP", 2);
define ("UC_UPLOADER", 3);
define ("UC_MODERATOR", 4);
define ("UC_ADMINISTRATOR", 5);
define ("UC_SYSOP", 6);

?>