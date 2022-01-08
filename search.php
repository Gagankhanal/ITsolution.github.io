<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thred list</title>
</head>

<body>
    <?php include 'partial/_dbconnect.php'; ?>
    <?php include 'partial/_header.php'; ?>

    <div class="container my-5 " id="ques">
        <div class="w-75 m-auto">
            <h1 class="my-2 jmbo">Search result for<em>"
                    <?php echo $_GET[
                'search'
            ]; ?>"
                </em></h1>
            <hr class="thick-border mb-3">
            <?php
            $query = $_GET['search'];
            $noResult = true;
            $sql = "SELECT * FROM `threats` WHERE MATCH(`thread_title`, `thread_desc`) AGAINST ('$query')";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['thread_id'];
                $threadtitle = $row['thread_title'];
                $threaddesc = $row['thread_desc'];
                echo '
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <img src="img/defaultuser.png" height="30px "alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3 bg-light p-1">
                    <h5 ><a href="thread.php?threadid='.$id.'" >'.$threadtitle.'</a></h5>
                    '.$threaddesc.'
                    </div>
                </div>';
            }
            if ($noResult) {
                echo '<div class="container my-5">
                    <div class="w-75 m-auto p-3 bg-light">
                        <h3 class="  py-1 " style="color:#198754;">NO search result found</h3>
                        <p class="lead ">
                            <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords.</li>
                                <li>Try fewer keywords.</li>
                            </ul>
      
                        </p>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>


    <?php include 'partial/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>