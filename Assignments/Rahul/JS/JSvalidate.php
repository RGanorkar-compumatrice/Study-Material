
<html>
<body>

<h1>Form</h1>
<style>
.style {
   margin-left:50px;
}

</style>
<form id="myForm">
<table>
<tr><td>
First Name <input type=text class="style" id="demo1"></input>
</td></tr>
<tr><td>
Last Name <input type=text class="style" id="demo2"></input>
</td></tr>
<tr><td>
EmailId <input type=text style="margin-left:67px;" id="demo3"></input>
</td></tr>
<tr><td>
Phone No. <input type=text class="style" id="demo4"></input>
</td></tr>
<tr><td>
Address 
<textarea row="5" columns="7" style="margin-left:65px;" id="demo5"></textarea>
</td></tr>
<tr><td>
</table>

<p id="dd"></p>

<button type="button" onclick="myFunction()">submit</button>
<button type="button" onclick="myFunction1()">reset</button>
</form>
<script>
function myFunction() {
var a = document.getElementById("demo1").value;
var b = document.getElementById("demo2").value;
var c = document.getElementById("demo3").value;
var d = document.getElementById("demo4").value;
var e = document.getElementById("demo5").value;

    var letters = /^[A-Za-z]+$/;  
 var numbers = /^[0-9]+$/;
var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var numbers = /^[0-9]+$/;  

  
   if(a.match(letters))   
      {  
	 // document.getElementById("dd").innerHTML = e;
      alert('Your name have accepted');  
      } 
   else if(isNaN(a) || a == "")
      {  
      alert('Please fill FirstName field');  
      }  
	  
else  
      {  
      alert('Please input alphabet characters only');   
      }  

 if(b.match(letters))    
 {  
      alert('Your name have accepted');  
      
      }  
	  else if(isNaN(b) || b == "")
      {  
      alert('Please fill lastname field');  
      }   
	  
else  
      {  
      alert('Please input alphabet characters only');  
      }  

 if(c.match(mail))    
 {  
      alert('Your email have accepted');  

      } 
 else if(isNaN(c) || c == "")
      {  
      alert('Please fill email field');  
     
      } 
	  
else  
      {  
      alert('Please input email only');  
     
      }  

 if(d.match(numbers))    
 {  
      alert('Your phone number have accepted');  
      
      }  
	  
else if(isNaN(d) || d == "")
      {  
      alert('Please fill phone number field');  
     
      } 
else  
      {  
      alert('Please input phone number only');  
      
      }  
	  
	  if(e == "")
      {  
      alert('Please fill Address field');  
       } 
	   else
	   {
	   alert('Your Address have accepted');  
	   }
	 
};

function myFunction1() {
    document.getElementById("myForm").reset();
}
</script>


</body>
</html> 
