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

<form class="col-6 container-fluid content-section" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Názov</label>
        <input type="text" class="form-control" name="title" placeholder="Vložte názov" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Popis</label>
        <input type="text" class="form-control" name="description" placeholder="Vložte popis" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Vložte obrázok</label>
        <input type="file" class="form-control-file" name="image">
    </div>
    <input type="submit" class="btn btn-primary" name="add" value="Pridať">
</form>

<?php
    $app = new Application();
    $app->processData();
?>

</body>
</html>