<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    <title>Thredlists</title>
</head>

<body>
    <?php include "partial/_dbconnect.php"; ?>
    <?php include "partial/_header.php"; ?>
    <?php
    $id=$_GET['catid'];
     $sql="SELECT * FROM `categories` WHERE `category_id`='$id'";
     $result=mysqli_query($connection,$sql);
     while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
        // echo $id;
        // echo $catname;
     }
    ?>

    <?php
    $insert=false;
    $field=true;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            if(!empty($_POST['title']) && !empty($_POST['desc'])){
                 $thread_title=$_POST['title'];
                 $thread_title=str_replace("<", "&lt;", $thread_title);
                 $thread_title=str_replace(">", "&gt;", $thread_title);
                 $thread_desc=$_POST['desc'];
                 $thread_desc=str_replace("<", "&lt;", $thread_desc);
                 $thread_desc=str_replace(">", "&gt;", $thread_desc);
                 $user_id=$_POST['user_id'];
                 $sql="INSERT INTO `threats` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( ' $thread_title', ' $thread_desc', '$id', '$user_id', current_timestamp())";
                 $result=mysqli_query($connection, $sql);
                 
                //  echo $result;
                $insert=true;
                if($insert){
                    echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
                    <strong>Success!</strong>  your data has been inserted successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                 }

            }else{
                 $field="Each field are required";
                 if($field){
                    echo '<div class="alert alert-danger alert-dismissible fade show"      role="alert">
                    <strong>Sorry!</strong> '.$field.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                 }
            }
        }else{
            die("error").mysqli_error();
        }   
    }
    ?>

    <!-- start jumbotron -->
    <div class="container mt-3 " >
        <div class="jumbotron w-75 m-auto p-4 bg-light ">
            <h1 class=" display-4 py-1 " style="color:#198754;">Welcome to <?php echo $catname ?> manuel</h1>
            <p class="lead text-secondary"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p class=" text-secondary">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums
                is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <p class="lead">
                <a class="btn btn-success " href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <!-- jumbotron end -->

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '
        <div class="container my-5">
        <div class="w-75 m-auto">
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group mb-3">
                <label for="threadtitle" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="threadHelp">
                <div id="emailHelp" class="form-text">Write your proble as short as crisp as possible</div>
            </div>
            <input type="hidden" name="user_id" value="  '.$_SESSION['user_id'].'">
            <div class="form-group ">
                <label for="floatingTextarea2" class="mb-2">Elaborate your Consern</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-success my-3" value="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
   ';
    }else{
        echo '
        <div class="container my-5">
        <div class="w-75 m-auto p-3 bg-light">
            <h3 class="  py-1 "    style="color:#198754;">Start a discussion.</h3>
            <p class="lead ">You are not logged in .Please! login first to be able to start a discussion
            </p>
        </div>
    </div>';
    }

   ?>
    

    <div class="container my-5" id="ques">
        <div class="m-auto w-75">
            <h1 class="jmbo">Browse Question</h1>
            <hr class="thick-border mb-3">
            <?php
                $id=$_GET['catid'];
                $noResult=true;
                $sql="SELECT * FROM `threats` WHERE `thread_cat_id`='$id'";
                $result=mysqli_query($connection ,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $noResult=false;
                    $id=$row['thread_id'];
                    $threadtitle=$row['thread_title'];
                    $threaddesc=$row['thread_desc'];
                    $thread_user_id=$row['thread_user_id'];
                    $timestamp=$row['timestamp'];
                    $sql2="SELECT user_name FROM `users` WHERE user_id='$thread_user_id'";
                    $result2=mysqli_query($connection ,$sql2);
                    $row2=mysqli_fetch_assoc($result2);
                    $row2['user_name'];


                    // echo $threadtitle;
                    // echo $threaddesc;
                    // echo $id;
                    echo '
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <img src="img/defaultuser.png" height="30px "alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3 bg-light p-1">
                            <p class="fw-bold my-0"> '.$row2['user_name'].'  at  '.$timestamp.'<br></p>
                            <h5 ><a href="thread.php?threadid='.$id.'" >'.$threadtitle.'</a></h5>
                            '.$threaddesc.'
                            </div>
                        </div>';
                }
                if($noResult){
                    echo '
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">No Result Found</h1>
                                <p class="lead">Be a first person to ask a question</p>
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