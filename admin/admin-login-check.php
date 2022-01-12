<?php   
				session_start();
				$conn = mysqli_connect("localhost","root","@Mj37055765");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				mysqli_select_db($conn,"ita");
				if(isset($_POST['submit'])){
					$username=$_POST["username"];
					$password=$_POST["password"];
					$sql="select username from admin where username='$username' and password='$password'";
					
					
					$result = $conn->query($sql);
					
					$row2=mysqli_fetch_row($result);
					if (mysqli_num_rows($result) > 0) {
						
						$_SESSION['user'] = $username;
						
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome Admin')
							window.location.href='ita-admin.php'
							</SCRIPT>");
					}
					else {
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Invalid Credentials')
							window.location.href='admin-login.php'
							</SCRIPT>");
					}
				}
?>
