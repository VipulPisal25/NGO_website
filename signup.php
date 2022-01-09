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
            
            $query = "SELECT `id` FROM `userdata` WHERE email = '".mysqli_real_escape_string($link, $_POST['u'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<h1>That email address has already been taken.</h1>";
                
            } else {
                
                $query = "INSERT INTO `userdata` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['u'])."', '".mysqli_real_escape_string($link, $_POST['p'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<h1>You have been signed up!</h1>";
			
					header("refresh:3; url=login.php");
              
                } else {
                    
                    echo "<h1>There was a problem signing you up - please try again later.</h1>";
                    
                }
                
            }
            
        }
        
        
    }

    


?>
<html>
<head>

 <link rel="stylesheet" href="signup.css">
</head>	


<div class="login">
    <h1>Hi , Guest !</h1>
  
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
      SIGN UP </button>    
    </form>
</div>

</html>
