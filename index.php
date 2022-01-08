<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <title>Welcome to ITsolution-Coding forum</title>
</head>

<body>
  <?php include "partial/_dbconnect.php"; ?>
  <?php include "partial/_header.php"; ?>
  <!-- slider starts here -->

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider1.jpg" class="d-block w-100" height=" 400px" alt="">
      </div>
      <div class="carousel-item">
        <img src="img/slider2.png" height=" 400px" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="img/slider3.png" class="d-block w-100" height=" 400px"
          alt="">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- <img src="https://source.unsplash.com/random/2400*700/?code,python" class="d-block w-100" height=" 500px" alt=""> -->
  <!-- slider ends here -->
  <!-- categori container starts here -->
  <div class="container mt-4 " style="min-height:500px">
    <h2 class="text-center mb-2 jmbo " >ITsolution-Browse Categories</h2>
    <hr class="thick-border mb-4">
    <div class="row w-75 m-auto">
      <!-- fetch all the categories here -->
      <?php
      $sql="SELECT * FROM `categories`";
      $result=mysqli_query($connection ,$sql);
      while($row=mysqli_fetch_assoc($result)){
    // echo $row['category_id'];
    // echo $row['category_name'];
          $id=$row['category_id'];
          $catname=$row['category_name'];
          $catdesc=$row['category_description'];
          echo '<div class="col-md-4 ">
                  <div class="card mx-2 my-3">
                    <img src="img/card'.$id.'.jpg" height="150px" alt="...">
                    <div class="card-body ">
                      <h5 class="card-title"><a href="threadlist.php?catid='.$id.'"> '.$catname.'</a></h5>
                      <p class="card-text justify-center">'.substr($catdesc,0 ,75).'...</p>
                      <a href="threadlist.php?catid='.$id.'" class="btn btn-success">View Threads</a>
                    </div>
                  </div>
                </div>';
       }
      ?>
    </div>
  </div>

  <!-- use a for loop to iterate through categori -->
 

  <?php include "partial/_footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

</body>

</html>