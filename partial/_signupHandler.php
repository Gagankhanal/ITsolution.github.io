<?php
include '_dbconnect.php';
$showError="false";
// $field=true;
// $insert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['submit'])){
        if(!empty($_POST['signupEmail']) && !empty($_POST['signupPassword']) && !empty($_POST['signupcPassword'])){
            $email=$_POST['signupEmail'];
            $username=$_POST['username'];
            $password=$_POST['signupPassword'];
            $cPassword=$_POST['signupcPassword'];
            $existSql="SELECT * FROM `users` WHERE `user_email`='$email'";
            $result=mysqli_query($connection,$existSql);
            $num=mysqli_num_rows($result);
            if($num>0){
                $showError="This email is already exist";
            }else{
                if($password==$cPassword){
                    $hash=password_hash($password,PASSWORD_DEFAULT);
                    $sql="INSERT INTO `users` (`user_email`, `user_name`, `user_password`, `timestamp`) VALUES ( '$email', '$username', '$hash', current_timestamp());";
                    $result=mysqli_query($connection,$sql);
                    if($result){
                        $insert=true;
                        header("Location: /forum/index.php?signupsuccess=true");
                        exit();
                    }
                    // else{
                       // $showError="Password doesn't match";
                    // } 
                }
                // header("Location: /forum/index.php?signupsuccess=false&error= $showError");
            }
        }else{
            $showError="each field required";
            if($showError){
                echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
            <strong>Success!</strong>  '.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
            }        
        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error= $showError");
}
?>