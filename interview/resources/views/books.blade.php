@extends('layout')

@section('content')
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

	echo Form::select('authors', $authors);
?>
@stop