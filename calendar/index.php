<html>
<head>
	<title>My Calendar</title>
	<link rel="shortcut icon" href="icon.png" type="image/png">
	<link href="index_style.css" rel="stylesheet" type="text/css" media="all">
	<script src="calendars/js/jqury 3.3.1.js"></script>
	<script type="text/JavaScript" src="login/js/sha512.js"></script> 
    <script type="text/JavaScript" src="login/js/forms.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php
		include_once 'login/includes/db_connect.php';
		include_once 'login/includes/register.inc.php';
		include_once 'login/includes/functions.php';
		
		sec_session_start();
	?>
</head>

<body>

	<?php if (login_check($mysqli) == true) : ?>
		<!-- when login_check is true go to calendar form -->
       	<meta http-equiv = "refresh" content = "0;URL=calendars/month_view.php"> 
    <?php else : ?>
        <!-- when login_check is false go to index page -->
        <div class = "body animate">
			<div class = "head">
				<div><img src="icon.png" id = "icon"></div>
				<div id = "myCalendar">My calendar</div>
			</div>

			<div class = "middle">
				<div id = "regisBox">
					<div id = "register">Register</div>
        			<form method="post" class = "register-content" 
        			action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
        			onkeydown="if (event.keyCode == 13) 
        			document.getElementById('btnRegisInput').click()" >

	            		Username  <?php for($i=0;$i<12;$i++){ echo '&nbsp'; }?> :
	            		<input type='text' name='username' placeholder = "username" id="username" /><br>
		            	Email <?php for($i=0;$i<19;$i++){ echo '&nbsp'; }?> :
		           		<input type="text" name="email" placeholder="email@example.com" id="email" /><br>
		            	Password <?php for($i=0;$i<13;$i++){ echo '&nbsp'; }?> :
		            	<input type="password" name="password" placeholder = "at least 6 characters" id="password" /><br>
		            	Confirm password : <input type="password" name="confirmpwd" id="confirmpwd" /><br>
		            	<input type="button" value="Register" id = "btnRegisInput"
		            	onclick="return regformhash(this.form,
		            								this.form.username,
		            								this.form.email,
		            								this.form.password,
		            								this.form.confirmpwd);"
		            	class = "btnRegis"/> 

        			</form>
				</div>
				<div id = "line"></div>
				<div id = "loginBox">
					<div id = "login">Login</div>
        				<form action="login/includes/process_login.php" 
        					method="post" class="login-content"
        					onkeydown="if (event.keyCode == 13) 
        					document.getElementById('btnLoginInput').click()" > 	

        					Username : <input type="text" name="username" /><br>
			        		Password&nbsp : <input type="password" name="p"/ >
			            	<input type="button" id = "btnLoginInput" value="Login" 
			            	onclick="formhash(this.form, this.form.p);" class = "btnLogin"> 
        				</form>
        				<!-- when login is error -->
			            <?php
			              	if (isset($_GET['error'])) { 
			               		echo '<p class="error">Error Logging In!</p>'; 
			               	}

			               	if (isset($_GET['!login'])) { 
			               		?>
			               			<script>
			               				alert("You did not login! Please login first.");
			               			</script>
			               		<?php 
			               	}
			            ?> 
				</div>
			</div>

			<div id="creator">
				<span style = "font-family: Segoe UI;">Powerd by</span>
				<b style = "font-family: MV Boli;">PoomMi Ch</b>
			</div>
		</div>
    <?php endif; ?>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$("#icon").fadeIn(1200);
		$("#myCalendar").fadeIn(1000);
	});
</script>
</html>