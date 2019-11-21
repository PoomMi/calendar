<html>
<head>
	<title>My Calendar</title>
	<link rel="shortcut icon" href="../icon.png" type="image/png">
	<style>.bg{ background-color: rgba(85,255,170,0.7); }</style>

	<?php
		include_once '../login/includes/db_connect.php';
		include_once '../login/includes/functions.php';
		sec_session_start();
	?>
</head>

<body class="bg">
	<?php if (login_check($mysqli) == true) : ob_start();
		header('Location: month_view.php');
	?>
	<?php else : ?>
		<!-- when login_check is false -->	
    	<meta http-equiv = "refresh" content = "0;URL=../index.php?!login">
	<?php endif; ?>
</body>
</html>