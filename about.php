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
    
    <title>About us</title>
</head>

<body>
    <?php include 'partial/_dbconnect.php'; ?>
    <?php include 'partial/_header.php'; ?>
    <!-- slider starts here -->

    <!-- about us starts-->
    <section class="about_info pt-5 pb-2 " id="info">
        <div class="container">
            <div class="w-75 m-auto">
                <h3 class="my-4 jmbo text-center">Introduction</h3>
                <hr class="thick-border ">

                <div class="col-md-12 text-center">
                    <p class="text-muted">
                        We understand the challenges that the sector faces and recognize the unique opportunity to help
                        your company follow its growth plan.

                        With our strong track record, we believe we are best positioned to meet your expectations and
                        help you achieve your vision. Having duly examined your situation, we are confident that our
                        proposed services will successfully address your needs.

                        Our unique mix of qualified resources, effective project management, deep technical knowledge,
                        and standardized business processes make us an invaluable partner. We look forward to a mutually
                        rewarding relationship with your company, and we will be waiting for your evaluation and
                        feedback. In the meantime, please do not hesitate to call us if we can be of any further
                        support.
                    </p>

                    <p class="text-muted">
                        Through dedication and service to our customers, IT Solution has created a position of financial
                        strength.
                        IT Solution is privately owned and lead by our president, Mr. Mahmoud Farag. We were founded in
                        2020.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- extra div start -->

    <section class=" header-extradiv ">
        <div class="container ">
            <div class="w-75 m-auto">
                <h3 class="my-4 pt-3 text-center jmbo ">Our works</h3>
                <hr class="thick-border  ">
                <div class="row ">
                    <div class="extradiv  col-md-4   "><a href="#"><i class="fa fa-4x        fa-desktop "
                                aria-hidden="true"></i></a>
                        <h3 class="my-4 jmbo">High computing</h3>
                        <p class="text-muted">Struggling to boost your business productivity? Have a talented pool of people but wish you could utilise them better to improve your overall organisational performance?</p>
                    </div>

                    <div class="extradiv  col-md-4 "><a href="#"><i class="fa fa-4x fa-handshake-o"
                                aria-hidden="true"></i></a>
                        <h3 class="my-4 jmbo">Consulting </h3>
                        <p class="text-muted">IT Solution offers services to streamline IT strategy creating, information security assurance and system integration, and improve digital customer experience.</p>
                    </div>

                    <div class="extradiv  col-md-4 "><i class="fa fa-4x fa-check-circle " aria-hidden="true"
                            style="justify-content: center;"></i>
                        <h3 class="my-4 jmbo">Networks security</h3>
                        <p class="text-muted">We offer on-going base-line management of your computer network by providing routinely scheduled analysis and adjustment of servers, PCs and network security.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- extra div section end -->
    <!-- about us end -->


    <!-- use a for loop to iterate through categori -->


    <?php include 'partial/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

</body>

</html>