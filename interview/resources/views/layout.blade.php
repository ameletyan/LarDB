<html>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<head>
		<style>
			#header {
			    background-color:black;
			    color:white;
			    text-align:center;
			    padding:5px;
			}
			#drop {
			    line-height:30px;
			    background-color:#eeeeee;
			    height:100%;
			    width:150px;
			    float:left;
			    padding:10px;	      
			}
			#p {
				font-family: "Helvetica";
			}
		</style>
	</head>
    <body>
    	<div id="header">
    		<h1>BOOKS</h1>
    	</div>
        <div id="drop">
        	<br>
        	<?php

				$username = "artm95";
				$password = "1022";
				$hostname = "localhost";

				//connection to the database
				$link = mysqli_connect($hostname, $username, $password) 
				  or die("Unable to connect to MySQL");

				//select a database to work with
				$selected = mysqli_select_db($link,"interview") 
				  or die("Could not select interview");

				//execute the SQL query and return records
				$result = mysqli_query($link,"SELECT name FROM authors");
				//fetch the data from the database
				$authors = array();
				while ($row = mysqli_fetch_array($result)) {
				   array_push($authors, $row{'name'});
				}

				echo Form::open(array('books' => '/author.php'));
					echo Form::select('author', $authors);
					echo Form::submit('Submit');
					$author = Input::get('author')+1;
				echo Form::close();

				//close the connection
				mysqli_close($link);

			?>
			<br>
        </div>
      	<?php

			$username = "artm95";
			$password = "1022";
			$hostname = "localhost";

			//connection to the database
			$link = mysqli_connect($hostname, $username, $password) 
			  or die("Unable to connect to MySQL");

			//select a database to work with
			$selected = mysqli_select_db($link,"interview") 
			  or die("Could not select interview");

			//execute the SQL query and return authors
			$result = mysqli_query($link,"SELECT name FROM authors");
			//fetch the data from the database
			$authors = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($authors, $row{'name'});
			}

			echo Form::open(array('books' => '/author.php'));
				$author = Input::get('author')+1;
			echo Form::close();

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT title FROM books WHERE author_id = $author");
			//fetch the data from the database
			$books = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($books, $row{'title'});
			}

			//execute the SQL query and return text
			$result = mysqli_query($link,"SELECT text FROM books WHERE author_id = $author");
			//fetch the data from the database
			$texts = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($texts, $row{'text'});
			}

			//display the book title then the text
			$max = count($books);

			//close the connection
			mysqli_close($link);

		?>

		<!-- present the data from the database -->
		<div id="p">
	        <h2>{{ $authors[$author-1] }}</h2>
	        @for ($i = 0; $i < $max; $i++)
	        	<h3>{{ $books[$i] }}</h3>
	        	<p>{{ $texts[$i] }}</p>
	        @endfor
    	</div>

    </body>
</html>

