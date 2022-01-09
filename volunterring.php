<?php

    if (array_key_exists('u', $_POST) AND array_key_exists('p', $_POST) AND array_key_exists('fn', $_POST)AND array_key_exists('ln', $_POST) AND array_key_exists('t', $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "", "project");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['u'] == '') {
            
            echo "<h1>Email address is required.</h1>";
            
        } else if ($_POST['p'] == '') {
            
            echo "<h1>Password is required.</h1>";
            
        } else {
            
            $query = "SELECT `id` FROM `vol` WHERE email = '".mysqli_real_escape_string($link, $_POST['u'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<h1>That email address has already been taken.</h1>";
                
            } else {
                
                $query = "INSERT INTO `vol` (`Email`, `phone no`,`First Name`, `last name`, `text`) VALUES ('".mysqli_real_escape_string($link, $_POST['u'])."', '".mysqli_real_escape_string($link, $_POST['p'])."','".mysqli_real_escape_string($link, $_POST['fn'])."','".mysqli_real_escape_string($link, $_POST['ln'])."', '".mysqli_real_escape_string($link, $_POST['t'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<h1>Thanks for applying ,your response has been submitted .We will contact with you in very short time. </h1>";
			
					
              
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
    <h1>volunteer Form</h1>
  
    <form method="post">
  <table>
    <tr>
      <th>
	  <input type="email" name="u" placeholder="Your email" id="email" required="required"/ >
      
      </th></tr><tr> <th > <input type="text" name="p" placeholder="Phone number" required="required" /> </th> 
    </tr>
	<tr>
	<th><input type="text" name="fn" placeholder="First Name" id="name" required="required"/ >
	</th>
	</tr>
	<tr>
	<th><input type="text" name="ln" placeholder="Last Name" id="name" required="required"/ >
	</th>
	</tr>
	

	<tr><th>Why do you want to join our campaign?<br><p> <input type="text" name="t" placeholder="your answer" required="required" /> </th>
	
    <tr>

    </tr>
      </table>
            <button type="submit" class="btn btn-primary btn-block btn-large" > 
      submit </button>    
    </form>
</div>

</html>
