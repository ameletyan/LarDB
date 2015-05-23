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
	$result = mysqli_query($link,"SELECT id, name FROM authors");
	//fetch tha data from the database
	$authors = array();
	while ($row = mysqli_fetch_array($result)) {
	   array_push($authors, $row{'name'});
	}

	echo Form::open(array('books' => '/author.php'));
		echo Form::select('author', $authors);
		echo Form::submit('Submit');
		$author = Input::get('author');
		echo $author;
	echo Form::close();

	//close the connection
	mysqli_close($link);

?>

@section('content')
<?php
	
	echo Form::submit('button');

	// $username = "artm95";
	// $password = "1022";
	// $hostname = "localhost";

	// //connection to the database
	// $link = mysqli_connect($hostname, $username, $password) 
	//   or die("Unable to connect to MySQL");

	// //select a database to work with
	// $selected = mysqli_select_db($link,"interview") 
	//   or die("Could not select interview");

	// //execute the SQL query and return records
	// $result = mysqli_query($link,"SELECT id, name FROM authors");
	// //fetch tha data from the database
	// $authors = array();
	// while ($row = mysqli_fetch_array($result)) {
	//    array_push($authors, $row{'name'});
	// }

	// echo Form::select('authors', $authors);

	// //close the connection
	// mysqli_close($link);
?>
@stop