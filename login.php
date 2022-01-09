<?php

    if (array_key_exists('u', $_POST) AND array_key_exists('p', $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "", "project");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['u'] == '') {
            
            echo "<h1>Email address is required.</h1>";
            
        } else if ($_POST['p'] == '') {
            
            echo "<h1>Password is required.</h1>";
            
        } else {
            
            $query = "SELECT * FROM `userdata` WHERE email = '".mysqli_real_escape_string($link, $_POST['u'])."'";
            
            $result = mysqli_query($link, $query);
			$row = mysqli_fetch_array($result);
            
          if (mysqli_real_escape_string($link, $_POST['p'])==$row['password']) {
				
			
				
		  echo "<h1>You have successfully logged in...reloading website...</h1>"; 
		  header( "refresh:2; url=sdphp.html");}	
			else {
				echo "<h1>Password mismatched..Please enter the correct password</h1>";
			}
			 
			
	}}
				   


?>
<html>
<head>

 <link rel="stylesheet" href="signup.css">
</head>	


<div class="login">
    <h1>Hi , DONAR</h1>
  
    <form method="post">
  <table>
    <tr>
      <th>
	  <input type="email" name="u" placeholder="Your email" id="email" required="required"/ >
      
      </th> <th > <input type="password" name="p" placeholder="Password" required="required" /> </th> 
    </tr>
    <tr>

    </tr>
      </table>
            <button type="submit" class="btn btn-primary btn-block btn-large" > 
      Login </button>    
    </form>
</div>

</html>