
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
var text1,text2,text3,text4,text5;


  
if(a.match(letters))   
      {  
	 // document.getElementById("dd").innerHTML = e;
      text1="Your FirstName have accepted";
      } 
else if(isNaN(a) || a == "")
      {  
      text1="Please fill FirstName field";  
      }  
	  
else  
      {  
     text1="Please input alphabet characters only";   
      }  

 if(b.match(letters))    
 {  
      text2="Your name have accepted";  
      
      }  
	  else if(isNaN(b) || b == "")
      {  
      text2="Please fill lastname field";  
      }   
	  
else  
      {  
     text2="Please input alphabet characters only";  
      }  

if(c.match(mail))    
 {  
      text3="Your email have accepted";  

      } 
 else if(isNaN(c) || c == "")
      {  
     text3="Please fill email field"; 
     
      } 
	  
else  
      {  
      text3="Please input email only";  
     
      }  

if(d.match(numbers))    
 {  
      text4="Your phone number have accepted"; 
      
      }  
	  
else if(isNaN(d) || d == "")
      {  
      text4="Please fill phone number field";       
      } 
else  
      {  
     text4="Please input phone number only";      
      }  	  
if(e == "")
      {  
      text5="Please fill Address field";  
       } 
else
	   {
	   text5="Your Address have accepted"; 
	   }
	 var message = [text1,text2,text3,text4,text5]; 
	 //var message = [text1];
	 alert(message);  
};

function myFunction1() {
    document.getElementById("myForm").reset();
}
</script>


</body>
</html> 
