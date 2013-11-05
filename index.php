<!DOCTYPE = html>
<html>
<head>
<title>Welcome Home</title>
                <link href="kudos.css" media="screen" rel="stylesheet" type="text/css" />
                <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
                <script type="text/javascript" src="jquery.cookie.js"></script>
                <script type="text/javascript" src="kudos.js"></script>
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

<!--Kudos stuff-->
                <script type="text/javascript">
                        // needs to be a string for jquery.cookie
                        var postId = '1';

                        $(function()
                        {
                                // initialize kudos
                                $("figure.kudoable").kudoable();

                                // check to see if user has already kudod
                                // fyi cookies do not work when you are viewing this as a file
                                if($.cookie(postId) == 'true') {
                                        // make kudo already kudod
                                        $("figure.kudoable").removeClass("animate").addClass("complete");

                                        // your server would take care of the proper kudos count, but because this is a
                                        // static page, we need to set it here so it doesn't become -1 when you remove
                                        // the kudos after a reload
					var db_count =<?php 
							$query = "SELECT count from kudos";
                        				$result=  mysql_query($query);
							while($row = mysql_fetch_assoc($result))
							{
								echo $row['count'];
							}
						    ?>
						
                                        $(".num").html(db_count);
                                }        

                                // when kudoing
                                $("figure.kudo").bind("kudo:active", function(e)
                                {
                                        console.log("kudoing active");
                                });

                                // when not kudoing
                                $("figure.kudo").bind("kudo:inactive", function(e)
                                {
                                        console.log("kudoing inactive");
                                });

                                // after kudo'd
                                $("figure.kudo").bind("kudo:added", function(e)
                                {
                                        var element = $(this);
                                        // ajax'y stuff or whatever you want
					$.post("kudos.php",{option:"up"},function(a){});

                                        console.log("Kodo'd:", element.data('id'), ":)");

                                        // set cookie so user cannot kudo again for 7 days
                                        $.cookie(postId, 'true', { expires: 7 });
                                });

                                // after removing a kudo
                                $("figure.kudo").bind("kudo:removed", function(e)
                                {
                                        var element = $(this);
                                        // ajax'y stuff or whatever you want
					$.post("kudos.php",{option:"down"},function(a){});

                                        console.log("Un-Kudo'd:", element.data('id'), ":(");

                                        // remove cookie
                                        $.removeCookie(postId);
                                });
                        });
                </script>

                <figure class="kudo kudoable" data-id="1">
                        <a class="kudobject">
                                <div class="opening"><div class="circle">&nbsp;</div></div>
                        </a>
                        <a href="#kudo" class="count">
                                <span class="num"><?php 
							$query = "SELECT count from kudos";
                        				$result=  mysql_query($query);
							while($row = mysql_fetch_assoc($result))
							{
								echo $row['count'];
							}
						    ?>
							</span>
                                <span class="txt">Kudos</span>
                        </a>
                </figure>

</body>
<footer>
	Content and design by <a href="mailto:anubhavashok93@gmail.com">Anubhav Ashok</a>
</footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45140853-1', 'anubhavashok.com');
  ga('send', 'pageview');

</script>
</html>
