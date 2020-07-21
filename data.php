<?php
// Turn off all error reporting
    error_reporting(0);
?>

<?php
include_once './db.php';
$id = $_POST['child_id_number'];
$sql = "SELECT * from user_entries where child_id_number=$id";
$result = mysqli_query($conn, $sql);
// $name = false;
$mom_id = false;
$dad_id = false;
$phone_number = false;
$birth_date = false;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // $name = $row['child_name'];
        $mom_id = $row['first_parent_id_number'];
        $dad_id = $row['second_parent_id_number'];
        $birth_date = $row['birth'];
        if ($row['number']) {
            $phone_number = $row['number'];
        }
        
    }
}

// header('Location: ./index.php?added=success');
?>




<?php if ($result->num_rows > 0) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        
        <meta http-equiv=Content-Type content="text/html; charset=windows-1252">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2nd auth</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            .ss {
                margin: 30px;
            }
        </style>
    </head>

    <body>
        <div class="jumbotron">
            <h1 class="display-5">პერსონალური ინფორამცია</h1>
            
            <ul class="list-group" style="width: 50%;">

                <li class="list-group-item"><strong>ბავშვის პირადი ნომერი: </strong><span><?php echo $id ?></span></li>
                <li class="list-group-item"><strong>დედის პირადი ნომერი: </strong><span><?php echo $mom_id ?></span></li>
                <li class="list-group-item"><strong>მამის პირადი ნომერი: </strong><span><?php echo $dad_id ?></span></li>
                <li class="list-group-item"><strong>დაბადების თარიღი: </strong><span><?php echo $birth_date ?></span> 
            
                <span><input value="თარირის შეცვლა" type="submit" id='submit-btn-date' class="btn btn-success ss mt-4 lg mb-4px"></span>
                <input type="hidden" id='datetime' name='datetime' value="ახალი თარიღი">
            </li>


            </ul>
            <hr class="my-4">
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="child_phone">შეიყვანეთ ტელეფონის ნომერი <strong>(აუცილებელია)</strong></label>
                    <input style="width:35%; border:1px solid red;" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" title="არასწორი ფორმატი" type="text" class="form-control" id="child_phone" name="child_phone" required="" placeholder="5XX XXX XXX">
                    <input type="hidden" name="idnumber" id="idnumber" value=<?php echo $id ?>>
                    <input value="დასტური" type="submit" id='submit-btn' class="btn btn-primary ss lg">
                    
                </div>
            </form>

        </div>
        <script>
            let btn = document.getElementById('submit-btn-date')
            btn.addEventListener("click", 
                function e(){
                    document.getElementById('datetime').setAttribute('type', 'date')
                    
                }
            )
        </script>
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
