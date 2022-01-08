    <?php
    include "partial/_dbconnect.php";
    $insert=false;
    $field=true;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['phone']) && !empty($_POST['message'])){
                 $name=$_POST['name'];
                 $email=$_POST['email'];
                 $subject=$_POST['subject'];
                 $phone=$_POST['phone'];
                 $message=$_POST['message'];
                 $subject=str_replace("<", "&lt;", $subject);
                 $subject=str_replace(">", "&gt;", $subject);
                 $message=str_replace("<", "&lt;", $message);
                 $message=str_replace(">", "&gt;", $message);
                 $sql="INSERT INTO `contact_message` ( `name`, `email`, `subject`, `phone`, `message`) VALUES ( '$name', '$email', '$subject', '$phone', '$message')";
                 $result=mysqli_query($connection, $sql);
                 
                //  echo $result;
                $insert=true;

            }else{
                 $field="Each field are required";
            }
        } 
    }
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai+2&display=swap" rel="stylesheet">

        <title>Contact us</title>
    </head>

    <body>
        <?php include 'partial/_dbconnect.php'; ?>
        <?php include 'partial/_header.php'; ?>
        <!-- slider starts here -->
        <?php
    if($insert){
        echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
        <strong>Success!</strong>  we  kept your message saved we will try to respond you soon
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
     }
//     if($field){
//     echo '<div class="alert alert-danger alert-dismissible fade show"      role="alert">
//             <strong>Sorry!</strong> '.$field.'
//            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//          </div>';
// }

?>
        <section class="contact ">
            <div class="container p-5">
                <div class="m-auto w-50">
                    <h3 class="jmbo text-center mb-4">Contact us</h3>
                    <hr class="thick-border ">
                    <?php 
                if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']==true){
                    echo '
                    <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail1" class="form-label">Email </label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="subject" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="mb-3">
                        <label for="Phone" class="form-label">Phone no</label>
                        <input type="phone" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="mb-2">Write your Message</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="message" name="message"
                            style="height: 100px"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" value="submit" name="submit">Send your message</button>
                </form>';
                }else{
                    echo '
                    <div class="container my-5">
                    <div class="w-75 m-auto p-3 bg-light">
                        <h3 class="  py-1 "    style="color:#198754;">Send your message</h3>
                        <p class="lead ">You are not logged in .Please! login first to be able to send your message
                        </p>
                    </div>
                </div>';
                }
                ?>

                </div>
            </div>
        </section>

        <section id="section2" class="text-white ">
            <div class="container my-5">
                <div class="sholder mt-1">
                    <img src="img/sholder1.jpg" alt="kapilbabu"
                        style=" height: 150px; width: 150px;; border-radius: 50%;">
                    <h5>Kapil babu</h5>
                    <p class="p-primary">
                        Executive -Director<br>
                        Mobile No: | + 977 <a href="tel:9821550276" class="text-white">9821550276</a><br>
                        E-mail | <a href="#" class="text-primary font-weight-bold">kanxokapil11@gmail.com</a>
                    </p>
                </div>
            </div>
        </section>



        <!-- use a for loop to iterate through categori -->


        <?php include 'partial/_footer.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

    </body>

    </html>