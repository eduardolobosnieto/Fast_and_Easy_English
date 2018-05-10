<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Connexx = "localhost";
$database_Connexx = "materials";
$username_Connexx = "root";
$password_Connexx = "root";
$Connexx = mysql_pconnect($hostname_Connexx, $username_Connexx, $password_Connexx) or trigger_error(mysql_error(),E_USER_ERROR); 
?>