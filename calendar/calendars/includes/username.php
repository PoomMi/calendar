<?php

	/* identify username */

	$user = $_SESSION['user_id'];
    $mysqli = new mysqli('localhost', 'root', '', 'register');
    $qry = "SELECT * FROM members WHERE id='$user' ";
    $result = $mysqli->query($qry);
    $username = $_SESSION['username'];
    echo $username;
?>