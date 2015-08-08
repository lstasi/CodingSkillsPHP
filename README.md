# CodingSkillsPHP

Install PHP 5.6 (Non Thread Safe)

	http://windows.php.net/download/
	Just uncompress zip file in any folder. Like C:\PHP
	Add php folder to you system PATH
		Try set PATH=%PATH%;C:\PHP
		Or just set PATH=%PATH%; (in C:\PHP)

Configure PHP
	
	In php folder
	Copy php.ini-development to php.ini
	Enable extension_dir = "ext"
	Enable:
		extension=php_curl.dll
		extension=php_gd2.dll
		extension=php_mbstring.dll
		extension=php_openssl.dll

Dowload Xdebug
	
	http://xdebug.org/download.php
	Extract file into {php_folder}/ext/php_xdebug.dll
	Add extension to php.ini
		zend_extension = php_xdebug.dll