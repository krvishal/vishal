<!DOCTYPE html>
<html>
<head>
	<title>Ajax Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../jquery-3.1.1.js"></script>
	<script type="text/javascript">
		function data_refresh()
		{
			$.ajax({
				url:'load_data.php',
				type:'POST',
				success:function(response){
						var data = JSON.parse(response);
						var showdata =("<tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>");
						$.each(data,function(i){
							showdata +=("<tr><td>"+data[i].name+"</td><td>"+data[i].email+"</td><td>"+data[i].message+"</td><td>"+data[i].date+"</td></tr>");
						});
						$('#result_table').html(showdata);
				}
			});	
		}
		function validateEmail(email)
		{
		 var cemail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 if (cemail.test(email))
		 {
		 	return true; 
		 }
		 else
		 {
		 return false;
		 }
		}
		$(document).ready(function(){
			$('#save').click(function(){
				var name =$('#name').val();
				var email =$('#email').val();
				var message =$('#message').val();
				var date =$('#date').val();
				if(name=="")
				{
					alert("enter your name");
					$("#name").focus();
				}
				else if(email=="")
				{
					alert("enter your email");
					$("#email").focus();
				}
				else if(message=="")
				{
					alert("enter commit");
					$("#message").focus();
				}
				else if(date=="")
				{
					alert("enter date");
					$("#date").focus();
				}
				else if(!validateEmail(email))
				{
					alert("Enter Correct Email Format");
					$("#email").focus();
				}
				else
				{
					var info = {"name" : name,"email" : email,"message" : message,"date" : date};
					$.ajax({
						url:"insert.php",
						type:"POST",
						dataType:'html',
						data:{"name" : name,"email" : email,"message" : message,"date" : date},
						success:function(data){
								alert(data);
								$('#name').val("");
								$('#email').val("");
								$('#message').val("");
								$('#date').val("");
						}
					});
				}
			});
		});
		setInterval(data_refresh,1000);
	</script>
</head>
<body>
<div style="margin-top:30px;margin-left:90px" height="auto" width="300px" id="submit_form">
	<div>
		<label>Name</label>
		<input type="text" name="name" id="name" placeholder="Enter Your Name" style="margin-left:20px">
	</div>
	<div>
		<label>Email</label>
		<input type="email" name="email" id="email" placeholder="Enter Your Email" style="margin-left:20px">
	</div>
	<div>
		<label>Message</label>
		<textarea id="message" name="message" rows="4" cols="19" placeholder="Any Commits" style="margin-left:2px"></textarea>
	</div>
	<div>
		<label>Date</label>
		<input type="date" name="date" id="date" style="margin-left:28px">
	</div>
	<div>
		<input type="submit" name="save" id="save" style="margin-top:10px;margin-left:30px">
	</div>
</div>
<div id="dispaly_result" >
	<table border="1" style="margin-top:20px;margin-left:30px" width="350" id="result_table">	
	<tr></tr>
	</table>
</div>
</body>
</html>