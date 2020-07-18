

<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> App Name -@yield('title')</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	</head>
		<style>
			.signup{
  				width: 50%;
 				overflow: hidden; }
			.register-form {
  				width: 100%;
  				 }

		</style>
	<body>
		
		<section class="signin"  id="signin">
		<div class="container">
			@yield('content')
			<h3> ZOMOTO </h3>
			<div id="logincheck">
				<form name="login" action="/api/user/login" method="post"> 
					 <a href="#signup" class="signup-image-link">Create an account</a>
					<table>
						<tr>
							<td> <label> Username :</label> </td>
							<td> <input type="text" name="username" required="enter username"> </td>
						</tr>
						<tr>
							<td> <label> Password :</label></td>
							<td> <input type="text" name="pswd" required="enter password "> </td>
						</tr>
						<tr>
							<td> </td>
							<td> <input type="submit"> </td>
						</tr>
					</table>		
				</form>
			</div>
		</div>
</section>
		<section class="signup"  id="signup">
			<div class="container">
			@yield('content')
			<h3> ZOMOTO </h3>
			<div id="logincheck">
				<form name="register-form" action="/api/user/login" method="post"> 
					 <a href="#signin" class="signup-image-link">I am already member</a>
					<table>
						<tr>
							<td> <label> Username :</label> </td>
							<td> <input type="text" name="username" required="enter username"> </td>
						</tr>
						<tr>
							<td> <label> email id :</label> </td>
							<td> <input type="text" name="email" required="enter email id"> </td>
						</tr>
						<tr>
							<td> <label> Password :</label></td>
							<td> <input type="text" name="pswd" required="enter password "> </td>
						</tr>
						<tr>
							<td> </td>
							<td> <input type="submit"> </td>
						</tr>
					</table>		
				</form>
			</div>
		</div>
		</section>
	</body>
</html>			