 <?php

   $myarray = array(3,6,2000,5,101,333,222,3,2000);
  
   echo "<h1>Display all even numbers</h1>";
                  

             foreach($myarray as $rw)
             {
              if(($rw%2) == 0 ){
              echo "<p>".$rw."</p>";
              }
             }
			
echo "<hr>";
echo "<h1>Display all odd numbers</h1>";
			foreach($myarray as $rw)
             {
              if(($rw%2) !== 0 ){
              echo "<p>".$rw."</p>";
              }
             }
			echo "<hr>";
echo "<h1>Display all unique numbers</h1>";
			$result = array_unique($myarray);

			//while(mysqli_fetch_array($result)){
			//$odd=$result;
			print_r($result);
			echo "<hr>";
			



			echo "<h1>Display all prime numbers</h1>";
			function prima($n){

  for($i=1;$i<=$n;$i++){  

          $counter = 0; 
          for($j=1;$j<=$i;$j++){ 


                if($i % $j==0){ 

                      $counter++;
                }
          }

      
        if($counter==2){

               print $i." is Prime <br/>";
        }
    }
} 

prima(20);
			 
			 
			 
            
  ?>