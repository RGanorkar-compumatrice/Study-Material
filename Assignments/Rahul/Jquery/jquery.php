<html><body>
<p><b>First Name<input type=text class="style" id="demo1" name="FirstName" placeholder="First Name"></input>

<p><b>Last Name<input type=text class="style" id="demo2" name="LastName" placeholder="Last Name"></input>
<input type="submit" id="btn1" value="Submit" style="cursor:pointer;" name="submit"> </input>
<p class="demo3">dff</p>
</body></html>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script> 

<script>
$(document).ready(function(){

$("#btn1").click(function(){

	    var FirstName = $("#demo1").val();
		var LastName= $("#demo2").val();
		alert(LastName);
	
		
$.ajax({

		url:"ajaxcheck.php",
		data:{checkFirstName:FirstName, checkLastName:LastName},
		type:"POST",
		success:function(data){
		alert("sdsd2");
		$(".demo3").html(data);
		}
		});
			});
			
			});
</script>