# response
Class for work with site

# Hello, my user

You reading info about API Class. This class help for work with site li2s.ru. Class use cURL requests for get data and response how JSON format

## Setup

This section help you understand how setup our class on different systems: Bitrix, Laravel, Yii (Yii2), Wordpress, Joomla etc.
### Bitrix
Download this file Response.php and upload him on server in /local/php_interface/**some_folder** and include uploaded file in init.php using :

*CModule::AddAutoloadClasses("", array(
	"Response" => "/local/php_interface/**some_folder**"
));*
### Yii2
Download this file Response.php and upload him on server in /models/**some_folder** and set namespace.
If **basic** version: app/models/**some_folder**;
If **advanced** version: common/models/**some_folder**
### Wordpress
Download this file Response.php and upload him on server in /wp-content/themes/**theme_name**/**some_folder**/ and include class in functions.php how:
**require_once ("/some_folder/Response.php")**
