<?php
/* -------------------------------------------------------------------
Script written by Adam Khoury @ www.developphp.com
                          January 1, 2010
Please retain this credit when displaying this code online 
---------------------------------------------------------------------- */
// Connect to the file above here   
require "connect_to_mysql.php";  

if (mysql_error()) {  
    echo "<h2>Failure:</h2><em>" . mysql_error() . "</em>";  
} else {  
    echo "<h1>Success in database connection! Happy Coding!</h1>";  
} 
?>
