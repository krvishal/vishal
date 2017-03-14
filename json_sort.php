<!DOCTYPE html>
<html>
<head>
	<title>Json Example</title>
	<!--jquery-->
	<script type="text/javascript" src="../../jquery-3.1.1.js"></script>
	<!--lodash-->
	<script type="text/javascript" src="../../lodash.js"></script>
	<script type="text/javascript">
		function SortLowerCase(first,second) 
		{
        	first = first.firstname.toLowerCase();
        	second = second.firstname.toLowerCase();
        	return ((first < second) ? -1 : ((first > second) ? 1 : 0));
    	}
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
			var newobject={};
			var sortarray=[];
			$('#sortdata').click(function(){
				$.getJSON("json_array.json",function(data){
					$.each(data,function(i,detail){
						$.each(detail,function(i,results){
							sortarray.push(results);
						});
					});
				newobject=sortarray.sort(SortLowerCase);
				$('#getdata').click();
				$.each(newobject,function(index,details){
					$('#sort_table').append("<tr><td>"+details.firstname+"</td><td>"+details.lastname+"</td><td>"+details.dob+"</td></tr>");
				});
				$('.sort_data').show();
				});
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
<input type="button" name="sortdata" value="Sort" id="sortdata">
<br>
<div class="sort_data" hidden>
	<table border='1' id="sort_table">
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Date Of Birth</td>
		</tr>
	</table>
</div>
</body>
</html>