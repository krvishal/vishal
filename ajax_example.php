<!DOCTYPE html>
<html>
<head>
	<title>Ajax Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../jquery-3.1.1.js"></script>
	<!--bootstrap-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function data_refresh()
		{
			$.ajax({
				url:'load_data.php',
				type:'POST',
				success:function(response){
						var data = JSON.parse(response);
						var showdata =("<thead><tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr></thead>");
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
								$('.close').click();
						}
					});
				}
			});
		});
		setInterval(data_refresh,1000);
	</script>
</head>
<body>
<div class="container">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Commit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div>
				<label>Name</label>
				<input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
			</div>
			<div>
				<label>Email</label>
				<input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control">
			</div>
			<div>
				<label>Message</label>
				<textarea id="message" name="message" rows="4" cols="19" placeholder="Any Commits" class="form-control"></textarea>
			</div>
			<div>
				<label>Date</label>
				<input type="date" name="date" id="date" class="form-control">
			</div>
      </div>
      <div class="modal-footer">
      	<div>
			<input type="submit" name="save" id="save" style="margin-top:10px;margin-left:30px" class="btn btn-success">
		</div>
      </div>
    </div>
  </div>
</div>
<div class="container" id="display_div">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="row">
			<div style="margin-top:30px;margin-left:90px" id="dispaly_result" class="col-md-8">
				<span><strong>Latest</strong></span>
				<table id="result_table" class="table table-hover">	
				<tr></tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				 Add New
				</button>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>