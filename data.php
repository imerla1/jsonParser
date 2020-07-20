<?php
include_once './db.php';
$id = $_POST['child_id_number'];
$sql = "SELECT * from user_entries where child_id_number=$id";
$result = mysqli_query($conn, $sql);
$name = false;
$mom = false;
$dad = false;
$phone_number = false;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row['child_name'];
        $mom = $row['first_parent_name'];
        $dad = $row['second_parent_name'];

        if ($row['number']) {
            $phone_number = $row['number'];
        }
    }
}

// header('Location: ./index.php?added=success');
?>




<?php if ($result->num_rows > 0) { ?>
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
            <h1 class="display-4">პერსონალური ინფორამცია</h1>

            <ul class="list-group" style="width: 50%;">

                <li class="list-group-item"><strong>ბავშვის სახელი და გვარი: </strong><?php echo $name ?></li>
                <li class="list-group-item"><strong>დედის სახელი და გვარი: </strong><?php echo $mom ?></li>
                <li class="list-group-item"><strong>მამის სახელი და გვარი: </strong><?php echo $dad ?></li>

            </ul>
            <hr class="my-4">
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="child_phone">შეიყვანეთ ტელეფონის ნომერი</label>
                    <input style="width:15%;" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" title="არასწორი ფორმატი" type="text" class="form-control" id="child_phone" name="child_phone" required="" placeholder="5XX XXX XXX">
                    <input type="hidden" name="idnumber" id="idnumber" value=<?php echo $id ?>>
                    <input value="დასტური" type="submit" id='submit-btn' class="btn btn-primary mt-4 lg">
                    
                </div>
            </form>

        </div>
    </body>

    </html>


    <?php } else { { ?>

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
            <h1 class="display-4" style="color: red;">მოცემული პირადი ნომრით ბავშვი ვერ მოიძებნა</h1>

            <a href="index.php">უკან დაბრუნება</a>

        </div>
    </body>

    </html>

<?php }
}
