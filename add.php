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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Ako na to</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Hľadať" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Hľadať</button>
        </form>
    </div>
</nav>

<form class="col-6 container-fluid content-section" method="post" id=form enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Názov</label>
        <input type="text" class="form-control" name="title" placeholder="Vložte názov" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Popis</label>
        <textarea class="form-control text-input" name="description" rows="5" placeholder="Vložte popis" required></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Vložte obrázok</label>
        <input type="file" class="form-control-file" name="image">
    </div>

    <input type="submit" class="btn btn-primary" name="add" value="Pridať">
</form>





<?php
    if (isset($_POST['add'])) {
        $app = new Application();
        $app->processData();
        header("Location: index.php");
    }
?>

</body>
</html>