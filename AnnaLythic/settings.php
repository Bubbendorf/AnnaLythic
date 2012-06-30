<?php
	/****************************************************************
	 * AnnaLythic -- GLOBAL SETTINGS
	 */

	$settings = array();

	// Database connexion (TODO: Check SQLite DSN)
	$settings['db']['type']   = 'mysql';       // Values: PDO engine (mysql, postgresql, sqlite...) (/!\ Only PDO.)
	$settings['db']['host']   = 'localhost';   // Where is hosted the database? (SQLite: tip here the path to the file.)
	$settings['db']['user']   = 'root';        // Username to use to connect the database.
	$settings['db']['pass']   = '';            // Password to use to connect the database.
	$settings['db']['base']   = 'AnnaLythic';  // The base to be used.
	$settings['db']['prefix'] = 'al_';		   // If this is not null, all tables will be prefixed.

	// If false, users geolocation will be disabled. In this case, you can delete the lib/GeoIP folder 
	// (size: >= 17 Mo, due to the database).
	$settings['geoip']['enabled'] = true;

	// Path to the GeoIP database (frequent file name: GeoLiteCity.dat). If you have purchased a license,
	// you can use a better database.
	$settings['geoip']['db']  = 'lib/GeoIP/GeoLiteCity.dat';

	// Operating System detection
	# === Usage
	# $settings['os'][] = array('OS Name', // Displayed in the dashboard
	#							'OS Regex (may be NULL if it is #OS Name#) for detection in User Agent', 
	#							'Regex for version ($1 must contains the version number) for detection in 
	#							 concerned User Agent. May be NULL if we can't detect the version.',
	#							'If dots are represented as an other character (example: "_" for Mac OS X), 
	#							 tip this character here; it will be replaced by a dot. In other case, leave 
	#							 this field NULL.'
	#					  );
	#
	# In case of changes, please publish your changes on Github (github.com/Bubbendorf/AnnaLythic)! Thanks :)
	
	$settings['os'][] = array('iPad', NULL, '#iPad; U; CPU OS ([0-9_]{3,})#', '_'); // Check this
	$settings['os'][] = array('iPhone', NULL, '#iPhone OS ([0-9_]{3,})#', '_');
	$settings['os'][] = array('iPod Touch', '#iPod#', '#iPhone OS ([0-9_]{3,})#', '_');
	$settings['os'][] = array('Android', NULL, '#Android ([0-9.]{3,})#');
	$settings['os'][] = array('BlackBerry', NULL, '#Version/([0-9.]{5})#');
	
	$settings['os'][] = array('Windows 8', '#Windows NT 6.2#', '8');
	$settings['os'][] = array('Windows 7', '#Windows NT 6.1#', '7');
	$settings['os'][] = array('Windows Vista', '#Windows NT 6.0#', 'Vista');
	$settings['os'][] = array('Windows XP', '#Windows NT 5.1#', 'XP');
	$settings['os'][] = array('Windows Server 2003', '#Windows NT 5.2#', '2003');
	$settings['os'][] = array('Windows 2000', '#Windows NT 5.0#', '2000');
	$settings['os'][] = array('Windows NT', '#Windows NT#', 'NT');
	$settings['os'][] = array('Windows 98', '#Windows 98#', '98');
	$settings['os'][] = array('Windows 95', '#Windows 95#', '95');
	$settings['os'][] = array('Windows 3.1', '#Windows 3.1#', '3.1');
	$settings['os'][] = array('Unknow Windows', '#Windows#');

	$settings['os'][] = array('FreeBSD');
	$settings['os'][] = array('Mac OS X', NULL, '#Mac OS X ([0-9_]{3,})#', '_');
	$settings['os'][] = array('Ubuntu Linux', '#Ubuntu#i', '#Ubuntu/([0-9.]{4,5})#');
	$settings['os'][] = array('Fedora');
	$settings['os'][] = array('Gentoo', '#gentoo#i');
	$settings['os'][] = array('Kanotix', '#kanotix#i');
	$settings['os'][] = array('Open Solaris', '#SunOS#');
	$settings['os'][] = array('Unknow Linux', '#Linux#');

	$settings['os'][] = array('Irix', '#IRIX#');
	$settings['os'][] = array('BeOS');
	$settings['os'][] = array('SymbianOS', NULL, '#SymbianOS/([0-9.]{3})#');


	// Browser detection
	# === Usage
	# $settings['os'][] = array('Browser Name', // Displayed in the dashboard
	#							'Browser Regex (may be NULL if it is #Browser Name#) for detection in User Agent',
	#							'Regex for version ($1 must contains the version number) for detection in 
	#							 concerned User Agent. May be NULL if we can't detect the version.',
	#							 It can also be a PHP callable (called with one argument, the User Agent;
	#							 this callable must return a string: the version).
	#							'Browser type: "user" or "bot". Default: "user"'
	#					  );
	#
	# In case of changes, please publish your changes on Github (github.com/Bubbendorf/AnnaLythic)! Thanks :)

	$settings['browsers'][] = array('Avant Browser');
	$settings['browsers'][] = array('Baidu Transcoder', '#baidu Transcoder#', NULL, 'bot');
	$settings['browsers'][] = array('Baidu Spider', NULL, NULL, 'bot');
	$settings['browsers'][] = array('BING Bot', '#bingbot#', NULL, 'bot');
	$settings['browsers'][] = array('Bloglines subscriber', '#Bloglines#', NULL, 'bot');
	$settings['browsers'][] = array('Searchme Bot (Charlotte)', '#Charlotte#', NULL, 'bot');
	$settings['browsers'][] = array('DotBot', NULL, NULL, 'bot');
	$settings['browsers'][] = array('Dyna Web', '#DynaWeb#', NULL, 'bot');
	$settings['browsers'][] = array('FeedFetcher-Google', NULL, NULL, 'bot');
	$settings['browsers'][] = array('Firefox', NULL, '#Firefox/([0-9.]{3})#');
	$settings['browsers'][] = array('Google Chrome', '#Chrome#', '#Chrome/([0-9.]{4})#');
	$settings['browsers'][] = array('GoogleBot', '#Googlebot#i', NULL, 'bot');
	$settings['browsers'][] = array('TencentTraveler');
	$settings['browsers'][] = array('Internet Explorer', '#MSIE#', '#MSIE ([0-9.]{2,3})#');
	$settings['browsers'][] = array('Maxthon', '#Maxthon#i', '#Maxthon ([0-9.]{3})#i');
	$settings['browsers'][] = array('Mediapartners-Google (Adsense Google Bot)', '#Mediapartners-Google#', NULL, 'bot');
	$settings['browsers'][] = array('Minefield', NULL, '#Minefield/([0-9.]{3})#');
	$settings['browsers'][] = array('MSN Bot', '#msnbot#', NULL, 'bot');
	$settings['browsers'][] = array('Opera', NULL, function($UserAgent) {
		$matches = array();
		if(preg_match('#Opera/([0-9.]{2,3})#', $UserAgent, $matches)) {
			if($matches[1] != '9.80') {
				return $matches[1];
			}
			else if(preg_match('#Version/([0-9.]{3,5})#', $UserAgent, $matches)) {
				return $matches[1];
			}
			else return '9.80';
		}
	});
	$settings['browsers'][] = array('Opera Mini', NULL, '#Version/([0-9.]{3})#');
	$settings['browsers'][] = array('Opera Mobile', '#Opera Mobi#', '#Version/([0-9.]{3})#');
	$settings['browsers'][] = array('Yahoo! Slurp', NULL, NULL, 'bot');
	$settings['browsers'][] = array('Konqueror', '#Konqueror#i', '#Konqueror/([0-9.]{3})#i');
	$settings['browsers'][] = array('Rekonq', '#rekonq#');
	$settings['browsers'][] = array('BlackBerry');
	$settings['browsers'][] = array('Safari', NULL, '#Version/([0-9.]{3})#');
	$settings['browsers'][] = array('Lynx', NULL, '#Lynx/([0-9.]{3})#');
	$settings['browsers'][] = array('Netscape', NULL, '#Netscape/([0-9.]{3})#');
	$settings['browsers'][] = array('Nokia', NULL, '#Nokia([0-9A-Z-]{3-8})#');
	$settings['browsers'][] = array('SeaMonkey', NULL, '#SeaMonkey/([0-9.]{3})#');
	$settings['browsers'][] = array('W3C Validator', '#W3C_Validator#', NULL, 'bot');
	$settings['browsers'][] = array('Ask Spider', '#Ask Jeeves/Teoma#', NULL, 'bot');
	$settings['browsers'][] = array('ScoutJet web crawler', '#ScoutJet#', NULL, 'bot');



	// Plugins detection
	# === Usage
	# $settings['plugins'][] = array('The text to search in the plugin name provided by the browser',
	#                                'The plugin name displayed in the dashboard. May be null if it is the 
	#								  same as the previous value.',
	#								 'A boolean: true if the first argument is the exact name provided by 
	#								  the browser, false (default) else.'
	#                          );
	#
	# In case of changes, please publish your changes on Github (github.com/Bubbendorf/AnnaLythic)! Thanks :)

	$settings['plugins'][] = array('QuickTime');
	$settings['plugins'][] = array('Adobe Acrobat', 'PDF', true);
	$settings['plugins'][] = array('Shockwave Flash', 'Flash', true);
	$settings['plugins'][] = array('Google Earth Plugin', 'Google Earth', true);
	$settings['plugins'][] = array('Java(TM)', 'Java');
	$settings['plugins'][] = array('Silverlight Plug-In', 'Silverlight', true);
	$settings['plugins'][] = array('VLC Web Plugin', 'VLC', true);


	/****************************************************************
	 * /!\ DO NOT FORGET TO CONFIGURE THE PATH TO AnnaLythic/al.php IN AnnaLythic/al.js FILE (line 9).
	 */

	/****************************************************************
	 * Configuration is done. You can close this file ;) .
	 */

	return $settings;