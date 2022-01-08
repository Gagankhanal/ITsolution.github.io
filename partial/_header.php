<?php
session_start();
echo 
'<nav class="navbar navbar-expand-lg navbar-dark bg-dark stiky">
  <div class="container-fluid">
    <a class="navbar-brand webnem" href="/forum">ITsolution</a>
    <button class="navbar-toggler" type="button" data-bs-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-bs-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql="SELECT category_name , category_id FROM `categories` LIMIT 5";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_assoc($result)){
             echo '<li><a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
          }
        echo '  </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contacts</a>
      </li>
      </ul>';
     
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo ' <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        <div class="d-flex-column mx-2">
        <img src="img/defaultuser.png" height="30px" width="30px" style="border-radius:50%"alt="...">
        <p class="text-light  text-center my-0" style="text-decoration:none"> '. $_SESSION['username'] .'</P>
        </div>
    <a href="/forum/partial/_logout.php" class="btn btn-success">Logout</a>
      
        </form>';

      }else{
        echo ' <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success " type="submit">Search</button>
        <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
      </form>';
    }
    echo '   </div>
    </div>
  </nav>'  ;   
  
 include "partial/_loginmodal.php";
 include "partial/_signupmodal.php";
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0"      role="alert">
    <strong>Success!</strong>  You can now login
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
 }
//  else{
//   echo '<div class="alert alert-danger alert-dismissible fade show my-0"      role="alert">
//   <strong>Sorry</strong>  password doesnot match
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//    </div>';
//  }
// if($_GET['signupsuccess'] && $_GET['signupsuccess']=="false" && $_GET['error']=$showError){
//   echo $showError;
// }
?>