@extends('layout')

@section('sidebar')
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
		echo $author;
	echo Form::close();

	//close the connection
	mysqli_close($link);

?>

@section('content')
<?php
	// the code below is a little off, make sure to check over it
	// the implementation of the above code will not have the same effect as the code below
	echo $author;

	$username = "artm95";
	$password = "1022";
	$hostname = "localhost";

	//connection to the database
	$link = mysqli_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");

	//select a database to work with
	$selected = mysqli_select_db($link,"interview") 
	  or die("Could not select interview");

	// //execute the SQL query and return records
	// $result = mysqli_query($link,"SELECT author_id, title FROM books");
	// //fetch the data from the database
	// $books = array();
	// while ($row = mysqli_fetch_array($result)) {
	//    array_push($books, $row{'author_id'});
	//    array_push($books, $row{'title'});
	// }

	switch ($author) {
		case 1:
			echo "Victor Hugo";
			break;

		case 2:
			echo "Jules Verne";
			break;

		case 3:
			echo "Alexandre Dumas";
			break;

		case 4:
			echo "Leo Tolstoy";
			break;

		case 5:
			echo "H.G. Wells";
			break;
		
		default:
			break;
	}

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
	for ($i = 0; $i < $max; $i = $i + 1) {
		echo $books[$i];
		echo $texts[$i];
	}
	// foreach ($books as $book) {
	// 	echo $book;
	// }
	// foreach ($texts as $text) {
	// 	echo $text;
	// }

	//close the connection
	mysqli_close($link);

?>
@stop