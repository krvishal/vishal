<!DOCTYPE html>
<html>
<head>
	<title>Json Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#getdata").click(function(){
				$.getJSON("json_array.json",function(data){
					$.each(data,function(i,detail){
						$.each(detail,function(i,results){
							$('#data_table').append("<tr><td>"+results.firstname+"</td><td>"+results.lastname+"</td><td>"+results.dob+"</td></tr>");
						});
					});
				});
				$("#message").hide();
				$(".display_data").show();
			});
		});
	</script>
</head>
<body>
<span id="message">To Get Data Click On Button</span><br>
<div class="display_data" hidden>
	<table border='1' id="data_table">
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Date Of Birth</td>
		</tr>
	</table>
</div>
<input type="button" name="getdata" value="Get Data" id="getdata">
</body>
</html>