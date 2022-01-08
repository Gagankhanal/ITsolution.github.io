<?php
include '_dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['loginPassword'])){
            $username=$_POST['username'];
            $password=$_POST['loginPassword'];
            $sql="SELECT * FROM `users` WHERE `user_name`='$username'";
            $result=mysqli_query($connection,$sql);
            // echo $username;
            $num=mysqli_num_rows($result);
            if($num==1){
                $row=mysqli_fetch_assoc($result);
                if(password_verify($password,$row['user_password'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $row['user_id'];
                    // $_SESSION['useremail'] = $email;
                    $_SESSION['username'] = $username;
                    // echo "<br>".$_SESSION['user_id']  ;
                    // echo "<br>".$_SESSION['username'] ;
                } 
                header("Location: /forum/index.php");


            }
        }
    }
    header("Location: /forum/index.php");
}
?>