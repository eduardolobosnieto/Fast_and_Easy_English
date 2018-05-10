<?php
error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Conexx = "localhost";
$database_Conexx = "materials";
$username_Conexx = "root";
$password_Conexx = "root";
$Conexx = mysql_pconnect($hostname_Conexx, $username_Conexx, $password_Conexx) or trigger_error(mysql_error(),E_USER_ERROR); 
?>