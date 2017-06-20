<div id="header"> 
			<div id="logo">	
				<img src="resources/logo.png">
			</div> 
			<!--end of logo-->
		<div id="links">
			<ul>
				<li><a href="loginpage.php">Login</a></li>
				<li><a href="#">Signup</a>
					<form method="POST" enctype="multipart/form-data">
						<table>
							<tr>
								<td>Enter Your Name</td>
								<td><input type="text" name="uname"></td>
							</tr>
							<tr>
								<td>Enter Your Email</td>
								<td><input type="email" name="uemail"></td>
							</tr>
							<tr>
								<td>Enter Your Password : </td>
								<td><input type="Password" name="upass"></td>
							</tr>
							<tr>
								<td>Enter Your Address</td>
								<td><textarea name="uaddress"></textarea></td>
							</tr>
							<tr>
								<td>Enter Your Date Of Birth</td>
								<td><input type="date" name="udob"></td>
							</tr>
							<tr>
								<td>Enter Your Phone Number</td>
								<td><input type="tel" name="unumber"></td>
							</tr>
						</table>
						<center>
							<input type="submit" name="usignup" value="Sign Up">
						</center>
					</form>
				</li> 
			</ul>
		</div>
		<!--end of links-->

		<div id="search">
			<form method="get" action="search.php" enctype="multipart/form-data">
				<input type="text" name="find" placeholder="Search For Products">
				<button name="search" id="search_btn"> Go!</button>
				<button name="cart" id="cart_btn"><a href="cart.php">Cart <?php echo cartCount(); ?> </button>
			</form>
		</div>
		<!-- end of search -->

		</div> 
		<!-- end of header -->