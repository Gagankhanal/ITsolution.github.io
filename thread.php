<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Threds</title>
</head>

<body>
    <?php include "partial/_dbconnect.php";?>
    <?php include "partial/_header.php"; ?>

    <?php
    $id=$_GET['threadid'];
     $sql="SELECT * FROM `threats` WHERE `thread_id`='$id'";
     $result=mysqli_query($connection,$sql);
     while($row=mysqli_fetch_assoc($result)){
        $threadtitle=$row['thread_title'];
        $threaddesc=$row['thread_desc'];
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT user_name FROM `users` WHERE user_id='$thread_user_id'";
        $result2=mysqli_query($connection ,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by=$row2['user_name'];
     }
    ?>

    <?php
    $field=true;
    $insert=false;
    $id=$_GET['threadid'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])){
            if(!empty($_POST['comment'])){
                $comment=$_POST['comment'];
                $comment=str_replace("<", "&lt;", $comment);
                $comment=str_replace(">", "&gt;", $comment);
                $user_id=$_POST['user_id'];
                $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`,`comment_time`) VALUES ( '$comment', '$id', '$user_id',current_timestamp())";
                $result=mysqli_query($connection,$sql);
                $insert=true;
                if($insert){
                    echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
                    <strong>Success!</strong>  Your comment has been published
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                 }
              
            }else{
                $field= "no comment has been made";
                if($field){
                    echo '<div class="alert alert-danger alert-dismissible fade show"      role="alert">
                    <strong>Sorry!</strong> '.$field.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                 }
            }
        }
    }
    ?>


    <!-- start jumbotron -->
    <div class="container my-3 " >
        <div class="jumbotron w-75 m-auto p-4 bg-light">
            <h1 class="display-4 " style="color:#198754;">
                <?php echo $threadtitle ?> 
            </h1>
            <p class="lead"><?php echo  $threaddesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <p>posted-by:<b> <?php echo "$posted_by"; ?> </b></p>
        </div>
    </div>
    <!-- jumbotronh1 end -->

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '
<div class="container my-5">
<div class="w-75 m-auto">
    <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
    <h3 class="  py-1 "    style="color:#198754;">Provide your solution here</h3>
        <div class="form-group">
            <label for="floatingTextarea2" class="mb-2">Write your comment</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"
                style="height: 100px"></textarea>
        </div>
        <input type="hidden" name="user_id" value="  '.$_SESSION['user_id'].'">
        <button type="submit" class="btn btn-success my-3" value="submit" name="submit">Submit</button>
    </form>
</div>
</div>';
}else{
    echo '
    <div class="container my-5">
    <div class="w-75 m-auto p-3 bg-light">
        <h3 class="  py-1 "    style="color:#198754;">Provide your solution here</h3>
        <p class="lead ">You are not logged in .Please! login first so that you will be able to provide solutions
        </p>
    </div>
</div>';
}
?>
 

    <div class="container my-5" id="ques">
        <div class="m-auto w-75">
        <h1 class="jmbo">Discussion</h1>
            <hr class="thick-border mb-3">
            <?php
            $id=$_GET['threadid'];
            $sql="SELECT * FROM `comments` WHERE `thread_id`='$id'";
            $result=mysqli_query($connection ,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['comment_id'];
                $cmtContent=$row['comment_content'];
                $cmttime=$row['comment_time'];
                $commentby=$row['comment_by'];
                $sql2="SELECT user_name FROM `users` WHERE user_id='$commentby'";
                $result2=mysqli_query($connection ,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                echo ' <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 mx-2">
                                    <img src="img/defaultuser.png" height="30px "alt="...">
                                </div>
                                
                                <div class="flex-grow-1 ms-3">
                                <p class="fw-bold my-0">'.$row2['user_name']. '  at '.$cmttime.'<br></p>
                                   '.$cmtContent.'
                                </div>
                        </div>';
            }
            ?>
        </div>
    </div>
    <?php include "partial/_footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>