<!DOCTYPE = html>
<html>
<head>
<title>Welcome Home</title>
<link type="text/css" rel="stylesheet" href="style.css" media="all">

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
            ?>
</head>
<body background ="images/background2.png">
<ul class="navlist">

	<a href="index.php">
	<img class="nav" id =home src ="images/home.png" >
	</a>
	
	<a href="http://www.facebook.com/anubhav.ashok">
	<img class="nav" id =facebook src="images/fb.png">
	</a>
	
	<a href="http://www.github.com/anubhavashok">
	<img class="nav" id =github src="images/github2.png" >
	</a>
	
	<a href="http://www.linkedin.com/pub/anubhav-ashok/57/432/227">
	<img class="nav" id =linkedin src="images/linkedin.png" >
	</a>
	
</ul>
<ul class="mainlist">
	<a href= "projects.html">
	<p class="main" id="projects">
	Projects
	</p>
	</a>

	<a href= "about.html">
	<p class="main" id="aboutme">
	About Me
	</p>
	</a>

	<a href= "resources.html">
	<p class="main" id="resources">
	Resources
	</p>
	</a>
</ul>

<p id="quote">
	<?php
		$length = mysql_query("show table status from database;");
		
		$query = "SELECT * FROM quotes ORDER BY RAND()% $length+1 LIMIT 1;";
		$result=  mysql_query($query);
		while($row = mysql_fetch_assoc($result))
		{
			echo $row['quote'];
			
		
	?>
</p>
<p id="quoteby">
	-<?php
			echo $row['author'];
		}
	?>
</p>

</body>
<footer>
	Content and design by <a href="mailto:anubhavashok93@gmail.com">Anubhav Ashok</a>
</footer>
</html>