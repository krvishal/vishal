<!DOCTYPE html>
<html>
<head>
	<title>Json Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#getdata").click(function(){
				$.getJSON("egjson.json",function(data){
					$("#jsonname").append(data.firstname+"<br>");
					$("#jsonlastname").append(data.lastname+"<br>");
					$("#jsondob").append(data.dob);
				});
				$("#message").hide();
				$(".json_data").show();
			});
		});
	</script>
</head>
<body>
<span id="message">To Get Data Click On Button</span><br>
<div class="json_data" hidden>
	<span id="jsonname">First Name is  </span>
	<span id="jsonlastname">Last Name is  </span>
	<span id="jsondob">Date Of Birth is  </span>
</div>
<input type="button" name="getdata" value="Get Data" id="getdata">
</body>
</html>