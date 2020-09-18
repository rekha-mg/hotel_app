<html>

<head>
	<title>Hotel  Vishvesh </title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	
	<style type="text/css">

		.container-mycard {
			margin: 30px;
			padding: 40px;
			border: 1px solid #d2d7da;
			background-color: #c0d9ea;
			box-shadow: 5px 20px 30px #b1b1e0;
		}

		.signup-form {
			padding-left: 25px;
			padding-top: 450px;
		}
	</style>

	<script type="text/javascript">
		
		$(function() {
		   /*var $myDiv = $("#register1");
		   $myDiv.hide();*/
		   
		   $("#sign-up").click(function(argument) {
		   	$("#register1").show();
		   	$("#login1").hide();
		   });

		   $("#login").click(function () {  
		   	var phone = $('#phn1').val(); 
		   	console.log(phone);
		   	if(phone) {
		   		$.ajax({  
		   			url:'/api/Users/'+phone,  
		   			type: 'GET',  
		   			success: function (response, textStatus, xhr) {  
		   				if(response && response.data && response.data.length == 1) {
		   					alert("Login successfull :" + response.data[0].uid);
		   					document.location.href='/vishvesh';
		   				} else {
		   					alert("Login didnt happen");
		   				}
		   			},  
		   			error: function (response, textStatus, errorThrown) {  
		   				if (response && response.responseJSON && response.responseJSON.message) {
		   					alert(response.responseJSON.message);
		   				} else {
		   					alert("something wrong happened");
		   				}
		   			}  
		   		});  
		   	} else {
		   		alert("Please fill the form before submit login.");
		   	}
		   });  

		   $("#save").click(function () {  
		   	console.log("on click....");  
		   	var newuser = {};  
		   	newuser.uname = $('#un').val();  
		   	newuser.phone = $('#phn').val(); 
		   	newuser.location=$('#loc').val(); 

		   	$.ajax({  
		   		url: '/api/Users',  
		   		type: 'POST',  
		   		dataType: 'json',  
		   		data: newuser,  
		   		success: function (response) {  
		   			if(response && response.data && response.data == true) {
		   				alert("Regist successfull :");
		   				$("#register1").hide();
		   				$("#login1").show();
		   			} else {
		   				alert("Login didnt happen");
		   			}
		   		},  
		   		error: function (response, textStatus, errorThrown) {  
		   			if (response && response.responseJSON && response.responseJSON.message) {
		   				alert(response.responseJSON.message);
		   			} else {
		   				alert("something wrong happened");
		   			} 
		   		}  
		   	});  
		   });  
		});
	</script>
	
</head>

<body>

	<div class="container-fluid">

		<div id="header" class="row" style="height: 100px">
		</div>

		<div id="login1" class="row">
			<div class="mx-auto container-mycard" style="margin: 30px">
				Signin 
				
				<div class="form-group">	
					<lable>Username</lable>	
					<input type="text" id="lgnname" placeholder="Your Name" required="required" />
				</div>
				<div class="form-group">
					<lable>Phone</lable>
					<input type="text" id="phn1" 
					placeholder="Phone" 
					required="required">
				</div>
				<div>
					<input type="submit" id="login"/>
				</div>
				<a id="sign-up" href="" >Create an account</a>
			</div>
		</div>

		<div id="register1" class="row">
			<div class="mx-auto container-mycard" style="margin: 30px">
				Signup

				<div class="form-group">
					<lable>Username</lable>	
					<input type="text" name="username" id="un" 
					placeholder="Your Name" required="required" />
				</div>
				<div class="form-group">	
					<lable>Phone</lable>
					<input type="text" name="phone" 
					placeholder="Your Phone" id="phn" 
					required="required" />
				</div>
				<div class="form-group">
					<lable>Location</lable>
					<input type="text" name="location" placeholder="Enter ur location" id="loc" required="required">
				</div>
				<div id='result'>
					Result 
				</div>

				<div>
					<input type="submit" id="save"  />
				</div>
				
			</div>
		</div>
	</div>
</body>

</html>