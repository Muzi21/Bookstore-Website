<?php
// Initialize the session
session_start();
 


require_once "config.php";
 
// Define variables and initialize with empty values
$AdminName = $password = "";
$AdminName_err = $password_err = $Adminlogin_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if AdminName is empty
    if(empty(trim($_POST["AdminName"]))){
        $AdminName_err = "Please enter AdminName.";
    } else{
        $AdminName = trim($_POST["AdminName"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
      
        $sql = "SELECT Adminid, AdminName, password FROM tbladmin WHERE AdminName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Setting parameters
            $param_username = $AdminName;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if AdminName exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $Adminid, $AdminName, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["Adminid"] = $Adminid;
                            $_SESSION["AdminName"] = $AdminName;                            
                            
                            // Redirect user to welcome page
                            header("location: AdminPage.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid AdminName or password.";
                        }
                    }
                } else{
                    
                    $login_err = "Invalid AdminName or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>