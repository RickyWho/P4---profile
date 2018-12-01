<?php
include 'db_connect.php';
include 'header.php';

?> <h2>Logout</h2> <?php

if($_SESSION['logged_in'] == true)
{

	unset($_SESSION['logged_in']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_id']);

	echo 'Succesfully signed out.';
	header("location: homepage.php");
}
else
{

}

include 'footer.php';
?>
