<?php
	error_reporting(E_ERROR | E_PARSE);      //optional,to remove warning messages.
     $conn=mysqli_connect("localhost","root","","ecom");
        if ($conn)
          {
           echo "database connected with ecom","<br>";
          }
        else
          {
           die("Connection Aborted:" . mysqli_connect_error());
          }

?>
