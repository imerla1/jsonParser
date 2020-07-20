<?php
include_once './db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2nd auth</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4">მოგესალმებით!</h1>
        <p class="lead">შეიყვანეთ ბავშვი პირადობის დამადასტურებელი ნომერი</p>
        <hr class="my-4">
        <form action="data.php" method="POST">
            <div class="form-group">
                <label for="child_id_number">პირადი ნომერი:</label>
                <input style="width:40%;" type="text" class="form-control" id="child_id_number" name="child_id_number" required="">
                <input value="დასტური" type="submit" id='submit-btn' class="btn btn-primary mt-4 lg" >
            </div>
        </form>
      </div>
      
</body>
</html>
