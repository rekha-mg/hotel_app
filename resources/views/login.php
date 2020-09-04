<html>
<head>
	<title>Hotel  Vishvesh </title>
	
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
     </script>
	<style type="text/css">
		.signin-form{
			padding-left: 25px;
			padding-top: 85px;
		}

		.signup-form{
			 padding-left: 25px;
			 padding-top: 450px;
		}


   
	</style>
	<script type="text/javascript">
		function up(){
			alert("jdjd");
			var uname = document.register.username;
			var phn =document.register.phone;
			var loc=document.register.location;
      		var formData =JSON.stringify({'uname':uname.value,'phone':phn.value,'location':loc.value});
	    
	     	$.ajax({
	     		type: 'POST',
		   		url : '/api/Users',
		      data : formData,
		      dataType: "json",
	               
		    success:function(response,status){
		    console.log(response.statusCode);
		     $("#result").append("hi..");
		    	}
		   	});
		};
				
			$(document).ready(function () {  
             $("#save").click(function () {  
                 var newuser = new Object();  
                 newuser.uname = $('#un').val();  
                 newuser.phone = $('#phn').val(); 
                 newuser.location=$('#loc').val(); 
                 $.ajax({  
                     url: '/api/Users',  
                     type: 'POST',  
                     dataType: 'json',  
                     data: newuser,  
                     success: function (r1) {  
                         console.log("hi");  

                     },  
                     error: function (xhr, textStatus, errorThrown) {  
                         console.log('Error in Operation');  
                     }  
                 });  
             });  
           


			
             	 	$("#login").click(function () {  
                 		var phone = $('#phn').val(); 
                     $.ajax({  
                     url:'/api/Users/'+phone,  
                     type: 'GET',  
                     success: function (data, textStatus, xhr) {  
                         console.log(data);  
                         document.location.href='/vishvesh';
                     },  
                     error: function (xhr, textStatus, errorThrown) {  
                         console.log('Error in Operation');  
                     }  
                 });  
             });  
         });  
	</script>
	
	</head>
	<body>
		<div class="main">
			 <section class="sign-in">
					<div class="conatiner">
							<div class="signin-content">
							 <div class="signin-form">
				
								<form name="signin" action="" method="">
									<div class="form-group">	
										<label> <i class="zmdi zmdi-account material-icons-name"></i></label> <input type="text" id="lgnname" placeholder="Your Name" required="required" />
									</div>
					
									<div class="form-group">
										<lable><i class="zmdi zmdi-lock"></lable><input type="text" id="phn1" placeholder="Phone" required="required">
									</div>
					
								<div>
									<input type="submit" id="login"/>
								</div>
						<a href="#sign-up" >Create an account </a>
					</form>
				</div>
			</div>
		</div>
	</section>


			<div class="conatiner">
				<section class="sign-up" id="sign-up" > </section> 
					<div class="signup-content">
					 <div class="signup-form">
						<form   name="register" action="" method="" >
						<div class="form-group">	
							<label> <i class="zmdi zmdi-account material-icons-name"></i></label> <input type="text" name="username" id="un" placeholder="Your Name" required="required" />
						</div>
						<div class="form-group">	
							<label><i class="zmdi zmdi-phone"></i></label> <input type="text" name="phone" placeholder="Your Phone" id="phn" required="required" />
						</div>
						<div class="form-group">
							<lable><i class="zmdi zmdi-lock"></i></lable><input type="text" name="location" placeholder="Enter ur location" id="loc" required="required">
						</div>
						<div id='result'>
							Result 
						</div>
						<div class="form-group form-button">
							<input type="submit" id="save" />
						</div>
					</div>
				</div>
					</form>
				</div>
		</div>
		</div>

	</body>
</html>