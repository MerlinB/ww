<?php 
// Stop page from being loaded directly. 
if (preg_match("/.settings.php/i", $_SERVER['PHP_SELF'])){
echo "Please do not load this page directly. Thanks!";
exit;
}  

require_once('../config/config.php');

define('DBHOST', DB_HOST);  // Add the Database Host Server Name. localhost in general cases. 
define('DBNAME', DB_NAME); // Add Name of Database Here
define('DBUSER', DB_USER); // Add Database Username here
define('DBPASS', DB_PASS); //Mysql User Password 

define('URLTOFILES', 'http://www.scholarium.at/down_secure/');  /* Url to folder where files for SECURE DOWNLOAD LINKS script are stored. If you uploaded the secdown folder in root folder of your website then you just need to replace yourdomainame.com with the name of your domain. */

define('NOOFFILES', '10000'); // Expected Number of downloadable Files. 
define('STARTOVER',365); //Number of days after which unusable data from database is flushed or removed. 

/* 
* This clears of old download codes generated and records about files and there is practically no harm. 
* This is highly recommended to keep the database size within reasonable limits.
*/
 
define('UNAUTHACCESSMESS', 'There is no file associated with this url or you are not authorized to access this file. If you have access to the secure download area you can still get the files from there.'); //On No Permissions page the message displayed can be customized from here. 
?>
