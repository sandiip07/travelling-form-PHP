<?php
$insert = false;
if (isset($_POST['name'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $connection = mysqli_connect($server, $username, $password);

    if (!$connection) {
        die("connection to this database is failed" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip-website`.`trip` (`name`, `age`, `gender`, `gmail`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender ', '$gmail', '$phone', '$desc', current_timestamp())";

    // echo ($sql);

    if ($connection->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR : $sql <br> $connection->error";
    }

    $connection->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well come to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="container">
        <h3>Well come to UK trip from Bansal college</h3>
        <p>Enter your details snd submit from to confirm your participation in the trip </p>

        <?php
        if ($insert == true) {
            echo "<p class='submit-msg-text'>Thank you for summiting the form successfully</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Fullname">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="gmail" id="gmail" placeholder="Enter your Gmail">
            <input type="text" name="phone" id="phone" placeholder="Enter your Contact number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Information"></textarea>
            <button class="btn">Submit</button>
        </form>

    </div>

    <script src="index.js"></script>
</body>

</html>