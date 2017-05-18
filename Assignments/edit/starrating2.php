
<?php

//include_once( 'getItems.php' );



?>







<html><head>
<meta charset="utf-8">
<link rel="stylesheet" href="jquery/jRating.jquery.css"/>
<link rel="stylesheet" href="style.css"/>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jRating.jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $(".rating").jRating({
   decimalLength : 1,
	         rateMax : 5,
       



      });
	  $(".rating").jRating({
        onClick : function(element,rate) {
     var x=rate;
         alert("value is" +x);
        }
      }); 
});
 
</script>
</head>
<body>

  <div class="rating"></div>


</body>
</html>