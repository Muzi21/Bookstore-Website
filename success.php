
<?php
    session_start();
     
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('index_A.php');
        exit();
    }
    include('conn_A.php');
    $query=mysqli_query($conn,"select * from tbladmin where AdminID='".$_SESSION['id']."'");
    $row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Success</title>
</head>
<body>
    <h2>Login Success</h2>
    <?php echo $row['email']; ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>