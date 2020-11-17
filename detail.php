<?php
    include 'Application.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>How to...</title>
    <meta name="description" content="The greatest HowTo website">
    <link rel="stylesheet" href="styles.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">How to</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="edit.php">Edit<span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php
        if (!isset($_POST['submit'])) {
            $app = new Application();
            $guide = $app->getDetail($_GET['id']);
        }
    ?>
    <?php
    if (isset($_POST['delete'])) {
        $app = new Application();
        $app->deleteGuideById($_GET['id']);
        header("Location: index.php");
    }
    ?>
    <section class="col-8 container-fluid content-section">
        <div class="col-auto">
            <img src="<?php echo $guide['view_pic'] ?>" class="img-fluid img-thumbnail img-detail" alt="">
        </div>
        <br>
        <div class="d-flex w-100 justify-content-between ">
            <h5 class="mb-1 title-preview"><?php echo $guide['title'] ?></h5>
        </div>
        <br>
        <p class="mb-1"><?php echo $guide['description'] ?></p>
        <br>
        <form method="post">
            <a href="index.php"><button type="submit" name="delete" class="btn btn-danger">Delete</button></a>
        </form>
    </section>



</body>
</html>