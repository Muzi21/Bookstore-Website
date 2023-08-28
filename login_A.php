
<?php
    if(isset($_POST['login'])){
         
        session_start();
        include('conn_A.php');
     
        $Adminname=$_POST['Adminname'];
        $password=$_POST['password'];
     
        $query=mysqli_query($conn,"select * from tbladmin where AdminName='$Adminname' && password='$password'");
     
        if (mysqli_num_rows($query) == 0){
            $_SESSION['message']="Login Failed. User not Found!";
            header('location:AdminPage.php');
        }
        else{
            $row=mysqli_fetch_array($query);
             
            if (isset($_POST['remember'])){
                //set up cookie
                setcookie("Admin", $row['AdminName'], time() + (86400 * 30)); 
                setcookie("pass", $row['password'], time() + (86400 * 30)); 
            }
             
            $_SESSION['AdminID']=$row['Admin_id'];
            header('location:success.php');
        }
    }
    else{
        header('location:index_A.php');
        $_SESSION['message']="Please Login!";
    }
?>