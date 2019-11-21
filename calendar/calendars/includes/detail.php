<?php
	include '../../login/includes/db_connect.php'; 
    include '../../login/includes/functions.php';
    sec_session_start();
    $user = $_SESSION['user_id']; //select username

    if(isset($_POST['set_title'])){
        $title = $_POST['set_title'];
        $date = $_POST['set_date'];

        $mysqli = new mysqli("localhost", "root", "", "calendar");
        $sql = "SELECT * FROM appointment WHERE date = '$date' AND user_id = '$user' AND title = '$title' ";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        echo $row['details'];

        $mysqli->close();
        $result->close();
    }
?>