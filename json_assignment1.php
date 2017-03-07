<!DOCTYPE html>
<html>
<head>
	<title>Json Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#json").click(function(){
				$.getJSON("egjson.json",function(data){
					$("#jsonname").append(data.firstname+"<br>");
					$("#jsonage").append(data.lastname+"<br>");
					$("#jsongender").append(data.dob);
				});
				$("#json1").hide();
				$(".jjson").show();
			});
		});
	</script>
</head>
<body>
<span id="json1">To Get Data Click On Button</span><br>
<div class="jjson" hidden>
	<span id="jsonname">First Name is  </span>
	<span id="jsonage">Last Name is  </span>
	<span id="jsongender">Date Of Birth is  </span>
</div>
<input type="button" name="json" value="Get Data" id="json">
</body>
</html>