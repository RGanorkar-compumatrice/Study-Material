<?php
error_reporting(E_ERROR|E_PARSE);
$db="test";
$con=mysqli_connect("localhost","root","","$db");
?>
<html>

  <head>
 <script src="js/jquery-1.11.1.js"></script>
    <script src="select2-3.5.2/select2.js"></script>
	<script src="select2-3.5.2/select2.css"></script>
	<script src="select2-3.5.2/select2-bootstrap.css"></script>
	<script src="select2-3.5.2/select2-spinner.gif"></script>
		<script src="select2-3.5.2/select2.gif"></script>
    <script>
      $(function(){

        // display logs
        function log(text) {
          $('#logs').append(text + '<br>');
        }

        $('select').select2()
        .on("change", function(e) {
          // mostly used event, fired to the original element when the value changes
          log("change val=" + e.val);
        })
        .on("select2-opening", function() {
          log("opening");
        })
        .on("select2-open", function() {
          // fired to the original element when the dropdown opens
          log("open");
        })
        .on("select2-close", function() {
          // fired to the original element when the dropdown closes
          log("close");
        })
        .on("select2-highlight", function(e) {
          log("highlighted val=" + e.val + " choice=" + e.choice.text);
        })
        .on("select2-selecting", function(e) {
          log("selecting val=" + e.val + " choice=" + e.object.text);
        })
        .on("select2-removed", function(e) {
          log("removed val=" + e.val + " choice=" + e.choice.text);
        })
        .on("select2-loaded", function(e) {
          log("loaded (data property omitted for brevitiy)");
        })
        .on("select2-focus", function(e) {
          log("focus");
        });

      });
    </script>

  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="select2-3.5.2/select2.css">
    <style>
      body {
        padding: 40px;
      }
    </style>
  </head>

  <body>
  		<select name="findfriendname"  style="margin-left:70px;margin-top:-48px;width:250px;height:26px;" placeholder="Find Friends">
 
	<?php $result1=mysqli_query($con,"SELECT * from login");
 while($row=mysqli_fetch_array($result1))
  {

?>
       
        
		<option value="<?php echo ucwords($row['name']);?>"><?php echo ucwords($row['name']);?></option>
        
		<?php } ?>
    </select>   

  </body>

</html>
