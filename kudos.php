<?php
            //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "quotes1.db.12022482.hostedresource.com";
            $username = "quotes1";
            $dbname = "quotes1";

            //These variable values need to be changed by you before deploying
            $password = "scu2447!K";
            $usertable = "quotes";
            $yourfield = "quote";
        
            //Connecting to your database
            mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
            connect to database! Please try again later.");
            mysql_select_db($dbname);
	if($_POST == "up")
	{
		$query = mysql_real_escape_string("UPDATE kudos SET `count` = `count`+1 LIMIT 1");
	}
	else
	{
$query = mysql_real_escape_string("UPDATE kudos SET `count` = `count`-1 LIMIT 1");
mysql_unbuffered_query($query);
	}
?>
