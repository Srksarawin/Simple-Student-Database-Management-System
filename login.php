<?php
	
include("connect.php");

if(isset($_POST['login'])) {
	$sql = mysqli_query($conn,
	"SELECT * FROM REGISTER WHERE username='"
	. $_POST["username"] . "' AND
	password='" . $_POST["pwd"] . "' ");

	$num = mysqli_num_rows($sql);

	if($num > 0) {
		$row = mysqli_fetch_array($sql);
		header("location:check.php");
		exit();
	}
	else {
?>
<hr>
<font color="red"><b>
		<h3>Sorry Invalid Username and Password<br>
			Please Enter Correct Credentials</br></h3>
	</b>
</font>
<hr>

<?php
	}
}
?>
<html>

<head>
	<style>
		th {
			text-align: left;
		}

		td {
			text-align: center;
		}

		a {
			text-decoration: none;
		}
	</style>
</head>

<body>
	<form method="post" action="login.php">
		<fieldset>
			<legend align="center">
				<h1 align="center">Login</h1>
			</legend>
			<table width="50%" border="1"
				align="center" style="border:thick;">
				<tr>
					<th height="40"><label for="username">
						Username</label>
					</th>
					<td><input type="text" name="username"
							id="username" required>
						</td>
				</tr>
				<tr>
					<th height="40"><label for="pwd">
						Password
					</label>
					</th>
					<td><input type="password"
						name="pwd" id="pwd" required></td>
				</tr>
				<tr>
					<td colspan="2" height="40"><input 
						type="submit" name="login"
						value="Login"></td>
				</tr>
			</table>
		</fieldset>
	</form>
    
</body>

</html>
